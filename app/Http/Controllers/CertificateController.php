<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Validator;

class CertificateController extends Controller
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
        $this->data['certificate'] = DB::table('certificate')->get();
       
        return view('admin.certificate',$this->data);
    }

    public function add(Request $request){

        if($_POST){

            $image = $request->file('img');
            if(!isset($image))
            {
                $image = 'upload/certificate/demo.jpg';
            }else{


                request()->validate([
    
                        'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
    
                    ]);

                    $image = $request->file('img');
                    if(!$image = ''){
                        $image = $request->file('img')->getClientOriginalName();
                        $size= $request->file('img')->getSize();
                        $name = 'img'.rand(111,999).$request->file('img')->getClientOriginalName();
                        $image = 'uploads/certificate/'.$name;
                        $request->file('img')->move("uploads/certificate/", $name);
                    }else {
                        $image = 'upload/certificate/demo.jpg';
                
                    }

            }

            $viewcertificate = $request->viewcertificate;
            $cource = $request->cource;
            $year = $request->year;
            $institute = $request->institute;
            DB::table('certificate')->insert([
              'cource'=>$cource,
              'year'=>$year,
              'image'=>$image,
              'institute'=>$institute,
              'viewcertificate'=>$viewcertificate
            ]);

            return redirect('admin/certificate')->with('message','Added Successfully');

        }

        $this->data['add'] = true;
       
        return view('admin.certificate',$this->data);
    }


    public function edit(Request $request,$id){
        if($_POST){

            $image = $request->file('img');
            if(!isset($image))
            {
                $image = $request->img;
            }else{


                request()->validate([
    
                        'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
    
                    ]);

                    $image = $request->file('img');
                    if(!$image = ''){
                        $image = $request->file('img')->getClientOriginalName();
                        $size= $request->file('img')->getSize();
                        $name = 'img'.rand(111,999).$request->file('img')->getClientOriginalName();
                        $image = 'uploads/certificate/'.$name;
                        $request->file('img')->move("uploads/certificate/", $name);
                    }else {
                        $image = 'upload/certificate/demo.jpg';
                
                    }

            }
            
            $id = $request->id;
            $viewcertificate = $request->viewcertificate;
            $cource = $request->cource;
            $year = $request->year;
            $institute = $request->institute;
            DB::table('certificate')->where('id',$id)->update([
              'cource'=>$cource,
              'year'=>$year,
              'image'=>$image,
              'institute'=>$institute,
              'viewcertificate'=>$viewcertificate
            ]);
            return redirect('admin/certificate')->with('message','Updated Successfully');

        }

        $this->data['certificate'] = DB::table('certificate')->where('id',$id)->get();
        $this->data['edit'] = true;
       
        return view('admin/certificate',$this->data);
    }

    public function delete($id){
        DB::table('certificate')->where('id',$id)->delete();
        return redirect('admin/certificate')->with('message','Removed Successfully');
    }


}
