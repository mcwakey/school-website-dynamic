# Ghana Primary School - Installation Helper Validation Script

Write-Host "Ghana Primary School - Installation Helper Validation" -ForegroundColor Green
Write-Host "======================================================"

$baseUrl = "http://localhost:8000"
$installUrl = "$baseUrl/install"

# Check server status
try {
    $response = Invoke-WebRequest -Uri $baseUrl -Method HEAD -TimeoutSec 5 -UseBasicParsing
    Write-Host "✓ Laravel Server - Running" -ForegroundColor Green

    # Test installation helper
    try {
        $installResponse = Invoke-WebRequest -Uri $installUrl -UseBasicParsing
        Write-Host "✓ Installation Helper - Accessible" -ForegroundColor Green

        if ($installResponse.Content -match "Ghana Primary School") {
            Write-Host "✓ Installation Helper - Content verified" -ForegroundColor Green
        }
    }
    catch {
        Write-Host "✗ Installation Helper - Not accessible" -ForegroundColor Red
    }
}
catch {
    Write-Host "✗ Laravel Server - Not running" -ForegroundColor Red
    Write-Host "  Start with: php artisan serve" -ForegroundColor Yellow
}

# Check environment
if (Test-Path ".env") {
    Write-Host "✓ Environment File - Exists" -ForegroundColor Green
} else {
    Write-Host "✗ Environment File - Missing" -ForegroundColor Red
}

# Check database
if (Test-Path "database/database.sqlite") {
    Write-Host "✓ SQLite Database - Exists" -ForegroundColor Green
} else {
    Write-Host "✗ SQLite Database - Missing" -ForegroundColor Red
}

Write-Host "`nTo use the installation helper:" -ForegroundColor Cyan
Write-Host "1. Open browser to: $installUrl" -ForegroundColor White
Write-Host "2. Follow the step-by-step wizard" -ForegroundColor White

Write-Host "`nValidation Complete!" -ForegroundColor Green
