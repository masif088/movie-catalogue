<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes;

    protected $fillable=['title','created_at','updated_at','deleted_at'];
    public function movieGenres(){
        return $this->hasMany('App\Models\MovieGenre');
    }
}
