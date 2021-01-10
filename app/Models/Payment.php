<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use CrudTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order_id',
        'mp',
        'status'
    ];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = ['mp' => 'array'];

    /**
     * User relationship
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
