@extends('layouts.admin')

@section('title', 'Upload Document')

@section('page-title', 'Upload New Document')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.documents.index') }}">Documents</a></li>
    <li class="breadcrumb-item active">Upload</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-upload me-2"></i>Upload Document</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Document Title <span class="text-danger">*</span></label>
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
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="3"
                                  placeholder="Brief description of the document...">{{ old('description') }}</textarea>
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
                                    <option value="forms" {{ old('category') == 'forms' ? 'selected' : '' }}>Forms</option>
                                    <option value="policies" {{ old('category') == 'policies' ? 'selected' : '' }}>Policies</option>
                                    <option value="newsletters" {{ old('category') == 'newsletters' ? 'selected' : '' }}>Newsletters</option>
                                    <option value="curriculum" {{ old('category') == 'curriculum' ? 'selected' : '' }}>Curriculum</option>
                                    <option value="reports" {{ old('category') == 'reports' ? 'selected' : '' }}>Reports</option>
                                    <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
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
                                           {{ old('is_public') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_public">
                                        Make this document publicly accessible
                                    </label>
                                </div>
                                <small class="form-text text-muted">Public documents can be downloaded by website visitors</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">Select File <span class="text-danger">*</span></label>
                        <input type="file"
                               class="form-control @error('file') is-invalid @enderror"
                               id="file"
                               name="file"
                               required>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Maximum file size: 10MB. Supported formats: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, Images, etc.</div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload me-2"></i>Upload Document
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
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Upload Guidelines</h5>
            </div>
            <div class="card-body">
                <ul class="mb-0 ps-3">
                    <li class="mb-2">Use descriptive titles for easy identification</li>
                    <li class="mb-2">Choose the appropriate category</li>
                    <li class="mb-2">Add descriptions to help users understand the content</li>
                    <li class="mb-2">Only make documents public if they should be accessible to all visitors</li>
                    <li class="mb-2">Ensure files are virus-free before uploading</li>
                    <li>Keep file sizes reasonable for faster downloads</li>
                </ul>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Supported Formats</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6 mb-2">
                        <i class="fas fa-file-pdf fa-2x text-danger"></i>
                        <br><small>PDF</small>
                    </div>
                    <div class="col-6 mb-2">
                        <i class="fas fa-file-word fa-2x text-info"></i>
                        <br><small>Word</small>
                    </div>
                    <div class="col-6 mb-2">
                        <i class="fas fa-file-excel fa-2x text-success"></i>
                        <br><small>Excel</small>
                    </div>
                    <div class="col-6 mb-2">
                        <i class="fas fa-file-powerpoint fa-2x text-warning"></i>
                        <br><small>PowerPoint</small>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-file-image fa-2x text-primary"></i>
                        <br><small>Images</small>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-file-alt fa-2x text-secondary"></i>
                        <br><small>Text</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
