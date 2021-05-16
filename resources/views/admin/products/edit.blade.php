@extends('layouts.admin')
@section('content')
    <div class="container-fluid" ng-controller="ProductController">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Product Edit</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card-box">
            <form class="needs-validation" method="POST" action="{{ route('admin.products.update', $product->id) }}"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h4>Category</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="text-dark">Category<span class="text-danger">*</span></label>
                            <input type="hidden" id="category_id" name="category_id">
                            <select class="form-control" id="category" name="categories[]" ng-model="category"
                                ng-change="categoryChange(category,0,0)" required />
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="brand">Brand <span class="text-danger">*</span></label>
                            <input type="text" class="form-control autocompletebrands" id="brand_name" name="brand_name"
                                placeholder="Brand" value="{{ $product->brand ? $product->brand->name : '' }}" required />
                            <input type="hidden" name="brand_id" id="brand_id"
                                value="{{ old('brand_id', $product->brand_id) }}" />
                        </div>
                    </div>
                </div>
                <div class="row" ng-if="sub_categories && sub_categories.length > 0">
                    <div class="col-md-12">
                        <h4>Sub Categories</h4>
                    </div>
                    <div class="col-md-3" ng-repeat="(key, categories) in sub_categories">
                        <div class="form-group">
                            <label for="subcategory">Sub Category @{{ key + 1 }}<span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="subcategory" name="categories[]"
                                ng-model="categories.subcategory" ng-change="categoryChange(categories.subcategory,key+1,0)"
                                required />
                            <option value="">Select Category</option>
                            <option ng-repeat="(category_key, category) in categories.categories"
                                value="@{{ category . id }}">@{{ category . name }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                value="{{ old('name', $product->name) }}" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="youtube_video">Youtube Video</label>
                            <input type="text" class="form-control" id="youtube_video" placeholder="Youtube Video"
                                name="youtube_video" value="{{ old('name', $product->name) }}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mrp_price">MRP Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="mrp_price" placeholder="MRP Price"
                                name="mrp_price" value="{{ old('mrp_price', $product->mrp_price) }}" required />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="purchase_price">Purchase Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="purchase_price" placeholder="Purchase Price"
                                name="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}"
                                required />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="selling_price">Selling Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="selling_price" placeholder="Selling Price"
                                name="selling_price" value="{{ old('selling_price', $product->selling_price) }}"
                                required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selling_price">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id="description" placeholder="Description"
                                rows="5" required>{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selling_price">Terms Policy <span class="text-danger">*</span></label>
                            <textarea name="terms_policy" class="form-control" id="terms_policy" placeholder="Terms Policy"
                                rows="5" required>{{ old('terms_policy', $product->terms_policy) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Thumbnail</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group pt-3">
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" />
                            <img src="{{ $product->thumbnail }}" class="img-thumbnail" alt="{{ $product->name }}"
                                style="height:100px;">
                        </div>

                    </div>
                    <div class="col-md-2 form-group">
                        <label>Active Status </label><br>
                        <input type="checkbox" data-toggle="toggle" data-on="Active" data-off="In-Active"
                            name="active_status" {{ $product->active_status == 1 ? 'checked' : '' }} />
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Admin Approve Status </label>
                        <input type="checkbox" data-toggle="toggle" data-on="Approve" data-off="Un-Approve"
                            name="admin_approve_status" {{ $product->admin_approve_status == 1 ? 'checked' : '' }} />
                    </div>

                    <div class="col-md-2 form-group">
                        <label>Featured Product </label><br>
                        <input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" name="featured"
                            {{ $product->featured == 1 ? 'checked' : '' }} />
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Allow Cod </label><br>
                        <input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" name="allow_cod"
                            {{ $product->allow_cod == 1 ? 'checked' : '' }} />
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="tags">Tags<span class="text-danger">*</span></label>
                        <input type="text" name="tags" data-role="tagsinput" placeholder="Enter Product Tag"
                            value="{{ $product->tags }}" required />
                    </div>

                    <div class="col-md-12">
                        <h4>Gallery Images</h4>
                    </div>

                    <div class="col-md-12 form-group">
                        <div id="dropzoneadd" class="dropzone"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
            </form>
            <!-- Row -->
            <div style="display: none;">
                <div id="template-preview">
                    <div class="dz-preview dz-file-preview well text-center" id="dz-preview-template">
                        <div class="dz-preview dz-file-preview">
                            <div class="dz-image"> <img data-dz-thumbnail="" style="width: 119px; height: 119px;"> </div>
                            <div class="dz-progress"> <span class="dz-upload" data-dz-uploadprogress=""></span> </div>
                            <div class="dz-success-mark"> <span></span> </div>
                            <div class="dz-error-mark"> <span></span> </div>
                            <div class="dz-error-message"> <span data-dz-errormessage=""></span> </div>
                        </div>
                        <div class="images">
                            <input type="text" name="image_title[]" class="form-control" placeholder="Image title"
                                style="width: 153px;">
                            <input type="hidden" name="image_name[]">
                            <button type="button" data-dz-remove="" class="delete btn btn-sm btn-danger my-1">
                                <i class="fas fa-trash-alt" aria-hidden="true"
                                    style="font-size:20px;cursor:pointer;"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('bootstrap3-typeahead/bootstrap3-typeahead.min.js') }}"></script>
    <link href="{{ asset('admin/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <link href="{{ asset('dropzone/dropzone.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('dropzone/dropzone.js') }}"></script>

    <script type="text/javascript">
        app.controller('ProductController', function($window, $scope, $location, $http, ngDialog, toaster) {

            $('input.autocompletebrands').typeahead({
                source: function(query, process) {
                    return $.get('{{ route('admin.get-autocomplete-brands') }}', {
                        query: query
                    }, function(data) {
                        if (data.length === 0) {
                            $("#brand_id").val(0);
                        }
                        return process(data);
                    });
                },
                updater: function(item) {
                    $("#brand_id").val(item.id);
                    return item;
                }
            });

            $scope.product_categories = @json($product->product_categories);
            $scope.sub_categories = [];

            $scope.categoryChange = function(category, index, selected) {
                $('#category_id').val(category);
                $http.post('{{ route('admin.products.sub-categories') }}', {
                    parent_id: category
                }).then(function(response) {
                    if (response.data.status == true) {
                        angular.forEach($scope.sub_categories, function(value, key) {
                            if (index == 0) {
                                $scope.sub_categories = [];
                            } else {
                                $scope.sub_categories.splice(index, 1);
                            }
                        });
                        if (response.data.categories && response.data.categories.length) {
                            if (selected == 1) {
                                $scope.sub_categories.push({
                                    categories: response.data.categories,
                                    subcategory: $scope.product_categories[index + 1]
                                        .category_id.toString()
                                });
                            } else {
                                $scope.sub_categories.push({
                                    categories: response.data.categories,
                                    subcategory: ""
                                });
                            }
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.data.message,
                        });
                    }
                }, function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: error,
                    });
                });
            }
            angular.forEach($scope.product_categories, function(value, key) {
                if (key == 0) {
                    $scope.category = value.category_id.toString();
                    $scope.categoryChange(value.category_id, key, 1);
                } else {
                    $scope.subcategory = value.category_id.toString();
                    $scope.categoryChange(value.category_id, key, 1);
                }
            });
        });

    </script>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var upload_imgages = new Dropzone("#dropzoneadd", {
            url: "{{ route('admin.products.gallery-image.save') }}",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            method: "POST",
            timeout: 180000,
            maxFiles: 20,
            maxFilesize: 10, // 5mb
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            maxThumbnailFilesize: 125,
            autoProcessQueue: true,
            autoQueue: true, // Make sure the files aren't queued until manually added
            previewTemplate: document.getElementById('template-preview').innerHTML,
            error: function(file, response) {
                this.removeFile(file);
            },
            init: function() {
                var myDropzone = this;
                var existingFiles = @json($product->gallery);
                if (existingFiles != '' && existingFiles != 'null') {
                    for (i = 0; i < existingFiles.length; i++) {
                        myDropzone.emit("addedfile", existingFiles[i]);
                        myDropzone.emit("thumbnail", existingFiles[i], existingFiles[i]
                            .name);
                        myDropzone.emit("complete", existingFiles[i]);
                        $("#dropzoneadd input[name='image_title[]']:eq(" + i + ")").val(existingFiles[i]
                            .title);
                        $("#dropzoneadd input[name='image_name[]']:eq(" + i + ")").val(existingFiles[i]
                            .name);
                    }
                }
                myDropzone.on("removedfile", function(file, response) {
                    $.post({
                        url: '{{ route('admin.products.gallery-image.delete') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            image_url: $(file.previewElement).find(
                                "input[name='image_name[]']:first").val(),
                            folder_id: '{{ $product->id }}',
                            new_product: 0
                        },
                        dataType: 'json',
                        success: function(data) {}
                    });
                });
                myDropzone.on("addedfile", function(file) {});
                myDropzone.on("sending", function(file, xhr, formData) {
                    formData.append("folder_id", '{{ $product->id }}');
                    formData.append("new_product", 0);
                    return false;
                });
                myDropzone.on("success", function(file, response) {
                    if (response.status == true) {
                        $(file.previewElement).find("input[name='image_name[]']:first").val(response
                            .file_name);
                    } else {
                        this.removeFile(file);
                    }
                    return false;
                });
            }
        });
    </script>
@endsection
