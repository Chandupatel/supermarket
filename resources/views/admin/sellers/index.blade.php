@extends('layouts.admin')
@section('content')
    <div class="container-fluid" ng-controller="SellerController">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Sellers</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <a href="{{ route('admin.sellers.create') }}" class="btn btn-success mb-2">
                                <i class="mdi mdi-plus mr-2"></i> Add Seller
                            </a>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-centered datatable dt-responsive nowrap "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customercheck">
                                                <label class="custom-control-label" for="customercheck">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Image</th>
                                        <th>Sku</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = app('request')->input('page') &&
                                    app('request')->input('page') > 1 ? (app('request')->input('page') - 1) * 50 + 1 : 1;
                                    ?>
                                    {{-- @foreach ($products as $key => $item)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="checkbox{{ $item->id }}">
                                                    <label class="custom-control-label"
                                                        for="checkbox{{ $item->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ $item->thumbnail }}" class="img-thumbnail"
                                                    alt="{{ $item->name }}" style="height:50px;">
                                            </td>
                                            <td>{{$item->sku}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->active_status == 1 ? 'badge-success' : 'badge-danger' }}">{{ $item->active_status == 1 ? 'Active' : 'InActive' }}</span>
                                            </td>
                                            <td>
                                                {{ date($gs->date_format, strtotime($item->created_at)) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', $item->id) }}"
                                                    class="btn btn-outline-dark btn-sm waves-effect waves-light ">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button
                                                    class="btn btn-outline-danger btn-sm waves-effect waves-light row-delete-button"
                                                    delete-url="{{ route('admin.products.destroy', $item->id) }}">
                                                    <i class="nav-icon fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        {{-- <div class="mb-2 text-right">
                            {{ $products->appends(app('request')->input())->links() }}
                        </div> --}}
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
@endsection 
@section('scripts')
    <script type="text/javascript">
        app.controller('SellerController', function($window, $scope, $location, $http, ngDialog, toaster) {

        });
    </script>
@endsection