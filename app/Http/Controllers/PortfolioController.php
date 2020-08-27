<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //index
    public function index(){

        $this->data['list'] = true;
        $this->data['comment'] = DB::table('comments')->get();
        $this->data['analytics'] = DB::table('analytics')->get();
        $this->data['portfolio'] = DB::table('portfolio')->get();
       
        return view('admin.portfolio',$this->data);
    }

    //add post
    public function add(Request $request){

        if($_POST){

            request()->validate([
    
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'slug' => 'required',
                'title' => 'required',

            ]);

            $image = $request->file('img');
            if(!$image = ''){
                    $image = $request->file('img')->getClientOriginalName();
                    $size= $request->file('img')->getSize();
                    $name = 'img'.rand(111,999).$request->file('img')->getClientOriginalName();
                    $image = 'uploads/'.$name;
                    $request->file('img')->move("uploads/", $name);
            }else {
                $image = 'upload/demo.jpg';
        
            }

            $check = $request->get('category');
            if(isset($check)){
                $category = implode(",", str_replace(' ','-',$request->get('category')));
            }else{
                $category = '';
            }

            $meta = $request->meta;
            $title = $request->title;
            $content = $request->content;
            $trimmedslug = trim($request->slug);
            $slug = str_replace(' ','-',$trimmedslug);
            $date = $request->date;
            if(!isset($date)){
                $date = date("Y/m/d");
            }

            DB::table('portfolio')->insert([
                'slug'=>$slug,
                'title'=>$title,
                'meta'=>$meta,
                'content'=>$content,
                'category'=>$category,
                'featuredimage'=>$image,
                'date'=>$date
            ]);

            return redirect('admin/portfolio')->with('message','Post Published Successfully');

        }

        $this->data['add'] = true;
        $this->data['portfoliocategory'] = DB::table('portfoliocategory')->get();
       
        return view('admin.portfolio',$this->data);
    }

    //edit post
    public function edit(Request $request,$id){

        if($_POST){

            request()->validate([
                'slug' => 'required',
                'title' => 'required',
                'date' => 'required'

            ]);


            $image = $request->file('img');
                if(!isset($image))
                {
                    $image = $request->img;
                }else{

                    $image = $request->file('img');
                    if(!$image = ''){
                            $image = $request->file('img')->getClientOriginalName();
                            $size= $request->file('img')->getSize();
                            $name = 'img'.rand(111,999).$request->file('img')->getClientOriginalName();
                            $image = 'uploads/'.$name;
                            $request->file('img')->move("uploads/", $name);
                    }else {
                        $image = 'upload/demo.jpg';
                
                    }

                }
                $check = $request->get('category');
                if(isset($check)){
                    $category = implode(",", str_replace(' ','-',$request->get('category')));
                }else{
                    $category = '';
                }
    
                $id = $request->id;
                $meta = $request->meta;
                $title = $request->title;
                $content = $request->content;
                $trimmedslug = trim($request->slug);
                $slug = str_replace(' ','-',$trimmedslug);
                $date = $request->date;
                if(!isset($date)){
                    $date = date("Y/m/d");
                }
    
                DB::table('portfolio')->where('id',$id)->update([
                    'slug'=>$slug,
                    'title'=>$title,
                    'meta'=>$meta,
                    'content'=>$content,
                    'category'=>$category,
                    'featuredimage'=>$image,
                    'date'=>$date
                ]);
    
                return redirect('admin/portfolio')->with('message','Update and Published Successfully');


        }
        $this->data['edit'] = true;
        $this->data['portfoliocategory'] = DB::table('portfoliocategory')->get();
        $this->data['portfolio'] = DB::table('portfolio')->where('id',$id)->get();
       
        return view('admin.portfolio',$this->data);
    }

    //delete post
    public function delete($id){

        DB::table('portfolio')->where('id',$id)->delete();
        return redirect('admin/portfolio')->with('message','Post Removed Successfully');
    }

}
