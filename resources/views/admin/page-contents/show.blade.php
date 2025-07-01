@extends('layouts.admin')

@section('title', 'View Page Content')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Page Content Details</h1>
                <div>
                    <a href="{{ route('admin.page-contents.edit', $pageContent) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.page-contents.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Contents
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
                        {{ $pageContent->title ?: $pageContent->key }}
                        <span class="badge {{ $pageContent->is_active ? 'bg-success' : 'bg-secondary' }} ms-2">
                            {{ $pageContent->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </h5>
                    <div class="text-muted small">
                        {{ ucfirst($pageContent->page) }} → {{ ucfirst($pageContent->section) }} → {{ $pageContent->key }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <h6 class="text-muted">Basic Information</h6>
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td class="fw-bold">Page:</td>
                                    <td>{{ ucfirst($pageContent->page) }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Section:</td>
                                    <td>{{ ucfirst($pageContent->section) }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Key:</td>
                                    <td><code>{{ $pageContent->key }}</code></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Sort Order:</td>
                                    <td>{{ $pageContent->sort_order ?? 'Not set' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Status:</td>
                                    <td>
                                        <span class="badge {{ $pageContent->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $pageContent->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-8">
                            @if($pageContent->title)
                            <h6 class="text-muted">Title</h6>
                            <div class="alert alert-light mb-3">
                                <h5 class="mb-0">{{ $pageContent->title }}</h5>
                            </div>
                            @endif

                            @if($pageContent->content)
                            <h6 class="text-muted">Content</h6>
                            <div class="border rounded p-3 mb-3" style="background-color: #f8f9fa;">
                                {!! $pageContent->content !!}
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($pageContent->image)
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-muted">Associated Image</h6>
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $pageContent->image) }}"
                                     alt="{{ $pageContent->title ?: $pageContent->key }}"
                                     class="img-fluid rounded shadow-sm"
                                     style="max-height: 400px;">
                                <div class="mt-2">
                                    <small class="text-muted">{{ basename($pageContent->image) }}</small>
                                    <br>
                                    <a href="{{ asset('storage/' . $pageContent->image) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-external-link-alt"></i> View Full Size
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($pageContent->metadata)
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="text-muted">Metadata</h6>
                            <div class="bg-dark text-light p-3 rounded">
                                <pre class="mb-0"><code>{{ is_array($pageContent->metadata) ? json_encode($pageContent->metadata, JSON_PRETTY_PRINT) : $pageContent->metadata }}</code></pre>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-muted">Timestamps</h6>
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td class="fw-bold">Created:</td>
                                    <td>{{ $pageContent->created_at->format('F j, Y \a\t g:i A') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Last Updated:</td>
                                    <td>
                                        {{ $pageContent->updated_at->format('F j, Y \a\t g:i A') }}
                                        @if($pageContent->updated_at->gt($pageContent->created_at))
                                            <span class="badge bg-info ms-2">Modified</span>
                                        @endif
                                    </td>
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
                        <a href="{{ route('admin.page-contents.edit', $pageContent) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Content
                        </a>

                        <a href="{{ route('admin.page-contents.create') }}?page={{ $pageContent->page }}&section={{ $pageContent->section }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add to Same Section
                        </a>

                        <hr>

                        <form action="{{ route('admin.page-contents.destroy', $pageContent) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this content?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete Content
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Usage Information</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6><i class="fas fa-code"></i> Template Usage</h6>
                        <p class="mb-2">To display this content in a template, use:</p>
                        <code class="d-block bg-dark text-light p-2 rounded">
                            &#123;&#123; content('{{ $pageContent->key }}') &#125;&#125;
                        </code>
                        <small class="text-muted mt-2 d-block">This will render the content in your Blade templates.</small>
                    </div>

                    @if($pageContent->metadata && is_array($pageContent->metadata))
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-database"></i> Metadata Access</h6>
                        <p class="mb-2">Access metadata properties:</p>
                        @foreach($pageContent->metadata as $key => $value)
                        <code class="d-block small">content('{{ $pageContent->key }}')->metadata['{{ $key }}']</code>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Related Content</h5>
                </div>
                <div class="card-body">
                    @php
                        $relatedContents = \App\Models\PageContent::where('page', $pageContent->page)
                                                                 ->where('section', $pageContent->section)
                                                                 ->where('id', '!=', $pageContent->id)
                                                                 ->orderBy('sort_order')
                                                                 ->take(5)
                                                                 ->get();
                    @endphp

                    @if($relatedContents->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($relatedContents as $related)
                            <a href="{{ route('admin.page-contents.show', $related) }}"
                               class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $related->title ?: $related->key }}</h6>
                                    <small class="text-muted">{{ $related->updated_at->diffForHumans() }}</small>
                                </div>
                                <small>{{ Str::limit(strip_tags($related->content), 50) }}</small>
                            </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">No other content in this section.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
