<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Brand;
class ProductController extends Controller
{
    //

    public function productList(){
        $products = Product::all();

        return view('admin.dashboard.products.index',compact('products'));
    }
    
    public function getsubCat($id){
        $subCat = SubCategories::where('category_Id', $id)->get();
        return response()->json($subCat, 200);
    }

    public function addProduct(){
        $cats = Categories::all();
        $brands = Brand::all();
        return view('admin.dashboard.products.addProduct',compact(['cats','brands']));
    }
    
    public function addProductToDb(Request $r){
        if($r->hasfile('mainImage')){
            if($r->hasfile('uploadFile')){
                $image = $r->file('mainImage');
                $up_location = 'Storage/Products';

                

                $images = array();

                foreach($r->file('uploadFile') as $file){
                    $up_location = 'Storage/Products'; 
                    array_push($images,$this->uploadImage($file,$up_location));
                }

                $productImages = implode(',',$images);
                echo $productImages;

                $product = new Product();
                $product->ProductName = $r->productName;
                $product->ProductCODE = $r->productCode;
                $product->Quantity = $r->quantity;
                $product->ProductCategory = $r->category;
                $product->ProductSubCategory = $r->subcategory;
                $product->ProductBrand = $r->brand;
                $product->sizes = $r->size;
                $product->colors = $r->color;
                $product->amount = $r->price;
                $product->discount = $r->discount;
                $product->description = $r->desc;
                $product->videoLink = $r->video;
                $slides = array(); 
                if(isset($r->MainSlider)){
                    array_push($slides,$r->MainSlider);
                }
                if(isset($r->HotDeal)){
                    array_push($slides,$r->HotDeal);
                }
                if(isset($r->BestRated)){
                    array_push($slides,$r->BestRated);
                }
                if(isset($r->trendProduct)){
                    array_push($slides,$r->trendProduct);
                }
                if(isset($r->Midslider)){
                    array_push($slides,$r->Midslider);
                }
                if(isset($r->HotNew)){
                    array_push($slides,$r->HotNew);
                }
                if(isset($r->buyOne)){
                    array_push($slides,$r->buyOne);
                }
                $product->MainImage = $this->uploadImage($image,$up_location);
                $product->imagesLinks = $productImages;
                $product->sliders = implode(',',$slides);

                print_r($slides);
                $product->save();

                return redirect('/admin/products');
            }
        }
    }


    public function uploadImage($image,$up_location){
        $name = uniqid();
        $extension = strtolower($image->getClientOriginalExtension());
        $imagename = $name.'.'.$extension;
        $fullpath = $up_location.'/'.$imagename;
        $image->move($up_location,$imagename);
        return $fullpath;
    }


    public function deleteItem($id){
        Product::find($id)->delete();
        return response()->json(200);
    }

    public function editItem($id){
        $product = Product::find($id);
        $cats = Categories::all();
        $brands = Brand::all();
        return view('admin.dashboard.products.editItem',compact(['product','cats','brands']));
    }

    public function updateItem(Request $r,$id){
        if($r->hasfile('mainImage')){
            if($r->hasfile('uploadFile')){
                $image = $r->file('mainImage');
                $up_location = 'Storage/Products';

                

                $images = array();

                foreach($r->file('uploadFile') as $file){
                    $up_location = 'Storage/Products'; 
                    array_push($images,$this->uploadImage($file,$up_location));
                }

                $productImages = implode(',',$images);
                echo $productImages;

                $product = Product::find($id);
                $product->ProductName = $r->productName;
                $product->Quantity = $r->quantity;
                if(isset($r->category)){
                    $product->ProductCategory = $r->category;
                    }
                    if(isset($r->subcategory)){
                    $product->ProductSubCategory = $r->subcategory;}
                    if(isset($r->brand)){
                    $product->ProductBrand = $r->brand;}
                $product->sizes = $r->size;
                $product->colors = $r->color;
                $product->amount = $r->price;
                $product->discount = $r->discount;
                $product->description = $r->desc;
                $product->videoLink = $r->video;
                $slides = array(); 
                if(isset($r->MainSlider)){
                    array_push($slides,$r->MainSlider);
                }
                if(isset($r->HotDeal)){
                    array_push($slides,$r->HotDeal);
                }
                if(isset($r->BestRated)){
                    array_push($slides,$r->BestRated);
                }
                if(isset($r->trendProduct)){
                    array_push($slides,$r->trendProduct);
                }
                if(isset($r->Midslider)){
                    array_push($slides,$r->Midslider);
                }
                if(isset($r->HotNew)){
                    array_push($slides,$r->HotNew);
                }
                if(isset($r->buyOne)){
                    array_push($slides,$r->buyOne);
                }
                $product->sliders = implode(',',$slides);
                $product->MainImage = $this->uploadImage($image,$up_location);
                $product->imagesLinks = $productImages;
                

                $product->save();

                return redirect('/admin/products');
            }else{
                $product = Product::find($id);
                $product->ProductName = $r->productName;
                $product->Quantity = $r->quantity;
                if(isset($r->category)){
                    $product->ProductCategory = $r->category;
                    }
                    if(isset($r->subcategory)){
                    $product->ProductSubCategory = $r->subcategory;}
                    if(isset($r->brand)){
                    $product->ProductBrand = $r->brand;}
                $product->sizes = $r->size;
                $product->colors = $r->color;
                $product->amount = $r->price;
                $product->discount = $r->discount;
                $product->description = $r->desc;
                $product->videoLink = $r->video;
                $slides = array(); 
                if(isset($r->MainSlider)){
                    array_push($slides,$r->MainSlider);
                }
                if(isset($r->HotDeal)){
                    array_push($slides,$r->HotDeal);
                }
                if(isset($r->BestRated)){
                    array_push($slides,$r->BestRated);
                }
                if(isset($r->trendProduct)){
                    array_push($slides,$r->trendProduct);
                }
                if(isset($r->Midslider)){
                    array_push($slides,$r->Midslider);
                }
                if(isset($r->HotNew)){
                    array_push($slides,$r->HotNew);
                }
                if(isset($r->buyOne)){
                    array_push($slides,$r->buyOne);
                }
                $product->sliders = implode(',',$slides);
                $product->save();
                return redirect('/admin/products');
            }
        }else{
                $product = Product::find($id);
                $product->ProductName = $r->productName;
                $product->Quantity = $r->quantity;
                if(isset($r->category)){
                $product->ProductCategory = $r->category;
                }
                if(isset($r->subcategory)){
                $product->ProductSubCategory = $r->subcategory;}
                if(isset($r->brand)){
                $product->ProductBrand = $r->brand;
                }
                $product->sizes = $r->size;
                $product->colors = $r->color;
                $product->amount = $r->price;
                $product->discount = $r->discount;
                $product->description = $r->desc;
                $product->videoLink = $r->video;
                $slides = array(); 
                if(isset($r->MainSlider)){
                    array_push($slides,$r->MainSlider);
                }
                if(isset($r->HotDeal)){
                    array_push($slides,$r->HotDeal);
                }
                if(isset($r->BestRated)){
                    array_push($slides,$r->BestRated);
                }
                if(isset($r->trendProduct)){
                    array_push($slides,$r->trendProduct);
                }
                if(isset($r->Midslider)){
                    array_push($slides,$r->Midslider);
                }
                if(isset($r->HotNew)){
                    array_push($slides,$r->HotNew);
                }
                if(isset($r->buyOne)){
                    array_push($slides,$r->buyOne);
                }
                $product->sliders = implode(',',$slides);
                $product->save();
                return redirect('/admin/products');
        }
    }


    public function showProductPage($id){
        $product = Product::find($id);
        return view('front-end.productPage',compact('product'));
    }
}
