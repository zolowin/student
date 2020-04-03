<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['name', 'gender', 'dob','year_id'];

    public function year(){
        return $this->belongsTo('App\Year');
    }
}
