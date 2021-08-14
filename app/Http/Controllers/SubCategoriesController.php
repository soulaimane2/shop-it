<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Models\Categories;

class SubCategoriesController extends Controller
{
    public function showSubCats(){

        $subCat = SubCategories::all();
        $category = Categories::all();
        return view('admin.dashboard.subCategories.index',compact(['subCat','category']));
    }



    public function addsubCat(Request $r){
        $data = new SubCategories();
        $data->subCategory = $r->SubCategory;
        $data->category_Id = $r->category_Id;
        $data->save();

        return response()->json($data, 200);
    }

    public function updateSubCat(Request $r,$id){
        $data = SubCategories::find($id);
        $data->subCategory = $r->SubCategory;
        $data->category_Id = $r->category_Id;
        $data->save();

        return response()->json($data, 200);
    }

    public function deleteSubCat($id){
        SubCategories::find($id)->delete();
        return response()->json(200);
    }
}
