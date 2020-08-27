<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //index
    public function index(){

        $this->data['category'] = DB::table('blogcategory')->get();
       
        return view('admin.blogcategory',$this->data);
    }

    //add
    public function add(Request $request){
        if($_POST){
           $id = $request->id;
           $category = $request->category;
           $trimmedslug = trim($request->slug);
           $slug = str_replace(' ','-',$trimmedslug);
           DB::table('blogcategory')->insert([
                'category'=>$category,
                'slug'=>$slug
           ]);

           return redirect('admin/blog/category')->with('message','Updated Successfully');
        }
    } 


    //update
    public function update(Request $request,$id){
             if($_POST){
                $id = $request->id;
                $category = $request->category;
                $trimmedslug = trim($request->slug);
                $slug = str_replace(' ','-',$trimmedslug);
                DB::table('blogcategory')->where('id',$id)->update([
                     'category'=>$category,
                     'slug'=>$slug
                ]);

                return redirect('admin/blog/category')->with('message','Updated Successfully');
             }
    } 

    //remove
    public function remove($id){
        DB::table('blogcategory')->where('id',$id)->delete();
        return redirect('admin/blog/category')->with('message','Removed Successfully');
    }
}
