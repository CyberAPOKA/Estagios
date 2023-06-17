<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certifications',
        'other_knowledges',
        'professional_experiences',
        'cityhall_trainee',
        'start_date',
        'end_date',
        'secretary'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
