<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Backpack\CRUD\app\Models\Traits\CrudTrait;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    /**
     * Get first letters of name
     * 
     * @return string
     */
    public function getFirstLettersAttribute()
    {
        $result = '';
        $str = $this->name;
        $words = explode(' ', $str);
        foreach ($words as $name) {
            $result .= strtoupper(trim($name[0]));
        }
        return $this->attributes['first_letters'] = $result;
    }

    /**
     * QR relationship
     * 
     */
    public function Qr()
    {
        return $this->belongsToMany('App\Models\Qr');
    }

    /**
     * Cart relationship
     * 
     */
    public function cart()
    {
        return $this->hasMany('App\Models\Cart', 'user_id', 'id');
    }

    /**
     * Payments relationship
     * 
     */
    public function payments()
    {
        return $this->hasMany('App\Models\Payment', 'user_id', 'id');
    }

    /**
     * Orders relationship
     * 
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'user_id', 'id');
    }

    /**
     * Include export button in Admin List Operation.
     *
     * @var string
     */
    public function exportButton()
    {
        return '<a href="' . route('users.export') . '" class="btn btn-outline-primary mr-2"><i class="nav-icon fa fa-cloud-download"></i> Download excel</button>';
    }
}
