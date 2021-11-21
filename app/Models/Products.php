<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;

class Products extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Attachable;

    protected $fillable = ['category_id', 'subcategory_id', 'hide', 'popular', 'name', 'description', 'image', 'title', 'slug', 'seo_keywords', 'seo_description'];

    protected $allowedSorts = ['id', 'category_id', 'subcategory_id', 'hide', 'popular', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'category_id', 'subcategory_id', 'name', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function image()
    {
        return $this->hasOne(Attachment::class, 'id', 'image')->withDefault();
    }

    public function imagePath()
    {
        return $this->hasOne(Attachment::class, 'id', 'image')->withDefault();
    }

    public function categorySlug()
    {
        return $this->hasOne(Attachment::class, 'id', 'image')->withDefault();
    }

    public function subcategorySlug()
    {
        return $this->hasOne(Attachment::class, 'id', 'image')->withDefault();
    }
}
