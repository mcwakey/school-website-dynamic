@extends('layouts.admin')

@section('title', 'Edit Hero Slide')

@section('page-title', 'Edit Hero Slide')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.hero-slides.index') }}">Hero Slides</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Hero Slide</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hero-slides.update', $heroSlide) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title', $heroSlide->title) }}"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text"
                               class="form-control @error('subtitle') is-invalid @enderror"
                               id="subtitle"
                               name="subtitle"
                               value="{{ old('subtitle', $heroSlide->subtitle) }}">
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="3">{{ old('description', $heroSlide->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Slide Image</label>
                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               id="image"
                               name="image"
                               accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Leave empty to keep current image. Recommended size: 1920x1080px. Maximum: 5MB</div>

                        @if($heroSlide->image_path)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $heroSlide->image_path) }}"
                                     alt="Current slide"
                                     class="img-thumbnail"
                                     style="max-height: 200px;">
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text"
                                       class="form-control @error('button_text') is-invalid @enderror"
                                       id="button_text"
                                       name="button_text"
                                       value="{{ old('button_text', $heroSlide->button_text) }}"
                                       placeholder="e.g., Learn More">
                                @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_link" class="form-label">Button Link</label>
                                <input type="text"
                                       class="form-control @error('button_link') is-invalid @enderror"
                                       id="button_link"
                                       name="button_link"
                                       value="{{ old('button_link', $heroSlide->button_link) }}"
                                       placeholder="e.g., /about">
                                @error('button_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number"
                                       class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order"
                                       name="sort_order"
                                       value="{{ old('sort_order', $heroSlide->sort_order) }}"
                                       min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="is_active"
                                           name="is_active"
                                           value="1"
                                           {{ old('is_active', $heroSlide->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Slide
                        </button>
                        <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Current Slide Info</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-sm-6">
                        @if($heroSlide->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Sort Order:</strong>
                    </div>
                    <div class="col-sm-6">
                        {{ $heroSlide->sort_order }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Created:</strong>
                    </div>
                    <div class="col-sm-6">
                        {{ $heroSlide->created_at->format('M d, Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
