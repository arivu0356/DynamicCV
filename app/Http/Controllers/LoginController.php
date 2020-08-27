<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //Login Action
    public function login(Request $request){

        if($request->isMethod('post')){

            $this->validate($request , [
                   'username'      =>  'required',
                   'password'   =>  'required'
           ]);
              
           
           $username = $request->username;
           $password = $request->password;
           $ip  = $request->ip();
          
        
           $user = DB::table('login')->where('username',$username)->count();
           if($user){
                  $pass = DB::table('login')->where('username',$username)->where('password',$password)->count();
                  if($pass){
                       //session
                          Session::put('uname',$username);  
                       date_default_timezone_set("Asia/Calcutta"); 
                       $ipdat = @json_decode(file_get_contents( 
                        "http://www.geoplugin.net/json.gp?ip=" . $ip)); 
                      $location = $ipdat->geoplugin_countryName;
                      $city = $ipdat->geoplugin_city;
                      $region = $ipdat->geoplugin_regionName;
                       DB::table('login')->where('id','1')->update([
                           'date'=>date("jS F Y "),
                         'time'=>date("h:i:s A"),
                         'ip'=>$ip,
                         'state'=>$city.','.$region,
                         'location'=>$location,
                       ]);
                      return redirect('admin/dashboard')->with('login_wecome',' welcome ');
                  }else{
                      return redirect('admin')->with('wrong',' Incorrect password');
                  }


           }else{
               return redirect('admin')->with('wrong',' Incorrect username');
           }

        }

     
 
       return view('admin.login',$this->data);
   }

    public function logout()
    {

    	if(Session::has('uname'))
        {

        }else{
            //no session is created redirect to login section
            return redirect('admin')->with('wrong','Please Login First');
        }
       Session::flush();
        $last = DB::table('login')->where('id','1')->get();
            DB::table('login')->where('id','1')->update([
                'lasttime'=> $last[0]->time,
                'lastip'=> $last[0]->ip,
                'lastdate'=> $last[0]->date,
                'lastlocation'=>$last[0]->location,
                'laststate'=>$last[0]->state,
            ]);
       return redirect('/admin')->with('wrong','Logged Out Success');
    }
}
