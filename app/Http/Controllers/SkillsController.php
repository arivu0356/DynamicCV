<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Sesssion;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //index
    public function index(){

        $this->data['skillscategory'] = DB::table('skillscategory')->get();
        $this->data['skills'] = DB::table('skills')->get();
        $this->data['list'] = true;
       
        return view('admin.skills',$this->data);
    }

    //add
    public function add(Request $request){

        if($_POST){
            $category = $request->category;
            $skill = $request->skill;
            $percentage = $request->percentage;
            DB::table('skills')->insert([
                'skill'=>$skill,
                'category'=>$category,
                'percentage'=>$percentage
            ]);

            return redirect('admin/skills')->with('message','Added Successfully');
        }

        $this->data['add'] = true;
       
        $this->data['skill_cat'] = DB::table('skillscategory')->get();
        return view('admin.skills',$this->data);
        
    }

    //edit
    public function edit(Request $request,$id){

        if($_POST){

            $id = $request->id;
            $category = $request->category;
            $skill = $request->skill;
            $percentage = $request->percentage;
            DB::table('skills')->where('id',$id)->update([
                'skill'=>$skill,
                'category'=>$category,
                'percentage'=>$percentage
            ]);
            return redirect('admin/skills')->with('message','Update Successfully');
        }
        $this->data['edit'] = true;
        $this->data['skills'] = DB::table('skills')->where('id',$id)->get();
        $this->data['skill_cat'] = DB::table('skillscategory')->get();
       
        return view('admin.skills',$this->data);
    }

    //delete
    public function delete($id){
        DB::table('skills')->where('id',$id)->delete();
        return redirect('admin/skills')->with('message','Deleted Successfully');
    }
}
