<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $fillable=['title','director','summary','created_at','updated_at','deleted_at'];
    public function movieGenres(){
        return $this->hasMany('App\Models\MovieGenre');
    }


}
