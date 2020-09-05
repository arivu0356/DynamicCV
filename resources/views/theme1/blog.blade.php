@extends('theme1.layout.master')

@section('content')

<section class="mh-home image-bg home-2-img" id="mh-home">
    <div class="img-foverlay img-color-overlay">
        <div class="container">
            <div class="row section-separator">
                <div class="mh-page-title text-center col-sm-12">
                    <h2>Blog</h2>
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
                    @foreach($blog as $bl)
                    <div class="col-sm-12 col-md-6">
                        <div class="mh-blog-item dark-bg">
                            <img src="{{ url('') }}/{{ $bl->featuredimage }}" alt=""  class="img-fluid">
                            <div class="blog-inner">
                                <h2><a href="{{ url('blog') }}/{{ $bl->slug }}">{{ $bl->title }}</a></h2>
                                <div class="mh-blog-post-info">
                                    <ul>
                                        <li><strong>Post On</strong><a>{{ $bl->date }}</a></li>
                                        <li><strong>By</strong><a>{{ $log[0]->name }}</a></li>
                                    </ul>
                                </div>
                                <p>{{ substr(strip_tags($bl->content), 0,  150) }}</p>
                                <a href="{{ url('blog') }}/{{ $bl->slug }}">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                   
                    <div class="col-sm-12 mh-pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                            {{ $blog->links() }}
                            </ul>
                        </nav>
                    </div>
                   
                   

                </div>
            </div>
            <div class="col-md-4">
                <div class="mh-blog-sidebar">
                    <div class="sidebar-item mh-blog-category text-center">
                        <h3>Category</h3>
                        <ul>
                            @foreach($blogcategory as $category)
                            <li><a href="{{ url('category') }}/{{ $category->slug }}">{{ $category->category }}</a></li>
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
                                                <button type="submit" class="btn btn-fill btn-block" id="submit">Send Message</button>
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


@endsection