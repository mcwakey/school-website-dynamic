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
            <!-- School Information -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-school me-2"></i>School Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="school_name" class="form-label">School Name <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('school.name') is-invalid @enderror"
                                       id="school_name"
                                       name="school[name]"
                                       value="{{ old('school.name', $school->name ?? '') }}"
                                       required>
                                @error('school.name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="school_email" class="form-label">Email Address</label>
                                <input type="email"
                                       class="form-control @error('school.email') is-invalid @enderror"
                                       id="school_email"
                                       name="school[email]"
                                       value="{{ old('school.email', $school->email ?? '') }}">
                                @error('school.email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="school_phone" class="form-label">Phone Number</label>
                                <input type="tel"
                                       class="form-control @error('school.phone') is-invalid @enderror"
                                       id="school_phone"
                                       name="school[phone]"
                                       value="{{ old('school.phone', $school->phone ?? '') }}">
                                @error('school.phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="school_website" class="form-label">Website URL</label>
                                <input type="url"
                                       class="form-control @error('school.website') is-invalid @enderror"
                                       id="school_website"
                                       name="school[website]"
                                       value="{{ old('school.website', $school->website ?? '') }}">
                                @error('school.website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="school_address" class="form-label">Address</label>
                        <textarea class="form-control @error('school.address') is-invalid @enderror"
                                  id="school_address"
                                  name="school[address]"
                                  rows="3">{{ old('school.address', $school->address ?? '') }}</textarea>
                        @error('school.address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="school_description" class="form-label">School Description</label>
                        <textarea class="form-control @error('school.description') is-invalid @enderror"
                                  id="school_description"
                                  name="school[description]"
                                  rows="4"
                                  placeholder="Brief description about the school...">{{ old('school.description', $school->description ?? '') }}</textarea>
                        @error('school.description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">School Logo</label>
                        <input type="file"
                               class="form-control @error('logo') is-invalid @enderror"
                               id="logo"
                               name="logo"
                               accept="image/*">
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($school && $school->logo)
                            <div class="mt-2">
                                <small class="text-muted">Current logo:</small><br>
                                <img src="{{ asset('storage/' . $school->logo) }}"
                                     alt="Current Logo"
                                     class="img-thumbnail"
                                     style="max-height: 100px;">
                            </div>
                        @endif
                        <small class="form-text text-muted">Upload a new logo (JPEG, PNG, JPG, GIF, max 2MB)</small>
                    </div>
                </div>
            </div>

            <!-- Website Settings -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Website Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="site_title" class="form-label">Site Title</label>
                                <input type="text"
                                       class="form-control"
                                       id="site_title"
                                       name="settings[site_title]"
                                       value="{{ old('settings.site_title', $settings['site_title']->value ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="site_tagline" class="form-label">Site Tagline</label>
                                <input type="text"
                                       class="form-control"
                                       id="site_tagline"
                                       name="settings[site_tagline]"
                                       value="{{ old('settings.site_tagline', $settings['site_tagline']->value ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control"
                                  id="meta_description"
                                  name="settings[meta_description]"
                                  rows="3"
                                  placeholder="Brief description for search engines...">{{ old('settings.meta_description', $settings['meta_description']->value ?? '') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="facebook_url" class="form-label">Facebook URL</label>
                                <input type="url"
                                       class="form-control"
                                       id="facebook_url"
                                       name="settings[facebook_url]"
                                       value="{{ old('settings.facebook_url', $settings['facebook_url']->value ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="twitter_url" class="form-label">Twitter URL</label>
                                <input type="url"
                                       class="form-control"
                                       id="twitter_url"
                                       name="settings[twitter_url]"
                                       value="{{ old('settings.twitter_url', $settings['twitter_url']->value ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="instagram_url" class="form-label">Instagram URL</label>
                                <input type="url"
                                       class="form-control"
                                       id="instagram_url"
                                       name="settings[instagram_url]"
                                       value="{{ old('settings.instagram_url', $settings['instagram_url']->value ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="youtube_url" class="form-label">YouTube URL</label>
                                <input type="url"
                                       class="form-control"
                                       id="youtube_url"
                                       name="settings[youtube_url]"
                                       value="{{ old('settings.youtube_url', $settings['youtube_url']->value ?? '') }}">
                            </div>
                        </div>
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
                        <i class="fas fa-save me-2"></i>Save Settings
                    </button>

                    <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>View Website
                    </a>
                </div>
            </div>

            <!-- Help -->
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Help & Tips</h5>
                </div>
                <div class="card-body">
                    <ul class="mb-0 ps-3">
                        <li class="mb-2">Keep school information up to date</li>
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
