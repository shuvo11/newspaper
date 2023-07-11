<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoeys = DB::table('category')->get();
       return view('layout-admin.allcategory',['allcategorys' => $categoeys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
      
       return view('layout-admin.category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveCategory(Request $request)
    {
        $data=Array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        
        $categoey_info = DB::table('category')
                ->where('category_name',$data['category_name'])
                ->first();
        
        if($categoey_info)
        {
            Session::put('message','Category already added!!');
            return redirect('/Category');
        }
        else{
                DB::table('category')->insert($data);
                Session::put('message','Category added successfully!');
               return redirect('/all-Category');
        }
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function editCategory($id)
    {
          $categoey_info = DB::table('category')
                ->where('id',$id)
                ->first();
        
            return view('layout-admin.edit_category',['category_info' => $categoey_info]);
          
    }

    /**
     * Update the specified resource in storage.
     */

     public function updateCategory(Request $request)
     {
         $id=$request->id;
         $categoryData=Array();
         $categoryData['category_name']=$request->category_name;
         $categoryData['category_description']=$request->category_description;
         $categoryData['publication_status']=$request->publication_status;
         DB::table('category')
                 ->where('id',$id)
                 ->update($categoryData);
          return redirect('/all-Category');
         
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('category')->where('id',$id)->delete();

        return redirect('/all-Category')
            ->with('success','Country deleted');
    }


    public function publish($id)
    {
       
        DB::table('category')
        ->where('id',$id)
        ->update(['publication_status' => 0]);
        return redirect('/all-Category')->with('success', 'Category published successfully.');
    }

    public function unpublish($id)
    {
        DB::table('category')
        ->where('id',$id)
        ->update(['publication_status' => 1]);
        return redirect('/all-Category')->with('success', 'Category published successfully.');
    }




 



}
