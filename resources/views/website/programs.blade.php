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
                    {{ isset($pageContent['curriculum_overview']['title']) ? $pageContent['curriculum_overview']['title'] : 'Academic Programs' }}
                </h1>
                <p class="lead mb-4">
                    {{ isset($pageContent['curriculum_overview']['content']) ? $pageContent['curriculum_overview']['content'] : 'Quality education designed to nurture young minds and build strong foundations' }}
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
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h2 class="mb-4">Our Educational Approach</h2>
            <p class="lead text-muted mb-4">
                At {{ $school->name ?? 'our school' }}, we provide a comprehensive primary education that focuses on academic excellence,
                character development, and practical skills that prepare students for their future educational journey.
            </p>
        </div>
    </div>

    <!-- Grade Levels -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-center mb-5">Grade Levels & Classes</h3>

            <div class="row">
                <!-- Nursery Section -->
                <div class="col-lg-4 mb-4">
                    <div class="card program-card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h5 class="mb-0">Nursery Section</h5>
                            <small>Ages 3-5</small>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Nursery 1 (Age 3)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Nursery 2 (Age 4)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Kindergarten (Age 5)</li>
                            </ul>
                            <hr>
                            <h6>Focus Areas:</h6>
                            <ul class="list-unstyled small text-muted">
                                <li>• Play-based learning</li>
                                <li>• Basic numeracy and literacy</li>
                                <li>• Social skills development</li>
                                <li>• Creative arts and crafts</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Lower Primary -->
                <div class="col-lg-4 mb-4">
                    <div class="card program-card h-100 shadow-sm">
                        <div class="card-header bg-info text-white text-center">
                            <h5 class="mb-0">Lower Primary</h5>
                            <small>Ages 6-8</small>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Primary 1 (Age 6)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Primary 2 (Age 7)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Primary 3 (Age 8)</li>
                            </ul>
                            <hr>
                            <h6>Focus Areas:</h6>
                            <ul class="list-unstyled small text-muted">
                                <li>• Reading and writing foundation</li>
                                <li>• Basic mathematics</li>
                                <li>• Environmental studies</li>
                                <li>• Physical education</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Upper Primary -->
                <div class="col-lg-4 mb-4">
                    <div class="card program-card h-100 shadow-sm">
                        <div class="card-header bg-success text-white text-center">
                            <h5 class="mb-0">Upper Primary</h5>
                            <small>Ages 9-12</small>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Primary 4 (Age 9)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Primary 5 (Age 10)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Primary 6 (Age 11-12)</li>
                            </ul>
                            <hr>
                            <h6>Focus Areas:</h6>
                            <ul class="list-unstyled small text-muted">
                                <li>• Advanced literacy and numeracy</li>
                                <li>• Science and technology</li>
                                <li>• Social studies</li>
                                <li>• BECE preparation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Subjects -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-center mb-5">Core Subjects</h3>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card subject-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subject-icon me-3">
                                    <i class="fas fa-book text-primary"></i>
                                </div>
                                <h5 class="mb-0">English Language</h5>
                            </div>
                            <p class="text-muted">Reading, writing, speaking, and listening skills development with emphasis on communication and comprehension.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card subject-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subject-icon me-3">
                                    <i class="fas fa-calculator text-success"></i>
                                </div>
                                <h5 class="mb-0">Mathematics</h5>
                            </div>
                            <p class="text-muted">Number operations, geometry, measurement, and problem-solving skills with practical applications.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card subject-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subject-icon me-3">
                                    <i class="fas fa-flask text-info"></i>
                                </div>
                                <h5 class="mb-0">Science</h5>
                            </div>
                            <p class="text-muted">Basic scientific concepts, experiments, and exploration of the natural world around us.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card subject-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subject-icon me-3">
                                    <i class="fas fa-globe text-warning"></i>
                                </div>
                                <h5 class="mb-0">Social Studies</h5>
                            </div>
                            <p class="text-muted">History, geography, civics, and cultural studies to understand society and community.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Programs -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="text-center mb-5">Additional Programs</h3>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card extra-program-card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-palette fa-3x text-primary mb-3"></i>
                            <h6>Arts & Crafts</h6>
                            <p class="small text-muted">Creative expression through drawing, painting, and handcrafts</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card extra-program-card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-running fa-3x text-success mb-3"></i>
                            <h6>Physical Education</h6>
                            <p class="small text-muted">Sports, games, and physical fitness activities</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card extra-program-card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-music fa-3x text-info mb-3"></i>
                            <h6>Music & Dance</h6>
                            <p class="small text-muted">Traditional and modern music with cultural dance</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card extra-program-card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-laptop fa-3x text-warning mb-3"></i>
                            <h6>Computer Skills</h6>
                            <p class="small text-muted">Basic computer literacy and digital skills</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assessment & Progress -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="mb-0 text-center">Assessment & Progress Tracking</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="fas fa-chart-line text-primary me-2"></i>Continuous Assessment</h6>
                            <ul class="list-unstyled small text-muted mb-3">
                                <li>• Weekly quizzes and assignments</li>
                                <li>• Monthly progress reports</li>
                                <li>• Parent-teacher conferences</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-award text-success me-2"></i>Final Examinations</h6>
                            <ul class="list-unstyled small text-muted mb-3">
                                <li>• Mid-term examinations</li>
                                <li>• End-of-term examinations</li>
                                <li>• BECE preparation (Primary 6)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('contact') }}" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>Contact Us for More Information
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
