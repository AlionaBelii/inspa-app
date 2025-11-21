<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        "title_name_ru","title_name_en", "description_ru", "description_en", "filename", "alt_text", "price", "status", "subcategory_id", "worker_id", "to_finish_at"
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
            Category::class,
            Subcategory::class,
            "id", // локальный ключ на промежуточную модель SubCategory
            "id", // локальный ключ на целевую модель Category
            "subcategory_id", // внешний ключи на Project
            "category_id" // внешний ключи на Subcategory
        );
    }
}
