<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;



class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'pname','category_id','image','createdby_user','active_status' 
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
