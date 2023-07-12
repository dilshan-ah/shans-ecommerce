@extends('backend/admin-master')
@section('admin-section')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>

    <h6 class="mb-0 text-uppercase">See all categories</h6>

    <hr>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="{{route('admin.add-cat')}}" class="btn btn-primary mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>New Category</a>
                        </div>
                        <div class="col-lg-9">
                            <form class="float-lg-end">
                                <div class="row row-cols-lg-auto g-2">
                                    <div class="col-12">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-white">Time Range</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-slider"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1" style="margin: 0px;">
                                                    <li><a class="dropdown-item" href="#">Last day</a></li>
                                                    <li><a class="dropdown-item" href="#">Last month</a></li>
                                                    <li><a class="dropdown-item" href="#">Last Year</a></li>
                                                    <li><a class="dropdown-item" href="#">ALL</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('success'))
        <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2 my-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-success"><i class="bx bxs-check-circle"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-success">Success</h6>
                    <div>{{ session('success') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-danger"><i class="bx bxs-message-square-x"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-danger">Something wrong</h6>
                    <div>{{ session('error') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Category</th>
                            <th>Products quantity</th>
                            <th>Vendors</th>
                            <th>Total sold</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp

                        @if(count($categories)>0)

                        @foreach($categories as $category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                <a href="{{route('admin.cat-analytic',$category->slug)}}" class="text-dark">
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src="{{asset('frontend')}}/imgs/categories/{{$category->image}}" alt="{{$category->name}}">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">
                                                {{$category->name}}
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td>60</td>
                            <td>5</td>
                            <td>45</td>
                            <td>
                                @if($category->isactive == 1)
                                    <div class="d-flex align-items-center text-success"><i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
                                        <span>Active</span>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center text-danger">	<i class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
                                        <span>Inactive</span>
                                    </div>  
                                @endif      
                            </td>
                            <td>
                                <div class="d-flex order-actions">	
                                    <a href="{{Route('admin.edit-cat',$category->slug)}}" class="">
                                        <i class="lni lni-pencil text-primary"></i>
                                    </a>
                                    
                                    <a href="javascript:;" class="ms-4" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$category->slug}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-danger">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </a>

                                    <div class="modal fade" id="deleteModal-{{$category->slug}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete "{{$category->name}}" Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you wnat to delete this category?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.delete-cat', $category->slug) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SL</th>
                            <th>Category</th>
                            <th>Products quantity</th>
                            <th>Vendors</th>
                            <th>Total sold</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>  
@endsection	