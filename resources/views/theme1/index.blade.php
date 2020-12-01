@extends('theme1.layout.master')

@section('content')



    
    <!--
        ===================
            HOME 
        ===================
        -->
    <section class="mh-home image-bg relative @if($themeapply[0]->image == 1){{ 'home-2-img' }} @endif" id="mh-home">
    <div class="@if($themeapply[0]->video == 1 ){{ 'img-foverlay img-color-overlay' }} @endif">
    <div class="@if($themeapply[0]->image == 1 ){{ 'img-foverlay img-color-overlay' }} @endif">    
    <div class="@if($themeapply[0]->video == 1){{ 'section-video' }} @endif">
                    <video autoplay="" playsinline class="@if($themeapply[0]->video == 1){{ 'bgvid' }} @endif" loop="" muted="">
                        <!-- <source src="video/video.webm" type="video/webm"> -->
                        <source src="@if($themeapply[0]->video == 1){{ url('') }}/{{ $assetvideo[0]->storage }} @endif">
                        <!-- <source src="video/video.ogv" type="video/ogv"> -->
                    </video>
                </div>
        <div class="home-ovimg">
            <div class="container">
                <div class="row xs-column-reverse section-separator vertical-middle-content home-padding"
                <?php if($themeapply[0]->image ==1){ echo "style=' padding-top:0px;'";}  ?> <?php if($themeapply[0]->static ==1){ echo "style=' padding-top:0px;'";}  ?> >
                    <div class="col-sm-6">
                        <div class="mh-header-info">
                            <div class="mh-promo wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                                <span>Hello I'm</span>
                            </div>

                            <h2 

                            class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $personal[0]->name }}</h2>
                         <div class="row">
                                        <div class="col-12">
                                            <div class="cd-headline clip is-full-width">    
                                                <h4 class="wow fadeInUp tag-line-visable" data-wow-duration="0.8s" data-wow-delay="0.2s" >   
                                                    <?php if(isset($personal[0]->role)){
                                                        $rol = explode(',',$personal[0]->role);
                                                        $visiable = 1;   
                                                    ?>                                      
                                                    <span class="cd-words-wrapper">
                                                    @foreach($rol as $therole)
                                                    <b class="<?php if($visiable == '1'){ echo 'is-visible'; } ?> tag-line-visable">{{ $therole }}</b>
                                                    <?php $visiable++; ?>
                                                    @endforeach
                                                    </span>
                                                <?php } ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                           
                            <ul>
                                <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><i class="fa fa-envelope"></i><a href="mailto:{{ $personal[0]->email }}">{{ $personal[0]->email }}</a></li>
                                <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><i class="fa fa-phone"></i><a href="callto:{{ $personal[0]->phoneno }}">{{ $personal[0]->phoneno }}</a>
                                
                                
                                
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s"><i class="fa fa-map-marker"></i><address>{{ $personal[0]->address }}</address></li>
                            </ul>

                            <ul class="social-icon wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">
                                <li><a href="{{ $personal[0]->linkedin }}"    data-toggle = "tooltip" title = "Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{ $personal[0]->twitter }}"   data-toggle = "tooltip" title = "Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $personal[0]->github }}"   data-toggle = "tooltip" title = "Github" target="_blank"><i class="fa fa-github"></i></a></li>
                                <li><a href="{{ $personal[0]->medium }}"   data-toggle = "tooltip" title = "Medium" target="_blank"><i class="fa fa-medium"></i></a></li>
                            </ul>
                        </div>
                    </div>
                         <div class="col-sm-6">
                        <div class="hero-img wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                            <div>
                                @foreach($personalimage as $pimage)
                                <img class="img-border mySlides" src="{{ url('') }}/{{ $pimage->image }}" alt="" class="img-fluid">
                                @endforeach
                               
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <!--
        ==================
            ABOUT
        =================
        -->
    <section class="mh-about" id="mh-about">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 col-md-6">
                    <div class="mh-about-img shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                        <img src="{{ url('') }}/{{ $about[0]->image }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mh-about-inner">
                        <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">About Me</h2>
                        <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $about[0]->describeyou }}</p>
                        <div class="mh-about-tag wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <?php if(isset($about[0]->tag)){
                                $tags = explode(',',$about[0]->tag)   
                            ?>
                            <ul>
                               
                                @foreach($tags as $thetag)
                                <li><span>{{ $thetag }}</span></li>
                                @endforeach
                            </ul>
                            <?php } ?>
                            
                        </div>
                        <a href="{{ url('') }}/{{ $about[0]->pdf }}" id="Cvdownload" download="PradeepNatarajan" class="btn btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s" >Downlaod CV <i class="fa fa-download"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>











    <!--
        ===================
           SERVICE
        ===================
        -->       <!--
        ===================
           SKILLS
        ===================
      -->
      @if($skillscategorycount !== 0)
      <section class="mh-skills" id="mh-skills">
       
       <div class="container">
        <div class="row">
             <div class="col-sm-12 text-center section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h3>Technical Skills</h3>
             </div>
            </div>

            <!-- the accordion start -->
           <div id="accordion" class="myaccordion">

            <!-- card one -->
           
            <!-- ./card one -->

            <!-- card two -->
            <?php $count = 1; ?>
            @foreach($skillscategory as $skc)
            <div class="card">
                <div class="card-header headerblacktheme" id="D{{ $skc->category }}">
                <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed bthemeAccHead" data-toggle="collapse" data-target="#{{ $skc->category }}" aria-expanded="false" aria-controls="{{ $skc->category }}">
                {{ $skc->category }}
                <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa <?php if($count == 1){ echo 'fa-minus';  }else{ echo 'fa-plus'; } ?>  fa-stack-1x fa-inverse"></i>
                </span>
                </button>
                </h2>
                </div>
                <div id="{{ $skc->category }}" class="collapse <?php if($count == 1){ echo 'show';  } ?>" aria-labelledby="D{{ $skc->category }}">
                    <div class="card-body bodyblacktheme">
                        <div class="row each-skills">
                        @foreach($skills as $skill)
                        @if($skill->category == $skc->category )
                        <div class="col-md-6">
                            <div class="candidatos">
                                <div class="parcial">
                                    <div class="info">
                                        <div class="nome">{{ $skill->skill }}</div>
                                        <div class="percentagem-num">{{ $skill->percentage }}%</div>
                                    </div>
                                    <div class="progressBar">
                                        <div class="percentagem" style="width: {{ $skill->percentage }}%;"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endif
                        @endforeach



                            
                        </div>


                    </div>
                </div>
            </div>
            <?php $count++; ?>
            @endforeach
            <!-- ./card two -->

            <!-- card three -->
            
</div>
       </div>


</section>
@endif

 <!-- timeline  
    ======================================================
      TIMELINE
    ======================================================
    -->
    @if($experiencecount !== 0)
  <section class="mh-experience" id="mh-experience">
        <div class="container section-separator">
            <div class="row">
             <div class="col-sm-12 text-center section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h3>Work Experience</h3>
             </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="main-timeline4">

                        @foreach($experience as $exper)
                        <div class="timeline wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <div  class="timeline-content">
                                <span class="year">{{ $exper->year }}</span>
                                <div  class="inner-content">
                                    <h4 class="tit">{{ $exper->role }}</h4>
                                    <h5 class="title">{{ $exper->companyname }}</h5>
                                    <p >{{ preg_replace("/&#?[a-z0-9]+;/i","",substr(strip_tags($exper->designation), 0,  250)) }}...
                                    </p>
                                      <a  data-fancybox data-src="#{{ $exper->id }}">Read More</a>


                                    
                                </div>
                            </div>

                        </div>
                        @endforeach


                        
                        
                        </div>
                    </div>
                </div>
            </div>


            <!-- timeline pop -->

            <!-- 2018 -->
        @foreach($experience as $exp)
        <div class="mh-portfolio-modal" id="{{ $exp->id }}">
            <div class="container ">
                <h3 class="title">{{ $exp->role }}</h3>
                <h5>{{ $exp->companyname }}</h5>
                <?php echo $exp->designation; ?>
            </div>
        </div>
        @endforeach
        <!-- ./2018 -->
       
        

        


             <!-- ./timeline pop -->
    </section>
@endif
    <!-- ./timeline -->



          <!--
        ===================
          Certifications
        ===================
        -->
    
        @if($certificatecount !== 0)
    <section class="mh-experince" id="mh-certification">
        <div class="bolor-overlay">
            <div class="container">
                <div class="row section-separator">
                    <div class="col-sm-12 col-md-12">
                        <div class="mh-certification">
                            <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                              <h3>Certification</h3>
                             </div>

                             <div class="mh-education-deatils">
                                <div class="row">

                                <!-- Education Institutes-->
                                @foreach($certificate as $cert)
                                <div class="col-sm-6 mt-4">
                                    <div class="mh-education-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                    <h4>{{ $cert->cource }}  from  <a>{{ $cert->institute }}</a></h4>
                                        <div class="mh-eduyear text-center">{{ $cert->year }}</div>
                                        @if($cert->viewcertificate == '1')
                                            <div class="text-center">
                                            <a  align="center" data-fancybox data-src="#ct{{ $cert->id }}"  >
                                             <i class="fa fa-graduation-cap"></i>  View Certificate</a>
                                             </div>
                                         @endif
                                    </div>
                                 </div>
                                 @endforeach
                                <!-- Education Institutes-->

                               

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif


    <!--
        ===================
           EDUCATION
        ===================
        -->
    
        @if($educationcount !== 0)
    <section class="mh-education" id="mh-education">
        <div class="bolor-overlay">
            <div class="container">
                <div class="row section-separator">
                    <div class="col-sm-12 col-md-12">
                        <div class="mh-education">
                            <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                              <h3>Education</h3>
                             </div>
                             
                                 <div class="row">                                  
                                    
                                    @foreach($education as $edu)
                                    <div class="col-md-6 col-sm-6">
                                        <div class="serviceBox wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                            <div class="service-icon">
                                                <i class="fa fa-graduation-cap"></i>
                                            </div>
                                            <h4 class="ins">{{ $edu->degreename }}</h4>
                                            <p class="description">
                                                {{ $edu->institutename }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                    
                                 </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
    <!--
        ===================
           PORTFOLIO
        ===================
        -->
@if($portfoliocount !== 0)
    <section class="mh-portfolio" id="mh-portfolio">
        <div class="container">
            <div class="row section-separator">
                <div class="section-title col-sm-12 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                    <h3>Recent Portfolio</h3>
                </div>
                <div class="part col-sm-12">
                    <div class="portfolio-nav col-sm-12" id="filter-button">
                        <ul>
                            <li data-filter="*" class="current wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s"> <span>All Categories</span></li>
                            @foreach($portcategory as $portc)
                            <li data-filter=".{{ $portc->slug }}" class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><span>{{ $portc->category }}</span></li>
                            @endforeach
                           
                        </ul>
                    </div>
                    <div class="mh-project-gallery col-sm-12 wow fadeInUp" id="project-gallery" data-wow-duration="0.8s" data-wow-delay="0.5s">
                        <div class="portfolioContainer row">
                            @foreach($port as $po)
                            <div class="grid-item col-md-4 col-sm-6 col-xs-12 {{ $po->category }}">
                                <figure>
                                    <img src="{{ url('') }}/{{ $po->featuredimage }}" alt="{{ $po->title }}">
                                    <figcaption class="fig-caption">
                                        <i class="fa fa-search"></i>
                                        <h5 class="title">{{ $po->title }}</h5>
                                        <span class="sub-title">{{ $po->meta }}</span>
                                        <a data-fancybox data-src="#port{{ $po->id }}"></a>
                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
                           
                           
                            
                           
                            
                           
                        </div>
                        <!-- End: .grid .project-gallery -->
                    </div>
                    <!-- End: .grid .project-gallery -->
                </div>
                <!-- End: .part -->
            </div>
            <!-- End: .row -->
        </div>
        @foreach($port as $pot)
        <div class="mh-portfolio-modal" id="port{{ $pot->id }}">
            <div class="container">
                <div class="mh-portfolio-modal-inner">
              
                        <h2>{{ $pot->title }}</h2>
                        {!! $pot->content !!}
                        <div class="text-center">
                          <a href="{{ $pot->slug }}" class="btn btn-fill">Live Demo</a>
                        </div>
                   
                    
                </div>
            </div>
        </div>
        @endforeach
    </section>
    @endif
    
    
   @foreach($certificate as $cert)
    <div class="mh-portfolio-modal" id="ct{{ $cert->id }}">
            <div class="container">
                <div class="row mh-portfolio-modal-inner">
                    
                    <img src="{{ url('') }}/{{ $cert->image }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        @endforeach

    
    
 <!--
        ===================
           BLOG
        ===================
        -->

    @if($blogcount !== 0)        
    <section class="mh-blog" id="mh-blog">
        <div class="container">
            <div class=" section-separator">
                <div class=" section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h3>Featured Posts</h3>
                </div>
                <div class="mh-single-project-slide-by-side row">
                @foreach($blog as $bg)
                <div class="col-sm-12 col-md-12 mh-featured-item">
                    <div class="mh-blog-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <img src="{{ url('') }}/{{ $bg->featuredimage }}" alt="" class="img-fluid">
                        <div class="blog-inner">
                            <h2><a href="{{ url('blog') }}/{{ $bg->slug }}">{{ $bg->title }}</a></h2>
                            <div class="mh-blog-post-info">
                                <ul>
                                    <li><strong>Post On</strong><a>{{ $bg->date }}</a></li>
                                    <li><strong>By</strong><a href="">ThemeSpiders</a></li>
                                </ul>
                            </div>
                            <p>{{ substr(strip_tags($bg->content), 0,  150) }}</p>
                            <a href="{{ url('blog') }}/{{ $bg->slug }}">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
            @if($blogcount > 3)
            <div class="row">
                <div class="col-sm-12">
                <a href="{{ url('blog') }}"  class="btn btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s" >More Post<i class="fa fa-arrow-right"></i></a>
                   
                </div>
            </div>
            @endif
        </div>
    </section>

    @endif




    <!--
        ===================
           FOOTER 1
        ===================
        -->
      <footer class="mh-footer mh-footer-3" id="mh-contact">
            <div class="container-fluid">
                <div class="row section-separator">
                    <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h3>Contact Me</h3>
                    </div>
                    <div class="col-sm-12">
                        <div class="container mt-30">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 mh-footer-address mt-4">


                                <div class="col-sm-12 xs-no-padding">
                                      <div class="contactBox mh-address-footer-item dark-bg shadow-1 media wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                        <div class="each-icon">
                                                <i class="fa fa-location-arrow"></i>
                                            </div>
                                            <div class="each-info media-body">
                                                <h3>Address</h3>
                                                <address>
                                                    {{ $personal[0]->address }}
                                                </address>
                                            </div>
                                        </div>
                                </div>


                                <div class="col-sm-12 xs-no-padding">
                                      <div class="contactBox mh-address-footer-item dark-bg shadow-1 media wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                        <div class="each-icon">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <div class="each-info media-body">
                                                <h3>Email</h3>
                                                <a href="mailto:{{ $personal[0]->email }}">{{ $personal[0]->email }}</a>
                                            </div>
                                        </div>
                                </div>


                                <div class="col-sm-12 xs-no-padding">
                                      <div class="contactBox mh-address-footer-item dark-bg shadow-1 media wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                        <div class="each-icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="each-info media-body">
                                                <h3>Phone</h3>
                                                <a href="callto:{{ $personal[0]->phoneno }}">{{ $personal[0]->phoneno }}</a> <br>
                                                <a href="callto:{{ $personal[0]->phoneno2 }}">{{ $personal[0]->phoneno2 }}</a>                                            
                                            </div>
                                        </div>
                                </div>


                                    
                                </div>
                                <div class="col-sm-12 col-md-6 wow fadeInUp col-sm-12 col-md-6 mt-4 " data-wow-duration="0.8s" data-wow-delay="0.2s">
                                    <form method="post" id="Thecontact" action="javascript:void(0);" class="single-form quate-form wow fadeInUp mt-5" >
                                        
                                        
                                        <span id="themessage"></span>    
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input name="name" class="contact-name form-control" id="name" type="text" placeholder="Your Name" required>
                                            </div>
                
                                            <div class="col-sm-12">
                                                <input name="email" class="contact-subject form-control" id="email" type="email" placeholder="Your Email" required>
                                            </div>
                
                                            <div class="col-sm-12">
                                                <textarea class="contact-message" name="message" id="message" rows="6" placeholder="Your Message" required></textarea>
                                            </div>
                                            
                                            <!-- Subject Button -->
                                            <div class="btn-form col-sm-12">
                                                <button type="submit" class="btn btn-fill btn-block" id="submit" >Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                            <div class="mh-about-img shadow-2 wow fadeInUp" id="divSuccessmail" style="display: none;">
                                    <img class="imgcss" src="{{ url('') }}/uploads/Success.jpg" alt="">
                                </div>
                                    
                                </div>
                                <div class="col-sm-12 mh-copyright wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-left text-xs-center">
                                                <p>All right reserved Pradeep Natarajan @ 2020</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="social-icon">
                                               
                                                <li><a href="{{ $personal[0]->linkedin }}"    data-toggle = "tooltip" title = "Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{ $personal[0]->twitter }}"   data-toggle = "tooltip" title = "Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $personal[0]->github }}"   data-toggle = "tooltip" title = "Github" target="_blank"><i class="fa fa-github"></i></a></li>
                                <li><a href="{{ $personal[0]->medium }}"   data-toggle = "tooltip" title = "Medium" target="_blank"><i class="fa fa-medium"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



<script>
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 5000); // Change image every 5 seconds
    }
    </script>




<script >
( function( window ) {
'use strict';
function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}
var classie = {
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};
if ( typeof define === 'function' && define.amd ) {
  define( classie );
} else {
  window.classie = classie;
}
})( window );
var $ = function(selector){
  return document.querySelector(selector);
}
var accordion = $('.accordion');
accordion.addEventListener("click",function(e) {
  e.stopPropagation();
  e.preventDefault();
  if(e.target && e.target.nodeName == "A") {
    var classes = e.target.className.split(" ");
    if(classes) {
      for(var x = 0; x < classes.length; x++) {
        if(classes[x] == "accordionTitle") {
          var title = e.target;
          var content = e.target.parentNode.nextElementSibling;
          classie.toggle(title, 'accordionTitleActive');
          if(classie.has(content, 'accordionItemCollapsed')) {
            if(classie.has(content, 'animateOut')){
              classie.remove(content, 'animateOut');
            }
            classie.add(content, 'animateIn');
          }else{
             classie.remove(content, 'animateIn');
             classie.add(content, 'animateOut');
          }
          classie.toggle(content, 'accordionItemCollapsed');      
        }
      }
    }  
  }
});
</script>


@endsection
