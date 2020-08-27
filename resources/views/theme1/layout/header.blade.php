<!--
        ===================
           NAVIGATION
        ===================
        -->
        <header class="black-bg mh-header mh-fixed-nav nav-scroll mh-xs-mobile-nav wow fadeInUp" id="mh-header">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg mh-nav nav-btn text-left">
                        <a class="navbar-brand" href="{{ url('') }}">
                                <h2 style="margin-bottom: 4px;">Pradeep Natarajan</h2>
                                <!-- <h2>Maha</h2> -->
                            </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon icon"></span>
                            </button>
    
                        <div class="collapse navbar-collapse" >
                            <ul class="navbar-nav mr-0 ml-auto">
                            <li class="nav-item" style="padding-top:10px;">
                                <label class="switch">
                                    <input type="checkbox" id="chk_theme" onclick="themeChange()">
                                    <span class="slider round"></span>
                                </label> 
                                </li>
                                <li class="nav-item <?php  if(request()->is('blog') || request()->is('blog/*') || request()->is('category/*') ){  }else{ echo 'active'; } ?>">
                                    <a class="nav-link" href="<?php  if(request()->is('blog') || request()->is('blog/*') || request()->is('category/*') ){ echo url(''); }else{ echo '#mh-home';  }?>">Home</a>
                                </li>
                                @if(request()->is('blog/*'))
                                 <li class="nav-item">
                                        <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                                    </li>
                                @endif
                                @if(request()->is('blog'))
                                 <li class="nav-item">
                                        <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                                    </li>
                                @endif
                                @if(!request()->is('blog'))
                                @if(!request()->is('blog/*'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="#mh-about">About</a>
                                    </li>
                                    @if($skillscategorycount !== 0)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#mh-skills">Skills</a>
                                    </li>
                                    @endif
                                    @if($experiencecount !== 0)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#mh-experience">Experience</a>
                                    </li>
                                    @endif
                                    @if($certificatecount !== 0)
                                     <li class="nav-item">
                                        
                                        <a class="nav-link" href="#mh-certification">Certification</a>
                                    </li>
                                    @endif
                                      @if($portfoliocount !== 0)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#mh-portfolio">Portfolio</a>
                                    </li>
                                    @endif
                                    @if($blogcount !== 0)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#mh-blog">Blog</a>
                                    </li>
                                    @endif
                                @endif
                                @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href="#mh-contact">Contact</a>
                                    </li>
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
    