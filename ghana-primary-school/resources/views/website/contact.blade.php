@extends('layouts.website')

@section('title', 'Contact Us')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Contact Us</h1>
                <p class="lead mb-4">Get in touch with us - we'd love to hear from you</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/contact-hero.svg') }}" alt="Contact Us" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-envelope me-2"></i>Send us a Message</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>Please correct the errors below:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                <select class="form-select @error('subject') is-invalid @enderror"
                                        id="subject"
                                        name="subject"
                                        required>
                                    <option value="">Select a subject</option>
                                    <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                                    <option value="admission" {{ old('subject') == 'admission' ? 'selected' : '' }}>Admission Information</option>
                                    <option value="academic" {{ old('subject') == 'academic' ? 'selected' : '' }}>Academic Programs</option>
                                    <option value="event" {{ old('subject') == 'event' ? 'selected' : '' }}>School Events</option>
                                    <option value="complaint" {{ old('subject') == 'complaint' ? 'selected' : '' }}>Complaint/Feedback</option>
                                    <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('message') is-invalid @enderror"
                                      id="message"
                                      name="message"
                                      rows="6"
                                      placeholder="Please type your message here..."
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox"
                                   class="form-check-input @error('privacy_agreement') is-invalid @enderror"
                                   id="privacy_agreement"
                                   name="privacy_agreement"
                                   value="1"
                                   {{ old('privacy_agreement') ? 'checked' : '' }}
                                   required>
                            <label class="form-check-label" for="privacy_agreement">
                                I agree to the <a href="#" class="text-decoration-none">Privacy Policy</a> and consent to my data being processed. <span class="text-danger">*</span>
                            </label>
                            @error('privacy_agreement')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Contact Information -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Get in Touch</h5>
                </div>
                <div class="card-body">
                    @if($school)
                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-school text-primary me-3 mt-1"></i>
                                <div>
                                    <h6 class="mb-1">School Address</h6>
                                    <p class="text-muted mb-0">{{ $school->address ?? 'Address not available' }}</p>
                                </div>
                            </div>
                        </div>

                        @if($school->phone)
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-phone text-primary me-3 mt-1"></i>
                                    <div>
                                        <h6 class="mb-1">Phone Number</h6>
                                        <p class="text-muted mb-0">
                                            <a href="tel:{{ $school->phone }}" class="text-decoration-none">{{ $school->phone }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($school->email)
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-envelope text-primary me-3 mt-1"></i>
                                    <div>
                                        <h6 class="mb-1">Email Address</h6>
                                        <p class="text-muted mb-0">
                                            <a href="mailto:{{ $school->email }}" class="text-decoration-none">{{ $school->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($school->website)
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-globe text-primary me-3 mt-1"></i>
                                    <div>
                                        <h6 class="mb-1">Website</h6>
                                        <p class="text-muted mb-0">
                                            <a href="{{ $school->website }}" target="_blank" class="text-decoration-none">{{ $school->website }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Office Hours -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Office Hours</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-2">
                                <strong>Monday - Friday:</strong>
                                <span class="float-end">8:00 AM - 5:00 PM</span>
                            </div>
                            <div class="mb-2">
                                <strong>Saturday:</strong>
                                <span class="float-end">9:00 AM - 2:00 PM</span>
                            </div>
                            <div class="mb-0">
                                <strong>Sunday:</strong>
                                <span class="float-end text-muted">Closed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Follow Us</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            <i class="fab fa-facebook-f me-2"></i>Facebook
                        </a>
                        <a href="#" class="btn btn-outline-info btn-sm">
                            <i class="fab fa-twitter me-2"></i>Twitter
                        </a>
                        <a href="#" class="btn btn-outline-danger btn-sm">
                            <i class="fab fa-instagram me-2"></i>Instagram
                        </a>
                        <a href="#" class="btn btn-outline-success btn-sm">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact-item {
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.contact-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.form-control:focus,
.form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
    transform: translateY(-1px);
}
</style>
@endsection
