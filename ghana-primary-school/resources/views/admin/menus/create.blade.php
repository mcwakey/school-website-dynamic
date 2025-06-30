@extends('layouts.admin')

@section('title', 'Create Menu Item')

@section('page-title', 'Create Menu Item')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menus</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Menu Item</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.menus.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="location" class="form-label">Menu Location <span class="text-danger">*</span></label>
                                <select class="form-select @error('location') is-invalid @enderror"
                                        id="location" name="location" required>
                                    <option value="">Select Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location }}" {{ old('location') == $location ? 'selected' : '' }}>
                                            {{ ucfirst($location) }} Menu
                                        </option>
                                    @endforeach
                                </select>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent Menu (Optional)</label>
                                <select class="form-select @error('parent_id') is-invalid @enderror"
                                        id="parent_id" name="parent_id">
                                    <option value="">No Parent (Top Level)</option>
                                    @foreach($parentMenus as $parent)
                                        <option value="{{ $parent->id }}" {{ old('parent_id', request('parent_id')) == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->label }} ({{ ucfirst($parent->location) }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Select a parent to create a dropdown menu item</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Menu Name <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Unique identifier (e.g., home, about, contact)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="label" class="form-label">Display Label <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('label') is-invalid @enderror"
                                       id="label"
                                       name="label"
                                       value="{{ old('label') }}"
                                       required>
                                @error('label')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Text shown to visitors</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="url" class="form-label">URL <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('url') is-invalid @enderror"
                                       id="url"
                                       name="url"
                                       value="{{ old('url') }}"
                                       placeholder="/about or https://external-site.com"
                                       required>
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Relative URL (/page) or full URL (https://...)</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="target" class="form-label">Link Target</label>
                                <select class="form-select @error('target') is-invalid @enderror"
                                        id="target" name="target">
                                    <option value="_self" {{ old('target') == '_self' ? 'selected' : '' }}>Same Window</option>
                                    <option value="_blank" {{ old('target') == '_blank' ? 'selected' : '' }}>New Window/Tab</option>
                                </select>
                                @error('target')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon (Optional)</label>
                                <input type="text"
                                       class="form-control @error('icon') is-invalid @enderror"
                                       id="icon"
                                       name="icon"
                                       value="{{ old('icon') }}"
                                       placeholder="fas fa-home">
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Font Awesome icon class</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number"
                                       class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order"
                                       name="sort_order"
                                       value="{{ old('sort_order', 0) }}">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Lower numbers appear first</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="form-check mt-4">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="is_active"
                                           name="is_active"
                                           value="1"
                                           {{ old('is_active', 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (visible to visitors)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Menus
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Menu Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Help Card -->
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Quick Help</h5>
            </div>
            <div class="card-body">
                <h6>Common URL Examples:</h6>
                <ul class="small mb-3">
                    <li><code>/</code> - Homepage</li>
                    <li><code>/about</code> - About page</li>
                    <li><code>/contact</code> - Contact page</li>
                    <li><code>/news</code> - News listing</li>
                    <li><code>https://external.com</code> - External link</li>
                </ul>

                <h6>Popular Icons:</h6>
                <ul class="small mb-3">
                    <li><code>fas fa-home</code> - <i class="fas fa-home"></i> Home</li>
                    <li><code>fas fa-info-circle</code> - <i class="fas fa-info-circle"></i> About</li>
                    <li><code>fas fa-envelope</code> - <i class="fas fa-envelope"></i> Contact</li>
                    <li><code>fas fa-newspaper</code> - <i class="fas fa-newspaper"></i> News</li>
                    <li><code>fas fa-calendar</code> - <i class="fas fa-calendar"></i> Events</li>
                </ul>

                <h6>Menu Locations:</h6>
                <ul class="small">
                    <li><strong>Header:</strong> Main navigation menu</li>
                    <li><strong>Footer:</strong> Footer links section</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-generate name from label
document.getElementById('label').addEventListener('input', function() {
    const nameField = document.getElementById('name');
    if (!nameField.value || nameField.dataset.userModified !== 'true') {
        nameField.value = this.value.toLowerCase()
            .replace(/[^a-z0-9\s]/g, '')
            .replace(/\s+/g, '_');
    }
});

document.getElementById('name').addEventListener('input', function() {
    this.dataset.userModified = 'true';
});
</script>
@endsection
