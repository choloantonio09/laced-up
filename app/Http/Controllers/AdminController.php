<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Item;
use App\Size;
use App\Category;
use App\Brand;

class AdminController extends Controller
{
    public function show()
    {
       $characters = DB::table('users')->where('is_admin','<>',1)->get();
       $brands = Brand::all();
       $sizes = Size::all();
       $categories = Category::all();
       $items = Item::all();
       return view('welcome')->withCharacters($characters)->with('brand',$brands)->with('category',$categories)->with('size',$sizes)->with('item',$items);
    }

    public function brandSave(Request $request)
    {
    	$brand = new Brand;
    	$brand->name = $request->name;
    	$brand->save();
    }

    public function brandRemove($name)
    {
    	$brand = Brand::where('name',$name)->first();
    	$brand->delete();
    }

    public function brandUpdate($name,$newname)
    {
    	$brand = Brand::where('name',$name)->first();
    	$brand->name = $newname;
    	$brand->save();
    }

    public function categorySave(Request $request)
    {
    	$category = new Category;
    	$category->name = $request->name;
    	$category->save();
    }

    public function categoryRemove($name)
    {
    	$category = Category::where('name',$name)->first();
    	$category->delete();
    }

    public function categoryUpdate($name,$newname)
    {
    	$category = Category::where('name',$name)->first();
    	$category->name = $newname;
    	$category->save();
    }

    public function sizeSave(Request $request)
    {
    	$size = new Size;
    	$size->name = $request->name;
    	$size->save();
    }

    public function sizeRemove($name)
    {
    	$size = Size::where('name',$name)->first();
    	$size->delete();
    }

    public function sizeUpdate($name,$newname)
    {
    	$size = Size::where('name',$name)->first();
    	$size->name = $newname;
    	$size->save();
    }
}
