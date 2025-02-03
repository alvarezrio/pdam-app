<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>PDAM Web</title>

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Laila:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom-animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/imp.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery.bootstrap-touchspin.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">

    <!-- Module css -->
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/header-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/banner-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/about-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/blog-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/fact-counter-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/faq-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/contact-page.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/breadcrumb-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/team-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/partner-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/testimonial-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/services-section.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/module-css/footer-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/images/favicon/favicon-16x16.png" sizes="16x16">
</head>

<body>
    <div class="content-wrapper" style="min-height: 80vh;">

        <!-- Preloader -->
            <div class="loader-wrap">
                <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
                <div class="layer layer-one"><span class="overlay"></span></div>
                <div class="layer layer-two"><span class="overlay"></span></div>
                <div class="layer layer-three"><span class="overlay"></span></div>
            </div>
        <!-- Preloader -->

        <!-- page-direction -->
            <div class="page_direction">
                <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
                <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
            </div>
        <!-- page-direction end -->

        @include('layouts.navigation') <!-- Menyertakan navbar -->
        @yield('content') <!-- Tempat konten halaman dimasukkan -->

    </div>

    <!-- Footer yang di-modifikasi dengan pembungkus -->
        <footer class="fixed-bottom bg-body-tertiary text-lg-start">
            <!-- Copyright -->
                <div class="text-center p-1" style="background-color: #004da1; color: white;">
                    © Copyright: Informatika 2025
                </div>
            <!-- Copyright -->
        </footer>
    <!-- Footer -->



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.enllax.min.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.paroller.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/knob.js"></script>
    <script src="assets/js/map-script.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/pagenav.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/scrollbar.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/tilt.jquery.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
