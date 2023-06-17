<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'admin_id', 'request_id', 'observation'
    ];

    public function request()
    {
        return $this->belongsTo(Requests::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
