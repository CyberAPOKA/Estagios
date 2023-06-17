<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Education;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'course'
    ];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function requestcourses()
    {
        return $this->hasMany(RequestCourses::class);
    }
}
