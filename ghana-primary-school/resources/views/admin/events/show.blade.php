@extends('layouts.admin')

@section('title', 'View Event')

@section('page-title', $event->title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
    <li class="breadcrumb-item active">{{ Str::limit($event->title, 30) }}</li>
@endsection

@section('page-actions')
    <div class="d-flex gap-2">
        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this event?')">
                <i class="fas fa-trash me-2"></i>Delete
            </button>
        </form>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                @if($event->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $event->image) }}"
                             class="img-fluid rounded"
                             style="max-height: 400px; width: 100%; object-fit: cover;">
                    </div>
                @endif

                <div class="mb-4">
                    <h1 class="h3 mb-3">{{ $event->title }}</h1>
                    <div class="d-flex flex-wrap gap-3 mb-3 text-muted">
                        <span><i class="fas fa-calendar me-1"></i> {{ $event->date->format('M d, Y') }}</span>
                        @if($event->time)
                            <span><i class="fas fa-clock me-1"></i> {{ $event->time->format('g:i A') }}</span>
                        @endif
                        @if($event->location)
                            <span><i class="fas fa-map-marker-alt me-1"></i> {{ $event->location }}</span>
                        @endif
                        <span><i class="fas fa-eye me-1"></i> Status:
                            <span class="badge bg-{{ $event->status === 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </span>
                    </div>
                </div>

                @if($event->description)
                    <div class="content">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Event Details</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td class="fw-bold">Status:</td>
                        <td>
                            <span class="badge bg-{{ $event->status === 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Date:</td>
                        <td>{{ $event->date->format('l, F j, Y') }}</td>
                    </tr>
                    @if($event->time)
                        <tr>
                            <td class="fw-bold">Time:</td>
                            <td>{{ $event->time->format('g:i A') }}</td>
                        </tr>
                    @endif
                    @if($event->location)
                        <tr>
                            <td class="fw-bold">Location:</td>
                            <td>{{ $event->location }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td class="fw-bold">Created:</td>
                        <td>{{ $event->created_at->format('M d, Y \a\t g:i A') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Last Updated:</td>
                        <td>{{ $event->updated_at->format('M d, Y \a\t g:i A') }}</td>
                    </tr>
                    @if($event->image)
                        <tr>
                            <td class="fw-bold">Has Image:</td>
                            <td><i class="fas fa-check text-success"></i> Yes</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

        @if($event->status === 'published')
            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-external-link-alt me-2"></i>Public View</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">This event is published and visible to the public.</p>
                    <a href="{{ route('events.show', $event) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-eye me-2"></i>View on Website
                    </a>
                </div>
            </div>
        @endif

        <!-- Date Status Card -->
        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Event Status</h6>
            </div>
            <div class="card-body">
                @php
                    $now = now();
                    $eventDate = $event->date;
                    if ($event->time) {
                        $eventDateTime = $eventDate->copy()->setTimeFromTimeString($event->time->format('H:i:s'));
                    } else {
                        $eventDateTime = $eventDate->copy()->endOfDay();
                    }
                @endphp

                @if($eventDateTime->isPast())
                    <div class="text-center">
                        <i class="fas fa-check-circle text-success" style="font-size: 2rem;"></i>
                        <p class="mt-2 mb-0 text-muted">This event has ended</p>
                        <small class="text-muted">{{ $eventDateTime->diffForHumans() }}</small>
                    </div>
                @elseif($eventDate->isToday())
                    <div class="text-center">
                        <i class="fas fa-clock text-warning" style="font-size: 2rem;"></i>
                        <p class="mt-2 mb-0 text-warning">Happening today!</p>
                        @if($event->time)
                            <small class="text-muted">{{ $event->time->format('g:i A') }}</small>
                        @endif
                    </div>
                @else
                    <div class="text-center">
                        <i class="fas fa-calendar-alt text-primary" style="font-size: 2rem;"></i>
                        <p class="mt-2 mb-0 text-primary">Upcoming event</p>
                        <small class="text-muted">{{ $eventDateTime->diffForHumans() }}</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
