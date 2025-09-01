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
                    <div class="card shadow-sm border-0 h-100 gallery-card"
                         data-image="{{ asset('storage/' . $photo->image_path) }}"
                         data-title="{{ $photo->title }}"
                         data-description="{{ $photo->description }}"
                         style="cursor: pointer;">
                        <div class="gallery-image-container position-relative overflow-hidden rounded-4">
                            @if($photo->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($photo->image_path))
                                <img src="{{ asset('storage/' . $photo->image_path) }}"
                                     class="gallery-image w-100"
                                     alt="{{ $photo->title }}"
                                     data-image="{{ asset('storage/' . $photo->image_path) }}"
                                     data-title="{{ $photo->title }}"
                                     data-description="{{ $photo->description }}"
                                     onerror="this.onerror=null; this.style.display='none';"
                                     style="transition: transform 0.3s ease;">
                                <!-- Click indicator overlay -->
                                <div class="gallery-click-indicator position-absolute top-50 start-50 translate-middle">
                                    <i class="fas fa-search-plus text-white" style="font-size: 2.5rem; opacity: 0.7; transition: opacity 0.3s; text-shadow: 0 0 10px rgba(0,0,0,0.8);"></i>
                                </div>
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                                    <div class="placeholder-icon">
                                        <i class="fas fa-image"></i>
                                    </div>
                                </div>
                            @endif
                            @if($photo->category)
                                <span class="badge bg-accent position-absolute top-0 start-0 m-2 px-3 py-2" style="z-index:2; font-size:0.95rem;">
                                    <i class="fas fa-tag me-1"></i>{{ ucfirst($photo->category) }}
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
                <img src="" alt="" class="img-fluid" id="modalImage">
                <h6 id="modalTitle"></h6>
                <p id="modalDescription"></p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Transparent Modal Styles */
    #imageModal .modal-content {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }
    #imageModal .modal-header {
        background: transparent !important;
        border: none !important;
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1060;
        padding: 0;
    }
    #imageModal .modal-title {
        display: none; /* Hide title for clean look */
    }
    #imageModal .btn-close {
        background: linear-gradient(145deg,
            rgba(255, 255, 255, 0.95) 0%,
            rgba(255, 255, 255, 0.85) 100%) !important;
        border-radius: 50%;
        width: 52px;
        height: 52px;
        opacity: 1 !important;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex !important;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        color: #333 !important;
        border: 2px solid rgba(255, 255, 255, 0.9);
        box-shadow:
            0 6px 20px rgba(0, 0, 0, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        z-index: 1063;
        position: fixed !important;
        right: 20px !important;
        top: 20px !important;
        backdrop-filter: blur(10px);
        animation: closeButtonFadeIn 0.5s ease-out;
    }
    #imageModal .btn-close:hover {
        background: linear-gradient(145deg,
            rgba(255, 255, 255, 1) 0%,
            rgba(255, 255, 255, 0.95) 100%) !important;
        transform: scale(1.1) rotate(90deg);
        box-shadow:
            0 8px 30px rgba(0, 0, 0, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 1);
        border-color: rgba(255, 255, 255, 1);
    }
    #imageModal .btn-close:active {
        transform: scale(0.95) rotate(90deg);
        transition: transform 0.1s ease;
    }
    #imageModal .btn-close::after {
        content: "×";
        font-size: 2rem;
        font-weight: 300;
        line-height: 1;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    @keyframes closeButtonFadeIn {
        0% {
            opacity: 0;
            transform: scale(0.7) rotate(-90deg);
        }
        60% {
            opacity: 0.8;
            transform: scale(1.05) rotate(0deg);
        }
        100% {
            opacity: 1;
            transform: scale(1) rotate(0deg);
        }
    }
    #imageModal .modal-body {
        background: transparent !important;
        border: none !important;
        padding: 20px;
        position: relative;
    }
    #imageModal #modalImage {
        max-height: 90vh;
        width: auto;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }
    /* Modern elegant title and description with darker backgrounds */
    #imageModal #modalTitle {
        position: absolute;
        top: 15px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(145deg,
            rgba(0, 0, 0, 0.85) 0%,
            rgba(0, 0, 0, 0.75) 50%,
            rgba(0, 0, 0, 0.65) 100%);
        color: white;
        padding: 16px 30px;
        border-radius: 20px;
        font-size: 1.4rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        backdrop-filter: blur(25px) saturate(180%);
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.6),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(255, 255, 255, 0.1);
        z-index: 1061;
        max-width: 85%;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.25);
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.8);
        animation: titleFadeIn 0.6s ease-out;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #imageModal #modalTitle:hover {
        transform: translateX(-50%) translateY(-2px);
        box-shadow:
            0 12px 40px rgba(0, 0, 0, 0.7),
            inset 0 1px 0 rgba(255, 255, 255, 0.3),
            inset 0 -1px 0 rgba(255, 255, 255, 0.15);
        background: linear-gradient(145deg,
            rgba(0, 0, 0, 0.9) 0%,
            rgba(0, 0, 0, 0.8) 50%,
            rgba(0, 0, 0, 0.7) 100%);
    }

    #imageModal #modalDescription {
        position: absolute;
        bottom: 70px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(145deg,
            rgba(0, 0, 0, 0.9) 0%,
            rgba(0, 0, 0, 0.8) 50%,
            rgba(0, 0, 0, 0.7) 100%);
        color: rgba(255, 255, 255, 0.95);
        padding: 18px 28px;
        border-radius: 18px;
        font-size: 1.05rem;
        line-height: 1.6;
        font-weight: 400;
        letter-spacing: 0.3px;
        backdrop-filter: blur(20px) saturate(150%);
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.7),
            inset 0 1px 0 rgba(255, 255, 255, 0.15),
            inset 0 -1px 0 rgba(255, 255, 255, 0.05);
        z-index: 1061;
        max-width: 90%;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.9);
        animation: descriptionSlideUp 0.8s ease-out;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #imageModal #modalDescription:hover {
        transform: translateX(-50%) translateY(-3px);
        box-shadow:
            0 12px 40px rgba(0, 0, 0, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(255, 255, 255, 0.08);
        background: linear-gradient(145deg,
            rgba(0, 0, 0, 0.95) 0%,
            rgba(0, 0, 0, 0.85) 50%,
            rgba(0, 0, 0, 0.75) 100%);
    }

    /* Keyframe animations for modern entrance effects */
    @keyframes titleFadeIn {
        0% {
            opacity: 0;
            transform: translateX(-50%) translateY(-20px) scale(0.9);
            filter: blur(5px);
        }
        60% {
            opacity: 0.8;
            transform: translateX(-50%) translateY(-5px) scale(1.02);
        }
        100% {
            opacity: 1;
            transform: translateX(-50%) translateY(0) scale(1);
            filter: blur(0);
        }
    }

    @keyframes descriptionSlideUp {
        0% {
            opacity: 0;
            transform: translateX(-50%) translateY(30px) scale(0.95);
            filter: blur(8px);
        }
        40% {
            opacity: 0.6;
        }
        100% {
            opacity: 1;
            transform: translateX(-50%) translateY(0) scale(1);
            filter: blur(0);
        }
    }
    /* Modern navigation arrows positioned on left and right sides */
    #imageModal .nav-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: linear-gradient(145deg,
            rgba(255, 255, 255, 0.9) 0%,
            rgba(255, 255, 255, 0.8) 100%);
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #333;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1062;
        box-shadow:
            0 6px 20px rgba(0, 0, 0, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        animation: arrowFadeIn 0.6s ease-out;
    }
    #imageModal .nav-arrow:hover {
        background: linear-gradient(145deg,
            rgba(255, 255, 255, 1) 0%,
            rgba(255, 255, 255, 0.95) 100%);
        transform: translateY(-50%) scale(1.15);
        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.35),
            inset 0 1px 0 rgba(255, 255, 255, 1);
        border-color: rgba(255, 255, 255, 1);
    }
    #imageModal .nav-arrow:active {
        transform: translateY(-50%) scale(1.05);
        transition: transform 0.1s ease;
    }
    #imageModal .nav-arrow.nav-prev {
        left: 20px;
        animation-delay: 0.1s;
    }
    #imageModal .nav-arrow.nav-next {
        right: 20px;
        animation-delay: 0.2s;
    }

    @keyframes arrowFadeIn {
        0% {
            opacity: 0;
            transform: translateY(-50%) scale(0.8);
        }
        60% {
            opacity: 0.8;
            transform: translateY(-50%) scale(1.05);
        }
        100% {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }
    }
    /* Modern image counter positioned just below description */
    #imageModal #imageCounter {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(145deg,
            rgba(0, 0, 0, 0.9) 0%,
            rgba(0, 0, 0, 0.8) 100%);
        color: rgba(255, 255, 255, 0.95);
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        backdrop-filter: blur(15px) saturate(150%);
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow:
            0 6px 20px rgba(0, 0, 0, 0.6),
            inset 0 1px 0 rgba(255, 255, 255, 0.15);
        z-index: 1061;
        animation: counterSlideUp 0.7s ease-out;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #imageModal #imageCounter:hover {
        transform: translateX(-50%) translateY(-2px);
        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.7),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        background: linear-gradient(145deg,
            rgba(0, 0, 0, 0.95) 0%,
            rgba(0, 0, 0, 0.85) 100%);
    }

    @keyframes counterSlideUp {
        0% {
            opacity: 0;
            transform: translateX(-50%) translateY(25px) scale(0.9);
        }
        60% {
            opacity: 0.8;
            transform: translateX(-50%) translateY(-3px) scale(1.02);
        }
        100% {
            opacity: 1;
            transform: translateX(-50%) translateY(0) scale(1);
        }
    }

    /* Responsive adjustments for mobile - Enhanced for new design */
    @media (max-width: 768px) {
        #imageModal .nav-arrow {
            width: 45px;
            height: 45px;
            font-size: 1.2rem;
        }
        #imageModal .nav-arrow.nav-prev {
            left: 10px;
        }
        #imageModal .nav-arrow.nav-next {
            right: 10px;
        }
        #imageModal .btn-close {
            width: 45px;
            height: 45px;
            right: 15px !important;
            top: 15px !important;
        }
        #imageModal #modalTitle {
            font-size: 1.2rem;
            font-weight: 700;
            padding: 14px 20px;
            max-width: 95%;
            letter-spacing: 0.3px;
            border-radius: 16px;
            top: 10px;
        }
        #imageModal #modalDescription {
            font-size: 0.95rem;
            padding: 16px 24px;
            max-width: 95%;
            bottom: 60px;
            line-height: 1.5;
            border-radius: 14px;
            letter-spacing: 0.2px;
        }
        #imageModal #imageCounter {
            font-size: 0.9rem;
            padding: 8px 16px;
            border-radius: 20px;
            letter-spacing: 0.3px;
        }

        /* Mobile-specific animations with reduced motion */
        @keyframes titleFadeInMobile {
            0% {
                opacity: 0;
                transform: translateX(-50%) translateY(-15px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateX(-50%) translateY(0) scale(1);
            }
        }

        @keyframes descriptionSlideUpMobile {
            0% {
                opacity: 0;
                transform: translateX(-50%) translateY(20px) scale(0.98);
            }
            100% {
                opacity: 1;
                transform: translateX(-50%) translateY(0) scale(1);
            }
        }

        #imageModal #modalTitle {
            animation: titleFadeInMobile 0.4s ease-out;
        }

        #imageModal #modalDescription {
            animation: descriptionSlideUpMobile 0.5s ease-out;
        }
    }

    .bg-primary-gradient {
        background: linear-gradient(135deg, #e74c25 0%, #2c5530 100%);
    }
    .gallery-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
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
    .gallery-card:hover .gallery-click-indicator i {
        opacity: 1 !important;
        transform: scale(1.1);
        text-shadow: 0 0 15px rgba(0,0,0,0.9);
    }
    .gallery-click-indicator {
        z-index: 10;
        pointer-events: none; /* Allow clicks to pass through to the image */
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
    // Simplified Gallery Lightbox - Direct Approach
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Gallery script loading...');

        // Wait for Bootstrap to be ready
        function initLightbox() {
            if (typeof bootstrap === 'undefined') {
                console.log('Bootstrap not ready, retrying...');
                setTimeout(initLightbox, 200);
                return;
            }

            console.log('Bootstrap ready, initializing lightbox...');

            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');
            const galleryImages = document.querySelectorAll('.gallery-image');
            const galleryCards = document.querySelectorAll('.gallery-card');

            console.log('Found', galleryImages.length, 'gallery images');
            console.log('Found', galleryCards.length, 'gallery cards');

            if (!modal || galleryCards.length === 0) {
                console.log('Modal or gallery cards not found');
                return;
            }

            let currentIndex = 0;
            let bsModal = null;

            // Function to handle gallery item click
            function handleGalleryClick(element, index) {
                console.log('🖱️ CLICKED GALLERY ITEM:', index);

                const imageData = {
                    src: element.dataset.image,
                    title: element.dataset.title,
                    description: element.dataset.description
                };

                console.log('Image data:', imageData);

                // Visual feedback
                element.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    element.style.transform = '';
                }, 150);

                // Update modal content
                modalImage.src = imageData.src;
                modalImage.alt = imageData.title;
                modalTitle.textContent = imageData.title;
                modalDescription.textContent = imageData.description || '';
                currentIndex = index;

                console.log('Modal content updated, showing modal...');

                // Show modal
                try {
                    if (!bsModal) {
                        console.log('Creating new Bootstrap modal instance...');
                        bsModal = new bootstrap.Modal(modal, {
                                backdrop: true,
                                keyboard: true,
                                focus: true
                            });
                        }
                        bsModal.show();
                        console.log('✅ Modal shown successfully');
                    } catch (error) {
                        console.error('❌ Modal error:', error);
                        // Fallback - show modal manually
                        modal.style.display = 'block';
                        modal.classList.add('show');
                        document.body.classList.add('modal-open');

                        // Create backdrop
                        if (!document.querySelector('.modal-backdrop')) {
                            const backdrop = document.createElement('div');
                            backdrop.className = 'modal-backdrop fade show';
                            document.body.appendChild(backdrop);
                        }
                        console.log('✅ Fallback modal activated');
                    }
            }

            // Set up click handlers for gallery cards
            galleryCards.forEach((card, index) => {
                console.log('Setting up click handler for card:', index);

                card.addEventListener('mouseenter', function() {
                    this.style.cursor = 'pointer';
                });

                card.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    handleGalleryClick(this, index);
                });
            });

            // Also set up click handlers for images as backup
            galleryImages.forEach((img, index) => {
                img.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    handleGalleryClick(this, index);
                });
            });

            // Navigation arrows (add after modal is shown)
            modal.addEventListener('shown.bs.modal', function() {
                addNavigationArrows();
                updateImageCounter();
            });

            // Clean up navigation elements when modal is hidden
            modal.addEventListener('hidden.bs.modal', function() {
                const existingArrows = document.querySelectorAll('.nav-arrow');
                const existingCounter = document.getElementById('imageCounter');

                existingArrows.forEach(arrow => arrow.remove());
                if (existingCounter) existingCounter.remove();
            });

            function addNavigationArrows() {
                if (galleryImages.length <= 1) return;

                const modalDialog = modal.querySelector('.modal-dialog');

                // Remove any existing navigation elements
                const existingNav = document.getElementById('galleryNav');
                const existingArrows = document.querySelectorAll('.nav-arrow');
                const existingCounter = document.getElementById('imageCounter');

                if (existingNav) existingNav.remove();
                existingArrows.forEach(arrow => arrow.remove());
                if (existingCounter) existingCounter.remove();

                // Create left navigation arrow
                const prevArrow = document.createElement('button');
                prevArrow.className = 'nav-arrow nav-prev';
                prevArrow.innerHTML = '<i class="fas fa-chevron-left"></i>';
                prevArrow.addEventListener('click', () => navigateGallery(-1));
                modalDialog.appendChild(prevArrow);

                // Create right navigation arrow
                const nextArrow = document.createElement('button');
                nextArrow.className = 'nav-arrow nav-next';
                nextArrow.innerHTML = '<i class="fas fa-chevron-right"></i>';
                nextArrow.addEventListener('click', () => navigateGallery(1));
                modalDialog.appendChild(nextArrow);

                // Create image counter
                const counter = document.createElement('div');
                counter.id = 'imageCounter';
                counter.textContent = `${currentIndex + 1} of ${galleryImages.length}`;
                modalDialog.appendChild(counter);
            }

            function updateImageCounter() {
                const counter = document.getElementById('imageCounter');
                if (counter && galleryImages.length > 1) {
                    counter.textContent = `${currentIndex + 1} of ${galleryImages.length}`;
                }
            }

            // Navigation function (global scope)
            window.navigateGallery = function(direction) {
                const newIndex = (currentIndex + direction + galleryImages.length) % galleryImages.length;
                const newCard = galleryCards[newIndex];

                modalImage.src = newCard.dataset.image;
                modalImage.alt = newCard.dataset.title;
                modalTitle.textContent = newCard.dataset.title;
                modalDescription.textContent = newCard.dataset.description || '';
                currentIndex = newIndex;

                updateImageCounter();
            };

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (!modal.classList.contains('show')) return;

                if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    navigateGallery(1);
                } else if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    navigateGallery(-1);
                } else if (e.key === 'Escape') {
                    if (bsModal) {
                        bsModal.hide();
                    }
                }
            });

            console.log('Gallery lightbox initialized successfully');
        }

        // Start initialization
        initLightbox();
    });

    // Category filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('[data-filter]');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.dataset.filter;

                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // Filter gallery items
                galleryItems.forEach(item => {
                    if (filter === '*' || item.classList.contains(filter.substring(1))) {
                        item.style.display = 'block';
                        item.style.opacity = '1';
                    } else {
                        item.style.display = 'none';
                        item.style.opacity = '0';
                    }
                });
            });
        });
    });
</script>
@endsection
