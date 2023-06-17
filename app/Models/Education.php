<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'education'
    ];

    public function courses()
    {
        return $this->hasMany(Courses::class);
    }
}
