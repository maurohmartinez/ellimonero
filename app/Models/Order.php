<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use CrudTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'number',
        'total',
        'products',
        'observations'
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
     * Payments relationship
     *
     * @return object
     */
    public function payments()
    {
        return $this->hasMany('App\Models\Payments', 'id', 'order_id');
    }
}
