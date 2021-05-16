<script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
<link rel="stylesheet" href="{{asset('sweetalert2/animate.min.css')}}" />
@if (session('success'))
<script>
	Swal.fire({
		icon: 'success',
		title: '{{session('success')}}',
	});
</script>
@endif
@if (session('error'))
<script>
	Swal.fire({
		icon: 'error',
		title: '{{session('error')}}',
	});
</script>
@endif


