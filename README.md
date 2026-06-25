# Glamour by Lovepreet - Luxury Beauty Services Website

A modern, multi-page website for luxury makeover services including bridal makeup, nail art, and personalized beauty treatments.

## Features

- **Multi-page Website**: Home, Services, Pricing, About, and Booking pages
- **Modern Design**: Beautiful, responsive design with animations and smooth transitions
- **SMTP Email Integration**: Contact form with PHPMailer for sending appointment requests
- **Responsive Layout**: Works perfectly on all devices (desktop, tablet, mobile)
- **Bootstrap 5**: Modern CSS framework for styling
- **AOS Animations**: Scroll animations for enhanced user experience

## Pages

1. **index.html** - Homepage with hero section, features, and service previews
2. **services.html** - Detailed service descriptions
3. **pricing.html** - Complete pricing list for all services
4. **booking.html** - Appointment booking form
5. **about.html** - About us page with team information

## Setup Instructions

### 1. Install Dependencies

Make sure you have Composer installed, then run:

```bash
composer install
```

This will install PHPMailer for email functionality.

### 2. Configure SMTP Settings

Edit the `config.php` file and update the SMTP credentials:

```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_ENCRYPTION', 'tls');
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');
define('SMTP_FROM_EMAIL', 'your-email@gmail.com');
define('SMTP_FROM_NAME', 'Glamour by Lovepreet');
define('ADMIN_EMAIL', 'info@makeoverbylovepreet.com');
define('ADMIN_NAME', 'Glamour by Lovepreet');
```

### 3. Gmail Setup (If using Gmail)

1. Enable 2-Step Verification on your Google account
2. Go to [Google App Passwords](https://myaccount.google.com/apppasswords)
3. Generate an app password for "Mail"
4. Use this app password as `SMTP_PASSWORD` in config.php

### 4. Server Requirements

- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Composer for dependency management
- SMTP access (Gmail, Outlook, or custom SMTP server)

### 5. File Structure

```
makeoverzbylovepreet/
├── index.html
├── services.html
├── pricing.html
├── booking.html
├── about.html
├── contact.php
├── config.php
├── composer.json
├── vendor/ (created after composer install)
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── main.js
└── README.md
```

## Customization

### Colors

Edit CSS variables in `assets/css/style.css`:

```css
:root {
    --primary-color: #d4af37;
    --primary-dark: #b8941f;
    --secondary-color: #8b7355;
    --dark-color: #2c2c2c;
}
```

### Content

- Update service descriptions in `services.html`
- Modify pricing in `pricing.html`
- Edit contact information in footer sections
- Update business hours in `booking.html`

## Testing the Contact Form

1. Make sure SMTP settings are configured correctly
2. Fill out the booking form on `booking.html`
3. Submit the form
4. Check both admin email and client confirmation email

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## License

This project is created for Glamour by Lovepreet.

## Support

For issues or questions, please contact: info@makeoverbylovepreet.com

