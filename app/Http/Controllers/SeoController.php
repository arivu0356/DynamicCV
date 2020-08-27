<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }

    //index
    public function index(){
        $this->data['seo'] = DB::table('seo')->where('id','1')->get();
        return view('admin.seo',$this->data);
    }

    //seo 
    public function seo(Request $request){
        if($_POST){
            $title = $request->title;
            $keywords = $request->keywords;
            $descri = $request->descri;
            DB::table('seo')->where('id','1')->update([
               'title'=>$title,
               'keywords'=>$keywords,
               'description'=>$descri
            ]);
            return redirect('admin/seo')->with('message','Updated Successfully ')->with('seo_active','active');
        }
    }

    //open graph 
    public function og(Request $request){
        if($_POST){

        $og_type = $request->og_type;
        $og_title = $request->og_title;
        $og_url = $request->og_url;
        $og_description = $request->og_description;
        $twitter_title = $request->twitter_title;
        $twitter_description = $request->twitter_description;
        $twitter_url = $request->twitter_url;
        DB::table('seo')->where('id','1')->update([
            'og_type'=>$og_type,
            'og_title'=>$og_title,
            'og_url'=>$og_url,
            'og_description'=>$og_description,
            'twitter_title'=>$twitter_title,
            'twitter_description'=>$twitter_description,
            'twitter_url'=>$twitter_url
            ]);
            return redirect('admin/seo')->with('message','Updated Successfully ')->with('og_active','active');
        }
    }

    //Google Analytics
    public function google_analytics(Request $request){
        if($_POST){
            $google_analytics = $request->google_analytics;
            DB::table('seo')->where('id','1')->update([
                'google_analytics'=>$google_analytics
            ]);
            return redirect('admin/seo')->with('message','Updated Successfully ')->with('google_analytics_active','active');
        }
    }

    //tags
    public function tags(Request $request){
          if($_POST){
            $other_tags = $request->other_tags;
            DB::table('seo')->where('id','1')->update([
                'other_tags'=>$other_tags
            ]);
            return redirect('admin/seo')->with('message','Updated Successfully ')->with('tags_active','active');

          }
    }
}
