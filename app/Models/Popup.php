<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use DateTimeZone;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\SoftDeletes;

class Popup extends Model
{
    use HasFactory, CrudTrait, SoftDeletes, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'description',
        'type',
        'price',
        'price_discount',
        'price_min',
        'starts',
        'ends',
        'images',
        'active',
        'stock'
    ];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
        'starts' => 'datetime',
        'ends' => 'datetime'
    ];

    /**
     * Image mutator
     *
     */
    public function setImagesAttribute($images)
    {
        if ($images == null) {
            foreach ($this->images as $file) {
                Storage::disk('popups')->delete($file['image_url']);
            }
            $this->attributes['images'] = json_encode([]);
        } else {
            $saved = [];
            foreach ($images as $file) {
                if (Str::startsWith($file->image_url, 'data:image')) {
                    try {
                        $image = Image::make($file->image_url)->encode('jpg', 100);
                        $filename = md5($file->image_url . time()) . '.jpg';
                        Storage::disk('popups')->put($filename, $image->stream());
                        array_push($saved, ['image_url' => '/storage/popups/' . $filename]);
                    } catch (Exception $err) {
                        Log::error('Eror while trying to save product image.' . $err->getMessage());
                    }
                } else {
                    array_push($saved, ['image_url' => $file->image_url]);
                }
            }
            $this->attributes['images'] = json_encode($saved, JSON_UNESCAPED_SLASHES);
        }
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * Scope activo
     *
     * @return object
     */
    public function scopeActivo($query)
    {
        return $query->where('starts', '<', Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->format('Y-m-d H:i:s'))->where('ends', '>', Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->format('Y-m-d H:i:s'))->where('active', 1);
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
