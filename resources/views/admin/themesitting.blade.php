@extends('admin.layout.master')

@section('content')

<style>
    .the_active{
        border: 3px solid green;
    }
    .the_outer{
        border: 1px solid #f6f7fb;
    }
</style>

{{-- page header --}}
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Update Image & Video</h4>
                    <span>Edit your image and videos here</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/theme') }}">Theme</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/blog/themesitting') }}">Update Image & Video</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- ./page header --}}

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



{{-- page body --}}
<div class="page-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
              
                
                
                
                <div class="card-block text-center">
                    <div class="row">
                        @foreach($themeimage as $image)
                             <div class="col-md-4 text-center  @if($themeapply[0]->imageurl == $image->id ) {{ 'the_active' }}  @else {{ 'the_outer' }} @endif">
                                @if($themeapply[0]->imageurl != $image->id ) 
                                <div class=" text-right">
                                    <a href="{{ url('admin/themeasset/remove') }}/{{ $image->id  }}"><i class="fa fa-trash f-30 text-c-pink"></i></a>
                                  </div>
                                @endif
                                 <form action="{{ url('admin') }}/image/active/{{ $image->id }}" method="post">
                                     {{ csrf_field() }}
                                    <img src="{{ url('') }}/{{ $image->storage }}" width="120" height="160">
                                    @if($themeapply[0]->imageurl == $image->id )
                                      <button class="btn btn-success" disabled>Actived</button>
                                    @else 
                                      <button class="btn btn-primary">Active</button>
                                    @endif
                                    
                                 </form>
                             </div>
                        @endforeach
                    </div>
                    <form action="{{ url('admin/theme/update/image') }}" class="mt-5" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Image</b> </label>
                        <div class="col-sm-6">
                            <input name="img"  class="form-control" type="file" accept="image/*" >
                        </div>
                        <div class="col-sm-12 mt-2">
                            <button class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
               

               
               
                <div class="card-block text-center">

                    <div class="row">
                        @foreach($themevideo as $video)
                             <div class="col-md-4 text-center  @if($themeapply[0]->videourl == $video->id ) {{ 'the_active' }} @else {{ 'the_outer' }} @endif">
                                @if($themeapply[0]->videourl != $video->id ) 
                                <div class=" text-right">
                                    <a href="{{ url('admin/themeasset/remove') }}/{{ $video->id  }}"><i class="fa fa-trash f-30 text-c-pink"></i></a>
                                  </div>
                                @endif
                                 <form action="{{ url('admin') }}/video/active/{{ $video->id }}" method="post">
                                     {{ csrf_field() }}
                                     <video width="120" height="160" controls>
                                        <source src="{{ url('') }}/{{ $video->storage }}" type="video/mp4">
                                      Your browser does not support the video tag.
                                    </video>
                                    @if($themeapply[0]->videourl == $video->id )
                                      <button class="btn btn-success" disabled>Actived</button>
                                    @else 
                                      <button class="btn btn-primary">Active</button>
                                    @endif
                                    
                                 </form>
                             </div>
                        @endforeach
                    </div>
                    <form action="{{ url('admin/theme/update/video') }}" class="mt-5" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Video</b></label>
                        <div class="col-sm-6">
                            <input name="video"  class="form-control" type="file"  >
                        </div>
                        <div class="col-sm-12 mt-2">
                            <button class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                    </form>
                </div>
               
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                    <input type="range" class="form-control-range" name="opacity" value="{{ $themeapply[0]->opacity }}" id="opacity" min="0" max="99">
            </div>
            <form action="{{ url('admin/theme/update/redirect') }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary">Apply</button>
                </div>
            </form>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <iframe src="{{ url('') }}" height="500"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection