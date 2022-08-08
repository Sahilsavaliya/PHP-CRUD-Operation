<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDailyworks extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','work_id'];
    protected $guarded = [];

    protected $table = "user_daily_works";

}
