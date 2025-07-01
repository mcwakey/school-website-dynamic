@extends('layouts.website')

@section('title', 'Search Results')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Search Results</h1>
                @if($query)
                    <p class="lead mb-4">Results for: "{{ $query }}"</p>
                @else
                    <p class="lead mb-4">Find what you're looking for</p>
                @endif
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/search-hero.svg') }}" alt="Search Results" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            @if(strlen($query) < 2)
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Please enter at least 2 characters to search.
                </div>
            @elseif($results->count() > 0)
                <h4 class="mb-4">Found {{ $results->count() }} result(s)</h4>

                @foreach($results as $result)
                    <div class="card search-result-card mb-3">
                        <div class="card-body">
                            <div class="row">
                                @if($result->type === 'news' && $result->image)
                                    <div class="col-md-3">
                                        <img src="{{ asset('storage/' . $result->image) }}"
                                             class="img-fluid rounded"
                                             style="height: 100px; object-fit: cover; width: 100%;">
                                    </div>
                                    <div class="col-md-9">
                                @elseif($result->type === 'event' && $result->image)
                                    <div class="col-md-3">
                                        <img src="{{ asset('storage/' . $result->image) }}"
                                             class="img-fluid rounded"
                                             style="height: 100px; object-fit: cover; width: 100%;">
                                    </div>
                                    <div class="col-md-9">
                                @elseif($result->type === 'gallery' && $result->image_path)
                                    <div class="col-md-3">
                                        <img src="{{ asset('storage/' . $result->image_path) }}"
                                             class="img-fluid rounded"
                                             style="height: 100px; object-fit: cover; width: 100%;">
                                    </div>
                                    <div class="col-md-9">
                                @else
                                    <div class="col-12">
                                @endif

                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-{{ $result->type === 'news' ? 'primary' : ($result->type === 'event' ? 'info' : 'secondary') }}">
                                        {{ ucfirst($result->type) }}
                                    </span>
                                    <small class="text-muted">
                                        @if($result->type === 'news')
                                            {{ $result->created_at->format('M d, Y') }}
                                        @elseif($result->type === 'event')
                                            {{ \Carbon\Carbon::parse($result->event_date)->format('M d, Y') }}
                                        @else
                                            {{ $result->created_at->format('M d, Y') }}
                                        @endif
                                    </small>
                                </div>

                                <h5 class="card-title">
                                    @if($result->type === 'news')
                                        <a href="{{ route('news.show', $result->slug) }}" class="text-decoration-none">
                                            {{ $result->title }}
                                        </a>
                                    @elseif($result->type === 'event')
                                        <a href="{{ route('events.show', $result->slug) }}" class="text-decoration-none">
                                            {{ $result->title }}
                                        </a>
                                    @else
                                        {{ $result->title }}
                                    @endif
                                </h5>

                                <p class="card-text text-muted">
                                    @if($result->type === 'news')
                                        {{ Str::limit($result->excerpt ?: strip_tags($result->content), 150) }}
                                    @elseif($result->type === 'event')
                                        {{ Str::limit($result->description, 150) }}
                                        @if($result->location)
                                            <br><small><i class="fas fa-map-marker-alt me-1"></i>{{ $result->location }}</small>
                                        @endif
                                    @else
                                        {{ Str::limit($result->description, 150) }}
                                        @if($result->category)
                                            <br><small><i class="fas fa-tag me-1"></i>{{ $result->category }}</small>
                                        @endif
                                    @endif
                                </p>

                                @if($result->type !== 'gallery')
                                    <a href="{{ $result->type === 'news' ? route('news.show', $result->slug) : route('events.show', $result->slug) }}"
                                       class="btn btn-outline-primary btn-sm">
                                        Read More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">No Results Found</h4>
                    <p class="text-muted mb-4">We couldn't find anything matching "{{ $query }}". Try different keywords or browse our sections.</p>

                    <div class="row mt-4">
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('news') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-newspaper me-2"></i>Browse News
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('events') }}" class="btn btn-outline-info w-100">
                                <i class="fas fa-calendar me-2"></i>Browse Events
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('gallery') }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-images me-2"></i>Browse Gallery
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('contact') }}" class="btn btn-outline-success w-100">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            <!-- Search Box -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-search me-2"></i>Search</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <input type="text"
                                   class="form-control"
                                   name="q"
                                   value="{{ $query }}"
                                   placeholder="Enter search terms..."
                                   required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-link me-2"></i>Quick Links</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('about') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-info-circle me-2"></i>About Us
                        </a>
                        <a href="{{ route('programs') }}" class="btn btn-outline-success btn-sm">
                            <i class="fas fa-graduation-cap me-2"></i>Academic Programs
                        </a>
                        <a href="{{ route('news') }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-newspaper me-2"></i>Latest News
                        </a>
                        <a href="{{ route('events') }}" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-calendar me-2"></i>Upcoming Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.search-result-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.search-result-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
</style>
@endsection
