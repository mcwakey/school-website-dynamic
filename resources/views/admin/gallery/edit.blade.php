@extends('layouts.admin')

@section('title', 'Edit Photo')

@section('page-title', 'Edit Photo')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
    <li class="breadcrumb-item active">Edit Photo</li>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.gallery.update', $photo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $photo->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $photo->category) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $photo->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Photo</label><br>
                @if($photo->image_path)
                    <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Current Photo" class="mb-2" style="max-width: 200px; max-height: 150px; display: block;">
                @endif
                <input type="file" name="image_path" id="image_path" class="form-control">
                <small class="text-muted">Leave blank to keep current photo.</small>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input" value="1" {{ old('is_featured', $photo->is_featured) ? 'checked' : '' }}>
                <label for="is_featured" class="form-check-label">Featured</label>
            </div>

            <button type="submit" class="btn btn-primary">Update Photo</button>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
