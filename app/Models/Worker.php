<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Worker extends Model
{
    protected $fillable = [
        "fullname_ru", "fullname_en", "experience_years", "description_ru", "description_en", "filename", "alt_text", "slug_ru", "slug_en", "category_id", "email"
    ]; 

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // public function projectCount(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => $this->projects()->count(),
    //     );
    // }
    
    // public function reviewCount(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => $this->reviews()->count(),
    //     );
    // }

}
