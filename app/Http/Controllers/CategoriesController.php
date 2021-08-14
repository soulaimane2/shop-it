<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    //

    public function showCats(){
        $categories_Data = Categories::all();
        return view('admin.dashboard.categories.index',compact('categories_Data'));
    }

    public function addCat(Request $r){
        $data = new Categories();
        $data->category_name = $r->category_name;
        $data->save();
        return response()->json($data);
    }

    public function updateCat(Request $r,$id){
        $data = Categories::find($id);
        $data->category_name = $r->category_name;
        $data->save();
        return response()->json($data);
    }

    public function deleteCat($id){
        $data = Categories::find($id)->delete();
        return response()->json( 200);
    }
}
