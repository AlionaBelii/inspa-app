<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        "user_id",
        "worker_id",
        "comment",
        "rating"
    ];

    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
