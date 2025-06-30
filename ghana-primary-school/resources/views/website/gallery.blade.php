@extends('layouts.website')

@section('title', 'Photo Gallery')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-light text-primary fs-6 px-3 py-2 rounded-pill mb-3">Visual Stories</span>
                <h1 class="display-4 fw-bold mb-3">Photo Gallery</h1>
                <p class="lead mb-4">Capturing precious moments, memories, and milestones from our vibrant school life</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/gallery-hero.svg') }}" alt="Photo Gallery" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <!-- Category Filter -->
    @if($categories->count() > 0)
        <div class="row mb-4">
            <div class="col-12">
                <div class="text-center">
                    <div class="btn-group" role="group" aria-label="Gallery Categories">
                        <button type="button" class="btn btn-outline-primary active" data-filter="*">
                            All Photos
                        </button>
                        @foreach($categories as $category)
                            @if($category)
                                <button type="button" class="btn btn-outline-primary" data-filter=".{{ Str::slug($category) }}">
                                    {{ $category }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @if($photos->count() > 0)
            <div class="gallery-grid" id="gallery">
                @foreach($photos as $photo)
                    <div class="col-lg-4 col-md-6 mb-4 gallery-item {{ $photo->category ? Str::slug($photo->category) : '' }}">
                        <div class="modern-card gallery-card">
                            <div class="gallery-image-container position-relative overflow-hidden">
                                @if($photo->image_path)
                                    <img src="{{ asset($photo->image_path) }}"
                                         class="gallery-image w-100"
                                         alt="{{ $photo->title }}"
                                         data-bs-toggle="modal"
                                         data-bs-target="#imageModal"
                                         data-image="{{ asset('storage/' . $photo->image_path) }}"
                                         data-title="{{ $photo->title }}"
                                         data-description="{{ $photo->description }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-light"
                                         style="height: 250px;">
                                        <div class="placeholder-icon">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    </div>
                                @endif

                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <div class="gallery-actions">
                                            <button class="btn btn-light btn-sm rounded-circle mb-2">
                                                <i class="fas fa-expand"></i>
                                            </button>
                                        </div>
                                        <h6 class="text-white fw-bold">{{ $photo->title }}</h6>
                                        @if($photo->category)
                                            <span class="badge bg-primary mt-2">{{ $photo->category }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <h6 class="card-title fw-bold mb-1">{{ $photo->title }}</h6>
                                @if($photo->description)
                                    <p class="text-muted small mb-2">{{ Str::limit($photo->description, 80) }}</p>
                                @endif
                                @if($photo->category)
                                    <span class="badge bg-primary">{{ $photo->category }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">
                    {{ $photos->links() }}
                </div>
            </div>
        @else
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">No Photos Yet</h4>
                    <p class="text-muted">Check back soon for more photos from our school activities!</p>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" alt="" class="img-fluid mb-3" id="modalImage">
                <h6 id="modalTitle"></h6>
                <p class="text-muted" id="modalDescription"></p>
            </div>
        </div>
    </div>
</div>

<style>
.gallery-image-container {
    height: 250px;
    cursor: pointer;
}

.gallery-image {
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.gallery-card:hover .gallery-image {
    transform: scale(1.05);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
}

.btn-group .btn {
    border-radius: 25px !important;
    margin: 0 2px;
}

.gallery-grid {
    display: flex;
    flex-wrap: wrap;
}

.gallery-item {
    transition: all 0.3s ease;
}

.gallery-item.hide {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image modal functionality
    const imageModal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');

    document.querySelectorAll('.gallery-image').forEach(img => {
        img.addEventListener('click', function() {
            modalImage.src = this.dataset.image;
            modalImage.alt = this.dataset.title;
            modalTitle.textContent = this.dataset.title;
            modalDescription.textContent = this.dataset.description || '';
        });
    });

    // Category filter functionality
    const filterButtons = document.querySelectorAll('[data-filter]');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const filter = this.dataset.filter;

            galleryItems.forEach(item => {
                if (filter === '*' || item.classList.contains(filter.substring(1))) {
                    item.classList.remove('hide');
                } else {
                    item.classList.add('hide');
                }
            });
        });
    });
});
</script>

<style>
    /* Modern Gallery Styles */
    .bg-primary-gradient {
        background: linear-gradient(135deg, #e74c25 0%, #2c5530 100%);
    }

    .modern-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        background: #fff;
    }

    .modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 35px rgba(0, 0, 0, 0.12);
    }

    .gallery-image {
        height: 280px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .gallery-card:hover .gallery-image {
        transform: scale(1.1);
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        padding: 2rem 1.5rem 1.5rem;
        transform: translateY(100%);
        transition: all 0.3s ease;
    }

    .gallery-card:hover .gallery-overlay {
        transform: translateY(0);
    }

    .placeholder-icon {
        width: 60px;
        height: 60px;
        background: rgba(231, 76, 37, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #e74c25;
        font-size: 1.5rem;
    }

    .gallery-actions .btn {
        width: 36px;
        height: 36px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hide {
        display: none !important;
    }
</style>
@endsection
