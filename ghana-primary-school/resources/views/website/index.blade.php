@extends('layouts.website')

@section('title', (isset($settings['hero_title']) ? $settings['hero_title']->value : 'Welcome to Ghana Excellence Primary School') . ' - ' . (isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School'))
@section('description', isset($settings['hero_description']) ? $settings['hero_description']->value : 'We provide quality education that nurtures creativity, critical thinking, and character development.')

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
        <!-- Fallback hero section -->
        <div class="hero-fallback-bg">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold mb-4 text-white">
                            {{ isset($settings['hero_title']) ? $settings['hero_title']->value : 'Welcome to Ghana Excellence Primary School' }}
                        </h1>
                        <h2 class="h4 mb-4 opacity-90 text-white">
                            {{ isset($settings['hero_subtitle']) ? $settings['hero_subtitle']->value : 'Where Young Minds Grow and Dreams Take Flight' }}
                        </h2>
                        <p class="lead mb-4 text-white">
                            {{ isset($settings['hero_description']) ? $settings['hero_description']->value : 'We provide quality education that nurtures creativity, critical thinking, and character development in a safe and caring environment.' }}
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ route('about') }}" class="btn btn-light btn-lg">
                                <i class="fas fa-info-circle me-2"></i>Learn More
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-phone me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="hero-image mt-5 mt-lg-0">
                            <img src="{{ asset('images/hero-school.svg') }}" alt="Ghana Excellence Primary School" class="img-fluid rounded-lg shadow-lg" style="border-radius: 20px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>

<!-- About Section -->
<section class="py-5 bg-secondary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title text-white">{{ isset($settings['about_title']) ? $settings['about_title']->value : 'Want to Learn More About Our School?' }}</h2>
                <p class="lead text-white">
                    {{ isset($settings['about_description']) ? $settings['about_description']->value : 'Our school has been serving the community for over a decade, providing quality primary education that prepares students for secondary school and beyond.' }}
                </p>
                @if($school)
                <div class="row g-4 mt-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light text-primary rounded-circle p-3 me-3">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-white">Established</h6>
                                <small class="text-white opacity-75">{{ $school->established_year ?? 'Since 2010' }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light text-primary rounded-circle p-3 me-3">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-white">Principal</h6>
                                <small class="text-white opacity-75">{{ $school->principal_name ?? 'Mrs. Akosua Mensah' }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <a href="{{ route('about') }}" class="btn btn-light btn-lg mt-4">
                    <i class="fas fa-arrow-right me-2"></i>Read More
                </a>
            </div>
            <div class="col-lg-6 text-center">
                <div class="mt-5 mt-lg-0">
                    <img src="{{ asset('images/about-students.svg') }}" alt="Our Students" class="img-fluid rounded-lg shadow" style="border-radius: 15px;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Why Choose Ghana Excellence Primary School?</h2>
                <p class="lead">We provide a nurturing environment where every child can thrive and reach their full potential</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Qualified Teachers</h5>
                    <p class="text-muted">Our experienced and certified teachers are committed to helping every student succeed.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Modern Technology</h5>
                    <p class="text-muted">State-of-the-art computer labs and smart classrooms enhance learning experiences.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Safe Environment</h5>
                    <p class="text-muted">A secure campus with CCTV monitoring ensures the safety of all our students.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Excellence Awards</h5>
                    <p class="text-muted">Recognized for outstanding academic performance and student development programs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
@if($featuredNews->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Latest News & Announcements</h2>
                <p class="lead">Stay updated with the latest happenings at our school</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($featuredNews as $news)
            <div class="col-lg-4">
                <div class="card h-100">
                    @if($news->featured_image)
                        <img src="{{ asset('storage/' . $news->featured_image) }}" class="card-img-top" alt="{{ $news->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-newspaper fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <p class="card-text">{{ Str::limit($news->excerpt ?: $news->content, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $news->published_at ? $news->published_at->format('M d, Y') : $news->created_at->format('M d, Y') }}
                            </small>
                            <a href="{{ route('news.show', $news->slug) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('news') }}" class="btn btn-primary">
                <i class="fas fa-newspaper me-2"></i>View All News
            </a>
        </div>
    </div>
</section>
@endif

<!-- Events Section -->
@if($upcomingEvents->count() > 0)
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Upcoming Events</h2>
                <p class="lead">Don't miss out on our exciting upcoming events</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($upcomingEvents as $event)
            <div class="col-lg-4">
                <div class="card h-100">
                    @if($event->featured_image)
                        <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-calendar-check fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary">{{ $event->start_date->format('M d') }}</span>
                            @if($event->location)
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $event->location }}
                                </small>
                            @endif
                        </div>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ Str::limit($event->excerpt ?: $event->description, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                {{ $event->start_date->format('g:i A') }}
                            </small>
                            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('events') }}" class="btn btn-primary">
                <i class="fas fa-calendar me-2"></i>View All Events
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
                <h2 class="section-title">School Gallery</h2>
                <p class="lead">Take a glimpse into life at our school</p>
            </div>
        </div>
        <div class="row g-5">
            @foreach($featuredGallery as $photo)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="gallery-item">
                    <img src="{{ asset($photo->image_path) }}" class="img-fluid rounded" alt="{{ $photo->title }}" style="height: 250px; width: 100%; object-fit: cover;">
                    <div class="gallery-overlay">
                        <h6 class="text-white">{{ $photo->title }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('gallery') }}" class="btn btn-primary">
                <i class="fas fa-images me-2"></i>View Full Gallery
            </a>
        </div>
    </div>
</section>
@endif

<!-- Staff Section -->
@if($featuredStaff->count() > 0)
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Meet Our Team</h2>
                <p class="lead">Dedicated educators committed to your child's success</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($featuredStaff as $staff)
            <div class="col-lg-3 col-md-6">
                <div class="card text-center h-100">
                    @if($staff->photo)
                        <img src="{{ asset('storage/' . $staff->photo) }}" class="card-img-top rounded-circle mx-auto mt-3" alt="{{ $staff->name }}" style="width: 120px; height: 120px; object-fit: cover;">
                    @else
                        <div class="staff-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h6 class="card-title">{{ $staff->name }}</h6>
                        <p class="text-muted mb-2">{{ $staff->position }}</p>
                        @if($staff->department)
                            <small class="text-muted">{{ $staff->department }}</small>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-5 bg-secondary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-2">Ready to Join Our School Community?</h3>
                <p class="mb-0">Contact us today to learn more about enrollment and how we can help your child succeed.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-envelope me-2"></i>Get In Touch
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
    /* Hero Slideshow Styles - Override global hero styles */
    .hero-section {
        position: relative !important;
        min-height: 90vh !important;
        background: transparent !important; /* Remove initial background */
        overflow: hidden !important;
        padding: 0 !important; /* Remove global padding causing white space */
        margin: 0 !important;
    }

    .hero-section::before {
        display: none !important; /* Remove any pseudo-elements */
    }

    /* Fallback hero background when no slides */
    .hero-fallback-bg {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
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
        transition: none; /* Remove any transition that might cause glitching */
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
        /* Remove unwanted background */
        background: transparent !important;
        border: none !important;
        margin: 0 20px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
        /* Remove unwanted background on hover */
        background: transparent !important;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 45px;
        height: 45px;
        background-size: 45px 45px;
        /* Remove shadow/filter for clean look */
        filter: none;
    }

    .min-vh-75 {
        min-height: 75vh;
    }

    /* Ensure content is above background and properly positioned */
    .carousel-item .container {
        position: relative;
        z-index: 10;
        height: 100%;
        display: flex;
        align-items: center;
    }

    /* Responsive adjustments */
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
    }

    /* Gallery Styles with enhanced gaps */
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 0.375rem;
        margin-bottom: 2.5rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.7));
        padding: 1rem;
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }

    .gallery-item:hover .gallery-overlay {
        transform: translateY(0);
    }

    /* Staff card placeholder */
    .staff-placeholder {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 1rem auto;
    }

    .staff-placeholder i {
        color: white;
        font-size: 2.5rem;
    }

    /* Section title adjustments for dark backgrounds */
    .section-title.text-white::after {
        background: linear-gradient(90deg, white, rgba(255,255,255,0.7));
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
