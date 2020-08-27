
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Navigation</div>
                <ul class="pcoded-item pcoded-left-item">
                <li class="{{ (request()->is('admin/personal*')) ? 'active' : '' }}">
                        <a href="{{ url('') }}/admin/personal">
    <span class="pcoded-micon"><i class="fa fa-user"></i><b>A</b></span>
    <span class="pcoded-mtext">General Information</span>
    </a>
                    </li>
                    <li class="{{ (request()->is('admin/about*')) ? 'active' : '' }}">
                        <a href="{{ url('') }}/admin/about">
    <span class="pcoded-micon"><i class="fa fa-address-card"></i><b>A</b></span>
    <span class="pcoded-mtext">About</span>
    </a>
                    </li>
                    <!--<li class="{{ (request()->is('admin/analytic*')) ? 'active' : '' }} ">-->
                    <!--    <a href="{{ url('') }}/admin/analytic">-->
                    <!--    <span class="pcoded-micon"><i class="fa fa-line-chart"></i><b>A</b></span>-->
                    <!--    <span class="pcoded-mtext">Analytic</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    {{-- drop down --}}
                     <li class="pcoded-hasmenu {{ (request()->is('admin/analytic*')) ? 'pcoded-trigger' : '' }} {{ (request()->is('admin/seo*')) ? 'pcoded-trigger' : '' }}  ">
                        <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="fa fa-line-chart"></i></span>
                        <span class="pcoded-mtext">Analytic & SEO</span>
                        </a>
                        <ul class="pcoded-submenu">
                        <li class="{{ (request()->is('admin/analytic')) ? 'active' : '' }} {{ (request()->is('admin/analytic*')) ? 'active' : '' }} {{ (request()->is('admin/analytic*')) ? 'active' : '' }} ">
                        <a href="{{ url('') }}/admin/analytic">
                        <span class="pcoded-mtext">Analytic</span>
                        </a>
                        </li>
                        <li class="{{ (request()->is('admin/seo')) ? 'active' : '' }} {{ (request()->is('admin/seo*')) ? 'active' : '' }} ">
                        <a href="{{ url('') }}/admin/seo">
                        <span class="pcoded-mtext">SEO</span>
                        </a>
                        </li>
                        </ul>
                    </li>
                    {{-- ./drop down --}}
                    {{-- drop down --}}
                    <li class="pcoded-hasmenu {{ (request()->is('admin/skillscategory*')) ? 'pcoded-trigger' : '' }} {{ (request()->is('admin/skills*')) ? 'pcoded-trigger' : '' }}  ">
                        <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="fa fa-cogs"></i></span>
                        <span class="pcoded-mtext">Technical skills</span>
                        </a>
                        <ul class="pcoded-submenu">
                        <li class="{{ (request()->is('admin/skillscategory')) ? 'active' : '' }} {{ (request()->is('admin/skillscategory/add')) ? 'active' : '' }} {{ (request()->is('admin/skillscategory/edit/*')) ? 'active' : '' }} ">
                        <a href="{{ url('') }}/admin/skillscategory">
                        <span class="pcoded-mtext">skill category</span>
                        </a>
                        </li>
                        <li class="{{ (request()->is('admin/skills')) ? 'active' : '' }} {{ (request()->is('admin/skills/add')) ? 'active' : '' }} {{ (request()->is('admin/skills/edit/*')) ? 'active' : '' }}">
                        <a href="{{ url('') }}/admin/skills">
                        <span class="pcoded-mtext">skills</span>
                        </a>
                        </li>
                        </ul>
                    </li>
                    {{-- ./drop down --}}
                    <li class="{{ (request()->is('admin/experience*')) ? 'active' : '' }}">
                        <a href="{{ url('') }}/admin/experience">
    <span class="pcoded-micon"><i class="fa fa-history "></i><b>A</b></span>
    <span class="pcoded-mtext">Experiences</span>
    </a>
                    </li>
                    <li class="{{ (request()->is('admin/certificate*')) ? 'active' : '' }} ">
                        <a href="{{ url('') }}/admin/certificate">
    <span class="pcoded-micon"><i class="fa fa-certificate"></i><b>A</b></span>
    <span class="pcoded-mtext">Certificates</span>
    </a>
                    </li>
                    <li class="{{ (request()->is('admin/education*')) ? 'active' : '' }} ">
                        <a href="{{ url('') }}/admin/education">
    <span class="pcoded-micon"><i class="fa fa-graduation-cap"></i><b>A</b></span>
    <span class="pcoded-mtext">Education</span>
    </a>
                    </li>
                    
                    
                    <li class="pcoded-hasmenu {{ (request()->is('admin/blog*')) ? 'pcoded-trigger' : '' }}">
                        <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="fa fa-newspaper-o"></i></span>
                        <span class="pcoded-mtext">Blog</span>
                        </a>
                        <ul class="pcoded-submenu">
                        <li class="{{ (request()->is('admin/blog')) ? 'active' : '' }} {{ (request()->is('admin/blog/edit/*')) ? 'active' : '' }}">
                        <a href="{{ url('admin/blog') }}">
                        <span class="pcoded-mtext">Manage Posts</span>
                        </a>
                        </li>
                        <li class="{{ (request()->is('admin/blog/add')) ? 'active' : '' }}">
                            <a href="{{ url('admin/blog/add') }}">
                            <span class="pcoded-mtext">Add Posts</span>
                            </a>
                        </li>
                        <li class="">
                        <li class="{{ (request()->is('admin/blog/category')) ? 'active' : '' }}">
                            <a href="{{ url('admin/blog/category') }}">
                            <span class="pcoded-mtext">Categories</span>
                            </a>
                        </li>  
                      </ul>
                    </li>
                  

                    <li class="pcoded-hasmenu {{ (request()->is('admin/portfolio*')) ? 'pcoded-trigger' : '' }}">
                        <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="feather icon-feather"></i></span>
                        <span class="pcoded-mtext">Portfolio</span>
                        </a>
                        <ul class="pcoded-submenu">
                      <li class="{{ (request()->is('admin/portfolio')) ? 'active' : '' }} {{ (request()->is('admin/portfolio/edit/*')) ? 'active' : '' }}">
                        <a href="{{ url('admin/portfolio') }}">
                        <span class="pcoded-mtext">Manage Posts</span>
                        </a>
                        </li>
                        <li class="{{ (request()->is('admin/portfolio/add')) ? 'active' : '' }}">
                            <a href="{{ url('admin/portfolio/add') }}">
                            <span class="pcoded-mtext">Add Posts</span>
                            </a>
                        </li>
                        <li class="">
                        <li class="{{ (request()->is('admin/portfolio/category')) ? 'active' : '' }}">
                            <a href="{{ url('admin/portfolio/category') }}">
                            <span class="pcoded-mtext">Categories</span>
                            </a>
                        </li>  
                      </ul>
                    </li>
                    <li class="{{ (request()->is('admin/comment*')) ? 'active' : '' }} ">
                        <a href="{{ url('') }}/admin/comment">
                        <span class="pcoded-micon"><i class="fa fa-bell"></i><b>A</b></span>
                        <span class="pcoded-mtext">Notification 
                        <?php
                        $count = 0; 
                        foreach($thecomment as $comments){
                            if($comments->commentviewed == '0'){
                                $count = $count + 1;
                            }
                        } ?>
                        @if($count)
                          <span class="badge bg-c-pink" id="clearcountside"> {{ $count }}</span>
                        @endif 
                        </span>
                        </a>
                    </li>
                    
                    <li class="pcoded-hasmenu {{ (request()->is('admin/theme')) ? 'pcoded-trigger' : '' }} {{ (request()->is('admin/theme/update')) ? 'pcoded-trigger' : '' }} ">
                        <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="fa fa-picture-o"></i></span>
                        <span class="pcoded-mtext">Themes</span>
                        </a>
                        <ul class="pcoded-submenu">
                       
                        <li class="{{ (request()->is('admin/theme')) ? 'active' : '' }}">
                            <a href="{{ url('admin/theme') }}">
                            <span class="pcoded-mtext">Theme Select</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/theme/update')) ? 'active' : '' }}">
                            <a href="{{ url('admin/theme/update') }}">
                            <span class="pcoded-mtext">Update Theme Assets</span>
                            </a>
                        </li>  
                      </ul>
                    </li>
                    <li class="{{ (request()->is('admin/setting')) ? 'active' : '' }}">
                        <a href="{{ url('admin/setting') }}">
                        <span class="pcoded-micon"><i class="fa fa-gear"></i><b>A</b></span>
                        <span class="pcoded-mtext">Settings</span>
                        </a>
                     </li>
                   
                     <li>
                        <a href="{{ url('admin/logout') }}">
                         <span class="pcoded-micon"><i class="fa fa-sign-out"></i><b>A</b></span>
                         <span class="pcoded-mtext">Logout</span>
                        </a>
                    </li>




                </ul>
                
                        
                   
                            

                               
            </div>
        </nav>