<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_Works extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_name',
        
    ];
protected $table = 'daily_works';

    public function users() {
        return $this->belongsToMany(User::class,'user_daily_works','user_id','work_id');
    }

    
}
