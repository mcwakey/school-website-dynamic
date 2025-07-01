# Ghana Primary School - Installation Helper Test

Write-Host "Testing Installation Helper..." -ForegroundColor Green

$baseUrl = "http://localhost:8000"
$installUrl = "$baseUrl/install"

try {
    $response = Invoke-WebRequest -Uri $installUrl -UseBasicParsing -TimeoutSec 10
    if ($response.StatusCode -eq 200) {
        Write-Host "✓ Installation Helper is accessible" -ForegroundColor Green
        Write-Host "✓ Open browser to: $installUrl" -ForegroundColor Cyan
    }
}
catch {
    Write-Host "✗ Installation Helper not accessible" -ForegroundColor Red
    Write-Host "Make sure Laravel server is running: php artisan serve" -ForegroundColor Yellow
}

Write-Host "Test complete!" -ForegroundColor Green
