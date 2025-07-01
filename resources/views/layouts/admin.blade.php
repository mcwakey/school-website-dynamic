<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name', 'Ghana Primary School') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.9);
            padding: 12px 20px;
            margin: 2px 0;
            border-radius: 0 25px 25px 0;
            margin-right: 15px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }

        .main-content {
            margin-left: 0;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 20px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            color: #6c757d;
        }

        /* Enhanced card styles */
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-radius: 10px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            border-radius: 10px 10px 0 0 !important;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }

        /* Table enhancements */
        .table th {
            font-weight: 600;
            color: #495057;
            border-top: none;
            border-bottom: 2px solid #e9ecef;
            padding: 1rem 0.75rem;
        }

        .table td {
            padding: 1rem 0.75rem;
            vertical-align: middle;
            border-top: 1px solid #f0f0f0;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9ff;
        }

        /* Button enhancements */
        .btn {
            border-radius: 6px;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            transform: translateY(-1px);
        }

        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
        }

        /* Form enhancements */
        .form-control, .form-select {
            border-radius: 6px;
            border: 1px solid #d1d5db;
            padding: 0.75rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        /* Alert enhancements */
        .alert {
            border: none;
            border-radius: 8px;
            padding: 1rem 1.25rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }

        /* Badge enhancements */
        .badge {
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
        }

        /* Gallery card enhancements */
        .gallery-card {
            transition: transform 0.2s ease;
        }

        .gallery-card:hover {
            transform: translateY(-2px);
        }

        @media (min-width: 768px) {
            .main-content {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar d-md-block position-fixed" style="width: 250px; z-index: 1000;">
            <div class="p-3">
                <div class="text-center mb-4">
                    <h5 class="text-white mb-0">Admin Panel</h5>
                    <small class="text-white-50">Ghana Primary School</small>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif"
                           href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif"
                           href="{{ route('admin.news.index') }}">
                            <i class="fas fa-newspaper"></i>News
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.events.*')) active @endif"
                           href="{{ route('admin.events.index') }}">
                            <i class="fas fa-calendar-alt"></i>Events
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.gallery.*')) active @endif"
                           href="{{ route('admin.gallery.index') }}">
                            <i class="fas fa-images"></i>Gallery
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.staff.*')) active @endif"
                           href="{{ route('admin.staff.index') }}">
                            <i class="fas fa-users"></i>Staff
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.documents.*')) active @endif"
                           href="{{ route('admin.documents.index') }}">
                            <i class="fas fa-file-alt"></i>Documents
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.hero-slides.*')) active @endif"
                           href="{{ route('admin.hero-slides.index') }}">
                            <i class="fas fa-images"></i>Hero Slides
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.core-values.*')) active @endif"
                           href="{{ route('admin.core-values.index') }}">
                            <i class="fas fa-heart"></i>Core Values
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.settings.*')) active @endif"
                           href="{{ route('admin.settings.index') }}">
                            <i class="fas fa-cog"></i>Settings
                        </a>
                    </li>

                    <!-- Customization Section -->
                    <hr class="text-white-50">
                    <li class="nav-item">
                        <small class="text-white-50 px-3">CUSTOMIZATION</small>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.page-contents.*')) active @endif"
                           href="{{ route('admin.page-contents.index') }}">
                            <i class="fas fa-file-alt"></i>Page Content
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.menus.*')) active @endif"
                           href="{{ route('admin.menus.index') }}">
                            <i class="fas fa-bars"></i>Menus
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.theme.*')) active @endif"
                           href="{{ route('admin.theme.index') }}">
                            <i class="fas fa-palette"></i>Theme & Design
                        </a>
                    </li>

                    <hr class="text-white-50">

                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.manual')) active @endif"
                           href="{{ route('admin.manual') }}">
                            <i class="fas fa-book"></i>User Manual
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" target="_blank">
                            <i class="fas fa-external-link-alt"></i>View Website
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            <!-- Top Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light shadow-sm mb-4">
                <div class="container-fluid">
                    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-nav ms-auto">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=667eea&color=fff&size=32"
                                     class="rounded-circle me-2" width="32" height="32">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form-2').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </a>
                                    <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Header -->
            @if(isset($pageTitle) || View::hasSection('page-header'))
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-0">@yield('page-title', $pageTitle ?? '')</h1>
                        @if(View::hasSection('breadcrumb'))
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        @endif
                    </div>
                    @yield('page-actions')
                </div>
            @endif

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>Please correct the following errors:
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Page Content -->
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Admin Portal Enhancements -->
    <script>
        // Auto-hide flash messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
                alerts.forEach(function(alert) {
                    const bootstrapAlert = new bootstrap.Alert(alert);
                    bootstrapAlert.close();
                });
            }, 5000);
        });

        // Improved delete confirmation
        function deleteItem(id, name = 'this item') {
            if (confirm(`Are you sure you want to delete ${name}? This action cannot be undone.`)) {
                document.getElementById('delete-form-' + id).submit();
            }
        }

        // Form validation feedback
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn && !form.classList.contains('no-loading')) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                    }
                });
            });
        });

        // Table row highlighting
        document.addEventListener('DOMContentLoaded', function() {
            const tableRows = document.querySelectorAll('.table tbody tr');
            tableRows.forEach(function(row) {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.01)';
                    this.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
                    this.style.transition = 'all 0.2s ease';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
