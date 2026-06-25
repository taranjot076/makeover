# Quick Setup Guide

## Step 1: Install PHP Dependencies

Open your terminal/command prompt in the project directory and run:

```bash
composer install
```

If you don't have Composer installed, download it from: https://getcomposer.org/

## Step 2: Configure SMTP Settings

1. Copy `config.php.example` to `config.php`:
   ```bash
   copy config.php.example config.php
   ```
   (On Windows PowerShell, use: `Copy-Item config.php.example config.php`)

2. Open `config.php` and update with your SMTP credentials:

### For Gmail:
```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_ENCRYPTION', 'tls');
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password'); // Use App Password, not regular password
define('SMTP_FROM_EMAIL', 'your-email@gmail.com');
define('SMTP_FROM_NAME', 'Lovepreet');
define('ADMIN_EMAIL', 'info@makeoverbylovepreet.com');
define('ADMIN_NAME', 'Lovepreet');
```

**To get Gmail App Password:**
1. Go to your Google Account settings
2. Enable 2-Step Verification
3. Go to: https://myaccount.google.com/apppasswords
4. Generate an app password for "Mail"
5. Use this password in config.php

### For Other Email Providers:

**Outlook/Hotmail:**
- SMTP_HOST: `smtp-mail.outlook.com`
- SMTP_PORT: `587`
- SMTP_ENCRYPTION: `tls`

**Yahoo:**
- SMTP_HOST: `smtp.mail.yahoo.com`
- SMTP_PORT: `587`
- SMTP_ENCRYPTION: `tls`

## Step 3: Test Your Setup

1. Make sure your web server (WAMP/XAMPP) is running
2. Open `http://localhost/makeoverzbylovepreet/` in your browser
3. Navigate to the Booking page
4. Fill out the form and submit
5. Check your email (both admin and client confirmation emails)

## Step 4: Customize Content

- Update business information in all HTML files (footer sections)
- Modify service descriptions in `services.html`
- Adjust pricing in `pricing.html`
- Update contact details throughout the site
- Change colors in `assets/css/style.css` if desired

## Troubleshooting

### Email Not Sending?
1. Check SMTP credentials in `config.php`
2. Verify SMTP server settings are correct
3. For Gmail, make sure you're using an App Password, not your regular password
4. Check PHP error logs
5. Enable debug mode in `contact.php` (uncomment `$mail->SMTPDebug = 2;`)

### Composer Issues?
- Make sure PHP is in your system PATH
- Try: `php composer.phar install` instead
- Check PHP version: `php -v` (needs 7.4+)

### Form Not Submitting?
- Make sure `contact.php` is accessible
- Check browser console for JavaScript errors
- Verify PHP is properly configured on your server

## Need Help?

Contact: info@makeoverbylovepreet.com

