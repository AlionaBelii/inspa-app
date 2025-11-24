<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        "title_en", "title_ru", "sh_description_en", "sh_description_ru", "description_en", "description_ru", "slug_en", "slug_ru", "filename", "altname", "category_id", "user_id"    
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    } 

    public function favorites(): MorphMany
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function isFavoritedBy(?int $userId): bool
    {
        if (!$userId)
        {
            return false;
        }

        return $this->favorites()->where('user_id', $userId)->exists();
    }
}
