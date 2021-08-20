<?php

namespace App\Models\costumer;
use App\Models\product\Product;
use App\Models\loginUsers\Costumer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'costumerId',
        'productId'
    ];

    public function products(){

        return $this->belongsTo(Product::class,'productId');
    }

    public function costumers(){
        return $this->belongsTo(Costumer::class,'costumerId');
    }
}
