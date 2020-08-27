@extends('admin.layout.master')

@section('content')
<style>
    .the_active{
        border: 3px solid green;
    }
  
</style>

{{-- page header --}}
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Theme Selection</h4>
                    <span>Select your theme below</span>
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
                   
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- ./page header --}}

{{-- page body --}}
<div class="page-body">

    <div class="card">
        <div class="card-block">
           <div class="row">
               <div class="col-md-4">
                <form action="{{ url('admin/theme/update') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="theme" value="1">
                   <div class="card text-center @if($themeapply[0]->theme == '1'){{ 'the_active'}} @endif">
                       <span>
                           <img src="{{ url('admin-asset/blacktheme.png') }}" width="150" height="160">
                        </span>
                        <h6><b>Dark Version</b></h6>
                         @if($themeapply[0]->theme == '1')
                           <button class="btn btn-success" disabled>Active</button>
                         @else
                           <button class="btn btn-primary">Apply</button>
                         @endif
                        
                   </div>
                </form>
               </div>
               <div class="col-md-4">
                   <form action="{{ url('admin/theme/update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card text-center @if($themeapply[0]->theme == '2'){{ 'the_active'}} @endif">
                        <input type="hidden" name="theme" value="2">
                        <span>
                            <img src="{{ url('admin-asset/whitetheme.png') }}" width="150" height="160">
                        </span>
                        <h6><b>Light Version</b></h6>
                        @if($themeapply[0]->theme == '2')
                           <button class="btn btn-success" disabled>Active</button>
                         @else
                           <button class="btn btn-primary">Apply</button>
                         @endif
                    </div>
                   </form>
                </div>
           </div>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/theme/update/page') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="card-header">
            <h6>Edit Theme</h6>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center @if($themeapply[0]->static == '1'){{ 'the_active'}} @endif">
                        <span>
                            @if($themeapply[0]->theme == '1')
                              <img src="{{ url('admin-asset/blacktheme.png') }}" width="150" height="160">
                            @else
                              <img src="{{ url('admin-asset/whitetheme.png') }}" width="150" height="160">
                            @endif
                         </span>
                         
                         <div class="checkbox-fade fade-in-primary">
                            <label>
                            <input type="radio" name="filter" value="static" @if($themeapply[0]->static == '1'){{ 'checked'}} @endif>
                            <span class="cr">
                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                            </span>
                            <span>Static Page</span>
                            </label>
                         </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-center @if($themeapply[0]->image == '1'){{ 'the_active'}} @endif">
                        <span>
                            <img src="{{ url('') }}/{{ $assetimg[0]->storage }}" width="150" height="160">
                         </span>
                         
                         <div class="checkbox-fade fade-in-primary">
                            <label>
                                <input type="radio" name="filter" value="image" @if($themeapply[0]->image == '1'){{ 'checked'}} @endif>
                            <span class="cr">
                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                            </span>
                            <span>Image Page</span>
                            </label>
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center @if($themeapply[0]->video == '1'){{ 'the_active'}} @endif">
                        <span>
                        <video width="150" height="160" controls>
                            <source src="{{ url('') }}/{{ $assetvideo[0]->storage }}" type="video/mp4">
                          Your browser does not support the video tag.
                        </video>
                        </span>

                         <div class="checkbox-fade fade-in-primary">
                            <label>
                                <input type="radio" name="filter" value="video"  @if($themeapply[0]->video == '1'){{ 'checked'}} @endif>
                            <span class="cr">
                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                            </span>
                            <span>Video Page</span>
                            </label>
                         </div>
                    </div>
                </div>
                
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary">Apply</button>
                </div>
                

            </div>
        </div>
        </form>
    </div>
</div>
{{-- ./page body --}}



@endsection