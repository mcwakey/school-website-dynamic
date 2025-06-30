@extends('layouts.admin')

@section('title', 'News Management')

@section('page-title', 'News Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">News</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add News Article
    </a>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        @if($news->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="60">Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Author</th>
                            <th>Published</th>
                            <th>Created</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $article)
                            <tr>
                                <td>
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}"
                                             class="rounded"
                                             width="50"
                                             height="50"
                                             style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-newspaper text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <h6 class="mb-1">{{ Str::limit($article->title, 60) }}</h6>
                                        <small class="text-muted">{{ Str::limit($article->excerpt, 80) }}</small>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if($article->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                        @if($article->is_featured)
                                            <span class="badge bg-primary">Featured</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <small>{{ $article->author->name ?? 'N/A' }}</small>
                                </td>
                                <td>
                                    @if($article->published_at)
                                        <small>{{ $article->published_at->format('M d, Y') }}</small>
                                    @else
                                        <small class="text-muted">Not set</small>
                                    @endif
                                </td>
                                <td>
                                    <small>{{ $article->created_at->format('M d, Y') }}</small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.news.show', $article) }}"
                                           class="btn btn-sm btn-outline-info"
                                           title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($article->status === 'published')
                                            <a href="{{ route('news.show', $article->slug) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               target="_blank"
                                               title="View Public">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.news.edit', $article) }}"
                                           class="btn btn-sm btn-outline-secondary"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="deleteItem({{ $article->id }})"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="delete-form-{{ $article->id }}"
                                          action="{{ route('admin.news.destroy', $article) }}"
                                          method="POST"
                                          class="d-none">
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
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No News Articles</h4>
                <p class="text-muted mb-4">Start by creating your first news article.</p>
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add News Article
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
function deleteItem(id) {
    if (confirm('Are you sure you want to delete this news article? This action cannot be undone.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
