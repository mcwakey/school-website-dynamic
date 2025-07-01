@extends('layouts.admin')

@section('title', 'Page Contents')

@section('page-title', 'Page Content Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">Page Contents</li>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-lg-8">
        <h4 class="mb-0">Manage Page Contents</h4>
        <p class="text-muted">Customize text, images, and sections across your website</p>
    </div>
    <div class="col-lg-4 text-end">
        <a href="{{ route('admin.page-contents.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Content
        </a>
    </div>
</div>

<!-- Filter Section -->
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-3">
                <label for="page" class="form-label">Page</label>
                <select name="page" id="page" class="form-select">
                    <option value="">All Pages</option>
                    @foreach($pages as $page)
                        <option value="{{ $page }}" {{ request('page') == $page ? 'selected' : '' }}>
                            {{ ucfirst($page) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="section" class="form-label">Section</label>
                <select name="section" id="section" class="form-select">
                    <option value="">All Sections</option>
                    @foreach($sections as $section)
                        <option value="{{ $section }}" {{ request('section') == $section ? 'selected' : '' }}>
                            {{ ucfirst($section) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="search" class="form-label">Search</label>
                <input type="text" name="search" id="search" class="form-control"
                       value="{{ request('search') }}" placeholder="Search title or content...">
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-outline-primary w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

<!-- Content List -->
<div class="card shadow-sm">
    <div class="card-body">
        @if($contents->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Section</th>
                            <th>Key</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contents as $content)
                            <tr>
                                <td>
                                    <span class="badge bg-primary">{{ ucfirst($content->page) }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ ucfirst($content->section) }}</span>
                                </td>
                                <td>
                                    <code>{{ $content->key }}</code>
                                </td>
                                <td>
                                    <strong>{{ $content->title ?: 'No title' }}</strong>
                                    @if($content->content)
                                        <br><small class="text-muted">{{ Str::limit(strip_tags($content->content), 80) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($content->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $content->sort_order }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.page-contents.show', $content) }}"
                                           class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.page-contents.edit', $content) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.page-contents.destroy', $content) }}"
                                              method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this content?')">
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
            <div class="d-flex justify-content-center">
                {{ $contents->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                <h5>No content found</h5>
                <p class="text-muted">Start by adding your first page content.</p>
                <a href="{{ route('admin.page-contents.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Content
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
