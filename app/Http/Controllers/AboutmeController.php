<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;

class AboutmeController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    //update
    public function update(Request $request){
            
        if($_POST){

            $image  = $request->file('img');
            $pdf = $request->file('pdf');
            if(!isset($pdf)){
                $pdf = $request->pdf;
            }else{
                
                request()->validate([
    
                    'pdf' => 'mimetypes:application/pdf|max:10000',

                ]);

                $pdf = $request->file('pdf');
                if(!$pdf = ''){
                        $pdf = $request->file('pdf')->getClientOriginalName();
                        $size= $request->file('pdf')->getSize();
                        $name = 'pdf'.rand(111,999).$request->file('pdf')->getClientOriginalName();
                        $pdf = 'uploads/'.$name;
                        $request->file('pdf')->move("uploads/", $name);
                }else {
                    $pdf = $request->pdf;
            
                }

            }
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
                        $image = $request->img;
                
                    }

            }
            $describeyou = $request->describeyou;
            $tag = $request->tag;

            DB::table('about')->where('id','1')->update([
                'describeyou' => $describeyou,
                'tag'=>$tag,
                'image' => $image,
                'pdf'=>$pdf
            ]);

            return redirect('admin/about')->with('message','Updated Successfully');
        
        }
       
        $this->data['about'] = DB::table('about')->where('id','1')->get();
        return view('admin.aboutme',$this->data);
    }
}
