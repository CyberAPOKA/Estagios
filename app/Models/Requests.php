<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'departament_id',
        'level',
        'hiring_type',
        'secretary_phone',
        'responsible',
        'hiring_amount',
        'trainee_name',
        'information',
        'status',
    ];

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }

    public function courses()
    {
        return $this->hasMany(RequestCourses::class, 'request_id', 'id');
    }

    public function approvals()
    {
        return $this->hasMany(RequestApproval::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class, 'request_id');
    }
}
