@extends('layouts.website')

@section('title', 'Documents & Resources' . ((isset($settings['site_title']) && $settings['site_title']->value) ? (' - ' . $settings['site_title']->value) : ''))
@section('description', 'Access important school documents, forms, policies, newsletters, curriculum materials, and educational resources.')
@section('keywords', 'school documents, forms, policies, newsletters, curriculum, educational resources, Ghana primary school')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Documents & Resources</li>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Documents & Resources</h1>
                <p class="lead mb-4">Access important school documents, forms, policies, and resources.</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/documents-hero.svg') }}" alt="Documents" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<!-- Documents Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- Document Categories -->
                @foreach($categories as $category)
                    @if($documentsByCategory[$category]->count() > 0)
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-light">
                                <h4 class="mb-0">
                                    <i class="fas fa-folder-open text-primary me-2"></i>
                                    {{ ucfirst($category) }}
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($documentsByCategory[$category] as $document)
                                        <div class="col-md-6 mb-3">
                                            <div class="document-item p-3 border rounded h-100">
                                                <div class="d-flex align-items-start">
                                                    <div class="me-3">
                                                        @php
                                                            $icon = 'fas fa-file';
                                                            $iconClass = 'text-secondary';
                                                            if(str_contains($document->file_type, 'pdf')) {
                                                                $icon = 'fas fa-file-pdf';
                                                                $iconClass = 'text-danger';
                                                            } elseif(str_contains($document->file_type, 'image')) {
                                                                $icon = 'fas fa-file-image';
                                                                $iconClass = 'text-primary';
                                                            } elseif(str_contains($document->file_type, 'word')) {
                                                                $icon = 'fas fa-file-word';
                                                                $iconClass = 'text-info';
                                                            } elseif(str_contains($document->file_type, 'excel') || str_contains($document->file_type, 'sheet')) {
                                                                $icon = 'fas fa-file-excel';
                                                                $iconClass = 'text-success';
                                                            }
                                                        @endphp
                                                        <i class="{{ $icon }} {{ $iconClass }} fa-2x"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">{{ $document->title }}</h6>
                                                        @if($document->description)
                                                            <p class="text-muted small mb-2">{{ Str::limit($document->description, 100) }}</p>
                                                        @endif
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <small class="text-muted">
                                                                    {{ strtoupper(pathinfo($document->file_name, PATHINFO_EXTENSION)) }} •
                                                                    {{ $document->file_size_human }}
                                                                </small>
                                                            </div>
                                                            <a href="{{ route('documents.download', $document) }}"
                                                               class="btn btn-sm btn-primary">
                                                                <i class="fas fa-download me-1"></i>Download
                                                            </a>
                                                        </div>
                                                        <div class="mt-1">
                                                            <small class="text-muted">
                                                                Downloaded {{ $document->download_count }} times
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                @if(collect($documentsByCategory)->flatten()->count() == 0)
                    <div class="text-center py-5">
                        <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">No documents available yet</h4>
                        <p class="text-muted">Please check back later for important school documents and resources.</p>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <!-- Recent Documents -->
                @if($recentDocuments->count() > 0)
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-clock text-primary me-2"></i>Recent Documents
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach($recentDocuments as $document)
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2">
                                        @php
                                            $icon = 'fas fa-file';
                                            if(str_contains($document->file_type, 'pdf')) $icon = 'fas fa-file-pdf text-danger';
                                            elseif(str_contains($document->file_type, 'image')) $icon = 'fas fa-file-image text-primary';
                                            elseif(str_contains($document->file_type, 'word')) $icon = 'fas fa-file-word text-info';
                                            elseif(str_contains($document->file_type, 'excel') || str_contains($document->file_type, 'sheet')) $icon = 'fas fa-file-excel text-success';
                                        @endphp
                                        <i class="{{ $icon }}"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ Str::limit($document->title, 30) }}</h6>
                                        <small class="text-muted">{{ $document->created_at->diffForHumans() }}</small>
                                    </div>
                                    <a href="{{ route('documents.download', $document) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Help Card -->
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Need Help?</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-3">Can't find the document you're looking for?</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.document-item {
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.document-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    background: white;
}

.hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
}
</style>
@endpush
