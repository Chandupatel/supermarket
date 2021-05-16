@extends('layouts.admin')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">General Settings</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card-box">
                <form class="needs-validation" method="POST" action="{{ route('admin.settings.save-general-settings') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block"> General Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Social Information</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Date Time Format</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#settings1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Other Settings</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    {{-- Seart General Settings --}}
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="company_name" placeholder="Company Name"
                                            value="{{ old('company_name', $setting->company_name) }}" name="company_name"
                                            required />
                                        @if ($errors->has('company_name'))
                                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company_email">Company Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="company_email"
                                            placeholder="Company Email"
                                            value="{{ old('company_email', $setting->company_email) }}"
                                            name="company_email" required />
                                        @if ($errors->has('company_email'))
                                            <span class="text-danger">{{ $errors->first('company_email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contect_number">Contect Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="contect_number"
                                            placeholder="Contect Number"
                                            value="{{ old('contect_number', $setting->contect_number) }}"
                                            name="contect_number" required />
                                        @if ($errors->has('contect_number'))
                                            <span class="text-danger">{{ $errors->first('contect_number') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company_address">Company Full Adderss <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="company_address" name="company_address"
                                            rows="3">{{ old('company_address', $setting->company_address) }}</textarea>
                                        @if ($errors->has('company_address'))
                                            <span class="text-danger">{{ $errors->first('company_address') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_address">Company Logo Image <span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="company_logo"
                                            accept="image/x-png,image/gif,image/jpeg" />
                                        @if ($errors->has('company_logo'))
                                            <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_address">Company Favicon Icon <span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="company_favicon"
                                            accept="image/x-png,image/gif,image/jpeg" />
                                        @if ($errors->has('company_favicon'))
                                            <span class="text-danger">{{ $errors->first('company_favicon') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- End General Settings --}}
                        {{-- Seart Social Information --}}
                        <div class="tab-pane" id="profile1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="facebook"> Facebook Link</label>
                                        <input type="text" class="form-control" id="facebook" placeholder="Facebook Link"
                                            value="{{ old('facebook', $setting->facebook) }}" name="facebook" />
                                        @if ($errors->has('facebook'))
                                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="twitter">Twitter Link </label>
                                        <input type="text" class="form-control" id="twitter" placeholder="Twitter Link"
                                            value="{{ old('twitter', $setting->twitter) }}" name="twitter" />
                                        @if ($errors->has('twitter'))
                                            <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="youtube">Youtube Link </label>
                                        <input type="text" class="form-control" id="youtube" placeholder="Youtube Link"
                                            value="{{ old('youtube', $setting->youtube) }}" name="youtube" />
                                        @if ($errors->has('youtube'))
                                            <span class="text-danger">{{ $errors->first('youtube') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin Link </label>
                                        <input type="text" class="form-control" id="linkedin" placeholder="Linkedin Link"
                                            value="{{ old('linkedin', $setting->linkedin) }}" name="linkedin" />
                                        @if ($errors->has('linkedin'))
                                            <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="instagram">Instagram Link </label>
                                        <input type="text" class="form-control" id="instagram" placeholder="Instagram Link"
                                            value="{{ old('instagram', $setting->instagram) }}" name="instagram" />
                                        @if ($errors->has('instagram'))
                                            <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pinterest">Pinterest Link </label>
                                        <input type="text" class="form-control" id="pinterest" placeholder="Pinterest Link"
                                            value="{{ old('pinterest', $setting->pinterest) }}" name="pinterest" />
                                        @if ($errors->has('pinterest'))
                                            <span class="text-danger">{{ $errors->first('pinterest') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="googleplus">Google+ Link </label>
                                        <input type="text" class="form-control" id="googleplus" placeholder="googl+ Link"
                                            value="{{ old('googleplus', $setting->googleplus) }}" name="googleplus" />
                                        @if ($errors->has('googleplus'))
                                            <span class="text-danger">{{ $errors->first('googleplus') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="skype">Skype Link </label>
                                        <input type="text" class="form-control" id="skype" placeholder="Skype Link"
                                            value="{{ old('skype', $setting->skype) }}" name="skype" />
                                        @if ($errors->has('skype'))
                                            <span class="text-danger">{{ $errors->first('skype') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="yahoo">Yahoo Link </label>
                                        <input type="text" class="form-control" id="yahoo" placeholder="Yahoo Link"
                                            value="{{ old('yahoo', $setting->yahoo) }}" name="yahoo" />
                                        @if ($errors->has('yahoo'))
                                            <span class="text-danger">{{ $errors->first('yahoo') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Social Information --}}
                        {{-- Seart Date Time Format --}}
                        <div class="tab-pane" id="messages1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-sm-5 col-form-label">Date Format</label>
                                    <div class="col-sm-12">
                                        <select name="date_format" class="form-control">
                                            <option value="">Select Date Format </option>

                                            <option value="jS M Y"
                                                {{ $setting->date_format == 'jS M Y' ? 'selected' : '' }}>
                                                {{ date('jS M Y') }}
                                            </option>
                                            <option value="F, jS Y"
                                                {{ $setting->date_format == 'F, jS Y' ? 'selected' : '' }}>
                                                {{ date('F, jS Y') }}
                                            </option>
                                            <option value="Y-m-d"
                                                {{ $setting->date_format == 'Y-m-d' ? 'selected' : '' }}>
                                                {{ date('Y-m-d') }}
                                            </option>
                                            <option value="d-m-Y"
                                                {{ $setting->date_format == 'd-m-Y' ? 'selected' : '' }}>
                                                {{ date('d-m-Y') }}
                                            </option>
                                            <option value="jS M Y H:i:s"
                                                {{ $setting->date_format == 'jS M Y H:i:s' ? 'selected' : '' }}>
                                                {{ date('jS M Y H:i:s') }}
                                            </option>
                                            <option value="jS-M-Y H:i:s A"
                                                {{ $setting->date_format == 'jS-M-Y H:i:s A' ? 'selected' : '' }}>
                                                {{ date('jS-M-Y H:i:s A') }}
                                            </option>
                                            <option value="jS M Y h:i:s"
                                                {{ $setting->date_format == 'jS M Y h:i:s' ? 'selected' : '' }}>
                                                {{ date('jS M Y h:i:s') }}
                                            </option>
                                            <option value="jS-M-Y h:i:s A"
                                                {{ $setting->date_format == 'jS-M-Y h:i:s A' ? 'selected' : '' }}>
                                                {{ date('jS-M-Y h:i:s A') }}
                                            </option>
                                        </select>
                                        @if ($errors->has('date_format'))
                                            <span class="text-danger">{{ $errors->first('date_format') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-5 col-form-label">Date Time Format</label>
                                    <div class="col-sm-12">
                                        <select name="date_time_format" class="form-control">
                                            <option value="">Select Date Time Format </option>
                                            <option value="H:i:s"
                                                {{ $setting->date_time_format == 'H:i:s' ? 'selected' : '' }}>
                                                {{ date('H:i:s') }}
                                            </option>
                                            <option value="H:i:s A"
                                                {{ $setting->date_time_format == 'H:i:s A' ? 'selected' : '' }}>
                                                {{ date('H:i:s A') }}
                                            </option>
                                        </select>
                                        @if ($errors->has('date_time_format'))
                                            <span class="text-danger">{{ $errors->first('date_time_format') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Date Time Format --}}

                        {{-- Seart Other Settings --}}
                        <div class="tab-pane" id="settings1" role="tabpanel">

                        </div>
                        {{-- End Other Settings --}}

                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
