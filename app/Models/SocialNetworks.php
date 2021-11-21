<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class SocialNetworks extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['hide', 'name', 'description', 'link', 'image'];

    protected $allowedSorts = [];

    protected $allowedFilters = [];
}
