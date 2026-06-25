@extends('layouts.app')

@section('title', 'About Lovepreet Kaur - Bridal Makeup Artist in Ludhiana, Punjab')

@section('meta_description', 'Meet Lovepreet Kaur, founder of Glamour by Lovepreet — a trusted bridal makeup artist and beauty specialist serving Ludhiana, Punjab.')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="col-12 text-center" data-aos="fade-up">
                <h1>About Us</h1>
                    <p class="breadcrumb">
                        <a href="{{ route('home') }}">Home</a> / <span>About</span>
                    </p>
            </div>
        </div>
    </section>

    <section class="section about-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-image"></div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="section-label">Our Story</span>
                    <h2 class="section-title text-start">Welcome to {{ $site['name'] }}</h2>
                    <p class="lead">Based in {{ $site['city'] }}, {{ $site['state'] }}, we are passionate about bringing out the natural beauty in every client — creating stunning transformations that boost confidence and celebrate individuality.</p>
                    <p>Founded by {{ $site['owner'] }}, {{ $site['name'] }} has become a trusted name in bridal makeup, nail art, and personalized beauty treatments across Punjab. We combine years of experience with the latest techniques and premium products to deliver exceptional results.</p>
                    <p>We believe beauty is not just about looking good — it's about feeling confident, radiant, and truly yourself. Every service is tailored to enhance your unique features and match your personal style.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Values</span>
                <h2 class="section-title">What Sets Us Apart</h2>
            </div>
            <div class="row g-4">
                @foreach([
                    ['icon' => 'bi-heart-fill', 'title' => 'Passion', 'text' => 'We love what we do and it shows in every detail of our work.'],
                    ['icon' => 'bi-award-fill', 'title' => 'Excellence', 'text' => 'We strive for perfection in every service we provide.'],
                    ['icon' => 'bi-people-fill', 'title' => 'Personalized', 'text' => 'Every client receives customized attention and care.'],
                    ['icon' => 'bi-shield-check-fill', 'title' => 'Trust', 'text' => 'We use only premium, safe products you can trust.'],
                ] as $i => $value)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($i + 1) * 100 }}">
                    <div class="value-card">
                        <i class="bi {{ $value['icon'] }}"></i>
                        <h4>{{ $value['title'] }}</h4>
                        <p>{{ $value['text'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Meet the Artist</span>
                <h2 class="section-title">{{ $site['owner'] }}</h2>
                <p class="section-subtitle">{{ $site['owner_title'] }} &middot; {{ $site['city'] }}, {{ $site['state'] }}</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <div class="team-card">
                        <div class="team-image"></div>
                        <div class="team-content">
                            <h3>{{ $site['owner'] }}</h3>
                            <p class="team-role">{{ $site['owner_title'] }}</p>
                            <p>With years of experience in the beauty industry, {{ $site['owner'] }} has mastered the art of creating stunning looks that enhance natural beauty. Specializing in bridal makeup, nail art, and beauty transformations, she has helped hundreds of clients look and feel their absolute best on their special days.</p>
                            <p>Her passion for beauty, attention to detail, and commitment to using only the finest products has made {{ $site['name'] }} a sought-after destination for brides and beauty lovers across {{ $site['state'] }}.</p>
                            <div class="team-social">
                                @if($site['social']['instagram'])
                                <a href="{{ $site['social']['instagram'] }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                                @endif
                                @if($site['social']['facebook'])
                                <a href="{{ $site['social']['facebook'] }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                @endif
                                <a href="mailto:{{ $site['email'] }}" aria-label="Email"><i class="bi bi-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section stats-section">
        <div class="container">
            <div class="row g-4">
                @foreach($site['stats'] as $i => $stat)
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ ($i + 1) * 100 }}">
                    <div class="stat-card">
                        <div class="stat-number">{{ $stat['value'] }}</div>
                        <div class="stat-label">{{ $stat['label'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section cta-section">
        <div class="container">
            <div class="cta-box" data-aos="zoom-in">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2>Ready to Experience Our Services?</h2>
                        <p>Book your appointment today and let {{ $site['owner'] }} bring out your most radiant self.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('booking') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-calendar-check"></i> Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
