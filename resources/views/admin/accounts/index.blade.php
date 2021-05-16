@extends('layouts.admin')
@section('content')
    <div class="container-fluid" ng-controller="AccountController">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Accounts</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        app.controller('AccountController', function($window, $scope, $location, $http, ngDialog, toaster) {

        });
    </script>
@endsection