<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>@yield('title', ($settings['site_title']->value ?? 'Ghana Excellence Primary School'))</title>
    <meta name="description" content="@yield('description', ($settings['meta_description']->value ?? 'A leading primary school in Ghana providing quality education'))">
    <meta name="keywords" content="@yield('keywords', 'Ghana primary school, education, academic excellence, quality education')">
    <meta name="author" content="{{ $school->name ?? 'Ghana Excellence Primary School' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', ($settings['site_title']->value ?? 'Ghana Excellence Primary School'))">
    <meta property="og:description" content="@yield('description', ($settings['meta_description']->value ?? 'A leading primary school in Ghana providing quality education'))">
    @if($school && $school->logo)
        <meta property="og:image" content="{{ asset('storage/' . $school->logo) }}">
    @endif

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', ($settings['site_title']->value ?? 'Ghana Excellence Primary School'))">
    <meta property="twitter:description" content="@yield('description', ($settings['meta_description']->value ?? 'A leading primary school in Ghana providing quality education'))">
    @if($school && $school->logo)
        <meta property="twitter:image" content="{{ asset('storage/' . $school->logo) }}">
    @endif

    <!-- Favicon -->
    @if($school && $school->logo)
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $school->logo) }}">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        :root {
            /* Ghana Primary School Theme Colors */
            --primary-color: #E74C25;       /* School main color - vibrant orange-red */
            --secondary-color: #2C5530;     /* Deep forest green - complementary */
            --accent-color: #F7931E;        /* Bright orange - analogous */
            --success-color: #16a34a;       /* Success green */
            --warning-color: #f59e0b;       /* Warning amber */
            --info-color: #0ea5e9;          /* Info blue */
            --light-gray: #f8fafc;          /* Very light gray */
            --dark-gray: #475569;           /* Slate gray */
            --cream-color: #fef7ed;         /* Warm cream */
            --white: #ffffff;               /* Pure white */
            --black: #000000;               /* Pure black */

            /* Theme variations */
            --primary-light: #FF6B47;       /* Lighter primary */
            --primary-dark: #C73E1D;        /* Darker primary */
            --secondary-light: #3D7043;     /* Lighter secondary */
            --secondary-dark: #1E3B22;      /* Darker secondary */
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark-gray);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 25px;
            transition: all 0.3s ease;
            color: var(--white);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(231, 76, 37, 0.3);
            color: var(--white);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color), var(--secondary-dark));
            border: none;
            color: var(--white);
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, var(--secondary-dark), var(--secondary-color));
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(44, 85, 48, 0.3);
        }

        .btn-accent {
            background: linear-gradient(135deg, var(--accent-color), var(--primary-light));
            border: none;
            color: var(--white);
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-accent:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--accent-color));
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(247, 147, 30, 0.3);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color), var(--accent-color));
            color: var(--white);
            padding: 120px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/images/hero-bg.svg') center/cover;
            opacity: 0.2;
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .card {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(231, 76, 37, 0.15);
        }

        .footer {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            padding: 60px 0 30px;
        }

        .navbar {
            box-shadow: 0 4px 20px rgba(0,0,0,.08);
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95) !important;
        }

        .text-primary-custom {
            color: var(--primary-color) !important;
        }

        .bg-primary-custom {
            background-color: var(--primary-color) !important;
        }

        .bg-secondary-custom {
            background-color: var(--secondary-color) !important;
        }

        .bg-light-custom {
            background-color: var(--cream-color) !important;
        }

        .bg-accent-custom {
            background: linear-gradient(135deg, var(--accent-color), var(--primary-light)) !important;
        }

        .bg-primary-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
        }

        /* Top contact bar */
        .top-contact-bar {
            background: linear-gradient(135deg, var(--secondary-color), var(--secondary-dark));
            color: var(--white);
            padding: 10px 0;
            font-size: 0.9rem;
        }

        .top-contact-bar a {
            color: var(--white);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .top-contact-bar a:hover {
            color: var(--accent-color);
        }

        .top-contact-bar .divider {
            margin: 0 15px;
            opacity: 0.7;
        }

        /* Feature boxes */
        .feature-box {
            background: var(--white);
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(231, 76, 37, 0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: var(--white);
        }

        /* Top contact bar */
        .top-contact-bar {
            background: linear-gradient(135deg, var(--primary-color), #0f172a);
            color: white;
            padding: 8px 0;
            font-size: 0.85rem;
        }

        .top-contact-bar a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .top-contact-bar a:hover {
            color: var(--accent-color);
        }

        .top-contact-bar .divider {
            margin: 0 15px;
            opacity: 0.5;
        }

        /* Navigation Dropdown Styles */
        .navbar-nav .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 8px 0;
            margin-top: 8px;
            min-width: 220px;
            background: var(--white);
        }

        .navbar-nav .dropdown-item {
            padding: 12px 20px;
            color: var(--dark-gray);
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 8px;
            display: flex;
            align-items: center;
        }

        .navbar-nav .dropdown-item:hover {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: var(--white);
            transform: translateX(5px);
        }

        .navbar-nav .dropdown-item.active {
            background: linear-gradient(135deg, var(--secondary-color), var(--secondary-light));
            color: var(--white);
        }

        .navbar-nav .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        .navbar-nav .dropdown-toggle::after {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .navbar-nav .dropdown-toggle[aria-expanded="true"]::after {
            transform: rotate(180deg);
        }

        /* Navigation Link Icons */
        .navbar-nav .nav-link i {
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .navbar-nav .nav-link:hover i {
            opacity: 1;
        }

        /* Mobile Dropdown Adjustments */
        @media (max-width: 991.98px) {
            .navbar-nav .dropdown-menu {
                background: transparent;
                box-shadow: none;
                border: none;
                margin-top: 0;
                padding-left: 20px;
            }

            .navbar-nav .dropdown-item {
                color: rgba(255, 255, 255, 0.8);
                margin: 0;
                border-radius: 0;
                padding: 8px 0;
            }

            .navbar-nav .dropdown-item:hover {
                background: transparent;
                color: var(--white);
                transform: none;
            }

            .navbar-nav .dropdown-item.active {
                background: transparent;
                color: var(--accent-color);
            }
        }

        /* Improved Mobile Navigation */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(44, 85, 48, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 12px;
                margin-top: 10px;
                padding: 20px;
            }

            .navbar-nav .nav-link {
                color: rgba(255, 255, 255, 0.9) !important;
                padding: 12px 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .navbar-nav .nav-link:hover {
                color: var(--accent-color) !important;
            }

            .navbar-nav .nav-link.active {
                color: var(--accent-color) !important;
            }
        }

        /* Search Form in Mobile */
        @media (max-width: 991.98px) {
            .navbar-nav ~ form {
                margin-top: 20px;
                padding-top: 20px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }
        }

        /* Dropdown Search Styles */
        .dropdown-search {
            position: relative;
        }

        .search-toggle-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: 1px solid var(--primary-color);
            color: var(--white);
            transition: all 0.3s ease;
        }

        .search-toggle-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            border-color: var(--primary-dark);
            color: var(--white);
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(231, 76, 37, 0.3);
        }

        .search-toggle-btn:focus {
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 37, 0.25);
            color: var(--white);
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-color: var(--primary-color);
        }

        .search-dropdown {
            min-width: 300px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 0;
            margin-top: 8px;
            background: var(--white);
        }

        .search-dropdown form {
            margin: 0;
        }

        .search-dropdown .input-group {
            border-radius: 8px;
            overflow: hidden;
        }

        .search-dropdown .form-control {
            border: 1px solid #e2e8f0;
            border-right: none;
            padding: 12px 16px;
            font-size: 14px;
            color: var(--dark-gray);
        }

        .search-dropdown .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: none;
        }

        .search-dropdown .btn-primary {
            border-radius: 0 8px 8px 0;
            padding: 12px 16px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: 1px solid var(--primary-color);
        }

        .search-dropdown .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            transform: none;
        }

        /* Mobile Search Dropdown */
        @media (max-width: 991.98px) {
            .dropdown-search {
                order: 1;
                margin: 20px 0 0 0 !important;
            }

            .search-toggle-btn {
                background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
                border-color: var(--primary-color);
                color: var(--white);
            }

            .search-dropdown {
                min-width: 100%;
                margin-top: 10px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            }

            .search-dropdown form {
                padding: 15px !important;
            }
        }

        /* Production Dropdown Styles */
        .dropdown-menu {
            display: none;
            position: absolute;
            z-index: 1050;
            top: 100%;
            left: 0;
            min-width: 200px;
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .dropdown-menu.show {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.375rem 1rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            text-decoration: none;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
            transition: background-color 0.15s ease-in-out;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background-color: #f8f9fa;
            color: #1e2125;
        }
    </style>

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "{{ $school->name ?? 'Ghana Excellence Primary School' }}",
        "alternateName": "{{ $settings['site_title']->value ?? 'Ghana Excellence Primary School' }}",
        "description": "{{ $school->description ?? ($settings['meta_description']->value ?? 'A leading primary school in Ghana providing quality education') }}",
        @if($school && $school->logo)
        "logo": "{{ asset('storage/' . $school->logo) }}",
        "image": "{{ asset('storage/' . $school->logo) }}",
        @endif
        "url": "{{ url('/') }}",
        @if($school && $school->address)
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "{{ $school->address }}"
        },
        @endif
        @if($school && $school->phone)
        "telephone": "{{ $school->phone }}",
        @endif
        @if($school && $school->email)
        "email": "{{ $school->email }}",
        @endif
        @if($school && $school->website)
        "sameAs": [
            "{{ $school->website }}"
            @if(isset($settings['facebook_url']) && $settings['facebook_url']->value)
                ,"{{ $settings['facebook_url']->value }}"
            @endif
            @if(isset($settings['twitter_url']) && $settings['twitter_url']->value)
                ,"{{ $settings['twitter_url']->value }}"
            @endif
            @if(isset($settings['instagram_url']) && $settings['instagram_url']->value)
                ,"{{ $settings['instagram_url']->value }}"
            @endif
        ],
        @endif
        "foundingDate": "{{ $school->established_year ?? '2020' }}",
        "educationalLevel": "Primary Education"
    }
    </script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- Top Contact Bar -->
    <div class="top-contact-bar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        @if(isset($settings['phone']) && $settings['phone']->value)
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone me-2"></i>
                                <a href="tel:{{ $settings['phone']->value }}">{{ $settings['phone']->value }}</a>
                            </div>
                        @elseif($school && $school->phone)
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone me-2"></i>
                                <a href="tel:{{ $school->phone }}">{{ $school->phone }}</a>
                            </div>
                        @endif

                        @if(isset($settings['email']) && $settings['email']->value)
                            <span class="divider">|</span>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope me-2"></i>
                                <a href="mailto:{{ $settings['email']->value }}">{{ $settings['email']->value }}</a>
                            </div>
                        @elseif($school && $school->email)
                            <span class="divider">|</span>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope me-2"></i>
                                <a href="mailto:{{ $school->email }}">{{ $school->email }}</a>
                            </div>
                        @endif

                        @if(isset($settings['address']) && $settings['address']->value)
                            <span class="divider">|</span>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                <span>{{ $settings['address']->value }}</span>
                            </div>
                        @elseif($school && $school->address)
                            <span class="divider">|</span>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                <span>{{ $school->address }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <div class="d-flex align-items-center justify-content-end">
                        @if(isset($settings['facebook_url']) && $settings['facebook_url']->value)
                            <a href="{{ $settings['facebook_url']->value }}" class="me-3" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(isset($settings['twitter_url']) && $settings['twitter_url']->value)
                            <a href="{{ $settings['twitter_url']->value }}" class="me-3" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(isset($settings['instagram_url']) && $settings['instagram_url']->value)
                            <a href="{{ $settings['instagram_url']->value }}" class="me-3" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        <span class="ms-3">
                            <i class="fas fa-clock me-2"></i>
                            @if(isset($settings['office_hours']) && $settings['office_hours']->value)
                                {{ $settings['office_hours']->value }}
                            @else
                                Mon-Fri: 8:00 AM - 4:00 PM
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                @if($school && $school->logo)
                    <img src="{{ asset('storage/' . $school->logo) }}" alt="{{ $school->name ?? 'School Logo' }}" height="40" class="me-2">
                @else
                    <img src="{{ asset('storage/logos/school-logo.svg') }}" alt="" height="40" class="me-2">
                @endif
                {{ $school->name ?? (isset($settings['site_name']) ? $settings['site_name']->value : '') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>

                    <!-- About Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('about', 'staff', 'programs') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-info-circle me-1"></i>About Us
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                                <i class="fas fa-building me-2"></i>School Overview
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('staff') ? 'active' : '' }}" href="{{ route('staff') }}">
                                <i class="fas fa-users me-2"></i>Our Staff
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('programs') ? 'active' : '' }}" href="{{ route('programs') }}">
                                <i class="fas fa-graduation-cap me-2"></i>Academic Programs
                            </a></li>
                        </ul>
                    </li>

                    <!-- News & Events Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('news*', 'events*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-newspaper me-1"></i>News & Events
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('news*') ? 'active' : '' }}" href="{{ route('news') }}">
                                <i class="fas fa-newspaper me-2"></i>Latest News
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('events*') ? 'active' : '' }}" href="{{ route('events') }}">
                                <i class="fas fa-calendar-alt me-2"></i>Upcoming Events
                            </a></li>
                        </ul>
                    </li>

                    <!-- Media & Resources Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('gallery', 'documents*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-folder-open me-1"></i>Media & Resources
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                                <i class="fas fa-images me-2"></i>Photo Gallery
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('documents*') ? 'active' : '' }}" href="{{ route('documents') }}">
                                <i class="fas fa-file-download me-2"></i>Downloads
                            </a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                </ul>

                <!-- Dropdown Search -->
                <div class="dropdown-search ms-3">
                    <button class="search-toggle-btn btn btn-outline-primary btn-sm" type="button" id="searchDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-search"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end search-dropdown" aria-labelledby="searchDropdown">
                        <form action="{{ route('search') }}" method="GET" class="p-3">
                            <div class="input-group">
                                <input class="form-control"
                                       type="search"
                                       name="q"
                                       placeholder="Search our website..."
                                       aria-label="Search"
                                       id="searchInput">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb (optional - can be added to pages) -->
    @if(!request()->routeIs('home'))
    <nav class="breadcrumb-nav py-3 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-decoration-none">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    @yield('breadcrumbs')
                </ol>
            </nav>
        </div>
    </nav>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        @if($school && $school->logo)
                            <img src="{{ asset('storage/' . $school->logo) }}" alt="{{ $school->name ?? 'School Logo' }}" height="50" class="me-3">
                        @else
                            <img src="{{ asset('storage/logos/school-logo.svg') }}" alt="Ghana Excellence Primary School" height="50" class="me-3">
                        @endif
                        <h5 class="fw-bold mb-0">{{ isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School' }}</h5>
                    </div>
                    <p>{{ isset($settings['site_description']) ? $settings['site_description']->value : 'A leading primary school in Ghana committed to providing quality education and nurturing young minds for a brighter future.' }}</p>
                    <div class="social-links">
                        @if(isset($settings['facebook_url']) && $settings['facebook_url']->value)
                            <a href="{{ $settings['facebook_url']->value }}" class="text-white me-3" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(isset($settings['twitter_url']) && $settings['twitter_url']->value)
                            <a href="{{ $settings['twitter_url']->value }}" class="text-white me-3" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(isset($settings['instagram_url']) && $settings['instagram_url']->value)
                            <a href="{{ $settings['instagram_url']->value }}" class="text-white me-3" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li><a href="{{ route('news') }}" class="text-white-50 text-decoration-none">News</a></li>
                        <li><a href="{{ route('events') }}" class="text-white-50 text-decoration-none">Events</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-white-50 text-decoration-none">Gallery</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">Contact</a></li>
                        @guest
                            <li class="mt-2 pt-2 border-top border-secondary">
                                <a href="{{ route('login') }}" class="text-warning text-decoration-none fw-bold">
                                    <i class="fas fa-sign-in-alt me-1"></i>Staff Login
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>

                <div class="col-lg-5 mb-4">
                    <h5 class="fw-bold mb-3">Contact Information</h5>
                    <div class="contact-info">
                        @if(isset($settings['contact_address']) && $settings['contact_address']->value)
                            <p class="mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                {{ $settings['contact_address']->value }}
                            </p>
                        @endif
                        @if(isset($settings['contact_phone']) && $settings['contact_phone']->value)
                            <p class="mb-2">
                                <i class="fas fa-phone me-2"></i>
                                {{ $settings['contact_phone']->value }}
                            </p>
                        @endif
                        @if(isset($settings['contact_email']) && $settings['contact_email']->value)
                            <p class="mb-2">
                                <i class="fas fa-envelope me-2"></i>
                                {{ $settings['contact_email']->value }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="my-4 opacity-25">

            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} {{ isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School' }}. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex justify-content-md-end align-items-center">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="text-white me-3 text-decoration-none" title="Admin Dashboard">
                                <i class="fas fa-user-shield me-1"></i> Admin Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-white me-3 text-decoration-none" title="Admin Login">
                                <i class="fas fa-sign-in-alt me-1"></i> Staff Login
                            </a>
                        @endauth
                        <p class="mb-0">Built with <i class="fas fa-heart text-danger"></i> for education</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>

    <!-- School Navigation JavaScript -->
    <script src="{{ asset('js/navigation.js') }}" defer></script>

    <!-- Fallback initialization script -->
    <script>
        // Ensure navigation is initialized even if external script fails
        window.addEventListener('load', function() {
            setTimeout(function() {
                if (typeof window.SchoolNavigation === 'undefined') {
                    // Simple fallback for dropdown functionality
                    document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
                        toggle.addEventListener('click', function(e) {
                            e.preventDefault();
                            const dropdown = this.parentElement;
                            const menu = dropdown.querySelector('.dropdown-menu');

                            // Close other dropdowns
                            document.querySelectorAll('.dropdown-menu.show').forEach(function(m) {
                                if (m !== menu) m.classList.remove('show');
                            });

                            // Toggle current
                            if (menu) {
                                menu.classList.toggle('show');
                                this.setAttribute('aria-expanded', menu.classList.contains('show'));
                            }
                        });
                    });

                    // Close on outside click
                    document.addEventListener('click', function(e) {
                        if (!e.target.closest('.dropdown')) {
                            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                                menu.classList.remove('show');
                            });
                        }
                    });
                }
            }, 1000);
        });
    </script>

    <!-- Custom Scripts -->
    @stack('scripts')
</body>
</html>
