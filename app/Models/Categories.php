<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategories;
class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    public function subcategories(){
        return $this->hasMany(SubCategories::class);
    }
}
