# Ghana Primary School Website - Dropdown Diagnostic Script (PowerShell)
# Run this script on your Windows server to diagnose dropdown menu issues

Write-Host "🔍 Ghana Primary School - Dropdown Menu Diagnostic" -ForegroundColor Cyan
Write-Host "==================================================" -ForegroundColor Cyan
Write-Host ""

# Check if we're in the correct directory
if (-not (Test-Path "artisan")) {
    Write-Host "❌ Error: Please run this script from the Laravel root directory" -ForegroundColor Red
    exit 1
}

Write-Host "✅ Running from Laravel root directory" -ForegroundColor Green
Write-Host ""

# Check if JavaScript file exists
Write-Host "📂 Checking JavaScript Files..." -ForegroundColor Yellow
if (Test-Path "public\js\navigation.js") {
    $fileInfo = Get-Item "public\js\navigation.js"
    Write-Host "✅ navigation.js exists" -ForegroundColor Green
    Write-Host "   Size: $($fileInfo.Length) bytes"
    Write-Host "   Last Modified: $($fileInfo.LastWriteTime)"
} else {
    Write-Host "❌ navigation.js not found in public\js\" -ForegroundColor Red
    Write-Host "   Creating navigation.js file..." -ForegroundColor Yellow

    # Create the navigation.js file if it doesn't exist
    if (-not (Test-Path "public\js")) {
        New-Item -ItemType Directory -Path "public\js" -Force | Out-Null
    }

    $navigationJs = @"
document.addEventListener('DOMContentLoaded', function() {
    if (typeof bootstrap === 'undefined') {
        console.error('Bootstrap JS not loaded');
        return;
    }

    const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    const dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl, {
            boundary: 'viewport',
            display: 'dynamic',
            autoClose: true
        });
    });

    console.log('Navigation initialized with', dropdownList.length, 'dropdowns');
});
"@

    $navigationJs | Out-File -FilePath "public\js\navigation.js" -Encoding UTF8
    Write-Host "✅ Created navigation.js file" -ForegroundColor Green
}

Write-Host ""

# Check web server configuration
Write-Host "🌐 Checking Web Server Configuration..." -ForegroundColor Yellow

# Check if IIS or Apache
$iisPresent = Get-Service -Name "W3SVC" -ErrorAction SilentlyContinue
$apachePresent = Get-Process -Name "apache*" -ErrorAction SilentlyContinue

if ($iisPresent) {
    Write-Host "📋 Detected: IIS Web Server" -ForegroundColor Cyan

    # Check web.config
    if (Test-Path "public\web.config") {
        Write-Host "✅ web.config exists" -ForegroundColor Green
    } else {
        Write-Host "⚠️  web.config not found in public directory" -ForegroundColor Orange
    }

} elseif ($apachePresent) {
    Write-Host "📋 Detected: Apache Web Server" -ForegroundColor Cyan

    # Check .htaccess
    if (Test-Path "public\.htaccess") {
        Write-Host "✅ .htaccess exists" -ForegroundColor Green

        # Check for JavaScript MIME type
        $htaccessContent = Get-Content "public\.htaccess" -Raw
        if ($htaccessContent -match "AddType.*javascript") {
            Write-Host "✅ JavaScript MIME type configured" -ForegroundColor Green
        } else {
            Write-Host "⚠️  JavaScript MIME type not configured" -ForegroundColor Orange
            Write-Host "   Consider adding: AddType application/javascript .js"
        }
    } else {
        Write-Host "⚠️  .htaccess not found in public directory" -ForegroundColor Orange
    }

} else {
    Write-Host "❓ Web server type could not be determined" -ForegroundColor Yellow
}

Write-Host ""

# Check Laravel configuration
Write-Host "⚙️  Checking Laravel Configuration..." -ForegroundColor Yellow

# Check if PHP and artisan work
try {
    $artisanOutput = & php artisan --version 2>$null
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✅ Laravel artisan working" -ForegroundColor Green
        Write-Host "   Version: $artisanOutput"
    } else {
        Write-Host "❌ Laravel artisan not working" -ForegroundColor Red
    }
} catch {
    Write-Host "❌ PHP or Laravel artisan not accessible" -ForegroundColor Red
}

# Check .env file
if (Test-Path ".env") {
    Write-Host "✅ .env file exists" -ForegroundColor Green

    $envContent = Get-Content ".env" -Raw

    # Check debug mode
    if ($envContent -match "APP_DEBUG=true") {
        Write-Host "⚠️  Debug mode is enabled (should be false for production)" -ForegroundColor Orange
    } else {
        Write-Host "✅ Debug mode properly configured" -ForegroundColor Green
    }

    # Check environment
    if ($envContent -match "APP_ENV=production") {
        Write-Host "✅ Environment set to production" -ForegroundColor Green
    } else {
        Write-Host "⚠️  Environment not set to production" -ForegroundColor Orange
    }
} else {
    Write-Host "❌ .env file not found" -ForegroundColor Red
}

Write-Host ""

# Check permissions
Write-Host "🔐 Checking File Permissions..." -ForegroundColor Yellow

# Check storage directory
if (Test-Path "storage") {
    Write-Host "✅ Storage directory exists" -ForegroundColor Green

    try {
        $testFile = "storage\permission_test.txt"
        "test" | Out-File -FilePath $testFile
        Remove-Item $testFile
        Write-Host "✅ Storage directory writable" -ForegroundColor Green
    } catch {
        Write-Host "⚠️  Storage directory not writable" -ForegroundColor Orange
    }
} else {
    Write-Host "❌ Storage directory not found" -ForegroundColor Red
}

# Check public directory
if (Test-Path "public") {
    Write-Host "✅ Public directory exists" -ForegroundColor Green
} else {
    Write-Host "❌ Public directory not found" -ForegroundColor Red
}

Write-Host ""

# Test URL accessibility
Write-Host "🌍 Testing URL Accessibility..." -ForegroundColor Yellow

# Get the application URL from .env
if (Test-Path ".env") {
    $envContent = Get-Content ".env"
    $appUrlLine = $envContent | Where-Object { $_ -match "APP_URL=" }

    if ($appUrlLine) {
        $appUrl = ($appUrlLine -split "=", 2)[1].Trim('"')
        Write-Host "📍 Application URL: $appUrl" -ForegroundColor Cyan

        # Test if the main site is accessible
        Write-Host "   Testing main site accessibility..." -ForegroundColor Gray
        try {
            $response = Invoke-WebRequest -Uri $appUrl -UseBasicParsing -TimeoutSec 10
            if ($response.StatusCode -eq 200) {
                Write-Host "✅ Main site accessible" -ForegroundColor Green
            } else {
                Write-Host "❌ Main site returned status: $($response.StatusCode)" -ForegroundColor Red
            }
        } catch {
            Write-Host "❌ Main site not accessible: $($_.Exception.Message)" -ForegroundColor Red
        }

        # Test if navigation.js is accessible
        Write-Host "   Testing navigation.js accessibility..." -ForegroundColor Gray
        $jsUrl = "$appUrl/js/navigation.js"
        try {
            $response = Invoke-WebRequest -Uri $jsUrl -UseBasicParsing -TimeoutSec 10
            Write-Host "✅ navigation.js accessible (HTTP $($response.StatusCode))" -ForegroundColor Green
        } catch {
            Write-Host "❌ navigation.js not accessible: $($_.Exception.Message)" -ForegroundColor Red
        }
    } else {
        Write-Host "❌ APP_URL not configured in .env" -ForegroundColor Red
    }
} else {
    Write-Host "❌ Cannot test URLs - .env file not found" -ForegroundColor Red
}

Write-Host ""

# Generate diagnostic report
Write-Host "📊 Diagnostic Summary" -ForegroundColor Cyan
Write-Host "====================" -ForegroundColor Cyan

$issues = 0

if (-not (Test-Path "public\js\navigation.js")) { $issues++ }
if (-not (Test-Path ".env")) { $issues++ }
if (-not (Test-Path "storage")) { $issues++ }

Write-Host "🔍 Total issues found: $issues" -ForegroundColor $(if ($issues -eq 0) { "Green" } else { "Orange" })

if ($issues -eq 0) {
    Write-Host ""
    Write-Host "🎉 All checks passed! Your dropdown menus should be working." -ForegroundColor Green
    Write-Host ""
    Write-Host "If dropdowns are still not working, check:" -ForegroundColor Yellow
    Write-Host "1. Browser console for JavaScript errors (F12)" -ForegroundColor Gray
    Write-Host "2. Network tab for failed resource loading" -ForegroundColor Gray
    Write-Host "3. Content Security Policy headers" -ForegroundColor Gray
    Write-Host "4. CDN accessibility (Bootstrap CDN)" -ForegroundColor Gray
} else {
    Write-Host ""
    Write-Host "⚠️  Issues found that may affect dropdown functionality." -ForegroundColor Orange
    Write-Host "Please review the items marked with ❌ or ⚠️ above." -ForegroundColor Orange
}

Write-Host ""
Write-Host "🔧 Quick Fixes:" -ForegroundColor Cyan
Write-Host "===============" -ForegroundColor Cyan
Write-Host "1. Clear Laravel cache: php artisan cache:clear" -ForegroundColor Gray
Write-Host "2. Recreate navigation.js: This script created it if missing" -ForegroundColor Gray
Write-Host "3. Check server error logs for detailed error messages" -ForegroundColor Gray
Write-Host "4. Ensure web server serves .js files with correct MIME type" -ForegroundColor Gray
Write-Host ""
Write-Host "📖 For detailed troubleshooting, see DEPLOYMENT_GUIDE.md" -ForegroundColor Cyan
Write-Host ""
