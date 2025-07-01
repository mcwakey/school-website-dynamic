/**
 * Ghana Primary School Website - Navigation JavaScript
 * Handles dropdown menus, search functionality, and enhanced UI interactions
 */

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {

    // Check if Bootstrap is loaded
    if (typeof bootstrap === 'undefined') {
        console.error('Bootstrap JS not loaded - dropdowns will not work');

        // Fallback: Try to load Bootstrap if not present
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js';
        script.integrity = 'sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz';
        script.crossOrigin = 'anonymous';
        script.onload = function() {
            console.log('Bootstrap loaded fallback');
            initializeDropdowns();
        };
        document.head.appendChild(script);
        return;
    }

    // Initialize dropdowns if Bootstrap is available
    initializeDropdowns();
});

/**
 * Initialize all Bootstrap dropdowns
 */
function initializeDropdowns() {
    try {
        // Find all dropdown toggles
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));

        if (dropdownElementList.length === 0) {
            console.warn('No dropdown toggles found');
            return;
        }

        // Initialize each dropdown
        const dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl, {
                boundary: 'viewport',
                display: 'dynamic',
                autoClose: true
            });
        });

        console.log('Navigation initialized with', dropdownList.length, 'dropdowns');

        // Add event listeners for debugging and enhanced functionality
        dropdownElementList.forEach(function(dropdownToggle) {
            // Click debugging
            dropdownToggle.addEventListener('click', function(e) {
                console.log('Dropdown clicked:', this.textContent.trim());
            });

            // Shown event
            dropdownToggle.addEventListener('shown.bs.dropdown', function() {
                console.log('Dropdown opened:', this.textContent.trim());
                this.setAttribute('aria-expanded', 'true');
            });

            // Hidden event
            dropdownToggle.addEventListener('hidden.bs.dropdown', function() {
                console.log('Dropdown closed:', this.textContent.trim());
                this.setAttribute('aria-expanded', 'false');
            });

            // Hover prevention on desktop
            const parentLi = dropdownToggle.closest('.nav-item.dropdown');
            if (parentLi) {
                parentLi.addEventListener('mouseenter', function() {
                    // Prevent hover opening on desktop
                    if (window.innerWidth >= 992) {
                        const dropdownMenu = this.querySelector('.dropdown-menu');
                        if (dropdownMenu && !dropdownMenu.classList.contains('show')) {
                            dropdownMenu.style.display = 'none';
                        }
                    }
                });
            }
        });

    } catch (error) {
        console.error('Error initializing dropdowns:', error);

        // Manual fallback for basic dropdown functionality
        fallbackDropdownInit();
    }
}

/**
 * Fallback dropdown initialization if Bootstrap fails
 */
function fallbackDropdownInit() {
    console.log('Using fallback dropdown initialization');

    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const dropdownMenu = this.nextElementSibling || this.parentElement.querySelector('.dropdown-menu');

            if (dropdownMenu) {
                // Close all other dropdowns
                document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                    if (menu !== dropdownMenu) {
                        menu.classList.remove('show');
                    }
                });

                // Toggle current dropdown
                dropdownMenu.classList.toggle('show');
                this.setAttribute('aria-expanded', dropdownMenu.classList.contains('show'));
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                menu.classList.remove('show');
            });
            document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            });
        }
    });
}

/**
 * Initialize search functionality
 */
function initializeSearch() {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return;

    // Auto-focus search input when dropdown opens
    const searchDropdown = document.querySelector('.search-dropdown .dropdown-toggle');
    const searchDropdownMenu = document.querySelector('.search-dropdown .dropdown-menu');

    if (searchDropdown) {
        searchDropdown.addEventListener('click', function(e) {
            setTimeout(() => {
                if (searchInput) searchInput.focus();
            }, 100);
        });
    }

    // Prevent dropdown from closing when clicking inside
    if (searchDropdownMenu) {
        searchDropdownMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }

    // Submit search on Enter
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && this.value.trim()) {
            this.closest('form').submit();
        }
    });

    // Form validation
    const searchForm = searchInput.closest('form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            if (!searchInput.value.trim()) {
                e.preventDefault();
                searchInput.focus();
                searchInput.classList.add('is-invalid');

                setTimeout(() => {
                    searchInput.classList.remove('is-invalid');
                }, 3000);
            }
        });
    }

    // Clear validation on input
    searchInput.addEventListener('input', function() {
        this.classList.remove('is-invalid');
    });
}

/**
 * Initialize navbar scroll behavior
 */
function initializeNavbarScroll() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;

    let lastScrollTop = 0;

    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > 100) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }

        lastScrollTop = scrollTop;
    }, { passive: true });
}

/**
 * Initialize form enhancements
 */
function initializeForms() {
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn && !submitBtn.disabled && !submitBtn.dataset.noLoading) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Loading...';
                submitBtn.disabled = true;

                // Re-enable after 5 seconds as fallback
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            }
        });
    });
}

/**
 * Initialize all functionality
 */
function initializeAll() {
    initializeDropdowns();
    initializeSearch();
    initializeNavbarScroll();
    initializeForms();
}

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeAll);
} else {
    initializeAll();
}

// Re-initialize if page is shown from cache (back/forward navigation)
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        console.log('Page restored from cache - reinitializing');
        setTimeout(initializeAll, 100);
    }
});

// Export functions for manual initialization if needed
window.SchoolNavigation = {
    init: initializeAll,
    initDropdowns: initializeDropdowns,
    initSearch: initializeSearch,
    initNavbar: initializeNavbarScroll,
    initForms: initializeForms
};
