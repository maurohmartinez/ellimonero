<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Qr extends Model
{
    use CrudTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'welcome',
        'success',
        'description',
        'token',
        'starts',
        'ends',
        'always_visible',
        'image',
        'active',
        'stock'
    ];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = [
        'starts' => 'datetime',
        'ends' => 'datetime',
        'always_visible' => 'boolean',
        'active' => 'boolean',
    ];

    /**
     * Users relationship
     *
     * @return object
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Scope activo and visible
     *
     * @return object
     */
    public function scopeActivo($query)
    {
        return $query->where('always_visible', 1)->where('stock', '>', 0);
    }
    
    /**
     * Scope ticket
     *
     * @return object
     */
    public function scopeTicket($query)
    {
        return $query->where('type', 'ticket');
    }

    /**
     * Image mutator
     *
     */
    public function setWelcomeImageAttribute($image)
    {
        if ($image == null) {
            Storage::disk('qr')->delete($image);
            $this->attributes['welcome_image'] = '';
        } else {
            if (Str::startsWith($image, 'data:image')) {
                try {
                    $image_created = Image::make($image)->encode('jpg', 100);
                    $imagename = md5($image . time()) . '.jpg';
                    Storage::disk('qr')->put($imagename, $image_created->stream());
                    $this->attributes['welcome_image'] = '/storage/qr/' . $imagename;
                } catch (Exception $err) {
                    Log::error('Eror while trying to save qr image.' . $err->getMessage());
                }
            } else {
                $this->attributes['welcome_image'] = '/storage/qr/' . $image;
            }
        }
    }
    
    /**
     * Image mutator
     *
     */
    public function setSuccessImageAttribute($image)
    {
        if ($image == null) {
            Storage::disk('qr')->delete($image);
            $this->attributes['success_image'] = '';
        } else {
            if (Str::startsWith($image, 'data:image')) {
                try {
                    $image_created = Image::make($image)->encode('jpg', 100);
                    $imagename = md5($image . time()) . '.jpg';
                    Storage::disk('qr')->put($imagename, $image_created->stream());
                    $this->attributes['success_image'] = '/storage/qr/' . $imagename;
                } catch (Exception $err) {
                    Log::error('Eror while trying to save qr image.' . $err->getMessage());
                }
            } else {
                $this->attributes['success_image'] = '/storage/qr/' . $image;
            }
        }
    }

    /**
     * Get available stock
     *
     * @return string
     */
    public function getAvailableStockAttribute()
    {
        return $this->attributes['available_stock'] = $this->stock - $this->users()->count();
    }

    /**
     * Get date in local time
     *
     * @return string
     */
    public function getStartsAttribute($value)
    {
        return $this->attributes['starts'] = Carbon::parse($value, 'UTC')->tz('America/Argentina/Buenos_Aires')->locale('es');
    }

    /**
     * Get date in local time
     *
     * @return string
     */
    public function getEndsAttribute($value)
    {
        return $this->attributes['ends'] = Carbon::parse($value, 'UTC')->tz('America/Argentina/Buenos_Aires')->locale('es');
    }

    /**
     * Set date mutator
     *
     * @return string
     */
    public function setStartsAttribute($value)
    {
        $this->attributes['starts'] = Carbon::createFromTimeString($value, 'America/Argentina/Buenos_Aires')->tz('UTC');
    }

    /**
     * Set date mutator
     *
     * @return string
     */
    public function setEndsAttribute($value)
    {
        $this->attributes['ends'] = Carbon::createFromTimeString($value, 'America/Argentina/Buenos_Aires')->tz('UTC');
    }
}
