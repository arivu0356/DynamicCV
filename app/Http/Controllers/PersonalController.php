<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //index
    public function index(Request $request){
        
        if($_POST){

            $image = $request->file('img');
            if(!isset($image))
            {
                
            }else{


                request()->validate([
    
                        'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
    
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

                    DB::table('personalimage')->insert([
                       'image'=>$image
                    ]);

            }
        
            $name = $request->name;
            $email = $request->email;
            $phoneno = $request->phoneno;
            $address = $request->address;
            $role = $request->role;
            $linkedin = $request->linkedin;
            $twitter = $request->twitter;
            $github = $request->github;
            $medium = $request->medium;

            DB::table('personal')->where('id','1')->update([
                'name'=>$name,
                'email'=>$email,
                'phoneno'=>$phoneno,
                'address'=>$address,
                'role'=>$role,
                'linkedin'=>$linkedin,
                'twitter'=>$twitter,
                'github'=>$github,
                'medium'=>$medium
            ]);

            return redirect('admin/personal')->with('message','Updated Successfully');

        }

        $this->data['personal'] = DB::table('personal')->where('id','1')->get();
        $this->data['personalimage'] = DB::table('personalimage')->get();
       

        return view('admin.personal',$this->data);
    }


    public function delete($id){
      
        DB::table('personalimage')->where('id',$id)->delete();
        return redirect('admin/personal')->with('message','Image Deleted Successfully');
    }
}
