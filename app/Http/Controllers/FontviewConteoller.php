<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class FontviewConteoller extends Controller
{
    public function home(){
    
        $Category = DB::table('categories')
        ->where('published',1)
        ->get();
        return view('layout-fontend.Home',['Category' => $Category]);
    }

    public  function travel(){
        $Category = DB::table('categories')->get();
        return view('layout-fontend.Travel',['Category' => $Category]);
    }


    public function sports(){

        return view('layout-fontend.Sports');
    }


    public  function politics(){
        $Category = DB::table('categories')->get();
        return view('layout-fontend.Politics',['Category' => $Category]);
    }

    public  function magazine(){

        return view('layout-fontend.Magazine');
    }

    public  function business(){

        return view('layout-fontend.business');
    }

    public function arts(){

        return view('layout-fontend.arts');
    }

    public  function contact(){

        return view('layout-fontend.Contact');
    }

}
