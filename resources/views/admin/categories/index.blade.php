@extends('layouts.admin')
@section('content')
    <style type="text/css">
        .category-panel {
            width: 200px;
            margin: auto 5px;
            float: left;
        }
        table#category_panels tr td {
            vertical-align: top;
        }

        table#category_panels tr td li.list-group-item .editcategory {
            z-index: 100;
        }
        li.list-group-item {
            cursor: pointer;
        }
        li.list-group-item.active {
            background-color: #555;
        }
        li.list-group-item:hover {
            background-color: #ccaacd;
        }
    </style>
    <div class="container-fluid" ng-controller="CategoriesController">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Categories</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <table id="category_panels">
                            <tr>
                                <?php for ($i = 0; $i < 1; $i++): ?> <td id="category-0">
                                    <div class="category-panel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="font-weight-bold mb-3">Categories 
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a class="addcategory-btn" href="#" data-parentcategoryid="0" class="card-link">
                                                    <i class="far fa-plus-square font-size-18"></i></a>
                                                </h5>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($categories as $value)
                                                    <li data-categoryid="{{ $value->id }}" class="list-group-item">
                                                        {{ $value->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="card-body">
                                                <a class="addcategory-btn" href="#" data-parentcategoryid="0"
                                                    class="card-link">Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <?php endfor; ?>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        app.controller('CategoriesController', function($window, $scope, $location, $http, ngDialog, toaster) {
            $(document).on('click', '.addcategory-btn', function() {
                var parent_id = $(this).attr('data-parentcategoryid');
                var url = '{{ route('admin.categories.create') }}';
                ngDialog.open({
                    template: url + "?parent_id=" + parent_id,
                    scope: $scope,
                    overlay: true,
                    closeByEscape: true,
                    closeByDocument: false,
                });
            });
            
            $(document).on('click', '.editcategory', function() {
                ngDialog.open({
                    template: $(this).attr('edit-url'),
                    scope: $scope,
                    overlay: true,
                    closeByEscape: true,
                    closeByDocument: false,
                });
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.list-group-item', function() {
                var td = $(this).closest('td');
                var tr = $(this).closest('tr');
                var parent_cat_id = $(this).data('categoryid');

                $(td).find('.list-group-item').each(function() {
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                $.ajax({
                    beforeSend: function() {
                        $(td).nextAll().remove();
                    },
                    url: '{{ route('admin.get-sub-category') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type: "POST",
                    data: {
                        'filter': $(this).data('categoryid')
                    },
                    success: function(response) {
                        if (response.status == true) {
                            $(tr).append('<td id="category-' + parent_cat_id + '">' + response
                                .data + "</td>");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
        });
    </script>
@endsection