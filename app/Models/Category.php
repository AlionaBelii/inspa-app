<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        "title_en", "title_ru", "slug_en", "slug_ru", "worker_title_en", "worker_title_ru", "filename", "alt_text"
    ];

    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class);
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }

    public function projects(): hasMany
    {
        return $this->hasMany(Projects::class);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}