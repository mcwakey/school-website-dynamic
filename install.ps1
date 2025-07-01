# Ghana Primary School Application - Windows Installation Script
# PowerShell script for Windows deployment

param(
    [switch]$Development,
    [switch]$Production,
    [switch]$SkipDependencies,
    [string]$DatabaseName = "ghana_primary_school",
    [string]$DatabaseUser = "root",
    [string]$DatabasePassword = "",
    [string]$AppUrl = "http://localhost:8000"
)

Write-Host "===========================================" -ForegroundColor Green
Write-Host "Ghana Primary School Application Installer" -ForegroundColor Green
Write-Host "===========================================" -ForegroundColor Green
Write-Host ""

# Check if running as administrator
if (-NOT ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Host "This script requires administrator privileges. Please run as administrator." -ForegroundColor Red
    exit 1
}

# Function to check if command exists
function Test-Command($command) {
    try {
        Get-Command $command -ErrorAction Stop
        return $true
    }
    catch {
        return $false
    }
}

# Function to install Chocolatey
function Install-Chocolatey {
    if (!(Test-Command "choco")) {
        Write-Host "Installing Chocolatey..." -ForegroundColor Yellow
        Set-ExecutionPolicy Bypass -Scope Process -Force
        [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072
        iex ((New-Object System.Net.WebClient).DownloadString('https://chocolatey.org/install.ps1'))
        refreshenv
    } else {
        Write-Host "Chocolatey is already installed." -ForegroundColor Green
    }
}

# Function to install dependencies
function Install-Dependencies {
    Write-Host "Installing system dependencies..." -ForegroundColor Yellow
    
    # Install Chocolatey if not present
    Install-Chocolatey
    
    # Install PHP
    if (!(Test-Command "php")) {
        Write-Host "Installing PHP..." -ForegroundColor Yellow
        choco install php --version=8.2.13 -y
    }
    
    # Install Composer
    if (!(Test-Command "composer")) {
        Write-Host "Installing Composer..." -ForegroundColor Yellow
        choco install composer -y
    }
    
    # Install Node.js
    if (!(Test-Command "node")) {
        Write-Host "Installing Node.js..." -ForegroundColor Yellow
        choco install nodejs -y
    }
    
    # Install MySQL (optional)
    $installMySQL = Read-Host "Install MySQL Server? (y/n)"
    if ($installMySQL -eq "y" -or $installMySQL -eq "Y") {
        choco install mysql -y
    }
    
    refreshenv
    Write-Host "Dependencies installed successfully!" -ForegroundColor Green
}

# Function to setup environment
function Setup-Environment {
    Write-Host "Setting up environment..." -ForegroundColor Yellow
    
    # Copy environment file
    if (!(Test-Path ".env")) {
        Copy-Item ".env.example" ".env"
        Write-Host "Environment file created from example." -ForegroundColor Green
    }
    
    # Generate application key
    Write-Host "Generating application key..." -ForegroundColor Yellow
    php artisan key:generate
    
    # Update environment variables
    $envContent = Get-Content ".env"
    $envContent = $envContent -replace "^APP_URL=.*", "APP_URL=$AppUrl"
    $envContent = $envContent -replace "^DB_DATABASE=.*", "DB_DATABASE=$DatabaseName"
    $envContent = $envContent -replace "^DB_USERNAME=.*", "DB_USERNAME=$DatabaseUser"
    $envContent = $envContent -replace "^DB_PASSWORD=.*", "DB_PASSWORD=$DatabasePassword"
    
    if ($Production) {
        $envContent = $envContent -replace "^APP_ENV=.*", "APP_ENV=production"
        $envContent = $envContent -replace "^APP_DEBUG=.*", "APP_DEBUG=false"
    } else {
        $envContent = $envContent -replace "^APP_ENV=.*", "APP_ENV=local"
        $envContent = $envContent -replace "^APP_DEBUG=.*", "APP_DEBUG=true"
    }
    
    $envContent | Set-Content ".env"
    Write-Host "Environment configured successfully!" -ForegroundColor Green
}

# Function to install PHP dependencies
function Install-PHPDependencies {
    Write-Host "Installing PHP dependencies..." -ForegroundColor Yellow
    
    if ($Production) {
        composer install --optimize-autoloader --no-dev
    } else {
        composer install
    }
    
    Write-Host "PHP dependencies installed successfully!" -ForegroundColor Green
}

# Function to install Node.js dependencies
function Install-NodeDependencies {
    Write-Host "Installing Node.js dependencies..." -ForegroundColor Yellow
    npm install
    
    if ($Production) {
        Write-Host "Building assets for production..." -ForegroundColor Yellow
        npm run build
    } else {
        Write-Host "Building assets for development..." -ForegroundColor Yellow
        npm run dev
    }
    
    Write-Host "Node.js dependencies installed successfully!" -ForegroundColor Green
}

# Function to setup database
function Setup-Database {
    Write-Host "Setting up database..." -ForegroundColor Yellow
    
    # Create database if it doesn't exist
    try {
        mysql -u $DatabaseUser -p$DatabasePassword -e "CREATE DATABASE IF NOT EXISTS $DatabaseName;"
        Write-Host "Database created successfully!" -ForegroundColor Green
    }
    catch {
        Write-Host "Warning: Could not create database. Please create it manually." -ForegroundColor Yellow
    }
    
    # Run migrations
    Write-Host "Running database migrations..." -ForegroundColor Yellow
    php artisan migrate --force
    
    # Seed database
    $seedDatabase = Read-Host "Seed database with sample data? (y/n)"
    if ($seedDatabase -eq "y" -or $seedDatabase -eq "Y") {
        php artisan db:seed
    }
    
    Write-Host "Database setup completed!" -ForegroundColor Green
}

# Function to set permissions
function Set-Permissions {
    Write-Host "Setting file permissions..." -ForegroundColor Yellow
    
    # Set permissions for storage and cache
    $acl = Get-Acl "storage"
    $accessRule = New-Object System.Security.AccessControl.FileSystemAccessRule("Everyone", "FullControl", "ContainerInherit,ObjectInherit", "None", "Allow")
    $acl.SetAccessRule($accessRule)
    Set-Acl "storage" $acl
    
    $acl = Get-Acl "bootstrap\cache"
    $acl.SetAccessRule($accessRule)
    Set-Acl "bootstrap\cache" $acl
    
    Write-Host "File permissions set successfully!" -ForegroundColor Green
}

# Function to optimize application
function Optimize-Application {
    if ($Production) {
        Write-Host "Optimizing application for production..." -ForegroundColor Yellow
        
        php artisan config:cache
        php artisan route:cache
        php artisan view:cache
        php artisan event:cache
        
        Write-Host "Application optimized for production!" -ForegroundColor Green
    }
}

# Function to start development server
function Start-DevServer {
    if (!$Production) {
        $startServer = Read-Host "Start development server? (y/n)"
        if ($startServer -eq "y" -or $startServer -eq "Y") {
            Write-Host "Starting development server at $AppUrl..." -ForegroundColor Green
            Write-Host "Press Ctrl+C to stop the server." -ForegroundColor Yellow
            php artisan serve --host=0.0.0.0 --port=8000
        }
    }
}

# Main installation process
try {
    Write-Host "Starting installation..." -ForegroundColor Yellow
    
    # Check if we're in the right directory
    if (!(Test-Path "artisan")) {
        Write-Host "Error: artisan file not found. Please run this script from the Laravel project root directory." -ForegroundColor Red
        exit 1
    }
    
    # Install dependencies if not skipped
    if (!$SkipDependencies) {
        Install-Dependencies
    }
    
    # Setup environment
    Setup-Environment
    
    # Install PHP dependencies
    Install-PHPDependencies
    
    # Install Node.js dependencies
    Install-NodeDependencies
    
    # Setup database
    Setup-Database
    
    # Set permissions
    Set-Permissions
    
    # Optimize for production
    Optimize-Application
    
    Write-Host ""
    Write-Host "===========================================" -ForegroundColor Green
    Write-Host "Installation completed successfully!" -ForegroundColor Green
    Write-Host "===========================================" -ForegroundColor Green
    Write-Host ""
    Write-Host "Application URL: $AppUrl" -ForegroundColor Cyan
    Write-Host "Admin Panel: $AppUrl/admin" -ForegroundColor Cyan
    Write-Host ""
    Write-Host "Default admin credentials:" -ForegroundColor Yellow
    Write-Host "Email: admin@example.com" -ForegroundColor White
    Write-Host "Password: password" -ForegroundColor White
    Write-Host ""
    Write-Host "Please change the default credentials after first login!" -ForegroundColor Red
    Write-Host ""
    
    # Start development server
    Start-DevServer
    
} catch {
    Write-Host "Installation failed: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}
