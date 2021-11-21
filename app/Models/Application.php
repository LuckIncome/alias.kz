<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Application extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['company', 'phone', 'email'];

    protected $allowedSorts = ['id', 'company', 'phone', 'email'];

    protected $allowedFilters = ['id', 'company', 'phone', 'email'];
}
