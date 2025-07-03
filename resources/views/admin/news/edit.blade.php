@extends('layouts.admin')

@section('title', 'Edit News Article')

@section('page-title', 'Edit News Article')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">News</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('page-actions')
    <a href="{{ route('news.show', $news->slug) }}" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-eye me-2"></i>View Article
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title', $news->title) }}"
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
                                  placeholder="Brief summary of the article...">{{ old('excerpt', $news->excerpt) }}</textarea>
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
                                  required>{{ old('content', $news->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Featured Image</label>
                        @if($news->featured_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $news->featured_image) }}"
                                     class="img-thumbnail"
                                     style="max-height: 150px;">
                                <p class="small text-muted mt-1">Current image</p>
                            </div>
                        @endif
                        <input type="file"
                               class="form-control @error('featured_image') is-invalid @enderror"
                               id="featured_image"
                               name="featured_image"
                               accept="image/*">
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Upload a new image to replace the current one. Max size: 2MB.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Article
                        </button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
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
                           value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
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
                           {{ old('is_published', $news->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">
                        Published
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           id="is_featured"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">
                        Feature this article
                    </label>
                    <small class="form-text text-muted">Featured articles appear on the homepage.</small>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h5 class="mb-0">Article Info</h5>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Created:</strong> {{ $news->created_at->format('M d, Y g:i A') }}</p>
                <p class="mb-2"><strong>Updated:</strong> {{ $news->updated_at->format('M d, Y g:i A') }}</p>
                <p class="mb-2"><strong>Author:</strong> {{ $news->author->name ?? 'N/A' }}</p>
                <p class="mb-0"><strong>Slug:</strong> <code>{{ $news->slug }}</code></p>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Danger Zone</h5>
            </div>
            <div class="card-body">
                <p class="mb-3">Delete this article permanently. This action cannot be undone.</p>
                <button type="button"
                        class="btn btn-danger btn-sm"
                        onclick="deleteArticle()">
                    <i class="fas fa-trash me-2"></i>Delete Article
                </button>

                <form id="delete-form"
                      action="{{ route('admin.news.destroy', $news) }}"
                      method="POST"
                      class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
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

function deleteArticle() {
    if (confirm('Are you sure you want to delete this article? This action cannot be undone.')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
@endpush
