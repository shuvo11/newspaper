<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = DB::table('news')->get();
        return view('layout-admin.news.index',['allnews' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoeys = DB::table('category')
        ->where('publication_status',1)    
        ->get();
        return view('layout-admin.news.create',['allcategorys' => $categoeys]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileInfo = $request->file('news_media');

        
        $data=Array();
        $data['news_title']=$request->news_title;
        $data['category_id']=$request->category_id;
        $data['news_short_description']=$request->news_short_description;
        $data['news_description']=$request->news_description;
        $data['news_media']=$request->news_media;
        $data['publication_status']=$request->publication_status;
        $data['latest_news']=$request->latest_news;
        
        $destinationPath = 'storage/news/';
        $fileInfo->move($destinationPath,$fileInfo->getClientOriginalName());
        $data['news_media']=$destinationPath.$fileInfo->getClientOriginalName();
        
        if($data['publication_status']==1)
        {
            $data['published_time']=date('Y-m-d H:i:s');
        }
        else{
            $data['published_time']=null;
        }
        
         $data['created_by']=Session::get('admin_name');
        
        
         
         
        DB::table('news')->insert($data);
        Session::put('message','News added successfully!');
        return redirect('/add-news');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news_info = DB::table('news')
        ->where('id',$id)
        ->first();

    return view('layout-admin.news.edit',['news_info' => $news_info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $fileInfo = $request->file('news_media');

        $id=$request->id;
        $data=Array();
        $data['news_title']=$request->news_title;
        $data['category_id']=$request->category_id;
        $data['news_short_description']=$request->news_short_description;
        $data['news_description']=$request->news_description;
        $data['publication_status']=$request->publication_status;
        $data['latest_news']=$request->latest_news;
        
        $destinationPath = 'storage/news/';
        $fileInfo->move($destinationPath,$fileInfo->getClientOriginalName());
        $data['news_media']=$destinationPath.$fileInfo->getClientOriginalName();

         DB::table('news')
                 ->where('id',$id)
                 ->update($data);
          return redirect('/all-news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
