<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Orchid */
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;

class Certificates extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Attachable;

    protected $fillable = ['hide', 'name', 'image'];

    protected $allowedSorts = ['id', 'hide', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'name', 'created_at', 'updated_at'];

    public function image()
    {
        return $this->hasOne(Attachment::class, 'id', 'image')->withDefault();
    }

    public function imagePath()
    {
        return $this->hasOne(Attachment::class, 'id', 'image')->withDefault();
    }
}
