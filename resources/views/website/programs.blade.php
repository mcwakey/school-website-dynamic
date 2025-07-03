@extends('layouts.website')

@section('title', 'Academic Programs')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Academic Programs</li>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">
                    {{ isset($pageContent['programs_hero']['title']) ? $pageContent['programs_hero']['title'] : 'Academic Programs' }}
                </h1>
                <p class="lead mb-4">
                    {{ isset($pageContent['programs_hero']['content']) ? $pageContent['programs_hero']['content'] : 'Quality education designed to nurture young minds and build strong foundations' }}
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/programs-hero.svg') }}" alt="Academic Programs" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <!-- Overview Section -->
    @if(isset($pageContent['programs_overview']))
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h2 class="mb-4">{{ $pageContent['programs_overview']['title'] }}</h2>
            <p class="lead text-muted mb-4">
                {{ $pageContent['programs_overview']['content'] }}
            </p>
        </div>
    </div>
    @endif

    <!-- Grade Levels -->
    @php
        $gradeLevels = collect($pageContent)->filter(function($content, $key) {
            return isset($content['section']) && $content['section'] === 'grade_levels';
        })->sortBy('sort_order');
    @endphp

    @if($gradeLevels->count() > 0)
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-center mb-5">
                {{ $pageContent['grade_levels_title']['title'] }}
            </h3>

            <div class="row">
                @foreach($gradeLevels as $gradeLevel)
                <div class="col-lg-4 mb-4">
                    <div class="card program-card h-100 shadow-sm">
                        <div class="card-header {{ $gradeLevel['metadata']['card_color'] }} text-white text-center">
                            <h5 class="mb-0">{{ $gradeLevel['title'] }}</h5>
                            @if(isset($gradeLevel['metadata']['age_range']))
                            <small>{{ $gradeLevel['metadata']['age_range'] }}</small>
                            @endif
                        </div>
                        <div class="card-body">
                            @if(isset($gradeLevel['metadata']['classes']) && is_array($gradeLevel['metadata']['classes']))
                            <ul class="list-unstyled">
                                @foreach($gradeLevel['metadata']['classes'] as $class)
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>{{ $class }}</li>
                                @endforeach
                            </ul>
                            <hr>
                            @endif

                            <p class="mb-3">{{ $gradeLevel['content'] }}</p>

                            @if(isset($gradeLevel['metadata']['focus_areas']) && is_array($gradeLevel['metadata']['focus_areas']))
                            <h6>Focus Areas:</h6>
                            <ul class="list-unstyled small text-muted">
                                @foreach($gradeLevel['metadata']['focus_areas'] as $area)
                                <li>• {{ $area }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Core Subjects -->
    @php
        $coreSubjects = collect($pageContent)->filter(function($content, $key) {
            return isset($content['section']) && $content['section'] === 'core_subjects';
        })->sortBy('sort_order');
    @endphp

    @if($coreSubjects->count() > 0)
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-center mb-5">
                {{ isset($pageContent['core_subjects_title']['title']) ? $pageContent['core_subjects_title']['title'] : 'Core Subjects' }}
            </h3>

            <div class="row">
                @foreach($coreSubjects as $subject)
                <div class="col-lg-6 mb-4">
                    <div class="card subject-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subject-icon me-3">
                                    <i class="{{ $subject['metadata']['icon'] }} {{ $subject['metadata']['icon_color'] }}"></i>
                                </div>
                                <h5 class="mb-0">{{ $subject['title'] }}</h5>
                            </div>
                            <p class="text-muted">{{ $subject['content'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Additional Programs -->
    @php
        $additionalPrograms = collect($pageContent)->filter(function($content, $key) {
            return isset($content['section']) && $content['section'] === 'additional_programs';
        })->sortBy('sort_order');
    @endphp

    @if($additionalPrograms->count() > 0)
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-center mb-5">
                {{ $pageContent['additional_programs_title']['title'] }}
            </h3>

            <div class="row">
                @foreach($additionalPrograms as $program)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card extra-program-card text-center h-100">
                        <div class="card-body">
                            <i class="{{ $program['metadata']['icon'] }} fa-3x {{ $program['metadata']['icon_color'] }} mb-3"></i>
                            <h6>{{ $program['title'] }}</h6>
                            <p class="small text-muted">{{ $program['content'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Assessment & Progress -->
    @if(isset($pageContent['assessment_overview']))
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="mb-0 text-center">{{ $pageContent['assessment_overview']['title'] }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $assessmentMethods = collect($pageContent)->filter(function($content, $key) {
                                return isset($content['section']) && $content['section'] === 'assessment_methods';
                            })->sortBy('sort_order');
                        @endphp

                        @if($assessmentMethods->count() > 0)
                            @foreach($assessmentMethods as $method)
                            <div class="col-md-6">
                                <h6>
                                    <i class="{{ $method['metadata']['icon'] ?? 'fas fa-check' }} {{ $method['metadata']['icon_color'] ?? 'text-primary' }} me-2"></i>
                                    {{ $method['title'] }}
                                </h6>
                                @if(isset($method['metadata']['items']) && is_array($method['metadata']['items']))
                                <ul class="list-unstyled small text-muted mb-3">
                                    @foreach($method['metadata']['items'] as $item)
                                    <li>• {{ $item }}</li>
                                    @endforeach
                                </ul>
                                @else
                                <p class="small text-muted mb-3">{{ $method['content'] }}</p>
                                @endif
                            </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="text-center mt-4 bg-light py-4 rounded">
                        @if(isset($pageContent['assessment_cta']))
                        <a href="{{ $pageContent['assessment_cta']['metadata']['link'] }}" class="btn btn-primary">
                            <i class="{{ $pageContent['assessment_cta']['metadata']['icon'] }} me-2"></i>
                            {{ $pageContent['assessment_cta']['title'] }}
                        </a>
                        @endif
                    </div>
                </div>
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
                    <h3 class="fw-bold mb-2">Discover the Right Program for Your Child</h3>
                    <p class="mb-0">Ready to learn more about our academic programs or need help choosing the best fit? Our team is here to guide you every step of the way.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-info-circle me-2"></i>Request More Information
                    </a>
                </div>
            </div>
        </div>
    </section>

<style>
.program-card {
    transition: transform 0.3s ease;
}

.program-card:hover {
    transform: translateY(-5px);
}

.subject-card {
    border-left: 4px solid #667eea;
    transition: border-color 0.3s ease;
}

.subject-card:hover {
    border-left-color: #764ba2;
}

.subject-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(102, 126, 234, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.extra-program-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.extra-program-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
</style>
@endsection
