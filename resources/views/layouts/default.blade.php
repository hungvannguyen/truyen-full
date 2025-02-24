
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
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body x-data="loginSwitcher()" id="body">
    @include('partials.navbar')


<!-- Page loading spinner -->
<div class="page-loading active">
	<div class="page-loading-inner">
		<div class="page-spinner"></div>
		<span>Loading...</span>
	</div>
</div>

<!-- Page wrapper-->
<main class="page-wrapper">

@yield('content')

<!-- Back to top button -->
{{-- <a class="btn-scroll-top" href="#top" data-scroll aria-label="Scroll back to top">
	<svg viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		<circle cx="20" cy="20" r="19" fill="none" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10">
		</circle>
	</svg>
	<i class="ai-arrow-up"></i>
</a> --}}

</main>
@include('partials.footer')

@yield('foot')
    {{-- gsap js --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>
