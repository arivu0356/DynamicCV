@extends('admin.layout.master')
@section('content')

{{-- page header --}}
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Settings</h4>
                    <span>make changes and update your setting below</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/setting') }}">Settings</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- ./page header --}}


<?php 
 $profile = 'active';
 $password ='';
 if(session()->has('password')){
    $website = '';
    $password ='active';
    $profile = '';
}
?>

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
<div class="row">
    <div class="col-lg-12">
        <div class="tab-header card">
            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
            <li class="nav-item">
                <a class="nav-link {{ $profile }}" data-toggle="tab" href="#profile" role="tab">Profile</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ $password }}" data-toggle="tab" href="#password" role="tab">Change password</a>
            <div class="slide"></div>
            </li>
            
            
            </ul>
        </div>

        {{-- tab body --}}
        <div class="tab-content">
            {{-- second panel --}}
            <div class="tab-pane {{ $password }}" id="password" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                    <h5 class="card-header-text">Change Password</h5>
                     @if(session()->has('passmessage'))
                        <div class="alert alert-success">
                            {{ session()->get('passmessage') }}
                        </div>
                     @endif
                     @if(session()->has('passwrong'))
                     <div class="alert alert-warning">
                         {{ session()->get('passwrong') }}
                     </div>
                     @endif
                    </div>
                    <div class="card-block">
                        <div class="j-wrapper j-wrapper-640">
                            <form action="{{ url('admin/password/update') }}" method="post" class="j-pro" id="j-pro" >
                            <div class="j-content">
                            {{ csrf_field() }}
                            <div class="j-row">
                            <div class="j-span6 j-unit">
                            <label class="j-label">your current password</label>
                            <div class="j-input">
                            <label class="j-icon-right" for="password">
                            <i class="fa fa-lock"></i>
                            </label>
                            <input type="password" id="password" name="password" >
                            </div>
                            </div>
                            <div class="j-span6 j-unit">
                            <label class="j-label">your new password</label>
                            <div class="j-input">
                            <label class="j-icon-right" for="newpassword">
                            <i class="fa fa-lock"></i>
                            </label>
                            <input type="password" id="newpassword" name="newpassword">
                            </div>
                            </div>
                            </div>
                            
                     
                            <div class="j-response"></div>
                            
                            </div>
   
                            
                            
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div></form>
                    </div>
                </div>
            </div>
            {{-- ./second panel --}}
            {{-- third panel --}}
            <div class="tab-pane {{ $profile }}" id="profile" role="tabpanel">
  

                <div class="card">
                <div class="card-header">
                <h5 class="card-header-text">Profile</h5>
                <button id="edit-info-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                <i class="icofont icofont-edit"></i>
                </button>
                </div>
                <div class="card-block user-desc">
                {{-- view block --}}
                    <div class="view-desc">
                    <div class="row">
                        <div class="col-lg-12 col-xl-6 text-center">
                            <th><img src="{{ url('') }}/{{ $login[0]->image }}" width="170" height="160" ></th>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="table-responsive">
                                <table class="table m-0">
                                <tbody>
                                <tr>
                                <th scope="row">Name</th>
                                <td>{{ $login[0]->name }}</td>
                                </tr>
                                <tr>
                                <th scope="row">User Name</th>
                                <td>{{ $login[0]->username }}</td>
                                </tr>
                                <tr>
                                <th scope="row">Email</th>
                                <td>{{ $login[0]->email }}</td>
                                </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                {{-- ./view block --}}
                {{-- edit block --}}
                    <div class="edit-desc">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ url('admin/profile/update') }}" method="post" enctype="multipart/form-data">
                                <div class="general-info">
                                    {{ csrf_field() }}
                                    <div class="row">
                                          <div class="col-lg-12 col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><b>Full Name</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text"  class="form-control" value="{{ $login[0]->name }}"   name="name" placeholder="Name" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><b>Username</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text"  class="form-control" value="{{ $login[0]->username }}"  name="username" placeholder="User Name" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><b>Email ID</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text"  class="form-control" value="{{ $login[0]->email }}"  name="email" placeholder="example@yourmail.com" >
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-12 col-xl-6">
                                            <div class="form-group row">
                                                <div class="col-sm-12 text-center">
                                                    <img src="{{ url('') }}/{{ $login[0]->image }}" width="160" height="160" >
                                                </div>
                                            </div>
                                            <div class="form-group row text-center">
                                                <label class="col-sm-4 col-form-label"><b>Upload logo</b></label>
                                                <div class="col-sm-8">
                                                    <input name="img"  class="form-control" type="file" accept="image/*" >
                                                    <input type="hidden" name="img" value="{{ $login[0]->image }}">
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="text-center">
                                    <button class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                                    </div>
                                </div>
                                </form>
                                
                            </div>
                        
                        </div>
                     
                    </div>
                    
                    </div>
                {{-- ./edit block --}}
                </div>
                </div>

                

        </div>
        {{-- ./third panel --}}
        </div>
        {{-- ./tab body --}}
    </div>
</div>
@endsection