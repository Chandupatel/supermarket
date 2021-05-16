@extends('layouts.admin')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Phange Password</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card-box">
                <form action="{{ route('admin.password.update') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" />
                            @if ($errors->has('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="New Password" />
                            @if ($errors->has('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password"
                                placeholder="Confirm Password" />
                            @if ($errors->has('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </form>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
