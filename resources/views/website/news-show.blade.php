@extends('layouts.website')

@section('title', $article->title . ' - ' . (isset($settings['site_name']) ? $settings['site_name']->value : 'Ghana Excellence Primary School'))
@section('description', $article->excerpt ?: Str::limit(strip_tags($article->content), 160))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('news') }}" class="text-decoration-none">News</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($article->title, 50) }}</li>
@endsection

@section('content')

<!-- Article Header -->
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="mb-3">
                    @if($article->is_featured)
                        <span class="badge bg-accent text-white me-2">Featured</span>
                    @endif
                    <span class="text-muted">
                        <i class="fas fa-calendar me-1"></i>
                        {{ $article->published_at ? $article->published_at->format('F d, Y') : $article->created_at->format('F d, Y') }}
                    </span>
                    <span class="text-muted ms-3">
                        <i class="fas fa-user me-1"></i>
                        {{ $article->user->name }}
                    </span>
                </div>

                <h1 class="display-6 fw-bold mb-4">{{ $article->title }}</h1>

                @if($article->excerpt)
                    <p class="lead text-muted">{{ $article->excerpt }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if($article->featured_image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $article->featured_image) }}" class="img-fluid rounded" alt="{{ $article->title }}">
                    </div>
                @endif

                <div class="article-content">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <!-- Social Share -->
                <div class="border-top pt-4 mt-5">
                    <h6 class="fw-bold mb-3">Share this article:</h6>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                            <i class="fab fa-facebook-f me-1"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" target="_blank" class="btn btn-outline-info btn-sm">
                            <i class="fab fa-twitter me-1"></i>Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                            <i class="fab fa-whatsapp me-1"></i>WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top">
                    <a href="{{ route('news') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to News
                    </a>
                    <div class="text-end">
                        <small class="text-muted">Published {{ $article->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles -->
@if($relatedNews->count() > 0)
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h3 class="section-title mb-4">Related Articles</h3>
                <div class="row g-4">
                    @foreach($relatedNews as $related)
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            @if($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}" class="card-img-top" alt="{{ $related->title }}" style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-newspaper fa-3x text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h6 class="card-title">{{ $related->title }}</h6>
                                <p class="card-text small">{{ Str::limit($related->excerpt ?: strip_tags($related->content), 100) }}</p>
                                <a href="{{ route('news.show', $related->slug) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<style>
    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }
</style>
@endpush
