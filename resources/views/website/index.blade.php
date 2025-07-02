@extends('layouts.website')

@section('title', (isset($settings['hero_title']['value']) ? $settings['hero_title']['value'] : 'Welcome to Ghana Excellence Primary School') . ' - ' . (isset($settings['site_name']['value']) ? $settings['site_name']['value'] : 'Ghana Excellence Primary School'))
@section('description', isset($settings['hero_description']['value']) ? $settings['hero_description']['value'] : 'We provide quality education that nurtures creativity, critical thinking, and character development.')

@section('content')

<!-- Hero Section -->
<section class="hero-section position-relative">
    @if($heroSlides->count() > 0)
        <!-- Debug: Show slide count -->
        <!-- Total Slides: {{ $heroSlides->count() }} -->
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-wrap="true">
            <!-- Note: Add 'carousel-fade' class above for fade effect instead of slide -->
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach($heroSlides as $index => $slide)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                @foreach($heroSlides as $index => $slide)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-slide-id="{{ $slide->id }}">
                        <div class="hero-slide-bg" style="background-image: url('{{ asset('storage/' . $slide->image_path) }}');"></div>
                        <div class="hero-overlay"></div>
                        <div class="container position-relative">
                            <div class="row align-items-center justify-content-start">
                                <div class="col-lg-8 col-md-10">
                                    <div class="hero-content">
                                        <h1 class="display-4 fw-bold mb-4 text-white">
                                            {{ $slide->title }}
                                        </h1>
                                        @if($slide->subtitle)
                                            <h2 class="h4 mb-4 opacity-90 text-white">
                                                {{ $slide->subtitle }}
                                            </h2>
                                        @endif
                                        @if($slide->description)
                                            <p class="lead mb-4 text-white">
                                                {{ $slide->description }}
                                            </p>
                                        @endif
                                        <div class="d-flex gap-3 flex-wrap">
                                            @if($slide->button_text && $slide->button_link)
                                                <a href="{{ $slide->button_link }}" class="btn btn-light btn-lg">
                                                    <i class="fas fa-arrow-right me-2"></i>{{ $slide->button_text }}
                                                </a>
                                            @endif
                                            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                                                <i class="fas fa-phone me-2"></i>Contact Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @else
        @if(isset($pageContent['hero_title']) || isset($pageContent['hero_subtitle']) || isset($pageContent['hero_intro']) || isset($settings['hero_title']) || isset($settings['hero_subtitle']) || isset($settings['hero_description']))
        <!-- Fallback hero section -->
        <div class="hero-fallback-bg">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6">
                        <div class="hero-content animate-fade-in">
                            <span class="badge bg-light text-primary fs-6 px-3 py-2 rounded-pill mb-3">Welcome to Excellence</span>
                            @if(isset($pageContent['hero_title']['title']) || isset($settings['hero_title']['value']))
                            <h1 class="display-4 fw-bold mb-4 text-white">
                                {{ isset($pageContent['hero_title']['title']) ? $pageContent['hero_title']['title'] : $settings['hero_title']['value'] }}
                            </h1>
                            @endif
                            @if(isset($pageContent['hero_subtitle']['title']) || isset($settings['hero_subtitle']['value']))
                            <h2 class="h4 mb-4 opacity-90 text-white">
                                {{ isset($pageContent['hero_subtitle']['title']) ? $pageContent['hero_subtitle']['title'] : $settings['hero_subtitle']['value'] }}
                            </h2>
                            @endif
                            @if(isset($pageContent['hero_intro']['content']) || isset($settings['hero_description']['value']))
                            <p class="lead mb-4 text-white">
                                {{ isset($pageContent['hero_intro']['content']) ? $pageContent['hero_intro']['content'] : $settings['hero_description']['value'] }}
                            </p>
                            @endif
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="{{ route('about') }}" class="btn btn-light btn-lg rounded-pill">
                                    <i class="fas fa-rocket me-2"></i>Discover Our School
                                </a>
                                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg rounded-pill">
                                    <i class="fas fa-phone me-2"></i>Schedule a Visit
                                </a>
                            </div>
                            <div class="hero-stats mt-4">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="stat-item text-white">
                                            <div class="stat-number">500+</div>
                                            <div class="stat-label">Happy Students</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stat-item text-white">
                                            <div class="stat-number">15+</div>
                                            <div class="stat-label">Years Excellence</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stat-item text-white">
                                            <div class="stat-number">50+</div>
                                            <div class="stat-label">Expert Teachers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="hero-image mt-5 mt-lg-0 animate-slide-up">
                            <div class="hero-image-wrapper">
                                <img src="{{ asset('images/hero-school.svg') }}" alt="Ghana Excellence Primary School" class="img-fluid hero-main-image">
                                <div class="floating-elements">
                                    <div class="floating-element element-1">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div class="floating-element element-2">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div class="floating-element element-3">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif
</section>

@if(isset($pageContent['welcome_title']) || isset($settings['about_title']) || $school)
<!-- About Section -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-content">
                    <span class="badge bg-light text-primary fs-6 px-3 py-2 rounded-pill mb-3">About Our School</span>
                    @if(isset($pageContent['welcome_title']['title']) || isset($settings['about_title']['value']))
                    <h2 class="section-title text-white mb-4">
                        {{ isset($pageContent['welcome_title']['title']) ? $pageContent['welcome_title']['title'] : $settings['about_title']['value'] }}
                    </h2>
                    @endif
                    @if(isset($pageContent['welcome_title']['content']) || isset($settings['about_description']['value']))
                    <p class="lead text-white mb-4">
                        {{ isset($pageContent['welcome_title']['content']) ? $pageContent['welcome_title']['content'] : $settings['about_description']['value'] }}
                    </p>
                    @endif
                    @if($school)
                    <div class="row g-4 mt-3">
                        @if($school->established_year)
                        <div class="col-sm-6">
                            <div class="info-card">
                                <div class="info-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h6 class="fw-bold mb-1 text-white">Established</h6>
                                    <small class="text-white opacity-90">{{ $school->established_year }}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($school->principal_name)
                        <div class="col-sm-6">
                            <div class="info-card">
                                <div class="info-icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="info-content">
                                    <h6 class="fw-bold mb-1 text-white">Principal</h6>
                                    <small class="text-white opacity-90">{{ $school->principal_name }}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                    <div class="about-features mt-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="feature-point">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <span>STEM-Focused Curriculum</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-point">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <span>Small Class Sizes</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-point">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <span>Extracurricular Activities</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-point">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <span>Community Partnerships</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn btn-light btn-lg mt-4 rounded-pill">
                        <i class="fas fa-arrow-right me-2"></i>Discover More About Us
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="about-visual mt-5 mt-lg-0">
                    <div class="image-stack">
                        <div class="image-main">
                            <img src="{{ asset('images/about-students.svg') }}" alt="Our Students" class="img-fluid">
                        </div>
                        <div class="image-stats">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-info">
                                    <div class="stat-value">500+</div>
                                    <div class="stat-desc">Students</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(isset($pageContent['features_title']) || isset($pageContent['feature_academic_excellence']) || isset($pageContent['feature_modern_facilities']) || isset($pageContent['feature_experienced_teachers']) || isset($pageContent['feature_holistic_development']))
<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        @if(isset($pageContent['features_title']))
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="badge bg-primary-soft text-primary fs-6 px-3 py-2 rounded-pill mb-3">Why Choose Us</span>
                <h2 class="section-title">{{ $pageContent['features_title']['title'] }}</h2>
                <p class="lead">{{ $pageContent['features_title']['content'] }}</p>
            </div>
        </div>
        @endif
        <div class="row g-4">
            @if(isset($pageContent['feature_academic_excellence']))
            <div class="col-lg-3 col-md-6">
                <div class="feature-box modern-card">
                    <div class="feature-icon gradient-icon">
                        <i class="{{ isset($pageContent['feature_academic_excellence']['metadata']['icon']) ? $pageContent['feature_academic_excellence']['metadata']['icon'] : 'fas fa-graduation-cap' }}"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ $pageContent['feature_academic_excellence']['title'] }}</h5>
                    <p class="text-muted">{{ $pageContent['feature_academic_excellence']['content'] }}</p>
                </div>
            </div>
            @endif

            @if(isset($pageContent['feature_modern_facilities']))
            <div class="col-lg-3 col-md-6">
                <div class="feature-box modern-card">
                    <div class="feature-icon gradient-icon">
                        <i class="{{ isset($pageContent['feature_modern_facilities']['metadata']['icon']) ? $pageContent['feature_modern_facilities']['metadata']['icon'] : 'fas fa-building' }}"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ $pageContent['feature_modern_facilities']['title'] }}</h5>
                    <p class="text-muted">{{ $pageContent['feature_modern_facilities']['content'] }}</p>
                </div>
            </div>
            @endif

            @if(isset($pageContent['feature_experienced_teachers']))
            <div class="col-lg-3 col-md-6">
                <div class="feature-box modern-card">
                    <div class="feature-icon gradient-icon">
                        <i class="{{ isset($pageContent['feature_experienced_teachers']['metadata']['icon']) ? $pageContent['feature_experienced_teachers']['metadata']['icon'] : 'fas fa-chalkboard-teacher' }}"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ $pageContent['feature_experienced_teachers']['title'] }}</h5>
                    <p class="text-muted">{{ $pageContent['feature_experienced_teachers']['content'] }}</p>
                </div>
            </div>
            @endif

            @if(isset($pageContent['feature_holistic_development']))
            <div class="col-lg-3 col-md-6">
                <div class="feature-box modern-card">
                    <div class="feature-icon gradient-icon">
                        <i class="{{ isset($pageContent['feature_holistic_development']['metadata']['icon']) ? $pageContent['feature_holistic_development']['metadata']['icon'] : 'fas fa-heart' }}"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ $pageContent['feature_holistic_development']['title'] }}</h5>
                    <p class="text-muted">{{ $pageContent['feature_holistic_development']['content'] }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- News Section -->
@if($featuredNews->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="badge bg-primary-soft text-primary fs-6 px-3 py-2 rounded-pill mb-3">Stay Informed</span>
                <h2 class="section-title">Latest News & Announcements</h2>
                <p class="lead">Stay updated with the latest happenings, achievements, and important announcements from our school community</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($featuredNews as $news)
            <div class="col-lg-4">
                <div class="card modern-card h-100 news-card">
                    <div class="card-image-wrapper">
                        @if($news->featured_image)
                            <img src="{{ asset('storage/' . $news->featured_image) }}" class="card-img-top" alt="{{ $news->title }}">
                        @else
                            <div class="card-img-placeholder">
                                <div class="placeholder-icon">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                            </div>
                        @endif
                        <div class="card-badge">
                            <span class="badge bg-primary">
                                <i class="fas fa-bullhorn me-1"></i>News
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $news->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($news->excerpt ?: $news->content, 120) }}</p>
                        <div class="card-meta">
                            <div class="d-flex align-items-center mb-3">
                                <div class="meta-icon">
                                    <i class="fas fa-calendar text-primary"></i>
                                </div>
                                <small class="text-muted ms-2">
                                    {{ $news->published_at ? $news->published_at->format('M d, Y') : $news->created_at->format('M d, Y') }}
                                </small>
                            </div>
                            <a href="{{ route('news.show', $news->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                                Read Article <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('news') }}" class="btn btn-primary btn-lg rounded-pill">
                <i class="fas fa-newspaper me-2"></i>View All News & Updates
            </a>
        </div>
    </div>
</section>
@endif

<!-- Events Section -->
@if($upcomingEvents->count() > 0)
<section class="py-5 bg-gradient-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="badge bg-accent-soft text-accent fs-6 px-3 py-2 rounded-pill mb-3">Mark Your Calendar</span>
                <h2 class="section-title">Upcoming Events & Activities</h2>
                <p class="lead">Join us for exciting events, educational activities, and community celebrations throughout the academic year</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($upcomingEvents as $event)
            <div class="col-lg-4">
                <div class="card modern-card h-100 event-card">
                    <div class="card-image-wrapper">
                        @if($event->featured_image)
                            <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}">
                        @else
                            <div class="card-img-placeholder">
                                <div class="placeholder-icon">
                                    <i class="fas fa-calendar-star"></i>
                                </div>
                            </div>
                        @endif
                        <div class="event-date-badge">
                            <div class="date-month">{{ $event->start_date->format('M') }}</div>
                            <div class="date-day">{{ $event->start_date->format('d') }}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="event-meta mb-3">
                            @if($event->location)
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <small class="text-muted">{{ $event->location }}</small>
                                </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock text-primary me-2"></i>
                                <small class="text-muted">{{ $event->start_date->format('g:i A') }}</small>
                            </div>
                        </div>
                        <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($event->excerpt ?: $event->description, 120) }}</p>
                        <a href="{{ route('events.show', $event->slug) }}" class="btn btn-outline-accent btn-sm rounded-pill">
                            Learn More <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('events') }}" class="btn btn-accent btn-lg rounded-pill">
                <i class="fas fa-calendar-alt me-2"></i>View Full Calendar
            </a>
        </div>
    </div>
</section>
@endif

<!-- Gallery Section -->
@if($featuredGallery->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="badge bg-success-soft text-success fs-6 px-3 py-2 rounded-pill mb-3">School Life</span>
                <h2 class="section-title">Moments That Matter</h2>
                <p class="lead">Discover the vibrant life at our school through these captured moments of learning, growth, and joy</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($featuredGallery as $photo)
            <div class="col-lg-4 col-md-6">
                <div class="gallery-card modern-card">
                    <div class="gallery-image-wrapper">
                        <img src="{{ asset($photo->image_path) }}" class="img-fluid" alt="{{ $photo->title }}">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h6 class="text-white fw-bold">{{ $photo->title }}</h6>
                                <div class="gallery-actions">
                                    <button class="btn btn-light btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('gallery') }}" class="btn btn-success btn-lg rounded-pill">
                <i class="fas fa-images me-2"></i>Explore Full Gallery
            </a>
        </div>
    </div>
</section>
@endif

<!-- Staff Section -->
@if($featuredStaff->count() > 0)
<section class="py-5 bg-gradient-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="badge bg-secondary-soft text-secondary fs-6 px-3 py-2 rounded-pill mb-3">Our Team</span>
                <h2 class="section-title">Meet Our Dedicated Educators</h2>
                <p class="lead">Our passionate team of educators brings years of experience and a commitment to nurturing every student's potential</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($featuredStaff as $staff)
            <div class="col-lg-3 col-md-6">
                <div class="card modern-card text-center h-100 staff-card">
                    <div class="card-body">
                        <div class="staff-avatar-wrapper mb-3">
                            @if($staff->photo)
                                <img src="{{ asset('storage/' . $staff->photo) }}" class="staff-avatar" alt="{{ $staff->name }}">
                            @else
                                <div class="staff-placeholder-modern">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                            <div class="staff-status-badge">
                                <i class="fas fa-check-circle text-success"></i>
                            </div>
                        </div>
                        <h6 class="card-title fw-bold mb-2">{{ $staff->name }}</h6>
                        <p class="text-primary fw-semibold mb-2">{{ $staff->position }}</p>
                        @if($staff->department)
                            <div class="department-badge">
                                <span class="badge bg-light text-dark">{{ $staff->department }}</span>
                            </div>
                        @endif
                        <div class="staff-social mt-3">
                            <div class="social-links">
                                <button class="btn btn-sm btn-outline-primary rounded-circle">
                                    <i class="fas fa-envelope"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('staff') }}" class="btn btn-secondary btn-lg rounded-pill">
                <i class="fas fa-users me-2"></i>Meet All Our Team
            </a>
        </div>
    </div>
</section>
@endif

@if(isset($pageContent['cta_title']) || isset($pageContent['cta_content']) || isset($settings['cta_title']) || isset($settings['cta_content']))
<!-- CTA Section -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="cta-content">
                    <span class="badge bg-light text-primary fs-6 px-3 py-2 rounded-pill mb-3">Join Our Community</span>
                    @if(isset($pageContent['cta_title']['title']) || isset($settings['cta_title']['value']))
                    <h3 class="fw-bold mb-3">
                        {{ isset($pageContent['cta_title']['title']) ? $pageContent['cta_title']['title'] : $settings['cta_title']['value'] }}
                    </h3>
                    @endif
                    @if(isset($pageContent['cta_content']['content']) || isset($settings['cta_content']['value']))
                    <p class="lead mb-0 opacity-90">
                        {{ isset($pageContent['cta_content']['content']) ? $pageContent['cta_content']['content'] : $settings['cta_content']['value'] }}
                    </p>
                    @endif
                    <div class="cta-features mt-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center text-white">
                                    <div class="feature-check me-3">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <span>Enrollment Open</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center text-white">
                                    <div class="feature-check me-3">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <span>Free Campus Tour</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center text-white">
                                    <div class="feature-check me-3">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <span>24/7 Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <div class="cta-actions">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg rounded-pill mb-3 me-2">
                        <i class="fas fa-phone me-2"></i>Contact Us Today
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg rounded-pill">
                        <i class="fas fa-info-circle me-2"></i>Learn More
                    </a>
                    <div class="mt-3">
                        <small class="text-light opacity-75">
                            <i class="fas fa-star me-1"></i>
                            Trusted by 500+ families in the community
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<style>
    /* Modern Design Variables */
    :root {
        --gradient-primary: linear-gradient(135deg, #e74c25 0%, #2c5530 100%);
        --gradient-light: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
        --shadow-soft: 0 4px 25px rgba(0, 0, 0, 0.08);
        --shadow-hover: 0 8px 35px rgba(0, 0, 0, 0.12);
        --border-radius-lg: 1rem;
        --border-radius-xl: 1.5rem;
    }

    /* Modern Utility Classes */
    .bg-primary-soft { background-color: rgba(231, 76, 37, 0.1) !important; }
    .bg-accent-soft { background-color: rgba(255, 193, 7, 0.1) !important; }
    .bg-success-soft { background-color: rgba(25, 135, 84, 0.1) !important; }
    .bg-secondary-soft { background-color: rgba(108, 117, 125, 0.1) !important; }
    .text-accent { color: #ffc107 !important; }
    .btn-accent { background-color: #ffc107; border-color: #ffc107; color: #000; }
    .btn-outline-accent { border-color: #ffc107; color: #ffc107; }
    .btn-outline-accent:hover { background-color: #ffc107; color: #000; }
    .bg-gradient-primary { background: var(--gradient-primary) !important; }
    .bg-gradient-light { background: var(--gradient-light) !important; }

    /* Modern Card Styles */
    .modern-card {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-soft);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        background: #fff;
    }

    .modern-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-hover);
    }

    /* Feature Box Enhancements */
    .feature-box {
        padding: 2rem;
        border-radius: var(--border-radius-lg);
        text-align: center;
        height: 100%;
        position: relative;
        background: #fff;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .gradient-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 1.8rem;
        box-shadow: 0 8px 25px rgba(231, 76, 37, 0.2);
    }

    .feature-stats {
        margin-top: 1rem;
    }

    .feature-stats .badge {
        font-size: 0.7rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
    }

    /* News Card Styles */
    .news-card {
        overflow: hidden;
        position: relative;
    }

    .card-image-wrapper {
        position: relative;
        overflow: hidden;
    }

    .card-image-wrapper img {
        height: 220px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .card-image-wrapper img {
        transform: scale(1.05);
    }

    .card-img-placeholder {
        height: 220px;
        background: var(--gradient-light);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .placeholder-icon {
        width: 60px;
        height: 60px;
        background: rgba(231, 76, 37, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 1.5rem;
    }

    .card-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 2;
    }

    .card-meta {
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding-top: 1rem;
    }

    .meta-icon {
        width: 24px;
        height: 24px;
        background: rgba(231, 76, 37, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    /* Event Card Styles */
    .event-card {
        position: relative;
    }

    .event-date-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: #fff;
        border-radius: 0.5rem;
        padding: 0.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        z-index: 2;
        min-width: 60px;
    }

    .date-month {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        color: var(--primary-color);
        line-height: 1;
    }

    .date-day {
        font-size: 1.25rem;
        font-weight: 700;
        color: #333;
        line-height: 1;
    }

    .event-meta {
        background: rgba(0, 0, 0, 0.02);
        border-radius: 0.5rem;
        padding: 0.75rem;
    }

    /* Gallery Card Styles */
    .gallery-card {
        overflow: hidden;
        position: relative;
    }

    .gallery-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: var(--border-radius-lg);
    }

    .gallery-image-wrapper img {
        height: 280px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        padding: 2rem 1.5rem 1.5rem;
        transform: translateY(100%);
        transition: all 0.3s ease;
    }

    .gallery-card:hover .gallery-overlay {
        transform: translateY(0);
    }

    .gallery-card:hover .gallery-image-wrapper img {
        transform: scale(1.1);
    }

    .gallery-actions .btn {
        width: 36px;
        height: 36px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Staff Card Styles */
    .staff-card {
        position: relative;
        background: #fff;
    }

    .staff-avatar-wrapper {
        position: relative;
        display: inline-block;
    }

    .staff-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .staff-placeholder-modern {
        width: 100px;
        height: 100px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        border: 4px solid #fff;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
    }

    .staff-status-badge {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #fff;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .department-badge {
        margin-top: 0.5rem;
    }

    .social-links .btn {
        width: 32px;
        height: 32px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 2px;
    }

    /* CTA Section Enhancements */
    .cta-content .badge {
        backdrop-filter: blur(10px);
    }

    .feature-check {
        width: 24px;
        height: 24px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }

    .cta-actions .btn {
        min-width: 160px;
        font-weight: 600;
    }

    /* Hero Slideshow Styles - Override global hero styles */
    .hero-section {
        position: relative !important;
        min-height: 90vh !important;
        background: transparent !important;
        overflow: hidden !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .hero-section::before {
        display: none !important;
    }

    .hero-fallback-bg {
        background: var(--gradient-primary);
        min-height: 90vh;
        height: 90vh;
        display: flex;
        align-items: center;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .carousel {
        height: 90vh;
        width: 100%;
    }

    .carousel-inner {
        height: 100%;
    }

    .hero-slide-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 1;
        transition: none;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(231, 76, 37, 0.3) 0%, rgba(44, 85, 48, 0.3) 100%);
        z-index: 2;
    }

    .carousel-item {
        height: 90vh !important;
        position: relative;
    }

    .carousel-indicators {
        bottom: 30px;
        z-index: 15;
        margin-bottom: 0;
    }

    .carousel-indicators [data-bs-target] {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: transparent;
        border: 2px solid rgba(255, 255, 255, 0.7);
        margin: 0 5px;
        transition: all 0.3s ease;
    }

    .carousel-indicators .active {
        background-color: rgba(255, 255, 255, 0.9);
        border-color: white;
        transform: scale(1.2);
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 8%;
        z-index: 15;
        opacity: 0.9;
        transition: opacity 0.3s ease;
        background: transparent !important;
        border: none !important;
        margin: 0 20px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
        background: transparent !important;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 45px;
        height: 45px;
        background-size: 45px 45px;
        filter: none;
    }

    .carousel-item .container {
        position: relative;
        z-index: 10;
        height: 100%;
        display: flex;
        align-items: center;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section, .carousel, .carousel-item {
            min-height: 70vh;
            height: auto;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 12%;
            margin: 0 10px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 35px;
            height: 35px;
            background-size: 35px 35px;
        }

        .gradient-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .feature-box {
            padding: 1.5rem;
        }

        .cta-actions .btn {
            min-width: auto;
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }

    /* About Section Enhancements */
    .info-card {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 1rem;
        border-radius: var(--border-radius-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.2rem;
        color: white;
    }

    .feature-point {
        display: flex;
        align-items: center;
        color: white;
        margin-bottom: 0.75rem;
        font-weight: 500;
    }

    .feature-point i {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
    }

    .about-visual {
        position: relative;
    }

    .image-stack {
        position: relative;
        display: inline-block;
    }

    .image-main {
        position: relative;
        z-index: 2;
    }

    .image-main img {
        border-radius: var(--border-radius-xl);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        max-width: 100%;
        height: auto;
    }

    .image-stats {
        position: absolute;
        bottom: -20px;
        right: -20px;
        z-index: 3;
    }

    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: var(--border-radius-lg);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        min-width: 140px;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 1rem;
        font-size: 1.1rem;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
        line-height: 1;
    }

    .stat-desc {
        font-size: 0.85rem;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Hero Section Enhancements */
    .hero-content {
        position: relative;
        z-index: 10;
    }

    .hero-stats {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius-lg);
        padding: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .hero-image-wrapper {
        position: relative;
        display: inline-block;
    }

    .hero-main-image {
        border-radius: var(--border-radius-xl);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        max-width: 100%;
        height: auto;
    }

    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .floating-element {
        position: absolute;
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 1.5rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        animation: float 3s ease-in-out infinite;
    }

    .element-1 {
        top: 20%;
        right: -10%;
        animation-delay: 0s;
    }

    .element-2 {
        bottom: 30%;
        left: -10%;
        animation-delay: 1s;
    }

    .element-3 {
        top: 50%;
        right: -5%;
        animation-delay: 2s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-slide-up {
        animation: slideUp 0.8s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simple carousel initialization with enhanced debugging
    const heroCarousel = document.getElementById('heroCarousel');
    if (heroCarousel) {
        console.log('Found hero carousel, initializing...');
        console.log('Carousel element:', heroCarousel);

        const carouselItems = heroCarousel.querySelectorAll('.carousel-item');
        console.log('Number of carousel items found:', carouselItems.length);

        carouselItems.forEach((item, index) => {
            console.log(`Slide ${index}:`, item);
            console.log(`  - Has active class: ${item.classList.contains('active')}`);
            console.log(`  - Slide ID: ${item.getAttribute('data-slide-id')}`);
            const title = item.querySelector('h1');
            if (title) {
                console.log(`  - Title: ${title.textContent}`);
            }
        });

        // Wait for Bootstrap to be fully loaded
        if (typeof bootstrap !== 'undefined') {
            try {
                // Initialize carousel with basic settings
                const carousel = new bootstrap.Carousel(heroCarousel, {
                    interval: 5000,  // 5 seconds between slides
                    wrap: true,      // Loop back to first slide
                    pause: 'hover',  // Pause on hover
                    keyboard: true,  // Enable keyboard navigation
                    touch: true      // Enable touch/swipe
                });

                console.log('Carousel initialized successfully');

                // Add extensive event listeners for debugging
                heroCarousel.addEventListener('slide.bs.carousel', function(event) {
                    console.log('🔄 Carousel sliding from slide', event.from, 'to slide', event.to);
                    console.log('Event detail:', event);
                });

                heroCarousel.addEventListener('slid.bs.carousel', function(event) {
                    console.log('✅ Carousel slide completed from slide', event.from, 'to slide', event.to);
                    const activeItem = heroCarousel.querySelector('.carousel-item.active');
                    if (activeItem) {
                        const title = activeItem.querySelector('h1');
                        console.log('Active slide title:', title ? title.textContent : 'No title');
                    }
                });

                // Test manual navigation after a short delay
                setTimeout(() => {
                    console.log('🧪 Testing manual slide to next...');
                    carousel.next();
                }, 2000);

            } catch (error) {
                console.error('❌ Carousel initialization failed:', error);
            }
        } else {
            console.error('❌ Bootstrap not loaded');
        }
    } else {
        console.log('❌ Hero carousel element not found');
    }
});
</script>
@endpush
