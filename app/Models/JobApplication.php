<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumni_id',
        'job_id',
        'status',
        
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
