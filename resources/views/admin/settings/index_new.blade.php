@extends('layouts.admin')

@section('title', 'Settings')

@section('page-title', 'Website Settings')

@section('breadcrumb')
    <li class="breadcrumb-item active">Settings</li>
@endsection

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-lg-8">
            <!-- General Settings -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-cog me-2"></i>General Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="site_name" class="form-label">Site Name <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('settings.site_name') is-invalid @enderror"
                                       id="site_name"
                                       name="settings[site_name]"
                                       value="{{ old('settings.site_name', $generalSettings['site_name']->value ?? '') }}"
                                       required>
                                @error('settings.site_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="site_tagline" class="form-label">Site Tagline</label>
                                <input type="text"
                                       class="form-control @error('settings.site_tagline') is-invalid @enderror"
                                       id="site_tagline"
                                       name="settings[site_tagline]"
                                       value="{{ old('settings.site_tagline', $generalSettings['site_tagline']->value ?? '') }}">
                                @error('settings.site_tagline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="site_description" class="form-label">Site Description</label>
                        <textarea class="form-control @error('settings.site_description') is-invalid @enderror"
                                  id="site_description"
                                  name="settings[site_description]"
                                  rows="3"
                                  placeholder="Brief description about the website...">{{ old('settings.site_description', $generalSettings['site_description']->value ?? '') }}</textarea>
                        @error('settings.site_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text"
                               class="form-control @error('settings.meta_keywords') is-invalid @enderror"
                               id="meta_keywords"
                               name="settings[meta_keywords]"
                               value="{{ old('settings.meta_keywords', $generalSettings['meta_keywords']->value ?? '') }}"
                               placeholder="primary school, education, Ghana">
                        @error('settings.meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-address-book me-2"></i>Contact Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email"
                                       class="form-control @error('settings.email') is-invalid @enderror"
                                       id="email"
                                       name="settings[email]"
                                       value="{{ old('settings.email', $contactSettings['email']->value ?? '') }}">
                                @error('settings.email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel"
                                       class="form-control @error('settings.phone') is-invalid @enderror"
                                       id="phone"
                                       name="settings[phone]"
                                       value="{{ old('settings.phone', $contactSettings['phone']->value ?? '') }}">
                                @error('settings.phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control @error('settings.address') is-invalid @enderror"
                                  id="address"
                                  name="settings[address]"
                                  rows="3"
                                  placeholder="Physical address...">{{ old('settings.address', $contactSettings['address']->value ?? '') }}</textarea>
                        @error('settings.address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Social Media</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="facebook_url" class="form-label">Facebook URL</label>
                                <input type="url"
                                       class="form-control @error('settings.facebook_url') is-invalid @enderror"
                                       id="facebook_url"
                                       name="settings[facebook_url]"
                                       value="{{ old('settings.facebook_url', $socialSettings['facebook_url']->value ?? '') }}"
                                       placeholder="https://facebook.com/yourpage">
                                @error('settings.facebook_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="twitter_url" class="form-label">Twitter URL</label>
                                <input type="url"
                                       class="form-control @error('settings.twitter_url') is-invalid @enderror"
                                       id="twitter_url"
                                       name="settings[twitter_url]"
                                       value="{{ old('settings.twitter_url', $socialSettings['twitter_url']->value ?? '') }}"
                                       placeholder="https://twitter.com/yourhandle">
                                @error('settings.twitter_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="instagram_url" class="form-label">Instagram URL</label>
                                <input type="url"
                                       class="form-control @error('settings.instagram_url') is-invalid @enderror"
                                       id="instagram_url"
                                       name="settings[instagram_url]"
                                       value="{{ old('settings.instagram_url', $socialSettings['instagram_url']->value ?? '') }}"
                                       placeholder="https://instagram.com/yourhandle">
                                @error('settings.instagram_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="youtube_url" class="form-label">YouTube URL</label>
                                <input type="url"
                                       class="form-control @error('settings.youtube_url') is-invalid @enderror"
                                       id="youtube_url"
                                       name="settings[youtube_url]"
                                       value="{{ old('settings.youtube_url', $socialSettings['youtube_url']->value ?? '') }}"
                                       placeholder="https://youtube.com/yourchannel">
                                @error('settings.youtube_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-search me-2"></i>SEO Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control @error('settings.meta_description') is-invalid @enderror"
                                  id="meta_description"
                                  name="settings[meta_description]"
                                  rows="3"
                                  placeholder="Brief description for search engines...">{{ old('settings.meta_description', $seoSettings['meta_description']->value ?? '') }}</textarea>
                        @error('settings.meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="google_analytics" class="form-label">Google Analytics ID</label>
                        <input type="text"
                               class="form-control @error('settings.google_analytics') is-invalid @enderror"
                               id="google_analytics"
                               name="settings[google_analytics]"
                               value="{{ old('settings.google_analytics', $generalSettings['google_analytics']->value ?? '') }}"
                               placeholder="GA-XXXXXXXXX">
                        @error('settings.google_analytics')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Actions -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-save me-2"></i>Actions</h5>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                        <i class="fas fa-save me-2"></i>Update Settings
                    </button>

                    <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>View Website
                    </a>
                </div>
            </div>

            <!-- Logo Upload (if needed) -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-image me-2"></i>Site Logo</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        @if(isset($generalSettings['site_logo']) && $generalSettings['site_logo']->value)
                            <div class="text-center mb-3">
                                <img src="{{ asset('storage/' . $generalSettings['site_logo']->value) }}"
                                     alt="Current Logo"
                                     class="img-thumbnail"
                                     style="max-height: 100px;">
                                <p class="small text-muted mt-2">Current Logo</p>
                            </div>
                        @endif

                        <label for="site_logo" class="form-label">Upload New Logo</label>
                        <input type="file"
                               class="form-control @error('settings.site_logo') is-invalid @enderror"
                               id="site_logo"
                               name="settings[site_logo]"
                               accept="image/*">
                        @error('settings.site_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Recommended size: 200x80px (PNG or JPG)</div>
                    </div>
                </div>
            </div>

            <!-- Help -->
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Help & Tips</h5>
                </div>
                <div class="card-body">
                    <ul class="mb-0 ps-3">
                        <li class="mb-2">Keep site information up to date</li>
                        <li class="mb-2">Use descriptive meta descriptions for SEO</li>
                        <li class="mb-2">Add social media links to increase engagement</li>
                        <li class="mb-2">Check how changes look on the live website</li>
                        <li>Contact support if you need help</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
