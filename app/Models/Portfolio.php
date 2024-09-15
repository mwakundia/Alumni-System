<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'gender', 'email', 'dob', 'education', 'certificates','cv', 'description', 'profile_picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}