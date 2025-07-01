@extends('layouts.admin')

@section('title', 'Core Values')

@section('page-title', 'Core Values Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">Core Values</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.core-values.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add Core Value
    </a>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        @if($coreValues->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="80">Order</th>
                            <th width="80">Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="100">Status</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coreValues as $value)
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">{{ $value->sort_order }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center rounded"
                                         style="width: 40px; height: 40px; background-color: {{ $value->color }}20;">
                                        <i class="{{ $value->icon }}" style="color: {{ $value->color }}; font-size: 20px;"></i>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <strong>{{ $value->title }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted">{{ Str::limit($value->description, 100) }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $value->is_active ? 'success' : 'secondary' }}">
                                        {{ $value->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.core-values.show', $value) }}" class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.core-values.edit', $value) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.core-values.destroy', $value) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this core value?')" title="Delete">
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
        @else
            <div class="text-center py-5">
                <div class="mb-3">
                    <i class="fas fa-heart fa-3x text-muted opacity-50"></i>
                </div>
                <h4 class="text-muted">No Core Values</h4>
                <p class="text-muted mb-4">Start by adding your first core value to define what your school stands for.</p>
                <a href="{{ route('admin.core-values.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Core Value
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
