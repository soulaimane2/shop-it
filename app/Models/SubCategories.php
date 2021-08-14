<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class SubCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'Subcategory_name',
        'categoryId'
    ];
    
    public function cats()
    {
        return $this->belongsTo(Categories::class,'category_Id');
    }
    
}
