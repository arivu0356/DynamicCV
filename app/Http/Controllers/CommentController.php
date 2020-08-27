<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }

    //index comments
    public function index(){

        $this->data['allcomments'] = true;
        $this->data['blog'] = DB::table('blog')->get();
        $this->data['comments'] = DB::table('comments')->orderBy('id','desc')->get();
        return view('admin.comments',$this->data);
    }

    public function filter_by_post($postid){
        $this->data['filter'] = true;
        $this->data['blog'] = DB::table('blog')->get();
        $this->data['comments'] = DB::table('comments')->where('postid',$postid)->orderBy('id','desc')->get();
         return view('admin.comments',$this->data);
    }

    public function view_post($id){
        $this->data['view']= true;
        $getcommentviewed = DB::table('comments')->where('id',$id)->get();
        $commentviewed = $getcommentviewed[0]->commentviewed;
        $updatecommentviewed = $commentviewed + 1;
        DB::table('comments')->where('id',$id)->update([
            'commentviewed'=>$updatecommentviewed
        ]);
        $this->data['comments'] = DB::table('comments')->where('id',$id)->get();
        return view('admin.comments',$this->data);
    }

    public function replay(Request $request,$id){
        if($_POST){
            $id = $request->id;
            $replay = $request->replay;
            date_default_timezone_set("Asia/Kolkata");
            $date = date("Y/m/d");
            $time = date("h:i:s");
            DB::table('comments')->where('id',$id)->update([
                 'replay'=>$replay,
                 'replaytime'=>$time,
                 'replaydate'=>$date
            ]);
            return redirect('admin/comment/view/'.$id.'')->with('message','commented posted');
        }

    }

    public function delete($id){
        DB::table('comments')->where('id',$id)->delete();
        return redirect('admin/comment')->with('message','commented Deleted');

    }
    
    public function clear_all(Request $request){
         DB::table('comments')->where('commentviewed','0')->update([
            'commentviewed'=>'1',
         ]);
    }
}
