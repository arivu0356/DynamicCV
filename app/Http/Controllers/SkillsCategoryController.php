<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;


class SkillsCategoryController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //index
    public function index(){
         
        $this->data['skillscategory'] = DB::table('skillscategory')->orderBy('skillorder')->get();
        $this->data['list'] = true;
       
        return view('admin.skillscategory',$this->data);
    }

    //add
    public function add(Request $request){
        if($_POST){
            $category = $request->category;
            DB::table('skillscategory')->insert([
                'category'=>$category
            ]);
            return redirect('admin/skillscategory')->with('message','Added Successfully');
        }

        $this->data['add'] = true;
       
        return view('admin.skillscategory',$this->data);
    }

    //edit
    public function edit(Request $request,$id){

        if($_POST){
           $id = $request->id;
           $category = $request->category;
           DB::table('skillscategory')->where('id',$id)->update([
               'category'=>$category
           ]);
           return redirect('admin/skillscategory')->with('message','Updated Successfully');
        }
        $this->data['edit'] = true;
       
        $this->data['skillcat'] = DB::table('skillscategory')->where('id',$id)->get();
        return view('admin.skillscategory',$this->data);
    }

    //delete
    public function delete($id){
        DB::table('skillscategory')->where('id',$id)->delete();
        return redirect('admin/skillscategory')->with('message','Deleted Successfully');
    }

    //ordering the skill category
    public function order(Request $request){
        if(isset($request->order)){
            $order  = explode(",",$request->order);
            for($i=0; $i < count($order);$i++) {
                DB::table('skillscategory')->where('id',$order[$i])->update(['skillorder' => $i]);
            }

        }
    }
}
