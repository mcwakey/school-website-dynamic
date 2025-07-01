# 🏫 Ghana Primary School Website

**Version 1.0.0** - A complete, modern website and content management system built for Ghana Primary School using Laravel.

## 📚 Documentation

- **[🚀 Admin Setup Guide](ADMIN_SETUP_GUIDE.md)** - Get started as a new administrator
- **[📖 User Manual](USER_MANUAL.md)** - Complete guide to all website features  
- **[🎨 Customization Guide](CUSTOMIZATION_GUIDE.md)** - **NEW!** Complete website customization
- **[📋 Quick Reference](QUICK_REFERENCE.md)** - Handy reference for common tasks
- **[🎨 Theme Guide](THEME_GUIDE.md)** - Design guidelines and branding
- **[🚀 Deployment Guide](DEPLOYMENT.md)** - Production deployment instructions
- **[✅ Project Status](PROJECT_COMPLETE.md)** - Complete project overview
- **[📝 Changelog](CHANGELOG.md)** - Version history and release notes

## 🔐 Admin Access

- **Login URL**: `/login`
- **Default Admin**: `admin@school.com` / `password123`
- **⚠️ Important**: Change default password after first login!

## 🌟 Key Features

### 🌐 Public Website
- Modern, responsive design
- Homepage with dynamic slideshow
- News & announcements
- Events calendar
- Photo gallery
- Staff directory
- Contact forms
- Document downloads
- Search functionality

### 🛠️ Admin Portal
- Complete content management system
- News & events management
- Gallery & document management
- Staff profile management
- Homepage slideshow control
- School settings & branding
- User-friendly interface

### 🎨 **NEW! Complete Customization**
- **Page Content Management** - Edit any text/image on the website
- **Theme & Design** - Customize colors, fonts, and styling
- **Menu Management** - Control navigation and footer links
- **Advanced Settings** - SEO, social media, custom code
- **No coding required** - Everything through admin interface!

## 🚀 Quick Start

1. **Login**: Go to `/login` with admin credentials
2. **Update Settings**: Admin → Settings → Update school information
3. **Add Content**: Create news, events, and gallery items
4. **Customize**: Upload logo, create hero slides, add staff profiles

## 💡 Built With Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## 🔧 Technical Details

### Requirements
- PHP 8.1 or higher
- MySQL 5.7 or higher
- Composer
- Node.js & NPM

### Technologies Used
- **Laravel 11**: PHP framework
- **Bootstrap 5**: Responsive CSS framework
- **Font Awesome**: Icons
- **MySQL**: Database
- **Vite**: Asset bundling

### Installation (For Developers)
```bash
# Clone the repository
git clone [repository-url]

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Create admin user
php artisan db:seed --class=AdminUserSeeder

# Build assets
npm run build

# Start development server
php artisan serve
```

## 📞 Support

For technical support or questions:
1. Check the documentation files above
2. Contact your website administrator
3. Review the troubleshooting section in the User Manual

## 📄 License

This project is built on Laravel, which is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

**Ready to manage your school website?** Start with the [Admin Setup Guide](ADMIN_SETUP_GUIDE.md)! 🚀

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
