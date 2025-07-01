@extends('layouts.admin')

@section('title', 'Add Photo')

@section('page-title', 'Add Photo to Gallery')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
    <li class="breadcrumb-item active">Add Photo</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="image_path" class="form-label">Photo <span class="text-danger">*</span></label>
                        <input type="file"
                               class="form-control @error('image_path') is-invalid @enderror"
                               id="image_path"
                               name="image_path"
                               accept="image/*"
                               required>
                        @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Upload an image (JPG, PNG, GIF). Max size: 2MB.</small>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Photo Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Enter a descriptive title for the photo">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text"
                               class="form-control @error('category') is-invalid @enderror"
                               id="category"
                               name="category"
                               value="{{ old('category') }}"
                               placeholder="e.g., Sports Day, Graduation, Classroom Activities">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Categories help organize photos in the gallery.</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="4"
                                  placeholder="Optional description about the photo...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Upload Photo
                        </button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
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
                <h5 class="mb-0">Photo Settings</h5>
            </div>
            <div class="card-body">
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           id="is_featured"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">
                        Feature this photo
                    </label>
                    <small class="form-text text-muted">Featured photos appear prominently on the homepage.</small>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h5 class="mb-0">Upload Tips</h5>
            </div>
            <div class="card-body">
                <ul class="mb-0 ps-3">
                    <li class="mb-2">Use high-quality photos for best results</li>
                    <li class="mb-2">Choose descriptive titles and categories</li>
                    <li class="mb-2">Add relevant descriptions for context</li>
                    <li class="mb-2">Feature special photos for homepage display</li>
                    <li>Keep file sizes under 2MB for faster loading</li>
                </ul>
            </div>
        </div>

        <!-- Preview Area -->
        <div class="card shadow-sm mt-3" id="preview-card" style="display: none;">
            <div class="card-header">
                <h5 class="mb-0">Preview</h5>
            </div>
            <div class="card-body">
                <img id="image-preview" class="img-fluid rounded" style="max-height: 200px;">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    const imageInput = document.getElementById('image_path');
    const previewCard = document.getElementById('preview-card');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];

            // Check file size
            if (file.size > 2 * 1024 * 1024) {
                alert('File size should not exceed 2MB');
                this.value = '';
                previewCard.style.display = 'none';
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewCard.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            previewCard.style.display = 'none';
        }
    });

    // Auto-suggest categories based on common school activities
    const categoryInput = document.getElementById('category');
    const commonCategories = [
        'Sports Day',
        'Graduation',
        'Classroom Activities',
        'Field Trip',
        'Cultural Day',
        'Science Fair',
        'Arts & Crafts',
        'Assembly',
        'Celebration',
        'Learning Activities'
    ];

    // You could implement autocomplete here if desired
});
</script>
@endpush
