<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Cart extends Model
{
    use CrudTrait;

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $table = 'cart';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
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
}
