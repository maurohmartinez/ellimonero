<?php

namespace App\Console\Commands;

use App\Mail\NotifyWinner;
use App\Models\Product;
use Carbon\Carbon;
use DateTimeZone;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CleanTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_subasta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check ending products for subasta every minute.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products = Product::where('type', 'auction')->activo()->whereDate('ends', '<=', Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires')))->hasStock()->get();
        
        foreach ($products as $product) {
            // Got bids?
            if ($product->bids()->exists()) {
                // Get biggest bid
                $bid = $product->bids()->winner()->first();
                // Get user
                $user = $bid->user;
                
                DB::beginTransaction();
                try {
                    // Stock to 0
                    $product->update(['stock' => 0]);
                    
                    // Add product to user's cart
                    $user->cart()->create([
                        'product_id' => $product->id,
                        'quantity' => 1
                    ]);

                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    Log::error('Error when asigning subasta to user. Message: ' . $e->getMessage());
                }
            }
            // Send email to user
            Mail::to($user->email)->send(new NotifyWinner($user, $product));
        }
    }
}
