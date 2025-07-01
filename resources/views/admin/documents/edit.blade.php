@extends('layouts.admin')

@section('title', 'Edit Document')

@section('page-title', 'Edit Document')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.documents.index') }}">Documents</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Document</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.documents.update', $document) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Document Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title', $document->title) }}"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="3"
                                  placeholder="Brief description of the document...">{{ old('description', $document->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select @error('category') is-invalid @enderror"
                                        id="category"
                                        name="category"
                                        required>
                                    <option value="">Select category...</option>
                                    <option value="forms" {{ old('category', $document->category) == 'forms' ? 'selected' : '' }}>Forms</option>
                                    <option value="policies" {{ old('category', $document->category) == 'policies' ? 'selected' : '' }}>Policies</option>
                                    <option value="newsletters" {{ old('category', $document->category) == 'newsletters' ? 'selected' : '' }}>Newsletters</option>
                                    <option value="curriculum" {{ old('category', $document->category) == 'curriculum' ? 'selected' : '' }}>Curriculum</option>
                                    <option value="reports" {{ old('category', $document->category) == 'reports' ? 'selected' : '' }}>Reports</option>
                                    <option value="other" {{ old('category', $document->category) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="is_public"
                                           name="is_public"
                                           value="1"
                                           {{ old('is_public', $document->is_public) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_public">
                                        Make this document publicly accessible
                                    </label>
                                </div>
                                <small class="form-text text-muted">Public documents can be downloaded by website visitors</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">Replace File (Optional)</label>
                        <input type="file"
                               class="form-control @error('file') is-invalid @enderror"
                               id="file"
                               name="file">
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Leave empty to keep current file. Maximum file size: 10MB.</div>

                        @if($document->file_path)
                            <div class="mt-2 p-2 bg-light rounded">
                                <small class="text-muted">Current file:</small><br>
                                <i class="fas fa-file me-1"></i>
                                <strong>{{ $document->file_name }}</strong>
                                <span class="text-muted">({{ $document->file_size_human }})</span>
                                <a href="{{ route('admin.documents.download', $document) }}"
                                   class="btn btn-sm btn-outline-primary ms-2">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Document
                        </button>
                        <a href="{{ route('admin.documents.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Document Info</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Category:</strong>
                    </div>
                    <div class="col-sm-6">
                        <span class="badge bg-secondary">{{ ucfirst($document->category) }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Downloads:</strong>
                    </div>
                    <div class="col-sm-6">
                        <span class="badge bg-info">{{ $document->download_count }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Uploaded by:</strong>
                    </div>
                    <div class="col-sm-6">
                        {{ $document->uploader->name }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Upload date:</strong>
                    </div>
                    <div class="col-sm-6">
                        {{ $document->created_at->format('M d, Y') }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>File type:</strong>
                    </div>
                    <div class="col-sm-6">
                        {{ strtoupper(pathinfo($document->file_name, PATHINFO_EXTENSION)) }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-sm-6">
                        @if($document->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                        @if($document->is_public)
                            <span class="badge bg-primary">Public</span>
                        @else
                            <span class="badge bg-warning">Private</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
