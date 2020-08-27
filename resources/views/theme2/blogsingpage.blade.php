@extends('theme2.layout.master')

@section('content')
<style>
    .mh-blog .mh-blog-item h2 {
    font-size: 24px;
    line-height: 32px;
    font-weight: 600;
    margin-bottom: 10px;
}
.white-vertion .single-comment {
    margin-bottom: 10px;
    margin-top: 20px;
    padding: 20px 10px;
    background-color: #f4f4f500;
}
.white-vertion .form-control {
    color: black;
}
.white-vertion .contact-message {
    color: black;
}

.blog-single img{
        
        display: block !important;
        max-width: 100% !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }
</style>
 <!-- home 2 -->
 <section class="mh-home image-bg home-2-img" id="mh-home">
    <div class="img-foverlay img-color-overlay">
        <div class="container">
            <div class="row section-separator">
                <div class="mh-page-title text-center col-sm-12">
                    <h2>{{ $blog[0]->title }}</h2>
                    <p><a href="{{ url('') }}">Blog</a> / <a href="{{ $blog[0]->slug }}">{{ $blog[0]->title }}</a> </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mh-blog">
    <div class="container">
        <div class="row section-separator">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="mh-blog-item dark-bg blog-single">
                            <img src="{{ url('') }}/{{ $blog[0]->featuredimage }}" alt="" class="img-fluid">
                            <div class="blog-inner">
                                <h2><a href="">{{ $blog[0]->title }}</a></h2>
                                <div class="mh-blog-post-info">
                                    <ul>
                                        <li><strong>Post On</strong><a>{{ $blog[0]->date }}</a></li>
                                        <li><strong>By</strong><a>{{ $log[0]->name }}</a></li>
                                    </ul>
                                </div>
                               {!! $blog[0]->content !!}
                            </div>
                        </div>
                    </div>
                    {{-- display comment--}}
                    <!-- Comments-->
                    <div class="col-sm-12">
                        <?php $count = 1; ?>
                        @if($count == 1)
                        <span class="single-comment-append">
                        @endif
                        @foreach($displaycomment as $comment)
                        @if($blog[0]->id == $comment->postid)
                        <div class="comments col-sm-12 ">
                            <div class="single-comment media ">
                                
                                <div class="col-md-10 col-sm-10 comment-details media-body text-left">
                                    <h3 class="text-left"> {{ $comment->username }} </h3>
                                    <span>{{ $comment->date }}</span>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            @if($comment->replay !== null)
                            <div class="single-comment media col-sm-10 pull-right">
                                <img src="{{ url('') }}/{{ $log[0]->image }}" alt="" width="100" height="70" class="img-fluid round-image"> 
                                <div class="col-md-10 col-sm-10 comment-details media-body text-left">
                                    <h3 class="text-left">{{ $log[0]->name }}</h3>
                                    <span>{{ $comment->replaydate}}</span>
                                    <p>{{ $comment->replay }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                        @endif
                        @endforeach
                        @if($count == 1)
                         </span>
                        @endif
                        <?php $count++; ?>

                    {{-- ./display comment--}}

                    {{-- comment --}}
                    <div class="blog-form-inner col-sm-12">
                        <div class="post-comment-title">
                            <h3>Post your comment</h3>
                        </div>
                        <form  id="CommentPost" action="javascript:void(0);" class="single-form comment-form wow fadeIn" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="postid" id="postid" value="{{ $blog[0]->id }}" >
                                    <input type="hidden" name="slug" id="slug" value="{{ $blog[0]->slug }}" >
                                    <input name="username" id="username" class="contact-name form-control" id="contact-name" type="text" placeholder="Name" required>
                                </div>

                                <div class="col-sm-12">
                                    <input name="email" class="contact-subject form-control" id="email" type="text" placeholder="Your Email" required>
                                </div>                               
                                

                                <div class="col-sm-12">
                                    <textarea class="contact-message" name="comment" id="comment" rows="6" placeholder="Your Message" required></textarea>
                                </div>
                                
                                <!-- Subject Button -->
                                <div class="btn-form col-sm-12">
                                    <button class="btn btn-fill" id="submit"> Post Comment </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                    {{-- ./comment --}}
                    
                   
                </div>
            </div>
            
            
            <!-- SIDEBAR -->
            <div class="col-md-4">
                <div class="mh-blog-sidebar">
                    <div class="sidebar-item mh-blog-category text-center">
                        <h3 >Category</h3>
                        <ul>
                            @foreach($blogcategory as $category)
                            <li ><a href="{{ url('category') }}/{{ $category->slug }}">{{ $category->category }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-item mh-author-info">
                        <h4>Follow us</h4>
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
</section>       



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
                                                <a href="callto:{{ $personal[0]->phoneno }}">{{ $personal[0]->phoneno }}</a>
                                            </div>
                                        </div>
                                </div>


                                    
                                </div>
                               <div class="col-sm-12 col-md-6 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
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
                                                <button type="submit" class="btn btn-fill btn-block" id="submit">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
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


        

@endsection
