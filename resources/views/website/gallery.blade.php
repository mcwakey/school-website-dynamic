@extends('layouts.website')

@section('title', 'Photo Gallery')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary-gradient text-white py-5 mb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-light text-primary fs-6 px-3 py-2 rounded-pill mb-3">Visual Stories</span>
                <h1 class="display-4 fw-bold mb-3">Photo Gallery</h1>
                <p class="lead mb-4">Capturing precious moments, memories, and milestones from our vibrant school life
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/gallery-hero.svg') }}" alt="Photo Gallery" class="img-fluid"
                     style="max-height: 300px;">
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
                    <div class="btn-group btn-group-lg" role="group" aria-label="Gallery Categories">
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

    <div class="row g-4 justify-content-center">
        @if($photos->count() > 0)
            @foreach($photos as $photo)
                <div class="col-lg-4 col-md-6 col-sm-12 gallery-item {{ $photo->category ? Str::slug($photo->category) : '' }}">
                    <div class="card shadow-sm border-0 h-100 gallery-card">
                        <div class="gallery-image-container position-relative overflow-hidden rounded-4">
                            @if($photo->image_path && file_exists(public_path('storage/' . $photo->image_path)))
                                <img src="{{ asset('storage/' . $photo->image_path) }}"
                                     class="gallery-image w-100"
                                     alt="{{ $photo->title }}"
                                     data-bs-toggle="modal"
                                     data-bs-target="#imageModal"
                                     data-image="{{ asset('storage/' . $photo->image_path) }}"
                                     data-title="{{ $photo->title }}"
                                     data-description="{{ $photo->description }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                                    <div class="placeholder-icon">
                                        <i class="fas fa-image"></i>
                                    </div>
                                </div>
                            @endif
                            @if($photo->event_type)
                                <span class="badge bg-accent position-absolute top-0 start-0 m-2 px-3 py-2" style="z-index:2; font-size:0.95rem;">
                                    <i class="fas fa-calendar-alt me-1"></i>{{ $photo->event_type }}
                                </span>
                            @endif
                            <div class="gallery-overlay d-flex flex-column justify-content-end align-items-start p-3">
                                <h5 class="text-white fw-bold mb-1">{{ $photo->title }}</h5>
                                @if($photo->description)
                                    <p class="text-white small mb-2">{{ Str::limit($photo->description, 80) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 mt-4">
                <div class="d-flex justify-content-center">
                    {{ $photos->onEachSide(1)->links() }}
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
    .bg-primary-gradient {
        background: linear-gradient(135deg, #e74c25 0%, #2c5530 100%);
    }
    .gallery-image-container {
        height: 260px;
        cursor: pointer;
        border-radius: 1.25rem;
        overflow: hidden;
        position: relative;
        background: #f8f9fa;
    }
    .gallery-image {
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s cubic-bezier(0.4,0,0.2,1);
    }
    .gallery-card:hover .gallery-image {
        transform: scale(1.08);
    }
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg,rgba(0,0,0,0.55) 60%,rgba(0,0,0,0.85) 100%);
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 1;
    }
    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-overlay h5, .gallery-overlay p {
        color: #fff;
        text-shadow: 0 2px 8px rgba(0,0,0,0.25);
    }
    .badge.bg-accent {
        background: linear-gradient(135deg, #f093fb 0%, #667eea 100%);
        color: #fff;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(102,126,234,0.15);
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
    .pagination-lg .page-link {
        font-size: 1.15rem;
        padding: 0.75rem 1.25rem;
        border-radius: 0.75rem;
    }
    .pagination-lg .page-item.active .page-link {
        background: linear-gradient(135deg, #e74c25 0%, #2c5530 100%);
        border: none;
        color: #fff;
        font-weight: 600;
    }
</style>

<script>
    // Add lightbox navigation for gallery
    let currentIndex = 0;
    let galleryImages = [];
    document.addEventListener('DOMContentLoaded', function () {
        galleryImages = Array.from(document.querySelectorAll('.gallery-image'));
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDescription = document.getElementById('modalDescription');

        function showImage(index) {
            const img = galleryImages[index];
            if (!img) return;
            modalImage.src = img.dataset.image;
            modalImage.alt = img.dataset.title;
            modalTitle.textContent = img.dataset.title;
            modalDescription.textContent = img.dataset.description || '';
            currentIndex = index;
        }

        galleryImages.forEach((img, idx) => {
            img.addEventListener('click', function () {
                showImage(idx);
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function (e) {
            if (!imageModal.classList.contains('show')) return;
            if (e.key === 'ArrowRight') {
                showImage((currentIndex + 1) % galleryImages.length);
            } else if (e.key === 'ArrowLeft') {
                showImage((currentIndex - 1 + galleryImages.length) % galleryImages.length);
            }
        });

        // Optional: Add next/prev buttons to modal
        const modalBody = imageModal.querySelector('.modal-body');
        if (modalBody && !document.getElementById('galleryNav')) {
            const nav = document.createElement('div');
            nav.id = 'galleryNav';
            nav.className = 'd-flex justify-content-between align-items-center mb-3';
            nav.innerHTML = `
                <button type="button" class="btn btn-outline-secondary btn-sm" id="prevImage"><i class="fas fa-chevron-left"></i> Prev</button>
                <button type="button" class="btn btn-outline-secondary btn-sm" id="nextImage">Next <i class="fas fa-chevron-right"></i></button>
            `;
            modalBody.prepend(nav);
            document.getElementById('prevImage').onclick = function() {
                showImage((currentIndex - 1 + galleryImages.length) % galleryImages.length);
            };
            document.getElementById('nextImage').onclick = function() {
                showImage((currentIndex + 1) % galleryImages.length);
            };
        }
    });
</script>
@endsection
