<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class ListController extends Controller
{
    public function show()
    {
       $characters = DB::table('users')->where('is_admin','<>',1)->get();
       return view('welcome')->withCharacters($characters);
    }
}
