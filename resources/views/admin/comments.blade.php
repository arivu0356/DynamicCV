@extends('admin.layout.master')

@section('content')
<style>
    .the_border{
        border:1px solid #F6F7FB;
    }
    .the_time_ago{
        background-color: #F6F7FB;
    }
    .not_viewed{
        background-color:#F6F7FB;
    }
    
</style>
{{-- page header --}}
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Comments</h4>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/comment') }}">comments</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- ./page header --}}
<?php 
// PHP program to convert timestamp 
// to time ago 
  
function time_Ago($time) { 
  
    // Calculate difference between current 
    // time and given timestamp in seconds 
     //$diff     = time() - $time; 
    date_default_timezone_set("Asia/Kolkata"); 
    $diff = strtotime(date("Y-m-d").' '.date("h:i:s")) - $time;
      
    // Time difference in seconds 
    $sec     = $diff; 
      
    // Convert time difference in minutes 
    $min     = round($diff / 60 ); 
      
    // Convert time difference in hours 
    $hrs     = round($diff / 3600); 
      
    // Convert time difference in days 
    $days     = round($diff / 86400 ); 
      
    // Convert time difference in weeks 
    $weeks     = round($diff / 604800); 
      
    // Convert time difference in months 
    $mnths     = round($diff / 2600640 ); 
      
    // Convert time difference in years 
    $yrs     = round($diff / 31207680 ); 
      
    // Check for seconds 
    if($sec <= 60) { 
        echo " seconds ago"; 
    } 
      
    // Check for minutes 
    else if($min <= 60) { 
        if($min==1) { 
            echo "one minute ago"; 
        } 
        else { 
            echo "$min minutes ago"; 
        } 
    } 
      
    // Check for hours 
    else if($hrs <= 24) { 
        if($hrs == 1) {  
            echo "an hour ago"; 
        } 
        else { 
            echo "$hrs hours ago"; 
        } 
    } 
      
    // Check for days 
    else if($days <= 7) { 
        if($days == 1) { 
            echo "Yesterday"; 
        } 
        else { 
            echo "$days days ago"; 
        } 
    } 
      
    // Check for weeks 
    else if($weeks <= 4.3) { 
        if($weeks == 1) { 
            echo "a week ago"; 
        } 
        else { 
            echo "$weeks weeks ago"; 
        } 
    } 
      
    // Check for months 
    else if($mnths <= 12) { 
        if($mnths == 1) { 
            echo "a month ago"; 
        } 
        else { 
            echo "$mnths months ago"; 
        } 
    } 
      
    // Check for years 
    else { 
        if($yrs == 1) { 
            echo "one year ago"; 
        } 
        else { 
            echo "$yrs years ago"; 
        } 
    } 
} 
  

?> 


@if(isset($allcomments))
{{-- page body --}}
<div class="page-body">
    <div class="card">
        <div class="card-block">
        <?php $iscomment = 0; ?>
        <?php if(!$comments->isEmpty()) { ?>
            @foreach($comments as $comment)
                @if($comment->commentviewed == 0)
                <div class="row mt-2 the_border <?php if($comment->commentviewed == '0' ) {echo 'not_viewed'; } ?> ">
                    <?php 
                    // Initialize current time 
                    $curr_time = $comment->date.''.$comment->time; 
                    $time_ago = strtotime($curr_time); 
                    ?>
                    <div class="col-sm-12">
                       <span class="the_time_ago"> {{ time_Ago($time_ago) }}</span>
                    </div>
                    <div class="row col-sm-5">
                        <div class="col-sm-3 col-md-6 text-center">
                        <img src="{{ url('') }}/uploads/pp.png" width="120" height="90">
                        </div>
                        <div class="col-sm-9 col-md-6 ">
                            <h6><b>{{ $comment->username }}</b></h6>
                            <span><i><a style="color:green;" href="mailto:{{ $comment->email }}">{{ $comment->email }}</a></i></span><br>
                            <span><i>{{ $comment->date }}</i></span><br>
                            
                        </div>     
                    </div>
                    <div class="row col-sm-7">
                        <div class="col-sm-12">
                            <?php $postviewslug = '';?>
                        <h5>Commented on @foreach($blog as $bg) @if($bg->id == $comment->postid) {{ $bg->title }}<?php  $postviewslug = $bg->slug ?> @endif @endforeach</h5>
                        <span class="pl-4">{{ $comment->comment }}<span>
                        <br>
                        <a href="{{ url('admin/comment/view/') }}/{{ $comment->id }}" style="color:green">view</a> |
                        <a href="{{ url('admin/comment/view/') }}/{{ $comment->id }}" style="color:blue">@if($comment->replay !== null){{ 'Edit Replay' }} @else {{ 'Reply' }} @endif </a> |
                        <a style="color:red;"href="{{ url('') }}/admin/comment/delete/{{$comments[0]->id  }}">Delete</a> |
                        <a href="{{ url('blog') }}/{{ $postviewslug }}" target="_blank" style="color:blue">view post</a> 
                        </div>
                    </div>
                </div>
                <?php $iscomment++; ?>
               @endif
            @endforeach
            <?php } ?>
            @if($iscomment == 0)
                {{ 'No Comments' }}
            @endif
             

            
            
            
        </div>
    </div>
    
</div>
@endif


@if(isset($filter))
{{-- page body --}}
<div class="page-body">
    <div class="card">
        <div class="card-block">
           <?php if(!$comments->isEmpty()) { ?>
            @foreach($comments as $comment)
            
                <div class="row mt-2 the_border <?php if($comment->commentviewed == '0' ) {echo 'not_viewed'; } ?> ">
                    <?php 
                    // Initialize current time 
                    $curr_time = $comment->date.''.$comment->time; 
                    $time_ago = strtotime($curr_time); 
                    ?>
                    <div class="col-sm-12">
                       <span class="the_time_ago"> {{ time_Ago($time_ago) }}</span>
                    </div>
                    <div class="row col-sm-5">
                        <div class="col-sm-3 col-md-6 text-center">
                        <img src="{{ url('') }}/uploads/pp.png" width="120" height="90">
                        </div>
                        <div class="col-sm-9 col-md-6 ">
                            <h6><b>{{ $comment->username }}</b></h6>
                            <span><i><a style="color:green;" href="mailto:{{ $comment->email }}">{{ $comment->email }}</a></i></span><br>
                            <span><i>{{ $comment->date }}</i></span><br>
                            
                        </div>     
                    </div>
                    <div class="row col-sm-7">
                        <div class="col-sm-12">
                        <h5>Commented on @foreach($blog as $bg) @if($bg->id == $comment->postid) {{ $bg->title }}<?php  $postviewslug = $bg->slug ?> @endif @endforeach</h5>
                        <span class="pl-4">{{ $comment->comment }}<span>
                        <br>
                        <a href="{{ url('admin/comment/view/') }}/{{ $comment->id }}" style="color:green">view</a> |
                        <a href="{{ url('admin/comment/view/') }}/{{ $comment->id }}" style="color:blue">@if($comment->replay !== null){{ 'Edit Replay' }} @else {{ 'Reply' }} @endif </a> |
                        <a style="color:red;"href="{{ url('') }}/admin/comment/delete/{{$comments[0]->id  }}">Delete</a>  |
                        <a href="{{ url('blog') }}/{{ $postviewslug }}" style="color:blue">view post</a> 
                        </div>
                    </div>
                </div>
               
            @endforeach
            <?php }else{ ?>
              No Comments
            <?php } ?>

            
            
            
        </div>
    </div>
    
</div>
@endif


@if(isset($view))
{{-- page body --}}
<div class="page-body">
    <div class="card">
        <div class="card-block">
            <div class="row mt-2 the_borde not_viewed pt-3 pb-3">
               <div class="col-sm-2 text-center">
                <img src="{{ url('') }}/uploads/pp.png" width="120" height="90">
               </div>
               <div class="col-sm-10">
                   
                <h5 class="pl-4">{{ $comments[0]->comment }}<h5>
                
               </div>
               <div class="col-sm-12">
                <div class="chat-header"><span style="font-size: 1rem;">{{ $comments[0]->username }}</span> Commented on <span class="text-muted pl-1">{{ $comments[0]->date }}</span> | <a style="color:red;"href="{{ url('') }}/admin/comment/delete/{{$comments[0]->id  }}">Delete</a></div>
               </div>
            </div>
            <div class="row mt-2 the_borde ">

                @if($comments[0]->replay !== null)
                <div class="col-sm-2 text-right">
                    <span>Replayed By</span>
                </div>
                <div class="col-sm-10 not_viewed">
                <button id="edit-info-btn"  class="mt-2" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                    <i class="icofont icofont-edit"></i>
                </button>
                
                    <div class="view-desc">
                            <div class="row">
                                <div class="col-sm-3 text-center not_viewed">
                            
                                    <img src="{{ url('') }}/{{ $log[0]->image }}" width="120" height="90">
                                </div>
                                <div class="col-sm-9 not_viewed">
                                    <h5 class="pl-4 mt-3">{{ $comments[0]->replay }}</h5>
                                </div>
                                <div class="col-sm-12 not_viewed">
                                    <div class="chat-header "><span style="font-size: 1rem;">{{ $log[0]->name }}</span> Replayed on <span class="text-muted pl-1">{{ $comments[0]->replaydate }}</span>
                                </div>
                                    
                                </div>
                            </div>
                    </div>
                    <div class="edit-desc">
                        <div class="row">
                            <div class="col-sm-12 not_viewed " >
                                <form action="{{ url('admin/comment/replay') }}/{{ $comments[0]->id }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="mt-3 mb-3">
                                        <input type="hidden" value="{{ $comments[0]->id }}" name="id">
                                    <textarea rows="5" cols="5" class="form-control" name="replay" placeholder="replay to the comments">{{ $comments[0]->replay }}</textarea>
                                     <div class="text-right m-t-20"><button class="btn btn-primary waves-effect waves-light">Update Replay</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                </div>
                @else
                <div class="col-sm-2"></div>
                    <div class="col-sm-10 not_viewed">
                    <form action="{{ url('admin/comment/replay') }}/{{ $comments[0]->id }}" method="post">
                        {{ csrf_field() }}
                        <div class="mt-3 mb-3">
                            <input type="hidden" value="{{ $comments[0]->id }}" name="id">
                        <textarea rows="5" cols="5" class="form-control" name="replay" placeholder="replay to the comments"></textarea>
                         <div class="text-right m-t-20"><button class="btn btn-primary waves-effect waves-light">Replay</button></div>
                        </div>
                    </form>
                </div>
                @endif
                
           
                
               
            
            
                
            </div>
        </div>
    </div>
</div>
@endif


 

@endsection