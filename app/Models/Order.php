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
        'status',
        'observations'
    ];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = ['products' => 'array'];

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
    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'order_id', 'id');
    }
    
    /**
     * Make list of products
     *
     * @return object
     */
    public function getProductsListAttribute()
    {
        $text = '';

        foreach($this->products as $key => $product){
            $text .= ($key > 0 ? ' ' : '') . $product['name'] . ' (' . $product['quantity'] . 'x $' . $product['price'] . ')';
        }
        return $this->attributes['products_list'] = $text;
    }
}
