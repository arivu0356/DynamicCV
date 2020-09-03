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

     public function imageCrop(Request $request){
        $image_file = $request->image;
        // if(isset($image_file)){
        //     list($type, $image_file) = explode(';', $image_file);
        //     list(, $image_file)      = explode(',', $image_file);
        //     $image_file = base64_decode($image_file);
        //     $image_name= time().'_'.rand(100,999).'.png';
        //     $path = public_path('uploads/personal/'.$image_name);
        //     file_put_contents($path, $image_file);
        //   //   file($image_file)->move("uploads/", $image_name);
        //     return $path;
        // }
        if($image_file != 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAFIklEQVR4Xu3VsRHAMAzEsHj/pTOBXbB9pFchyLycz0eAwFXgsCFA4C4gEK+DwENAIJ4HAYF4AwSagD9IczM1IiCQkUNbswkIpLmZGhEQyMihrdkEBNLcTI0ICGTk0NZsAgJpbqZGBAQycmhrNgGBNDdTIwICGTm0NZuAQJqbqREBgYwc2ppNQCDNzdSIgEBGDm3NJiCQ5mZqREAgI4e2ZhMQSHMzNSIgkJFDW7MJCKS5mRoREMjIoa3ZBATS3EyNCAhk5NDWbAICaW6mRgQEMnJoazYBgTQ3UyMCAhk5tDWbgECam6kRAYGMHNqaTUAgzc3UiIBARg5tzSYgkOZmakRAICOHtmYTEEhzMzUiIJCRQ1uzCQikuZkaERDIyKGt2QQE0txMjQgIZOTQ1mwCAmlupkYEBDJyaGs2AYE0N1MjAgIZObQ1m4BAmpupEQGBjBzamk1AIM3N1IiAQEYObc0mIJDmZmpEQCAjh7ZmExBIczM1IiCQkUNbswkIpLmZGhEQyMihrdkEBNLcTI0ICGTk0NZsAgJpbqZGBAQycmhrNgGBNDdTIwICGTm0NZuAQJqbqREBgYwc2ppNQCDNzdSIgEBGDm3NJiCQ5mZqREAgI4e2ZhMQSHMzNSIgkJFDW7MJCKS5mRoREMjIoa3ZBATS3EyNCAhk5NDWbAICaW6mRgQEMnJoazYBgTQ3UyMCAhk5tDWbgECam6kRAYGMHNqaTUAgzc3UiIBARg5tzSYgkOZmakRAICOHtmYTEEhzMzUiIJCRQ1uzCQikuZkaERDIyKGt2QQE0txMjQgIZOTQ1mwCAmlupkYEBDJyaGs2AYE0N1MjAgIZObQ1m4BAmpupEQGBjBzamk1AIM3N1IiAQEYObc0mIJDmZmpEQCAjh7ZmExBIczM1IiCQkUNbswkIpLmZGhEQyMihrdkEBNLcTI0ICGTk0NZsAgJpbqZGBAQycmhrNgGBNDdTIwICGTm0NZuAQJqbqREBgYwc2ppNQCDNzdSIgEBGDm3NJiCQ5mZqREAgI4e2ZhMQSHMzNSIgkJFDW7MJCKS5mRoREMjIoa3ZBATS3EyNCAhk5NDWbAICaW6mRgQEMnJoazYBgTQ3UyMCAhk5tDWbgECam6kRAYGMHNqaTUAgzc3UiIBARg5tzSYgkOZmakRAICOHtmYTEEhzMzUiIJCRQ1uzCQikuZkaERDIyKGt2QQE0txMjQgIZOTQ1mwCAmlupkYEBDJyaGs2AYE0N1MjAgIZObQ1m4BAmpupEQGBjBzamk1AIM3N1IiAQEYObc0mIJDmZmpEQCAjh7ZmExBIczM1IiCQkUNbswkIpLmZGhEQyMihrdkEBNLcTI0ICGTk0NZsAgJpbqZGBAQycmhrNgGBNDdTIwICGTm0NZuAQJqbqREBgYwc2ppNQCDNzdSIgEBGDm3NJiCQ5mZqREAgI4e2ZhMQSHMzNSIgkJFDW7MJCKS5mRoREMjIoa3ZBATS3EyNCAhk5NDWbAICaW6mRgQEMnJoazYBgTQ3UyMCAhk5tDWbgECam6kRAYGMHNqaTUAgzc3UiIBARg5tzSYgkOZmakRAICOHtmYTEEhzMzUiIJCRQ1uzCQikuZkaERDIyKGt2QQE0txMjQgIZOTQ1mwCAmlupkYEBDJyaGs2AYE0N1MjAgIZObQ1m4BAmpupEQGBjBzamk1AIM3N1IiAQEYObc0mIJDmZmpEQCAjh7ZmExBIczM1IiCQkUNbswkIpLmZGhH4AStUAMmSuOW2AAAAAElFTkSuQmCC'){
            list($type, $image_file) = explode(';', $image_file);
            list(, $image_file)      = explode(',', $image_file);
            $image_file = base64_decode($image_file);
            $image_name= time().'_'.rand(100,999).'.png';
            $path = public_path('uploads/personal/'.$image_name);
            file_put_contents($path, $image_file);
            $Thepath = 'public/uploads/personal/'.$image_name;
            DB::table('personalimage')->insert([
                'image'=>$Thepath
             ]);
            
          //   file($image_file)->move("uploads/", $image_name);
            return $path;
        }
   
        
      }
}
