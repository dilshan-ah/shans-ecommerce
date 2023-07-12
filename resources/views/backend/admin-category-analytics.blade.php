@extends('backend/admin-master')
@section('admin-section')
<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center position-relative">
            <img src="{{asset('frontend')}}/imgs/categories/{{$category->image}}" class="" width="90" height="90" alt="...">
            <div class="flex-grow-1 ms-3">
                <h5 class="mt-0">{{$category->name}}</h5>
                <p class="mb-0">Created at: {{ $category->created_at->format('Y-m-d') }}</p>
                <p class="mb-0">Last updated: {{ $category->updated_at->diffForHumans() }}</p>
            </div>
            <div class="position-absolute" style="right: 0; bottom: 0;">
                @if($category->isactive == 1)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif    
            </div>

            <div class="d-flex order-actions position-absolute" style="right: 0; top: 0;">	
                <a href="{{route('admin.edit-cat',$category->slug)}}" class="">
                    <i class="lni lni-pencil text-primary"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<h6 class="mb-0 text-uppercase">Order summery of {{$category->name}}</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div id="catorder"></div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Total Users</p>
                        <h5 class="mb-0">85,028</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">	<i class='bx bx-dots-horizontal-rounded font-22 text-dark'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="" id="chart2"></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Page Views</p>
                        <h5 class="mb-0">42,892</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">	<i class='bx bx-dots-horizontal-rounded font-22 text-dark'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="" id="chart3"></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Avg. Session Duration</p>
                        <h5 class="mb-0">00:03:20</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">	<i class='bx bx-dots-horizontal-rounded font-22 text-dark'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="" id="chart4"></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">Bounce Rate</p>
                        <h5 class="mb-0">51.46%</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">	<i class='bx bx-dots-horizontal-rounded font-22 text-dark'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="" id="chart5"></div>
            </div>
        </div>
    </div>
</div>

<style>
    #SvgjsSvg1158,#apexchartslry1p9si{
        display: none !important;
    }
</style>



<script>
    $(function () {
        "use strict";
	    // chart 1
        var options = {
            series: [{
                name: 'Total',
                data: [14, 0, 10, 9, 35, 19, 22, 9, 12, 7, 19, 5]
            }],
            chart: {
                foreColor: '#9ba7b2',
                height: 360,
                type: 'line',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: true
                },
                dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: 0.10,
                }
            },
            stroke: {
                width: 5,
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000'],
            },
            title: {
                text: 'Orders',
                align: 'left',
                style: {
                    fontSize: "16px",
                    color: '#666'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    gradientToColors: ['#f41127'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            markers: {
                size: 4,
                colors: ["#f41127"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7,
                }
            },
            colors: ["#f41127"],
            yaxis: {
                title: {
                    text: 'Number of order',
                },
            }
        };
        var chart = new ApexCharts(document.querySelector("#catorder"), options);
        chart.render();
    });
</script>

<script src="{{asset('backend')}}/assets/js/widgets.js"></script>

@endsection	