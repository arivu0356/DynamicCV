@extends('admin.layout.master')

@section('content')


<script type="text/javascript">
    function countChars(countfrom,displayto) {
      var the_d = 500;
      var len = document.getElementById(countfrom).value.length;
      document.getElementById(displayto).innerHTML = the_d - len;
    }
    </script>


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
    <h5 class="sub-title">About you </h5>
    </div>
    <div class="card-block">
      <form action="{{ url('') }}/admin/about" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        
        <div class="form-group row">
            <div class="col-sm-9">
              <label class="col-form-label"><b>Describe</b> about you in 500 words :-</label>
            </div>
            <div class="col-sm-3 text-right">
                <span id="charcount">500</span>
            </div>
            <div class="col-sm-12">
                <textarea id="thedata" onkeyup="countChars('thedata','charcount');" onkeydown="countChars('thedata','charcount');" onmouseout="countChars('thedata','charcount');" rows="5" cols="5" class="form-control max-textarea" name="describeyou" placeholder="Describe about you" maxlength="500">{{ $about[0]->describeyou }}</textarea>
                 
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Skills Tag</label>
            <div class="col-sm-9">
                <input type="text" name="tag" data-role="tagsinput" value="{{ $about[0]->tag }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload CV Dovument</label>
            <div class="col-sm-3">
                <input name="pdf"  class="form-control" type="file">
                <input type="hidden" name="pdf"  value="{{ $about[0]->pdf }}">
            </div>
            <div class="col-sm-5">
            <a href="{{ url('') }}/{{ $about[0]->pdf }}" target="_blank"  class="btn btn-success m-b-0">Preview</a>
            </div>
            
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Image</label>
            <div class="col-sm-3">
                <input name="img"  class="form-control" type="file">
                <input type="hidden" name="img"  value="{{ $about[0]->image }}">
            </div>
            <div class="col-sm-6">
                <img src="{{ url('') }}/{{ $about[0]->image }}" width="150" height="150" >
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
