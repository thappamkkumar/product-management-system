#!/bin/bash

# Laravel Deployment Script
# Automates project setup for local development.

set -e

GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

info() {
    echo -e "${YELLOW}$1${NC}"
}

success() {
    echo -e "${GREEN}$1${NC}"
}

error() {
    echo -e "${RED}$1${NC}"
}

echo

success "======================================="
success " Laravel Deployment Started"
success "======================================="
echo

info "Checking required tools..."

command -v php >/dev/null 2>&1 || { error "PHP is not installed."; exit 1; }
command -v composer >/dev/null 2>&1 || { error "Composer is not installed."; exit 1; }
command -v node >/dev/null 2>&1 || { error "Node.js is not installed."; exit 1; }
command -v npm >/dev/null 2>&1 || { error "npm is not installed."; exit 1; }

success "All required tools are available."

echo

if [ ! -f "artisan" ]; then
    error "Laravel project not found. Please run this script from the project root."
    exit 1
fi

success "Laravel project detected."

echo

info "Checking environment configuration..."

if [ ! -f ".env" ]; then

    if [ -f ".env.example" ]; then
        cp .env.example .env
        success ".env file created."
    else
        error ".env.example not found."
        exit 1
    fi

else

    success ".env file already exists."

fi

echo

info "Installing Composer dependencies..."

composer install --no-interaction --prefer-dist

success "Composer dependencies installed."

echo

info "Installing Node.js dependencies..."

npm install

success "Node.js dependencies installed."

echo

info "Checking application key..."

if ! grep -q "^APP_KEY=base64:" .env; then

    php artisan key:generate --force

    success "Application key generated."

else

    success "Application key already exists."

fi

echo

info "Running database migrations..."

php artisan migrate --force

success "Database migrations completed."

echo

info "Database seeding is optional."

read -p "Do you want to run database seeders? (y/N): " seed

if [[ "$seed" =~ ^[Yy]$ ]]; then

    info "Running database seeders..."

    php artisan db:seed --force

    success "Database seeding completed."

    echo

fi

if [ -f "package.json" ]; then

    info "Building frontend assets..."

    npm run build

    success "Frontend assets built."

    echo

fi

info "Optimizing Laravel..."

php artisan optimize:clear
php artisan optimize

success "Laravel optimized."

echo

success "======================================="
success " Deployment completed successfully!"
success " Your Laravel application is ready."
success "======================================="

echo    