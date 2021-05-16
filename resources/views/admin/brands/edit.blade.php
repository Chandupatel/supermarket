<style type="text/css" media="screen">
    .ngdialog.ngdialog-theme-default .ngdialog-content {
        width: 30%;
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
        <h3> Edit Brand </h3>
    </div>
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{ route('admin.brands.update', $brand->id) }}"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" placeholder="Name"
                            value="{{ $brand->name }}" name="name" required />
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="form-group">
                        <label for="name">Logo</label>
                        <input type="file" class="form-control" id="logo"  name="logo" required />
                    </div>
                </div>
                <div class="col-xl-4">
                    <img src="{{ $brand->logo }}" class="img-thumbnail" alt="{{$brand->name}}" style="height:100px;">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
