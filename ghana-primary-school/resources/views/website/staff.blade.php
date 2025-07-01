@extends('layouts.website')

@section('title', 'Our Staff')

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('about') }}" class="text-decoration-none">About Us</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Our Staff</li>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Our Dedicated Staff</h1>
                <p class="lead mb-4">Meet the passionate educators who make our school community special</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/staff-hero.svg') }}" alt="Our Staff" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    @if($staff->count() > 0)
        <div class="row g-4">
            @foreach($staff as $member)
                <div class="col-lg-4 col-md-6">
                    <div class="card modern-card text-center h-100 staff-card">
                        <div class="card-body">
                            <div class="staff-avatar-wrapper mb-3">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" class="staff-avatar-large" alt="{{ $member->name }}">
                                @else
                                    <div class="staff-placeholder-large">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                                <div class="staff-status-badge">
                                    <i class="fas fa-check-circle text-success"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-2">{{ $member->name }}</h5>
                            <p class="text-primary fw-semibold mb-2">{{ $member->position }}</p>
                            @if($member->department)
                                <div class="department-badge mb-3">
                                    <span class="badge bg-light text-dark">{{ $member->department }}</span>
                                </div>
                            @endif
                            @if($member->bio)
                                <p class="text-muted small">{{ Str::limit($member->bio, 120) }}</p>
                            @endif
                            @if($member->qualifications && is_array($member->qualifications) && count($member->qualifications) > 0)
                                <div class="qualifications mb-3">
                                    <h6 class="fw-bold small">Qualifications:</h6>
                                    <p class="text-muted small">{{ implode(', ', $member->qualifications) }}</p>
                                </div>
                            @elseif($member->qualifications && is_string($member->qualifications))
                                <div class="qualifications mb-3">
                                    <h6 class="fw-bold small">Qualifications:</h6>
                                    <p class="text-muted small">{{ $member->qualifications }}</p>
                                </div>
                            @endif
                            @if($member->experience_years)
                                <div class="experience mb-3">
                                    <span class="badge bg-primary">{{ $member->experience_years }} years experience</span>
                                </div>
                            @endif
                            <div class="staff-social mt-3">
                                <div class="social-links">
                                    @if($member->email)
                                        <a href="mailto:{{ $member->email }}" class="btn btn-sm btn-outline-primary rounded-circle">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    @endif
                                    @if($member->phone)
                                        <a href="tel:{{ $member->phone }}" class="btn btn-sm btn-outline-secondary rounded-circle">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-12 text-center py-5">
                <div class="empty-state">
                    <i class="fas fa-users fa-5x text-muted mb-4"></i>
                    <h3 class="text-muted">No Staff Members Listed</h3>
                    <p class="text-muted">Staff information will be displayed here when available.</p>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-2">Interested in Joining Our Team?</h3>
                <p class="mb-0">We're always looking for passionate educators to join our school community.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-envelope me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
    /* Staff Page Specific Styles */
    .staff-avatar-large {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .staff-placeholder-large {
        width: 150px;
        height: 150px;
        background: linear-gradient(135deg, #e74c25 0%, #2c5530 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        border: 4px solid #fff;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
    }

    .staff-avatar-wrapper {
        position: relative;
        display: inline-block;
    }

    .staff-status-badge {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background: #fff;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        font-size: 1.2rem;
    }

    .modern-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        background: #fff;
    }

    .modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 35px rgba(0, 0, 0, 0.12);
    }

    .social-links .btn {
        width: 36px;
        height: 36px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 3px;
    }

    .qualifications {
        text-align: left;
        background: rgba(0, 0, 0, 0.02);
        border-radius: 0.5rem;
        padding: 0.75rem;
    }

    .empty-state {
        padding: 4rem 2rem;
    }

    .bg-primary-gradient {
        background: linear-gradient(135deg, #e74c25 0%, #2c5530 100%);
    }

    @media (max-width: 768px) {
        .staff-avatar-large {
            width: 120px;
            height: 120px;
        }

        .staff-placeholder-large {
            width: 120px;
            height: 120px;
            font-size: 2.5rem;
        }
    }
</style>
@endpush
