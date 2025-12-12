<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        "id", "title_name_ru", "title_name_en", "description_ru", "description_en", "filename", "alt_text", "price", "status", "subcategory_id", "worker_id", "to_finish_at"
    ];

     public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function category()
    {
        // has one through - можем получить категории через подкатегорию 
        return $this->hasOneThrough(
            Worker::class,
            Category::class,
            Subcategory::class,
            "id",
            "id", // локальный ключ на промежуточную модель SubCategory
            "id", // локальный ключ на целевую модель Category
            "subcategory_id", // внешний ключи на Project
            "category_id", // внешний ключи на Subcategory
            "worker_id" // внешний ключи на Subcategory
        );
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
