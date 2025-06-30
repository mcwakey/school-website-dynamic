@extends('layouts.admin')

@section('title', 'Events Management')

@section('page-title', 'Events Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">Events</li>
@endsection

@section('page-actions')
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add Event
    </a>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        @if($events->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="60">Image</th>
                            <th>Title</th>
                            <th>Date & Time</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>
                                    @if($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}"
                                             class="rounded"
                                             width="50"
                                             height="50"
                                             style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-calendar-alt text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <h6 class="mb-1">{{ Str::limit($event->title, 50) }}</h6>
                                        <small class="text-muted">{{ Str::limit($event->description, 60) }}</small>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <small><strong>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</strong></small>
                                        @if($event->event_time)
                                            <br><small class="text-muted">{{ \Carbon\Carbon::parse($event->event_time)->format('g:i A') }}</small>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <small>{{ $event->location ? Str::limit($event->location, 30) : 'Not specified' }}</small>
                                </td>
                                <td>
                                    <div>
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
                                </td>
                                <td>
                                    <small>{{ $event->created_at->format('M d, Y') }}</small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.events.show', $event) }}"
                                           class="btn btn-sm btn-outline-info"
                                           title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($event->is_published)
                                            <a href="{{ route('events.show', $event->slug) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               target="_blank"
                                               title="View Public">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.events.edit', $event) }}"
                                           class="btn btn-sm btn-outline-secondary"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="deleteItem({{ $event->id }})"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="delete-form-{{ $event->id }}"
                                          action="{{ route('admin.events.destroy', $event) }}"
                                          method="POST"
                                          class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $events->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-calendar-alt fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No Events</h4>
                <p class="text-muted mb-4">Start by creating your first event.</p>
                <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Event
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
function deleteItem(id) {
    if (confirm('Are you sure you want to delete this event? This action cannot be undone.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
