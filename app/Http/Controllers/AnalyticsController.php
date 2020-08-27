<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->data['log'] = DB::table('login')->where('id','1')->get();
        $this->data['thecomment'] = DB::table('comments')->get();
        $this->data['notification'] = DB::table('comments')->orderBy('id', 'desc')->take(2)->get();
    }

    //index
    public function index(){
            
         $this->data['analytics'] = DB::table('analytics')->orderBy('id','desc')->get();
         $this->data['totalvisitor'] = DB::table('analytics')->count();
         $this->data['todayvisitor'] = DB::table('analytics')->where('date',date('d-m-Y'))->count();
         $this->data['totalmobilevisitor'] = DB::table('analytics')->where('device','mobile')->count();
         $this->data['totaldesktopvisitor'] = DB::table('analytics')->where('device','Desktop')->count();
         $this->data['todayDesktop'] = DB::table('analytics')->where('date',date('d-m-Y'))->where('device','Desktop')->count();
         $this->data['todaymobile'] = DB::table('analytics')->where('date',date('d-m-Y'))->where('device','mobile')->count();
         $this->data['totaldownload'] = DB::table('cvdownload')->count();
         $this->data['todaydownload'] = DB::table('cvdownload')->where('date',date('d-m-Y'))->count();
         $this->data['login'] = DB::table('login')->where('id','1')->get();
         $this->data['maxviewed'] = DB::select('SELECT `ip`, COUNT(`ip`) AS count FROM `analytics` GROUP BY `ip` HAVING COUNT(`ip`) > 0 ORDER BY count DESC LIMIT 5');
        return view('admin.analytics',$this->data);
    }

    
}
