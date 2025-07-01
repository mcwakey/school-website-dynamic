@extends('layouts.admin')

@section('title', 'Edit Menu Item')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Edit Menu Item</h1>
                <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Menus
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Menu Item Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                    <select name="location" id="location" class="form-control @error('location') is-invalid @enderror" required>
                                        <option value="">Select Location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location }}" {{ old('location', $menu->location) === $location ? 'selected' : '' }}>
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
                                <div class="form-group mb-3">
                                    <label for="parent_id" class="form-label">Parent Menu</label>
                                    <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                        <option value="">No Parent (Top Level)</option>
                                        @foreach($parentMenus as $parentMenu)
                                            <option value="{{ $parentMenu->id }}" {{ old('parent_id', $menu->parent_id) == $parentMenu->id ? 'selected' : '' }}>
                                                {{ $parentMenu->label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Menu Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $menu->name) }}"
                                           required>
                                    <small class="form-text text-muted">Internal identifier for the menu item</small>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="label" class="form-label">Display Label <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="label"
                                           id="label"
                                           class="form-control @error('label') is-invalid @enderror"
                                           value="{{ old('label', $menu->label) }}"
                                           required>
                                    <small class="form-text text-muted">Text shown to visitors</small>
                                    @error('label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="url" class="form-label">URL <span class="text-danger">*</span></label>
                                    <input type="url"
                                           name="url"
                                           id="url"
                                           class="form-control @error('url') is-invalid @enderror"
                                           value="{{ old('url', $menu->url) }}"
                                           required>
                                    <small class="form-text text-muted">Full URL or relative path (e.g., /about, https://example.com)</small>
                                    @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="target" class="form-label">Link Target <span class="text-danger">*</span></label>
                                    <select name="target" id="target" class="form-control @error('target') is-invalid @enderror" required>
                                        <option value="_self" {{ old('target', $menu->target) === '_self' ? 'selected' : '' }}>Same Window</option>
                                        <option value="_blank" {{ old('target', $menu->target) === '_blank' ? 'selected' : '' }}>New Window</option>
                                    </select>
                                    @error('target')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="icon" class="form-label">Icon (Optional)</label>
                                    <input type="text"
                                           name="icon"
                                           id="icon"
                                           class="form-control @error('icon') is-invalid @enderror"
                                           value="{{ old('icon', $menu->icon) }}"
                                           placeholder="fas fa-home">
                                    <small class="form-text text-muted">FontAwesome icon class (e.g., fas fa-home)</small>
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="sort_order" class="form-label">Sort Order</label>
                                    <input type="number"
                                           name="sort_order"
                                           id="sort_order"
                                           class="form-control @error('sort_order') is-invalid @enderror"
                                           value="{{ old('sort_order', $menu->sort_order) }}"
                                           min="0"
                                           step="1">
                                    <small class="form-text text-muted">Lower numbers appear first</small>
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input type="checkbox"
                                       name="is_active"
                                       id="is_active"
                                       class="form-check-input"
                                       value="1"
                                       {{ old('is_active', $menu->is_active) ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">
                                    Active (visible to visitors)
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Menu Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Menu Preview</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle"></i> Current Menu Item</h6>
                        <p class="mb-2"><strong>Location:</strong> {{ ucfirst($menu->location) }} Menu</p>
                        <p class="mb-2"><strong>Label:</strong> {{ $menu->label }}</p>
                        <p class="mb-2"><strong>URL:</strong> {{ $menu->url }}</p>
                        <p class="mb-2"><strong>Status:</strong>
                            <span class="badge {{ $menu->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $menu->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                        @if($menu->parent)
                            <p class="mb-0"><strong>Parent:</strong> {{ $menu->parent->label }}</p>
                        @endif
                    </div>

                    @if($menu->children->count() > 0)
                        <div class="alert alert-warning">
                            <h6><i class="fas fa-exclamation-triangle"></i> Child Items</h6>
                            <p class="mb-2">This menu item has {{ $menu->children->count() }} child item(s):</p>
                            <ul class="mb-0">
                                @foreach($menu->children as $child)
                                    <li>{{ $child->label }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="alert alert-light">
                        <h6><i class="fas fa-lightbulb"></i> Tips</h6>
                        <ul class="mb-0 small">
                            <li>Use sort order to control menu sequence</li>
                            <li>Child menus will appear as dropdowns</li>
                            <li>Icons are optional but enhance navigation</li>
                            <li>Test links in a new tab to verify URLs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-generate name from label
    document.getElementById('label').addEventListener('input', function() {
        const label = this.value;
        const nameField = document.getElementById('name');

        // Only auto-generate if name field is empty
        if (!nameField.value) {
            const name = label.toLowerCase()
                             .replace(/[^a-z0-9\s]/g, '')
                             .replace(/\s+/g, '_')
                             .trim();
            nameField.value = name;
        }
    });

    // URL validation helper
    document.getElementById('url').addEventListener('blur', function() {
        const url = this.value.trim();
        if (url && !url.startsWith('/') && !url.startsWith('http://') && !url.startsWith('https://')) {
            this.value = '/' + url;
        }
    });
</script>
@endpush
