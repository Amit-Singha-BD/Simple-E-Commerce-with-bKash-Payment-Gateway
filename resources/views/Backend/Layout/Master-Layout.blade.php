<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্রোডাক্ট ড্যাশবোর্ড | অ্যাডমিন</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('Assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/css/backend-style.css') }}">
</head>

<body>

    <div class="sidebar-overlay" id="overlay"></div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand d-flex justify-content-between align-items-center">
            <div class="brand-box">
                <h4 class="fw-bold mb-0 text-white"><i class="fas fa-store me-2"></i> ShopAdmin</h4>
            </div>
            <button class="btn text-white d-lg-none p-0" id="closeSidebar">
                <i class="fas fa-times fs-4"></i>
            </button>
        </div>
        
        <nav class="nav flex-column mt-4">
            <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-gauge me-2"></i> ড্যাশবোর্ড
            </a>
            <a class="nav-link {{ (Route::is('product.list') || Route::is('order.view')) ? 'active' : '' }}" href="{{ route('product.list') }}">
                <i class="fas fa-box me-2"></i> পণ্য তালিকা
            </a>
            <a class="nav-link {{ Route::is('create.product') ? 'active' : '' }}" href="{{ route('create.product') }}">
                <i class="fas fa-plus-circle me-2"></i> পণ্য যোগ করুন
            </a>
            <a class="nav-link {{ (Route::is('order.list') || Route::is('order.view')) ? 'active' : '' }}" href="{{ route('order.list') }}">
                <i class="fas fa-shopping-bag me-2"></i> অর্ডার তালিকা
            </a>
            <a class="nav-link {{ (Route::is('delivery.list') || Route::is('order.view')) ? 'active' : '' }}" href="{{ route('delivery.list') }}">
                <i class="fas fa-box-open me-2"></i> ডেলিভারি তালিকা
            </a>
            <a class="nav-link {{ (Route::is('refund.list') || Route::is('order.view')) ? 'active' : '' }}" href="{{ route('refund.list') }}">
                <i class="fas fa-money-bill-wave me-2"></i> রিফান্ড তালিকা
            </a>
            
            <div class="mt-auto p-3">
                <div class="border-top border-secondary opacity-25 mb-3"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="nav-link text-danger logout-link">
                        <i class="fas fa-power-off me-2"></i> লগআউট
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <div class="main-content" id="content">
        <div class="top-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-lg-none me-3" id="sidebarCollapse">
                    <i class="fas fa-bars"></i>
                </button>
                <h6 class="fw-bold mb-0 bangla-text d-none d-sm-block">ড্যাশবোর্ড / <span class="text-primary-gradient">অ্যাডমিন</span></h6>
                <h6 class="fw-bold mb-0 bangla-text d-sm-none text-primary-gradient">Admin</h6>
            </div>
            
            <div class="admin-profile d-flex align-items-center">
                <div class="text-end me-3 d-none d-md-block">
                    <small class="text-muted d-block" style="font-size: 10px;">স্বাগতম,</small>
                    <span class="fw-bold small">Super Admin</span>
                </div>
                <img src="https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff" class="rounded-circle-custom border" alt="profile">
            </div>
        </div>

        <div class="content-body">
            @yield('Content')
        </div>
    </div>

    @if(session('success') || session('error'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 2000;">
            <div class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0 shadow-lg show" role="alert">
                <div class="d-flex">
                    <div class="toast-body bangla-text">
                        {{ session('success') ?? session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
    @endif

    <script src="{{ asset('Assets/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const overlay = document.getElementById('overlay');
        const btnCollapse = document.getElementById('sidebarCollapse');
        const btnClose = document.getElementById('closeSidebar');

        // সাইডবার ওপেন ফাংশন
        btnCollapse.addEventListener('click', () => {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        });

        // সাইডবার ক্লোজ ফাংশন (ক্রস বাটন বা ওভারলে ক্লিক করলে)
        const closeSidebar = () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        };

        btnClose.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        // টোস্ট অটো-হাইড
        setTimeout(() => {
            const toastEl = document.querySelector('.toast');
            if(toastEl){
                const toast = new bootstrap.Toast(toastEl);
                toast.hide();
            }
        }, 4000);
    </script>
</body>
</html>