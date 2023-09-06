<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Childcategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['category_id','subcategory_id','childcategory_name','childcategory_slug','childcategory_image', 'deleted_at'];
    // public function rel_to_category()
    // {
    //     return $this->belongsTo(Category::class,'category_name');
    // }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
