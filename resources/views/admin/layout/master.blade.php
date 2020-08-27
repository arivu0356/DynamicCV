@include('admin.layout.header')
<style>
    .hint{
        font-size: 0.6rem;
    }
    .view_notification{
      display: block;
    }
    .hide_notification{
      display: none;
    }
</style>
<body>

 

 {{-- theme loader --}}
 <div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
 {{-- ./theme loader --}}


 <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="feather icon-menu"></i>
</a>
<a href="{{ url('admin/dashboard') }}"><img alt="Qries" src="{{ url('')  }}/theme1/assets/images/pradeeptextlogo.png"
         width="190" height="50">



</a>
                    <a class="mobile-options">
<i class="feather icon-more-horizontal"></i>
</a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        {{-- <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li> --}}
                        <li>
                            <a href="#!" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" data-cf-modified-b014fea31b3a08cf8a2ce164-="">
<i class="feather icon-maximize full-screen"></i>
</a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    <?php
                                    $count = 0; 
                                    $view = 0;
                                    foreach($thecomment as $comments){
                                        if($comments->commentviewed == '0'){
                                            $count = $count + 1;
                                        }
                                    } ?>
                                    @if($count)
                                      <span class="badge bg-c-pink" id="clear_count"> {{ $count }}</span>
                                    @endif 
                                </div>
                               <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <h6>Notifications</h6>
                                    </li>
                                    @if(!$notification->isEmpty())
                                    @foreach($notification as $notifiy)
                                    @if($notifiy->commentviewed == 0)
                                    <a href="{{ url('admin/comment/view') }}/{{ $notifiy->id }}">
                                    <li class="the_message" @if($notifiy->commentviewed == 0)  style="background-color:#F6F7FB;"@endif>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ url('') }}/admin-asset/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">{{ $notifiy->username }}</h5>
                                                <p class="notification-msg">{{ $notifiy->comment }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    </a>
                                    <?php $view++;  ?>
                                    @endif
                                    @endforeach
                                    @if($view !== 0)
                                    <div class="row the_message">
                                        <div class="col-sm-6">
                                            <a href="{{ url('admin/comment') }}">
                                                    <span  class="notification-msg">Read More</span>
                                            </a>
                                        </div>
                                        <div class="col-sm-6" id="Notifi">
                                            <a href="javascript:void(0);" id="Clearone" >Clear Notification</a>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    <li class="text-center <?php if($view == 0){ echo 'view_notification'; }else{ echo 'hide_notification'; } ?> " id="shownotifi" ><span  class="notification-msg">No Notifications</span></li>
                                    
                                    
                                    
                                    {{-- <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="{{ url('') }}/admin-asset/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                        
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('') }}/{{ $log[0]->image }}" class="img-radius" alt="User-Profile-Image">
                                    <span>{{ $log[0]->name }}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="{{ url('') }}" target="_blank">
<i class="fa fa-eye"></i> view site
</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/setting') }}">
<i class="feather icon-settings"></i> Settings
</a>
                                    </li>
                                    {{-- <li>
                                        <a href="user-profile.html">
<i class="feather icon-user"></i> Profile
</a>
                                    </li>
                                    <li>
                                        <a href="email-inbox.html">
<i class="feather icon-mail"></i> My Messages
</a>
                                    </li>
                                    <li>
                                        <a href="auth-lock-screen.html">
<i class="feather icon-lock"></i> Lock Screen
</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ url('admin/logout') }}">
<i class="feather icon-log-out"></i> Logout
</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="card card_main p-fixed users-main">
                    <div class="user-box">
                        <div class="chat-inner-header">
                            <div class="back_chatBox">
                                <div class="right-icon-control">
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-friend-list">
                            <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                <a class="media-left" href="#!">
<img class="media-object img-radius img-radius" src="{{ url('') }}/admin-asset/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
<div class="live-status bg-success"></div>
</a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Josephin Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                <a class="media-left" href="#!">
<img class="media-object img-radius" src="{{ url('') }}/admin-asset/assets/images/avatar-2.jpg" alt="Generic placeholder image">
<div class="live-status bg-success"></div>
</a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Lary Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                <a class="media-left" href="#!">
<img class="media-object img-radius" src="{{ url('') }}/admin-asset/assets/images/avatar-4.jpg" alt="Generic placeholder image">
<div class="live-status bg-success"></div>
</a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alice</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                <a class="media-left" href="#!">
<img class="media-object img-radius" src="{{ url('') }}/admin-asset/assets/images/avatar-3.jpg" alt="Generic placeholder image">
<div class="live-status bg-success"></div>
</a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alia</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                <a class="media-left" href="#!">
<img class="media-object img-radius" src="{{ url('') }}/admin-asset/assets/images/avatar-2.jpg" alt="Generic placeholder image">
<div class="live-status bg-success"></div>
</a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Suzen</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="showChat_inner">
            <div class="media chat-inner-header">
                <a class="back_chatBox">
<i class="feather icon-chevron-left"></i> UserName
</a>
            </div>
            <div class="media chat-messages">
                <a class="media-left photo-table" href="#!">
<img class="media-object img-radius img-radius m-t-5" src="{{ url('') }}/admin-asset/assets/images/avatar-3.jpg" alt="Generic placeholder image">
</a>
                <div class="media-body chat-menu-content">
                    <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
            </div>
            <div class="media chat-messages">
                <div class="media-body chat-menu-reply">
                    <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
                <div class="media-right photo-table">
                    <a href="#!">
<img class="media-object img-radius img-radius m-t-5" src="{{ url('') }}/admin-asset/assets/images/avatar-4.jpg" alt="Generic placeholder image">
</a>
                </div>
            </div>
            <div class="chat-reply-box p-b-20">
                <div class="right-icon-control">
                    <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                    <div class="form-icon">
                        <i class="feather icon-navigation"></i>
                    </div>
                </div>
            </div>
        </div>

 
 <div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        
        {{-- including slider --}}
        @include('admin.layout.sidebar')
        {{-- ./include slider --}}
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
            <div class="main-body">
            <div class="page-wrapper">
            <div class="page-body">

              @yield('content')
            </div>
            </div>
            </div>
            </div>
        </div>
   
    </div>
</div>

    </div>
 </div>
   
   
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
    {{-- range --}}
    <script>
        
        $(document).ready(function() {

const $valueSpan = $('.valueSpan2');
const $value = $('#customRange11');
$valueSpan.html($value.val()+"%");
$value.on('input change', () => {

  $valueSpan.html($value.val()+"%");
});
});


    </script>
    
    {{-- ./range --}}
    @include('admin.layout.script')

</body>

</html>
