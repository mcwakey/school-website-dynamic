@extends('layouts.admin')

@section('title', 'Hero Slides')

@section('page-title', 'Hero Slideshow Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">Hero Slides</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Slide
    </a>
@endsection

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        @if($slides->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slides as $slide)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $slide->image_path) }}"
                                     alt="{{ $slide->title }}"
                                     class="img-thumbnail"
                                     style="width: 80px; height: 50px; object-fit: cover;">
                            </td>
                            <td>
                                <div>
                                    <strong>{{ $slide->title }}</strong>
                                    @if($slide->subtitle)
                                        <br><small class="text-muted">{{ $slide->subtitle }}</small>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $slide->sort_order }}</td>
                            <td>
                                @if($slide->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.hero-slides.show', $slide) }}"
                                       class="btn btn-outline-info"
                                       title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.hero-slides.edit', $slide) }}"
                                       class="btn btn-outline-secondary"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.hero-slides.destroy', $slide) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this slide?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger"
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
        @else
            <div class="text-center py-5">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No slides created yet</h5>
                <p class="text-muted">Start by creating your first hero slide.</p>
                <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Slide
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
