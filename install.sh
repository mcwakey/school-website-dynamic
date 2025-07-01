#!/bin/bash

# Ghana Primary School Application - Linux Installation Script
# Bash script for Linux/macOS deployment

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color

# Default values
DEVELOPMENT=false
PRODUCTION=false
SKIP_DEPENDENCIES=false
DATABASE_NAME="ghana_primary_school"
DATABASE_USER="root"
DATABASE_PASSWORD=""
APP_URL="http://localhost:8000"
INSTALL_MYSQL=false
INSTALL_NGINX=false

# Function to print colored output
print_color() {
    printf "${1}${2}${NC}\n"
}

# Function to print section headers
print_header() {
    echo ""
    print_color $GREEN "==========================================="
    print_color $GREEN "$1"
    print_color $GREEN "==========================================="
    echo ""
}

# Function to check if command exists
command_exists() {
    command -v "$1" >/dev/null 2>&1
}

# Function to detect OS
detect_os() {
    if [[ "$OSTYPE" == "linux-gnu"* ]]; then
        if command_exists apt-get; then
            OS="ubuntu"
        elif command_exists yum; then
            OS="centos"
        elif command_exists dnf; then
            OS="fedora"
        else
            OS="linux"
        fi
    elif [[ "$OSTYPE" == "darwin"* ]]; then
        OS="macos"
    else
        OS="unknown"
    fi
}

# Function to install dependencies on Ubuntu/Debian
install_dependencies_ubuntu() {
    print_color $YELLOW "Installing dependencies for Ubuntu/Debian..."

    sudo apt-get update

    # Install PHP 8.2
    if ! command_exists php; then
        sudo apt-get install -y software-properties-common
        sudo add-apt-repository ppa:ondrej/php -y
        sudo apt-get update
        sudo apt-get install -y php8.2 php8.2-cli php8.2-fpm php8.2-mysql php8.2-xml php8.2-curl php8.2-mbstring php8.2-zip php8.2-gd php8.2-intl php8.2-bcmath
    fi

    # Install Composer
    if ! command_exists composer; then
        curl -sS https://getcomposer.org/installer | php
        sudo mv composer.phar /usr/local/bin/composer
        sudo chmod +x /usr/local/bin/composer
    fi

    # Install Node.js
    if ! command_exists node; then
        curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
        sudo apt-get install -y nodejs
    fi

    # Install MySQL if requested
    if [[ "$INSTALL_MYSQL" == true ]]; then
        sudo apt-get install -y mysql-server mysql-client
        sudo systemctl start mysql
        sudo systemctl enable mysql
    fi

    # Install Nginx if requested
    if [[ "$INSTALL_NGINX" == true ]]; then
        sudo apt-get install -y nginx
        sudo systemctl start nginx
        sudo systemctl enable nginx
    fi

    # Install other dependencies
    sudo apt-get install -y git curl unzip
}

# Function to install dependencies on CentOS/RHEL
install_dependencies_centos() {
    print_color $YELLOW "Installing dependencies for CentOS/RHEL..."

    # Install EPEL repository
    sudo yum install -y epel-release

    # Install Remi repository for PHP 8.2
    sudo yum install -y https://rpms.remirepo.net/enterprise/remi-release-7.rpm
    sudo yum-config-manager --enable remi-php82

    # Install PHP 8.2
    if ! command_exists php; then
        sudo yum install -y php php-cli php-fpm php-mysql php-xml php-curl php-mbstring php-zip php-gd php-intl php-bcmath
    fi

    # Install Composer
    if ! command_exists composer; then
        curl -sS https://getcomposer.org/installer | php
        sudo mv composer.phar /usr/local/bin/composer
        sudo chmod +x /usr/local/bin/composer
    fi

    # Install Node.js
    if ! command_exists node; then
        curl -fsSL https://rpm.nodesource.com/setup_20.x | sudo bash -
        sudo yum install -y nodejs
    fi

    # Install MySQL if requested
    if [[ "$INSTALL_MYSQL" == true ]]; then
        sudo yum install -y mysql-server mysql
        sudo systemctl start mysqld
        sudo systemctl enable mysqld
    fi

    # Install Nginx if requested
    if [[ "$INSTALL_NGINX" == true ]]; then
        sudo yum install -y nginx
        sudo systemctl start nginx
        sudo systemctl enable nginx
    fi

    # Install other dependencies
    sudo yum install -y git curl unzip
}

# Function to install dependencies on macOS
install_dependencies_macos() {
    print_color $YELLOW "Installing dependencies for macOS..."

    # Install Homebrew if not present
    if ! command_exists brew; then
        /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
    fi

    # Install PHP 8.2
    if ! command_exists php; then
        brew install php@8.2
        brew link php@8.2 --force
    fi

    # Install Composer
    if ! command_exists composer; then
        brew install composer
    fi

    # Install Node.js
    if ! command_exists node; then
        brew install node
    fi

    # Install MySQL if requested
    if [[ "$INSTALL_MYSQL" == true ]]; then
        brew install mysql
        brew services start mysql
    fi

    # Install Nginx if requested
    if [[ "$INSTALL_NGINX" == true ]]; then
        brew install nginx
        brew services start nginx
    fi
}

# Function to setup environment
setup_environment() {
    print_color $YELLOW "Setting up environment..."

    # Copy environment file
    if [[ ! -f ".env" ]]; then
        cp .env.example .env
        print_color $GREEN "Environment file created from example."
    fi

    # Generate application key
    print_color $YELLOW "Generating application key..."
    php artisan key:generate

    # Update environment variables
    sed -i.bak "s|^APP_URL=.*|APP_URL=$APP_URL|" .env
    sed -i.bak "s|^DB_DATABASE=.*|DB_DATABASE=$DATABASE_NAME|" .env
    sed -i.bak "s|^DB_USERNAME=.*|DB_USERNAME=$DATABASE_USER|" .env
    sed -i.bak "s|^DB_PASSWORD=.*|DB_PASSWORD=$DATABASE_PASSWORD|" .env

    if [[ "$PRODUCTION" == true ]]; then
        sed -i.bak "s|^APP_ENV=.*|APP_ENV=production|" .env
        sed -i.bak "s|^APP_DEBUG=.*|APP_DEBUG=false|" .env
    else
        sed -i.bak "s|^APP_ENV=.*|APP_ENV=local|" .env
        sed -i.bak "s|^APP_DEBUG=.*|APP_DEBUG=true|" .env
    fi

    # Remove backup file
    rm -f .env.bak

    print_color $GREEN "Environment configured successfully!"
}

# Function to install PHP dependencies
install_php_dependencies() {
    print_color $YELLOW "Installing PHP dependencies..."

    if [[ "$PRODUCTION" == true ]]; then
        composer install --optimize-autoloader --no-dev
    else
        composer install
    fi

    print_color $GREEN "PHP dependencies installed successfully!"
}

# Function to install Node.js dependencies
install_node_dependencies() {
    print_color $YELLOW "Installing Node.js dependencies..."
    npm install

    if [[ "$PRODUCTION" == true ]]; then
        print_color $YELLOW "Building assets for production..."
        npm run build
    else
        print_color $YELLOW "Building assets for development..."
        npm run build
    fi

    print_color $GREEN "Node.js dependencies installed successfully!"
}

# Function to setup database
setup_database() {
    print_color $YELLOW "Setting up database..."

    # Create database if it doesn't exist
    if [[ -n "$DATABASE_PASSWORD" ]]; then
        mysql -u "$DATABASE_USER" -p"$DATABASE_PASSWORD" -e "CREATE DATABASE IF NOT EXISTS $DATABASE_NAME;" 2>/dev/null || true
    else
        mysql -u "$DATABASE_USER" -e "CREATE DATABASE IF NOT EXISTS $DATABASE_NAME;" 2>/dev/null || true
    fi

    # Run migrations
    print_color $YELLOW "Running database migrations..."
    php artisan migrate --force

    # Seed database
    read -p "Seed database with sample data? (y/n): " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        php artisan db:seed
    fi

    print_color $GREEN "Database setup completed!"
}

# Function to set permissions
set_permissions() {
    print_color $YELLOW "Setting file permissions..."

    # Set permissions for storage and cache
    chmod -R 775 storage
    chmod -R 775 bootstrap/cache

    # Set ownership (if running as root)
    if [[ $EUID -eq 0 ]]; then
        chown -R www-data:www-data storage
        chown -R www-data:www-data bootstrap/cache
    fi

    print_color $GREEN "File permissions set successfully!"
}

# Function to optimize application
optimize_application() {
    if [[ "$PRODUCTION" == true ]]; then
        print_color $YELLOW "Optimizing application for production..."

        php artisan config:cache
        php artisan route:cache
        php artisan view:cache
        php artisan event:cache

        print_color $GREEN "Application optimized for production!"
    fi
}

# Function to setup Nginx (if requested)
setup_nginx() {
    if [[ "$INSTALL_NGINX" == true ]]; then
        print_color $YELLOW "Setting up Nginx configuration..."

        NGINX_CONFIG="/etc/nginx/sites-available/ghana-primary-school"
        NGINX_ENABLED="/etc/nginx/sites-enabled/ghana-primary-school"

        # Create Nginx configuration
        sudo tee $NGINX_CONFIG > /dev/null <<EOF
server {
    listen 80;
    server_name localhost;
    root $(pwd)/public;
    index index.php index.html index.htm;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    location ~* \.(jpg|jpeg|png|gif|ico|css|js)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
EOF

        # Enable site
        sudo ln -sf $NGINX_CONFIG $NGINX_ENABLED

        # Remove default site
        sudo rm -f /etc/nginx/sites-enabled/default

        # Test and reload Nginx
        sudo nginx -t && sudo systemctl reload nginx

        print_color $GREEN "Nginx configured successfully!"
    fi
}

# Function to start development server
start_dev_server() {
    if [[ "$PRODUCTION" == false ]]; then
        read -p "Start development server? (y/n): " -n 1 -r
        echo
        if [[ $REPLY =~ ^[Yy]$ ]]; then
            print_color $GREEN "Starting development server at $APP_URL..."
            print_color $YELLOW "Press Ctrl+C to stop the server."
            php artisan serve --host=0.0.0.0 --port=8000
        fi
    fi
}

# Function to display usage
usage() {
    echo "Usage: $0 [OPTIONS]"
    echo ""
    echo "Options:"
    echo "  -d, --development         Install for development environment"
    echo "  -p, --production          Install for production environment"
    echo "  -s, --skip-dependencies   Skip system dependencies installation"
    echo "  --database-name NAME      Database name (default: ghana_primary_school)"
    echo "  --database-user USER      Database user (default: root)"
    echo "  --database-password PASS  Database password (default: empty)"
    echo "  --app-url URL             Application URL (default: http://localhost:8000)"
    echo "  --install-mysql           Install MySQL server"
    echo "  --install-nginx           Install and configure Nginx"
    echo "  -h, --help                Show this help message"
    echo ""
    echo "Examples:"
    echo "  $0 --development                           # Development install"
    echo "  $0 --production --install-mysql --install-nginx  # Production install with MySQL and Nginx"
    echo "  $0 --development --database-password=secret      # Development with database password"
}

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        -d|--development)
            DEVELOPMENT=true
            shift
            ;;
        -p|--production)
            PRODUCTION=true
            shift
            ;;
        -s|--skip-dependencies)
            SKIP_DEPENDENCIES=true
            shift
            ;;
        --database-name)
            DATABASE_NAME="$2"
            shift 2
            ;;
        --database-user)
            DATABASE_USER="$2"
            shift 2
            ;;
        --database-password)
            DATABASE_PASSWORD="$2"
            shift 2
            ;;
        --app-url)
            APP_URL="$2"
            shift 2
            ;;
        --install-mysql)
            INSTALL_MYSQL=true
            shift
            ;;
        --install-nginx)
            INSTALL_NGINX=true
            shift
            ;;
        -h|--help)
            usage
            exit 0
            ;;
        *)
            echo "Unknown option: $1"
            usage
            exit 1
            ;;
    esac
done

# Main installation process
main() {
    print_header "Ghana Primary School Application Installer"

    # Check if we're in the right directory
    if [[ ! -f "artisan" ]]; then
        print_color $RED "Error: artisan file not found. Please run this script from the Laravel project root directory."
        exit 1
    fi

    # Detect OS
    detect_os
    print_color $CYAN "Detected OS: $OS"

    # Set defaults if no environment specified
    if [[ "$DEVELOPMENT" == false && "$PRODUCTION" == false ]]; then
        DEVELOPMENT=true
        print_color $YELLOW "No environment specified, defaulting to development."
    fi

    # Install dependencies if not skipped
    if [[ "$SKIP_DEPENDENCIES" == false ]]; then
        case $OS in
            ubuntu)
                install_dependencies_ubuntu
                ;;
            centos|fedora)
                install_dependencies_centos
                ;;
            macos)
                install_dependencies_macos
                ;;
            *)
                print_color $YELLOW "Unknown OS. Please install dependencies manually:"
                print_color $YELLOW "- PHP 8.2+"
                print_color $YELLOW "- Composer"
                print_color $YELLOW "- Node.js 18+"
                print_color $YELLOW "- MySQL (optional)"
                read -p "Continue with installation? (y/n): " -n 1 -r
                echo
                if [[ ! $REPLY =~ ^[Yy]$ ]]; then
                    exit 1
                fi
                ;;
        esac
    fi

    # Setup environment
    setup_environment

    # Install PHP dependencies
    install_php_dependencies

    # Install Node.js dependencies
    install_node_dependencies

    # Setup database
    setup_database

    # Set permissions
    set_permissions

    # Optimize for production
    optimize_application

    # Setup Nginx if requested
    setup_nginx

    print_header "Installation completed successfully!"

    print_color $CYAN "Application URL: $APP_URL"
    print_color $CYAN "Admin Panel: $APP_URL/admin"
    echo ""
    print_color $YELLOW "Default admin credentials:"
    print_color $WHITE "Email: admin@example.com"
    print_color $WHITE "Password: password"
    echo ""
    print_color $RED "Please change the default credentials after first login!"
    echo ""

    # Start development server
    start_dev_server
}

# Run main function
main
