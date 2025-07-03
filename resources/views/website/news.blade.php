@extends('layouts.website')

@section('title', 'News & Announcements - ' . (isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School'))
@section('description', 'Stay updated with the latest news and announcements from our school.')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">News & Events</li>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-light text-primary fs-6 px-3 py-2 rounded-pill mb-3">Stay Informed</span>
                <h1 class="display-4 fw-bold mb-3">News & Announcements</h1>
                <p class="lead mb-4">Stay updated with the latest happenings, achievements, and important announcements from our school community</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/news-hero.svg') }}" alt="News & Announcements" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<!-- News Content -->
<section class="py-5">
    <div class="container">
        @if($news->count() > 0)
            <div class="row g-4">
                @foreach($news as $article)
                <div class="col-lg-4 col-md-6">
                    <article class="modern-card h-100 news-card">
                        <div class="card-image-wrapper">
                            @if($article->featured_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($article->featured_image))
                                <img src="{{ asset('storage/' . $article->featured_image) }}" class="card-img-top" alt="{{ $article->title }}">
                            @else
                                <div class="card-img-placeholder">
                                    <div class="placeholder-icon">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                </div>
                            @endif
                            <div class="card-badge">
                                @if($article->is_featured)
                                    <span class="badge bg-accent">
                                        <i class="fas fa-star me-1"></i>Featured
                                    </span>
                                @else
                                    <span class="badge bg-primary">
                                        <i class="fas fa-bullhorn me-1"></i>News
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit($article->excerpt ?: strip_tags($article->content), 150) }}</p>

                            <div class="card-meta">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="meta-icon">
                                        <i class="fas fa-calendar text-primary"></i>
                                    </div>
                                    <small class="text-muted ms-2">
                                        {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                                    </small>
                                </div>

                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>
                                    {{ $article->user->name }}
                                </small>
                                <a href="{{ route('news.show', $article->slug) }}" class="btn btn-outline-primary btn-sm">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-5x text-muted mb-3"></i>
                <h4 class="text-muted">No News Available</h4>
                <p class="text-muted">Check back later for the latest news and announcements.</p>
            </div>
        @endif
    </div>
</section>

<!-- Newsletter Signup -->
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="section-title">Stay Updated</h3>
                <p class="lead mb-4">Never miss important school announcements and news</p>
                <form class="row g-3 justify-content-center">
                    <div class="col-md-6">
                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email address" required>
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-envelope me-2"></i>Subscribe
                        </button>
                    </div>
                </form>
                <small class="text-muted">We respect your privacy and will never spam you.</small>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
    /* Modern News Page Styles */
    .bg-primary-gradient {
        background: linear-gradient(135deg, #e74c25 0%, #2c5530 100%);
    }

    .modern-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        background: #fff;
    }

    .modern-card.news-card {
        padding: 1.5rem 1.5rem 1rem 1.5rem;
        margin-bottom: 1.5rem;
        border-radius: 1.25rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.10);
        background: #fff;
        display: flex;
        flex-direction: column;
        min-height: 420px;
    }

    .news-card .card-image-wrapper {
        margin-bottom: 1rem;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(231, 76, 37, 0.08);
    }

    .news-card .card-img-top {
        border-radius: 0.75rem;
        min-height: 180px;
        max-height: 220px;
        object-fit: cover;
        width: 100%;
    }

    .news-card .card-img-placeholder {
        border-radius: 0.75rem;
        min-height: 180px;
        max-height: 220px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .news-card .placeholder-icon {
        width: 60px;
        height: 60px;
        background: rgba(231, 76, 37, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #e74c25;
        font-size: 1.5rem;
    }

    .news-card .card-title {
        margin-bottom: 0.75rem;
        font-size: 1.15rem;
    }

    .news-card .card-text {
        margin-bottom: 1.25rem;
        font-size: 1rem;
    }

    .news-card .card-meta {
        border-top: 1px solid rgba(0, 0, 0, 0.07);
        padding-top: 0.75rem;
        margin-top: 1rem;
    }

    .news-card .card-badge {
        top: 0.75rem;
        right: 0.75rem;
    }

    .news-card .btn {
        padding: 0.4rem 1.1rem;
        font-size: 0.95rem;
        border-radius: 0.5rem;
    }

    .news-card .meta-icon {
        margin-right: 0.5rem;
    }

    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
    }

    /* Newsletter section */
    .bg-light-custom {
        background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
    }
</style>
@endpush
