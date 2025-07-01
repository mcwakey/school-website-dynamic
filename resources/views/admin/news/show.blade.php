@extends('layouts.admin')

@section('title', 'View News Article')

@section('page-title', $news->title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">News</a></li>
    <li class="breadcrumb-item active">{{ Str::limit($news->title, 30) }}</li>
@endsection

@section('page-actions')
    <div class="d-flex gap-2">
        <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this news article?')">
                <i class="fas fa-trash me-2"></i>Delete
            </button>
        </form>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                @if($news->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $news->image) }}"
                             class="img-fluid rounded"
                             style="max-height: 400px; width: 100%; object-fit: cover;">
                    </div>
                @endif

                <div class="mb-4">
                    <h1 class="h3 mb-3">{{ $news->title }}</h1>
                    <div class="d-flex flex-wrap gap-3 mb-3 text-muted">
                        <span><i class="fas fa-user me-1"></i> {{ $news->author }}</span>
                        @if($news->published_at)
                            <span><i class="fas fa-calendar me-1"></i> {{ $news->published_at->format('M d, Y') }}</span>
                        @endif
                        <span><i class="fas fa-eye me-1"></i> Status:
                            <span class="badge bg-{{ $news->status === 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($news->status) }}
                            </span>
                        </span>
                    </div>
                </div>

                @if($news->excerpt)
                    <div class="alert alert-light border-start border-primary border-4">
                        <h6 class="fw-bold mb-2">Excerpt</h6>
                        <p class="mb-0">{{ $news->excerpt }}</p>
                    </div>
                @endif

                <div class="content">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Article Details</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td class="fw-bold">Status:</td>
                        <td>
                            <span class="badge bg-{{ $news->status === 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($news->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Author:</td>
                        <td>{{ $news->author }}</td>
                    </tr>
                    @if($news->published_at)
                        <tr>
                            <td class="fw-bold">Published:</td>
                            <td>{{ $news->published_at->format('M d, Y \a\t g:i A') }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td class="fw-bold">Created:</td>
                        <td>{{ $news->created_at->format('M d, Y \a\t g:i A') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Last Updated:</td>
                        <td>{{ $news->updated_at->format('M d, Y \a\t g:i A') }}</td>
                    </tr>
                    @if($news->image)
                        <tr>
                            <td class="fw-bold">Has Image:</td>
                            <td><i class="fas fa-check text-success"></i> Yes</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

        @if($news->status === 'published')
            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-external-link-alt me-2"></i>Public View</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">This article is published and visible to the public.</p>
                    <a href="{{ route('news.show', $news) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-eye me-2"></i>View on Website
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
