<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['hide', 'popular', 'name', 'slug', 'seo_keywords', 'seo_description', 'description'];

    protected $allowedSorts = ['id', 'hide', 'popular', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'name', 'description', 'created_at', 'updated_at'];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
