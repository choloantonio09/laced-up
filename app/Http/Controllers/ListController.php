<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Item;
use App\Size;
use App\Category;
use App\Brand;

class ListController extends Controller
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
}
