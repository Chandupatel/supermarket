<div class="navbar-custom">
	<ul class="list-unstyled topnav-menu float-right mb-0">
		{{-- <li class="dropdown notification-list dropdown d-none d-lg-inline-block ml-2">
			<a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<img src="{{asset('admin/images/flags/us.jpg')}}" alt="lang-image" height="12">
			</a>
			<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
				<a href="javascript:void(0);" class="dropdown-item notify-item">
					<img src="{{asset('admin/images/flags/germany.jpg')}}" alt="lang-image" class="mr-1" height="12"> <span
					class="align-middle">German</span>
				</a>
			</div>
		</li> --}}
		<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<i class="dripicons-bell noti-icon"></i>
				<span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right dropdown-lg">
				<div class="dropdown-header noti-title">
					<h5 class="text-overflow m-0"><span class="float-right">
						<span class="badge badge-danger float-right">5</span>
					</span>Notification
				</h5>
			</div>
			<div class="slimscroll noti-scroll">
				<a href="javascript:void(0);" class="dropdown-item notify-item">
					<div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
					<p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
				</a>
				
				<a href="javascript:void(0);" class="dropdown-item notify-item">
					<div class="notify-icon bg-primary">
						<i class="mdi mdi-settings-outline"></i>
					</div>
					<p class="notify-details">New settings
						<small class="text-muted">There are new settings available</small>
					</p>
				</a>
				<a href="javascript:void(0);" class="dropdown-item notify-item">
					<div class="notify-icon bg-warning">
						<i class="mdi mdi-bell-outline"></i>
					</div>
					<p class="notify-details">Updates
						<small class="text-muted">There are 2 new updates available</small>
					</p>
				</a>
				<hr>
			</div>
			<a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
				View all
				<i class="fi-arrow-right"></i>
			</a>
		</li>
		<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<img src="{{asset('admin/images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
				<span class="pro-user-name ml-1">
					{{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> 
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right profile-dropdown ">

				 <a href="{{route('admin.profile')}}" class="dropdown-item notify-item">
					<i class="fe-user"></i>
					<span>Profile</span>
				</a>
				{{--<a href="javascript:void(0);" class="dropdown-item notify-item">
					<i class="fe-settings"></i>
					<span>Settings</span>
				</a> 

				<a href="javascript:void(0);" class="dropdown-item notify-item">
					<i class="fe-lock"></i>
					<span>Lock Screen</span>
				</a> --}}

				<a href="{{route('admin.change-password')}}" class="dropdown-item notify-item">
					<i class="fe-lock"></i>
					<span>Change Password</span>
				</a>
				<div class="dropdown-divider"></div>

				<a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
					<i class="fe-log-out"></i>
					<span>Logout</span>
				</a>
			</div>
		</li>
	</ul>
	<!-- LOGO -->
	<div class="logo-box">
		<a href="{{route('admin.dashboard')}}" class="logo text-center">
			<span class="logo-lg">
				<img src="{{$gs->company_logo}}" alt="" height="50">
				<!-- <span class="logo-lg-text-light">UBold</span> -->
				
			</span>
			<span class="logo-sm">
				<!-- <span class="logo-sm-text-dark">U</span> -->
				<img src="{{$gs->company_favicon}}" alt="" height="40">
			</span>
		</a>
	</div>
	<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
		<li>
			<button class="button-menu-mobile waves-effect waves-light">
				<i class="fe-menu"></i>
			</button>
		</li>
	</ul>
</div>