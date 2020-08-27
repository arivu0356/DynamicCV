<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Session;
use Image;
use Storage;
use App\Mailfile;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;


class MailController extends Controller
{
    
    public function MainSentContactus(Request $request){
        
          $getmail = DB::table('login')->where('id','1')->get();
              
            if($_POST){
                $toMail = $getmail[0]->email;
                $data = array(
                        
                        'name' => $request->name,
                        'email' => $request->email,
                        'bodymessage' => $request->message,
                        'toMail' => $toMail,
                        
                    
                    );

                

                Mail::send('mail.mail',$data,function ($message) use($data){
                    $message->from(env('MAIL_USERNAME'), $data['email'],$data['name']);
                    $message->to($data['toMail'])->subject("Your have mail from ".$data['email']);

                });

                return redirect()->back()->with('message','Your email has been sent successfully ');



            }
                    

            

       }
}