@extends('layouts.admin')
@section('content')
    <div class="container-fluid" ng-controller="SellerController">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Seller Add</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card-box">
            <form class="needs-validation" method="POST" action="{{ route('admin.sellers.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" required />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Shop Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="shop_name" placeholder="Shop Name" name="shop_name"
                                required />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mobile " placeholder="Mobile" name="mobile"
                                required />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Alternative Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="alternative_mobile "
                                placeholder="Alternative Mobile" name="alternative_mobile" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Alternative Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="alternative_mobile "
                                placeholder="Alternative Mobile" name="alternative_mobile" required />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Country <span class="text-danger">*</span></label>
                            <select name="country" class="form-control" required>
                                <option value="">Select Country </option>
                                <option value="101">India</option>
                            </select>
                            @if ($errors->has('country'))
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">State <span class="text-danger">*</span></label>
                            <select name="state" class="form-control" required>
                                <option value="">Select State </option>
                                <option value="101">Rajasthan</option>
                            </select>
                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">City <span class="text-danger">*</span></label>
                            <select name="city" class="form-control" required>
                                <option value="">Select City </option>
                                <option value="101">Udaipur</option>
                            </select>
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Zip Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="zip_code" placeholder="Zip Code" name="zip_code"
                                required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="image" placeholder="Image" name="image" required />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" placeholder="Address" name="address" rows="3"
                                required></textarea>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        app.controller('SellerController', function($window, $scope, $location, $http, ngDialog, toaster) {

        });

    </script>
@endsection
