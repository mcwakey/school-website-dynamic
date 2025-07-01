@extends('layouts.admin')

@section('title', 'Site Management Manual')

@section('content')
<div class="manual-container">
    <!-- Hero Header -->
    <div class="manual-hero mb-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold text-white mb-3">
                            <i class="fas fa-graduation-cap me-3"></i>
                            Website Management Guide
                        </h1>
                        <p class="lead text-white-75 mb-4">
                            Master your Ghana Primary School website with our comprehensive, easy-to-follow guide.
                            From basic updates to advanced customization - we've got you covered!
                        </p>
                        <div class="hero-actions">
                            <a href="#getting-started" class="btn btn-light btn-lg me-3 shadow-lg">
                                <i class="fas fa-rocket me-2"></i>Get Started
                            </a>
                            <button onclick="window.print()" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-print me-2"></i>Print Guide
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="hero-illustration">
                        <div class="floating-card">
                            <i class="fas fa-laptop-code fa-4x text-primary mb-3"></i>
                            <h5 class="text-dark">Easy Management</h5>
                            <p class="text-muted small">Update your website with confidence</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Smart Navigation Cards -->
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5 fw-bold">
                    <span class="text-primary">Choose Your Learning Path</span>
                </h2>
                <div class="row g-4">
                    <!-- Beginner Path -->
                    <div class="col-lg-4">
                        <div class="learning-path-card h-100" data-path="beginner">
                            <div class="card-header-custom bg-success">
                                <i class="fas fa-seedling fa-2x mb-3"></i>
                                <h4 class="text-white mb-2">Beginner</h4>
                                <p class="text-white-75 mb-0">New to website management?</p>
                            </div>
                            <div class="card-body-custom">
                                <ul class="feature-list">
                                    <li><i class="fas fa-check text-success me-2"></i>Getting Started Guide</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Basic Content Updates</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Adding News & Events</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Simple Troubleshooting</li>
                                </ul>
                                <a href="#getting-started" class="btn btn-success w-100 mt-3">
                                    <i class="fas fa-play me-2"></i>Start Here
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Intermediate Path -->
                    <div class="col-lg-4">
                        <div class="learning-path-card h-100" data-path="intermediate">
                            <div class="card-header-custom bg-primary">
                                <i class="fas fa-cogs fa-2x mb-3"></i>
                                <h4 class="text-white mb-2">Intermediate</h4>
                                <p class="text-white-75 mb-0">Ready for more control?</p>
                            </div>
                            <div class="card-body-custom">
                                <ul class="feature-list">
                                    <li><i class="fas fa-check text-primary me-2"></i>Menu Management</li>
                                    <li><i class="fas fa-check text-primary me-2"></i>Content Customization</li>
                                    <li><i class="fas fa-check text-primary me-2"></i>Staff Management</li>
                                    <li><i class="fas fa-check text-primary me-2"></i>Settings Configuration</li>
                                </ul>
                                <a href="#content-management" class="btn btn-primary w-100 mt-3">
                                    <i class="fas fa-arrow-right me-2"></i>Continue Learning
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced Path -->
                    <div class="col-lg-4">
                        <div class="learning-path-card h-100" data-path="advanced">
                            <div class="card-header-custom bg-gradient-custom">
                                <i class="fas fa-magic fa-2x mb-3"></i>
                                <h4 class="text-white mb-2">Advanced</h4>
                                <p class="text-white-75 mb-0">Master the full potential</p>
                            </div>
                            <div class="card-body-custom">
                                <ul class="feature-list">
                                    <li><i class="fas fa-check text-purple me-2"></i>Theme Customization</li>
                                    <li><i class="fas fa-check text-purple me-2"></i>Advanced Settings</li>
                                    <li><i class="fas fa-check text-purple me-2"></i>Custom Menus</li>
                                    <li><i class="fas fa-check text-purple me-2"></i>Performance Tips</li>
                                </ul>
                                <a href="#theme-customization" class="btn btn-gradient-custom w-100 mt-3">
                                    <i class="fas fa-rocket me-2"></i>Go Advanced
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Getting Started Section -->
    <div id="getting-started" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-success">Step 1</span>
                                <h3 class="section-title">
                                    <i class="fas fa-rocket text-success me-3"></i>
                                    Getting Started
                                </h3>
                                <p class="section-subtitle">Your first steps to mastering your website</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="15">
                                    <span>15%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Login Process -->
                        <div class="step-card mb-4">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-success">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Logging Into Your Admin Panel</h5>
                                    <div class="step-content">
                                        <ol class="styled-list">
                                            <li>Navigate to your website URL followed by <code class="code-highlight">/admin</code></li>
                                            <li>Enter your admin credentials (email and password)</li>
                                            <li>Click the <span class="btn-mini btn-success">Login</span> button</li>
                                        </ol>

                                        <div class="info-box bg-warning">
                                            <div class="d-flex">
                                                <i class="fas fa-key fa-2x text-warning me-3"></i>
                                                <div>
                                                    <h6 class="mb-2">Default Admin Credentials</h6>
                                                    <p class="mb-1"><strong>Email:</strong> <code>admin@school.com</code></p>
                                                    <p class="mb-1"><strong>Password:</strong> <code>password123</code></p>
                                                    <small class="text-danger"><strong>Important:</strong> Change these credentials immediately after first login!</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dashboard Overview -->
                        <div class="step-card">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-info">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Understanding Your Dashboard</h5>
                                    <div class="step-content">
                                        <p>Your dashboard is your command center. Here's what you'll find:</p>

                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="feature-item">
                                                    <i class="fas fa-chart-bar text-primary me-2"></i>
                                                    <strong>Statistics Cards:</strong> Quick overview of your content
                                                </div>
                                                <div class="feature-item">
                                                    <i class="fas fa-newspaper text-success me-2"></i>
                                                    <strong>Recent News:</strong> Latest articles and their status
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="feature-item">
                                                    <i class="fas fa-calendar text-info me-2"></i>
                                                    <strong>Upcoming Events:</strong> Scheduled activities
                                                </div>
                                                <div class="feature-item">
                                                    <i class="fas fa-bolt text-warning me-2"></i>
                                                    <strong>Quick Actions:</strong> Fast access to common tasks
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Management Section -->
    <div id="content-management" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-primary">Step 2</span>
                                <h3 class="section-title">
                                    <i class="fas fa-edit text-primary me-3"></i>
                                    Content Management
                                </h3>
                                <p class="section-subtitle">Master dynamic content creation and editing</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="30">
                                    <span>30%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Quick Overview -->
                        <div class="overview-grid mb-4">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="overview-card bg-success-light">
                                        <i class="fas fa-plus-circle fa-2x text-success mb-2"></i>
                                        <h6>Create Content</h6>
                                        <p class="small text-muted">Add new pages and sections</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="overview-card bg-warning-light">
                                        <i class="fas fa-edit fa-2x text-warning mb-2"></i>
                                        <h6>Edit Existing</h6>
                                        <p class="small text-muted">Update current content</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="overview-card bg-info-light">
                                        <i class="fas fa-search fa-2x text-info mb-2"></i>
                                        <h6>Find Content</h6>
                                        <p class="small text-muted">Locate specific sections</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="overview-card bg-purple-light">
                                        <i class="fas fa-magic fa-2x text-purple mb-2"></i>
                                        <h6>Use Templates</h6>
                                        <p class="small text-muted">Quick content creation</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Adding New Content -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-success">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Creating New Content</h5>
                                    <div class="step-content">
                                        <div class="process-flow mb-3">
                                            <div class="flow-step active">
                                                <span class="flow-number">1</span>
                                                <span class="flow-text">Navigate to Page Content</span>
                                            </div>
                                            <div class="flow-arrow">→</div>
                                            <div class="flow-step">
                                                <span class="flow-number">2</span>
                                                <span class="flow-text">Click Add New Content</span>
                                            </div>
                                            <div class="flow-arrow">→</div>
                                            <div class="flow-step">
                                                <span class="flow-number">3</span>
                                                <span class="flow-text">Fill Content Form</span>
                                            </div>
                                            <div class="flow-arrow">→</div>
                                            <div class="flow-step">
                                                <span class="flow-number">4</span>
                                                <span class="flow-text">Save & Publish</span>
                                            </div>
                                        </div>

                                        <div class="form-preview">
                                            <h6 class="mb-3"><i class="fas fa-form me-2"></i>Content Form Fields</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-field-demo">
                                                        <label class="form-label-demo">Page Selection</label>
                                                        <select class="form-control-demo" disabled>
                                                            <option>Home, About, Contact, etc.</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-field-demo">
                                                        <label class="form-label-demo">Section</label>
                                                        <select class="form-control-demo" disabled>
                                                            <option>Hero, Features, Testimonials, etc.</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-field-demo">
                                                        <label class="form-label-demo">Content Title</label>
                                                        <input type="text" class="form-control-demo" placeholder="Enter your content title..." disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-field-demo">
                                                        <label class="form-label-demo">Content Body</label>
                                                        <textarea class="form-control-demo" rows="3" placeholder="Enter your content here... HTML allowed" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="template-showcase mt-4">
                                            <h6><i class="fas fa-magic text-purple me-2"></i>Quick Templates</h6>
                                            <div class="row g-2">
                                                <div class="col-md-3">
                                                    <div class="template-card">
                                                        <i class="fas fa-star text-warning"></i>
                                                        <span>Hero Section</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="template-card">
                                                        <i class="fas fa-heart text-danger"></i>
                                                        <span>Feature Item</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="template-card">
                                                        <i class="fas fa-quote-left text-info"></i>
                                                        <span>Testimonial</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="template-card">
                                                        <i class="fas fa-envelope text-success"></i>
                                                        <span>Contact Info</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Editing Content -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-warning">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Editing Existing Content</h5>
                                    <div class="step-content">
                                        <div class="editing-tips">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="tip-card">
                                                        <i class="fas fa-search text-primary me-2"></i>
                                                        <strong>Finding Content</strong>
                                                        <ul class="mt-2">
                                                            <li>Use page filters to narrow down</li>
                                                            <li>Search by content title or text</li>
                                                            <li>Sort by creation date or section</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="tip-card">
                                                        <i class="fas fa-pencil-alt text-success me-2"></i>
                                                        <strong>Quick Edit Tips</strong>
                                                        <ul class="mt-2">
                                                            <li>Make small changes incrementally</li>
                                                            <li>Preview changes before saving</li>
                                                            <li>Keep backup copies of important content</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Types Reference -->
                        <div class="reference-table">
                            <h5 class="mb-3"><i class="fas fa-table text-info me-2"></i>Content Types Reference</h5>
                            <div class="table-responsive">
                                <table class="modern-table">
                                    <thead>
                                        <tr>
                                            <th><i class="fas fa-tag me-2"></i>Content Type</th>
                                            <th><i class="fas fa-key me-2"></i>Example Key</th>
                                            <th><i class="fas fa-bullseye me-2"></i>Usage</th>
                                            <th><i class="fas fa-eye me-2"></i>Example</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="type-badge bg-primary">Hero Section</span></td>
                                            <td><code class="code-highlight">hero_title</code></td>
                                            <td>Main page headlines</td>
                                            <td><em>"Welcome to Ghana Primary School"</em></td>
                                        </tr>
                                        <tr>
                                            <td><span class="type-badge bg-success">Welcome Message</span></td>
                                            <td><code class="code-highlight">welcome_text</code></td>
                                            <td>Introduction text</td>
                                            <td><em>"Excellence in education since 1995"</em></td>
                                        </tr>
                                        <tr>
                                            <td><span class="type-badge bg-info">Mission Statement</span></td>
                                            <td><code class="code-highlight">mission_statement</code></td>
                                            <td>About page content</td>
                                            <td><em>"To provide quality education..."</em></td>
                                        </tr>
                                        <tr>
                                            <td><span class="type-badge bg-warning">Contact Info</span></td>
                                            <td><code class="code-highlight">contact_address</code></td>
                                            <td>Contact details</td>
                                            <td><em>"123 Education Street, Accra"</em></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Management Section -->
    <div id="menu-management" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-info">Step 3</span>
                                <h3 class="section-title">
                                    <i class="fas fa-bars text-info me-3"></i>
                                    Menu Management
                                </h3>
                                <p class="section-subtitle">Design perfect navigation for your visitors</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="45">
                                    <span>45%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Menu Types Overview -->
                        <div class="menu-types-showcase mb-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="menu-demo-card header-menu">
                                        <div class="demo-header">
                                            <i class="fas fa-bars text-info fa-2x mb-3"></i>
                                            <h5>Header Navigation</h5>
                                            <p class="text-muted">Main navigation at the top of your website</p>
                                        </div>
                                        <div class="demo-menu">
                                            <div class="menu-item-demo active">Home</div>
                                            <div class="menu-item-demo">About</div>
                                            <div class="menu-item-demo dropdown">
                                                Programs ▼
                                                <div class="submenu-demo">
                                                    <div>Primary Education</div>
                                                    <div>After School</div>
                                                </div>
                                            </div>
                                            <div class="menu-item-demo">Contact</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="menu-demo-card footer-menu">
                                        <div class="demo-header">
                                            <i class="fas fa-link text-secondary fa-2x mb-3"></i>
                                            <h5>Footer Navigation</h5>
                                            <p class="text-muted">Quick links at the bottom of pages</p>
                                        </div>
                                        <div class="demo-footer">
                                            <div class="footer-links">
                                                <a href="#">Privacy Policy</a>
                                                <a href="#">Terms of Service</a>
                                                <a href="#">Contact Us</a>
                                                <a href="#">Site Map</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Add Method -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-success">
                                        <i class="fas fa-magic"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Quick Add Method (Recommended for Beginners)</h5>
                                    <div class="step-content">
                                        <div class="quick-add-demo">
                                            <div class="demo-interface">
                                                <h6 class="mb-3">Quick Add Common Links</h6>
                                                <div class="quick-buttons">
                                                    <button class="quick-btn home">
                                                        <i class="fas fa-home"></i>
                                                        Add Home
                                                    </button>
                                                    <button class="quick-btn about">
                                                        <i class="fas fa-info-circle"></i>
                                                        Add About
                                                    </button>
                                                    <button class="quick-btn contact">
                                                        <i class="fas fa-envelope"></i>
                                                        Add Contact
                                                    </button>
                                                    <button class="quick-btn privacy">
                                                        <i class="fas fa-shield-alt"></i>
                                                        Add Privacy
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="method-benefits mt-3">
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <div class="benefit-item">
                                                        <i class="fas fa-clock text-success"></i>
                                                        <span>Instant Setup</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="benefit-item">
                                                        <i class="fas fa-check text-success"></i>
                                                        <span>Pre-configured</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="benefit-item">
                                                        <i class="fas fa-user-friendly text-success"></i>
                                                        <span>Beginner Friendly</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Manual Creation Method -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-primary">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Manual Creation (Advanced Control)</h5>
                                    <div class="step-content">
                                        <div class="creation-wizard">
                                            <div class="wizard-steps">
                                                <div class="wizard-step completed">
                                                    <div class="step-circle">1</div>
                                                    <div class="step-label">Click Add Menu Item</div>
                                                </div>
                                                <div class="wizard-connector"></div>
                                                <div class="wizard-step completed">
                                                    <div class="step-circle">2</div>
                                                    <div class="step-label">Choose Location</div>
                                                </div>
                                                <div class="wizard-connector"></div>
                                                <div class="wizard-step active">
                                                    <div class="step-circle">3</div>
                                                    <div class="step-label">Fill Form Details</div>
                                                </div>
                                                <div class="wizard-connector"></div>
                                                <div class="wizard-step">
                                                    <div class="step-circle">4</div>
                                                    <div class="step-label">Save Menu Item</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-breakdown mt-4">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="field-explanation">
                                                        <h6><i class="fas fa-map-marker-alt text-danger me-2"></i>Location</h6>
                                                        <p class="small text-muted">Choose Header Menu (top navigation) or Footer Menu (bottom links)</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-explanation">
                                                        <h6><i class="fas fa-tag text-warning me-2"></i>Display Label</h6>
                                                        <p class="small text-muted">The text visitors will see (e.g., "About Us", "Contact")</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-explanation">
                                                        <h6><i class="fas fa-link text-info me-2"></i>URL</h6>
                                                        <p class="small text-muted">Where the link goes (e.g., "/about", "https://example.com")</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-explanation">
                                                        <h6><i class="fas fa-icons text-purple me-2"></i>Icon (Optional)</h6>
                                                        <p class="small text-muted">FontAwesome icon class (e.g., "fas fa-home")</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sub-menus Creation -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-warning">
                                        <i class="fas fa-sitemap"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Creating Dropdown Sub-Menus</h5>
                                    <div class="step-content">
                                        <div class="submenu-example">
                                            <div class="submenu-structure">
                                                <div class="parent-menu">
                                                    <i class="fas fa-home me-2"></i>About Us
                                                    <div class="submenu-items">
                                                        <div class="submenu-item">
                                                            <i class="fas fa-arrow-right me-2"></i>Our History
                                                        </div>
                                                        <div class="submenu-item">
                                                            <i class="fas fa-arrow-right me-2"></i>Mission & Vision
                                                        </div>
                                                        <div class="submenu-item">
                                                            <i class="fas fa-arrow-right me-2"></i>School Leadership
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="submenu-instructions mt-3">
                                            <div class="instruction-flow">
                                                <div class="flow-item">
                                                    <span class="flow-num">1</span>
                                                    <span>Create the main menu item (parent)</span>
                                                </div>
                                                <div class="flow-item">
                                                    <span class="flow-num">2</span>
                                                    <span>Create a new menu item for the sub-menu</span>
                                                </div>
                                                <div class="flow-item">
                                                    <span class="flow-num">3</span>
                                                    <span>Select the parent item in "Parent Menu" dropdown</span>
                                                </div>
                                                <div class="flow-item">
                                                    <span class="flow-num">4</span>
                                                    <span>Sub-menu appears as dropdown under parent</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Organization Tips -->
                        <div class="organization-tips">
                            <h5 class="mb-3"><i class="fas fa-sort text-success me-2"></i>Menu Organization Best Practices</h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="tip-card modern">
                                        <div class="tip-header">
                                            <i class="fas fa-sort-numeric-down text-info"></i>
                                            <h6>Sort Order</h6>
                                        </div>
                                        <ul class="tip-list">
                                            <li>Use increments of 10 (10, 20, 30, 40)</li>
                                            <li>Leave gaps for future insertions</li>
                                            <li>Lower numbers appear first</li>
                                            <li>Quick-added items get order 99</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tip-card modern">
                                        <div class="tip-header">
                                            <i class="fas fa-toggle-on text-success"></i>
                                            <h6>Active Status</h6>
                                        </div>
                                        <ul class="tip-list">
                                            <li><strong>Active:</strong> Visible to all visitors</li>
                                            <li><strong>Inactive:</strong> Hidden but not deleted</li>
                                            <li>Use inactive to temporarily hide menus</li>
                                            <li>Perfect for seasonal content</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Theme Customization Section -->
    <div id="theme-customization" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-gradient-custom">Step 4</span>
                                <h3 class="section-title">
                                    <i class="fas fa-palette text-purple me-3"></i>
                                    Theme & Design Customization
                                </h3>
                                <p class="section-subtitle">Transform your website's visual identity</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="60">
                                    <span>60%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Theme Elements Overview -->
                        <div class="theme-elements-grid mb-4">
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="theme-element-card colors">
                                        <div class="element-icon">
                                            <i class="fas fa-palette fa-2x"></i>
                                        </div>
                                        <h6>Colors</h6>
                                        <div class="color-preview">
                                            <div class="color-dot primary"></div>
                                            <div class="color-dot secondary"></div>
                                            <div class="color-dot accent"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="theme-element-card typography">
                                        <div class="element-icon">
                                            <i class="fas fa-font fa-2x"></i>
                                        </div>
                                        <h6>Typography</h6>
                                        <div class="font-preview">
                                            <div class="font-sample heading">Heading</div>
                                            <div class="font-sample body">Body Text</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="theme-element-card branding">
                                        <div class="element-icon">
                                            <i class="fas fa-image fa-2x"></i>
                                        </div>
                                        <h6>Branding</h6>
                                        <div class="logo-preview">
                                            <div class="logo-placeholder">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="theme-element-card layout">
                                        <div class="element-icon">
                                            <i class="fas fa-th-large fa-2x"></i>
                                        </div>
                                        <h6>Layout</h6>
                                        <div class="layout-preview">
                                            <div class="layout-grid">
                                                <div class="grid-item header"></div>
                                                <div class="grid-item content"></div>
                                                <div class="grid-item sidebar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Color Customization -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-gradient-custom">
                                        <i class="fas fa-paint-brush"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Color Scheme Customization</h5>
                                    <div class="step-content">
                                        <div class="color-customization-demo">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="color-section">
                                                        <h6><i class="fas fa-circle text-primary me-2"></i>Primary Color</h6>
                                                        <p class="text-muted small">Main brand color for buttons, links, and highlights</p>
                                                        <div class="color-picker-demo">
                                                            <div class="color-input">
                                                                <div class="color-swatch" style="background: #007bff;"></div>
                                                                <span class="color-code">#007bff</span>
                                                            </div>
                                                            <div class="color-usage">
                                                                <span class="usage-example btn-example">Button</span>
                                                                <span class="usage-example link-example">Link</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="color-section">
                                                        <h6><i class="fas fa-circle text-success me-2"></i>Secondary Color</h6>
                                                        <p class="text-muted small">Accent color for secondary elements</p>
                                                        <div class="color-picker-demo">
                                                            <div class="color-input">
                                                                <div class="color-swatch" style="background: #28a745;"></div>
                                                                <span class="color-code">#28a745</span>
                                                            </div>
                                                            <div class="color-usage">
                                                                <span class="usage-example success-example">Success</span>
                                                                <span class="usage-example badge-example">Badge</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="color-tips mt-4">
                                            <div class="tips-grid">
                                                <div class="tip-item">
                                                    <i class="fas fa-eye text-info"></i>
                                                    <span>Ensure good contrast for readability</span>
                                                </div>
                                                <div class="tip-item">
                                                    <i class="fas fa-school text-warning"></i>
                                                    <span>Use your school's official colors</span>
                                                </div>
                                                <div class="tip-item">
                                                    <i class="fas fa-mobile-alt text-success"></i>
                                                    <span>Test on different devices</span>
                                                </div>
                                                <div class="tip-item">
                                                    <i class="fas fa-preview text-purple"></i>
                                                    <span>Use preview to see changes live</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Typography Settings -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-info">
                                        <i class="fas fa-font"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Typography & Font Settings</h5>
                                    <div class="step-content">
                                        <div class="typography-demo">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="font-family-section">
                                                        <h6><i class="fas fa-heading text-primary me-2"></i>Heading Font</h6>
                                                        <div class="font-selector">
                                                            <select class="form-control-demo" disabled>
                                                                <option>Poppins (Modern & Clean)</option>
                                                                <option>Montserrat (Professional)</option>
                                                                <option>Open Sans (Friendly)</option>
                                                                <option>Roboto (Tech-friendly)</option>
                                                            </select>
                                                        </div>
                                                        <div class="font-sample-large">
                                                            Ghana Primary School
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="font-family-section">
                                                        <h6><i class="fas fa-paragraph text-success me-2"></i>Body Font</h6>
                                                        <div class="font-selector">
                                                            <select class="form-control-demo" disabled>
                                                                <option>Inter (Modern Reading)</option>
                                                                <option>Source Sans Pro (Clean)</option>
                                                                <option>Lato (Warm & Friendly)</option>
                                                                <option>Nunito Sans (Rounded)</option>
                                                            </select>
                                                        </div>
                                                        <div class="font-sample-body">
                                                            Welcome to our school! We provide excellent education for children in a nurturing environment that fosters growth and learning.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="font-size-controls mt-4">
                                            <h6><i class="fas fa-text-height text-warning me-2"></i>Font Size Controls</h6>
                                            <div class="size-grid">
                                                <div class="size-control">
                                                    <label>Base Size</label>
                                                    <div class="size-slider">
                                                        <span class="size-value">16px</span>
                                                    </div>
                                                </div>
                                                <div class="size-control">
                                                    <label>Heading Scale</label>
                                                    <div class="size-slider">
                                                        <span class="size-value">1.25x</span>
                                                    </div>
                                                </div>
                                                <div class="size-control">
                                                    <label>Line Height</label>
                                                    <div class="size-slider">
                                                        <span class="size-value">1.6</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Logo & Branding -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-warning">
                                        <i class="fas fa-image"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Logo & Brand Assets</h5>
                                    <div class="step-content">
                                        <div class="branding-section">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="logo-upload-demo">
                                                        <h6><i class="fas fa-upload text-primary me-2"></i>Upload School Logo</h6>
                                                        <div class="upload-area">
                                                            <div class="upload-placeholder">
                                                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                                                <p class="text-muted">Drag & drop your logo here</p>
                                                                <div class="btn btn-outline-primary btn-sm">Browse Files</div>
                                                            </div>
                                                        </div>
                                                        <div class="upload-specs">
                                                            <small class="text-muted">
                                                                <i class="fas fa-info-circle me-1"></i>
                                                                Recommended: 200x80px, PNG with transparent background
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="logo-preview-demo">
                                                        <h6><i class="fas fa-eye text-success me-2"></i>Preview Placements</h6>
                                                        <div class="preview-scenarios">
                                                            <div class="scenario header-preview">
                                                                <span class="scenario-label">Header</span>
                                                                <div class="mock-header">
                                                                    <div class="mock-logo">
                                                                        <i class="fas fa-graduation-cap"></i>
                                                                    </div>
                                                                    <div class="mock-nav">
                                                                        <span>Home</span>
                                                                        <span>About</span>
                                                                        <span>Contact</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="scenario footer-preview">
                                                                <span class="scenario-label">Footer</span>
                                                                <div class="mock-footer">
                                                                    <div class="mock-logo-small">
                                                                        <i class="fas fa-graduation-cap"></i>
                                                                    </div>
                                                                    <div class="mock-footer-text">
                                                                        <small>© 2025 Ghana Primary School</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="branding-assets mt-4">
                                            <h6><i class="fas fa-images text-info me-2"></i>Additional Brand Assets</h6>
                                            <div class="assets-grid">
                                                <div class="asset-item">
                                                    <i class="fas fa-bookmark"></i>
                                                    <span>Favicon</span>
                                                    <small>32x32px ICO/PNG</small>
                                                </div>
                                                <div class="asset-item">
                                                    <i class="fas fa-mobile-alt"></i>
                                                    <span>Mobile Icon</span>
                                                    <small>180x180px PNG</small>
                                                </div>
                                                <div class="asset-item">
                                                    <i class="fas fa-share-alt"></i>
                                                    <span>Social Media</span>
                                                    <small>1200x630px PNG</small>
                                                </div>
                                                <div class="asset-item">
                                                    <i class="fas fa-print"></i>
                                                    <span>Print Materials</span>
                                                    <small>High-res formats</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Advanced Settings -->
                        <div class="advanced-settings">
                            <h5 class="mb-3"><i class="fas fa-cogs text-secondary me-2"></i>Advanced Theme Settings</h5>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="setting-card">
                                        <div class="setting-header">
                                            <i class="fas fa-adjust text-primary"></i>
                                            <h6>Dark Mode</h6>
                                        </div>
                                        <p class="small text-muted">Enable dark theme option for users</p>
                                        <div class="toggle-demo">
                                            <span class="toggle-switch"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="setting-card">
                                        <div class="setting-header">
                                            <i class="fas fa-paint-roller text-success"></i>
                                            <h6>Custom CSS</h6>
                                        </div>
                                        <p class="small text-muted">Add custom styling code</p>
                                        <div class="code-editor-demo">
                                            <code>/* Custom styles */</code>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="setting-card">
                                        <div class="setting-header">
                                            <i class="fas fa-undo text-warning"></i>
                                            <h6>Reset Theme</h6>
                                        </div>
                                        <p class="small text-muted">Restore default settings</p>
                                        <button class="btn btn-outline-danger btn-sm">Reset All</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News & Events Section -->
    <div id="news-events" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-warning">Step 5</span>
                                <h3 class="section-title">
                                    <i class="fas fa-newspaper text-warning me-3"></i>
                                    News & Events Management
                                </h3>
                                <p class="section-subtitle">Keep your community informed and engaged</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="70">
                                    <span>70%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Content Types Overview -->
                        <div class="content-types-grid mb-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="content-type-card news-card">
                                        <div class="type-header">
                                            <i class="fas fa-newspaper fa-3x text-warning mb-3"></i>
                                            <h5>News Articles</h5>
                                            <p class="text-muted">Share updates, achievements, and important announcements</p>
                                        </div>
                                        <div class="type-features">
                                            <div class="feature-badge">Featured Images</div>
                                            <div class="feature-badge">Rich Text Editor</div>
                                            <div class="feature-badge">Category Tags</div>
                                            <div class="feature-badge">Publication Control</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-type-card events-card">
                                        <div class="type-header">
                                            <i class="fas fa-calendar-alt fa-3x text-info mb-3"></i>
                                            <h5>Events</h5>
                                            <p class="text-muted">Promote upcoming activities, meetings, and special occasions</p>
                                        </div>
                                        <div class="type-features">
                                            <div class="feature-badge">Date & Time</div>
                                            <div class="feature-badge">Location Details</div>
                                            <div class="feature-badge">RSVP Tracking</div>
                                            <div class="feature-badge">Recurring Events</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Creating News Articles -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-warning">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Creating News Articles</h5>
                                    <div class="step-content">
                                        <div class="creation-workflow mb-4">
                                            <div class="workflow-steps">
                                                <div class="workflow-step">
                                                    <div class="step-number">1</div>
                                                    <div class="step-info">
                                                        <h6>Navigate to News</h6>
                                                        <p>Click "News" in the admin sidebar</p>
                                                    </div>
                                                </div>
                                                <div class="workflow-arrow">→</div>
                                                <div class="workflow-step">
                                                    <div class="step-number">2</div>
                                                    <div class="step-info">
                                                        <h6>Add New Article</h6>
                                                        <p>Click the "Add News" button</p>
                                                    </div>
                                                </div>
                                                <div class="workflow-arrow">→</div>
                                                <div class="workflow-step">
                                                    <div class="step-number">3</div>
                                                    <div class="step-info">
                                                        <h6>Complete Form</h6>
                                                        <p>Fill in all required details</p>
                                                    </div>
                                                </div>
                                                <div class="workflow-arrow">→</div>
                                                <div class="workflow-step">
                                                    <div class="step-number">4</div>
                                                    <div class="step-info">
                                                        <h6>Publish</h6>
                                                        <p>Save and make it live</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-fields-guide">
                                            <h6 class="mb-3"><i class="fas fa-form me-2"></i>News Article Form Fields</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="field-guide-item">
                                                        <div class="field-label">
                                                            <i class="fas fa-heading text-primary me-2"></i>
                                                            <strong>Title</strong>
                                                            <span class="required-badge">Required</span>
                                                        </div>
                                                        <p class="field-description">Clear, engaging headline that summarizes your news</p>
                                                        <div class="field-example">
                                                            <small class="text-muted">Example: "Students Excel in Regional Science Fair 2024"</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-guide-item">
                                                        <div class="field-label">
                                                            <i class="fas fa-image text-success me-2"></i>
                                                            <strong>Featured Image</strong>
                                                            <span class="optional-badge">Optional</span>
                                                        </div>
                                                        <p class="field-description">Eye-catching image to accompany your article</p>
                                                        <div class="field-tips">
                                                            <small class="text-info">Tips: Use high-quality images, 800x600px recommended</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="field-guide-item">
                                                        <div class="field-label">
                                                            <i class="fas fa-align-left text-warning me-2"></i>
                                                            <strong>Content</strong>
                                                            <span class="required-badge">Required</span>
                                                        </div>
                                                        <p class="field-description">The main body of your news article with rich formatting options</p>
                                                        <div class="editor-features">
                                                            <div class="feature-tag">Bold & Italic</div>
                                                            <div class="feature-tag">Lists</div>
                                                            <div class="feature-tag">Links</div>
                                                            <div class="feature-tag">Images</div>
                                                            <div class="feature-tag">Headings</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="best-practices mt-4">
                                            <h6><i class="fas fa-lightbulb text-warning me-2"></i>News Writing Best Practices</h6>
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <div class="practice-card">
                                                        <i class="fas fa-eye text-primary"></i>
                                                        <h6>Engaging Headlines</h6>
                                                        <ul class="small">
                                                            <li>Keep titles under 60 characters</li>
                                                            <li>Use action words</li>
                                                            <li>Highlight achievements</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="practice-card">
                                                        <i class="fas fa-image text-success"></i>
                                                        <h6>Visual Content</h6>
                                                        <ul class="small">
                                                            <li>Include relevant photos</li>
                                                            <li>Add captions to images</li>
                                                            <li>Use school event photos</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="practice-card">
                                                        <i class="fas fa-clock text-info"></i>
                                                        <h6>Timing</h6>
                                                        <ul class="small">
                                                            <li>Post news promptly</li>
                                                            <li>Update regularly</li>
                                                            <li>Archive old news</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Managing Events -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-info">
                                        <i class="fas fa-calendar-plus"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Managing Events</h5>
                                    <div class="step-content">
                                        <div class="event-types-showcase mb-4">
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <div class="event-type-demo academic">
                                                        <i class="fas fa-graduation-cap"></i>
                                                        <span>Academic Events</span>
                                                        <small>Exams, graduations, parent meetings</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="event-type-demo sports">
                                                        <i class="fas fa-futbol"></i>
                                                        <span>Sports Events</span>
                                                        <small>Games, tournaments, sports days</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="event-type-demo cultural">
                                                        <i class="fas fa-theater-masks"></i>
                                                        <span>Cultural Events</span>
                                                        <small>Performances, festivals, celebrations</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="event-type-demo general">
                                                        <i class="fas fa-calendar"></i>
                                                        <span>General Events</span>
                                                        <small>Meetings, workshops, fundraisers</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="event-form-guide">
                                            <h6 class="mb-3"><i class="fas fa-calendar-edit me-2"></i>Event Details Required</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="detail-item">
                                                        <i class="fas fa-clock text-primary me-2"></i>
                                                        <strong>Date & Time:</strong> When the event takes place
                                                    </div>
                                                    <div class="detail-item">
                                                        <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                                        <strong>Location:</strong> Where the event will be held
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="detail-item">
                                                        <i class="fas fa-users text-success me-2"></i>
                                                        <strong>Target Audience:</strong> Who should attend
                                                    </div>
                                                    <div class="detail-item">
                                                        <i class="fas fa-info-circle text-info me-2"></i>
                                                        <strong>Description:</strong> Event details and agenda
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="recurring-events mt-4">
                                            <div class="feature-highlight">
                                                <h6><i class="fas fa-repeat text-purple me-2"></i>Recurring Events Feature</h6>
                                                <p>Perfect for regular activities like weekly assemblies, monthly parent meetings, or annual celebrations.</p>
                                                <div class="recurrence-options">
                                                    <span class="option-badge">Daily</span>
                                                    <span class="option-badge">Weekly</span>
                                                    <span class="option-badge">Monthly</span>
                                                    <span class="option-badge">Yearly</span>
                                                    <span class="option-badge">Custom</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Organization -->
                        <div class="organization-methods">
                            <h5 class="mb-3"><i class="fas fa-sort text-secondary me-2"></i>Organizing Your Content</h5>
                            <
                                <div class="col-md-6">
                                    <div class="organization-card">
                                        <div class="org-header">
                                            <i class="fas fa-tags text-warning"></i>
                                            <h6>Categories & Tags</h6>
                                        </div>
                                        <div class="org-content">
                                            <p>Group related content for easy navigation:</p>
                                            <div class="tag-examples">
                                                <span class="tag-demo academic">Academic</span>
                                                <span class="tag-demo sports">Sports</span>
                                                <span class="tag-demo announcement">Announcements</span>
                                                <span class="tag-demo achievement">Achievements</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="organization-card">
                                        <div class="org-header">
                                            <i class="fas fa-filter text-info"></i>
                                            <h6>Smart Filtering</h6>
                                        </div>
                                        <div class="org-content">
                                            <p>Help visitors find content quickly:</p>
                                            <div class="filter-options">
                                                <div class="filter-item">📅 By Date</div>
                                                <div class="filter-item">🏷️ By Category</div>
                                                <div class="filter-item">🔍 By Search</div>
                                                <div class="filter-item">⭐ Featured Only</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Staff Management Section -->
    <div id="staff-management" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-secondary">Step 6</span>
                                <h3 class="section-title">
                                    <i class="fas fa-users text-secondary me-3"></i>
                                    Staff Management
                                </h3>
                                <p class="section-subtitle">Manage your school's faculty and staff profiles</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="80">
                                    <span>80%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Staff Categories Overview -->
                        <div class="staff-categories-grid mb-4">
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="staff-category-card admin">
                                        <div class="category-icon">
                                            <i class="fas fa-user-tie fa-2x text-primary"></i>
                                        </div>
                                        <h6>Administration</h6>
                                        <p class="text-muted">Principal, Vice Principal, Office Staff</p>
                                        <div class="category-badge">Leadership</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="staff-category-card teachers">
                                        <div class="category-icon">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-success"></i>
                                        </div>
                                        <h6>Teachers</h6>
                                        <p class="text-muted">Class Teachers, Subject Specialists</p>
                                        <div class="category-badge">Academic</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="staff-category-card support">
                                        <div class="category-icon">
                                            <i class="fas fa-hands-helping fa-2x text-warning"></i>
                                        </div>
                                        <h6>Support Staff</h6>
                                        <p class="text-muted">Librarians, IT Support, Counselors</p>
                                        <div class="category-badge">Support</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="staff-category-card operations">
                                        <div class="category-icon">
                                            <i class="fas fa-tools fa-2x text-info"></i>
                                        </div>
                                        <h6>Operations</h6>
                                        <p class="text-muted">Maintenance, Security, Cleaners</p>
                                        <div class="category-badge">Operations</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Adding Staff Members -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-success">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Adding Staff Members</h5>
                                    <div class="step-content">
                                        <div class="creation-workflow mb-4">
                                            <div class="workflow-steps">
                                                <div class="workflow-step">
                                                    <div class="step-number">1</div>
                                                    <div class="step-info">
                                                        <h6>Access Staff Section</h6>
                                                        <p>Navigate to "Staff" in admin menu</p>
                                                    </div>
                                                </div>
                                                <div class="workflow-arrow">→</div>
                                                <div class="workflow-step">
                                                    <div class="step-number">2</div>
                                                    <div class="step-info">
                                                        <h6>Add New Member</h6>
                                                        <p>Click "Add Staff Member" button</p>
                                                    </div>
                                                </div>
                                                <div class="workflow-arrow">→</div>
                                                <div class="workflow-step">
                                                    <div class="step-number">3</div>
                                                    <div class="step-info">
                                                        <h6>Complete Profile</h6>
                                                        <p>Fill all required information</p>
                                                    </div>
                                                </div>
                                                <div class="workflow-arrow">→</div>
                                                <div class="workflow-step">
                                                    <div class="step-number">4</div>
                                                    <div class="step-info">
                                                        <h6>Save & Publish</h6>
                                                        <p>Review and make profile live</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-fields-guide">
                                            <h6 class="mb-3"><i class="fas fa-user-edit me-2"></i>Staff Profile Form Fields</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="field-guide-item">
                                                        <div class="field-label">
                                                            <i class="fas fa-id-card text-primary me-2"></i>
                                                            <strong>Full Name</strong>
                                                            <span class="required-badge">Required</span>
                                                        </div>
                                                        <p class="field-description">Complete name including titles (Mr., Mrs., Dr.)</p>
                                                        <div class="field-example">
                                                            <small class="text-muted">Example: "Dr. Sarah Mensah"</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-guide-item">
                                                        <div class="field-label">
                                                            <i class="fas fa-briefcase text-success me-2"></i>
                                                            <strong>Position/Title</strong>
                                                            <span class="required-badge">Required</span>
                                                        </div>
                                                        <p class="field-description">Official job title or role</p>
                                                        <div class="field-example">
                                                            <small class="text-muted">Example: "Mathematics Teacher", "Principal"</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-guide-item">
                                                        <div class="field-label">
                                                            <i class="fas fa-building text-warning me-2"></i>
                                                            <strong>Department</strong>
                                                            <span class="optional-badge">Optional</span>
                                                        </div>
                                                        <p class="field-description">Teaching subject or administrative area</p>
                                                        <div class="field-tips">
                                                            <small class="text-info">Helps organize staff by specialization</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-guide-item">
                                                        <div class="field-label">
                                                            <i class="fas fa-camera text-danger me-2"></i>
                                                            <strong>Profile Photo</strong>
                                                            <span class="recommended-badge">Recommended</span>
                                                        </div>
                                                        <p class="field-description">Professional headshot photo</p>
                                                        <div class="photo-requirements">
                                                            <div class="req-item">📐 Square format (1:1)</div>
                                                            <div class="req-item">💡 Good lighting</div>
                                                            <div class="req-item">📊 Under 2MB</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="field-guide-item">
                                                        <div class="field-label">
                                                            <i class="fas fa-user-graduate text-info me-2"></i>
                                                            <strong>Biography</strong>
                                                            <span class="optional-badge">Optional</span>
                                                        </div>
                                                        <p class="field-description">Background, qualifications, and achievements</p>
                                                        <div class="bio-suggestions">
                                                            <span class="suggestion-tag">Education</span>
                                                            <span class="suggestion-tag">Experience</span>
                                                            <span class="suggestion-tag">Specializations</span>
                                                            <span class="suggestion-tag">Achievements</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="photo-guidelines mt-4">
                                            <div class="guidelines-card">
                                                <h6><i class="fas fa-camera-retro text-primary me-2"></i>Professional Photo Guidelines</h6>
                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <div class="guideline-item">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                            <div class="guideline-content">
                                                                <strong>Good Practices</strong>
                                                                <ul class="small mt-2">
                                                                    <li>Professional attire</li>
                                                                    <li>Neutral background</li>
                                                                    <li>Clear facial features</li>
                                                                    <li>Consistent lighting</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="guideline-item">
                                                            <i class="fas fa-exclamation-triangle text-warning"></i>
                                                            <div class="guideline-content">
                                                                <strong>Avoid</strong>
                                                                <ul class="small mt-2">
                                                                    <li>Blurry or low-quality images</li>
                                                                    <li>Distracting backgrounds</li>
                                                                    <li>Poor lighting/shadows</li>
                                                                    <li>Casual or inappropriate attire</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="guideline-item">
                                                            <i class="fas fa-lightbulb text-info"></i>
                                                            <div class="guideline-content">
                                                                <strong>Tips</strong>
                                                                <ul class="small mt-2">
                                                                    <li>Use natural lighting when possible</li>
                                                                    <li>Maintain consistent style across staff</li>
                                                                    <li>Update photos periodically</li>
                                                                    <li>Consider school branding colors</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Staff Organization -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-warning">
                                        <i class="fas fa-sort"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Organizing Staff Display</h5>
                                    <div class="step-content">
                                        <div class="organization-methods">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="method-card">
                                                        <div class="method-header">
                                                            <i class="fas fa-layer-group text-primary"></i>
                                                            <h6>Hierarchy Structure</h6>
                                                        </div>
                                                        <div class="method-content">
                                                            <div class="hierarchy-demo">
                                                                <div class="hierarchy-level level-1">
                                                                    <span class="level-label">1.</span>
                                                                    <span class="level-title">Principal/Head Teacher</span>
                                                                </div>
                                                                <div class="hierarchy-level level-2">
                                                                    <span class="level-label">2.</span>
                                                                    <span class="level-title">Vice Principal/Deputy</span>
                                                                </div>
                                                                <div class="hierarchy-level level-3">
                                                                    <span class="level-label">3.</span>
                                                                    <span class="level-title">Department Heads</span>
                                                                </div>
                                                                <div class="hierarchy-level level-4">
                                                                    <span class="level-label">4.</span>
                                                                    <span class="level-title">Teachers & Staff</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="method-card">
                                                        <div class="method-header">
                                                            <i class="fas fa-tags text-success"></i>
                                                            <h6>Department Groups</h6>
                                                        </div>
                                                        <div class="method-content">
                                                            <div class="department-showcase">
                                                                <div class="dept-group admin">
                                                                    <i class="fas fa-user-tie"></i>
                                                                    <span>Administration</span>
                                                                </div>
                                                                <div class="dept-group primary">
                                                                    <i class="fas fa-child"></i>
                                                                    <span>Primary Teachers</span>
                                                                </div>
                                                                <div class="dept-group specialist">
                                                                    <i class="fas fa-graduation-cap"></i>
                                                                    <span>Subject Specialists</span>
                                                                </div>
                                                                <div class="dept-group support">
                                                                    <i class="fas fa-hands-helping"></i>
                                                                    <span>Support Staff</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="display-options mt-4">
                                            <h6><i class="fas fa-eye text-info me-2"></i>Display Options</h6>
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <div class="option-card">
                                                        <i class="fas fa-list"></i>
                                                        <h6>List View</h6>
                                                        <p class="small">Detailed list with photos and descriptions</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="option-card">
                                                        <i class="fas fa-th"></i>
                                                        <h6>Grid View</h6>
                                                        <p class="small">Card-based layout for visual appeal</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="option-card">
                                                        <i class="fas fa-sitemap"></i>
                                                        <h6>Org Chart</h6>
                                                        <p class="small">Hierarchical organization chart</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Staff Management Best Practices -->
                        <div class="best-practices-section">
                            <h5 class="mb-3"><i class="fas fa-star text-warning me-2"></i>Staff Management Best Practices</h5>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="practice-card">
                                        <i class="fas fa-sync-alt text-primary"></i>
                                        <h6>Keep Updated</h6>
                                        <ul class="small">
                                            <li>Update staff photos annually</li>
                                            <li>Reflect position changes promptly</li>
                                            <li>Remove inactive staff members</li>
                                            <li>Add new hires immediately</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="practice-card">
                                        <i class="fas fa-shield-alt text-success"></i>
                                        <h6>Privacy & Security</h6>
                                        <ul class="small">
                                            <li>Get consent for photo publication</li>
                                            <li>Limit personal contact information</li>
                                            <li>Use professional email addresses</li>
                                            <li>Respect privacy preferences</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="practice-card">
                                        <i class="fas fa-users text-info"></i>
                                        <h6>Engagement</h6>
                                        <ul class="small">
                                            <li>Highlight staff achievements</li>
                                            <li>Feature teacher spotlights</li>
                                            <li>Include professional development</li>
                                            <li>Show team spirit and culture</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Section -->
    <div id="settings" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-dark">Step 7</span>
                                <h3 class="section-title">
                                    <i class="fas fa-cog text-dark me-3"></i>
                                    Settings Management
                                </h3>
                                <p class="section-subtitle">Configure your school's core information and preferences</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="90">
                                    <span>90%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Settings Categories Overview -->
                        <div class="settings-categories-grid mb-4">
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="settings-category-card general">
                                        <div class="category-icon">
                                            <i class="fas fa-school fa-2x text-primary"></i>
                                        </div>
                                        <h6>School Information</h6>
                                        <p class="text-muted">Basic details and contact info</p>
                                        <div class="category-items">
                                            <div class="item">Name & Address</div>
                                            <div class="item">Contact Details</div>
                                            <div class="item">History</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="settings-category-card social">
                                        <div class="category-icon">
                                            <i class="fas fa-share-alt fa-2x text-info"></i>
                                        </div>
                                        <h6>Social Media</h6>
                                        <p class="text-muted">Online presence links</p>
                                        <div class="category-items">
                                            <div class="item">Facebook</div>
                                            <div class="item">Instagram</div>
                                            <div class="item">YouTube</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="settings-category-card communication">
                                        <div class="category-icon">
                                            <i class="fas fa-envelope fa-2x text-success"></i>
                                        </div>
                                        <h6>Communication</h6>
                                        <p class="text-muted">Contact forms and messaging</p>
                                        <div class="category-items">
                                            <div class="item">Contact Forms</div>
                                            <div class="item">Office Hours</div>
                                            <div class="item">Notifications</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="settings-category-card preferences">
                                        <div class="category-icon">
                                            <i class="fas fa-sliders-h fa-2x text-warning"></i>
                                        </div>
                                        <h6>Preferences</h6>
                                        <p class="text-muted">System and display settings</p>
                                        <div class="category-items">
                                            <div class="item">Time Zone</div>
                                            <div class="item">Language</div>
                                            <div class="item">Formats</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- School Information Settings -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-primary">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">School Information Settings</h5>
                                    <div class="step-content">
                                        <div class="info-categories">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="info-category-card basic">
                                                        <div class="info-header">
                                                            <i class="fas fa-building text-primary"></i>
                                                            <h6>Basic Information</h6>
                                                        </div>
                                                        <div class="info-fields">
                                                            <div class="field-item">
                                                                <span class="field-icon">🏫</span>
                                                                <div class="field-content">
                                                                    <strong>School Name</strong>
                                                                    <p>Official full name of the institution</p>
                                                                </div>
                                                            </div>
                                                            <div class="field-item">
                                                                <span class="field-icon">📍</span>
                                                                <div class="field-content">
                                                                    <strong>Physical Address</strong>
                                                                    <p>Complete postal address with location details</p>
                                                                </div>
                                                            </div>
                                                            <div class="field-item">
                                                                <span class="field-icon">📞</span>
                                                                <div class="field-content">
                                                                    <strong>Phone Number</strong>
                                                                    <p>Main contact number for inquiries</p>
                                                                </div>
                                                            </div>
                                                            <div class="field-item">
                                                                <span class="field-icon">✉️</span>
                                                                <div class="field-content">
                                                                    <strong>Email Address</strong>
                                                                    <p>Official email for general communication</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="info-category-card additional">
                                                        <div class="info-header">
                                                            <i class="fas fa-plus-circle text-success"></i>
                                                            <h6>Additional Details</h6>
                                                        </div>
                                                        <div class="info-fields">
                                                            <div class="field-item">
                                                                <span class="field-icon">📅</span>
                                                                <div class="field-content">
                                                                    <strong>Established Year</strong>
                                                                    <p>When the school was founded</p>
                                                                </div>
                                                            </div>
                                                            <div class="field-item">
                                                                <span class="field-icon">👨‍💼</span>
                                                                <div class="field-content">
                                                                    <strong>Principal Name</strong>
                                                                    <p>Current head teacher or principal</p>
                                                                </div>
                                                            </div>
                                                            <div class="field-item">
                                                                <span class="field-icon">👥</span>
                                                                <div class="field-content">
                                                                    <strong>Student Enrollment</strong>
                                                                    <p>Current number of enrolled students</p>
                                                                </div>
                                                            </div>
                                                            <div class="field-item">
                                                                <span class="field-icon">🎓</span>
                                                                <div class="field-content">
                                                                    <strong>Grade Levels</strong>
                                                                    <p>Educational levels offered (e.g., K-6)</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="settings-tips mt-4">
                                            <div class="tip-card">
                                                <i class="fas fa-lightbulb text-warning"></i>
                                                <div class="tip-content">
                                                    <h6>Pro Tips for School Information</h6>
                                                    <ul>
                                                        <li>Keep contact information current and accurate</li>
                                                        <li>Include international dialing codes for phone numbers</li>
                                                        <li>Use the official school name as registered</li>
                                                        <li>Verify email addresses are monitored regularly</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Settings -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-info">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Social Media Integration</h5>
                                    <div class="step-content">
                                        <div class="social-platforms">
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <div class="platform-card facebook">
                                                        <div class="platform-header">
                                                            <i class="fab fa-facebook-f"></i>
                                                            <span>Facebook</span>
                                                        </div>
                                                        <p class="platform-desc">School page for community updates and news</p>
                                                        <div class="platform-features">
                                                            <span class="feature">📰 News Updates</span>
                                                            <span class="feature">📸 Photo Sharing</span>
                                                            <span class="feature">👥 Community</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="platform-card instagram">
                                                        <div class="platform-header">
                                                            <i class="fab fa-instagram"></i>
                                                            <span>Instagram</span>
                                                        </div>
                                                        <p class="platform-desc">Visual storytelling and school life moments</p>
                                                        <div class="platform-features">
                                                            <span class="feature">📱 Stories</span>
                                                            <span class="feature">🎥 Reels</span>
                                                            <span class="feature">🖼️ Gallery</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="platform-card youtube">
                                                        <div class="platform-header">
                                                            <i class="fab fa-youtube"></i>
                                                            <span>YouTube</span>
                                                        </div>
                                                        <p class="platform-desc">Educational content and event recordings</p>
                                                        <div class="platform-features">
                                                            <span class="feature">🎓 Education</span>
                                                            <span class="feature">📹 Events</span>
                                                            <span class="feature">🎵 Performances</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="platform-card twitter">
                                                        <div class="platform-header">
                                                            <i class="fab fa-twitter"></i>
                                                            <span>Twitter</span>
                                                        </div>
                                                        <p class="platform-desc">Quick updates and announcements</p>
                                                        <div class="platform-features">
                                                            <span class="feature">🔥 Trending</span>
                                                            <span class="feature">📢 Alerts</span>
                                                            <span class="feature">💬 Discussions</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="platform-card linkedin">
                                                        <div class="platform-header">
                                                            <i class="fab fa-linkedin-in"></i>
                                                            <span>LinkedIn</span>
                                                        </div>
                                                        <p class="platform-desc">Professional networking and achievements</p>
                                                        <div class="platform-features">
                                                            <span class="feature">🏆 Achievements</span>
                                                            <span class="feature">🤝 Partnerships</span>
                                                            <span class="feature">💼 Professional</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="platform-card tiktok">
                                                        <div class="platform-header">
                                                            <i class="fab fa-tiktok"></i>
                                                            <span>TikTok</span>
                                                        </div>
                                                        <p class="platform-desc">Creative and engaging short-form content</p>
                                                        <div class="platform-features">
                                                            <span class="feature">🎭 Creative</span>
                                                            <span class="feature">📱 Trends</span>
                                                            <span class="feature">🎪 Fun</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="social-media-guidelines mt-4">
                                            <div class="guidelines-warning">
                                                <i class="fas fa-shield-alt text-warning"></i>
                                                <div class="warning-content">
                                                    <h6>Social Media Guidelines</h6>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <div class="guideline-section">
                                                                <strong>✅ Best Practices:</strong>
                                                                <ul class="small">
                                                                    <li>Use complete, valid URLs</li>
                                                                    <li>Link only official school accounts</li>
                                                                    <li>Regular monitoring and updates</li>
                                                                    <li>Consistent branding across platforms</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="guideline-section">
                                                                <strong>⚠️ Security Notes:</strong>
                                                                <ul class="small">
                                                                    <li>Admin-managed accounts only</li>
                                                                    <li>Regular password updates</li>
                                                                    <li>Two-factor authentication enabled</li>
                                                                    <li>Privacy settings reviewed</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Communication Settings -->
                        <div class="step-card">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-success">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Communication Preferences</h5>
                                    <div class="step-content">
                                        <div class="communication-options">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="comm-option-card contact-forms">
                                                        <div class="option-header">
                                                            <i class="fas fa-wpforms text-primary"></i>
                                                            <h6>Contact Forms</h6>
                                                        </div>
                                                        <div class="option-content">
                                                            <p>Configure how visitors can reach out:</p>
                                                            <div class="setting-item">
                                                                <i class="fas fa-toggle-on text-success"></i>
                                                                <span>Enable contact form</span>
                                                            </div>
                                                            <div class="setting-item">
                                                                <i class="fas fa-user-shield text-info"></i>
                                                                <span>Require visitor information</span>
                                                            </div>
                                                            <div class="setting-item">
                                                                <i class="fas fa-robot text-warning"></i>
                                                                <span>Anti-spam protection</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="comm-option-card office-hours">
                                                        <div class="option-header">
                                                            <i class="fas fa-clock text-success"></i>
                                                            <h6>Office Hours</h6>
                                                        </div>
                                                        <div class="option-content">
                                                            <p>Set when your office is available:</p>
                                                            <div class="hours-example">
                                                                <div class="day-schedule">
                                                                    <span class="day">Monday - Friday:</span>
                                                                    <span class="hours">8:00 AM - 4:00 PM</span>
                                                                </div>
                                                                <div class="day-schedule">
                                                                    <span class="day">Saturday:</span>
                                                                    <span class="hours">9:00 AM - 12:00 PM</span>
                                                                </div>
                                                                <div class="day-schedule">
                                                                    <span class="day">Sunday:</span>
                                                                    <span class="hours">Closed</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="comm-option-card emergency-contact">
                                                        <div class="option-header">
                                                            <i class="fas fa-phone-alt text-danger"></i>
                                                            <h6>Emergency & After-Hours Contact</h6>
                                                        </div>
                                                        <div class="option-content">
                                                            <div class="row g-3">
                                                                <div class="col-md-4">
                                                                    <div class="emergency-type">
                                                                        <i class="fas fa-ambulance text-danger"></i>
                                                                        <strong>Medical Emergency</strong>
                                                                        <p class="small">Call local emergency services immediately</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="emergency-type">
                                                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                                                        <strong>School Emergency</strong>
                                                                        <p class="small">Principal or designated emergency contact</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="emergency-type">
                                                                        <i class="fas fa-question-circle text-info"></i>
                                                                        <strong>General Inquiries</strong>
                                                                        <p class="small">After-hours voicemail or email</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Troubleshooting Section -->
    <div id="troubleshooting" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-danger">Help Center</span>
                                <h3 class="section-title">
                                    <i class="fas fa-wrench text-danger me-3"></i>
                                    Troubleshooting & FAQ
                                </h3>
                                <p class="section-subtitle">Quick solutions to common problems and how to get help</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="95">
                                    <span>95%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Issue Categories -->
                        <div class="issue-categories-grid mb-4">
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="issue-category-card login-issues">
                                        <div class="category-icon">
                                            <i class="fas fa-sign-in-alt fa-2x text-primary"></i>
                                        </div>
                                        <h6>Login Issues</h6>
                                        <p class="text-muted">Can't access admin panel</p>
                                        <div class="issue-count">
                                            <span class="badge bg-primary">3 solutions</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="issue-category-card content-problems">
                                        <div class="category-icon">
                                            <i class="fas fa-edit fa-2x text-warning"></i>
                                        </div>
                                        <h6>Content Issues</h6>
                                        <p class="text-muted">Problems with editing content</p>
                                        <div class="issue-count">
                                            <span class="badge bg-warning">4 solutions</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="issue-category-card media-problems">
                                        <div class="category-icon">
                                            <i class="fas fa-image fa-2x text-success"></i>
                                        </div>
                                        <h6>Media Problems</h6>
                                        <p class="text-muted">Image and file upload issues</p>
                                        <div class="issue-count">
                                            <span class="badge bg-success">5 solutions</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="issue-category-card display-issues">
                                        <div class="category-icon">
                                            <i class="fas fa-eye fa-2x text-info"></i>
                                        </div>
                                        <h6>Display Issues</h6>
                                        <p class="text-muted">Website appearance problems</p>
                                        <div class="issue-count">
                                            <span class="badge bg-info">6 solutions</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Accordion -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-danger">
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Frequently Asked Questions</h5>
                                    <div class="step-content">
                                        <div class="modern-accordion" id="troubleshootingAccordion">
                                            <!-- Login Issues -->
                                            <div class="accordion-item-modern">
                                                <div class="accordion-header-modern" data-bs-toggle="collapse" data-bs-target="#faq1">
                                                    <div class="accordion-icon">
                                                        <i class="fas fa-lock text-primary"></i>
                                                    </div>
                                                    <div class="accordion-title">
                                                        <h6>I can't log in to the admin panel</h6>
                                                        <p class="text-muted">Authentication and access problems</p>
                                                    </div>
                                                    <div class="accordion-toggle">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#troubleshootingAccordion">
                                                    <div class="accordion-body-modern">
                                                        <div class="solution-steps">
                                                            <div class="solution-step">
                                                                <span class="step-number">1</span>
                                                                <div class="step-content">
                                                                    <strong>Check credentials</strong>
                                                                    <p>Verify your email and password are correct. Check for typos and Caps Lock.</p>
                                                                </div>
                                                            </div>
                                                            <div class="solution-step">
                                                                <span class="step-number">2</span>
                                                                <div class="step-content">
                                                                    <strong>Clear browser cache</strong>
                                                                    <p>Press Ctrl+Shift+Delete (or Cmd+Shift+Delete) and clear browsing data.</p>
                                                                </div>
                                                            </div>
                                                            <div class="solution-step">
                                                                <span class="step-number">3</span>
                                                                <div class="step-content">
                                                                    <strong>Try incognito mode</strong>
                                                                    <p>Open a private browsing window and attempt to log in again.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="emergency-contact">
                                                            <i class="fas fa-phone text-danger me-2"></i>
                                                            <strong>Still can't access?</strong> Contact your system administrator for password reset.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Image Upload Issues -->
                                            <div class="accordion-item-modern">
                                                <div class="accordion-header-modern" data-bs-toggle="collapse" data-bs-target="#faq2">
                                                    <div class="accordion-icon">
                                                        <i class="fas fa-image text-success"></i>
                                                    </div>
                                                    <div class="accordion-title">
                                                        <h6>Images won't upload or display incorrectly</h6>
                                                        <p class="text-muted">File upload and media problems</p>
                                                    </div>
                                                    <div class="accordion-toggle">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#troubleshootingAccordion">
                                                    <div class="accordion-body-modern">
                                                        <div class="requirement-checklist">
                                                            <h6>Image Requirements Checklist</h6>
                                                            <div class="checklist-item">
                                                                <i class="fas fa-check-circle text-success"></i>
                                                                <span><strong>File size:</strong> Under 10MB (recommended: 2MB or less)</span>
                                                            </div>
                                                            <div class="checklist-item">
                                                                <i class="fas fa-check-circle text-success"></i>
                                                                <span><strong>Format:</strong> JPG, PNG, GIF, or WebP</span>
                                                            </div>
                                                            <div class="checklist-item">
                                                                <i class="fas fa-check-circle text-success"></i>
                                                                <span><strong>Dimensions:</strong> Reasonable size (max 4000px width)</span>
                                                            </div>
                                                            <div class="checklist-item">
                                                                <i class="fas fa-check-circle text-success"></i>
                                                                <span><strong>Connection:</strong> Stable internet connection</span>
                                                            </div>
                                                        </div>
                                                        <div class="troubleshooting-tips">
                                                            <h6>Quick Fixes</h6>
                                                            <ul>
                                                                <li>Compress large images before uploading</li>
                                                                <li>Try uploading one image at a time</li>
                                                                <li>Refresh the page and try again</li>
                                                                <li>Check your internet connection speed</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Changes Not Visible -->
                                            <div class="accordion-item-modern">
                                                <div class="accordion-header-modern" data-bs-toggle="collapse" data-bs-target="#faq3">
                                                    <div class="accordion-icon">
                                                        <i class="fas fa-eye-slash text-warning"></i>
                                                    </div>
                                                    <div class="accordion-title">
                                                        <h6>Changes don't appear on the website</h6>
                                                        <p class="text-muted">Content updates not showing</p>
                                                    </div>
                                                    <div class="accordion-toggle">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#troubleshootingAccordion">
                                                    <div class="accordion-body-modern">
                                                        <div class="solution-grid">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <div class="solution-card">
                                                                        <i class="fas fa-sync-alt text-primary"></i>
                                                                        <h6>Cache Issues</h6>
                                                                        <ul class="small">
                                                                            <li>Hard refresh: Ctrl+F5 (Windows) or Cmd+Shift+R (Mac)</li>
                                                                            <li>Clear browser cache and cookies</li>
                                                                            <li>Try private/incognito browsing</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="solution-card">
                                                                        <i class="fas fa-toggle-on text-success"></i>
                                                                        <h6>Content Status</h6>
                                                                        <ul class="small">
                                                                            <li>Verify content is set to "Active"</li>
                                                                            <li>Check publication date/time</li>
                                                                            <li>Ensure content is saved properly</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="timing-info">
                                                            <i class="fas fa-clock text-info me-2"></i>
                                                            <strong>Note:</strong> Changes may take 1-5 minutes to appear due to caching systems.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Mobile Display -->
                                            <div class="accordion-item-modern">
                                                <div class="accordion-header-modern" data-bs-toggle="collapse" data-bs-target="#faq4">
                                                    <div class="accordion-icon">
                                                        <i class="fas fa-mobile-alt text-info"></i>
                                                    </div>
                                                    <div class="accordion-title">
                                                        <h6>Website looks different on mobile devices</h6>
                                                        <p class="text-muted">Responsive design questions</p>
                                                    </div>
                                                    <div class="accordion-toggle">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#troubleshootingAccordion">
                                                    <div class="accordion-body-modern">
                                                        <div class="responsive-explanation">
                                                            <div class="explanation-header">
                                                                <i class="fas fa-info-circle text-info fa-2x"></i>
                                                                <div>
                                                                    <h6>This is Normal and Expected!</h6>
                                                                    <p>Your website uses responsive design to provide the best experience on all devices.</p>
                                                                </div>
                                                            </div>
                                                            <div class="device-examples">
                                                                <div class="row g-3">
                                                                    <div class="col-md-4">
                                                                        <div class="device-demo desktop">
                                                                            <i class="fas fa-desktop"></i>
                                                                            <h6>Desktop</h6>
                                                                            <ul class="small">
                                                                                <li>Full sidebar navigation</li>
                                                                                <li>Multi-column layouts</li>
                                                                                <li>Hover effects</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="device-demo tablet">
                                                                            <i class="fas fa-tablet-alt"></i>
                                                                            <h6>Tablet</h6>
                                                                            <ul class="small">
                                                                                <li>Adapted navigation</li>
                                                                                <li>Touch-friendly buttons</li>
                                                                                <li>Flexible columns</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="device-demo mobile">
                                                                            <i class="fas fa-mobile-alt"></i>
                                                                            <h6>Mobile</h6>
                                                                            <ul class="small">
                                                                                <li>Collapsed menu</li>
                                                                                <li>Stacked content</li>
                                                                                <li>Larger touch targets</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Getting Help Section -->
                        <div class="help-resources">
                            <h5 class="mb-3"><i class="fas fa-life-ring text-success me-2"></i>Need More Help?</h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="help-card support">
                                        <div class="help-header">
                                            <i class="fas fa-headset text-primary"></i>
                                            <h6>Technical Support</h6>
                                        </div>
                                        <div class="help-content">
                                            <p>When contacting support, please provide:</p>
                                            <ul>
                                                <li>Specific error messages (copy/paste)</li>
                                                <li>Screenshots of the problem</li>
                                                <li>Steps you took before the issue occurred</li>
                                                <li>Your browser type and version</li>
                                                <li>Device type (desktop, mobile, tablet)</li>
                                            </ul>
                                            <div class="contact-info">
                                                <i class="fas fa-envelope text-primary me-2"></i>
                                                <strong>Contact your web developer or system administrator</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="help-card prevention">
                                        <div class="help-header">
                                            <i class="fas fa-shield-alt text-success"></i>
                                            <h6>Problem Prevention</h6>
                                        </div>
                                        <div class="help-content">
                                            <p>Follow these best practices:</p>
                                            <ul>
                                                <li>Keep login credentials secure and updated</li>
                                                <li>Save your work frequently</li>
                                                <li>Test changes in preview mode first</li>
                                                <li>Keep your browser updated</li>
                                                <li>Use strong, stable internet connections</li>
                                            </ul>
                                            <div class="tip-highlight">
                                                <i class="fas fa-lightbulb text-warning me-2"></i>
                                                <strong>Pro Tip:</strong> Make small changes and save often to minimize potential issues.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Security & Maintenance Section -->
    <div id="security-maintenance" class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="section-badge bg-gradient-danger">Critical</span>
                                <h3 class="section-title">
                                    <i class="fas fa-shield-alt text-danger me-3"></i>
                                    Security & Maintenance
                                </h3>
                                <p class="section-subtitle">Protect your website and keep it running smoothly</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="progress-circle" data-progress="100">
                                    <span>100%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <!-- Security Priorities -->
                        <div class="security-priorities-grid mb-4">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="security-priority-card password-security">
                                        <div class="priority-icon">
                                            <i class="fas fa-key fa-2x text-danger"></i>
                                        </div>
                                        <h6>Password Security</h6>
                                        <p class="text-muted">Strong authentication protection</p>
                                        <div class="priority-level high">
                                            <span class="badge bg-danger">High Priority</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="security-priority-card admin-practices">
                                        <div class="priority-icon">
                                            <i class="fas fa-user-shield fa-2x text-warning"></i>
                                        </div>
                                        <h6>Safe Admin Practices</h6>
                                        <p class="text-muted">Secure usage guidelines</p>
                                        <div class="priority-level medium">
                                            <span class="badge bg-warning">Medium Priority</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="security-priority-card maintenance">
                                        <div class="priority-icon">
                                            <i class="fas fa-tools fa-2x text-info"></i>
                                        </div>
                                        <h6>Regular Maintenance</h6>
                                        <p class="text-muted">Keep content fresh and updated</p>
                                        <div class="priority-level ongoing">
                                            <span class="badge bg-info">Ongoing</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password Security -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-danger">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Password Security Guidelines</h5>
                                    <div class="step-content">
                                        <div class="password-strength-demo mb-4">
                                            <h6 class="mb-3"><i class="fas fa-shield-alt text-success me-2"></i>Strong Password Requirements</h6>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="password-requirement">
                                                        <div class="requirement-header">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                            <span>What to Include</span>
                                                        </div>
                                                        <ul class="requirement-list">
                                                            <li><i class="fas fa-font text-primary me-2"></i>Uppercase letters (A-Z)</li>
                                                            <li><i class="fas fa-font text-info me-2"></i>Lowercase letters (a-z)</li>
                                                            <li><i class="fas fa-hashtag text-success me-2"></i>Numbers (0-9)</li>
                                                            <li><i class="fas fa-at text-warning me-2"></i>Special symbols (!@#$%)</li>
                                                            <li><i class="fas fa-ruler text-purple me-2"></i>Minimum 12 characters</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="password-requirement">
                                                        <div class="requirement-header">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                            <span>What to Avoid</span>
                                                        </div>
                                                        <ul class="requirement-list">
                                                            <li><i class="fas fa-user text-danger me-2"></i>Personal information</li>
                                                            <li><i class="fas fa-calendar text-danger me-2"></i>Birth dates or anniversaries</li>
                                                            <li><i class="fas fa-keyboard text-danger me-2"></i>Common words or phrases</li>
                                                            <li><i class="fas fa-sort-numeric-up text-danger me-2"></i>Sequential numbers (123456)</li>
                                                            <li><i class="fas fa-repeat text-danger me-2"></i>Repeated characters (aaaaaa)</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="password-examples">
                                            <h6><i class="fas fa-lightbulb text-warning me-2"></i>Password Example Generator</h6>
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <div class="password-example weak">
                                                        <div class="example-header">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                            <span class="text-danger">Weak</span>
                                                        </div>
                                                        <code class="password-text">password123</code>
                                                        <small class="text-muted">Too common and predictable</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="password-example medium">
                                                        <div class="example-header">
                                                            <i class="fas fa-exclamation-triangle text-warning"></i>
                                                            <span class="text-warning">Medium</span>
                                                        </div>
                                                        <code class="password-text">School2024!</code>
                                                        <small class="text-muted">Better but still guessable</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="password-example strong">
                                                        <div class="example-header">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                            <span class="text-success">Strong</span>
                                                        </div>
                                                        <code class="password-text">Gh@n4Pr!m@ry$ch00l</code>
                                                        <small class="text-muted">Complex and secure</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="security-reminders mt-4">
                                            <div class="reminder-card critical">
                                                <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                                                <div class="reminder-content">
                                                    <h6>Critical Security Reminders</h6>
                                                    <ul>
                                                        <li><strong>Change default password immediately</strong> after first login</li>
                                                        <li><strong>Never share credentials</strong> with anyone, including colleagues</li>
                                                        <li><strong>Use unique passwords</strong> - don't reuse your admin password elsewhere</li>
                                                        <li><strong>Update passwords regularly</strong> - at least every 6 months</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Safe Admin Practices -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-warning">
                                        <i class="fas fa-user-shield"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Safe Admin Practices</h5>
                                    <div class="step-content">
                                        <div class="practices-grid">
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="practice-category session-security">
                                                        <div class="category-header">
                                                            <i class="fas fa-clock text-primary"></i>
                                                            <h6>Session Security</h6>
                                                        </div>
                                                        <div class="practice-items">
                                                            <div class="practice-item">
                                                                <i class="fas fa-sign-out-alt text-success"></i>
                                                                <span><strong>Always log out</strong> when finished working</span>
                                                            </div>
                                                            <div class="practice-item">
                                                                <i class="fas fa-user-secret text-info"></i>
                                                                <span><strong>Use private browsing</strong> on shared computers</span>
                                                            </div>
                                                            <div class="practice-item">
                                                                <i class="fas fa-history text-warning"></i>
                                                                <span><strong>Set session timeout</strong> for inactive periods</span>
                                                            </div>
                                                            <div class="practice-item">
                                                                <i class="fas fa-ban text-danger"></i>
                                                                <span><strong>Don't save passwords</strong> in public browsers</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="practice-category network-security">
                                                        <div class="category-header">
                                                            <i class="fas fa-wifi text-success"></i>
                                                            <h6>Network Security</h6>
                                                        </div>
                                                        <div class="practice-items">
                                                            <div class="practice-item">
                                                                <i class="fas fa-shield-alt text-success"></i>
                                                                <span><strong>Use secure networks</strong> - avoid public WiFi</span>
                                                            </div>
                                                            <div class="practice-item">
                                                                <i class="fas fa-lock text-primary"></i>
                                                                <span><strong>Check for HTTPS</strong> in the address bar</span>
                                                            </div>
                                                            <div class="practice-item">
                                                                <i class="fas fa-sync-alt text-info"></i>
                                                                <span><strong>Keep browser updated</strong> for security patches</span>
                                                            </div>
                                                            <div class="practice-item">
                                                                <i class="fas fa-virus text-warning"></i>
                                                                <span><strong>Scan files</strong> before uploading from external sources</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Maintenance Schedule -->
                        <div class="step-card mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="step-icon bg-info">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="step-title">Regular Maintenance Schedule</h5>
                                    <div class="step-content">
                                        <div class="maintenance-timeline">
                                            <div class="timeline-item weekly">
                                                <div class="timeline-marker weekly-marker">
                                                    <i class="fas fa-calendar-week"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="timeline-header">
                                                        <h6>Weekly Tasks</h6>
                                                        <span class="frequency-badge weekly">Every 7 days</span>
                                                    </div>
                                                    <div class="timeline-tasks">
                                                        <div class="task-item">
                                                            <i class="fas fa-newspaper text-primary"></i>
                                                            <div class="task-details">
                                                                <strong>Update News Articles</strong>
                                                                <p>Add new content, remove outdated posts</p>
                                                                <small class="text-muted">Location: Admin → News</small>
                                                            </div>
                                                        </div>
                                                        <div class="task-item">
                                                            <i class="fas fa-calendar-plus text-success"></i>
                                                            <div class="task-details">
                                                                <strong>Review Upcoming Events</strong>
                                                                <p>Add new events, update existing ones</p>
                                                                <small class="text-muted">Location: Admin → Events</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="timeline-item monthly">
                                                <div class="timeline-marker monthly-marker">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="timeline-header">
                                                        <h6>Monthly Tasks</h6>
                                                        <span class="frequency-badge monthly">Every 30 days</span>
                                                    </div>
                                                    <div class="timeline-tasks">
                                                        <div class="task-item">
                                                            <i class="fas fa-images text-warning"></i>
                                                            <div class="task-details">
                                                                <strong>Update Photo Gallery</strong>
                                                                <p>Add photos from recent school activities</p>
                                                                <small class="text-muted">Location: Admin → Gallery</small>
                                                            </div>
                                                        </div>
                                                        <div class="task-item">
                                                            <i class="fas fa-edit text-info"></i>
                                                            <div class="task-details">
                                                                <strong>Content Review</strong>
                                                                <p>Check pages for accuracy and relevance</p>
                                                                <small class="text-muted">Location: Admin → Page Content</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="timeline-item quarterly">
                                                <div class="timeline-marker quarterly-marker">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="timeline-header">
                                                        <h6>Quarterly Tasks</h6>
                                                        <span class="frequency-badge quarterly">Every 3 months</span>
                                                    </div>
                                                    <div class="timeline-tasks">
                                                        <div class="task-item">
                                                            <i class="fas fa-users text-secondary"></i>
                                                            <div class="task-details">
                                                                <strong>Staff Profile Updates</strong>
                                                                <p>Update staff information, add new members</p>
                                                                <small class="text-muted">Location: Admin → Staff</small>
                                                            </div>
                                                        </div>
                                                        <div class="task-item">
                                                            <i class="fas fa-cog text-dark"></i>
                                                            <div class="task-details">
                                                                <strong>Settings Verification</strong>
                                                                <p>Verify contact info and social media links</p>
                                                                <small class="text-muted">Location: Admin → Settings</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Important Reminders -->
                        <div class="important-reminders">
                            <h5 class="mb-3"><i class="fas fa-exclamation-triangle text-warning me-2"></i>Critical Reminders</h5>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="reminder-card save-frequently">
                                        <div class="reminder-header">
                                            <i class="fas fa-save text-primary"></i>
                                            <h6>Save Frequently</h6>
                                        </div>
                                        <div class="reminder-content">
                                            <p>Always save your changes before navigating away from any admin page.</p>
                                            <div class="reminder-tip">
                                                <i class="fas fa-keyboard me-2"></i>
                                                <small><strong>Tip:</strong> Use Ctrl+S to quick save</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="reminder-card preview-changes">
                                        <div class="reminder-header">
                                            <i class="fas fa-eye text-success"></i>
                                            <h6>Preview Changes</h6>
                                        </div>
                                        <div class="reminder-content">
                                            <p>Use "View Website" to see how your changes appear to visitors.</p>
                                            <div class="reminder-tip">
                                                <i class="fas fa-external-link-alt me-2"></i>
                                                <small><strong>Tip:</strong> Test on mobile devices too</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="reminder-card backup-content">
                                        <div class="reminder-header">
                                            <i class="fas fa-shield-alt text-warning"></i>
                                            <h6>Backup Strategy</h6>
                                        </div>
                                        <div class="reminder-content">
                                            <p>Contact your web developer about setting up automated content backups.</p>
                                            <div class="reminder-tip">
                                                <i class="fas fa-clock me-2"></i>
                                                <small><strong>Recommended:</strong> Weekly automated backups</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Reference Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="section-header text-center mb-5">
                <h2 class="display-6 fw-bold">
                    <i class="fas fa-bookmark text-primary me-3"></i>Quick Reference Guide
                </h2>
                <p class="lead text-muted">Essential shortcuts, sizes, and schedules at your fingertips</p>
            </div>

            <!-- Quick Action Buttons -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="quick-actions-container">
                        <h5 class="mb-3"><i class="fas fa-bolt text-warning me-2"></i>Quick Actions</h5>
                        <div class="quick-actions-grid">
                            <a href="#" class="quick-action-btn" onclick="window.print()">
                                <i class="fas fa-print"></i>
                                <span>Print Manual</span>
                            </a>
                            <a href="/admin" class="quick-action-btn">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            <a href="/admin/settings" class="quick-action-btn">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#" class="quick-action-btn" onclick="location.reload(true)">
                                <i class="fas fa-sync-alt"></i>
                                <span>Refresh</span>
                            </a>
                            <a href="#" class="quick-action-btn" onclick="window.scrollTo(0,0)">
                                <i class="fas fa-arrow-up"></i>
                                <span>Top</span>
                            </a>
                            <a href="/admin/logout" class="quick-action-btn">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reference Cards Grid -->
            <div class="row g-4">
                <!-- Keyboard Shortcuts -->
                <div class="col-lg-6 col-xl-3">
                    <div class="reference-card h-100">
                        <div class="reference-card-header keyboard-shortcuts">
                            <i class="fas fa-keyboard"></i>
                            <h5>Keyboard Shortcuts</h5>
                        </div>
                        <div class="reference-card-body">
                            <div class="shortcut-item">
                                <div class="shortcut-keys">
                                    <kbd>Ctrl</kbd> + <kbd>S</kbd>
                                </div>
                                <div class="shortcut-desc">Save current form</div>
                            </div>
                            <div class="shortcut-item">
                                <div class="shortcut-keys">
                                    <kbd>Ctrl</kbd> + <kbd>Z</kbd>
                                </div>
                                <div class="shortcut-desc">Undo last action</div>
                            </div>
                            <div class="shortcut-item">
                                <div class="shortcut-keys">
                                    <kbd>Ctrl</kbd> + <kbd>F5</kbd>
                                </div>
                                <div class="shortcut-desc">Hard refresh page</div>
                            </div>
                            <div class="shortcut-item">
                                <div class="shortcut-keys">
                                    <kbd>Ctrl</kbd> + <kbd>P</kbd>
                                </div>
                                <div class="shortcut-desc">Print current page</div>
                            </div>
                            <div class="shortcut-item">
                                <div class="shortcut-keys">
                                    <kbd>Ctrl</kbd> + <kbd>F</kbd>
                                </div>
                                <div class="shortcut-desc">Search on page</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Important URLs -->
                <div class="col-lg-6 col-xl-3">
                    <div class="reference-card h-100">
                        <div class="reference-card-header important-urls">
                            <i class="fas fa-link"></i>
                            <h5>Important URLs</h5>
                        </div>
                        <div class="reference-card-body">
                            <div class="url-item">
                                <div class="url-label">
                                    <i class="fas fa-tachometer-alt text-primary"></i>
                                    Admin Dashboard
                                </div>
                                <div class="url-path">/admin</div>
                            </div>
                            <div class="url-item">
                                <div class="url-label">
                                    <i class="fas fa-sign-in-alt text-success"></i>
                                    Admin Login
                                </div>
                                <div class="url-path">/admin/login</div>
                            </div>
                            <div class="url-item">
                                <div class="url-label">
                                    <i class="fas fa-globe text-info"></i>
                                    Public Website
                                </div>
                                <div class="url-path">/</div>
                            </div>
                            <div class="url-item">
                                <div class="url-label">
                                    <i class="fas fa-cog text-warning"></i>
                                    Site Settings
                                </div>
                                <div class="url-path">/admin/settings</div>
                            </div>
                            <div class="url-item">
                                <div class="url-label">
                                    <i class="fas fa-book text-secondary"></i>
                                    This Manual
                                </div>
                                <div class="url-path">/admin/manual</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Specifications -->
                <div class="col-lg-6 col-xl-3">
                    <div class="reference-card h-100">
                        <div class="reference-card-header image-specs">
                            <i class="fas fa-image"></i>
                            <h5>Image Specifications</h5>
                        </div>
                        <div class="reference-card-body">
                            <div class="spec-item">
                                <div class="spec-type">
                                    <i class="fas fa-star text-warning"></i>
                                    Site Logo
                                </div>
                                <div class="spec-size">200×80px</div>
                                <div class="spec-format">PNG, JPG</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-type">
                                    <i class="fas fa-newspaper text-primary"></i>
                                    News Images
                                </div>
                                <div class="spec-size">800×400px</div>
                                <div class="spec-format">JPG, WebP</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-type">
                                    <i class="fas fa-user-tie text-success"></i>
                                    Staff Photos
                                </div>
                                <div class="spec-size">300×300px</div>
                                <div class="spec-format">JPG, PNG</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-type">
                                    <i class="fas fa-images text-info"></i>
                                    Gallery Images
                                </div>
                                <div class="spec-size">1200×800px</div>
                                <div class="spec-format">JPG, WebP</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-type">
                                    <i class="fas fa-calendar text-danger"></i>
                                    Event Banners
                                </div>
                                <div class="spec-size">1000×500px</div>
                                <div class="spec-format">JPG, PNG</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Schedule -->
                <div class="col-lg-6 col-xl-3">
                    <div class="reference-card h-100">
                        <div class="reference-card-header update-schedule">
                            <i class="fas fa-calendar-check"></i>
                            <h5>Update Schedule</h5>
                        </div>
                        <div class="reference-card-body">
                            <div class="schedule-item">
                                <div class="schedule-type">
                                    <i class="fas fa-newspaper text-primary"></i>
                                    News Articles
                                </div>
                                <div class="schedule-freq">Weekly</div>
                                <div class="schedule-day">Mondays</div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-type">
                                    <i class="fas fa-calendar-alt text-success"></i>
                                    Events Calendar
                                </div>
                                <div class="schedule-freq">As needed</div>
                                <div class="schedule-day">Immediate</div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-type">
                                    <i class="fas fa-users text-warning"></i>
                                    Staff Directory
                                </div>
                                <div class="schedule-freq">Annually</div>
                                <div class="schedule-day">September</div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-type">
                                    <i class="fas fa-file-alt text-info"></i>
                                    Page Content
                                </div>
                                <div class="schedule-freq">Monthly</div>
                                <div class="schedule-day">1st Friday</div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-type">
                                    <i class="fas fa-shield-alt text-danger"></i>
                                    Security Review
                                </div>
                                <div class="schedule-freq">Quarterly</div>
                                <div class="schedule-day">Last Monday</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emergency Contacts -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="emergency-contacts-card">
                        <div class="emergency-header">
                            <i class="fas fa-phone-alt text-danger"></i>
                            <h5>Emergency Contacts</h5>
                            <p>For technical issues and urgent support</p>
                        </div>
                        <div class="emergency-grid">
                            <div class="emergency-item">
                                <div class="emergency-type">Website Issues</div>
                                <div class="emergency-contact">
                                    <i class="fas fa-envelope"></i>
                                    <span>support@ghanaschool.edu.gh</span>
                                </div>
                            </div>
                            <div class="emergency-item">
                                <div class="emergency-type">System Administrator</div>
                                <div class="emergency-contact">
                                    <i class="fas fa-phone"></i>
                                    <span>+233 XX XXX XXXX</span>
                                </div>
                            </div>
                            <div class="emergency-item">
                                <div class="emergency-type">IT Support</div>
                                <div class="emergency-contact">
                                    <i class="fas fa-comments"></i>
                                    <span>Live Chat Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Manual Container Styles */
    .manual-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        position: relative;
    }

    /* Hero Section */
    .manual-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 4rem 0;
        position: relative;
        overflow: hidden;
    }

    .manual-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .text-white-75 {
        color: rgba(255, 255, 255, 0.85) !important;
    }

    .floating-card {
        background: white;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        transform: translateY(-20px);
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(-20px); }
        50% { transform: translateY(-30px); }
    }

    /* Learning Path Cards */
    .learning-path-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
    }

    .learning-path-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .card-header-custom {
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .card-header-custom::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: rotate(45deg);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .bg-gradient-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    .btn-gradient-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
    }

    .btn-gradient-custom:hover {
        background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        color: white;
    }

    .card-body-custom {
        padding: 2rem;
    }

    .feature-list {
        list-style: none;
        padding: 0;
        margin: 1rem 0;
    }

    .feature-list li {
        padding: 0.75rem 0;
        border-bottom: 1px solid #f0f2f5;
        position: relative;
        padding-left: 2rem;
        line-height: 1.6;
    }

    .feature-list li::before {
        content: "✓";
        position: absolute;
        left: 0;
        top: 0.75rem;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.75rem;
        box-shadow: 0 2px 6px rgba(40, 167, 69, 0.3);
    }

    .feature-list li:last-child {
        border-bottom: none;
    }

    .text-purple {
        color: #764ba2 !important;
    }

    /* Section Cards */
    .section-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }

    .section-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 2rem;
        border-bottom: 1px solid #dee2e6;
    }

    .section-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #2d3748;
    }

    .section-subtitle {
        color: #718096;
        font-size: 1.1rem;
        margin: 0;
    }

    .section-body {
        padding: 2rem;
    }

    /* Progress Circle */
    .progress-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: conic-gradient(
            #28a745 0deg,
            #28a745 var(--progress, 0deg),
            #e9ecef var(--progress, 0deg),
            #e9ecef 360deg
        );
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
    }

    .progress-circle::before {
        content: '';
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: white;
        position: absolute;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .progress-circle span {
        position: relative;
        z-index: 1;
        font-weight: 700;
        color: #2d3748;
        font-size: 0.9rem;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .progress-circle:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
    }

    .progress-circle.high-progress {
        animation: pulse-success 2s ease-in-out infinite;
    }

    @keyframes pulse-success {
        0%, 100% {
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
        }
        50% {
            box-shadow: 0 6px 25px rgba(40, 167, 69, 0.4);
        }
    }

    /* Step Cards */
    .step-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 2rem;
        border-left: 5px solid #28a745;
        transition: all 0.3s ease;
    }

    .step-card:hover {
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transform: translateX(5px);
    }

    .step-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin: 0 auto;
    }

    .step-title {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 1rem;
    }

    .styled-list {
        counter-reset: step-counter;
        list-style: none;
        padding: 0;
        margin: 1rem 0;
    }

    .styled-list li {
        counter-increment: step-counter;
        padding: 1rem 0;
        padding-left: 3.5rem;
        position: relative;
        line-height: 1.6;
        border-bottom: 1px solid #f0f0f0;
    }

    .styled-list li:last-child {
        border-bottom: none;
    }

    .styled-list li::before {
        content: counter(step-counter);
        position: absolute;
        left: 0;
        top: 0.75rem;
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.875rem;
        box-shadow: 0 3px 10px rgba(0, 123, 255, 0.3);
        transition: all 0.3s ease;
    }

    .styled-list li:hover::before {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
    }

    /* Alternative blue-themed ordered lists */
    ol.blue-list {
        counter-reset: item-counter;
        list-style: none;
        padding: 0;
        margin: 1rem 0;
    }

    ol.blue-list li {
        counter-increment: item-counter;
        padding: 0.75rem 0;
        padding-left: 3rem;
        position: relative;
        line-height: 1.6;
    }

    ol.blue-list li::before {
        content: counter(item-counter);
        position: absolute;
        left: 0;
        top: 0.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.8rem;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }

    .code-highlight {
        background: linear-gradient(135deg, #f1f3f4 0%, #e8eaed 100%);
        color: #d73a49;
        padding: 0.3rem 0.6rem;
        border-radius: 6px;
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
        font-weight: 600;
        border: 1px solid #e1e4e8;
        transition: all 0.2s ease;
        display: inline-block;
    }

    .code-highlight:hover {
        background: linear-gradient(135deg, #e8eaed 0%, #d0d7de 100%);
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .btn-mini {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
        border: none;
    }

    .info-box {
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1rem;
        border-left: 4px solid;
    }

    .info-box.bg-warning {
        background-color: #fff3cd;
        border-left-color: #ffc107;
    }

    .feature-item {
        padding: 0.5rem 0;
        border-bottom: 1px solid #e9ecef;
    }

    .feature-item:last-child {
        border-bottom: none;
    }

    /* Overview and Demo Cards */
    .overview-grid .overview-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        height: 100%;
    }

    .overview-grid .overview-card:hover {
        transform: translateY(-5px);
        border-color: #e9ecef;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .bg-success-light { background-color: #d4edda; }
    .bg-warning-light { background-color: #fff3cd; }
    .bg-info-light { background-color: #d1ecf1; }
    .bg-purple-light { background-color: #e2d5f1; }

    /* Process Flow */
    .process-flow {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        padding: 1.5rem;
        background: #f8f9fa;
        border-radius: 12px;
    }

    .flow-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 120px;
    }

    .flow-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #6c757d;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .flow-step.active .flow-number {
        background: #007bff;
    }

    .flow-arrow {
        font-size: 1.5rem;
        color: #6c757d;
        margin: 0 0.5rem;
    }

    .flow-text {
        font-size: 0.875rem;
        font-weight: 500;
    }

    /* Form Preview */
    .form-preview {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        border: 2px dashed #dee2e6;
    }

    .form-field-demo {
        margin-bottom: 1rem;
    }

    .form-label-demo {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control-demo {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        background: #f8f9fa;
        color: #6c757d;
    }

    /* Template Showcase */
    .template-showcase {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 1.5rem;
        border-radius: 12px;
    }

    .template-card {
        background: white;
        padding: 1rem;
        border-radius: 8px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        cursor: pointer;
    }

    .template-card:hover {
        border-color: #764ba2;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    /* Tip Cards */
    .tip-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        border-left: 4px solid #007bff;
        height: 100%;
    }

    .tip-card.modern {
        border-left: 4px solid #28a745;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .tip-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .tip-header i {
        font-size: 1.5rem;
        margin-right: 0.75rem;
    }

    .tip-header h6 {
        margin: 0;
        font-weight: 600;
    }

    .tip-list {
        list-style: none;
        padding: 0;
        margin: 1rem 0;
    }

    .tip-list li {
        padding: 0.75rem 0;
        border-bottom: 1px solid #f1f3f4;
        position: relative;
        padding-left: 2rem;
        line-height: 1.6;
    }

    .tip-list li:before {
        content: "💡";
        position: absolute;
        left: 0;
        top: 0.75rem;
        background: linear-gradient(135deg, #ffc107 0%, #ff8c00 100%);
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        box-shadow: 0 2px 6px rgba(255, 193, 7, 0.3);
    }

    .tip-list li:last-child {
        border-bottom: none;
    }

    /* Reference Table */
    .reference-table {
        margin-top: 2rem;
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .modern-table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1rem;
        font-weight: 600;
        text-align: left;
        border: none;
    }

    .modern-table tbody td {
        padding: 1rem;
        border-bottom: 1px solid #f1f3f4;
        vertical-align: top;
    }

    .modern-table tbody tr:hover {
        background: #f8f9fa;
    }

    .type-badge {
        display: inline-block;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        color: white;
        font-weight: 500;
        font-size: 0.875rem;
    }

    /* Menu Demo Cards */
    .menu-demo-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        height: 100%;
        transition: all 0.3s ease;
    }

    .menu-demo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    .demo-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .demo-menu {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .menu-item-demo {
        background: #007bff;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 500;
        position: relative;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .menu-item-demo:hover {
        background: #0056b3;
        transform: translateY(-2px);
    }

    .menu-item-demo.active {
        background: #28a745;
    }

    .menu-item-demo.dropdown {
        position: relative;
    }

    .submenu-demo {
        position: absolute;
        top: 100%;
        left: 0;
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.5rem 0;
        min-width: 150px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        opacity: 0;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 10;
    }

    .menu-item-demo.dropdown:hover .submenu-demo {
        opacity: 1;
        transform: translateY(0);
    }

    .submenu-demo div {
        padding: 0.5rem 1rem;
        color: #495057;
        transition: background 0.2s ease;
    }

    .submenu-demo div:hover {
        background: #f8f9fa;
    }

    .demo-footer {
        background: #2d3748;
        padding: 1rem;
        border-radius: 8px;
    }

    .footer-links {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .footer-links a {
        color: #cbd5e0;
        text-decoration: none;
        font-size: 0.875rem;
        transition: color 0.3s ease;
    }

    .footer-links a:hover {
        color: white;
    }

    /* Quick Add Demo */
    .quick-add-demo {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 12px;
        border: 2px dashed #dee2e6;
    }

    .quick-buttons {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .quick-btn {
        background: #007bff;
        color: white;
        border: none;
        padding: 1rem;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .quick-btn:hover {
        background: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,123,255,0.3);
    }

    .quick-btn.home { background: #28a745; }
    .quick-btn.about { background: #17a2b8; }
    .quick-btn.contact { background: #ffc107; color: #212529; }
    .quick-btn.privacy { background: #6f42c1; }

    .method-benefits {
        background: white;
        padding: 1rem;
        border-radius: 8px;
    }

    .benefit-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
    }

    /* Creation Wizard */
    .creation-wizard {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }

    .wizard-steps {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .wizard-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 120px;
    }

    .step-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #e9ecef;
        color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .wizard-step.completed .step-circle {
        background: #28a745;
        color: white;
    }

    .wizard-step.active .step-circle {
        background: #007bff;
        color: white;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(0,123,255,0.7); }
        70% { box-shadow: 0 0 0 10px rgba(0,123,255,0); }
        100% { box-shadow: 0 0 0 0 rgba(0,123,255,0); }
    }

    .wizard-connector {
        width: 60px;
        height: 2px;
        background: #dee2e6;
        margin: 0 0.5rem;
    }

    .step-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: #495057;
    }

    /* Field Explanations */
    .form-breakdown {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
    }

    .field-explanation h6 {
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    /* Submenu Examples */
    .submenu-example {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
    }

    .submenu-structure {
        display: inline-block;
        text-align: left;
    }

    .parent-menu {
        background: #007bff;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        position: relative;
        margin-bottom: 0.5rem;
    }

    .submenu-items {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.5rem 0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .submenu-item {
        padding: 0.75rem 1.5rem;
        color: #495057;
        transition: background 0.2s ease;
    }

    .submenu-item:hover {
        background: #f8f9fa;
    }

    /* Instruction Flow */
    .instruction-flow {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .flow-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: white;
        border-radius: 8px;
        border-left: 4px solid #007bff;
    }

    .flow-num {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #007bff;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.875rem;
        flex-shrink: 0;
    }

    /* Organization Tips */
    .organization-tips {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 2rem;
        border-radius: 15px;
        margin-top: 2rem;
    }

    /* Theme Elements Grid */
    .theme-elements-grid .theme-element-card {
        background: white;
        padding: 1.5rem;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        border: 2px solid transparent;
    }

    .theme-element-card:hover {
        transform: translateY(-5px);
        border-color: #764ba2;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .element-icon {
        color: #764ba2;
        margin-bottom: 1rem;
    }

    .color-preview {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .color-dot {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .color-dot.primary { background: #007bff; }
    .color-dot.secondary { background: #28a745; }
    .color-dot.accent { background: #ffc107; }

    .font-preview {
        margin-top: 1rem;
    }

    .font-sample.heading {
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .font-sample.body {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .logo-preview {
        margin-top: 1rem;
    }

    .logo-placeholder {
        width: 60px;
        height: 60px;
        background: #e9ecef;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: #6c757d;
        font-size: 1.5rem;
    }

    .layout-preview {
        margin-top: 1rem;
    }

    .layout-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 20px 40px;
        gap: 2px;
        background: #e9ecef;
        padding: 5px;
        border-radius: 4px;
    }

    .grid-item {
        background: #007bff;
        border-radius: 2px;
    }

    .grid-item.header {
        grid-column: 1 / -1;
        background: #28a745;
    }

    .grid-item.sidebar {
        background: #ffc107;
    }

    /* Color Customization Demo */
    .color-customization-demo {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 12px;
    }

    .color-section {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        border: 2px solid #e9ecef;
    }

    .color-picker-demo {
        margin-top: 1rem;
    }

    .color-input {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .color-swatch {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        border: 3px solid white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .color-code {
        font-family: 'Courier New', monospace;
        background: #f1f3f4;
        padding: 0.5rem;
        border-radius: 4px;
        font-weight: 600;
    }

    .color-usage {
        display: flex;
        gap: 0.5rem;
    }

    .usage-example {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .btn-example {
        background: #007bff;
        color: white;
    }

    .link-example {
        color: #007bff;
        text-decoration: underline;
    }

    .success-example {
        background: #28a745;
        color: white;
    }

    .badge-example {
        background: #6c757d;
        color: white;
    }

    .color-tips {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .tip-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        font-weight: 500;
    }

    /* Typography Demo */
    .typography-demo {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 12px;
    }

    .font-family-section {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        height: 100%;
    }

    .font-selector {
        margin: 1rem 0;
    }

    .font-sample-large {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2d3748;
        margin-top: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        text-align: center;
    }

    .font-sample-body {
        color: #4a5568;
        line-height: 1.6;
        margin-top: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .font-size-controls {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .size-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .size-control {
        text-align: center;
    }

    .size-control label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #2d3748;
    }

    .size-slider {
        background: #e2e8f0;
        height: 8px;
        border-radius: 4px;
        position: relative;
        margin-bottom: 0.5rem;
    }

    .size-slider::before {
        content: '';
        position: absolute;
        left: 60%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 16px;
        height: 16px;
        background: #007bff;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .size-value {
        font-weight: 600;
        color: #007bff;
        font-size: 0.875rem;
    }

    /* Logo & Branding */
    .branding-section {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 12px;
    }

    .logo-upload-demo {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        height: 100%;
    }

    .upload-area {
        border: 2px dashed #cbd5e0;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        margin: 1rem 0;
        transition: all 0.3s ease;
    }

    .upload-area:hover {
        border-color: #007bff;
        background: #f7faff;
    }

    .upload-placeholder i {
        color: #a0aec0;
    }

    .upload-specs {
        text-align: center;
        margin-top: 1rem;
    }

    .logo-preview-demo {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        height: 100%;
    }

    .preview-scenarios {
        margin-top: 1rem;
    }

    .scenario {
        margin-bottom: 1rem;
    }

    .scenario-label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #4a5568;
    }

    .mock-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #2d3748;
        padding: 0.75rem 1rem;
        border-radius: 6px;
    }

    .mock-logo {
        color: white;
        font-size: 1.25rem;
    }

    .mock-nav {
        display: flex;
        gap: 1rem;
    }

    .mock-nav span {
        color: #cbd5e0;
        font-size: 0.875rem;
    }

    .mock-footer {
        background: #1a202c;
        padding: 0.75rem 1rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mock-logo-small {
        color: #cbd5e0;
        font-size: 1rem;
    }

    .mock-footer-text small {
        color: #a0aec0;
    }

    .branding-assets {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .assets-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .asset-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .asset-item:hover {
        background: #e9ecef;
        transform: translateY(-2px);
    }

    .asset-item i {
        font-size: 1.5rem;
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .asset-item span {
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .asset-item small {
        color: #6c757d;
    }

    /* Advanced Settings */
    .advanced-settings {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 2rem;
        border-radius: 15px;
        margin-top: 2rem;
    }

    .setting-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .setting-card:hover {
        border-color: #007bff;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .setting-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .setting-header i {
        font-size: 1.25rem;
    }

    .setting-header h6 {
        margin: 0;
        font-weight: 600;
    }

    .toggle-demo {
        margin-top: 1rem;
    }

    .toggle-switch {
        display: inline-block;
        width: 50px;
        height: 25px;
        background: #e2e8f0;
        border-radius: 25px;
        position: relative;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .toggle-switch::before {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 21px;
        height: 21px;
        background: white;
        border-radius: 50%;
        transition: transform 0.3s ease;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .toggle-switch:hover {
        background: #007bff;
    }

    .toggle-switch:hover::before {
        transform: translateX(25px);
    }

    .code-editor-demo {
        background: #2d3748;
        color: #e2e8f0;
        padding: 1rem;
        border-radius: 6px;
        font-family: 'Courier New', monospace;
        margin-top: 1rem;
        text-align: left;
    }

    /* Print Styles */
    @media print {
        .manual-hero {
            background: #667eea !important;
            -webkit-print-color-adjust: exact;
        }

        .learning-path-card,
        .section-card,
        .step-card {
            break-inside: avoid;
            margin-bottom: 1rem;
        }

        .floating-card {
            animation: none;
            transform: none;
        }

        /* News & Events Section Styles */
        .content-types-grid .content-type-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            height: 100%;
        }

        .content-type-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .news-card:hover {
            border-color: #ffc107;
        }

        .events-card:hover {
            border-color: #17a2b8;
        }

        .type-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .type-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
        }

        .feature-badge {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: #495057;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            border: 1px solid #dee2e6;
        }

        .form-fields-guide .field-guide-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            border-left: 4px solid #007bff;
            margin-bottom: 1rem;
        }

        .field-label {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .required-badge {
            background: #dc3545;
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 10px;
            font-size: 0.7rem;
            margin-left: auto;
        }

        .optional-badge {
            background: #6c757d;
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 10px;
            font-size: 0.7rem;
            margin-left: auto;
        }

        .recommended-badge {
            background: #28a745;
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 10px;
            font-size: 0.7rem;
            margin-left: auto;
        }

        .field-description {
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .field-example {
            padding: 0.5rem;
            background: white;
            border-radius: 5px;
            border-left: 3px solid #17a2b8;
        }

        .field-tips {
            padding: 0.5rem;
            background: #e3f2fd;
            border-radius: 5px;
            border-left: 3px solid #2196f3;
        }

        .editor-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .feature-tag {
            background: #fff3cd;
            color: #856404;
            padding: 0.25rem 0.5rem;
            border-radius: 15px;
            font-size: 0.8rem;
            border: 1px solid #ffeaa7;
        }

        .event-types-showcase .event-type-demo {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .event-type-demo:hover {
            transform: translateY(-3px);
        }

        .event-type-demo.academic {
            border-top: 4px solid #007bff;
        }

        .event-type-demo.sports {
            border-top: 4px solid #28a745;
        }

        .event-type-demo.cultural {
            border-top: 4px solid #dc3545;
        }

        .event-type-demo.general {
            border-top: 4px solid #6c757d;
        }

        .event-type-demo i {
            margin-bottom: 0.5rem;
        }

        .event-type-demo span {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .event-type-demo small {
            color: #6c757d;
        }

        .event-form-guide .detail-item {
            padding: 0.5rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .event-form-guide .detail-item:last-child {
            border-bottom: none;
        }

        .recurring-events .feature-highlight {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
        }

        .recurrence-options {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .option-badge {
            background: rgba(255,255,255,0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            border: 1px solid rgba(255,255,255,0.3);
        }

        .organization-methods .organization-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: 100%;
        }

        .org-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8f9fa;
        }

        .tag-examples {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .tag-demo {
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .tag-demo.academic {
            background: #e3f2fd;
            color: #1976d2;
        }

        .tag-demo.sports {
            background: #e8f5e8;
            color: #2e7d32;
        }

        .tag-demo.announcement {
            background: #fff3e0;
            color: #f57c00;
        }

        .tag-demo.achievement {
            background: #fce4ec;
            color: #c2185b;
        }

        .filter-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .filter-item {
            padding: 0.5rem;
            background: #f8f9fa;
            border-radius: 8px;
            font-size: 0.9rem;
            text-align: center;
        }

        /* Staff Management Section Styles */
        .staff-categories-grid .staff-category-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .staff-category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .staff-category-card.admin:hover {
            border-color: #007bff;
        }

        .staff-category-card.teachers:hover {
            border-color: #28a745;
        }

        .staff-category-card.support:hover {
            border-color: #ffc107;
        }

        .staff-category-card.operations:hover {
            border-color: #17a2b8;
        }

        .category-icon {
            margin-bottom: 1rem;
        }

        .category-badge {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: #495057;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-top: 1rem;
            display: inline-block;
        }

        .photo-requirements {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .req-item {
            background: #e8f5e8;
            color: #2e7d32;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        .bio-suggestions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .suggestion-tag {
            background: #e3f2fd;
            color: #1976d2;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        .guidelines-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            border-left: 4px solid #007bff;
        }

        .guideline-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            height: 100%;
        }

        .guideline-item i {
            font-size: 1.5rem;
            margin-top: 0.25rem;
        }

        .guideline-content {
            flex: 1;
        }

        .hierarchy-demo {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
        }

        .hierarchy-level {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            background: white;
            border-radius: 8px;
            border-left: 4px solid #007bff;
        }

        .level-label {
            background: #007bff;
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
            margin-right: 1rem;
        }

        .level-title {
            font-weight: 500;
        }

        .department-showcase {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
        }

        .dept-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            background: white;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .dept-group.admin {
            border-left: 4px solid #007bff;
        }

        .dept-group.primary {
            border-left: 4px solid #28a745;
        }

        .dept-group.specialist {
            border-left: 4px solid #ffc107;
        }

        .dept-group.support {
            border-left: 4px solid #17a2b8;
        }

        .display-options .option-card {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .option-card:hover {
            transform: translateY(-3px);
        }

        .option-card i {
            font-size: 2rem;
            color: #007bff;
            margin-bottom: 0.5rem;
        }

        .option-card h6 {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        /* Settings Section Styles */
        .settings-categories-grid .settings-category-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .settings-category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .settings-category-card.general:hover {
            border-color: #007bff;
        }

        .settings-category-card.social:hover {
            border-color: #17a2b8;
        }

        .settings-category-card.communication:hover {
            border-color: #28a745;
        }

        .settings-category-card.preferences:hover {
            border-color: #ffc107;
        }

        .category-items {
            margin-top: 1rem;
        }

        .category-items .item {
            background: #f8f9fa;
            padding: 0.25rem 0.5rem;
            border-radius: 15px;
            font-size: 0.8rem;
            margin: 0.25rem;
            display: inline-block;
        }

        .info-categories .info-category-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            height: 100%;
            border-left: 4px solid #007bff;
        }

        .info-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #dee2e6;
        }

        .info-fields .field-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .info-fields .field-item:last-child {
            border-bottom: none;
        }

        .field-icon {
            font-size: 1.5rem;
            min-width: 2rem;
        }

        .field-content strong {
            display: block;
            color: #495057;
            margin-bottom: 0.25rem;
        }

        .field-content p {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
        }

        .social-platforms .platform-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .platform-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .platform-card.facebook:hover {
            border-color: #1877f2;
        }

        .platform-card.instagram:hover {
            border-color: #e4405f;
        }

        .platform-card.youtube:hover {
            border-color: #ff0000;
        }

        .platform-card.twitter:hover {
            border-color: #1da1f2;
        }

        .platform-card.linkedin:hover {
            border-color: #0077b5;
        }

        .platform-card.tiktok:hover {
            border-color: #000000;
        }

        .platform-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .platform-header i {
            font-size: 1.5rem;
        }

        .platform-desc {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .platform-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.25rem;
            justify-content: center;
        }

        .platform-features .feature {
            background: #f8f9fa;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            font-size: 0.8rem;
            border: 1px solid #dee2e6;
        }

        .guidelines-warning {
            background: #fff8e1;
            border: 1px solid #ffcc02;
            border-radius: 10px;
            padding: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .warning-content {
            flex: 1;
        }

        .guideline-section strong {
            color: #495057;
            margin-bottom: 0.5rem;
            display: block;
        }

        .communication-options .comm-option-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            height: 100%;
        }

        .comm-option-card.contact-forms {
            border-left: 4px solid #007bff;
        }

        .comm-option-card.office-hours {
            border-left: 4px solid #28a745;
        }

        .comm-option-card.emergency-contact {
            border-left: 4px solid #dc3545;
        }

        .option-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8f9fa;
        }

        .setting-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
            font-size: 0.9rem;
        }

        .hours-example {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
        }

        .day-schedule {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #dee2e6;
        }

        .day-schedule:last-child {
            border-bottom: none;
        }

        .day-schedule .day {
            font-weight: 600;
            color: #495057;
        }

        .day-schedule .hours {
            color: #28a745;
            font-weight: 500;
        }

        .emergency-type {
            text-align: center;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .emergency-type i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .emergency-type strong {
            display: block;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        /* Troubleshooting Section Styles */
        .issue-categories-grid .issue-category-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .issue-category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .issue-category-card.login-issues:hover {
            border-color: #007bff;
        }

        .issue-category-card.content-problems:hover {
            border-color: #ffc107;
        }

        .issue-category-card.media-problems:hover {
            border-color: #28a745;
        }

        .issue-category-card.display-issues:hover {
            border-color: #17a2b8;
        }

        .issue-count {
            margin-top: 1rem;
        }

        .modern-accordion {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .accordion-item-modern {
            background: white;
            border: none;
            border-bottom: 1px solid #e9ecef;
        }

        .accordion-item-modern:last-child {
            border-bottom: none;
        }

        .accordion-header-modern {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            background: white;
            gap: 1rem;
        }

        .accordion-header-modern:hover {
            background: #f8f9fa;
        }

        .accordion-icon {
            font-size: 1.5rem;
            min-width: 2rem;
        }

        .accordion-title {
            flex: 1;
        }

        .accordion-title h6 {
            margin: 0 0 0.25rem 0;
            font-weight: 600;
        }

        .accordion-title p {
            margin: 0;
            font-size: 0.9rem;
        }

        .accordion-toggle {
            font-size: 1.2rem;
            color: #6c757d;
            transition: transform 0.3s ease;
        }

        .accordion-header-modern[aria-expanded="true"] .accordion-toggle {
            transform: rotate(180deg);
        }

        .accordion-body-modern {
            padding: 0 1.5rem 1.5rem 1.5rem;
            background: #f8f9fa;
        }

        .solution-steps {
            margin-bottom: 1rem;
        }

        .solution-step {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1rem;
            padding: 1rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .step-number {
            background: #007bff;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .step-content strong {
            display: block;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .step-content p {
            margin: 0;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .emergency-contact {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 10px;
            padding: 1rem;
            color: #856404;
        }

        .requirement-checklist {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .requirement-checklist h6 {
            margin-bottom: 1rem;
            color: #495057;
        }

        .checklist-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f8f9fa;
        }

        .checklist-item:last-child {
            border-bottom: none;
        }

        .checklist-item i {
            font-size: 1.2rem;
        }

        .troubleshooting-tips {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
        }

        .solution-grid .solution-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            height: 100%;
        }

        .solution-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .solution-card h6 {
            margin-bottom: 1rem;
            color: #495057;
        }

        .timing-info {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
            color: #1976d2;
        }

        .responsive-explanation {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
        }

        .explanation-header {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8f9fa;
        }

        .explanation-header h6 {
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .device-examples {
            margin-top: 1rem;
        }

        .device-demo {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            height: 100%;
        }

        .device-demo i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #007bff;
        }

        .device-demo h6 {
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .device-demo ul {
            text-align: left;
            margin: 0;
        }

        .help-resources .help-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            height: 100%;
        }

        .help-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8f9fa;
        }

        .help-header i {
            font-size: 1.5rem;
        }

        .help-content ul {
            margin-bottom: 1rem;
        }

        .contact-info {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
            border-radius: 10px;
            padding: 1rem;
            color: #1976d2;
        }

        .tip-highlight {
            background: #fff8e1;
            border: 1px solid #ffcc02;
            border-radius: 10px;
            padding: 1rem;
            color: #f57c00;
        }

        /* Quick Reference Section Styles */
        .quick-actions-container {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .quick-action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            min-height: 100px;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .quick-action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }

        .quick-action-btn i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .quick-action-btn span {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .reference-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .reference-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .reference-card-header {
            padding: 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .reference-card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.1;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="10" height="10" patternUnits="userSpaceOnUse"><circle cx="5" cy="5" r="1" fill="white"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }

        .reference-card-header i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .reference-card-header h5 {
            margin: 0;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }

        .keyboard-shortcuts {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .important-urls {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .image-specs {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .update-schedule {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .reference-card-body {
            padding: 2rem;
        }

        /* Keyboard Shortcuts */
        .shortcut-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .shortcut-item:last-child {
            border-bottom: none;
        }

        .shortcut-keys {
            font-weight: 600;
        }

        .shortcut-keys kbd {
            background: #6c757d;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            margin: 0 0.1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .shortcut-desc {
            color: #666;
            font-size: 0.9rem;
        }

        /* URL Items */
        .url-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .url-item:last-child {
            border-bottom: none;
        }

        .url-label {
            display: flex;
            align-items: center;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .url-label i {
            margin-right: 0.5rem;
            width: 16px;
        }

        .url-path {
            color: #666;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            background: #f8f9fa;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            margin-left: 1.5rem;
        }

        /* Image Specifications */
        .spec-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .spec-item:last-child {
            border-bottom: none;
        }

        .spec-type {
            display: flex;
            align-items: center;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .spec-type i {
            margin-right: 0.5rem;
            width: 16px;
        }

        .spec-size {
            color: #007bff;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .spec-format {
            color: #666;
            font-size: 0.85rem;
            margin-top: 0.1rem;
        }

        /* Schedule Items */
        .schedule-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .schedule-item:last-child {
            border-bottom: none;
        }

        .schedule-type {
            display: flex;
            align-items: center;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .schedule-type i {
            margin-right: 0.5rem;
            width: 16px;
        }

        .schedule-freq {
            color: #28a745;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .schedule-day {
            color: #666;
            font-size: 0.85rem;
            margin-top: 0.1rem;
        }

        /* Emergency Contacts */
        .emergency-contacts-card {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
        }

        .emergency-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .emergency-header i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .emergency-header h5 {
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .emergency-header p {
            margin: 0.5rem 0 0 0;
            opacity: 0.9;
        }

        .emergency-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .emergency-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .emergency-type {
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .emergency-contact {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.9;
        }

        .emergency-contact i {
            margin-right: 0.5rem;
        }

        /* Responsive Design for Quick Reference */
        @media (max-width: 768px) {
            .quick-actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .quick-action-btn {
                padding: 1rem 0.5rem;
                min-height: 80px;
            }

            .reference-card-header,
            .reference-card-body {
                padding: 1.5rem;
            }

            .emergency-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .quick-actions-grid {
                grid-template-columns: 1fr;
            }

            .quick-action-btn span {
                font-size: 0.8rem;
            }
        }
    }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Add highlight effect
                    target.style.boxShadow = '0 0 20px rgba(102, 126, 234, 0.3)';
                    setTimeout(() => {
                        target.style.boxShadow = '';
                    }, 2000);
                }
            });
        });

        // Progress circle animation with enhanced effects
        const progressCircles = document.querySelectorAll('.progress-circle');
        progressCircles.forEach((circle, index) => {
            const progress = circle.dataset.progress;
            const degree = (progress / 100) * 360;

            // Animate the progress circle with a delay
            setTimeout(() => {
                circle.style.setProperty('--progress', degree + 'deg');
                circle.style.opacity = '1';

                // Add pulse animation for high progress values
                if (progress >= 80) {
                    circle.classList.add('high-progress');
                }
            }, index * 100);

            // Add hover effects
            circle.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.15)';
                this.style.boxShadow = '0 8px 25px rgba(40, 167, 69, 0.4)';
            });

            circle.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = '0 4px 15px rgba(40, 167, 69, 0.2)';
            });
        });

        // Learning path card hover effects
        const learningCards = document.querySelectorAll('.learning-path-card');
        learningCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Auto-expand sections when navigating via hash
        if (window.location.hash) {
            const section = document.querySelector(window.location.hash);
            if (section) {
                setTimeout(() => {
                    section.scrollIntoView({ behavior: 'smooth' });
                }, 100);
            }
        }

        // Add typing effect to hero title
        const heroTitle = document.querySelector('.manual-hero .display-4');
        if (heroTitle) {
            const originalText = heroTitle.innerHTML;
            heroTitle.innerHTML = '';
            let i = 0;

            function typeWriter() {
                if (i < originalText.length) {
                    heroTitle.innerHTML += originalText.charAt(i);
                    i++;
                    setTimeout(typeWriter, 50);
                }
            }

            setTimeout(typeWriter, 500);
        }

        // Add scroll progress indicator
        const scrollProgress = document.createElement('div');
        scrollProgress.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            z-index: 9999;
            transition: width 0.1s ease;
        `;
        document.body.appendChild(scrollProgress);

        window.addEventListener('scroll', () => {
            const scrolled = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            scrollProgress.style.width = scrolled + '%';
        });

        // Add copy code functionality
        document.querySelectorAll('.code-highlight').forEach(code => {
            code.style.cursor = 'pointer';
            code.title = 'Click to copy';

            code.addEventListener('click', function() {
                navigator.clipboard.writeText(this.textContent).then(() => {
                    const originalBg = this.style.backgroundColor;
                    this.style.backgroundColor = '#28a745';
                    this.style.color = 'white';

                    setTimeout(() => {
                        this.style.backgroundColor = originalBg;
                        this.style.color = '#d73a49';
                    }, 1000);
                });
            });
        });

        // Add search functionality
        const searchContainer = document.createElement('div');
        searchContainer.innerHTML = `
            <div style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
                <input type="text" id="manualSearch" placeholder="Search manual..."
                       style="padding: 10px; border: 2px solid #667eea; border-radius: 25px; outline: none;">
            </div>
        `;
        document.body.appendChild(searchContainer);

        const searchInput = document.getElementById('manualSearch');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const sections = document.querySelectorAll('.section-card, .step-card');

            sections.forEach(section => {
                const text = section.textContent.toLowerCase();
                if (searchTerm === '' || text.includes(searchTerm)) {
                    section.style.display = '';
                    section.style.opacity = '1';
                } else {
                    section.style.opacity = '0.3';
                }
            });
        });
    });
</script>
@endpush
