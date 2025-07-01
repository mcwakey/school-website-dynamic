@extends('layouts.admin')

@section('title', 'View Hero Slide')

@section('page-title', $heroSlide->title ?: 'Hero Slide #' . $heroSlide->id)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.hero-slides.index') }}">Hero Slides</a></li>
    <li class="breadcrumb-item active">{{ Str::limit($heroSlide->title ?: 'Slide #' . $heroSlide->id, 30) }}</li>
@endsection

@section('page-actions')
    <div class="d-flex gap-2">
        <a href="{{ route('admin.hero-slides.edit', $heroSlide) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <form action="{{ route('admin.hero-slides.destroy', $heroSlide) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this hero slide?')">
                <i class="fas fa-trash me-2"></i>Delete
            </button>
        </form>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                @if($heroSlide->image_path)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $heroSlide->image_path) }}"
                             class="img-fluid rounded"
                             style="max-height: 500px; width: 100%; object-fit: cover;">
                    </div>
                @endif

                <div class="mb-4">
                    @if($heroSlide->title)
                        <h1 class="h3 mb-3">{{ $heroSlide->title }}</h1>
                    @endif

                    @if($heroSlide->subtitle)
                        <h2 class="h5 text-muted mb-3">{{ $heroSlide->subtitle }}</h2>
                    @endif

                    <div class="d-flex flex-wrap gap-3 mb-3 text-muted">
                        <span><i class="fas fa-sort-numeric-down me-1"></i> Order: {{ $heroSlide->order ?? 'Not set' }}</span>
                        <span><i class="fas fa-eye me-1"></i> Status:
                            <span class="badge bg-{{ $heroSlide->is_active ? 'success' : 'secondary' }}">
                                {{ $heroSlide->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </span>
                    </div>
                </div>

                @if($heroSlide->description)
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Description</h6>
                        <div class="content">
                            {!! nl2br(e($heroSlide->description)) !!}
                        </div>
                    </div>
                @endif

                @if($heroSlide->button_text && $heroSlide->button_url)
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Call to Action</h6>
                        <div class="d-flex align-items-center gap-3">
                            <a href="{{ $heroSlide->button_url }}"
                               class="btn btn-primary"
                               target="_blank">
                                {{ $heroSlide->button_text }}
                            </a>
                            <small class="text-muted">Links to: {{ $heroSlide->button_url }}</small>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Slide Details</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td class="fw-bold">Status:</td>
                        <td>
                            <span class="badge bg-{{ $heroSlide->is_active ? 'success' : 'secondary' }}">
                                {{ $heroSlide->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Display Order:</td>
                        <td>{{ $heroSlide->order ?? 'Not set' }}</td>
                    </tr>
                    @if($heroSlide->button_text)
                        <tr>
                            <td class="fw-bold">Button Text:</td>
                            <td>{{ $heroSlide->button_text }}</td>
                        </tr>
                    @endif
                    @if($heroSlide->button_url)
                        <tr>
                            <td class="fw-bold">Button URL:</td>
                            <td>
                                <a href="{{ $heroSlide->button_url }}" target="_blank" class="text-decoration-none">
                                    {{ Str::limit($heroSlide->button_url, 30) }}
                                    <i class="fas fa-external-link-alt ms-1"></i>
                                </a>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td class="fw-bold">Created:</td>
                        <td>{{ $heroSlide->created_at->format('M d, Y \a\t g:i A') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Last Updated:</td>
                        <td>{{ $heroSlide->updated_at->format('M d, Y \a\t g:i A') }}</td>
                    </tr>
                    @if($heroSlide->image_path)
                        <tr>
                            <td class="fw-bold">Has Image:</td>
                            <td><i class="fas fa-check text-success"></i> Yes</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

        @if($heroSlide->is_active)
            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-home me-2"></i>Homepage Display</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">This slide is active and displayed on the homepage.</p>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-eye me-2"></i>View Homepage
                    </a>
                </div>
            </div>
        @endif

        <!-- Slide Preview Card -->
        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-desktop me-2"></i>Slide Preview</h6>
            </div>
            <div class="card-body">
                <div class="position-relative bg-dark text-white rounded p-3"
                     style="min-height: 150px;
                            @if($heroSlide->image_path)
                                background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('storage/' . $heroSlide->image_path) }}');
                                background-size: cover;
                                background-position: center;
                            @endif">
                    <div class="d-flex flex-column justify-content-center h-100">
                        @if($heroSlide->title)
                            <h6 class="fw-bold mb-1">{{ Str::limit($heroSlide->title, 40) }}</h6>
                        @endif
                        @if($heroSlide->subtitle)
                            <p class="mb-2 small">{{ Str::limit($heroSlide->subtitle, 50) }}</p>
                        @endif
                        @if($heroSlide->button_text)
                            <span class="btn btn-primary btn-sm">{{ $heroSlide->button_text }}</span>
                        @endif
                    </div>
                </div>
                <small class="text-muted mt-2 d-block">Approximate homepage appearance</small>
            </div>
        </div>
    </div>
</div>
@endsection
