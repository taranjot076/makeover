<?php
/**
 * SMTP Configuration File
 * Glamour by Lovepreet
 * 
 * IMPORTANT: Update these settings with your actual SMTP credentials
 */

// SMTP Server Configuration
define('SMTP_HOST', 'smtp.gmail.com'); // Change to your SMTP server
define('SMTP_PORT', 587); // 587 for TLS, 465 for SSL
define('SMTP_ENCRYPTION', 'tls'); // 'tls' or 'ssl'
define('SMTP_USERNAME', 'your-email@gmail.com'); // Your SMTP username/email
define('SMTP_PASSWORD', 'your-app-password'); // Your SMTP password or app password

// Email Settings
define('SMTP_FROM_EMAIL', 'your-email@gmail.com'); // Email address to send from
define('SMTP_FROM_NAME', 'Glamour by Lovepreet'); // Name to display as sender

// Admin/Recipient Email (where booking requests will be sent)
define('ADMIN_EMAIL', 'info@makeoverbylovepreet.com'); // Change to your business email
define('ADMIN_NAME', 'Glamour by Lovepreet');

// Contact Phone Numbers
define('PHONE_WHATSAPP', '+1 (555) 123-4567'); // WhatsApp number (format: +1234567890)
define('PHONE_CALL', '+1 (555) 987-6543'); // Phone number for calls

/**
 * SMTP Configuration Guide:
 * 
 * For Gmail:
 * 1. Enable 2-Step Verification on your Google account
 * 2. Generate an App Password: https://myaccount.google.com/apppasswords
 * 3. Use the app password as SMTP_PASSWORD
 * 4. Set SMTP_HOST to 'smtp.gmail.com'
 * 5. Set SMTP_PORT to 587
 * 6. Set SMTP_ENCRYPTION to 'tls'
 * 
 * For Outlook/Hotmail:
 * 1. SMTP_HOST: 'smtp-mail.outlook.com'
 * 2. SMTP_PORT: 587
 * 3. SMTP_ENCRYPTION: 'tls'
 * 
 * For Yahoo:
 * 1. SMTP_HOST: 'smtp.mail.yahoo.com'
 * 2. SMTP_PORT: 587
 * 3. SMTP_ENCRYPTION: 'tls'
 * 
 * For Custom SMTP (like SendGrid, Mailgun, etc.):
 * Use the SMTP credentials provided by your email service provider
 */

