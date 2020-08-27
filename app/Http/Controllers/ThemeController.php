<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ThemeController extends Controller
{
    public function __construct()
    {
        
        
        
        $this->data['educationcount'] = DB::table('education')->count();
        $this->data['experiencecount'] = DB::table('experience')->count();
        $this->data['certificatecount'] = DB::table('certificate')->count();
        $this->data['skillscategorycount'] = DB::table('skillscategory')->count();
        $this->data['blogcount'] = DB::table('blog')->count();
        $this->data['skillscount'] = DB::table('skills')->count();
        $this->data['portfoliocount'] = DB::table('portfolio')->count();
        
        
        
       $asset = DB::table('themeapply')->where('id','1')->get();
        $this->data['assetimg'] = DB::table('themeasset')->where('id',$asset[0]->imageurl)->get();
        $this->data['assetvideo'] = DB::table('themeasset')->where('id',$asset[0]->videourl)->get();
        
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['seo'] = DB::table('seo')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }
    
    public function index(){

        $this->data['education'] = DB::table('education')->get();
        $this->data['experience'] = DB::table('experience')->orderBy('id', 'desc')->get();
        $this->data['skillscategory'] = DB::table('skillscategory')->orderBy('skillorder')->get();
        $this->data['skills'] = DB::table('skills')->get();
        $this->data['about'] = DB::table('about')->where('id','1')->get();
        $this->data['certificate'] = DB::table('certificate')->get();
        $this->data['personal'] = DB::table('personal')->where('id','1')->get();
        $this->data['personalimage'] = DB::table('personalimage')->get();
        $this->data['themeapply'] = DB::table('themeapply')->where('id','1')->get();
        $this->data['blog'] = DB::table('blog')->orderBy('date', 'desc')->take(3)->get();
        $this->data['port'] = DB::table('portfolio')->get();
        $this->data['portcategory'] = DB::table('portfoliocategory')->get();


        $this->data['educationcount'] = DB::table('education')->count();
        $this->data['experiencecount'] = DB::table('experience')->count();
        $this->data['certificatecount'] = DB::table('certificate')->count();
        $this->data['skillscategorycount'] = DB::table('skillscategory')->count();
        $this->data['blogcount'] = DB::table('blog')->count();
        $this->data['skillscount'] = DB::table('skills')->count();
        $this->data['portfoliocount'] = DB::table('portfolio')->count();
        
          $asset = DB::table('themeapply')->where('id','1')->get();
        $this->data['assetimg'] = DB::table('themeasset')->where('id',$asset[0]->imageurl)->get();
        $this->data['assetvideo'] = DB::table('themeasset')->where('id',$asset[0]->videourl)->get();
        
        $themeapply = DB::table('themeapply')->where('id','1')->get();
        if($themeapply[0]->theme == '1'){
            return view('theme1.index',$this->data);
        }else{
            return view('theme2.index',$this->data);
        }
                
    }

    public function blog(){




        $this->data['blog'] = DB::table('blog')->paginate(4);
        $this->data['blogcategory'] = DB::table('blogcategory')->get();
        $this->data['themeapply'] = DB::table('themeapply')->where('id','1')->get();
        $this->data['personal'] = DB::table('personal')->where('id','1')->get();
        
        $themeapply = DB::table('themeapply')->where('id','1')->get();
        if($themeapply[0]->theme == '1'){
            return view('theme1.blog',$this->data);
        }else{
            return view('theme2.blog',$this->data);
        }
       
    }

    public function category($slug){

        $this->data['blog'] = DB::table('blog')->where('category', 'LIKE', '%' . $slug . '%')->paginate(4);
        $this->data['blogcategory'] = DB::table('blogcategory')->get();
        $this->data['thecategory'] = DB::table('blogcategory')->where('slug',$slug)->get();
        $this->data['themeapply'] = DB::table('themeapply')->where('id','1')->get();
        $this->data['personal'] = DB::table('personal')->where('id','1')->get();
        $themeapply = DB::table('themeapply')->where('id','1')->get();
        if($themeapply[0]->theme == '1'){
            return view('theme1.category',$this->data);
        }else{
            return view('theme2.category',$this->data);
        }
    }

    public function post($slug){

        $this->data['blog'] = DB::table('blog')->where('slug',$slug)->get();
        $this->data['blogcategory'] = DB::table('blogcategory')->get();
        $this->data['themeapply'] = DB::table('themeapply')->where('id','1')->get();
        $this->data['personal'] = DB::table('personal')->where('id','1')->get();
        $this->data['displaycomment'] = DB::table('comments')->get();
        $themeapply = DB::table('themeapply')->where('id','1')->get();
        if($themeapply[0]->theme == '1'){
            return view('theme1.blogsingpage',$this->data);
        }else{
            return view('theme2.blogsingpage',$this->data);
        }
    }

    public function comment_post(Request $request){
        if($_POST){
             
            $postid = $request->postid;
            $username = $request->username;
            $comment = $request->comment;
            $email = $request->email;
            $slug = $request->slug;
            $date = date("Y/m/d");
            $commentviewed = 0;
            date_default_timezone_set("Asia/Kolkata");
            $time = date("h:i:s");

            DB::table('comments')->insert([
                 'username' => $username, 
                 'email' => $email,
                 'comment' => $comment,
                 'postid' => $postid,
                 'date' => $date,
                 'time' => $time,
                 'commentviewed'=>$commentviewed
            ]);

            $response_json = "
            <div class='comments col-sm-12'>
             <div class='single-comment media'>
            <div class='col-md-10 col-sm-10 comment-details media-body text-left'>
            <h3 class='text-left'>$username</h3>
            <span>$date</span>
            <p>$comment</p>
            </div>
            </div>
            </div>";

            return $response_json;

            // return redirect('blog/'.$slug.'')->with('message','commented posted');
        }
    }

    public function visitor_update(Request $request){
        $ip = $request->ip;
        $date = $request->date;
        $time = $request->time;
        $useragent = $request->agent;
        $url = $request->url;
        if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$useragent)){
                 $device = 'Mobile';
           }else{
                $device = 'Desktop';
           }
        $ipdat = @json_decode(file_get_contents( 
            "http://www.geoplugin.net/json.gp?ip=" . $ip)); 
        $location = $ipdat->geoplugin_countryName;
        $city = $ipdat->geoplugin_city;
        $region = $ipdat->geoplugin_regionName;
        $page = $request->page;

        DB::table('analytics')->insert([
            'ip'=>$ip,
            'date'=>$date,
            'time'=>$time,
            'useragent'=>$useragent,
            'device'=>$device,
            'url'=>$url,
            'location'=>$location,
            'page'=>$page,
            'region'=>$city.','.$region,
        ]);
    }
    
    public function cv_download(Request $request){
        $date = $request->date;
        $time = $request->time;
        DB::table('cvdownload')->insert([
            'date'=>$date,
            'time'=>$time,
        ]);
    }
}