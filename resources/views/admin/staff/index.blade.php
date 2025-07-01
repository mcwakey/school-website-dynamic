@extends('layouts.admin')

@section('title', 'Staff Management')

@section('page-title', 'Staff Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">Staff</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add Staff Member
    </a>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        @if($staff->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="60">Photo</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Created</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staff as $member)
                            <tr>
                                <td>
                                    @if($member->photo)
                                        <img src="{{ asset('storage/' . $member->photo) }}"
                                             class="rounded-circle"
                                             width="50"
                                             height="50"
                                             style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-user text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $member->name }}</strong>
                                    @if($member->email)
                                        <br><small class="text-muted">{{ $member->email }}</small>
                                    @endif
                                </td>
                                <td>{{ $member->position }}</td>
                                <td>{{ $member->department ?? '-' }}</td>
                                <td>
                                    @if($member->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($member->is_featured)
                                        <span class="badge bg-primary">Featured</span>
                                    @else
                                        <span class="badge bg-light text-dark">Not Featured</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $member->created_at->format('M d, Y') }}
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('admin.staff.show', $member) }}"
                                           class="btn btn-outline-info"
                                           title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.staff.edit', $member) }}"
                                           class="btn btn-outline-primary"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-outline-danger"
                                                title="Delete"
                                                onclick="confirmDelete('{{ $member->id }}', '{{ $member->name }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Delete form -->
                                    <form id="delete-form-{{ $member->id }}"
                                          action="{{ route('admin.staff.destroy', $member) }}"
                                          method="POST"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $staff->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No Staff Members Found</h5>
                <p class="text-muted">Start by adding your first staff member.</p>
                <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Staff Member
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id, name) {
    if (confirm(`Are you sure you want to delete staff member "${name}"? This action cannot be undone.`)) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
