
<!DOCTYPE html>
<html class="no-js" dir="ltr" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ env('APP_NAME') }}</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
	<!-- <link rel="icon" href=""> -->
    @vite(['resources/scss/style.scss', 'resources/js/app.js'])
	@include('partials.css')
	@yield('head')
</head>

<body id="body">
    @include('partials.navbar')


<!-- Page loading spinner -->
<div class="page-loading active">
	<div class="page-loading-inner">
		<div class="page-spinner"></div>
		<span>Loading...</span>
	</div>
</div>

<!-- Page wrapper-->
<main class="page-wrapper my_container">

@yield('content')

<!-- Back to top button -->
{{-- <a class="btn-scroll-top" href="#top" data-scroll aria-label="Scroll back to top">
	<svg viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		<circle cx="20" cy="20" r="19" fill="none" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10">
		</circle>
	</svg>
	<i class="ai-arrow-up"></i>
</a> --}}
@include('partials.footer')

</main>

@yield('foot')

</body>

</html>
