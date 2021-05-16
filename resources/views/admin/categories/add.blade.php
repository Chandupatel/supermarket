<style type="text/css" media="screen">
    .ngdialog.ngdialog-theme-default .ngdialog-content {
        width: 40%;
        background: #FFFFFF;
        padding: 0;
        border-radius: 2px;
    }

    .ngdialog,
    .ngdialog-overlay {
        position: fixed;
        top: -88px;
        right: 0;
        bottom: 0;
        left: 0;
    }

</style>
<div class="card">
    <div class="card-header">
        <h3> Add Category </h3>
    </div>
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{ route('admin.categories.store') }}"
        enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">Image</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label">Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ old('image') }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <input type="hidden" name="category_id" value="{{$parent_id}}">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success mr-2">Submit</button>
            </div>
        </form>
    </div>
</div>
