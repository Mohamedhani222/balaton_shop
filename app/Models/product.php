<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasTranslations;
    use HasFactory;

    protected $fillable = ['category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trend',
        'meta_title',
        'meta_keywords',
        'meta_description',];
    public $translatable = ['name', 'short_description', 'description', 'meta_description'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items')->withPivot('quantity', 'unit_price', 'total_price');
    }


}
