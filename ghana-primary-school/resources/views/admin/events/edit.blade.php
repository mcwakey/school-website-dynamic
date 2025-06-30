@extends('layouts.admin')

@section('title', 'Edit Event')

@section('page-title', 'Edit Event')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('page-actions')
    <a href="{{ route('events.show', $event->slug) }}" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-eye me-2"></i>View Event
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title', $event->title) }}"
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
                                       value="{{ old('event_date', $event->event_date) }}"
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
                                       value="{{ old('event_time', $event->event_time) }}">
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
                               value="{{ old('location', $event->location) }}"
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
                                  placeholder="Describe the event details, activities, requirements, etc.">{{ old('description', $event->description) }}</textarea>
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
                               value="{{ old('event_url', $event->event_url) }}"
                               placeholder="https://example.com">
                        @error('event_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Optional link to event registration, more info, etc.</small>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Event Image</label>
                        @if($event->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $event->image) }}"
                                     class="img-thumbnail"
                                     style="max-height: 150px;">
                                <p class="small text-muted mt-1">Current image</p>
                            </div>
                        @endif
                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               id="image"
                               name="image"
                               accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Upload a new image to replace the current one. Max size: 2MB.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Event
                        </button>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
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
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           id="is_published"
                           name="is_published"
                           value="1"
                           {{ old('is_published', $event->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">
                        Published
                    </label>
                    <small class="form-text text-muted">Published events appear on the website.</small>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h5 class="mb-0">Event Info</h5>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Created:</strong> {{ $event->created_at->format('M d, Y g:i A') }}</p>
                <p class="mb-2"><strong>Updated:</strong> {{ $event->updated_at->format('M d, Y g:i A') }}</p>
                <p class="mb-0"><strong>Slug:</strong> <code>{{ $event->slug }}</code></p>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Danger Zone</h5>
            </div>
            <div class="card-body">
                <p class="mb-3">Delete this event permanently. This action cannot be undone.</p>
                <button type="button"
                        class="btn btn-danger btn-sm"
                        onclick="deleteEvent()">
                    <i class="fas fa-trash me-2"></i>Delete Event
                </button>

                <form id="delete-form"
                      action="{{ route('admin.events.destroy', $event) }}"
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

function deleteEvent() {
    if (confirm('Are you sure you want to delete this event? This action cannot be undone.')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
@endpush
