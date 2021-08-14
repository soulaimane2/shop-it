<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //

    public function showBrands(){
        $brands = Brand::all();
        return view('admin.dashboard.brands.index',compact('brands'));
    }

    public function addBrand(Request $r){

        if($r->hasfile('brandImage')){

            $file = $r->file('brandImage');
            $fileNewName = uniqid();
            $extension = $file->getClientOriginalExtension();
            $fullFileName = $fileNewName.'.'.$extension;
            $upload_path = "Storage\Brands";
            $fullpath = $upload_path . '\\' . $fullFileName;
            $file->move($upload_path , $fullFileName);
        
            $brand = new Brand();
            $brand->brandName = $r->brandName;
            $brand->brandImage = $fullpath;
            $brand->save();

            return response()->json([$brand,asset($fullpath)], 200);

        
        }else{
            return response()->json( 404);
        }

    }


    public function dltBrand($id){
        Brand::find($id)->delete();
        return response()->json('deleted',200);
    }


    public function updateBrands(Request $r, $id){
        if($r->hasfile('brandImage')){

            $file = $r->file('brandImage');
            $fileNewName = uniqid();
            $extension = $file->getClientOriginalExtension();
            $fullFileName = $fileNewName.'.'.$extension;
            $upload_path = "Storage\Brands";
            $fullpath = $upload_path . '\\' . $fullFileName;
            $file->move($upload_path , $fullFileName);
        
            $brand = Brand::find($id);
            $brand->brandName = $r->brandName;
            $brand->brandImage = $fullpath;
            $brand->save();

            return response()->json([$brand,asset($fullpath)], 200);

        
        }
    }
}
