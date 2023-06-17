<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'social_name',
        'cpf',
        'rg',
        'home_phone',
        'cell_phone',
        'fathers_name',
        'mothers_name',
        'birth_date',
        'deficiency',
        'race'
    ];

    // protected $casts = [
    //     'deficiency' => 'array'
    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}
