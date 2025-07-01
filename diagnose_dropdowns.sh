#!/bin/bash

# Ghana Primary School Website - Dropdown Diagnostic Script
# Run this script on your server to diagnose dropdown menu issues

echo "🔍 Ghana Primary School - Dropdown Menu Diagnostic"
echo "=================================================="
echo ""

# Check if we're in the correct directory
if [ ! -f "artisan" ]; then
    echo "❌ Error: Please run this script from the Laravel root directory"
    exit 1
fi

echo "✅ Running from Laravel root directory"
echo ""

# Check if JavaScript file exists
echo "📂 Checking JavaScript Files..."
if [ -f "public/js/navigation.js" ]; then
    echo "✅ navigation.js exists"
    echo "   Size: $(stat -c%s public/js/navigation.js) bytes"
    echo "   Permissions: $(stat -c%A public/js/navigation.js)"
else
    echo "❌ navigation.js not found in public/js/"
    echo "   Creating navigation.js file..."

    # Create the navigation.js file if it doesn't exist
    mkdir -p public/js
    cat > public/js/navigation.js << 'EOF'
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
EOF

    chmod 644 public/js/navigation.js
    echo "✅ Created navigation.js file"
fi

echo ""

# Check web server configuration
echo "🌐 Checking Web Server Configuration..."

# Check if Apache or Nginx
if command -v apache2 &> /dev/null || command -v httpd &> /dev/null; then
    echo "📋 Detected: Apache Web Server"

    # Check .htaccess
    if [ -f "public/.htaccess" ]; then
        echo "✅ .htaccess exists"

        # Check for JavaScript MIME type
        if grep -q "AddType.*javascript" public/.htaccess; then
            echo "✅ JavaScript MIME type configured"
        else
            echo "⚠️  JavaScript MIME type not configured"
            echo "   Consider adding: AddType application/javascript .js"
        fi
    else
        echo "⚠️  .htaccess not found in public directory"
    fi

elif command -v nginx &> /dev/null; then
    echo "📋 Detected: Nginx Web Server"

    # Check nginx configuration
    if [ -f "/etc/nginx/nginx.conf" ]; then
        echo "✅ Nginx configuration found"
    else
        echo "⚠️  Standard nginx.conf not found"
    fi

else
    echo "❓ Web server type could not be determined"
fi

echo ""

# Check Laravel configuration
echo "⚙️  Checking Laravel Configuration..."

# Check if artisan works
if php artisan --version &> /dev/null; then
    echo "✅ Laravel artisan working"
    echo "   Version: $(php artisan --version)"
else
    echo "❌ Laravel artisan not working"
fi

# Check .env file
if [ -f ".env" ]; then
    echo "✅ .env file exists"

    # Check debug mode
    if grep -q "APP_DEBUG=true" .env; then
        echo "⚠️  Debug mode is enabled (should be false for production)"
    else
        echo "✅ Debug mode properly configured"
    fi

    # Check environment
    if grep -q "APP_ENV=production" .env; then
        echo "✅ Environment set to production"
    else
        echo "⚠️  Environment not set to production"
    fi
else
    echo "❌ .env file not found"
fi

echo ""

# Check permissions
echo "🔐 Checking File Permissions..."

# Check storage permissions
if [ -d "storage" ]; then
    STORAGE_PERMS=$(stat -c%A storage)
    echo "✅ Storage directory permissions: $STORAGE_PERMS"

    if [ ! -w "storage" ]; then
        echo "⚠️  Storage directory not writable"
    fi
else
    echo "❌ Storage directory not found"
fi

# Check public permissions
if [ -d "public" ]; then
    PUBLIC_PERMS=$(stat -c%A public)
    echo "✅ Public directory permissions: $PUBLIC_PERMS"
else
    echo "❌ Public directory not found"
fi

echo ""

# Test URL accessibility
echo "🌍 Testing URL Accessibility..."

# Get the application URL from .env
if [ -f ".env" ]; then
    APP_URL=$(grep "APP_URL=" .env | cut -d '=' -f2 | tr -d '"')

    if [ ! -z "$APP_URL" ]; then
        echo "📍 Application URL: $APP_URL"

        # Test if the main site is accessible
        echo "   Testing main site accessibility..."
        if curl -s -o /dev/null -w "%{http_code}" "$APP_URL" | grep -q "200"; then
            echo "✅ Main site accessible"
        else
            echo "❌ Main site not accessible"
        fi

        # Test if navigation.js is accessible
        echo "   Testing navigation.js accessibility..."
        JS_URL="$APP_URL/js/navigation.js"
        HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" "$JS_URL")

        if [ "$HTTP_CODE" = "200" ]; then
            echo "✅ navigation.js accessible (HTTP $HTTP_CODE)"
        else
            echo "❌ navigation.js not accessible (HTTP $HTTP_CODE)"
        fi
    else
        echo "❌ APP_URL not configured in .env"
    fi
else
    echo "❌ Cannot test URLs - .env file not found"
fi

echo ""

# Generate diagnostic report
echo "📊 Diagnostic Summary"
echo "===================="

# Count issues
ISSUES=0

if [ ! -f "public/js/navigation.js" ]; then
    ((ISSUES++))
fi

if [ ! -f ".env" ]; then
    ((ISSUES++))
fi

if [ ! -w "storage" ] 2>/dev/null; then
    ((ISSUES++))
fi

echo "🔍 Total issues found: $ISSUES"

if [ $ISSUES -eq 0 ]; then
    echo ""
    echo "🎉 All checks passed! Your dropdown menus should be working."
    echo ""
    echo "If dropdowns are still not working, check:"
    echo "1. Browser console for JavaScript errors (F12)"
    echo "2. Network tab for failed resource loading"
    echo "3. Content Security Policy headers"
    echo "4. CDN accessibility (Bootstrap CDN)"
else
    echo ""
    echo "⚠️  Issues found that may affect dropdown functionality."
    echo "Please review the items marked with ❌ or ⚠️ above."
fi

echo ""
echo "🔧 Quick Fixes:"
echo "==============="
echo "1. Fix permissions: chmod -R 755 storage bootstrap/cache"
echo "2. Clear Laravel cache: php artisan cache:clear"
echo "3. Recreate navigation.js: This script created it if missing"
echo "4. Check server error logs for detailed error messages"
echo ""
echo "📖 For detailed troubleshooting, see DEPLOYMENT_GUIDE.md"
echo ""
