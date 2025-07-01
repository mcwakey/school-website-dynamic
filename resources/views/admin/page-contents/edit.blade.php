@extends('layouts.admin')

@section('title', 'Edit Page Content')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Edit Page Content</h1>
                <div>
                    <a href="{{ route('admin.page-contents.show', $pageContent) }}" class="btn btn-outline-info me-2">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <a href="{{ route('admin.page-contents.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Contents
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Content</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.page-contents.update', $pageContent) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="page" class="form-label">Page <span class="text-danger">*</span></label>
                                    <select name="page" id="page" class="form-control @error('page') is-invalid @enderror" required>
                                        <option value="">Select Page</option>
                                        @foreach($pages as $page)
                                            <option value="{{ $page }}" {{ old('page', $pageContent->page) === $page ? 'selected' : '' }}>
                                                {{ ucfirst($page) }}
                                            </option>
                                        @endforeach
                                        @if(!in_array($pageContent->page, $pages))
                                            <option value="{{ $pageContent->page }}" selected>{{ ucfirst($pageContent->page) }} (Current)</option>
                                        @endif
                                    </select>
                                    @error('page')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="section" class="form-label">Section <span class="text-danger">*</span></label>
                                    <select name="section" id="section" class="form-control @error('section') is-invalid @enderror" required>
                                        <option value="">Select Section</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section }}" {{ old('section', $pageContent->section) === $section ? 'selected' : '' }}>
                                                {{ ucfirst($section) }}
                                            </option>
                                        @endforeach
                                        @if(!in_array($pageContent->section, $sections))
                                            <option value="{{ $pageContent->section }}" selected>{{ ucfirst($pageContent->section) }} (Current)</option>
                                        @endif
                                    </select>
                                    @error('section')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="key" class="form-label">Content Key <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="key"
                                           id="key"
                                           class="form-control @error('key') is-invalid @enderror"
                                           value="{{ old('key', $pageContent->key) }}"
                                           required>
                                    <small class="form-text text-muted">Unique identifier for this content piece</small>
                                    @error('key')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="sort_order" class="form-label">Sort Order</label>
                                    <input type="number"
                                           name="sort_order"
                                           id="sort_order"
                                           class="form-control @error('sort_order') is-invalid @enderror"
                                           value="{{ old('sort_order', $pageContent->sort_order) }}"
                                           min="0"
                                           step="1">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $pageContent->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content"
                                      id="content"
                                      class="form-control @error('content') is-invalid @enderror"
                                      rows="8">{{ old('content', $pageContent->content) }}</textarea>
                            <small class="form-text text-muted">HTML tags are allowed</small>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if($pageContent->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $pageContent->image) }}"
                                         alt="Current image"
                                         class="img-thumbnail"
                                         style="max-height: 150px;">
                                    <div class="mt-1">
                                        <small class="text-muted">Current: {{ basename($pageContent->image) }}</small>
                                    </div>
                                </div>
                            @endif
                            <input type="file"
                                   name="image"
                                   id="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   accept="image/*">
                            <small class="form-text text-muted">Leave empty to keep current image. Max file size: 10MB.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="metadata" class="form-label">Metadata</label>
                            <textarea name="metadata"
                                      id="metadata"
                                      class="form-control @error('metadata') is-invalid @enderror"
                                      rows="4">{{ old('metadata', is_array($pageContent->metadata) ? json_encode($pageContent->metadata, JSON_PRETTY_PRINT) : $pageContent->metadata) }}</textarea>
                            <small class="form-text text-muted">JSON format for additional data</small>
                            @error('metadata')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input type="checkbox"
                                       name="is_active"
                                       id="is_active"
                                       class="form-check-input"
                                       value="1"
                                       {{ old('is_active', $pageContent->is_active) ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">
                                    Active (visible on website)
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.page-contents.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Content
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Content Info</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-sm">
                        <tr>
                            <td class="fw-bold">Page:</td>
                            <td>{{ ucfirst($pageContent->page) }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Section:</td>
                            <td>{{ ucfirst($pageContent->section) }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Key:</td>
                            <td><code>{{ $pageContent->key }}</code></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Status:</td>
                            <td>
                                <span class="badge {{ $pageContent->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $pageContent->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Created:</td>
                            <td>{{ $pageContent->created_at->format('M j, Y') }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Updated:</td>
                            <td>{{ $pageContent->updated_at->format('M j, Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.page-contents.show', $pageContent) }}" class="btn btn-outline-info">
                            <i class="fas fa-eye"></i> View Content
                        </a>

                        <a href="{{ route('admin.page-contents.create') }}" class="btn btn-outline-success">
                            <i class="fas fa-plus"></i> Create Similar
                        </a>

                        <hr>

                        <form action="{{ route('admin.page-contents.destroy', $pageContent) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this content?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="fas fa-trash"></i> Delete Content
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @if($pageContent->metadata)
            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Current Metadata</h5>
                </div>
                <div class="card-body">
                    <pre class="bg-light p-2 rounded"><code>{{ is_array($pageContent->metadata) ? json_encode($pageContent->metadata, JSON_PRETTY_PRINT) : $pageContent->metadata }}</code></pre>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Validate JSON metadata
    document.getElementById('metadata').addEventListener('blur', function() {
        if (this.value.trim()) {
            try {
                JSON.parse(this.value);
                this.classList.remove('is-invalid');
            } catch (e) {
                this.classList.add('is-invalid');
                alert('Invalid JSON format in metadata field');
            }
        }
    });

    // Auto-format JSON on focus out
    document.getElementById('metadata').addEventListener('blur', function() {
        if (this.value.trim()) {
            try {
                const parsed = JSON.parse(this.value);
                this.value = JSON.stringify(parsed, null, 2);
            } catch (e) {
                // Keep original value if invalid JSON
            }
        }
    });
</script>
@endpush
