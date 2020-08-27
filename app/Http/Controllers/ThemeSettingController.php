<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ThemeSettingController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }

    //index 
    public function index(){

        $this->data['themeapply'] = DB::table('themeapply')->where('id','1')->get();
        $asset = DB::table('themeapply')->where('id','1')->get();
        $this->data['assetimg'] = DB::table('themeasset')->where('id',$asset[0]->imageurl)->get();
        $this->data['assetvideo'] = DB::table('themeasset')->where('id',$asset[0]->videourl)->get();
        $this->data['list'] = true;
        return view('admin.theme',$this->data);
    }

    //update theme
    public function update_theme(Request $request){
         if($_POST){
             $theme = $request->theme;
             DB::table('themeapply')->where('id','1')->update([
                 'theme'=>$theme
             ]);

            return redirect('admin/theme')->with('message',' Theme Activated ');
         }
    }

    public function update_theme_page(Request $request){

        $filter = $request->filter;
        $image = 0;
        $video = 0;
        $static = 1;
        if($filter == 'image'){
          $image = 1;
          $static = 0;
        }else if($filter == 'video'){
            $video = 1;
            $static = 0;
        }else{
            $static == 1;
        }
        DB::table('themeapply')->where('id','1')->update([
                 'static'=>$static,
                 'image'=>$image,
                 'video'=>$video
        ]);
        return redirect('admin/theme')->with('message',' Theme Activated ');
    }

    public function upload_image(Request $request){
        if($_POST){

            
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
        
            DB::table('themeasset')->insert([
                'type'=>'image',
                'storage'=>$image
            ]);
             return redirect('admin/theme/update')->with('message',' Image Updated ');
        }
    }


    public function upload_video(Request $request){
        if($_POST){

            
                request()->validate([
                    'video' => 'mimes:mp4,mov,ogg | max:20000',

                ]);

                $image = $request->file('video');
                if(!$image = ''){
                        $image = $request->file('video')->getClientOriginalName();
                        $size= $request->file('video')->getSize();
                        $name = 'video'.rand(111,999).$request->file('video')->getClientOriginalName();
                        $image = 'uploads/'.$name;
                        $request->file('video')->move("uploads/", $name);
                }else {
                    $image = 'upload/demo.jpg';
            
                }
            
                DB::table('themeasset')->insert([
                    'type'=>'video',
                    'storage'=>$image
                ]);
             return redirect('admin/theme/update')->with('message',' Video Updated ');
        }
    }

    public function update(){
         
        $this->data['themeapply'] = DB::table('themeapply')->where('id','1')->get();
        $this->data['themeimage'] = DB::table('themeasset')->where('type','image')->get();
        $this->data['themevideo'] = DB::table('themeasset')->where('type','video')->get();
        return view('admin.themesitting',$this->data);
    }


    //active section
    public function image_active(Request $request,$id){
            $id = $request->id;
            DB::table('themeapply')->where('id','1')->update([
                'imageurl'=>$id
            ]);
            return redirect('admin/theme/update')->with('message',' Image actived ');
    }
    
     public function redirect(Request $request){
        return redirect('admin/theme/update')->with('message',' Theme Activated ');
    }

    //active section
    public function video_active(Request $request,$id){
        $id = $request->id;
        DB::table('themeapply')->where('id','1')->update([
            'videourl'=>$id
        ]);
        return redirect('admin/theme/update')->with('message',' Image actived ');
}
     public function themeasset_remove($id){
          DB::table('themeasset')->where('id',$id)->delete();
          return redirect('admin/theme/update')->with('message',' removed ');
     }
 public function resolution(Request $request){
           if($_POST){
               $opacity = $request->opacity;
               DB::table('themeapply')->where('id','1')->update([
                   'opacity'=>$opacity
               ]);
           }
     }


}