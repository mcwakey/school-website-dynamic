@extends('layouts.admin')

@section('title', 'Create News Article')

@section('page-title', 'Create News Article')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">News</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                  id="excerpt"
                                  name="excerpt"
                                  rows="3"
                                  placeholder="Brief summary of the article...">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Optional excerpt that will be shown in article previews.</small>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror"
                                  id="content"
                                  name="content"
                                  rows="15"
                                  required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Featured Image</label>
                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               id="image"
                               name="image"
                               accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Upload an image (JPG, PNG, GIF). Max size: 2MB.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Article
                        </button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Publication Settings</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="published_at" class="form-label">Publish Date</label>
                    <input type="datetime-local"
                           class="form-control @error('published_at') is-invalid @enderror"
                           id="published_at"
                           name="published_at"
                           value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                    @error('published_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input"
                           type="checkbox"
                           id="is_published"
                           name="is_published"
                           value="1"
                           {{ old('is_published', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">
                        Publish immediately
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           id="is_featured"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">
                        Feature this article
                    </label>
                    <small class="form-text text-muted">Featured articles appear on the homepage.</small>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h5 class="mb-0">Tips</h5>
            </div>
            <div class="card-body">
                <ul class="mb-0 ps-3">
                    <li class="mb-2">Write a compelling title that grabs attention</li>
                    <li class="mb-2">Add an excerpt to give readers a preview</li>
                    <li class="mb-2">Use clear, simple language for better readability</li>
                    <li class="mb-2">Include relevant images to make the article more engaging</li>
                    <li>Feature important announcements on the homepage</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-resize textarea
    const textarea = document.getElementById('content');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });

    // Preview image upload
    const imageInput = document.getElementById('image');
    imageInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];
            if (file.size > 2 * 1024 * 1024) {
                alert('File size should not exceed 2MB');
                this.value = '';
            }
        }
    });
});
</script>
@endpush
