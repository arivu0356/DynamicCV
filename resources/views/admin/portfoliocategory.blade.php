@extends('admin.layout.master')
@section('content')

<style>
    .accordion-title {
        background-color:#4680ff;
        color: white !important;
    }
    .the-body{
        background-color: aliceblue;
    }
     
</style>


{{-- page header --}}
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Categories</h4>
                    <span>Add Categories to filter your portfolio post in Categories order</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/portfolio') }}">Portfolio</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/portfolio/category') }}">Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- ./page header --}}

{{-- page body --}}
<div class="page-body">
    <div class="row">
        <div class="row col-sm-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class=""><b>Add New Categories</b></h5>
                    </div>
                    <div class="card-block">
                        <form action="{{ url('admin/portfolio/category/add') }}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Categories Name <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="The name is how it appears on your site."></i> </label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control"  name="category" placeholder="Add Categories Name"   required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Slug <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens."></i></label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control"  name="slug" placeholder="Enter-Own-url"   required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-mat btn-info ">Add Categories</button>
                        </div>
                        </form>
                        
                        
                    </div> 
                </div>
            </div>
        </div>
        <div class="row col-sm-8">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header ">
                    <h5>Manage Categories</h5>
                    <span>Manege your all Categories Below</span>
                    </div>
                    <div class="card-block">
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="row">
                               @foreach($category as $thecategory)
                                <div class="card col-sm-6">
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingOne">
                                        <h3 class="card-title accordion-title">
                                        <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $thecategory->id }}" aria-expanded="true" aria-controls="collapse{{ $thecategory->id }}">
                                        {{ $thecategory->category }}
                                        </a>
                                        </h3>
                                        </div>
                                        <div id="collapse{{ $thecategory->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="accordion-content accordion-desc">
                                            <form action="{{ url('admin/portfolio/category/edit') }}/{{ $thecategory->id }}" method="post">
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Categories Name <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="The name is how it appears on your site."></i> </label>
                                                {{ csrf_field() }}
                                                <div class="col-sm-12">
                                                    <input type="text"  class="form-control"  name="category" value="{{ $thecategory->category }}" placeholder="Add Categories Name"   required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Slug <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens."></i></label>
                                                <div class="col-sm-12">
                                                    <input type="text"  class="form-control"  name="slug" value="{{ $thecategory->slug }}" placeholder="Enter-Own-url"   required>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button class="btn btn-mat btn-info ">Update</button>
                                                <a href="{{ url('admin/portfolio/category/remove') }}/{{ $thecategory->id }}" class="btn btn-mat btn-danger ">Remove</a>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                        </div>
                                </div>
                                @endforeach
                                
                        </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
{{-- ./page body --}}


@endsection