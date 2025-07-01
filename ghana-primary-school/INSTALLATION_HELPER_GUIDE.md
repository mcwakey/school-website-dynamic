# Installation Helper Documentation

## Ghana Primary School - Web-Based Installation Helper

The Ghana Primary School website includes a comprehensive web-based installation helper accessible at `/install` that guides you through the complete setup process.

## Features

### 🔧 System Requirements Check
- PHP Version verification (>= 8.1)
- Laravel Framework detection
- Composer installation check
- File permissions validation
- Database connectivity test
- Environment file verification

### 📊 Database Setup
- Fresh database migrations
- Table creation and schema setup
- Automatic rollback on errors

### 🌱 Sample Data Seeding
- News articles and announcements
- Staff profiles and information
- Gallery images and media
- Academic programs
- Events and calendar entries
- Core values and about sections

### 👤 Admin User Creation
- Secure admin account setup
- Email validation
- Password strength requirements
- Admin privileges assignment

### ⚡ System Optimization
- Storage link creation for media files
- Cache clearing (config, view, route)
- Application optimization
- Performance enhancements

## How to Use

### 1. Access the Installation Helper
Navigate to: `http://your-domain.com/install`

### 2. Follow the Step-by-Step Process
1. **Requirements Check** - Verify system compatibility
2. **Database Setup** - Initialize database tables
3. **Sample Data** - Add demonstration content
4. **Admin User** - Create your administrator account
5. **Optimization** - Optimize system performance
6. **Complete** - Access your new website

### 3. Installation Status
The helper automatically detects if the system is already installed and shows:
- Number of existing users
- Admin user presence
- Installation completion status

## Pre-Installation Requirements

### Environment Setup
1. Copy `.env.example` to `.env`
2. Generate application key: `php artisan key:generate`
3. Configure database settings in `.env`
4. Ensure proper file permissions

### Database Configuration
For SQLite (default):
```env
DB_CONNECTION=sqlite
# DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD not needed
```

For MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ghana_primary_school
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Advanced Features

### API Endpoints
The installation helper provides several API endpoints:

- `POST /install/check-requirements` - System requirements validation
- `POST /install/run-migrations` - Database setup
- `POST /install/seed-data` - Sample content creation
- `POST /install/create-admin` - Admin user creation
- `POST /install/storage-link` - Storage link creation
- `POST /install/clear-cache` - Cache clearing
- `POST /install/optimize` - Application optimization

### Error Handling
- Comprehensive error reporting
- Detailed failure messages
- Rollback capabilities
- Recovery suggestions

### Security Features
- CSRF protection on all forms
- Input validation and sanitization
- Secure password hashing
- Admin privilege verification

## Post-Installation

### Immediate Actions
1. **Login to Admin Panel**: `/login`
2. **Configure School Settings**: `/admin/settings`
3. **Customize Theme**: `/admin/theme`
4. **Upload School Logo**: `/admin/settings`

### Content Management
1. **Add News**: `/admin/news`
2. **Manage Staff**: `/admin/staff`
3. **Upload Gallery**: `/admin/gallery`
4. **Create Events**: `/admin/events`

### Security Recommendations
1. Change default admin password
2. Configure proper file permissions
3. Set up regular backups
4. Enable SSL/HTTPS
5. Configure email settings

## Troubleshooting

### Common Issues

**Database Connection Failed**
- Verify database credentials in `.env`
- Ensure database server is running
- Check firewall settings

**Permission Denied**
- Set proper directory permissions:
  - `storage/` - 755
  - `bootstrap/cache/` - 755
  - `public/` - 755

**Seeding Failed**
- Check database structure
- Verify foreign key constraints
- Review migration order

**Cache Issues**
- Clear all caches: `php artisan cache:clear`
- Clear config: `php artisan config:clear`
- Clear views: `php artisan view:clear`

### Manual Commands
If the web installer fails, you can run commands manually:

```bash
# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate:fresh

# Seed sample data
php artisan db:seed

# Create storage link
php artisan storage:link

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Optimize application
php artisan optimize
```

## Support

### Documentation
- Main Documentation: `DEPLOYMENT_GUIDE.md`
- Project Overview: `README.md`
- Testing Guide: `TESTING_VALIDATION_SUMMARY.md`

### Installation Scripts
- Windows: `install.ps1`
- Linux/macOS: `install.sh`
- Docker: `docker-compose.yml`

### Manual Installation
If you prefer manual installation, follow the `DEPLOYMENT_GUIDE.md` for detailed step-by-step instructions.

## Development Notes

### Architecture
- Built with Laravel 11
- Uses Bootstrap 5 for UI
- SQLite default database
- Modular installation steps
- RESTful API endpoints

### Customization
The installation helper can be customized by:
1. Modifying routes in `routes/web.php`
2. Updating the view in `resources/views/install/index.blade.php`
3. Adding new seeders in `database/seeders/`
4. Extending requirements check logic

### Security Considerations
- Installation helper should be disabled in production
- Consider adding IP restrictions
- Implement additional authentication if needed
- Regular security updates recommended

---

**Note**: The installation helper is designed for initial setup and testing. For production deployments, consider using the manual installation scripts or Docker containers for enhanced security and performance.
