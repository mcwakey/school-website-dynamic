@extends('layouts.admin')

@section('title', 'Create Page Content')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Create Page Content</h1>
                <a href="{{ route('admin.page-contents.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Page Contents
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Content Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.page-contents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="page" class="form-label">Page <span class="text-danger">*</span></label>
                                    <select name="page" id="page" class="form-control @error('page') is-invalid @enderror" required>
                                        <option value="">Select Page</option>
                                        @foreach($pages as $page)
                                            <option value="{{ $page }}" {{ old('page', request('page')) === $page ? 'selected' : '' }}>
                                                {{ ucfirst($page) }}
                                            </option>
                                        @endforeach
                                        <option value="custom">Custom Page...</option>
                                    </select>
                                    @error('page')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="section" class="form-label">Section <span class="text-danger">*</span></label>
                                    <select name="section" id="section" class="form-control @error('section') is-invalid @enderror" required>
                                        <option value="">Select Section</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section }}" {{ old('section', request('section')) === $section ? 'selected' : '' }}>
                                                {{ ucfirst($section) }}
                                            </option>
                                        @endforeach
                                        <option value="custom">Custom Section...</option>
                                    </select>
                                    @error('section')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Custom page/section inputs (hidden by default) -->
                        <div class="row" id="custom-fields" style="display: none;">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="custom_page" class="form-label">Custom Page Name</label>
                                    <input type="text"
                                           id="custom_page"
                                           class="form-control"
                                           placeholder="Enter custom page name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="custom_section" class="form-label">Custom Section Name</label>
                                    <input type="text"
                                           id="custom_section"
                                           class="form-control"
                                           placeholder="Enter custom section name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="key" class="form-label">Content Key <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="key"
                                           id="key"
                                           class="form-control @error('key') is-invalid @enderror"
                                           value="{{ old('key') }}"
                                           required
                                           placeholder="e.g., hero_title, welcome_description">
                                    <small class="form-text text-muted">Unique identifier for this content piece</small>
                                    @error('key')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="sort_order" class="form-label">Sort Order</label>
                                    <input type="number"
                                           name="sort_order"
                                           id="sort_order"
                                           class="form-control @error('sort_order') is-invalid @enderror"
                                           value="{{ old('sort_order', 0) }}"
                                           min="0"
                                           step="1">
                                    <small class="form-text text-muted">Display order (lower numbers first)</small>
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}"
                                   placeholder="Content title (optional)">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content"
                                      id="content"
                                      class="form-control @error('content') is-invalid @enderror"
                                      rows="6"
                                      placeholder="Enter your content here...">{{ old('content') }}</textarea>
                            <small class="form-text text-muted">HTML tags are allowed</small>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Image (Optional)</label>
                            <input type="file"
                                   name="image"
                                   id="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   accept="image/*">
                            <small class="form-text text-muted">Max file size: 10MB. Supported formats: JPEG, PNG, JPG, GIF</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="metadata" class="form-label">Metadata (Optional)</label>
                            <textarea name="metadata"
                                      id="metadata"
                                      class="form-control @error('metadata') is-invalid @enderror"
                                      rows="3"
                                      placeholder='{"button_text": "Learn More", "link_url": "/about"}'>{{ old('metadata') }}</textarea>
                            <small class="form-text text-muted">JSON format for additional data (e.g., button text, links, etc.)</small>
                            @error('metadata')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input type="checkbox"
                                       name="is_active"
                                       id="is_active"
                                       class="form-check-input"
                                       value="1"
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">
                                    Active (visible on website)
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.page-contents.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Content
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Content Guide</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle"></i> How to Use</h6>
                        <ul class="mb-0 small">
                            <li><strong>Page:</strong> Which page this content appears on</li>
                            <li><strong>Section:</strong> Which section of the page</li>
                            <li><strong>Key:</strong> Unique identifier for developers</li>
                            <li><strong>Title:</strong> Heading or title text</li>
                            <li><strong>Content:</strong> Main content (HTML allowed)</li>
                            <li><strong>Image:</strong> Associated image file</li>
                            <li><strong>Metadata:</strong> Extra data in JSON format</li>
                        </ul>
                    </div>

                    <div class="alert alert-warning">
                        <h6><i class="fas fa-lightbulb"></i> Tips</h6>
                        <ul class="mb-0 small">
                            <li>Use descriptive keys like "hero_title" or "welcome_text"</li>
                            <li>Keep content organized by page and section</li>
                            <li>Use sort order to control display sequence</li>
                            <li>Test JSON metadata before saving</li>
                        </ul>
                    </div>

                    <div class="alert alert-light">
                        <h6><i class="fas fa-code"></i> Common Keys</h6>
                        <ul class="mb-0 small">
                            <li>hero_title, hero_subtitle</li>
                            <li>welcome_heading, welcome_text</li>
                            <li>mission_statement, vision_statement</li>
                            <li>contact_address, contact_phone</li>
                            <li>feature_1_title, feature_1_description</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Templates</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="fillTemplate('hero')">
                            Hero Section
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="fillTemplate('feature')">
                            Feature Item
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="fillTemplate('testimonial')">
                            Testimonial
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="fillTemplate('contact')">
                            Contact Info
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Handle custom page/section selection
    document.getElementById('page').addEventListener('change', function() {
        toggleCustomFields();
        generateKey();
    });

    document.getElementById('section').addEventListener('change', function() {
        toggleCustomFields();
        generateKey();
    });

    document.getElementById('title').addEventListener('input', generateKey);

    function toggleCustomFields() {
        const pageSelect = document.getElementById('page');
        const sectionSelect = document.getElementById('section');
        const customFields = document.getElementById('custom-fields');

        if (pageSelect.value === 'custom' || sectionSelect.value === 'custom') {
            customFields.style.display = 'block';
        } else {
            customFields.style.display = 'none';
        }
    }

    // Auto-generate key based on page, section, and title
    function generateKey() {
        const page = document.getElementById('page').value || document.getElementById('custom_page')?.value;
        const section = document.getElementById('section').value || document.getElementById('custom_section')?.value;
        const title = document.getElementById('title').value;
        const keyField = document.getElementById('key');

        if (!keyField.value && page && section) {
            let key = page + '_' + section;
            if (title) {
                key += '_' + title.toLowerCase().replace(/[^a-z0-9\s]/g, '').replace(/\s+/g, '_');
            }
            keyField.value = key;
        }
    }

    // Handle custom inputs
    document.getElementById('custom_page')?.addEventListener('input', function() {
        if (this.value) {
            document.getElementById('page').value = this.value;
        }
        generateKey();
    });

    document.getElementById('custom_section')?.addEventListener('input', function() {
        if (this.value) {
            document.getElementById('section').value = this.value;
        }
        generateKey();
    });

    // Quick templates
    function fillTemplate(type) {
        const templates = {
            hero: {
                section: 'hero',
                title: 'Welcome to Our School',
                content: '<h1>Excellence in Education</h1><p>Providing quality education for the future leaders of Ghana.</p>',
                metadata: '{"button_text": "Learn More", "button_url": "/about"}'
            },
            feature: {
                section: 'features',
                title: 'Quality Education',
                content: '<p>We provide comprehensive education that prepares students for success in life.</p>',
                metadata: '{"icon": "fas fa-graduation-cap"}'
            },
            testimonial: {
                section: 'testimonials',
                title: 'Parent Testimonial',
                content: '"My child has thrived at this school. The teachers are dedicated and caring."',
                metadata: '{"author": "Parent Name", "role": "Parent"}'
            },
            contact: {
                section: 'contact',
                title: 'School Address',
                content: 'Ghana Primary School<br>123 Education Street<br>Accra, Ghana',
                metadata: '{"type": "address", "phone": "+233 XXX XXX XXX"}'
            }
        };

        const template = templates[type];
        if (template) {
            document.getElementById('section').value = template.section;
            document.getElementById('title').value = template.title;
            document.getElementById('content').value = template.content;
            document.getElementById('metadata').value = template.metadata;
            generateKey();
        }
    }

    // Validate JSON metadata
    document.getElementById('metadata').addEventListener('blur', function() {
        if (this.value.trim()) {
            try {
                JSON.parse(this.value);
                this.classList.remove('is-invalid');
            } catch (e) {
                this.classList.add('is-invalid');
                alert('Invalid JSON format in metadata field');
            }
        }
    });
</script>
@endpush
