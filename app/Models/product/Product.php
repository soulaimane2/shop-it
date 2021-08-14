<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductCODE',
        'ProductName',
        'Quantity',
        'ProductCategory',
        'ProductSubCategory',
        'ProductBrand',
        'sizes' => 'json',
        'colors' => 'json',
        'amount',
        'discount',
        'description',
        'videoLink',
        'MainImage',
        'imagesLinks' => 'json',
        'sliders'=> 'json',

    ];


    public function productCategory()
    {
        return $this->belongsTo(Categories::class,'ProductCategory');

    }
    public function productSubCategory(){
        return $this->belongsTo(SubCategories::class,'ProductSubCategory');
    }

    public function productBrand(){
        return $this->belongsTo(Brand::class,'ProductBrand');
    }

}
