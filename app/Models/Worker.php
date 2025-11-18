<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Worker extends Model
{
    protected $fillable = [
        "fullname_ru", "fullname_en", "experience_years", "description_ru", "description_en", "filename", "alt_text", "slug_ru", "slug_en", "category_id"
    ]; 

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
