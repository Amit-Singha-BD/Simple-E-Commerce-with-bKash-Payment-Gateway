<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>অ্যাডমিন লগইন | শপ-অ্যাডমিন</title>

    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --soft-bg: #f8fafc;
            --text-dark: #1e293b;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Hind Siliguri', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        /* মূল কার্ড কন্টেইনার */
        .login-card-modern {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 2.5rem 2rem;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.02);
            text-align: center;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* লোগো কার্ডের ভেতর সেট করার ডিজাইন */
        .brand-logo-inner {
            width: 75px;
            height: 75px;
            background: var(--primary-gradient);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            border-radius: 20px;
            margin: 0 auto 20px auto;
            /* কার্ডের একদম উপরে মাঝখানে */
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
            transition: var(--transition);
        }

        .login-card-modern:hover .brand-logo-inner {
            transform: scale(1.05);
        }

        .login-header h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        /* ইনপুট ফিল্ড কাস্টমাইজেশন */
        .form-floating>.form-control {
            border: 2px solid #f1f5f9;
            border-radius: 14px;
            padding-left: 15px;
        }

        .form-floating>.form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.08);
        }

        /* লগইন বাটন */
        .login-btn-modern {
            background: #1e293b;
            color: white;
            padding: 14px;
            border-radius: 14px;
            font-size: 18px;
            font-weight: 700;
            border: none;
            width: 100%;
            transition: var(--transition);
            margin-top: 10px;
        }

        .login-btn-modern:hover {
            background: var(--primary-gradient);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
        }

        .text-primary-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bangla-text {
            font-family: 'Hind Siliguri', sans-serif;
        }

        @media (max-width: 576px) {
            .login-card-modern {
                margin: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="login-card-modern">
        <div class="brand-logo-inner">
            <i class="fas fa-user-shield"></i>
        </div>

        <div class="login-header">
            <h2 class="bangla-text"><span class="text-primary-gradient">স্বাগতম</span></h2>
            <p class="text-muted bangla-text small mb-4">অ্যাডমিন প্যানেলে লগইন করতে তথ্য দিন</p>
        </div>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-floating mb-3 text-start">
                <input type="email" name="email" class="form-control" id="loginEmail" placeholder="ইমেইল">
                <label for="loginEmail" class="text-muted small"><i class="fas fa-envelope me-2"></i>ইমেইল
                    অ্যাড্রেস</label>
            </div>

            <div class="form-floating mb-4 text-start">
                <input type="password" name="password" class="form-control" id="loginPassword" placeholder="পাসওয়ার্ড">
                <label for="loginPassword" class="text-muted small"><i class="fas fa-lock me-2"></i>পাসওয়ার্ড</label>
            </div>

            <button type="submit" name="submit" class="login-btn-modern bangla-text">
                লগইন করুন <i class="fas fa-arrow-right ms-2"></i>
            </button>
        </form>

        <div class="mt-4">
            <p class="mb-0 text-muted small bangla-text">পাসওয়ার্ড ভুলে গেছেন? <a href="#"
                    class="text-primary-gradient text-decoration-none fw-bold">রিসেট করুন</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>