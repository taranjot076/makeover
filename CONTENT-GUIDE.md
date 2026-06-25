# Content Management Guide

This website is built to be **easy to update** without editing HTML or page templates.

## Quick Reference

| What to change | Where to edit |
|---|---|
| Business name, owner, location, phone | `config/site.php` |
| Social media links | `config/site.php` → `social` |
| Business hours | `config/site.php` → `hours` |
| Stats (homepage & about) | `config/site.php` → `stats` |
| Client testimonials | `config/site.php` → `testimonials` |
| Gallery images/videos/audio | `config/site.php` → `gallery` |
| Services & pricing | `config/services.php` |
| Email / SMTP settings | `.env` file |

---

## Adding / Removing Services

Edit **`config/services.php`**. Each service has:

```php
[
    'name' => 'Service Name',
    'image' => 'filename.jpg',       // optional — place in public/images/services/
    'price' => 5000,                 // INR
    'description' => '...',
    'features' => ['Feature 1', 'Feature 2'],
    'duration' => '2 hours',
    'popular' => false,              // true = "Popular" badge
],
```

- **Add a service:** Copy an existing entry and change the values.
- **Remove a service:** Delete the array block.
- **Reorder:** Move entries up or down in the array.

---

## Adding / Removing Gallery Items

Edit **`config/site.php`** → `gallery` array.

### Images
1. Upload image to `public/images/gallery/`
2. Add entry:
```php
[
    'type' => 'image',
    'title' => 'My Photo Title',
    'category' => 'bridal',  // bridal | nails | beauty
    'src' => 'images/gallery/my-photo.jpg',
    'alt' => 'SEO description of image',
],
```

### Videos
```php
[
    'type' => 'video',
    'title' => 'Bridal Video',
    'category' => 'bridal',
    'src' => 'https://www.youtube.com/embed/VIDEO_ID',
    'thumbnail' => 'images/gallery/video-thumb.jpg',  // optional
    'alt' => 'Video description',
],
```

### Audio
1. Upload file to `public/audio/`
2. Add entry:
```php
[
    'type' => 'audio',
    'title' => 'Client Testimonial Audio',
    'category' => 'beauty',
    'src' => 'audio/testimonial.mp3',
],
```

---

## Adding Service Images

1. Save image as JPG/PNG/WebP in `public/images/services/`
2. Set the `image` key in `config/services.php` to match the filename

If no image file exists, a styled placeholder is shown automatically.

---

## Contact & Booking Forms

Forms are handled by Laravel at `POST /contact`. To add or remove form fields:

1. Edit `resources/views/booking.blade.php` or `resources/views/contact.blade.php`
2. Update validation in `app/Http/Controllers/ContactController.php`
3. Update email templates in `resources/views/emails/`

---

## Pages

| Page | URL | Template |
|---|---|---|
| Home | `/` | `resources/views/index.blade.php` |
| Services | `/services` | `resources/views/services.blade.php` |
| Pricing | `/pricing` | `resources/views/pricing.blade.php` |
| Gallery | `/gallery` | `resources/views/gallery.blade.php` |
| About | `/about` | `resources/views/about.blade.php` |
| Contact | `/contact` | `resources/views/contact.blade.php` |
| Booking | `/booking` | `resources/views/booking.blade.php` |

---

## Running Locally (WAMP)

1. Point browser to `http://localhost/makeoverzbylovepreet`
2. Ensure `composer install` has been run
3. Set `APP_ENV=local` in `.env` for local development
4. Configure mail settings in `.env` for booking form emails
