@extends('layouts.admin')

@section('title', 'Menu Management')

@section('page-title', 'Menu Management')

@section('breadcrumb')
    <li class="breadcrumb-item active">Menus</li>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-lg-8">
        <h4 class="mb-0">Manage Navigation Menus</h4>
        <p class="text-muted">Control header and footer navigation links</p>
    </div>
    <div class="col-lg-4 text-end">
        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Menu Item
        </a>
    </div>
</div>

<div class="row">
    <!-- Header Menu -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bars me-2"></i>Header Navigation</h5>
            </div>
            <div class="card-body">
                @if($headerMenus->count() > 0)
                    <div class="menu-list" data-location="header">
                        @foreach($headerMenus as $menu)
                            <div class="menu-item" data-id="{{ $menu->id }}">
                                <div class="d-flex align-items-center justify-content-between p-3 border rounded mb-2">
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center">
                                            @if($menu->icon)
                                                <i class="{{ $menu->icon }} me-2"></i>
                                            @endif
                                            <strong>{{ $menu->label }}</strong>
                                            @if(!$menu->is_active)
                                                <span class="badge bg-danger ms-2">Inactive</span>
                                            @endif
                                        </div>
                                        <small class="text-muted">{{ $menu->url }}</small>

                                        @if($menu->children->count() > 0)
                                            <div class="mt-2">
                                                @foreach($menu->children as $child)
                                                    <div class="ms-3 p-2 bg-light rounded mb-1">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                @if($child->icon)
                                                                    <i class="{{ $child->icon }} me-2"></i>
                                                                @endif
                                                                {{ $child->label }}
                                                                @if(!$child->is_active)
                                                                    <span class="badge bg-danger ms-2">Inactive</span>
                                                                @endif
                                                            </div>
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.menus.edit', $child) }}"
                                                                   class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <form action="{{ route('admin.menus.destroy', $child) }}"
                                                                      method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                            onclick="return confirm('Delete this menu item?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="btn-group ms-3">
                                        <a href="{{ route('admin.menus.edit', $menu) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.menus.destroy', $menu) }}"
                                              method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete this menu item and its children?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-bars fa-3x text-muted mb-3"></i>
                        <h6>No header menu items</h6>
                        <p class="text-muted">Add your first navigation link.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer Menu -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-link me-2"></i>Footer Navigation</h5>
            </div>
            <div class="card-body">
                @if($footerMenus->count() > 0)
                    <div class="menu-list" data-location="footer">
                        @foreach($footerMenus as $menu)
                            <div class="menu-item" data-id="{{ $menu->id }}">
                                <div class="d-flex align-items-center justify-content-between p-3 border rounded mb-2">
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center">
                                            @if($menu->icon)
                                                <i class="{{ $menu->icon }} me-2"></i>
                                            @endif
                                            <strong>{{ $menu->label }}</strong>
                                            @if(!$menu->is_active)
                                                <span class="badge bg-danger ms-2">Inactive</span>
                                            @endif
                                        </div>
                                        <small class="text-muted">{{ $menu->url }}</small>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.menus.edit', $menu) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.menus.destroy', $menu) }}"
                                              method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete this menu item?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-link fa-3x text-muted mb-3"></i>
                        <h6>No footer menu items</h6>
                        <p class="text-muted">Add your first footer link.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Add Section -->
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-magic me-2"></i>Quick Add Common Links</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <button class="btn btn-outline-secondary w-100" onclick="addQuickLink('header', 'Home', '/', 'fas fa-home')">
                            <i class="fas fa-home me-2"></i>Add Home
                        </button>
                    </div>
                    <div class="col-md-3 mb-2">
                        <button class="btn btn-outline-secondary w-100" onclick="addQuickLink('header', 'About', '/about', 'fas fa-info-circle')">
                            <i class="fas fa-info-circle me-2"></i>Add About
                        </button>
                    </div>
                    <div class="col-md-3 mb-2">
                        <button class="btn btn-outline-secondary w-100" onclick="addQuickLink('header', 'Contact', '/contact', 'fas fa-envelope')">
                            <i class="fas fa-envelope me-2"></i>Add Contact
                        </button>
                    </div>
                    <div class="col-md-3 mb-2">
                        <button class="btn btn-outline-secondary w-100" onclick="addQuickLink('footer', 'Privacy Policy', '/privacy', 'fas fa-shield-alt')">
                            <i class="fas fa-shield-alt me-2"></i>Add Privacy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function addQuickLink(location, label, url, icon) {
    // Create a form and submit it to create a new menu item
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("admin.menus.store") }}';

    // Add CSRF token
    const csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    form.appendChild(csrfToken);

    // Add form data
    const fields = {
        location: location,
        name: label.toLowerCase().replace(/\s+/g, '_'),
        label: label,
        url: url,
        icon: icon,
        target: '_self',
        is_active: '1',
        sort_order: '99'
    };

    for (const [key, value] of Object.entries(fields)) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
}
</script>
@endsection
