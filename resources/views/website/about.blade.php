@extends('layouts.website')

@section('title', 'About Us - ' . (isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School'))
@section('description', 'Learn more about our school, mission, vision, and dedicated staff members.')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">About Us</li>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">About Our School</h1>
                <p class="lead mb-4">Learning about excellence, building character, shaping futures</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/about-hero.svg') }}" alt="About Us" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

@if($school)
<!-- School Information -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="badge bg-primary-soft text-primary fs-6 px-3 py-2 rounded-pill mb-3">Our Story</span>
                <h2 class="section-title">{{ $school->name }}</h2>
                <p class="lead">{{ $school->description }}</p>

                <div class="row g-4 mt-4">
                    <div class="col-sm-6">
                        <div class="info-card-modern">
                            <div class="info-icon-modern">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="info-content">
                                <h6 class="fw-bold mb-1">Established</h6>
                                <small class="text-muted">{{ $school->established_year }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-card-modern">
                            <div class="info-icon-modern">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="info-content">
                                <h6 class="fw-bold mb-1">Principal</h6>
                                <small class="text-muted">{{ $school->principal_name }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary-custom text-white rounded-circle p-3 me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Location</h6>
                                <small class="text-muted">{{ $school->address }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary-custom text-white rounded-circle p-3 me-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Contact</h6>
                                <small class="text-muted">{{ $school->phone }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="mt-5 mt-lg-0">
                    @if($school->logo)
                        <img src="{{ asset('storage/' . $school->logo) }}" alt="{{ $school->name }}" class="img-fluid" style="max-width: 300px;">
                    @else
                        <img src="{{ asset('images/academic-excellence.svg') }}" alt="Academic Excellence" class="img-fluid rounded shadow" style="max-width: 400px;">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission and Vision -->
<section class="py-5 bg-gradient-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="badge bg-secondary-soft text-secondary fs-6 px-3 py-2 rounded-pill mb-3">Our Foundation</span>
                <h2 class="section-title">Mission & Vision</h2>
                <p class="lead">The driving forces behind our educational excellence</p>
            </div>
        </div>
        <div class="row g-5">
            @if(isset($pageContent['school_mission']) || $school->mission)
            <div class="col-lg-6">
                <div class="modern-card text-center h-100">
                    <div class="card-body p-4">
                        <div class="mission-icon mb-4">
                            <div class="gradient-icon-large">
                                <i class="fas fa-bullseye"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-3">
                            {{ isset($pageContent['school_mission']['title']) ? $pageContent['school_mission']['title'] : 'Our Mission' }}
                        </h3>
                        <p class="lead text-muted">
                            {{ isset($pageContent['school_mission']['content']) ? $pageContent['school_mission']['content'] : $school->mission }}
                        </p>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($pageContent['school_vision']) || $school->vision)
            <div class="col-lg-6">
                <div class="modern-card text-center h-100">
                    <div class="card-body p-4">
                        <div class="vision-icon mb-4">
                            <div class="gradient-icon-large">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-3">
                            {{ isset($pageContent['school_vision']['title']) ? $pageContent['school_vision']['title'] : 'Our Vision' }}
                        </h3>
                        <p class="lead text-muted">
                            {{ isset($pageContent['school_vision']['content']) ? $pageContent['school_vision']['content'] : $school->vision }}
                        </p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- Our Values -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <span class="badge bg-success-soft text-success fs-6 px-3 py-2 rounded-pill mb-3">Our Principles</span>
                <h2 class="section-title">Core Values</h2>
                <p class="lead">The fundamental principles that guide everything we do and shape our school culture</p>
            </div>
        </div>
        @if($coreValues->count() > 0)
            <div class="row g-4">
                @foreach($coreValues as $value)
                <div class="col-lg-3 col-md-6">
                    <div class="modern-card text-center h-100 value-card">
                        <div class="card-body p-4">
                            <div class="value-icon mb-3">
                                <div class="value-icon-circle" style="background-color: {{ $value->color }};">
                                    <i class="{{ $value->icon }}"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold">{{ $value->title }}</h5>
                            <p class="card-text text-muted">{{ $value->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Fallback to default values if none are set -->
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="bg-primary-custom text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h5 class="card-title">Excellence</h5>
                            <p class="card-text">We strive for excellence in all aspects of education and character development.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="bg-primary-custom text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-heart"></i>
                            </div>
                            <h5 class="card-title">Integrity</h5>
                            <p class="card-text">We promote honesty, respect, and moral values in all our interactions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="bg-primary-custom text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h5 class="card-title">Innovation</h5>
                            <p class="card-text">We embrace creative thinking and modern teaching methods to enhance learning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center h-100 border-0 shadow">
                        <div class="card-body">
                            <div class="bg-primary-custom text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-users"></i>
                            </div>
                            <h5 class="card-title">Community</h5>
                            <p class="card-text">We foster a strong sense of community and collaboration among all stakeholders.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Staff Section -->
@if($staff->count() > 0)
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Meet Our Dedicated Team</h2>
                <p class="lead">Our experienced and passionate educators are committed to your child's success</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($staff as $member)
            <div class="col-lg-4 col-md-6">
                <div class="card text-center h-100 border-0 shadow">
                    @if($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" class="card-img-top rounded-circle mx-auto mt-4" alt="{{ $member->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="mx-auto mt-4 d-flex align-items-center justify-content-center rounded-circle bg-light" style="width: 150px; height: 150px;">
                            <i class="fas fa-user fa-4x text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $member->name }}</h5>
                        <h6 class="text-primary-custom">{{ $member->position }}</h6>
                        @if($member->department)
                            <p class="text-muted mb-2">{{ $member->department }}</p>
                        @endif
                        @if($member->bio)
                            <p class="card-text">{{ Str::limit($member->bio, 120) }}</p>
                        @endif
                        @if($member->qualifications)
                            <div class="mt-3">
                                <h6 class="fw-bold mb-2">Qualifications:</h6>
                                <ul class="list-unstyled text-muted small">
                                    @foreach($member->qualifications as $qualification)
                                        <li>• {{ $qualification }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($member->subjects)
                            <div class="mt-3">
                                <h6 class="fw-bold mb-2">Subjects:</h6>
                                <div class="d-flex justify-content-center flex-wrap gap-1">
                                    @foreach($member->subjects as $subject)
                                        <span class="badge bg-primary-custom">{{ $subject }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if($member->email)
                            <div class="mt-3">
                                <a href="mailto:{{ $member->email }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-envelope me-1"></i>Contact
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Academic Programs -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Academic Programs</h2>
                <p class="lead">Comprehensive education from nursery to primary six</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center">
                        <div class="bg-primary-custom text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-baby fa-2x"></i>
                        </div>
                        <h5 class="card-title">Early Years (Nursery - KG2)</h5>
                        <p class="card-text">Foundation learning through play-based activities, developing basic literacy, numeracy, and social skills.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center">
                        <div class="bg-primary-custom text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-child fa-2x"></i>
                        </div>
                        <h5 class="card-title">Lower Primary (Class 1-3)</h5>
                        <p class="card-text">Building strong foundations in reading, writing, mathematics, and introducing basic science concepts.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center">
                        <div class="bg-primary-custom text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-user-graduate fa-2x"></i>
                        </div>
                        <h5 class="card-title">Upper Primary (Class 4-6)</h5>
                        <p class="card-text">Advanced learning in all subjects, preparing students for secondary education and national examinations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary-custom text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-2">Want to Learn More About Our School?</h3>
                <p class="mb-0">Contact us today to schedule a visit or get more information about enrollment.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-calendar me-2"></i>Schedule Visit
                </a>
            </div>
        </div>
    </div>
</section>

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
    .bg-secondary-soft { background-color: rgba(108, 117, 125, 0.1) !important; }
    .bg-success-soft { background-color: rgba(25, 135, 84, 0.1) !important; }
    .bg-gradient-light { background: var(--gradient-light) !important; }
    .bg-primary-gradient { background: var(--gradient-primary) !important; }

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

    /* Info Card Styles */
    .info-card-modern {
        display: flex;
        align-items: center;
        background: rgba(231, 76, 37, 0.05);
        padding: 1.5rem;
        border-radius: var(--border-radius-lg);
        border: 1px solid rgba(231, 76, 37, 0.1);
        transition: all 0.3s ease;
    }

    .info-card-modern:hover {
        background: rgba(231, 76, 37, 0.1);
        transform: translateY(-2px);
    }

    .info-icon-modern {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        font-size: 1.5rem;
        color: white;
        box-shadow: 0 4px 15px rgba(231, 76, 37, 0.3);
    }

    /* Gradient Icon Styles */
    .gradient-icon-large {
        width: 100px;
        height: 100px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: white;
        font-size: 2.5rem;
        box-shadow: 0 8px 30px rgba(231, 76, 37, 0.3);
    }

    /* Value Icon Styles */
    .value-icon-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: white;
        font-size: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .value-card:hover .value-icon-circle {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }

    /* Empty State */
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .info-card-modern {
            flex-direction: column;
            text-align: center;
        }

        .info-icon-modern {
            margin-right: 0;
            margin-bottom: 1rem;
        }

        .gradient-icon-large {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }

        .value-icon-circle {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }
</style>
@endpush
