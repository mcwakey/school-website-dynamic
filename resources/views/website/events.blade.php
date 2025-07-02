@extends('layouts.website')

@section('title', 'Events')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Events</li>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">School Events</h1>
                <p class="lead mb-4">Stay updated with all our exciting school activities and events</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/events-hero.svg') }}" alt="School Events" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            @if($events->count() > 0)
                <div class="row">
                    @foreach($events as $event)
                        <div class="col-lg-6 mb-4">
                            <div class="card event-card h-100 shadow-sm">
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}"
                                         class="card-img-top"
                                         alt="{{ $event->title }}"
                                         style="height: 250px; object-fit: cover;">
                                @else
                                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                         style="height: 250px;">
                                        <i class="fas fa-calendar-alt fa-3x text-muted"></i>
                                    </div>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <span class="badge bg-primary">
                                                {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}
                                            </span>
                                            @if($event->event_time)
                                                <span class="badge bg-secondary">
                                                    {{ \Carbon\Carbon::parse($event->event_time)->format('g:i A') }}
                                                </span>
                                            @endif
                                        </div>
                                        @if($event->location)
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-1"></i>{{ $event->location }}
                                            </small>
                                        @endif
                                    </div>

                                    <h5 class="card-title">
                                        <a href="{{ route('events.show', $event->slug) }}"
                                           class="text-decoration-none text-dark">
                                            {{ $event->title }}
                                        </a>
                                    </h5>

                                    <p class="card-text flex-grow-1">
                                        {{ Str::limit(strip_tags($event->description), 120) }}
                                    </p>

                                    <div class="mt-auto">
                                        <a href="{{ route('events.show', $event->slug) }}"
                                           class="btn btn-outline-primary btn-sm">
                                            Read More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $events->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-calendar-alt fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">No Events Yet</h4>
                    <p class="text-muted">Check back soon for upcoming school events!</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.event-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}
</style>
@endsection
