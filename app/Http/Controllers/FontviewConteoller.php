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
    
        $Category = DB::table('category')
        ->where('publication_status',1)
        ->get();

        $Latest_news = DB::table('news')
        ->where('publication_status',1)
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get(); 

        $Last_news = DB::table('news')
        ->join('category', 'news.category_id', '=', 'category.id')
        ->select('news.*', 'category.category_name')
        ->where('news.publication_status',1)
        ->orderBy('news.id', 'desc')
        ->limit(1)
        ->first(); 
        
        return view('layout-fontend.Home')
                ->with('Category',$Category)
                ->with('Latest_news',$Latest_news)
               ->with('Last_news',$Last_news);
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
