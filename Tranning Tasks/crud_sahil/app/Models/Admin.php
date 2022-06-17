<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','gender','hobbies','email','password'  
    ];
    public function setHobbiesAttribute($data)
    {
        $this->attributes['hobbies'] =  json_encode($data);
    }
    public function getHobbiesAttribute($data)
    {
        return $this->attributes[' jhghv'] = json_decode($data);
    }
}
