@extends('admin.layout.master')

@section('content')


@if(session()->has('message'))
                   <div class="alert alert-success">
                      {{ session()->get('message') }}
                   </div>
@endif

<style>
  .category-header{
    border-left:5px solid #FE9D73;
  }
</style>

@if(isset($list))
{{-- education index section --}}
<div class="card">
  <div class="card-header">
      <div class="row">
          <div class="col-md-9">
              <h5>Technical Skills</h5>
          </div>
          <div class="col-md-3">
              <a class="btn btn-grd-success " href="{{ url('') }}/admin/skills/add">Add New</a>
          </div>
      </div>
  </div>
  <div class="card-block table-border-style">
            <?php $count = 1; ?>
            @foreach($skillscategory as $skc)
            <div class="card">
                <div class="card-header category-header">
                  <h5 class="category-header-title">{{ $skc->category }}</h5>
                </div>
                <div class="card-block ">
                  <div class="row">
                  @foreach($skills as $skill)
                    @if($skill->category == $skc->category )
                    
                      <div class="col-xl-4 col-md-6">
                        <div class="card the-body">
                        <div class="card-block">
                        <div class="row align-items-center">
                        <div class="col">
                        <h5 class="m-b-5">{{ $skill->skill }}</h5>
                        <p class="m-b-0">{{ $skill->percentage }}%</p>
                        <div class="progress">
                          <div class="progress-bar progress-bar-emrald" role="progressbar" style="width: {{ $skill->percentage }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="col col-auto text-right">
                        <a href="{{ url('') }}/admin/skills/edit/{{ $skill->id }}"><i class="fa fa-edit f-30 text-c-blue"></i></a>
                        <a href="{{ url('') }}/admin/skills/delete/{{ $skill->id }}"><i class="fa fa-trash f-30 text-c-pink"></i></a>
                        {{-- <i class="feather icon-user f-20 text-c-yellow"></i> --}}
                        </div>
                        </div>
                        </div>
                        </div>
                      </div>
                    @endif
                  @endforeach
                  <div class="col-xl-2 col-md-6">
                    <div class="card">
                      <div class="card-block text-center">
                        <a href="{{ url('') }}/admin/skills/add"><i class="fa fa-plus-circle f-40 text-c-green"></i>
                        <h6 class="text-c-green">ADD</h6></a>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            @endforeach
    
  </div>
  </div>
{{-- ./education index section --}}
@endif


@if(isset($add))
<div class="card">
    <div class="card-header">
    <h5 class="sub-title">Add Skills </h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/skills/add" method="post">
          {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Skill Category</label>
            <div class="col-sm-10">
                <select name="category" class="form-control form-control-inverse" required>
                    @foreach($skill_cat as $skill)
                      <option value="{{ $skill->category }}">{{ $skill->category }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Skill In</label>
            <div class="col-sm-10">
                <input type="text" name="skill" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Skill percentage</label>
            <div class="col-sm-10">
                {{-- <input type="range" class=""  min="1" max="100" value="50" id="formControlRange"> --}}
                
                 <input type="range" class="form-control-range" name="percentage" id="customRange11" min="1" max="100">
                 <span class="font-weight-bold text-primary ml-2 valueSpan2"></span>
                
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
  <h5 class="sub-title">Edit Skills </h5>
  </div>
  <div class="card-block">
    <form action="{{ url('') }}/admin/skills/edit/{{ $skills[0]->id }}" method="post">
        {{ csrf_field() }}
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Skill Category</label>
          <div class="col-sm-10">
              <select name="category" class="form-control form-control-inverse" required>
                  <option>Skill Category</option>
                  @foreach($skill_cat as $skill)
                    <option value="{{ $skill->category }}" @if($skill->category == $skills[0]->category ){{ 'selected' }} @endif >{{ $skill->category }}</option>
                  @endforeach
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Skill In</label>
          <div class="col-sm-10">
              <input type="text" name="skill" value="{{ $skills[0]->skill }}" class="form-control" required>
          </div>
      </div>
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Skill percentage</label>
          <div class="col-sm-10">
                <input type="range" class="form-control-range" name="percentage" id="customRange11" min="1" max="100" value="{{ $skills[0]->percentage }}">
                 <span class="font-weight-bold text-primary ml-2 valueSpan2"></span>
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