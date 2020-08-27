@extends('admin.layout.master')
@section('content')
<style>

.the_filter {
        background-color: #4680ff;
        color: white;
    }
</style>

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
    <div class="card-header">
    <div class="row">
        <div class="col-md-6">
            <h5>Posts</h5>
            <span>Manage your posts</span>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('') }}/admin/blog/add" class="btn btn-success"><i class="fa fa-plus-circle"></i>Add Post</a>
        </div>
    </div>
    </div>
    <div class="card-block table-border-style">
    <div class="table-responsive">
    <table class="table table-bordered">
    <thead>
    <tr>
    <th>#</th>
    <th>Title</th>
    <th>Category</th>
    <th>Activity</th>
    <th>Manage</th>
    </tr>
    </thead>
    <tbody>
        <?php $count = 1; if(isset($blog) && !empty($blog)){ ?>
            @foreach($blog as $bg)
                <tr>
                    <td scope="row">{{ $count }}</td>
                    <td>{{ $bg->title }}</td>
                    <td>{{ $bg->category }}</td>
                    <td>
                     <a style="color:#fe5d70;" href="{{ url('admin/comment/') }}/{{ $bg->id }}"><i class="feather icon-message-square"></i>
                    comments(<span class="badge bg-c-pink"><?php $count = 0; ?>@foreach($comment as $com) @if($com->postid == $bg->id) <?php $count++  ?>@endif  @endforeach {{ $count }}</span>)</a><br>
                    <a style="color:#0ac282;" ><i class="fa fa-eye"></i>
                        views(<span class="badge bg-c-green"><?php $view = 0; ?> @foreach($analytics as $an) <?php if(strpos($an->page,$bg->slug) !== false){ $view++; }?> @endforeach {{ $view }}</span>)</a>
                    </td>
                    <td>
                        <a href="{{ url('admin/blog/edit/') }}/{{ $bg->id }}" class="btn btn-primary btn-outline-primary btn-icon"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="{{ url('admin/blog/delete/') }}/{{ $bg->id }}" class="btn btn-danger btn-outline-danger btn-icon"><i class="fa fa-trash"></i></a>
                        <a href="{{ url('blog') }}/{{ $bg->slug }}" target="_blank" class="btn btn-success btn-outline-success btn-icon"><i class="fa fa-eye"></i></a>
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

@endif



@if(isset($add))

{{-- page header --}}
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Add Post</h4>
                    <span>Blogging Is A Great Way To Show Your Talents And Interests To Prospective Employers</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/blog/add') }}">Add Post</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- ./page header --}}


{{-- page body --}}
<form action="{{ url('admin/blog/add') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="page-body">
    <div class="row">
        <div class="row col-sm-8">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Title</b></label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control" value=""  name="title" placeholder="Enter Title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Meta Description</b> <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Search engines such as Google often display the meta description in search"></i></label>
                            <div class="col-sm-12">
                                <textarea  rows="3" cols="3" class="form-control max-textarea" maxlength="200" name="meta" placeholder="Have meta description in 200 Words" ></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Content</b></label>
                            <div class="col-sm-12">
                                <textarea  rows="9" cols="9" class="form-control max-textarea summary-ckeditor" id="summary-ckeditor" name="content"  ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-sm-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Slug</b> <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="A slug is the part of a URL which identifies a particular page"></i></label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control"  name="slug" placeholder="Enter-Own-url"   required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Date</b></label>
                            <div class="col-sm-12">
                                <input type="date"  class="form-control"  name="date" data-date-format="DD.MMMM.YYYY"  required>
                            </div>
                        </div>
                        
                    </div> 
                </div>
                <div class="card">
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Category</b></label>
                            <div class="col-sm-12">
                                
                            
                            @if(isset($blogcategory) && !empty($blogcategory))
                               @foreach($blogcategory as $category) 
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                    <input type="checkbox" name="category[]" value="{{ $category->slug }}">
                                    <span class="cr">
                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>{{ $category->category }}</span>
                                    </label>
                                </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning background-warning">
                                    <i class="fa fa-exclamation-circle text-white"></i>
                                    <strong>No Category found!</code>
                                </div>
                            @endif                            
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header ">
                        <h5 class=""><b>Featured Image</b></h5>
                    </div>
                    <div class="card-block">
                        {{-- <div class="card">
                            <div class="card-block text-center">
                              <img src=""  width="150" height="70">
                            </div>
                        </div> --}}
                        <input name="img"  class="form-control" type="file" accept="image/*" required>
                        {{-- <input type="hidden" name="img" value=""> --}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-block text-center">
                        <button type="submit" class="btn btn-primary m-b-0">Save and publish</button>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
</form>
{{-- ./page body --}}
@endif



@if(isset($edit))
{{-- page header --}}
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Edit Post</h4>
                    <span>Blogging Is A Great Way To Show Your Talents And Interests To Prospective Employers</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/blog/edit') }}/{{ $blog[0]->id }}">Edit Post</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- ./page header --}}


{{-- page body --}}
<form action="{{ url('admin/blog/edit') }}/{{ $blog[0]->id }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="page-body">
    <div class="row">
        <div class="row col-sm-8">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group row">
                            <input type="hidden" name="id" value="{{ $blog[0]->id }}">
                            <label class="col-sm-12 col-form-label"><b>Title</b></label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control" value="{{ $blog[0]->title }}"  name="title" placeholder="Enter Title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Meta Description</b> <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="Search engines such as Google often display the meta description in search"></i></label>
                            <div class="col-sm-12">
                                <textarea  rows="3" cols="3" class="form-control max-textarea" maxlength="200" name="meta" placeholder="Have meta description in 200 Words" >{{ $blog[0]->meta }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Content</b></label>
                            <div class="col-sm-12">
                                <textarea  rows="9" cols="9" class="form-control max-textarea summary-ckeditor" id="summary-ckeditor" name="content"  >{{ $blog[0]->content }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-sm-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Slug</b> <i class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="A slug is the part of a URL which identifies a particular page"></i></label>
                            <div class="col-sm-12">
                                <input type="text"  class="form-control" value="{{ $blog[0]->slug }}"  name="slug" placeholder="Enter-Own-url"   required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Date</b></label>
                            <div class="col-sm-12">
                                <input type="date"  class="form-control" value="{{ $blog[0]->date }}" name="date" data-date-format="DD.MMMM.YYYY"  required>
                            </div>
                        </div>
                        
                    </div> 
                </div>
                <div class="card">
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><b>Category</b></label>
                            <div class="col-sm-12">
                                
                               @if(isset($blogcategory))
                                    @foreach($blogcategory as $category) 
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <?php 
                                                $ct = $blog[0]->category;
                                                $thecategory = explode(",",$ct);
                                        
                                                ?>
                                            <input type="checkbox"  @foreach($thecategory as $blogcategory)
                                            
                                            @if($blogcategory == $category->slug){
                                                {{ 'checked' }}
                                            @endif
                                        @endforeach name="category[]" value="{{ $category->slug }}">
                                            <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span>{{ $category->category }}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="alert alert-warning background-warning">
                                            <i class="fa fa-exclamation-circle text-white"></i>
                                            <strong>No Category found!</code>
                                        </div>
                                    @endif

                               
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header ">
                        <h5 class=""><b>Featured Image</b></h5>
                    </div>
                    <div class="card-block">
                        <div class="card">
                            <div class="card-block text-center">
                              <img src="{{ url('') }}/{{ $blog[0]->featuredimage }}"  width="150" height="70">
                            </div>
                        </div>
                        <input name="img"  class="form-control" type="file" accept="image/*" >
                        <input type="hidden" name="img" value="{{ $blog[0]->featuredimage }}">
                    </div>
                </div>
                <div class="card">
                    <div class="card-block text-center">
                        <button type="submit" class="btn btn-primary m-b-0">Save and publish</button>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
</form>
{{-- ./page body --}}
@endif


@endsection