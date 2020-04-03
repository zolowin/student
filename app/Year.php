<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';
    protected $fillable = ['scholastic'];

    public function students(){
        return $this->hasMany('App\Student');
    }
}
