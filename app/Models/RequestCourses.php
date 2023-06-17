<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCourses extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'course_id', 'request_id',
    ];

    public function request()
    {
        return $this->belongsTo(Requests::class);
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
