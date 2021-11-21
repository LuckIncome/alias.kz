<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ContactPhone extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['contact_id', 'value'];

    protected $allowedSorts = ['id', 'contact_id', 'value', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'contact_id', 'value', 'created_at', 'updated_at'];

    public function contact()
    {
        return $this->belongsTo(Contacts::class, 'contact_id');
    }
}
