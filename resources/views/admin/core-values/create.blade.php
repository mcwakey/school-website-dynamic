@extends('layouts.admin')

@section('title', 'Add Core Value')

@section('page-title', 'Add Core Value')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.core-values.index') }}">Core Values</a></li>
    <li class="breadcrumb-item active">Add New</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.core-values.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to List
    </a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Core Value</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.core-values.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin.core-values.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon Class <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                           id="icon" name="icon" value="{{ old('icon', 'fas fa-star') }}" required>
                                    <small class="form-text text-muted">Font Awesome icon class (e.g., fas fa-star)</small>
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="color" class="form-label">Icon Color</label>
                                    <input type="color" class="form-control @error('color') is-invalid @enderror"
                                           id="color" name="color" value="{{ old('color', '#E74C25') }}">
                                    @error('color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sort Order</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Icon Preview -->
                        <div class="mb-3">
                            <label class="form-label">Preview</label>
                            <div class="border rounded p-3">
                                <div class="text-center">
                                    <div id="icon-preview" style="color: #E74C25; font-size: 48px;">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h5 id="title-preview" class="mt-2">Excellence</h5>
                                    <p id="description-preview" class="text-muted">Your description will appear here...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Core Value
                        </button>
                        <a href="{{ route('admin.core-values.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live preview functionality
    const iconInput = document.getElementById('icon');
    const colorInput = document.getElementById('color');
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');

    const iconPreview = document.getElementById('icon-preview').querySelector('i');
    const titlePreview = document.getElementById('title-preview');
    const descriptionPreview = document.getElementById('description-preview');

    function updatePreview() {
        const icon = iconInput.value || 'fas fa-star';
        const color = colorInput.value || '#E74C25';
        const title = titleInput.value || 'Title';
        const description = descriptionInput.value || 'Description will appear here...';

        iconPreview.className = icon;
        document.getElementById('icon-preview').style.color = color;
        titlePreview.textContent = title;
        descriptionPreview.textContent = description;
    }

    iconInput.addEventListener('input', updatePreview);
    colorInput.addEventListener('input', updatePreview);
    titleInput.addEventListener('input', updatePreview);
    descriptionInput.addEventListener('input', updatePreview);
});
</script>
@endsection
