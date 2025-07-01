<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ghana Primary School - Installation Helper</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #E74C25;
            --secondary-color: #2C5530;
            --accent-color: #F7931E;
            --success-color: #16a34a;
            --warning-color: #f59e0b;
            --danger-color: #dc2626;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        .install-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .install-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .install-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .install-body {
            padding: 2rem;
        }

        .step {
            margin-bottom: 2rem;
            padding: 1.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .step.active {
            border-color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(231, 76, 37, 0.1);
        }

        .step.completed {
            border-color: var(--success-color);
            background-color: #f0fdf4;
        }

        .step-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 1rem;
        }

        .step.completed .step-number {
            background: var(--success-color);
        }

        .requirement-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .requirement-item:last-child {
            border-bottom: none;
        }

        .status-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
        }

        .status-success {
            background: var(--success-color);
        }

        .status-error {
            background: var(--danger-color);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(231, 76, 37, 0.3);
        }

        .loading {
            display: none;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="install-container">
        <div class="install-card">
            <div class="install-header">
                <h1><i class="fas fa-graduation-cap me-3"></i>Ghana Primary School</h1>
                <h2>Installation Helper</h2>
                @if(isset($isInstalled) && $isInstalled)
                    <div class="alert alert-info mt-3 mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Installation Status:</strong>
                        System appears to be installed ({{ $userCount }} users found, Admin: {{ $hasAdmin ? 'Yes' : 'No' }})
                    </div>
                    <p class="mb-0 mt-2">You can still use this helper to re-run setup steps or create additional admin users.</p>
                @elseif(isset($dbError))
                    <div class="alert alert-warning mt-3 mb-0">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Database Notice:</strong> Database not fully initialized yet. This is normal for a fresh installation.
                    </div>
                    <p class="mb-0 mt-2">Let's get your school website up and running!</p>
                @else
                    <p class="mb-0">Let's get your school website up and running!</p>
                @endif
            </div>

            <div class="install-body">
                <!-- Step 1: Requirements Check -->
                <div class="step" id="step1">
                    <div class="step-header">
                        <div class="step-number">1</div>
                        <div>
                            <h4>System Requirements Check</h4>
                            <p class="text-muted mb-0">Verify that your system meets all requirements</p>
                        </div>
                    </div>
                    <div id="requirements-list">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" onclick="checkRequirements()">
                                <i class="fas fa-check-circle me-2"></i>Check Requirements
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Database Setup -->
                <div class="step" id="step2">
                    <div class="step-header">
                        <div class="step-number">2</div>
                        <div>
                            <h4>Database Setup</h4>
                            <p class="text-muted mb-0">Initialize the database with fresh tables</p>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        This will create all necessary database tables. Make sure your .env file is configured with correct database credentials.
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" onclick="runMigrations()" disabled>
                            <i class="fas fa-database me-2"></i>Setup Database
                        </button>
                        <div class="loading mt-3">
                            <i class="fas fa-spinner fa-spin me-2"></i>Setting up database...
                        </div>
                    </div>
                </div>

                <!-- Step 3: Sample Data -->
                <div class="step" id="step3">
                    <div class="step-header">
                        <div class="step-number">3</div>
                        <div>
                            <h4>Sample Data</h4>
                            <p class="text-muted mb-0">Add sample content to get you started</p>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        This will add sample news, events, staff, and other content to demonstrate the website features.
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" onclick="seedData()" disabled>
                            <i class="fas fa-seedling me-2"></i>Add Sample Data
                        </button>
                        <div class="loading mt-3">
                            <i class="fas fa-spinner fa-spin me-2"></i>Adding sample data...
                        </div>
                    </div>
                </div>

                <!-- Step 4: Admin User -->
                <div class="step" id="step4">
                    <div class="step-header">
                        <div class="step-number">4</div>
                        <div>
                            <h4>Create Admin User</h4>
                            <p class="text-muted mb-0">Create your administrator account</p>
                        </div>
                    </div>

                    @if(isset($existingAdmins) && count($existingAdmins) > 0)
                    <div class="alert alert-info mb-3">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Existing admin users found:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($existingAdmins as $admin)
                                <li>{{ $admin->name }} ({{ $admin->email }})</li>
                            @endforeach
                        </ul>
                        <small class="text-muted">You can create additional admin users or skip this step if you already have access.</small>
                    </div>
                    @endif

                    <form id="adminForm" onsubmit="createAdmin(event)">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required minlength="8">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" disabled>
                                <i class="fas fa-user-shield me-2"></i>Create Admin User
                            </button>
                            @if(isset($existingAdmins) && count($existingAdmins) > 0)
                            <button type="button" class="btn btn-secondary ms-2" onclick="skipAdminCreation()">
                                <i class="fas fa-forward me-2"></i>Skip This Step
                            </button>
                            @endif
                            <div class="loading mt-3">
                                <i class="fas fa-spinner fa-spin me-2"></i>Creating admin user...
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 5: Optimization -->
                <div class="step" id="step5">
                    <div class="step-header">
                        <div class="step-number">5</div>
                        <div>
                            <h4>System Optimization</h4>
                            <p class="text-muted mb-0">Optimize and prepare the application</p>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        This will create storage links, clear caches, and optimize the application for better performance.
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="createStorageLink()" disabled>
                                <i class="fas fa-link me-2"></i>Storage Link
                            </button>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="clearCache()" disabled>
                                <i class="fas fa-broom me-2"></i>Clear Cache
                            </button>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="optimizeApp()" disabled>
                                <i class="fas fa-rocket me-2"></i>Optimize App
                            </button>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-primary" onclick="runAllOptimizations()" disabled>
                            <i class="fas fa-magic me-2"></i>Run All Optimizations
                        </button>
                        <div class="loading mt-3">
                            <i class="fas fa-spinner fa-spin me-2"></i>Optimizing system...
                        </div>
                    </div>
                </div>

                <!-- Step 6: Complete -->
                <div class="step" id="step6">
                    <div class="step-header">
                        <div class="step-number">6</div>
                        <div>
                            <h4>Installation Complete!</h4>
                            <p class="text-muted mb-0">Your Ghana Primary School website is ready</p>
                        </div>
                    </div>
                    <div class="alert alert-success" style="display: none;" id="completion-message">
                        <h5><i class="fas fa-check-circle me-2"></i>Congratulations!</h5>
                        <p class="mb-3">Your Ghana Primary School website has been successfully installed and configured.</p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ url('/') }}" class="btn btn-success">
                                <i class="fas fa-home me-2"></i>Visit Website
                            </a>
                            <a href="{{ url('/login') }}" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt me-2"></i>Admin Login
                            </a>
                            <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Help Section -->
        <div class="install-card mt-4">
            <div class="install-body">
                <h5><i class="fas fa-question-circle me-2"></i>Need Help?</h5>
                <div class="row">
                    <div class="col-md-4">
                        <h6>📖 Documentation</h6>
                        <p class="small">Check the DEPLOYMENT_GUIDE.md for detailed instructions</p>
                    </div>
                    <div class="col-md-4">
                        <h6>🐳 Docker Setup</h6>
                        <p class="small">Use docker-compose.yml for containerized deployment</p>
                    </div>
                    <div class="col-md-4">
                        <h6>💻 Manual Setup</h6>
                        <p class="small">Run install.ps1 (Windows) or install.sh (Linux/macOS)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    <script>
        let currentStep = 1;
        const csrfToken = '{{ csrf_token() }}';

        // Helper function to handle fetch responses with better error handling
        function handleFetchResponse(response) {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text().then(text => {
                try {
                    return JSON.parse(text);
                } catch (e) {
                    console.error('Response was not JSON:', text);
                    throw new Error('Server returned invalid response. Please check the server logs.');
                }
            });
        }
         function checkRequirements() {
            showLoading('step1');

            fetch('{{ route("install.check-requirements") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => handleFetchResponse(response))
            .then(data => {
                hideLoading('step1');
                displayRequirements(data);

                const allPassed = Object.values(data).every(status => status);
                if (allPassed) {
                    completeStep(1);
                    enableStep(2);
                }
            })
            .catch(error => {
                hideLoading('step1');
                showError('Failed to check requirements: ' + error.message);
            });
        }

        function displayRequirements(requirements) {
            const container = document.getElementById('requirements-list');
            let html = '';

            for (const [requirement, status] of Object.entries(requirements)) {
                const iconClass = status ? 'fas fa-check status-success' : 'fas fa-times status-error';
                html += `
                    <div class="requirement-item">
                        <span>${requirement}</span>
                        <div class="status-icon ${status ? 'status-success' : 'status-error'}">
                            <i class="${iconClass}"></i>
                        </div>
                    </div>
                `;
            }

            container.innerHTML = html;
        }        function runMigrations() {
            showLoading('step2');

            fetch('{{ route("install.run-migrations") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => handleFetchResponse(response))
            .then(data => {
                hideLoading('step2');
                if (data.success) {
                    showSuccess(data.message);
                    completeStep(2);
                    enableStep(3);
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                hideLoading('step2');
                showError('Failed to setup database: ' + error.message);
            });
        }        function seedData() {
            showLoading('step3');

            fetch('{{ route("install.seed-data") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => handleFetchResponse(response))
            .then(data => {
                hideLoading('step3');
                if (data.success) {
                    showSuccess(data.message);
                    completeStep(3);
                    enableStep(4);
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                hideLoading('step3');
                showError('Failed to seed data: ' + error.message);
            });
        }

        function createAdmin(event) {
            event.preventDefault();

            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);

            if (data.password !== data.password_confirmation) {
                showError('Passwords do not match');
                return;
            }

            showLoading('step4');

            fetch('{{ route("install.create-admin") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                // Handle both successful and error responses
                return response.text().then(text => {
                    let jsonData;
                    try {
                        jsonData = JSON.parse(text);
                    } catch (e) {
                        console.error('Response was not JSON:', text);
                        console.error('Parse error:', e);

                        // Check for specific error types
                        if (response.status === 419) {
                            throw new Error('CSRF token mismatch. Please refresh the page and try again.');
                        } else if (response.status === 422) {
                            throw new Error('Validation error: Please check your input and try again.');
                        } else if (response.status >= 500) {
                            throw new Error('Server error: Please try again later.');
                        } else {
                            throw new Error('Unexpected response format. Status: ' + response.status + '. Please try refreshing the page.');
                        }
                    }

                    // Include response status in the data
                    jsonData._responseStatus = response.status;
                    return jsonData;
                });
            })
            .then(data => {
                hideLoading('step4');
                if (data.success) {
                    showSuccess(data.message + (data.user ? ` (${data.user.name})` : ''));
                    completeStep(4);
                    enableStep(5);
                    // Clear the form
                    event.target.reset();
                } else {
                    let errorMessage = data.message || 'Unknown error occurred';

                    // Handle validation errors specifically
                    if (data.errors) {
                        const errorDetails = [];
                        for (const field in data.errors) {
                            errorDetails.push(`${field}: ${data.errors[field].join(', ')}`);
                        }
                        errorMessage = 'Validation errors:\n' + errorDetails.join('\n');
                    } else if (data.detailed_message) {
                        errorMessage = data.detailed_message;
                    }

                    showError(errorMessage);
                }
            })
            .catch(error => {
                hideLoading('step4');
                console.error('Admin creation error:', error);

                // Provide specific guidance based on error type
                let errorMessage = error.message;
                if (error.message.includes('CSRF token mismatch')) {
                    errorMessage += '\n\nThis usually happens when the page has been open for too long. Please refresh the page and try again.';
                } else if (error.message.includes('email') && error.message.includes('already')) {
                    errorMessage = 'An admin user with this email already exists. Please use a different email address or skip this step if you already have admin access.';
                }

                showError(errorMessage);
            });
        }

        function skipAdminCreation() {
            if (confirm('Are you sure you want to skip admin creation? You can access the admin panel with existing admin accounts.')) {
                showSuccess('Admin creation skipped. Using existing admin accounts.');
                completeStep(4);
                enableStep(5);
            }
        }

        function createStorageLink() {
            fetch('{{ route("install.storage-link") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccess(data.message);
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                showError('Failed to create storage link: ' + error.message);
            });
        }

        function clearCache() {
            fetch('{{ route("install.clear-cache") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccess(data.message);
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                showError('Failed to clear cache: ' + error.message);
            });
        }

        function optimizeApp() {
            fetch('{{ route("install.optimize") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccess(data.message);
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                showError('Failed to optimize application: ' + error.message);
            });
        }

        function runAllOptimizations() {
            showLoading('step5');

            Promise.all([
                fetch('{{ route("install.storage-link") }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' }
                }),
                fetch('{{ route("install.clear-cache") }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' }
                }),
                fetch('{{ route("install.optimize") }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' }
                })
            ])
            .then(responses => Promise.all(responses.map(r => r.json())))
            .then(results => {
                hideLoading('step5');
                const allSuccessful = results.every(result => result.success);

                if (allSuccessful) {
                    showSuccess('All optimizations completed successfully!');
                    completeStep(5);
                    completeInstallation();
                } else {
                    const errors = results.filter(r => !r.success).map(r => r.message);
                    showError('Some optimizations failed: ' + errors.join(', '));
                }
            })
            .catch(error => {
                hideLoading('step5');
                showError('Failed to run optimizations: ' + error.message);
            });
        }

        function completeInstallation() {
            completeStep(6);
            document.getElementById('completion-message').style.display = 'block';
        }

        function completeStep(step) {
            const stepElement = document.getElementById(`step${step}`);
            stepElement.classList.add('completed');
            stepElement.classList.remove('active');
        }

        function enableStep(step) {
            const stepElement = document.getElementById(`step${step}`);
            stepElement.classList.add('active');

            const button = stepElement.querySelector('button:not(.btn-outline-primary)');
            if (button) {
                button.disabled = false;
            }

            const form = stepElement.querySelector('form button');
            if (form) {
                form.disabled = false;
            }

            // Enable optimization buttons for step 5
            if (step === 5) {
                const optimizationButtons = stepElement.querySelectorAll('button');
                optimizationButtons.forEach(btn => {
                    btn.disabled = false;
                });
            }
        }

        function showLoading(step) {
            const stepElement = document.getElementById(step);
            const loading = stepElement.querySelector('.loading');
            if (loading) {
                loading.style.display = 'block';
            }
        }

        function hideLoading(step) {
            const stepElement = document.getElementById(step);
            const loading = stepElement.querySelector('.loading');
            if (loading) {
                loading.style.display = 'none';
            }
        }

        function showSuccess(message) {
            // You can implement a toast notification here
            console.log('Success:', message);
        }

        function showError(message) {
            // Create or update error alert
            const existingAlert = document.querySelector('.error-alert');
            if (existingAlert) {
                existingAlert.remove();
            }

            const errorDiv = document.createElement('div');
            errorDiv.className = 'alert alert-danger error-alert mt-3';

            let refreshButton = '';
            if (message.includes('CSRF token mismatch') || message.includes('refresh')) {
                refreshButton = `
                    <div class="mt-3">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="location.reload()">
                            <i class="fas fa-refresh me-2"></i>Refresh Page
                        </button>
                    </div>
                `;
            }

            errorDiv.innerHTML = `
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Error:</strong>
                <div class="mt-2" style="white-space: pre-line;">${message}</div>
                ${refreshButton}
                <button type="button" class="btn-close float-end" onclick="this.parentElement.remove()"></button>
            `;

            // Add to the active step
            const activeStep = document.querySelector('.step.active');
            if (activeStep) {
                activeStep.appendChild(errorDiv);
                errorDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } else {
                // Fallback to alert
                alert('Error: ' + message);
            }
        }

        // Initialize
        document.getElementById('step1').classList.add('active');
    </script>
</body>
</html>
