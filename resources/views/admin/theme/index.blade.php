@extends('layouts.admin')

@section('title', 'Theme & Design')

@section('page-title', 'Theme & Design Customization')

@section('breadcrumb')
    <li class="breadcrumb-item active">Theme & Design</li>
@endsection

@section('content')
<form action="{{ route('admin.theme.update') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-lg-8">
            <!-- Color Settings -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-palette me-2"></i>Color Scheme</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="primary_color" class="form-label">Primary Color</label>
                                <div class="input-group">
                                    <input type="color"
                                           class="form-control form-control-color"
                                           id="primary_color"
                                           name="colors[primary_color]"
                                           value="{{ $colorSettings->get('primary_color')?->value ?? '#667eea' }}"
                                           required>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ $colorSettings->get('primary_color')?->value ?? '#667eea' }}"
                                           readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="secondary_color" class="form-label">Secondary Color</label>
                                <div class="input-group">
                                    <input type="color"
                                           class="form-control form-control-color"
                                           id="secondary_color"
                                           name="colors[secondary_color]"
                                           value="{{ $colorSettings->get('secondary_color')?->value ?? '#764ba2' }}"
                                           required>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ $colorSettings->get('secondary_color')?->value ?? '#764ba2' }}"
                                           readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="accent_color" class="form-label">Accent Color</label>
                                <div class="input-group">
                                    <input type="color"
                                           class="form-control form-control-color"
                                           id="accent_color"
                                           name="colors[accent_color]"
                                           value="{{ $colorSettings->get('accent_color')?->value ?? '#f093fb' }}"
                                           required>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ $colorSettings->get('accent_color')?->value ?? '#f093fb' }}"
                                           readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="text_color" class="form-label">Text Color</label>
                                <div class="input-group">
                                    <input type="color"
                                           class="form-control form-control-color"
                                           id="text_color"
                                           name="colors[text_color]"
                                           value="{{ $colorSettings->get('text_color')?->value ?? '#333333' }}"
                                           required>
                                    <input type="text"
                                           class="form-control"
                                           value="{{ $colorSettings->get('text_color')?->value ?? '#333333' }}"
                                           readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Typography -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-font me-2"></i>Typography</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="header_font" class="form-label">Header Font</label>
                                <select class="form-select" id="header_font" name="fonts[header_font]" required>
                                    <option value="Nunito" {{ ($fontSettings->get('header_font')?->value ?? 'Nunito') == 'Nunito' ? 'selected' : '' }}>Nunito</option>
                                    <option value="Inter" {{ ($fontSettings->get('header_font')?->value ?? 'Nunito') == 'Inter' ? 'selected' : '' }}>Inter</option>
                                    <option value="Roboto" {{ ($fontSettings->get('header_font')?->value ?? 'Nunito') == 'Roboto' ? 'selected' : '' }}>Roboto</option>
                                    <option value="Open Sans" {{ ($fontSettings->get('header_font')?->value ?? 'Nunito') == 'Open Sans' ? 'selected' : '' }}>Open Sans</option>
                                    <option value="Poppins" {{ ($fontSettings->get('header_font')?->value ?? 'Nunito') == 'Poppins' ? 'selected' : '' }}>Poppins</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="body_font" class="form-label">Body Font</label>
                                <select class="form-select" id="body_font" name="fonts[body_font]" required>
                                    <option value="Nunito" {{ ($fontSettings->get('body_font')?->value ?? 'Nunito') == 'Nunito' ? 'selected' : '' }}>Nunito</option>
                                    <option value="Inter" {{ ($fontSettings->get('body_font')?->value ?? 'Nunito') == 'Inter' ? 'selected' : '' }}>Inter</option>
                                    <option value="Roboto" {{ ($fontSettings->get('body_font')?->value ?? 'Nunito') == 'Roboto' ? 'selected' : '' }}>Roboto</option>
                                    <option value="Open Sans" {{ ($fontSettings->get('body_font')?->value ?? 'Nunito') == 'Open Sans' ? 'selected' : '' }}>Open Sans</option>
                                    <option value="Source Sans Pro" {{ ($fontSettings->get('body_font')?->value ?? 'Nunito') == 'Source Sans Pro' ? 'selected' : '' }}>Source Sans Pro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom CSS/JS -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-code me-2"></i>Custom Code</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="custom_css" class="form-label">Custom CSS</label>
                        <textarea class="form-control font-monospace"
                                  id="custom_css"
                                  name="custom_css"
                                  rows="8"
                                  placeholder="/* Add your custom CSS here */">{{ $customCss }}</textarea>
                        <small class="form-text text-muted">Add custom CSS to override default styles.</small>
                    </div>

                    <div class="mb-3">
                        <label for="custom_js" class="form-label">Custom JavaScript</label>
                        <textarea class="form-control font-monospace"
                                  id="custom_js"
                                  name="custom_js"
                                  rows="8"
                                  placeholder="// Add your custom JavaScript here">{{ $customJs }}</textarea>
                        <small class="form-text text-muted">Add custom JavaScript (will be included before closing &lt;/body&gt; tag).</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Actions -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                        <i class="fas fa-save me-2"></i>Save Theme Settings
                    </button>

                    <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100 mb-3" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>Preview Website
                    </a>

                    <form action="{{ route('admin.theme.reset') }}" method="POST" style="display: inline;" class="w-100">
                        @csrf
                        <button type="submit" class="btn btn-outline-warning w-100"
                                onclick="return confirm('Are you sure you want to reset to default theme?')">
                            <i class="fas fa-undo me-2"></i>Reset to Default
                        </button>
                    </form>
                </div>
            </div>

            <!-- Color Preview -->
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Color Preview</h5>
                </div>
                <div class="card-body">
                    <div class="color-preview-box mb-3 p-3 rounded"
                         style="background: var(--bs-primary, #667eea); color: white;">
                        <h6>Primary Color</h6>
                        <p class="mb-0">Headers, buttons, links</p>
                    </div>
                    <div class="color-preview-box mb-3 p-3 rounded"
                         style="background: var(--bs-secondary, #764ba2); color: white;">
                        <h6>Secondary Color</h6>
                        <p class="mb-0">Supporting elements</p>
                    </div>
                    <div class="color-preview-box p-3 rounded border">
                        <h6>Text Color</h6>
                        <p class="mb-0">Body text and content</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
// Update color preview when colors change
document.querySelectorAll('input[type="color"]').forEach(input => {
    input.addEventListener('change', function() {
        this.nextElementSibling.value = this.value;

        // Update CSS variables for live preview
        const colorName = this.name.split('[')[1].replace(']', '');
        if (colorName === 'primary_color') {
            document.documentElement.style.setProperty('--bs-primary', this.value);
        } else if (colorName === 'secondary_color') {
            document.documentElement.style.setProperty('--bs-secondary', this.value);
        }
    });
});
</script>
@endsection
