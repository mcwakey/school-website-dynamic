@extends('layouts.admin')

@section('title', 'Documents')

@section('page-title', 'Document Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">Documents</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.documents.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Upload Document
    </a>
@endsection

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        @if($documents->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>File Type</th>
                            <th>Size</th>
                            <th>Downloads</th>
                            <th>Status</th>
                            <th>Uploaded</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @php
                                        $icon = 'fas fa-file';
                                        if(str_contains($document->file_type, 'pdf')) $icon = 'fas fa-file-pdf text-danger';
                                        elseif(str_contains($document->file_type, 'image')) $icon = 'fas fa-file-image text-primary';
                                        elseif(str_contains($document->file_type, 'word')) $icon = 'fas fa-file-word text-info';
                                        elseif(str_contains($document->file_type, 'excel') || str_contains($document->file_type, 'sheet')) $icon = 'fas fa-file-excel text-success';
                                    @endphp
                                    <i class="{{ $icon }} me-2"></i>
                                    <div>
                                        <strong>{{ $document->title }}</strong>
                                        @if($document->description)
                                            <br><small class="text-muted">{{ Str::limit($document->description, 50) }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ ucfirst($document->category) }}</span>
                            </td>
                            <td>{{ strtoupper(pathinfo($document->file_name, PATHINFO_EXTENSION)) }}</td>
                            <td>{{ $document->file_size_human }}</td>
                            <td>
                                <span class="badge bg-info">{{ $document->download_count }}</span>
                            </td>
                            <td>
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
                            </td>
                            <td>
                                <small>{{ $document->created_at->format('M d, Y') }}</small><br>
                                <small class="text-muted">by {{ $document->uploader->name }}</small>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.documents.download', $document) }}"
                                       class="btn btn-outline-primary btn-sm"
                                       title="Download">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="{{ route('admin.documents.edit', $document) }}"
                                       class="btn btn-outline-secondary btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.documents.destroy', $document) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this document?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger btn-sm"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $documents->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No documents uploaded yet</h5>
                <p class="text-muted">Start by uploading your first document.</p>
                <a href="{{ route('admin.documents.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Upload Document
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
