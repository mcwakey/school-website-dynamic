#!/usr/bin/env pwsh

# Ghana Primary School - Installation Helper Validation Script
# This script validates the installation helper functionality

Write-Host "Ghana Primary School - Installation Helper Validation" -ForegroundColor Green
Write-Host "============================================================"

$baseUrl = "http://localhost:8000"
$installUrl = "$baseUrl/install"

# Function to test URL accessibility
function Test-Url {
    param([string]$url, [string]$description)

    try {
        $response = Invoke-WebRequest -Uri $url -Method HEAD -TimeoutSec 10 -UseBasicParsing
        if ($response.StatusCode -eq 200) {
            Write-Host "✓ $description - Accessible" -ForegroundColor Green
            return $true
        } else {
            Write-Host "✗ $description - HTTP $($response.StatusCode)" -ForegroundColor Red
            return $false
        }
    }
    catch {
        Write-Host "✗ $description - Not accessible" -ForegroundColor Red
        return $false
    }
}

# Function to check Laravel server
function Test-LaravelServer {
    Write-Host "`nChecking Laravel Development Server..." -ForegroundColor Cyan

    # Check if server is running
    $serverRunning = Test-Url $baseUrl "Laravel Server"

    if (-not $serverRunning) {
        Write-Host "Warning: Laravel server not running. Start with: php artisan serve" -ForegroundColor Yellow
        return $false
    }

    return $true
}

# Function to validate installation helper
function Test-InstallationHelper {
    Write-Host "`nTesting Installation Helper..." -ForegroundColor Cyan

    # Test main install page
    $installAccessible = Test-Url $installUrl "Installation Helper Main Page"

    if ($installAccessible) {
        try {
            $content = Invoke-WebRequest -Uri $installUrl -UseBasicParsing
            $hasTitle = $content.Content -match "Ghana Primary School"
            $hasSteps = $content.Content -match "System Requirements Check"
            $hasScripts = $content.Content -match "checkRequirements"

            if ($hasTitle -and $hasSteps -and $hasScripts) {
                Write-Host "✓ Installation Helper - Content validated" -ForegroundColor Green
            } else {
                Write-Host "Warning: Installation Helper - Content issues detected" -ForegroundColor Yellow
            }
        }
        catch {
            Write-Host "✗ Installation Helper - Content validation failed" -ForegroundColor Red
        }
    }
}

# Function to check database setup
function Test-DatabaseSetup {
    Write-Host "`nChecking Database Setup..." -ForegroundColor Cyan

    $dbPath = "database/database.sqlite"

    if (Test-Path $dbPath) {
        Write-Host "✓ SQLite Database File - Exists" -ForegroundColor Green

        # Check file size (should be > 0 if setup)
        $dbSize = (Get-Item $dbPath).Length
        if ($dbSize -gt 0) {
            Write-Host "✓ Database - Has content ($dbSize bytes)" -ForegroundColor Green
        } else {
            Write-Host "Warning: Database - Empty (needs migration)" -ForegroundColor Yellow
        }
    } else {
        Write-Host "✗ SQLite Database File - Missing" -ForegroundColor Red
        Write-Host "   Run: New-Item -ItemType File -Path 'database\database.sqlite'" -ForegroundColor Yellow
    }
}

# Function to check environment setup
function Test-EnvironmentSetup {
    Write-Host "`nChecking Environment Setup..." -ForegroundColor Cyan

    # Check .env file
    if (Test-Path ".env") {
        Write-Host "✓ Environment File - Exists" -ForegroundColor Green

        # Check for APP_KEY
        $envContent = Get-Content ".env" -Raw
        if ($envContent -match "APP_KEY=base64:") {
            Write-Host "✓ Application Key - Generated" -ForegroundColor Green
        } else {
            Write-Host "✗ Application Key - Missing or invalid" -ForegroundColor Red
            Write-Host "   Run: php artisan key:generate" -ForegroundColor Yellow
        }
    } else {
        Write-Host "✗ Environment File - Missing" -ForegroundColor Red
        Write-Host "   Run: copy .env.example .env" -ForegroundColor Yellow
    }
}

# Main execution
Write-Host "Starting validation checks..." -ForegroundColor Blue

# Run all tests
$serverOk = Test-LaravelServer
Test-EnvironmentSetup
Test-DatabaseSetup

if ($serverOk) {
    Test-InstallationHelper
}

Write-Host "`nInstallation Helper Usage:" -ForegroundColor Cyan
Write-Host "1. Open browser to: $installUrl" -ForegroundColor White
Write-Host "2. Follow the installation wizard steps" -ForegroundColor White
Write-Host "3. Access your website at: $baseUrl" -ForegroundColor White

Write-Host "`nInstallation Helper Validation Complete!" -ForegroundColor Green

# Function to validate installation helper
function Test-InstallationHelper {
    Write-Host "`n🛠️  Testing Installation Helper..." -ForegroundColor Cyan

    # Test main install page
    $installAccessible = Test-Url $installUrl "Installation Helper Main Page"

    if ($installAccessible) {
        # Test if the page contains expected content
        try {
            $content = Invoke-WebRequest -Uri $installUrl -UseBasicParsing
            $hasTitle = $content.Content -match "Ghana Primary School"
            $hasSteps = $content.Content -match "System Requirements Check"
            $hasScripts = $content.Content -match "checkRequirements"

            if ($hasTitle -and $hasSteps -and $hasScripts) {
                Write-Host "✅ Installation Helper - Content validated" -ForegroundColor Green
            } else {
                Write-Host "⚠️  Installation Helper - Content issues detected" -ForegroundColor Yellow
            }
        }
        catch {
            Write-Host "❌ Installation Helper - Content validation failed" -ForegroundColor Red
        }
    }
}

# Function to check database setup
function Test-DatabaseSetup {
    Write-Host "`n💾 Checking Database Setup..." -ForegroundColor Cyan

    $dbPath = "database/database.sqlite"

    if (Test-Path $dbPath) {
        Write-Host "✅ SQLite Database File - Exists" -ForegroundColor Green

        # Check file size (should be > 0 if setup)
        $dbSize = (Get-Item $dbPath).Length
        if ($dbSize -gt 0) {
            Write-Host "✅ Database - Has content ($dbSize bytes)" -ForegroundColor Green
        } else {
            Write-Host "⚠️  Database - Empty (needs migration)" -ForegroundColor Yellow
        }
    } else {
        Write-Host "❌ SQLite Database File - Missing" -ForegroundColor Red
        Write-Host "   Run: New-Item -ItemType File -Path 'database\database.sqlite'" -ForegroundColor Yellow
    }
}

# Function to check environment setup
function Test-EnvironmentSetup {
    Write-Host "`n🔧 Checking Environment Setup..." -ForegroundColor Cyan

    # Check .env file
    if (Test-Path ".env") {
        Write-Host "✅ Environment File - Exists" -ForegroundColor Green

        # Check for APP_KEY
        $envContent = Get-Content ".env" -Raw
        if ($envContent -match "APP_KEY=base64:") {
            Write-Host "✅ Application Key - Generated" -ForegroundColor Green
        } else {
            Write-Host "❌ Application Key - Missing or invalid" -ForegroundColor Red
            Write-Host "   Run: php artisan key:generate" -ForegroundColor Yellow
        }
    } else {
        Write-Host "❌ Environment File - Missing" -ForegroundColor Red
        Write-Host "   Run: copy .env.example .env" -ForegroundColor Yellow
    }
}

# Function to check file permissions
function Test-FilePermissions {
    Write-Host "`n🔐 Checking File Permissions..." -ForegroundColor Cyan

    $directories = @("storage", "bootstrap/cache", "public")

    foreach ($dir in $directories) {
        if (Test-Path $dir) {
            try {
                # Test write permissions by creating a temporary file
                $testFile = Join-Path $dir "test_write_permission.tmp"
                "test" | Out-File $testFile -ErrorAction Stop
                Remove-Item $testFile -ErrorAction SilentlyContinue
                Write-Host "✅ Directory $dir - Writable" -ForegroundColor Green
            }
            catch {
                Write-Host "❌ Directory $dir - Not writable" -ForegroundColor Red
            }
        } else {
            Write-Host "❌ Directory $dir - Missing" -ForegroundColor Red
        }
    }
}

# Function to provide installation steps
function Show-InstallationSteps {
    Write-Host "`n📋 Installation Helper Usage:" -ForegroundColor Cyan
    Write-Host "1. Ensure Laravel server is running: php artisan serve" -ForegroundColor White
    Write-Host "2. Open browser to: $installUrl" -ForegroundColor White
    Write-Host "3. Follow the step-by-step installation wizard:" -ForegroundColor White
    Write-Host "   • System Requirements Check" -ForegroundColor Gray
    Write-Host "   • Database Setup (migrations)" -ForegroundColor Gray
    Write-Host "   • Sample Data Seeding" -ForegroundColor Gray
    Write-Host "   • Admin User Creation" -ForegroundColor Gray
    Write-Host "   • System Optimization" -ForegroundColor Gray
    Write-Host "4. Access your website at: $baseUrl" -ForegroundColor White
    Write-Host "5. Login to admin panel at: $baseUrl/login" -ForegroundColor White
}

# Function to show troubleshooting
function Show-Troubleshooting {
    Write-Host "`n🔧 Troubleshooting:" -ForegroundColor Cyan
    Write-Host "• Server not running: php artisan serve" -ForegroundColor White
    Write-Host "• Database issues: Check database/database.sqlite exists" -ForegroundColor White
    Write-Host "• Permission errors: Ensure storage/ and bootstrap/cache/ are writable" -ForegroundColor White
    Write-Host "• Cache issues: php artisan cache:clear" -ForegroundColor White
    Write-Host "• Environment issues: copy .env.example .env && php artisan key:generate" -ForegroundColor White
}

# Main execution
Write-Host "Starting validation checks..." -ForegroundColor Blue

# Run all tests
$serverOk = Test-LaravelServer
Test-EnvironmentSetup
Test-DatabaseSetup
Test-FilePermissions

if ($serverOk) {
    Test-InstallationHelper
}

# Show instructions
Show-InstallationSteps
Show-Troubleshooting

Write-Host "`n📚 Additional Documentation:" -ForegroundColor Cyan
Write-Host "• Installation Helper Guide: INSTALLATION_HELPER_GUIDE.md" -ForegroundColor White
Write-Host "• Deployment Guide: DEPLOYMENT_GUIDE.md" -ForegroundColor White
Write-Host "• Main README: README.md" -ForegroundColor White

Write-Host "`n✨ Installation Helper Validation Complete!" -ForegroundColor Green
