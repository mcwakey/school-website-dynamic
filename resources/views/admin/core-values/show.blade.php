@extends('layouts.admin')

@section('title', 'View Core Value')

@section('page-title', 'View Core Value')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.core-values.index') }}">Core Values</a></li>
    <li class="breadcrumb-item active">{{ $coreValue->title }}</li>
@endsection

@section('page-actions')
    <div class="btn-group">
        <a href="{{ route('admin.core-values.edit', $coreValue) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.core-values.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Core Value Details</h5>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-2 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded"
                             style="width: 80px; height: 80px; background-color: {{ $coreValue->color }}20;">
                            <i class="{{ $coreValue->icon }}" style="color: {{ $coreValue->color }}; font-size: 32px;"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h3 class="mb-2">{{ $coreValue->title }}</h3>
                        <p class="text-muted mb-3">{{ $coreValue->description }}</p>

                        <div class="row">
                            <div class="col-md-3">
                                <strong>Sort Order:</strong><br>
                                <span class="badge bg-secondary">{{ $coreValue->sort_order }}</span>
                            </div>
                            <div class="col-md-3">
                                <strong>Status:</strong><br>
                                <span class="badge bg-{{ $coreValue->is_active ? 'success' : 'secondary' }}">
                                    {{ $coreValue->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                            <div class="col-md-3">
                                <strong>Icon:</strong><br>
                                <code>{{ $coreValue->icon }}</code>
                            </div>
                            <div class="col-md-3">
                                <strong>Color:</strong><br>
                                <div class="d-flex align-items-center">
                                    <div class="rounded me-2" style="width: 20px; height: 20px; background-color: {{ $coreValue->color }};"></div>
                                    <code>{{ $coreValue->color }}</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="row text-muted small">
                    <div class="col-md-6">
                        <strong>Created:</strong> {{ $coreValue->created_at->format('M j, Y \a\t g:i A') }}
                    </div>
                    <div class="col-md-6 text-md-end">
                        <strong>Last Updated:</strong> {{ $coreValue->updated_at->format('M j, Y \a\t g:i A') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="card-title mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.core-values.edit', $coreValue) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Core Value
                    </a>
                    <a href="{{ route('admin.core-values.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Core Value
                    </a>
                    <hr>
                    <form action="{{ route('admin.core-values.destroy', $coreValue) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this core value? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Core Value
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h6 class="card-title mb-0">Website Preview</h6>
            </div>
            <div class="card-body text-center">
                <div class="card h-100 border-0" style="background: #f8f9fa;">
                    <div class="card-body">
                        <div class="text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px; background-color: {{ $coreValue->color }};">
                            <i class="{{ $coreValue->icon }}"></i>
                        </div>
                        <h6 class="card-title">{{ $coreValue->title }}</h6>
                        <p class="card-text small">{{ Str::limit($coreValue->description, 80) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
