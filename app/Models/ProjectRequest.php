<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProjectRequest extends Model
{
    use HasFactory;

    protected $table = 'project_requests';

    protected $fillable = [
        "user_id", "worker_id", "subcategory_id", "fullname", "company_name", "email", "phonenumber", "project_description", "prefered_deadline", "reference_file", "status"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
