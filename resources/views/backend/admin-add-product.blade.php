@extends('backend/admin-master')
@section('admin-section')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">eCommerce</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
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
<!--end breadcrumb-->

<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr/>
        <div class="form-body mt-4">
        <div class="row">
            <div class="col-lg-8">
            <div class="border border-3 p-4 rounded">

            <div class="mb-3">
                <label for="inputProductTitle" class="form-label">Product Name</label>
                <input type="text" name="proname" class="form-control" id="inputProductTitle" placeholder="Enter product title">
            </div>

            <div class="mb-3">
                <label for="inputProductTitle" class="form-label">Product Slug</label>
                <input type="text" name="proslug" class="form-control" id="inputProductTitle" placeholder="Enter product slug" value="{{ old('proslug') }}">
            </div>


            <div class="mb-3">
                <label for="inputProductDescription" class="form-label">Short Description</label>
                <textarea class="form-control" id="inputProductDescription" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="inputProductDescription" class="form-label">Description</label>
                <textarea id="mytextarea" name="mytextarea" rows="10">Add Description</textarea>
            </div>

            <div class="mb-3">
                <label for="inputProductDescription" class="form-label">Product Images</label>
                <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
            </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                <div class="col-md-6">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="email" class="form-control" id="inputPrice" placeholder="00.00">
                    </div>
                    <div class="col-md-6">
                    <label for="inputCompareatprice" class="form-label">Sale Price</label>
                    <input type="password" class="form-control" id="inputCompareatprice" placeholder="00.00">
                    </div>

                    <div class="col-12 mb-3" data-select2-id="21">
                        <label class="form-label">Category</label>
                        <select class="single-select select2-hidden-accessible" name="category" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="0" selected>Select Category</option>
                            @if(count($categories)>0)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach    
                            @endif 
                        </select>
                    </div>

                    <div class="col-12 mb-3" data-select2-id="22">
                        <label class="form-label">Sub Category</label>
                        <select class="single-select select2-hidden-accessible" name="sub_category" data-select2-id="2" tabindex="-1" aria-hidden="true">
                            <option value="0" selected>Select Sub Category</option>
                            @if(count($subcategories)>0)
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$category->name}}</option>
                                @endforeach    
                            @endif 
                        </select>
                    </div>

                    
                    
                    <div class="col-12 mb-3" data-select2-id="22">
                        <label class="form-label">Brands</label>
                        <select class="single-select select2-hidden-accessible" name="sub_category" data-select2-id="3" tabindex="-1" aria-hidden="true">
                            <option></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Product Tags</label>
                        <input type="text" class="form-control" data-role="tagsinput" value="">
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary">Save Product</button>
                        </div>
                    </div>
                </div> 
            </div>
            </div>
        </div><!--end row-->
    </div>
    </div>
</div>

<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>

<script src="{{asset('backend')}}/assets/plugins/select2/js/select2.min.js"></script>

<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>

<script>
    $(document).ready(function() {
        $('#inputProductTitle').on('keyup', function() {
            var productName = $(this).val();
            var slug = productName.toLowerCase().replace(/[^a-z0-9]+/g, '-');
            $('input[name="proslug"]').val(slug);
        });
    });
</script>

<script src="{{asset('backend')}}/assets/plugins/input-tags/js/tagsinput.js"></script>
@endsection	