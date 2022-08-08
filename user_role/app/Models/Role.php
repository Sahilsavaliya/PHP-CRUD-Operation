<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'roles_name',
    ];

    public function users(){
        return $this->hasMany(User::class,'role_id','id');
    }

    
    public function modules() {
        return $this->belongsTo(Module::class,'module_id','id');
    }
}

