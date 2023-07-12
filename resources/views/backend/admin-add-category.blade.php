@extends('backend/admin-master')
@section('admin-section')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
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
        <div class="card-body p-4">
            <h5 class="card-title">Add New Category</h5>
            <hr>
            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="border border-3 p-4 rounded">
                            <form action="{{route('admin.insert-cat')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Category Title</label>
                                    <input type="text" class="form-control" name="catname" id="inputProductTitle" placeholder="Enter category title" required>
                                    @error('catname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Category Slug</label>
                                    <input type="text" class="form-control @error('catslug') is-invalid @enderror" name="catslug" id="inputProductTitle" placeholder="Enter Category slug" value="{{ old('catslug') }}">
                                    @error('catslug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductType" class="form-label">Product Type</label>
                                    <select class="form-select" id="inputProductType" name="status">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Category Image</label>
                                    <div class="d-flex align-items-center">
                                    <img id="image-preview" src="{{ asset('frontend/imgs/categories/default.jpg') }}" alt="Category Image Preview" class="px-3" style="width: 100px; height: auto;">
                                        <input id="image-uploadify" type="file" name="catimg" accept="image/jpeg, image/png, image/gif, image/svg+xml" onchange="previewImage(event)">                                       
                                    </div>
                                    @error('catimg')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Create Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#inputProductTitle').on('keyup', function() {
            var categoryName = $(this).val();
            var slug = categoryName.toLowerCase().replace(/[^a-z0-9]+/g, '-');
            $('input[name="catslug"]').val(slug);
        });
    });
    </script>

    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const imagePreview = document.getElementById('image-preview');
            const defaultImageURL = '{{ asset('frontend/imgs/categories/default.jpg') }}';

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                imagePreview.src = defaultImageURL;
            }
        }
    </script>

@endsection	