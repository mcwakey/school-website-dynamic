# Production Deployment Guide

## Vite Asset Build and MIME Type Configuration

### 1. Building Assets for Production

The Vite assets have been successfully built and are ready for production. The build process has been completed and generated the following files:

- `public/build/manifest.json` - Asset manifest for Laravel
- `public/build/assets/app-BDAque31.js` - Compiled JavaScript bundle
- `public/build/assets/app-DbaZCfaT.css` - Compiled CSS bundle

### 2. MIME Type Configuration

The `.htaccess` file in the `public` directory already includes proper MIME type configuration:

```apache
<IfModule mod_mime.c>
    # JavaScript files
    AddType application/javascript .js
    AddType application/javascript .mjs
    
    # CSS files
    AddType text/css .css
    
    # JSON files
    AddType application/json .json
    
    # Web fonts
    AddType font/woff .woff
    AddType font/woff2 .woff2
    AddType application/font-woff .woff
    AddType application/font-woff2 .woff2
    
    # Images
    AddType image/svg+xml .svg
    AddType image/webp .webp
</IfModule>
```

### 3. Production Environment Setup

When deploying to production:

1. **Set Environment Variables:**
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://your-domain.com
   ```

2. **Ensure Assets are Built:**
   ```bash
   npm run build
   ```

3. **Clear and Cache Configuration:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

4. **Set Proper File Permissions:**
   ```bash
   # For the storage and bootstrap/cache directories
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   
   # Ensure web server can read assets
   chmod -R 644 public/build
   ```

### 5. Windows Development Environment Notes

On Windows development environments, symlinks may require administrator privileges. If `php artisan storage:link` fails:

**Option 1: Run as Administrator**
```cmd
# Run PowerShell or Command Prompt as Administrator, then:
php artisan storage:link
```

**Option 2: Copy Files (Development Only)**
```cmd
# Copy storage files to public directory
xcopy /E /I storage\app\public public\storage
```

**Note:** For production Linux servers, `php artisan storage:link` should work without issues.

### 4. Nginx Configuration (Alternative to Apache)

If using Nginx instead of Apache, add this to your server block:

```nginx
# Handle static assets with proper MIME types
location ~* \.(js|css|png|jpg|jpeg|gif|ico|svg|woff|woff2)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
    try_files $uri =404;
}

# Ensure JSON files have correct MIME type
location ~* \.json$ {
    add_header Content-Type application/json;
}
```

### 5. Troubleshooting MIME Type Issues

If you still encounter MIME type errors in production:

1. **Check Server Configuration:**
   - Ensure your hosting provider supports `.htaccess` files
   - Verify that `mod_mime` is enabled on Apache servers

2. **Verify Asset URLs:**
   - Check that `APP_URL` in `.env` matches your domain
   - Ensure the `public/build` directory is accessible via web

3. **Force Refresh Assets:**
   - Run `npm run build` again to regenerate assets with new hashes
   - Clear any CDN or browser cache

4. **Check File Permissions:**
   - Ensure the web server can read files in `public/build/assets/`
   - Set proper ownership: `chown -R www-data:www-data public/build`

### 6. Verification Steps

After deployment, verify these features work correctly:

1. **Homepage loads with proper styling**
2. **Gallery lightbox functionality**
3. **Search dropdown with smooth animation**
4. **Bootstrap components (modals, tooltips, etc.)**
5. **Mobile responsiveness**

### 7. Performance Optimization

The built assets include:

- **Minified JavaScript and CSS**
- **Asset versioning for cache busting**
- **Gzip compression enabled in .htaccess**
- **Long-term cache headers for static assets**

## Deployment Checklist

- [ ] Run `npm run build`
- [ ] Set production environment variables
- [ ] Upload files to production server
- [ ] Set proper file permissions
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Create storage symlink: `php artisan storage:link`
- [ ] Test all functionality
- [ ] Monitor error logs for any issues

## Common Issues and Solutions

### Issue: Assets not loading
**Solution:** Check that `public/build` directory exists and has proper permissions

### Issue: CSS/JS MIME type errors
**Solution:** Verify `.htaccess` configuration and server support for `mod_mime`

### Issue: 404 errors for assets
**Solution:** Ensure `APP_URL` is correctly set and assets are accessible

### Issue: Gallery/Search not working
**Solution:** Check browser console for JavaScript errors and verify Bootstrap is loading
