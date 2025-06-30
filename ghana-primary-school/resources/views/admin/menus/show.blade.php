@extends('layouts.admin')

@section('title', 'View Menu Item')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Menu Item Details</h1>
                <div>
                    <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Menus
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        {{ $menu->label }}
                        <span class="badge {{ $menu->is_active ? 'bg-success' : 'bg-secondary' }} ms-2">
                            {{ $menu->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted">Basic Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="fw-bold">Menu Name:</td>
                                    <td>{{ $menu->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Display Label:</td>
                                    <td>{{ $menu->label }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Location:</td>
                                    <td>
                                        <span class="badge bg-info">{{ ucfirst($menu->location) }} Menu</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Sort Order:</td>
                                    <td>{{ $menu->sort_order ?? 'Not set' }}</td>
                                </tr>
                                @if($menu->icon)
                                <tr>
                                    <td class="fw-bold">Icon:</td>
                                    <td>
                                        <i class="{{ $menu->icon }}"></i>
                                        <code>{{ $menu->icon }}</code>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted">Link Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="fw-bold">URL:</td>
                                    <td>
                                        <a href="{{ $menu->url }}" target="{{ $menu->target }}" class="text-decoration-none">
                                            {{ $menu->url }}
                                            @if($menu->target === '_blank')
                                                <i class="fas fa-external-link-alt ms-1"></i>
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Link Target:</td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $menu->target === '_blank' ? 'New Window' : 'Same Window' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Status:</td>
                                    <td>
                                        <span class="badge {{ $menu->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $menu->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if($menu->parent)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="text-muted">Hierarchy</h6>
                            <div class="alert alert-info">
                                <i class="fas fa-sitemap"></i>
                                <strong>Parent Menu:</strong>
                                <a href="{{ route('admin.menus.show', $menu->parent) }}" class="text-decoration-none">
                                    {{ $menu->parent->label }}
                                </a>
                                <br>
                                <small class="text-muted">This item appears as a submenu under "{{ $menu->parent->label }}"</small>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($menu->children->count() > 0)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="text-muted">Child Menu Items</h6>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Label</th>
                                            <th>URL</th>
                                            <th>Sort Order</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($menu->children->sortBy('sort_order') as $child)
                                        <tr>
                                            <td>
                                                @if($child->icon)
                                                    <i class="{{ $child->icon }}"></i>
                                                @endif
                                                {{ $child->label }}
                                            </td>
                                            <td>
                                                <a href="{{ $child->url }}" target="{{ $child->target }}" class="text-decoration-none">
                                                    {{ Str::limit($child->url, 40) }}
                                                    @if($child->target === '_blank')
                                                        <i class="fas fa-external-link-alt ms-1"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>{{ $child->sort_order ?? '-' }}</td>
                                            <td>
                                                <span class="badge {{ $child->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $child->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('admin.menus.show', $child) }}" class="btn btn-outline-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.menus.edit', $child) }}" class="btn btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="text-muted">Timestamps</h6>
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td class="fw-bold">Created:</td>
                                    <td>{{ $menu->created_at->format('F j, Y \a\t g:i A') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Last Updated:</td>
                                    <td>{{ $menu->updated_at->format('F j, Y \a\t g:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Menu Item
                        </a>

                        <a href="{{ route('admin.menus.create') }}?parent_id={{ $menu->id }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add Child Item
                        </a>

                        <a href="{{ $menu->url }}" target="{{ $menu->target }}" class="btn btn-info">
                            <i class="fas fa-external-link-alt"></i> Test Link
                        </a>

                        <hr>

                        <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this menu item?{{ $menu->children->count() > 0 ? ' This will also delete all child items.' : '' }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete Menu Item
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Menu Preview</h5>
                </div>
                <div class="card-body">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="text-muted mb-2">How this appears in {{ ucfirst($menu->location) }} Menu:</h6>

                        @if($menu->parent)
                            <div class="text-muted small mb-1">{{ $menu->parent->label }}</div>
                            <div class="ms-3">
                        @endif

                        <div class="d-flex align-items-center">
                            @if($menu->icon)
                                <i class="{{ $menu->icon }} me-2"></i>
                            @endif
                            <span class="{{ $menu->is_active ? '' : 'text-muted text-decoration-line-through' }}">
                                {{ $menu->label }}
                            </span>
                            @if($menu->target === '_blank')
                                <i class="fas fa-external-link-alt ms-1 small"></i>
                            @endif
                        </div>

                        @if($menu->children->where('is_active', true)->count() > 0)
                            <div class="ms-3 mt-2">
                                @foreach($menu->children->where('is_active', true)->sortBy('sort_order') as $child)
                                    <div class="small text-muted">
                                        @if($child->icon)
                                            <i class="{{ $child->icon }} me-1"></i>
                                        @endif
                                        {{ $child->label }}
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($menu->parent)
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
