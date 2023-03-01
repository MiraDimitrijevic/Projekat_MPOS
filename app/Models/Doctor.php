<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
use HasFactory;


protected $fillable = [
    'name',
    'category',
    'experience',
    'biography',
    'status',
];

public function fav_doctor(){
    return $this->hasMany(FavDoctor::class);
}
public function appointments(){
    return $this->hasMany(Appointments::class);
}


}
