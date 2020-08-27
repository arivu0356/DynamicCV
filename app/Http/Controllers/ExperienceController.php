<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ExperienceController extends Controller
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
        $this->data['exper'] = DB::table('experience')->orderBy('id', 'desc')->get();
       
        return view('admin.experience',$this->data);
    }


    //add
    public function add(Request $request){

        if($_POST){
            $year = $request->year;
            $role = $request->role;
            $companyname = $request->companyname;
            $designation = $request->designation;

            DB::table('experience')->insert([
                'year'=>$year,
                'role'=>$role,
                'companyname'=>$companyname,
                'designation'=>$designation
            ]);

            return redirect('admin/experience')->with('message','Added Successfully ');
        }
         
        $this->data['add'] = true;
       
        return view('admin.experience',$this->data);
    }


    //edit
    public function edit(Request $request,$id){

        if($_POST){

            $id = $request->id;
            $year = $request->year;
            $role = $request->role;
            $companyname = $request->companyname;
            $designation = $request->designation;

            DB::table('experience')->where('id',$id)->update([
                'year'=>$year,
                'role'=>$role,
                'companyname'=>$companyname,
                'designation'=>$designation
            ]);

            return redirect('admin/experience')->with('message','Updated Successfully ');
        }
        $this->data['exper'] = DB::table('experience')->where('id',$id)->get();
        $this->data['edit'] = true;
       

        return view('admin.experience',$this->data);

    }

    //delete
    public function delete($id){

        DB::table('experience')->where('id',$id)->delete();
        return redirect('admin/experience')->with('message','Deleted Successfully ');
    }
}
