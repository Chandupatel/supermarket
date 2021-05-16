@extends('layouts.admin')
@section('content')
    <div class="container-fluid" ng-controller="UnitController">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Units</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <button class="btn btn-success mb-2" ng-click="addUnit()">
                                <i class="mdi mdi-plus mr-2"></i> Add Unit
                            </button>
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
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = app('request')->input('page') &&
                                    app('request')->input('page') > 1 ? (app('request')->input('page') - 1) * 50 + 1 : 1;
                                    ?>
                                    @foreach ($units as $key => $item)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="checkbox{{ $item->id }}">
                                                    <label class="custom-control-label"
                                                        for="checkbox{{ $item->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                {{ date($gs->date_format, strtotime($item->created_at)) }}
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-outline-dark btn-sm waves-effect waves-light row-edit-button"
                                                    ng-click="EditUnit('{{ route('admin.units.edit', $item->id) }}')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-danger btn-sm waves-effect waves-light row-delete-button"
                                                    delete-url="{{ route('admin.units.destroy', $item->id) }}">
                                                    <i class="mdi mdi-trash-can font-size-18"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="mb-2 text-right">
                            {{ $units->appends(app('request')->input())->links() }}
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        app.controller('UnitController', function($window, $scope, $location, $http, ngDialog, toaster) {

            $scope.addUnit = function() {
                ngDialog.open({
                    template: '{{ route('admin.units.create') }}',
                    scope: $scope,
                    overlay: true,
                    closeByEscape: true,
                    closeByDocument: false,
                });
            }
            $scope.EditUnit = function(url) {
                ngDialog.open({
                    template: url,
                    scope: $scope,
                    overlay: true,
                    closeByEscape: true,
                    closeByDocument: false,
                });
            }
        });

    </script>
@endsection
