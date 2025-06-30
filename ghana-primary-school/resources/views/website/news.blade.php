@extends('layouts.website')

@section('title', 'News & Announcements - ' . (isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School'))
@section('description', 'Stay updated with the latest news and announcements from our school.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">News & Announcements</h1>
                <p class="lead mb-4">Stay updated with the latest happenings at our school</p>
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
                    <article class="card h-100 shadow-sm">
                        @if($article->featured_image)
                            <img src="{{ asset('storage/' . $article->featured_image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-newspaper fa-4x text-muted"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                @if($article->is_featured)
                                    <span class="badge bg-accent text-white">Featured</span>
                                @endif
                                <small class="text-muted ms-2">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                                </small>
                            </div>

                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($article->excerpt ?: strip_tags($article->content), 150) }}</p>

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
