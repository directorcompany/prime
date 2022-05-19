<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','parent_id','user_id'];
    
    public function childs() {
        return $this->hasMany(Category::class,'parent_id','id');
    }

}
