@extends('layouts.admin')

@section('title', 'View Staff Member')

@section('page-title', $staff->name)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.staff.index') }}">Staff</a></li>
    <li class="breadcrumb-item active">{{ $staff->name }}</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.staff.edit', $staff) }}" class="btn btn-primary">
        <i class="fas fa-edit me-2"></i>Edit
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($staff->photo)
                            <img src="{{ asset('storage/' . $staff->photo) }}"
                                 class="rounded-circle mb-3"
                                 width="150"
                                 height="150"
                                 style="object-fit: cover;">
                        @else
                            <div class="bg-light rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                 style="width: 150px; height: 150px;">
                                <i class="fas fa-user fa-4x text-muted"></i>
                            </div>
                        @endif

                        <div class="mb-3">
                            @if($staff->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif

                            @if($staff->is_featured)
                                <span class="badge bg-primary">Featured</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $staff->name }}</h2>

                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Position:</strong></div>
                            <div class="col-sm-8">{{ $staff->position }}</div>
                        </div>

                        @if($staff->department)
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Department:</strong></div>
                            <div class="col-sm-8">{{ $staff->department }}</div>
                        </div>
                        @endif

                        @if($staff->email)
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Email:</strong></div>
                            <div class="col-sm-8">
                                <a href="mailto:{{ $staff->email }}">{{ $staff->email }}</a>
                            </div>
                        </div>
                        @endif

                        @if($staff->phone)
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Phone:</strong></div>
                            <div class="col-sm-8">
                                <a href="tel:{{ $staff->phone }}">{{ $staff->phone }}</a>
                            </div>
                        </div>
                        @endif

                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Sort Order:</strong></div>
                            <div class="col-sm-8">{{ $staff->sort_order ?? 'Not set' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Created:</strong></div>
                            <div class="col-sm-8">{{ $staff->created_at->format('M d, Y \a\t g:i A') }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Last Updated:</strong></div>
                            <div class="col-sm-8">{{ $staff->updated_at->format('M d, Y \a\t g:i A') }}</div>
                        </div>
                    </div>
                </div>

                @if($staff->bio)
                <hr>
                <div>
                    <h5>Biography</h5>
                    <p class="text-muted">{{ $staff->bio }}</p>
                </div>
                @endif

                <hr>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Staff List
                    </a>
                    <div>
                        <a href="{{ route('admin.staff.edit', $staff) }}" class="btn btn-primary me-2">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <button type="button"
                                class="btn btn-danger"
                                onclick="confirmDelete()">
                            <i class="fas fa-trash me-2"></i>Delete
                        </button>
                    </div>
                </div>

                <!-- Delete form -->
                <form id="delete-form" action="{{ route('admin.staff.destroy', $staff) }}" method="POST" style="display: none;">
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
function confirmDelete() {
    if (confirm('Are you sure you want to delete this staff member? This action cannot be undone.')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
@endpush
