<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $pageTitle = trim($__env->yieldContent('title')) ?: $site['name'] . ' - ' . $site['tagline'];
        $pageDescription = trim($__env->yieldContent('meta_description')) ?: $site['seo']['default_description'];
        $pageKeywords = trim($__env->yieldContent('meta_keywords')) ?: $site['seo']['keywords'];
        $canonicalUrl = url()->current();
        $ogImage = my_asset($site['seo']['og_image']);
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="keywords" content="{{ $pageKeywords }}">
    <meta name="author" content="{{ $site['owner'] }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:site_name" content="{{ $site['name'] }}">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">

    <!-- Local Business Schema -->
    @php
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BeautySalon',
            'name' => $site['name'],
            'description' => $site['seo']['default_description'],
            'url' => config('app.url'),
            'telephone' => $site['phone'],
            'email' => $site['email'],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $site['city'],
                'addressRegion' => $site['state'],
                'addressCountry' => 'IN',
            ],
            'founder' => [
                '@type' => 'Person',
                'name' => $site['owner'],
            ],
            'priceRange' => '₹₹',
            'image' => $ogImage,
            'sameAs' => array_values(array_filter($site['social'])),
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- GSAP Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js" defer></script>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ my_asset('assets/css/style.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="brand-mark"><i class="bi bi-gem"></i></span>
                <span class="brand-text">
                    <span class="brand-name">Makeover</span>
                    <span class="brand-sub">by Lovepreet</span>
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-book {{ request()->routeIs('booking') ? 'active' : '' }}" href="{{ route('booking') }}">Book Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5><i class="bi bi-gem"></i> Glamour by Lovepreet</h5>
                    <p>{{ $site['tagline'] }} — proudly serving {{ $site['city'] }}, {{ $site['state'] }} with artistry and care.</p>
                    <div class="social-icons">
                        @if($site['social']['facebook'])
                        <a href="{{ $site['social']['facebook'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if($site['social']['instagram'])
                        <a href="{{ $site['social']['instagram'] }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if($site['social']['whatsapp'])
                        <a href="{{ $site['social']['whatsapp'] }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                        @endif
                        @if(!empty($site['social']['youtube']))
                        <a href="{{ $site['social']['youtube'] }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('pricing') }}">Pricing</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Services</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('services') }}#bridal">Bridal Makeup</a></li>
                        <li><a href="{{ route('services') }}#nails">Nail Art & Care</a></li>
                        <li><a href="{{ route('services') }}#beauty">Beauty Treatments</a></li>
                        <li><a href="{{ route('booking') }}">Book Appointment</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Contact Info</h5>
                    <ul class="footer-contact">
                        <li><i class="bi bi-envelope"></i> <a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></li>
                        <li><i class="bi bi-telephone"></i> <a href="tel:{{ preg_replace('/\s+/', '', $site['phone']) }}">{{ $site['phone'] }}</a></li>
                        <li><i class="bi bi-whatsapp"></i> <a href="{{ $site['social']['whatsapp'] }}" target="_blank" rel="noopener">{{ $site['whatsapp'] }}</a></li>
                        <li><i class="bi bi-geo-alt"></i> {{ $site['address'] }}</li>
                    </ul>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; {{ date('Y') }} {{ $site['name'] }}. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <span>{{ $site['owner'] }} &middot; {{ $site['city'] }}, {{ $site['state'] }}</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ my_asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
