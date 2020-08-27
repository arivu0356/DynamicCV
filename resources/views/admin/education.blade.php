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
                <a class="btn btn-grd-success " href="{{ url('') }}/admin/education/add">Add New</a>
            </div>
        </div>
    </div>
    <div class="card-block table-border-style">
    <div class="table-responsive">
    <table class="table table-hover">
    <thead>
    <tr>
    <th>#</th>
    <th>Degree Name</th>
    <th>Institute Name</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php $count = 1; if(isset($education_table) && !empty($education_table)){ ?>
        @foreach($education_table as $edu)
            <tr>
                <td scope="row">{{ $count }}</td>
                <td>{{ $edu->degreename }}</td>
                <td>{{ $edu->institutename }}</td>
                <td>
                    <a class="btn btn-grd-success " href="{{ url('') }}/admin/education/edit/{{ $edu->id }}">Edit</a>
                    <a class="btn btn-grd-danger " href="{{ url('') }}/admin/education/delete/{{ $edu->id }}">Delete</a>
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
    <h5 class="sub-title">Add Education</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/education/add" method="post">
          {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Degree Name</label>
            <div class="col-sm-10">
            <input type="text" name="degree" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Institute Name</label>
            <div class="col-sm-10">
            <textarea rows="5" cols="5" name="institute" class="form-control" placeholder="Default textarea" required></textarea>
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
    <h5 class="sub-title">Update Education</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/education/edit/{{ $edit_education[0]->id }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $edit_education[0]->id }}">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Degree Name</label>
            <div class="col-sm-10">
            <input type="text" name="degree" value="{{ $edit_education[0]->degreename }}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Institute Name</label>
            <div class="col-sm-10">
            <textarea rows="5" cols="5" name="institute" class="form-control" placeholder="Default textarea">{{ $edit_education[0]->institutename }}</textarea>
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