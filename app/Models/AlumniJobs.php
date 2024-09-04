<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniJobs  extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_type',
        'job_description',
        'job_qualification',
        'job_location',
        'job_position',
        'job_duration',
        'salary',
    ];

    public function down()
    {
        Schema::dropIfExists('alumni_jobs');
    }
}
