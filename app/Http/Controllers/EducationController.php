<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class EducationController extends Controller
{

    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //view
    public function index(){
         
        $this->data['education_table'] = DB::table('education')->get();
       
        $this->data['list'] = true;
        return view('admin.education',$this->data);
    }


    //add
    public function add(Request $request){

        if($_POST){
            
          $degreename = $request->degree;
          $institutename = $request->institute;

          DB::table('education')->insert([
              'degreename'=>$degreename,
              'institutename'=>$institutename
          ]);

         return redirect('admin/education')->with('message','Added Successfully ');

        }
       
        $this->data['add'] = true;
        return view('admin.education',$this->data);
    }

    //edit
    public function edit(Request $request,$id){

        if($_POST){
         $id = $request->id;
         $degreename = $request->degree;
         $institutename = $request->institute;

         DB::table('education')->where('id',$id)->update([
            'degreename'=>$degreename,
            'institutename'=>$institutename
         ]);

         return redirect('admin/education')->with('message','Updated Successfully ');
        }
        $this->data['edit_education'] = DB::table('education')->where('id',$id)->get();
       
        $this->data['edit'] =  true;
        return view('admin.education',$this->data);
    }

    //delete
    public function delete($id){
       
        DB::table('education')->where('id',$id)->delete();
        return redirect('admin/education')->with('message','Deleted Successfully ');
    }



}


