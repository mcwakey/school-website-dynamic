@extends('layouts.admin')

@section('title', 'Gallery Management')

@section('page-title', 'Gallery Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">Gallery</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add Photo
    </a>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        @if($photos->count() > 0)
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card gallery-card h-100">
                            <div class="position-relative">
                                @if($photo->image_path && file_exists(public_path('storage/' . $photo->image_path)))
                                    <img src="{{ asset('storage/' . $photo->image_path) }}"
                                         class="card-img-top"
                                         style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                         style="height: 200px;">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif

                                <div class="position-absolute top-0 end-0 p-2">
                                    @if($photo->is_featured)
                                        <span class="badge bg-primary">Featured</span>
                                    @endif
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title mb-1">{{ Str::limit($photo->title, 30) }}</h6>
                                @if($photo->category)
                                    <small class="text-muted mb-2">{{ $photo->category }}</small>
                                @endif
                                @if($photo->description)
                                    <p class="card-text small text-muted flex-grow-1">{{ Str::limit($photo->description, 60) }}</p>
                                @endif

                                <div class="mt-auto">
                                    <div class="btn-group w-100" role="group">
                                        <a href="{{ route('admin.gallery.edit', $photo) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="deleteItem({{ $photo->id }})"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="delete-form-{{ $photo->id }}"
                                          action="{{ route('admin.gallery.destroy', $photo) }}"
                                          method="POST"
                                          class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $photos->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No Photos</h4>
                <p class="text-muted mb-4">Start by uploading your first photo.</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Photo
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
function deleteItem(id) {
    if (confirm('Are you sure you want to delete this photo? This action cannot be undone.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>

<style>
.gallery-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

/* Explicit h1 font-size and margin for accessibility and to avoid browser warnings */
h1 {
    font-size: 2rem;
    margin: 1.5rem 0 1rem 0;
}
</style>
@endpush
