<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class SEO extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seo';

    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['page', 'title', 'seo_keywords', 'seo_description'];

    protected $allowedSorts = ['id', 'company', 'phone', 'email'];

    protected $allowedFilters = ['id', 'company', 'phone', 'email'];
}
