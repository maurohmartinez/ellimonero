<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, CrudTrait, SoftDeletes, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'content',
        'type',
        'price',
        'price_discount',
        'price_min',
        'auction_starts',
        'auction_ends',
        'images',
        'active',
        'new'
    ];
    
    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array'
    ];

    /**
     * Image mutator
     *
     */
    public function setImagesAttribute($images)
    {
        if ($images == null) {
            foreach ($this->images as $file) {
                Storage::disk('products')->delete($file['image_url']);
            }
            $this->attributes['images'] = json_encode([]);
        } else {
            $saved = [];
            foreach ($images as $file) {
                if (Str::startsWith($file->image_url, 'data:image')) {
                    try {
                        $image = Image::make($file->image_url)->encode('jpg', 100);
                        $filename = md5($file->image_url . time()) . '.jpg';
                        Storage::disk('products')->put($filename, $image->stream());
                        array_push($saved, ['image_url' => '/storage/products/' . $filename]);
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
                'source' => 'name',
            ],
        ];
    }
}
