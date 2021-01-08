<?php

namespace App\Traits;

use App\Models\Qr;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

trait HandleQrResponse
{
    /**
     * Handle QR session
     *
     * @param string $add
     * @return void
     */
    public function handleQrSession(string $add = '')
    {
        if (Session::has('qr')) {
            // Find QR
            $qr = Qr::where('token', Session::get('qr'))->firstOrFail();
            // Process
            return $this->addQrToUser($qr, $add);
        }
        return redirect(route('home') . $add);
    }

    public function addQrToUser(Qr $qr, string $add = '')
    {
        Session::remove('qr');
        
        // Has already been used?
        if(backpack_user()->qr()->exists($qr->id)){
            return redirect(route('qr.error', ['error' => 'already_used']) . $add);
        }
        // Try to save
        try{
            backpack_user()->qr()->attach([$qr->id]);
        } catch (Exception $e) {
            Log::error('QR failed: ' . $e->getMessage());
            // Return error
            return redirect(route('qr.error', ['error' => 'failed']) . $add);
        }
        // Return success
        return redirect(route('qr.success', ['token' => $qr->token]) . $add);
    }
}
