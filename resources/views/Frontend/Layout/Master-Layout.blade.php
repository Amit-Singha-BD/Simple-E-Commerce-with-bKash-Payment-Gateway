<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্রোডাক্ট শপ</title>
    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('Assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('Assets/fontawesome/css/all.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('Assets/css/frontend-style.css') }}">
</head>

<body>
    <!-- নেভিগেশন বার -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products') }}">
                <i class="fas fa-shopping-bag me-2"></i>
                <span class="bangla-text">আমার শপ</span>
            </a>

            <div class="ms-auto">
                <a href="{{ route('login.view') }}" class="btn-modern-primary px-3 text-decoration-none">
                    <i class="fas fa-sign-in-alt me-2"></i> লগইন
                </a>
            </div>
        </div>
    </nav>


    @yield('Content')

    <!-- ফুটার -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h3 class="mb-3 bangla-text text-center">
                        <i class="fas fa-shopping-bag me-2"></i>আমার শপ
                    </h3>
                    <p class="bangla-text text-center">উচ্চ মানের ইলেকট্রনিক্স প্রোডাক্ট সরাসরি ম্যানুফ্যাকচারার থেকে
                        আপনার
                        দোরগোড়ায়।</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ asset('Assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Assets/js/script.js') }}"></script>
</body>

</html>