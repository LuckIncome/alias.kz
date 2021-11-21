<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Contacts extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['hide', 'city'];

    protected $allowedSorts = ['id', 'hide', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'name', 'created_at', 'updated_at'];

    public function contactPhone()
    {
        return $this->hasMany(ContactPhone::class, 'contact_id', 'id');
    }

    public function contactEmail()
    {
        return $this->hasMany(ContactEmail::class, 'contact_id', 'id');
    }

    public function contactAddress()
    {
        return $this->hasMany(ContactAddress::class, 'contact_id', 'id');
    }
}
