@extends('backend/admin-master')
@section('admin-section')
<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center position-relative">
            @if($category->image)
                <img src="{{asset('frontend')}}/imgs/categories/{{$category->image}}" class="" width="90" height="90" alt="...">
            @else
                <img src="{{asset('frontend/imgs/categories/default.jpg')}}" class="" width="90" height="90" alt="...">    
            @endif
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
                        <p class="mb-0 text-secondary">Revenue</p>
                        <h4 class="my-1">$4805</h4>
                        <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p>
                    </div>
                    <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Products</p>
                        <h4 class="my-1">8.4K</h4>
                        <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>24 from last week</p>
                    </div>
                    <div class="widgets-icons bg-light-info text-info ms-auto"><i class="lni lni-archive"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">On stores</p>
                        <h4 class="my-1">59K</h4>
                        <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>3 from last week</p>
                    </div>
                    <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class="lni lni-restaurant"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Products sold</p>
                        <h4 class="my-1">34.46%</h4>
                        <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p>
                    </div>
                    <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row row-cols-1 row-cols-xl-2">
    <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Top Sub Categories</h5>
                    </div>
                    <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                    </div>
                </div>
                <div class="mt-5" id="chart15"></div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Kids <span class="badge bg-success rounded-pill">25</span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Women <span class="badge bg-danger rounded-pill">10</span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Men <span class="badge bg-primary rounded-pill">65</span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Furniture <span class="badge bg-warning text-dark rounded-pill">14</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">Sub Categories</h5>
                        @foreach ($subcategories as $subcategory)
                            @if ($subcategory->parent_cat == $category->id)
                                <p class="mb-0 font-13 text-secondary">
                                    {{ $subcategories->count() }} sub category under {{ $category->name }}
                                </p>
                                @break
                            @else
                                <p class="mb-0 font-13 text-secondary">
                                    No sub category under {{ $category->name }}
                                </p>
                                @break    
                            @endif
                        @endforeach
                    </div>
                    
                </div>
            </div>
            <div class="product-list p-3 mb-3 ps ps--active-y">
               

                @foreach($subcategories as $subcategory)
                @if($subcategory->parent_cat == $category->id)
                    <div class="row border mx-0 mb-3 py-2 radius-10 cursor-pointer">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="product-img">
                                    <img src="{{asset('backend')}}/assets/images/icons/chair.png" alt="">
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-1">{{$subcategory->name}}</h6>
                                    <p class="mb-0">$240.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-1">$2140.00</h6>
                            <p class="mb-0">345 Sales</p>
                        </div>
                    </div>
                @endif
                @endforeach
                

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 380px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 214px;"></div></div></div>

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