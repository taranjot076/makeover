@extends('layouts.app')

@section('title', 'Glamour by Lovepreet - Bridal Makeup & Beauty in Ludhiana, Punjab')

@section('meta_description', 'Premium bridal makeup, nail art, and personalized beauty treatments by Lovepreet Kaur in Ludhiana, Punjab. Book your appointment today.')

@section('content')
    <!-- Hero -->
    <section class="hero-section">
        <div class="hero-bg-pattern"></div>
        <div class="hero-glow hero-glow-1"></div>
        <div class="hero-glow hero-glow-2"></div>

        <div class="container hero-container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="hero-eyebrow">
                        <span class="hero-eyebrow-line"></span>
                        <span>{{ $site['city'] }}, {{ $site['state'] }}</span>
                    </div>
                    <h1 class="hero-title">
                        Redefine Your
                        <em>Natural Beauty</em>
                    </h1>
                    <p class="hero-lead">
                        Bridal makeup, nail art & personalized beauty treatments by
                        <strong>{{ $site['owner'] }}</strong> — crafted with artistry, premium products, and care.
                    </p>
                    <div class="hero-actions">
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-calendar-check"></i> Book Appointment
                        </a>
                        <a href="{{ route('services') }}" class="btn btn-ghost btn-lg">
                            View Services <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="hero-stats">
                        @foreach($site['stats'] as $stat)
                        <div class="hero-stat">
                            <span class="hero-stat-value">{{ $stat['value'] }}</span>
                            <span class="hero-stat-label">{{ $stat['label'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
                    <div class="hero-visual">
                        <div class="hero-visual-frame">
                            <div class="hero-visual-inner">
                                <div class="hero-visual-icon"><i class="bi bi-gem"></i></div>
                                <p class="hero-visual-tagline">{{ $site['tagline'] }}</p>
                                <span class="hero-visual-by">by {{ $site['owner'] }}</span>
                            </div>
                        </div>
                        <div class="hero-chip hero-chip-1">
                            <i class="bi bi-heart-fill"></i>
                            <div>
                                <strong>Bridal Makeup</strong>
                                <span>Your perfect wedding look</span>
                            </div>
                        </div>
                        <div class="hero-chip hero-chip-2">
                            <i class="bi bi-brush-fill"></i>
                            <div>
                                <strong>Nail Art</strong>
                                <span>Stunning custom designs</span>
                            </div>
                        </div>
                        <div class="hero-chip hero-chip-3">
                            <i class="bi bi-stars"></i>
                            <div>
                                <strong>Beauty Treatments</strong>
                                <span>Personalized care</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-marquee">
            <div class="hero-marquee-track">
                <span>Bridal Makeup</span><span class="dot">✦</span>
                <span>Nail Art</span><span class="dot">✦</span>
                <span>Party Glam</span><span class="dot">✦</span>
                <span>Hair Styling</span><span class="dot">✦</span>
                <span>Facial Treatments</span><span class="dot">✦</span>
                <span>Ludhiana, Punjab</span><span class="dot">✦</span>
                <span>Bridal Makeup</span><span class="dot">✦</span>
                <span>Nail Art</span><span class="dot">✦</span>
                <span>Party Glam</span><span class="dot">✦</span>
                <span>Hair Styling</span><span class="dot">✦</span>
                <span>Facial Treatments</span><span class="dot">✦</span>
                <span>Ludhiana, Punjab</span><span class="dot">✦</span>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="section section-cream">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-label">Why Choose Us</span>
                <h2 class="section-title">The Art of Beautiful</h2>
                <p class="section-desc">Every detail matters. We blend skill, premium products, and personal attention for results you'll love.</p>
            </div>
            <div class="row g-4">
                @foreach([
                    ['icon' => 'bi-award', 'title' => 'Expert Artistry', 'text' => 'Years of experience in bridal and occasion makeup with flawless, photo-ready finishes.'],
                    ['icon' => 'bi-droplet-half', 'title' => 'Premium Products', 'text' => 'Only trusted, high-quality cosmetics and skincare from leading international brands.'],
                    ['icon' => 'bi-flower1', 'title' => 'Personal Touch', 'text' => 'Every look is tailored to your features, outfit, and vision for your special day.'],
                ] as $i => $feature)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="feature-box">
                        <div class="feature-box-icon"><i class="bi {{ $feature['icon'] }}"></i></div>
                        <h4>{{ $feature['title'] }}</h4>
                        <p>{{ $feature['text'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-label">Our Services</span>
                <h2 class="section-title">What We Offer</h2>
                <p class="section-desc">From your wedding day to everyday elegance — discover our signature services.</p>
            </div>
            <div class="row g-4">
                @foreach([
                    ['num' => '01', 'icon' => 'bi-heart-fill', 'title' => 'Bridal Makeup', 'text' => 'Look breathtaking on the most important day of your life with HD, long-lasting bridal artistry.', 'link' => route('services') . '#bridal', 'class' => 'svc-bridal'],
                    ['num' => '02', 'icon' => 'bi-brush-fill', 'title' => 'Nail Art & Care', 'text' => 'Express yourself with elegant manicures, gel finishes, and creative nail art designs.', 'link' => route('services') . '#nails', 'class' => 'svc-nails'],
                    ['num' => '03', 'icon' => 'bi-stars', 'title' => 'Beauty Treatments', 'text' => 'Facials, party makeup, hair styling and more — customized to your unique style.', 'link' => route('services') . '#beauty', 'class' => 'svc-beauty'],
                ] as $i => $svc)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <article class="service-card {{ $svc['class'] }}">
                        <div class="service-card-visual">
                            <span class="service-card-num">{{ $svc['num'] }}</span>
                            <i class="bi {{ $svc['icon'] }} service-card-icon"></i>
                        </div>
                        <div class="service-card-body">
                            <h3>{{ $svc['title'] }}</h3>
                            <p>{{ $svc['text'] }}</p>
                            <a href="{{ $svc['link'] }}" class="service-card-link">
                                Explore <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('services') }}" class="btn btn-outline btn-lg">View All Services</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section section-wine">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-label section-label-light">Testimonials</span>
                <h2 class="section-title text-white">Loved by Our Clients</h2>
            </div>
            <div class="row g-4">
                @foreach($testimonials as $i => $testimonial)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="testimonial-box">
                        <div class="testimonial-quote"><i class="bi bi-quote"></i></div>
                        <div class="testimonial-stars">
                            @for($s = 0; $s < $testimonial['rating']; $s++)
                            <i class="bi bi-star-fill"></i>
                            @endfor
                        </div>
                        <p>"{{ $testimonial['text'] }}"</p>
                        <footer>
                            <strong>{{ $testimonial['name'] }}</strong>
                            <span>{{ $testimonial['service'] }}</span>
                        </footer>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section class="section portfolio-section">
        <div class="container">
            <div class="portfolio-header" data-aos="fade-up">
                <div class="portfolio-header-text">
                    <span class="section-label">Portfolio</span>
                    <h2 class="section-title">Our Work</h2>
                    <p class="section-desc mb-0">Transformations crafted for brides and beauty lovers across Ludhiana.</p>
                </div>
                <a href="{{ route('gallery') }}" class="btn btn-outline portfolio-header-btn">
                    View Full Gallery <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="portfolio-grid" data-aos="fade-up" data-aos-delay="100">
                @foreach($galleryPreview as $index => $item)
                @if($item['type'] === 'image' || $item['type'] === 'video')
                <a href="{{ route('gallery') }}"
                   class="portfolio-item portfolio-item-{{ $index + 1 }} portfolio-cat-{{ $item['category'] }}"
                   aria-label="{{ $item['title'] }}">
                    <div class="portfolio-item-media">
                        <img src="{{ gallery_image($item) }}"
                             alt="{{ $item['alt'] ?? $item['title'] }}"
                             loading="lazy">
                    </div>
                    <div class="portfolio-item-content">
                        <span class="portfolio-cat-badge">{{ ucfirst($item['category']) }}</span>
                        <h3>{{ $item['title'] }}</h3>
                        @if($item['type'] === 'video')
                        <span class="portfolio-play"><i class="bi bi-play-fill"></i></span>
                        @endif
                    </div>
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section cta-banner">
        <div class="container">
            <div class="cta-inner" data-aos="zoom-in">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="section-label section-label-light">Ready?</span>
                        <h2>Your Transformation Awaits</h2>
                        <p>Book a session with {{ $site['owner'] }} and experience beauty services designed just for you.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('booking') }}" class="btn btn-white btn-lg">
                            <i class="bi bi-calendar-check"></i> Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
