@extends('admin.layout.master')

@section('content')

@if(session()->has('message'))
                   <div class="alert alert-success">
                      {{ session()->get('message') }}
                   </div>
@endif

@if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif



<style>
    #thetwitter_header{
        color: #919aa3;
        display: block;
        font-size: 13px;
        margin-top: 5px;

    }
    .brif_help{
        color: #919aa3;
        display: block;
        font-size: 13px;
        margin-top: 5px;
    }
</style>


        <div class="row">
            <div class="col-sm-12">
            
            <div class="card">
            <div class="card-header">
            <h5><img src="https://image.flaticon.com/icons/svg/1150/1150575.svg" width="30" height="30"> SEO Section</h5>
            <div class="d-inline">
                <span>Search engine optimization is the process of growing the quality and quantity of website traffic by increasing the visibility of a website or a web page to users of a web search engine. </span>
            </div>
            </div>
            <div class="card-block tab-icon">
            
                {{-- tab --}}
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if(session()->has('seo_active')) {{ session()->get('seo_active') }} @endif  @if(session()->has('og_active') || session()->has('og_active') || session()->has('tags_active') || session()->has('google_analytics_active') ) @else {{ 'active' }} @endif " data-toggle="tab" href="#homeseo" role="tab"><i class="fa fa-search"></i>Search Engine</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(session()->has('og_active')) {{ session()->get('og_active') }} @endif" data-toggle="tab" href="#messages7" role="tab"><i class="fa fa-superpowers"></i>Open Graph</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(session()->has('tags_active')) {{ session()->get('tags_active') }} @endif " data-toggle="tab" href="#settings7" role="tab"><i class="fa fa-code"></i>Customize SEO Tags</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(session()->has('google_analytics_active')) {{ session()->get('google_analytics_active') }} @endif" data-toggle="tab" href="#googleanalytics" role="tab"><i class="fa fa-signal"></i>Google Analytics</a>
                        <div class="slide"></div>
                    </li>
                    
                </ul>
                {{-- ./tab --}}
                    
                {{-- tab section --}}
                <div class="tab-content card-block">
                    {{-- seo section one --}}
                    <div class="tab-pane @if(session()->has('seo_active')) {{ session()->get('seo_active') }} @endif @if(session()->has('og_active') || session()->has('og_active') || session()->has('tags_active') || session()->has('google_analytics_active') ) @else {{ 'active' }} @endif" id="homeseo" role="tabpanel">
                        <form action="{{ url('admin/seo/seoupdate') }}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Title</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">Add Title for home page,It must not exceed 70 characters including white space & symbol</span>
                            </div>
                            <div class="col-sm-12">
                            <input type="text" name="title" value="{{ $seo[0]->title }}" maxlength="70" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Keywords </label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">specifically, including a high-value keyword in several key locations on a website</span>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ $seo[0]->keywords }}" name="keywords" data-role="tagsinput">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Description </label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">The Description may have upto 156 characters including white space & symbol</span>
                            </div>
                            <div class="col-sm-12">
                            <textarea rows="5" cols="5" name="descri"  class="form-control" placeholder="short description of your website in 150 lines" maxlength="156">{{ $seo[0]->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary m-b-0">Update</button>
                        </div>
                        </form>
                    </div>
                    {{-- ./seo section one --}}

                     {{-- og tags --}}
                    <div class="tab-pane @if(session()->has('og_active')) {{ session()->get('og_active') }} @endif " id="messages7" role="tabpanel">
                        <form action="{{ url('admin/seo/ogupdate') }}" method="post">
                            {{ csrf_field() }}
                        <h4 class="mt-4"><img src="https://ogp.me/logo.png" width="30" height="30"> Open Graph protocol</h4>
                        <div class="d-inline">
                            <span class="brif_help">The Open Graph protocol enables any web page to become a rich object in a social graph. For instance, this is used on Facebook to allow any web page to have the same functionality as any other object on Facebook.</span>
                        </div>
                        <div class="sub-title"></div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Website Type</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">The type of your object, e.g., "video.movie". Depending on the type you specify, other properties may also be required.</span>
                            </div>
                            <div class="col-sm-12">
                            <input type="text" name="og_type" value="{{ $seo[0]->og_type }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">OG Title</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">The title of your object as it should appear within the graph, e.g., "The Rock"..</span>
                            </div>
                            <div class="col-sm-12">
                            <input type="text" name="og_title"  value="{{ $seo[0]->og_title }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">OG URL</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">The canonical URL of your object that will be used as its permanent ID in the graph, e.g., "https://www.imdb.com/title/tt0117500/".</span>
                            </div>
                            <div class="col-sm-12">
                            <input type="text" name="og_url" value="{{ $seo[0]->og_url }}"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">OG Description</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">A one to two sentence description of your object</span>
                            </div>
                            <div class="col-sm-12">
                            <textarea rows="5" cols="5" name="og_description" class="form-control" placeholder="short description of your website in 150 lines">{{ $seo[0]->og_description }}</textarea>
                            </div>
                        </div>
                        
                        <h4 class="mt-4"><i style="color:skyblue;font-size:1.2rem;" class="fa fa-twitter"></i> Twitter Cards</h4>
                        <div class="d-inline">
                            <span class="brif_help">With Twitter Cards, you can attach rich photos, videos and media experiences to Tweets, helping to drive traffic to your website. Simply add a few lines of markup to your webpage, and users who Tweet links to your content will have a “Card” added to the Tweet that’s visible to their followers.</span>
                        </div>
                        <div class="sub-title"></div>
                        
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Twitter Title</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">Title of content (max 70 characters)</span>
                            </div>
                            <div class="col-sm-12">
                            <input type="text" name="twitter_title" value="{{ $seo[0]->twitter_title }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Twitter Description</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">Description of content (maximum 200 characters)</span>
                            </div>
                            <div class="col-sm-12">
                            <textarea rows="5" cols="5" name="twitter_description" class="form-control" placeholder="short description of your website in 150 lines">{{ $seo[0]->twitter_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Twitter URL</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">Your app’s custom URL scheme (you must include ”://” after your scheme name)</span>
                            </div>
                            
                            <div class="col-sm-12">
                            <input type="text" name="twitter_url" value="{{ $seo[0]->twitter_url }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary m-b-0">Update</button>
                        </div>
                        </form>
                    </div>
                    {{-- ./og tags --}}

                    {{-- tags --}}
                    <div class="tab-pane @if(session()->has('tags_active')) {{ session()->get('tags_active') }} @endif " id="settings7" role="tabpanel">
                        <form action="{{ url('admin/seo/tags') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><i class="fa fa-code"></i>Other SEO Tags</label>
                                <div class="d-inline">
                                    <span class="brif_help pl-3">Meta tags are snippets of code that tell search engines important information about your web page,added extra meta tags if you need to specific more information</span>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
                                        <textarea rows="5" cols="5" id="thehtml" name="other_tags" class="form-control" placeholder="">{{ $seo[0]->other_tags }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0">Update</button>
                            </div>
                        </form>
                    </div>
                    {{-- ./tags --}}
                    {{-- googleanalytics --}}
                    <div class="tab-pane @if(session()->has('google_analytics_active')) {{ session()->get('google_analytics_active') }} @endif " id="googleanalytics" role="tabpanel">
                        <form action="{{ url('admin/seo/googleanalytics') }}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label pl-4"><i class="fa fa-signal"></i>Google Analytics</label>
                            <div class="d-inline">
                                <span class="brif_help pl-3">Google Analytics is a web analytics service offered by Google that tracks and reports website traffic, currently as a platform inside the Google Marketing Platform brand.</span>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <textarea rows="5" cols="5" id="thescript" name="google_analytics" class="form-control" placeholder="past your Google Analytics script here">{{ $seo[0]->google_analytics }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary m-b-0">Update</button>
                        </div>
                        </form>
                     </div>
                    {{-- ./googleanalytics --}}
                </div>
                {{-- ./tab section --}}
            </div>
            </div>
            </div>
        </div>

        <script src="{{ url('') }}/admin-asset/codemirror/codemirror.js" ></script>
        <link href="{{ url('') }}/admin-asset/codemirror/codemirror.css" rel="stylesheet" />
        <script src="{{ url('') }}/admin-asset/codemirror/xml.js"></script>
        <script src="{{ url('') }}/admin-asset/codemirror/closetag.js"></script>
        <link href="{{ url('') }}/admin-asset/codemirror/dracula.css" rel="stylesheet" />
        <script>
            var editor = CodeMirror.fromTextArea
                      (document.getElementById('thehtml'),{
                            mode         :"xml",
                            theme        :"dracula",
                            // lineNumbers  : true,
                            autoCloseTags: true
                   
                       });
                     //  editor.setSize(200,100)
           
          </script>

@endsection