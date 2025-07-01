# 🚀 Ghana Primary School Website - Deployment Guide

## Overview
This guide covers the complete deployment process for the Ghana Primary School website, including server requirements, installation steps, and configuration.

---

## 📋 Server Requirements

### Minimum System Requirements
- **PHP**: 8.1 or higher
- **Database**: MySQL 5.7+ or MariaDB 10.3+
- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **Memory**: 512MB RAM minimum (1GB recommended)
- **Storage**: 2GB free space minimum
- **SSL Certificate**: Required for production

### PHP Extensions Required
```bash
php-mbstring
php-xml
php-bcmath
php-json
php-tokenizer
php-fileinfo
php-openssl
php-pdo
php-mysql
php-gd
php-curl
php-zip
```

### Composer
- **Composer**: 2.0 or higher

---

## 🛠️ Installation Methods

### Method 1: Manual Installation (Recommended)

#### Step 1: Download and Extract
```bash
# Download the project
git clone https://github.com/your-repo/ghana-primary-school.git
# OR extract from provided ZIP file
unzip ghana-primary-school.zip
cd ghana-primary-school
```

#### Step 2: Install Dependencies
```bash
# Install PHP dependencies
composer install --optimize-autoloader --no-dev

# Install Node.js dependencies (if using npm)
npm install
npm run production
```

#### Step 3: Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### Step 4: Configure Environment Variables
Edit the `.env` file with your settings:

```env
APP_NAME="Ghana Excellence Primary School"
APP_ENV=production
APP_KEY=base64:generated_key_here
APP_DEBUG=false
APP_URL=https://your-school-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ghana_school_db
DB_USERNAME=your_db_user
DB_PASSWORD=your_secure_password

MAIL_MAILER=smtp
MAIL_HOST=your-smtp-server.com
MAIL_PORT=587
MAIL_USERNAME=your-email@domain.com
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@your-school-domain.com
MAIL_FROM_NAME="${APP_NAME}"

FILESYSTEM_DISK=public
```

#### Step 5: Database Setup
```bash
# Run migrations and seeders
php artisan migrate --force
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=SettingsSeeder

# Create storage symlink
php artisan storage:link

# Set proper permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Method 2: Docker Installation

#### Docker Compose Setup
Create `docker-compose.yml`:

```yaml
version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: ghana-school-app
    restart: unless-stopped
    working_dir: /var/www
    volumes:
      - ./:/var/www
      - ./docker/php/local.ini:/usr/local/etc/php/conf.d/local.ini
    networks:
      - ghana-school

  webserver:
    image: nginx:alpine
    container_name: ghana-school-nginx
    restart: unless-stopped
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - ./:/var/www
      - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf
    networks:
      - ghana-school

  db:
    image: mysql:8.0
    container_name: ghana-school-db
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: ghana_school_db
      MYSQL_ROOT_PASSWORD: root_password
      MYSQL_PASSWORD: db_password
      MYSQL_USER: db_user
    volumes:
      - dbdata:/var/lib/mysql
    networks:
      - ghana-school

volumes:
  dbdata:
    driver: local

networks:
  ghana-school:
    driver: bridge
```

#### Docker Commands
```bash
# Build and start containers
docker-compose up -d

# Run migrations
docker-compose exec app php artisan migrate --force

# Create admin user
docker-compose exec app php artisan db:seed --class=AdminUserSeeder
```

---

## 🌐 Web Server Configuration

### Apache Configuration
Create `.htaccess` in public directory:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    
    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    
    # Redirect Trailing Slashes If Not A Folder
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]
    
    # Send Requests To Front Controller
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

# Security Headers
<IfModule mod_headers.c>
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set X-Content-Type-Options "nosniff"
    Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"
    Header always set Content-Security-Policy "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'"
</IfModule>

# File Upload Security
<Files "*.php">
    Order Deny,Allow
    Deny from all
</Files>

<Files "index.php">
    Order Allow,Deny
    Allow from all
</Files>
```

### Nginx Configuration
Create `/etc/nginx/sites-available/ghana-school`:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name your-school-domain.com www.your-school-domain.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name your-school-domain.com www.your-school-domain.com;
    root /var/www/ghana-primary-school/public;
    index index.php index.html index.htm;

    # SSL Configuration
    ssl_certificate /path/to/your/certificate.crt;
    ssl_certificate_key /path/to/your/private.key;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers ECDHE-RSA-AES256-GCM-SHA512:DHE-RSA-AES256-GCM-SHA512;
    ssl_prefer_server_ciphers off;

    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Strict-Transport-Security "max-age=31536000; includeSubDomains" always;

    # Laravel Configuration
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    # Static Files
    location ~* \.(js|css|png|jpg|jpeg|gif|ico|svg)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

    # Security: Deny access to sensitive files
    location ~ /\. {
        deny all;
    }

    location ~ /(vendor|storage|bootstrap|config|database|routes|tests)/ {
        deny all;
    }

    # File Upload Limits
    client_max_body_size 50M;
}
```

---

## 🔒 Security Configuration

### SSL Certificate Setup (Let's Encrypt)
```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx

# Generate SSL certificate
sudo certbot --nginx -d your-school-domain.com -d www.your-school-domain.com

# Auto-renewal
sudo crontab -e
# Add: 0 12 * * * /usr/bin/certbot renew --quiet
```

### Firewall Configuration
```bash
# UFW Setup
sudo ufw allow ssh
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw enable
```

### File Permissions
```bash
# Set correct ownership
sudo chown -R www-data:www-data /var/www/ghana-primary-school

# Set directory permissions
find /var/www/ghana-primary-school -type d -exec chmod 755 {} \;

# Set file permissions
find /var/www/ghana-primary-school -type f -exec chmod 644 {} \;

# Special permissions for Laravel
chmod -R 755 /var/www/ghana-primary-school/storage
chmod -R 755 /var/www/ghana-primary-school/bootstrap/cache
```

---

## 📊 Database Backup and Maintenance

### Automated Backup Script
Create `/home/backup/backup-school-db.sh`:

```bash
#!/bin/bash

# Configuration
DB_NAME="ghana_school_db"
DB_USER="your_db_user"
DB_PASS="your_db_password"
BACKUP_DIR="/home/backup/database"
DATE=$(date +%Y%m%d_%H%M%S)

# Create backup directory
mkdir -p $BACKUP_DIR

# Create backup
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > $BACKUP_DIR/school_backup_$DATE.sql

# Compress backup
gzip $BACKUP_DIR/school_backup_$DATE.sql

# Remove backups older than 30 days
find $BACKUP_DIR -name "*.sql.gz" -mtime +30 -delete

echo "Backup completed: school_backup_$DATE.sql.gz"
```

### Setup Automated Backups
```bash
# Make script executable
chmod +x /home/backup/backup-school-db.sh

# Add to crontab for daily backups at 2 AM
crontab -e
# Add: 0 2 * * * /home/backup/backup-school-db.sh
```

---

## 🚀 Performance Optimization

### Laravel Optimizations
```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize

# Queue worker (if using queues)
php artisan queue:work --daemon
```

### Database Optimizations
```sql
-- MySQL optimizations in /etc/mysql/mysql.conf.d/mysqld.cnf
[mysqld]
innodb_buffer_pool_size = 256M
innodb_log_file_size = 64M
query_cache_type = 1
query_cache_size = 32M
max_connections = 100
```

---

## 📝 Post-Installation Checklist

### ✅ Essential Tasks
- [ ] Change default admin password
- [ ] Update school information in settings
- [ ] Upload school logo
- [ ] Configure email settings
- [ ] Test contact form functionality
- [ ] Set up SSL certificate
- [ ] Configure automated backups
- [ ] Test mobile responsiveness
- [ ] Set up monitoring/analytics

### ✅ Security Checklist
- [ ] Remove or secure phpinfo files
- [ ] Disable server signature
- [ ] Set up fail2ban for SSH protection
- [ ] Regular security updates
- [ ] Monitor access logs
- [ ] Implement rate limiting

### ✅ Performance Checklist
- [ ] Enable compression (gzip)
- [ ] Set up CDN (optional)
- [ ] Optimize images
- [ ] Enable browser caching
- [ ] Monitor server resources

---

## 🆘 Troubleshooting

### Common Issues

#### "500 Internal Server Error"
```bash
# Check Laravel logs
tail -f storage/logs/laravel.log

# Check web server logs
tail -f /var/log/nginx/error.log
# or
tail -f /var/log/apache2/error.log

# Check permissions
ls -la storage bootstrap/cache
```

#### Database Connection Issues
```bash
# Test database connection
php artisan tinker
DB::connection()->getPdo();

# Check database user permissions
mysql -u root -p
SHOW GRANTS FOR 'your_db_user'@'localhost';
```

#### Email Not Working
```bash
# Test email configuration
php artisan tinker
Mail::raw('Test email', function($msg) { $msg->to('test@example.com')->subject('Test'); });
```

---

## 📞 Support and Maintenance

### Regular Maintenance Tasks
1. **Weekly**: Check logs, update content
2. **Monthly**: Update dependencies, security patches
3. **Quarterly**: Full system backup, performance review

### Getting Help
- Check Laravel documentation: https://laravel.com/docs
- Review system logs regularly
- Keep emergency contact information handy
- Document any custom modifications

---

## 🎉 Deployment Complete!

Your Ghana Primary School website is now ready for production use. Remember to:

1. **Test everything thoroughly** before going live
2. **Keep regular backups** of both database and files
3. **Monitor performance** and security regularly
4. **Update the system** regularly for security patches

**Your school's digital presence is now live and ready to serve the community!** 🚀

---

*For detailed administrator instructions, refer to the ADMIN_SETUP_GUIDE.md and USER_MANUAL.md files.*
