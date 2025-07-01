@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon me-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['news_count'] }}</h3>
                    <p class="text-muted mb-0">Total News</p>
                    <small class="text-success">{{ $stats['published_news'] }} published</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon me-3" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['events_count'] }}</h3>
                    <p class="text-muted mb-0">Total Events</p>
                    <small class="text-info">{{ $stats['upcoming_events'] }} upcoming</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon me-3" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['gallery_count'] }}</h3>
                    <p class="text-muted mb-0">Gallery Photos</p>
                    <small class="text-primary">All categories</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon me-3" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['staff_count'] }}</h3>
                    <p class="text-muted mb-0">Staff Members</p>
                    <small class="text-success">Active staff</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<div class="row">
    <!-- Recent News -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-newspaper me-2"></i>Recent News</h5>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-light">View All</a>
            </div>
            <div class="card-body">
                @if($recentNews->count() > 0)
                    @foreach($recentNews as $news)
                        <div class="d-flex mb-3 pb-3 @if(!$loop->last) border-bottom @endif">
                            @if($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}"
                                     class="rounded me-3"
                                     width="60"
                                     height="60"
                                     style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-newspaper text-muted"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('admin.news.edit', $news) }}" class="text-decoration-none">
                                        {{ Str::limit($news->title, 50) }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>{{ $news->created_at->diffForHumans() }}
                                </small>
                                <div class="mt-1">
                                    @if($news->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                    @if($news->is_featured)
                                        <span class="badge bg-primary">Featured</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center mb-0">No news articles yet.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Events -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Recent Events</h5>
                <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-light">View All</a>
            </div>
            <div class="card-body">
                @if($recentEvents->count() > 0)
                    @foreach($recentEvents as $event)
                        <div class="d-flex mb-3 pb-3 @if(!$loop->last) border-bottom @endif">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}"
                                     class="rounded me-3"
                                     width="60"
                                     height="60"
                                     style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-calendar-alt text-muted"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('admin.events.edit', $event) }}" class="text-decoration-none">
                                        {{ Str::limit($event->title, 50) }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}
                                </small>
                                <div class="mt-1">
                                    @if($event->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                    @if(\Carbon\Carbon::parse($event->event_date)->isFuture())
                                        <span class="badge bg-primary">Upcoming</span>
                                    @else
                                        <span class="badge bg-secondary">Past</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center mb-0">No events scheduled yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Recent Gallery -->
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-images me-2"></i>Recent Gallery</h5>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-light">View All</a>
            </div>
            <div class="card-body">
                @if($recentGallery->count() > 0)
                    <div class="row">
                        @foreach($recentGallery as $photo)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <div class="position-relative">
                                    @if($photo->image_path)
                                        <img src="{{ asset('storage/' . $photo->image_path) }}"
                                             class="img-fluid rounded"
                                             style="height: 150px; width: 100%; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                             style="height: 150px;">
                                            <i class="fas fa-image fa-2x text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-2 rounded-bottom">
                                        <small class="fw-bold">{{ Str::limit($photo->title, 30) }}</small>
                                        @if($photo->category)
                                            <br><small class="text-light">{{ $photo->category }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center mb-0">No photos in gallery yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3">
                            <i class="fas fa-plus-circle fa-2x mb-2"></i>
                            <span>Add News</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.events.create') }}" class="btn btn-outline-info w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3">
                            <i class="fas fa-calendar-plus fa-2x mb-2"></i>
                            <span>Add Event</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3">
                            <i class="fas fa-image fa-2x mb-2"></i>
                            <span>Add Photo</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.staff.create') }}" class="btn btn-outline-success w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3">
                            <i class="fas fa-user-plus fa-2x mb-2"></i>
                            <span>Add Staff</span>
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.page-contents.index') }}" class="btn btn-outline-warning w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3">
                            <i class="fas fa-edit fa-2x mb-2"></i>
                            <span>Edit Content</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.theme.index') }}" class="btn btn-outline-purple w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3" style="border-color: #764ba2; color: #764ba2;">
                            <i class="fas fa-palette fa-2x mb-2"></i>
                            <span>Customize Theme</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-dark w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3">
                            <i class="fas fa-cog fa-2x mb-2"></i>
                            <span>Settings</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.manual') }}" class="btn btn-outline-danger w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3">
                            <i class="fas fa-book fa-2x mb-2"></i>
                            <span>User Manual</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Version Information -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-3">
                <div class="d-flex justify-content-center align-items-center flex-wrap gap-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-code-branch text-primary me-2"></i>
                        <span class="fw-semibold">Version: {{ config('version.version', '1.0.0') }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-calendar text-success me-2"></i>
                        <span>Released: {{ config('version.release_date', '2025-07-01') }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-rocket text-info me-2"></i>
                        <span>Codename: {{ config('version.codename', 'Excellence') }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-server text-warning me-2"></i>
                        <span>Environment: {{ config('app.env', 'production') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
