<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //index
    public function index(){
        $this->data['login'] = DB::table('login')->where('id','1')->get();
       
        return view('admin.setting',$this->data);
    }

    //update password
    public function update_passwword(Request $request){
        if($_POST){
           $password = $request->password;
           $newpassword = $request->newpassword;
           
           if(isset($password)){
               $passResult = DB::table('login')->where('id','1')->where('password',$password)->count();
               if($passResult){

                   if(isset($newpassword)){
                       DB::table('login')->where('id','1')->update([
                         'password'=>$newpassword,
                       ]);
                     return redirect('admin/setting')->with('passmessage','Saved Successfully')->with('password','active');

                   }else{
                       return redirect('admin/setting')->with('passwrong','please provide newpassword')->with('password','active');
                   }
               }else{
                   return redirect('admin/setting')->with('passwrong',' Incorrect current password')->with('password','active');
               }
           }
        }
   }

        //update profile
        public function update_profile(Request $request){
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
                            $image = 'uploads/'.$name;
                            $request->file('img')->move("uploads/", $name);
                    }else {
                        $image = 'upload/demo.jpg';
                
                    }
                }
                $name = $request->name;
                $username = $request->username;
                $email = $request->email;

                DB::table('login')->where('id','1')->update([
                    'name'=>$name,
                    'username'=>$username,
                    'email'=>$email,
                    'image'=>$image
                ]);
                return redirect('admin/setting')->with('message','Saved Successfully');
            }
        }
}
