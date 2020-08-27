@extends('admin.layout.master')

@section('content')


@if(session()->has('message'))
                   <div class="alert alert-success">
                      {{ session()->get('message') }}
                   </div>
@endif



@if(isset($list))
{{-- education index section --}}
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h5>Education</h5>
            </div>
            <div class="col-md-3">
                <a class="btn btn-grd-success " href="{{ url('') }}/admin/experience/add">Add New</a>
            </div>
        </div>
    </div>
    <div class="card-block table-border-style">
    <div class="table-responsive">
    <table class="table table-hover">
    <thead>
    <tr>
    <th>#</th>
    <th>YEAR</th>
    <th>Role</th>
    <th>Company</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php $count = 1; if(isset($exper) && !empty($exper)){ ?>
           @foreach($exper as $ex)
            <tr>
                <td scope="row">{{ $count }}</td>
                <td>{{ $ex->year }}</td>
                <td>{{ $ex->role }}</td>
                <td>{{ $ex->companyname }}</td>
                <td>
                    <a class="btn btn-grd-success " href="{{ url('') }}/admin/experience/edit/{{ $ex->id }}">Edit</a>
                    <a class="btn btn-grd-danger " href="{{ url('') }}/admin/experience/delete/{{ $ex->id }}">Delete</a>
                </td>
            </tr>
            <?php $count++ ?>
            @endforeach
        <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
{{-- ./education index section --}}
@endif





@if(isset($add))
<div class="card">
    <div class="card-header">
    <h5 class="sub-title">Add Work Experience</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/experience/add" method="post">
          {{ csrf_field() }}
        <div class="form-group row">
            
            <label class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-10">
            <input type="text" maxlength="9" name="year" placeholder="YEAR-NOW" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
            <input type="text" name="role" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Working Area</label>
            <div class="col-sm-10">
            <input type="text" name="companyname" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Field of Works</label>
            <div class="col-sm-10">
            <textarea rows="5" cols="5" name="designation" id="summary-ckeditor" class="form-control summary-ckeditor" placeholder="Default textarea" required></textarea>
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
    <div class="card-header">
    <h5 class="sub-title">Edit Work Experience</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/experience/edit/{{ $exper[0]->id }}" method="post">
          {{ csrf_field() }}
        <div class="form-group row">
            <input type="hidden" name="id" value="{{ $exper[0]->id }}">
            <label class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-10">
            <input type="text" maxlength="9" name="year" value="{{ $exper[0]->year }}" placeholder="YEAR-NOW" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
            <input type="text" name="role" value="{{ $exper[0]->role }}" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Working Area</label>
            <div class="col-sm-10">
            <input type="text" name="companyname" value="{{ $exper[0]->companyname }}" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Field of Works</label>
            <div class="col-sm-10">
            <textarea rows="5" cols="5" name="designation" id="summary-ckeditor" class="form-control summary-ckeditor" placeholder="Default textarea" required>{!! $exper[0]->designation !!}</textarea>
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