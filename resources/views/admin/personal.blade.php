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




<div class="card">
    <div class="card-header text-center">
    <h5 class="sub-title">General information</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/personal" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-9">
              <input type="text"  class="form-control"  name="name" value="{{ $personal[0]->name }}"  placeholder="Your Name" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email ID</label>
            <div class="col-sm-9">
              <input type="email"  class="form-control"  name="email"  value="{{ $personal[0]->email }}" placeholder="yourmail@mail.com" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Contact Number</label>
            <div class="col-sm-9">
              <input type="text"  class="form-control"  name="phoneno" value="{{ $personal[0]->phoneno }}"  placeholder="+1(000)-000-0000" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-9">
                <textarea  rows="3" cols="3" class="form-control max-textarea" name="address" placeholder="Your address" >{{ $personal[0]->address }}</textarea>
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Role</label>
          <div class="col-sm-9">
              <input type="text" name="role" data-role="tagsinput" value="{{ $personal[0]->role }}">
          </div>
      </div>
        <h5 class="sub-title mt-5">Social Account</h5>
        <div class="row">
          <div class="col-md-6">
            <div class="input-group input-group-info">
              <span class="input-group-addon">
              <i class="fa fa-linkedin"></i>
              </span>
              <input type="text" class="form-control" name="linkedin" value="{{ $personal[0]->linkedin }}" placeholder="https://www.linkedin.com/in/jeffweiner08">
              </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-info">
              <span class="input-group-addon">
              <i class="fa fa-twitter"></i>
              </span>
              <input type="text" class="form-control" name="twitter" value="{{ $personal[0]->twitter }}" placeholder="https://twitter.com/jack">
              </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-info">
              <span class="input-group-addon">
              <i class="fa fa-github"></i>
              </span>
              <input type="text" class="form-control" name="github" value="{{ $personal[0]->github }}" placeholder="https://github.com/natfriedman">
              </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-info">
              <span class="input-group-addon">
              <i class="fa fa-medium"></i>
              </span>
              <input type="text" class="form-control" name="medium" value="{{ $personal[0]->medium }}" placeholder="https://medium.com/@ev">
              </div>
          </div>
        </div>

       
        <h5 class="sub-title mt-5">Profile Picture</h5>
        <div class="row mt-4">
          @foreach($personalimage as $perimg)
          <div class="col-md-2">
            <div class="card">
              <div class=" text-right">
                <a href="{{ url('') }}/admin/personal/delete/{{ $perimg->id }}"><i class="fa fa-trash f-30 text-c-pink"></i></a>
              </div>
              <img src="{{ url('') }}/{{ $perimg->image }}" class="img-fluid" width="150" height="150">
            </div> 
          </div>
          @endforeach

         
          
      </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Image</label>
            <div class="col-sm-3">
                <input name="img"  class="form-control" type="file">
            </div>
            <div class="col-sm-5">
                <p>upload your image in this format<code>jpg,png,jpeg</code></p>
            </div>
            
        </div>
        <div class="form-group row">
            <label class="col-sm-2"></label>
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary m-b-0">Submit</button>
            </div>
        </div>
      </form>
    </div>
  </div>


@endsection