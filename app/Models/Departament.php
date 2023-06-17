<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    public $fillable = ['title', 'parent_id'];

    public function childs()
    {
        return $this->hasMany('App\Models\Departament', 'parent_id', 'id');
    }

    public function requests()
    {
        return $this->hasMany('App\Models\Departament', 'departament_id', 'id');
    }

}
