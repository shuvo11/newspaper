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
     
      
        return view('layout-admin.allcategory');
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
               return redirect('/view-category');
        }
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
       
      
    return view('Backendlayout.category.edit',compact('category','id'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

            $request->validate([
                'name' => 'required',
                'description' => 'required',
                
            ]);
            


           DB::table('categories')
                ->where('id',$id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                ]);

            
            return redirect('/index')
            ->with('success','Category updated');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();

        return redirect('/index')
            ->with('success','Country deleted');
    }





    // public function publish($id)
    // {
       
    //    $data = Category::find($id)->update(['published' => false]);

    //     // DB::table('categories')
    //     // ->where('id',$id)
    //     // ->updateOrInsert(['published' => '1']);

    //     return redirect('/index')->with('success','Category publish');
    // }
    

    // public function unpublish($id)
    // {
       
    //     $data = Category::find($id)->update(['published' => true]);

    //     // DB::table('categories')
    //     // ->where('id',$id)
    //     // ->updateOrInsert(['published' => '1']);

    //     // dd($data);
    //     return redirect('/index')->with('success','Category unpublish');
    // }


    public function publish($id)
    {
       
        DB::table('categories')
        ->where('id',$id)
        ->update(['published' => 0]);
        return redirect('/index')->with('success', 'Category published successfully.');
    }

    public function unpublish($id)
    {
        DB::table('categories')
        ->where('id',$id)
        ->update(['published' => 1]);
        return redirect('/index')->with('success', 'Category published successfully.');
    }









}
