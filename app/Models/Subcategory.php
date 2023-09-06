<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=['category_id','subcategory_name','subcategory_slug','subcategory_image', 'deleted_at'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
}
