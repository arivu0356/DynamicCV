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

@if(isset($list))
<div class="card">
    <div class="card-header text-center">
    <h5 class="sub-title">Add Certificate</h5>
    </div>
    <div class="card-block">
        <div class="row">
            @foreach($certificate as $cer)
           <div class="col-md-4">
            <div class="card" >
                <img src="{{ url('') }}/{{ $cer->image }}" height="200" class="card-img-top" >
                <div class="card-body">
                  <h5 class="card-title">{{ $cer->year }}</h5>
                  <p class="card-text">{{ $cer->cource }}</p>
                  <p class="card-text">{{ $cer->institute }}</p>
                  <a class="btn btn-grd-success " href="{{ url('') }}/admin/certificate/edit/{{ $cer->id }}">Edit</a>
                  <a class="btn btn-grd-danger " href="{{ url('') }}/admin/certificate/delete/{{ $cer->id }}">Delete</a>
                </div>
              </div>
           </div>
           @endforeach
 
           <div class="col-md-4 my-auto">
            <div class="card" >
                <div class="card-block text-center">
                    <a href="{{ url('') }}/admin/certificate/add"><i class="fa fa-plus-circle f-70 text-c-green"></i>
                    <h6 class="text-c-green">ADD</h6></a>
                  </div>
                
              </div>
           </div>
        </div>
    </div>
</div>

@endif



@if(isset($add))
<div class="card">
    <div class="card-header text-center">
    <h5 class="sub-title">Add Certificate</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/certificate/add" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        
        
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-9">
                <textarea  rows="3" cols="3" class="form-control max-textarea" name="cource" placeholder="Enter Course Name here" ></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Institute Name</label>
            <div class="col-sm-9">
                
                 <input type="text"  class="form-control"  name="institute"  maxlength="80" placeholder="Enter Institute Name here" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-9">
              <input type="text"  class="form-control"  name="year"  maxlength="4" placeholder="YEAR" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Certificate</label>
            <div class="col-sm-3">
                <input name="img"  class="form-control" type="file">
            </div>
            <div class="col-sm-5">
                <p>upload your certificate in <code>jpg,png,jpeg</code></p>
            </div>
            
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">View Certificate</label>
        <div class="col-sm-3 checkbox-fade fade-in-primary">
            <label>
            <input type="checkbox" name="certificate" value="1" >
            <span class="cr">
            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
            </span>
            
            </label>
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
@endif


@if(isset($edit))
<div class="card">
    <div class="card-header text-center">
    <h5 class="sub-title">Edit Certificate</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/certificate/edit/{{ $certificate[0]->id }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        
        <input type="hidden" name="id" value="{{ $certificate[0]->id }}">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-9">
                <textarea  rows="3" cols="3" class="form-control max-textarea" name="cource" placeholder="Enter Course Name here" >{{ $certificate[0]->cource }}</textarea>
            </div>
        </div>
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Institute Name</label>
            <div class="col-sm-9">
                
                <input type="text"  class="form-control"  name="institute"  maxlength="80" placeholder="Enter Institute Name here" value="{{ $certificate[0]->institute }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-9">
              <input type="text"  class="form-control"  name="year"  maxlength="4" placeholder="YEAR" value="{{ $certificate[0]->year }}" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Certificate</label>
            <div class="col-sm-3">
                <input name="img"  class="form-control" type="file">
                <input type="hidden" name="img" value="{{ $certificate[0]->image }}">
            </div>
            <div class="col-sm-7">
                <p>upload your certificate in <code>jpg,png,jpeg</code></p>
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <img src="{{ url('') }}/{{ $certificate[0]->image }}" width="150" height="150">
            </div>
            
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">View Certificate</label>
        <div class="col-sm-3 checkbox-fade fade-in-primary">
            <label>
            <input type="checkbox" name="viewcertificate" @if($certificate[0]->viewcertificate == '1'){{ 'checked'}} @endif value="1" >
            <span class="cr">
            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
            </span>
            
            </label>
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
@endif



  @endsection