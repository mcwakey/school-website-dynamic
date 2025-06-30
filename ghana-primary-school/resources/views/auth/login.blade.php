<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login - {{ isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-color: #e74c25;
            --secondary-color: #2c5530;
            --accent-color: #f39c12;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 1000px;
            margin: 2rem auto;
        }

        .login-brand {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-brand::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="10" height="10" patternUnits="userSpaceOnUse"><circle cx="5" cy="5" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }

        .login-brand-content {
            position: relative;
            z-index: 2;
        }

        .login-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .login-form {
            padding: 3rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 37, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            color: white;
        }

        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .form-check-label {
            color: #6c757d;
        }

        .back-to-website {
            position: absolute;
            top: 20px;
            left: 20px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .back-to-website:hover {
            color: white;
            background: rgba(255,255,255,0.2);
            text-decoration: none;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .invalid-feedback {
            font-size: 0.875rem;
        }

        @media (max-width: 768px) {
            .login-container {
                margin: 1rem;
                border-radius: 15px;
            }

            .login-brand,
            .login-form {
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <a href="{{ route('home') }}" class="back-to-website">
        <i class="fas fa-arrow-left me-2"></i>Back to Website
    </a>

    <div class="container">
        <div class="login-container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="login-brand h-100 d-flex align-items-center">
                        <div class="login-brand-content w-100">
                            <div class="login-logo">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h2 class="fw-bold mb-3">Staff Portal</h2>
                            <h5 class="opacity-90 mb-4">{{ isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School' }}</h5>
                            <p class="opacity-75">
                                Welcome back! Please sign in to access the admin dashboard and manage your school's website.
                            </p>
                            <div class="mt-4">
                                <small class="opacity-60">
                                    <i class="fas fa-shield-alt me-2"></i>
                                    Secure admin access
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-dark">Sign In</h3>
                            <p class="text-muted">Access your admin dashboard</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2 text-primary"></i>Email Address
                                </label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autocomplete="email" autofocus
                                       placeholder="Enter your email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2 text-primary"></i>Password
                                </label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       required autocomplete="current-password"
                                       placeholder="Enter your password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember me for 30 days
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-login btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        <i class="fas fa-key me-1"></i>Forgot your password?
                                    </a>
                                </div>
                            @endif
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <small class="text-muted">
                                Need help? Contact your system administrator
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
