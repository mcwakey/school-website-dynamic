@extends('layouts.admin')

@section('title', 'Create Event')

@section('page-title', 'Create Event')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="event_date" class="form-label">Event Date <span class="text-danger">*</span></label>
                                <input type="date"
                                       class="form-control @error('event_date') is-invalid @enderror"
                                       id="event_date"
                                       name="event_date"
                                       value="{{ old('event_date') }}"
                                       required>
                                @error('event_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="event_time" class="form-label">Event Time</label>
                                <input type="time"
                                       class="form-control @error('event_time') is-invalid @enderror"
                                       id="event_time"
                                       name="event_time"
                                       value="{{ old('event_time') }}">
                                @error('event_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text"
                               class="form-control @error('location') is-invalid @enderror"
                               id="location"
                               name="location"
                               value="{{ old('location') }}"
                               placeholder="School Hall, Classroom A, etc.">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Event Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="8"
                                  required
                                  placeholder="Describe the event details, activities, requirements, etc.">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="event_url" class="form-label">Related Link</label>
                        <input type="url"
                               class="form-control @error('event_url') is-invalid @enderror"
                               id="event_url"
                               name="event_url"
                               value="{{ old('event_url') }}"
                               placeholder="https://example.com">
                        @error('event_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Optional link to event registration, more info, etc.</small>
                    </div>

                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Event Image</label>
                        <input type="file"
                               class="form-control @error('featured_image') is-invalid @enderror"
                               id="featured_image"
                               name="featured_image"
                               accept="image/*">
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Upload an image (JPG, PNG, GIF). Max size: 2MB.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Event
                        </button>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
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
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           id="is_published"
                           name="is_published"
                           value="1"
                           {{ old('is_published', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">
                        Publish immediately
                    </label>
                    <small class="form-text text-muted">Published events appear on the website.</small>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h5 class="mb-0">Event Tips</h5>
            </div>
            <div class="card-body">
                <ul class="mb-0 ps-3">
                    <li class="mb-2">Use a clear, descriptive title</li>
                    <li class="mb-2">Include date and time for accuracy</li>
                    <li class="mb-2">Specify the location clearly</li>
                    <li class="mb-2">Add relevant details and requirements</li>
                    <li class="mb-2">Include registration links if needed</li>
                    <li>Use engaging images to attract attention</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date to today
    const dateInput = document.getElementById('event_date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);

    // Auto-resize textarea
    const textarea = document.getElementById('description');
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
