@extends('admin.layout.master')
@section('content')
{{-- carding block --}}
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
        <div class="card-block">
        <div class="row align-items-center">
        <div class="col-8">
        <h4 class="text-c-yellow f-w-600">{{ $todayvisitor }}</h4>
        <h6 class="text-muted m-b-0">Today Visitor</h6>
         </div>
        <div class="col-4 text-right">
        <i class="fa fa-eye f-28"></i>
        </div>
        </div>
        </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
        <div class="card-block">
        <div class="row align-items-center">
        <div class="col-8">
        <h4 class="text-c-green f-w-600">{{ $totalvisitor }}</h4>
        <h6 class="text-muted m-b-0">Total Visitor</h6>
        </div>
        <div class="col-4 text-right">
        <i class="fa fa-bullseye f-28"></i>
        </div>
        </div>
        </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
        <div class="card-block">
        <div class="row align-items-center">
        <div class="col-8">
        <h4 class="text-c-pink f-w-600">{{ $totalmobilevisitor }}</h4>
        <h6 class="text-muted m-b-0">Desktop Visitor</h6>
         </div>
        <div class="col-4 text-right">
        <i class="fa fa-mobile f-28"></i>
        </div>
        </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
        <div class="card-block">
        <div class="row align-items-center">
        <div class="col-8">
        <h4 class="text-c-blue f-w-600">{{ $totaldesktopvisitor }}</h4>
        <h6 class="text-muted m-b-0">Mobile visitor</h6>
        </div>
        <div class="col-4 text-right">
        <i class="fa fa-desktop f-28"></i>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
{{-- ./carding block --}}

{{-- page body --}}
<div class="page-body">
    <div class="row">
        <div class="row col-md-8">
            @if(request()->is('admin/dashboard*')) 
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Last Login details</h5>
                    </div>
                    <div class="card-block">
                        <p class="text-c-green f-w-500">
                            <div class="row">
                                <div class="col-6 b-r-default">
                                <p class="text-muted m-b-5">Ip</p>
                                <h5>76.12%</h5>
                                </div>
                                <div class="col-6 ">
                                <p class="text-muted m-b-5">Date</p>
                                <h5>16.40%</h5>
                                </div>
                                <div class="col-6 b-t-default b-r-default">
                                <p class="text-muted m-b-5">Time</p>
                                <h5>4.56%</h5>
                                </div>
                                <div class="col-6 b-t-default">
                                    <p class="text-muted m-b-5">Location</p>
                                    <h5>4.56%</h5>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Current Login details</h5>
                    </div>
                    <div class="card-block">
                        <p class="text-c-green f-w-500">
                            <div class="row">
                                <div class="col-6 b-r-default">
                                <p class="text-muted m-b-5">Ip</p>
                                <h5>76.12%</h5>
                                </div>
                                <div class="col-6 ">
                                <p class="text-muted m-b-5">Date</p>
                                <h5>16.40%</h5>
                                </div>
                                <div class="col-6 b-t-default b-r-default">
                                <p class="text-muted m-b-5">Time</p>
                                <h5>4.56%</h5>
                                </div>
                                <div class="col-6 b-t-default">
                                    <p class="text-muted m-b-5">Location</p>
                                    <h5>4.56%</h5>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Page Views</h5>
                    <span>Below table you will see the page visitor ip and vis</span>
                    </div>
                    <div class="card-block">
                    <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>IP</th>
                    <th>Viewed on</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach($analytics as $an)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $an->date }}</td>
                            <td>{{ $an->time }}</td>
                            <td>{{ $an->ip }}</td>
                            <td class="text-center">@if($an->device == 'Desktop')
                                <i class="fa fa-desktop f-20 " style="color:rgb(10, 194, 130);" ></i>
                                @else
                                <i class="fa fa-mobile f-20" style="color:rgb(10, 194, 130);"></i>
                                 @endif
                                
                                
                            </td>
                        </tr>
                        <?php $count++; ?>
                        @endforeach
                   
                    
                    </tbody>
                    
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-4">
           <div class="col-md-12">
            <div class="card per-task-card">
                <div class="card-header">
                <h5>Mobile View</h5>
                </div>
                <div class="card-block">
                <div class="row per-task-block text-center">
                <div class="col-6">
                <div data-label="45%" class="radial-bar radial-bar-45 radial-bar-lg radial-bar-primary"></div>
                <h6 class="text-muted">Total view</h6>
                <p class="text-muted">{{ $totalmobilevisitor }}</p>
                </div>
                <div class="col-6">
                <div data-label="30%" class="radial-bar radial-bar-30 radial-bar-lg radial-bar-primary"></div>
                <h6 class="text-muted">Today view</h6>
                <p class="text-muted">{{ $todaymobile }}</p>
                </div>
                </div>
                </div>
            </div>
           </div>
           <div class="col-sm-12">
            
           </div>
           
        </div>
    </div>
</div>
{{-- ./page body --}}
@endsection