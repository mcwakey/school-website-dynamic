@extends('layouts.website')

@section('title', $event->title)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('events') }}" class="text-decoration-none">Events</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($event->title, 50) }}</li>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="text-white mb-4 fw-bold">{{ $event->title }}</h1>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                @if($event->featured_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($event->featured_image))
                    <img src="{{ asset('storage/' . $event->featured_image) }}"
                         class="card-img-top"
                         alt="{{ $event->title }}"
                         style="height: 400px; object-fit: cover;">
                @endif

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-alt text-primary me-2"></i>
                                <strong>Date:</strong>
                                <span class="ms-2">{{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</span>
                            </div>
                            @if($event->event_time)
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-clock text-primary me-2"></i>
                                    <strong>Time:</strong>
                                    <span class="ms-2">{{ \Carbon\Carbon::parse($event->event_time)->format('g:i A') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if($event->location)
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <strong>Location:</strong>
                                    <span class="ms-2">{{ $event->location }}</span>
                                </div>
                            @endif
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-check text-primary me-2"></i>
                                <strong>Status:</strong>
                                <span class="ms-2">
                                    @if(\Carbon\Carbon::parse($event->event_date)->isFuture())
                                        <span class="badge bg-success">Upcoming</span>
                                    @else
                                        <span class="badge bg-secondary">Past Event</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="content mt-4">
                        {!! nl2br(e($event->description)) !!}
                    </div>

                    @if($event->event_url)
                        <div class="mt-4 p-3 bg-light rounded">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-external-link-alt text-primary me-2"></i>
                                <strong>Related Link:</strong>
                                <a href="{{ $event->event_url }}"
                                   target="_blank"
                                   class="ms-2 text-decoration-none">
                                    Visit Event Page <i class="fas fa-external-link-alt ms-1 small"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Navigation -->
            <div class="mt-4">
                <a href="{{ route('events') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Events
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Upcoming Events Sidebar -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Upcoming Events</h5>
                </div>
                <div class="card-body">
                    @php
                        $upcomingEvents = App\Models\Event::published()
                            ->where('id', '!=', $event->id)
                            ->where('event_date', '>=', now())
                            ->orderBy('event_date')
                            ->limit(5)
                            ->get();
                    @endphp

                    @if($upcomingEvents->count() > 0)
                        @foreach($upcomingEvents as $upcomingEvent)
                            <div class="mb-3 pb-3 @if(!$loop->last) border-bottom @endif">
                                <h6 class="mb-1">
                                    <a href="{{ route('events.show', $upcomingEvent->slug) }}"
                                       class="text-decoration-none">
                                        {{ Str::limit($upcomingEvent->title, 50) }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($upcomingEvent->event_date)->format('M d, Y') }}
                                </small>
                            </div>
                        @endforeach

                        <div class="text-center mt-3">
                            <a href="{{ route('events') }}" class="btn btn-sm btn-outline-primary">
                                View All Events
                            </a>
                        </div>
                    @else
                        <p class="text-muted text-center">No upcoming events scheduled.</p>
                    @endif
                </div>
            </div>

            <!-- Share Event -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-share me-2"></i>Share Event</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank"
                           class="btn btn-primary btn-sm">
                            <i class="fab fa-facebook-f me-2"></i>Share on Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($event->title) }}"
                           target="_blank"
                           class="btn btn-info btn-sm">
                            <i class="fab fa-twitter me-2"></i>Share on Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($event->title . ' - ' . request()->url()) }}"
                           target="_blank"
                           class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp me-2"></i>Share on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
