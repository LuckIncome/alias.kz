<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Subcategory extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['hide', 'category_id', 'name', 'slug', 'seo_keywords', 'seo_description', 'description'];

    protected $allowedSorts = ['id', 'hide', 'category_id', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'category_id', 'name', 'description', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter(Builder $query, $category_id)
    {
        // dd($category_id);
        return $query->where('category_id', $category_id);
    }
}
