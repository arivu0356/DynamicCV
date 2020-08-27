@extends('admin.layout.master')

@section('content')


@if(session()->has('message'))
                   <div class="alert alert-success">
                      {{ session()->get('message') }}
                   </div>
@endif
<style>
    .the_border{
        border: 1px solid rgba(120,130,140,.13);
    }
    .card-header-header{
        border-left: 5px solid blue;
    }
    .the_icon{
        color: #41b3f9;
        font-size: 1.3rem;
    }
    .the_font{
        font-size: 1.3rem;
    }
</style>


@if(isset($list))
{{-- education index section --}}
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h5>Skills Category</h5>
            </div>
            <div class="col-md-3">
                <a class="btn btn-grd-success " href="{{ url('') }}/admin/skillscategory/add">Add New</a>
            </div>
        </div>
    </div>
    <div class="card-block table-border-style">

        <div class="container">
        <div class="row reorder-menu" id="sortable3">

                                	
                                	
            @foreach($skillscategory as $skill)
                    <div class="col-md-6  m-t-20 vl" id="{{ $skill->id }}">
                        <div class="card the_border">
                              <div class="card-header card-header-header">
                                <div class="row">
                                    <div class="col-md-9"><h5 class="the_font">{{ substr($skill->category,0,36) }}</h5></div>
                                    <div class="col-md-3 text-left">
                                       <a href="{{ url('admin/skillscategory/edit') }}/{{ $skill->id }}" class=""><i class="fa fa-edit the_icon"></i></a>
                                       <a href="{{ url('admin/skillscategory/delete') }}/{{ $skill->id }}" class=" "><i class="fa fa-trash-o the_icon p-l-10"></i></a>
                                     </div>
                                </div>
                              </div>
                        </div>
                    </div>
              @endforeach	
                
        </div>
       </div>
    
    </div>
    </div>
{{-- ./education index section --}}
@endif




@if(isset($add))
<div class="card">
    <div class="card-header">
    <h5 class="sub-title">Add Skills Category</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/skillscategory/add" method="post">
          {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Skill Category</label>
            <div class="col-sm-10">
            <input type="text" name="category" class="form-control" required>
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
    <h5 class="sub-title">Edit Skills Category</h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/skillscategory/edit/{{ $skillcat[0]->id }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $skillcat[0]->id }}">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Skill Category</label>
            <div class="col-sm-10">
            <input type="text" name="category" value="{{ $skillcat[0]->category }}" class="form-control" required>
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