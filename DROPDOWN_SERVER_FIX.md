# 🔧 Dropdown Menu Server Deployment Fix

## Problem
After deploying the Ghana Primary School website to the server, dropdown menus are not working. This is typically caused by JavaScript accessibility issues, Content Security Policy restrictions, or missing files.

## Quick Fix Solutions

### Solution 1: Run Diagnostic Script
```bash
# Linux/macOS
chmod +x diagnose_dropdowns.sh
./diagnose_dropdowns.sh

# Windows PowerShell
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
.\diagnose_dropdowns.ps1
```

### Solution 2: Manual File Check
```bash
# Ensure navigation.js exists and is accessible
ls -la public/js/navigation.js

# If missing, create it:
mkdir -p public/js
# Copy content from the navigation.js file in this project
```

### Solution 3: Web Server Configuration

#### For Apache
Add to `.htaccess` in public directory:
```apache
# JavaScript MIME Type
AddType application/javascript .js

# Content Security Policy
Header always set Content-Security-Policy "default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'"
```

#### For Nginx
Add to server block:
```nginx
# JavaScript MIME Type (usually already configured)
location ~* \.js$ {
    add_header Content-Type application/javascript;
}

# Content Security Policy
add_header Content-Security-Policy "default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'" always;
```

#### For IIS (Windows)
Add to `web.config` in public directory:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<configuration>
    <system.webServer>
        <staticContent>
            <mimeMap fileExtension=".js" mimeType="application/javascript" />
        </staticContent>
        <httpProtocol>
            <customHeaders>
                <add name="Content-Security-Policy" value="default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'" />
            </customHeaders>
        </httpProtocol>
    </system.webServer>
</configuration>
```

### Solution 4: Clear Laravel Cache
```bash
# Clear all Laravel caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Solution 5: Check File Permissions
```bash
# Set correct permissions
chmod 644 public/js/navigation.js
chmod -R 755 public/js
```

## Testing the Fix

### Browser Console Test
1. Open your website in a browser
2. Press F12 to open developer tools
3. Go to Console tab
4. Look for these messages:
   - ✅ "Navigation initialized with X dropdowns"
   - ❌ "Bootstrap JS not loaded"
   - ❌ "Failed to load resource" for navigation.js

### Manual JavaScript Test
In browser console, run:
```javascript
// Check if Bootstrap is loaded
console.log(typeof bootstrap);
// Should return "object"

// Check if navigation script loaded
console.log(typeof window.SchoolNavigation);
// Should return "object"

// Manual dropdown initialization
if (typeof bootstrap !== 'undefined') {
    document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
        new bootstrap.Dropdown(toggle);
    });
}
```

### Network Tab Test
1. Open developer tools (F12)
2. Go to Network tab
3. Reload the page
4. Look for:
   - ✅ Bootstrap JS loads (200 OK)
   - ✅ navigation.js loads (200 OK)
   - ❌ Any failed requests (404, CSP violations)

## Common Error Messages and Solutions

### "Bootstrap is not defined"
**Cause**: Bootstrap CDN not accessible or blocked
**Solution**: 
- Check internet connectivity
- Verify CDN URL is not blocked by firewall
- Consider hosting Bootstrap locally

### "Refused to execute inline script because of CSP"
**Cause**: Content Security Policy blocking scripts
**Solution**: 
- Add CSP headers as shown above
- Use external JavaScript files (already implemented)

### "Failed to load resource: navigation.js"
**Cause**: File missing or incorrect path
**Solution**:
- Run diagnostic script to create file
- Check file permissions
- Verify web server serves .js files

### Dropdowns work locally but not on server
**Cause**: Different server configuration
**Solution**:
- Compare local vs server web server configs
- Check for different PHP/Laravel versions
- Verify all files were uploaded

## Fallback Solution

If all else fails, the layout includes a fallback script that provides basic dropdown functionality without Bootstrap. Look for "using fallback dropdown initialization" in the console.

## Quick Command Reference

```bash
# Full diagnostic and fix
./diagnose_dropdowns.sh

# Quick permission fix
chmod -R 755 storage bootstrap/cache public/js
chmod 644 public/js/navigation.js

# Clear Laravel cache
php artisan cache:clear && php artisan config:clear

# Test navigation.js accessibility
curl -I https://your-domain.com/js/navigation.js

# Check Laravel logs
tail -f storage/logs/laravel.log
```

## Success Indicators

When fixed correctly, you should see:
1. ✅ Dropdown menus open when clicked
2. ✅ Console shows "Navigation initialized with X dropdowns"
3. ✅ No JavaScript errors in browser console
4. ✅ Network tab shows all resources loaded (200 OK)
5. ✅ Dropdown arrows rotate when opened

## Need More Help?

1. Run the diagnostic script first
2. Check the browser console for specific errors
3. Review server error logs
4. Verify all files from the project were uploaded
5. Test with a simple HTML page to isolate the issue

The dropdown menus should work perfectly once the JavaScript accessibility issue is resolved!
