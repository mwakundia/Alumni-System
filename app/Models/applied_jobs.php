<?php

namespace App\Models;

use App\Models\User;
use App\Models\AlumniJobs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class applied_jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'fname',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alumniJob()
    {
        return $this->belongsTo(AlumniJobs::class, 'job_id');
    }
}
