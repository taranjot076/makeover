# Glamour by Lovepreet - Laravel Application

This project has been converted to Laravel framework.

## Setup Instructions

### 1. Install Dependencies

```bash
composer install
```

### 2. Environment Configuration

Copy `.env.example` to `.env`:

```bash
copy .env.example .env
```

Or on Linux/Mac:
```bash
cp .env.example .env
```

### 3. Generate Application Key

```bash
php artisan key:generate
```

### 4. Configure Email Settings

Edit the `.env` file and update the mail settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Glamour by Lovepreet"

ADMIN_EMAIL=info@makeoverbylovepreet.com
ADMIN_NAME="Lovepreet"
PHONE_WHATSAPP=+1 (555) 123-4567
PHONE_CALL=+1 (555) 987-6543
```

### 5. Gmail Setup (If using Gmail)

1. Enable 2-Step Verification on your Google account
2. Go to [Google App Passwords](https://myaccount.google.com/apppasswords)
3. Generate an app password for "Mail"
4. Use this app password as `MAIL_PASSWORD` in `.env`

### 6. Web Server Configuration

#### For Apache (WAMP/XAMPP):

Create a `.htaccess` file in the root directory:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

Point your web server document root to the `public` directory.

#### For Nginx:

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/makeoverzbylovepreet/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 7. Set Permissions (Linux/Mac)

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## Routes

- `/` - Home page
- `/services` - Services page
- `/pricing` - Pricing page
- `/about` - About page
- `/booking` - Booking form page
- `/contact` - POST endpoint for booking form submission

## Project Structure

```
makeoverzbylovepreet/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── ContactController.php
│           └── PageController.php
├── config/
│   ├── app.php
│   └── mail.php
├── public/
│   ├── assets/
│   │   ├── css/
│   │   └── js/
│   └── index.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── emails/
│       │   ├── booking-admin.blade.php
│       │   └── booking-confirmation.blade.php
│       ├── about.blade.php
│       ├── booking.blade.php
│       ├── index.blade.php
│       ├── pricing.blade.php
│       └── services.blade.php
├── routes/
│   └── web.php
└── .env
```

## Testing

1. Make sure your web server is running
2. Access the application at `http://localhost/makeoverzbylovepreet/public/` or configure your virtual host
3. Navigate to the Booking page
4. Fill out the form and submit
5. Check your email (both admin and client confirmation emails)

## Migration from Old Project

The following files have been removed:
- `index.html` → `resources/views/index.blade.php`
- `about.html` → `resources/views/about.blade.php`
- `services.html` → `resources/views/services.blade.php`
- `pricing.html` → `resources/views/pricing.blade.php`
- `booking.html` → `resources/views/booking.blade.php`
- `contact.php` → `app/Http/Controllers/ContactController.php`
- `config.php` → `.env` (email settings)

Assets have been moved to `public/assets/`.

## Support

For issues or questions, please contact: info@makeoverbylovepreet.com

