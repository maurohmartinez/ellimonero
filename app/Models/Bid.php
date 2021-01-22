<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Bid extends Model
{
    use CrudTrait;

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $table = 'bids';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'bid'
    ];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * User relationship
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Product relationship
     *
     * @return object
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * Scope active
     *
     * @return object
     */
    public function scopeWinner($query)
    {
        return $query->orderBy('bid', 'desc');
    }
}
