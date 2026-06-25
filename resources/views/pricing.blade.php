@extends('layouts.app')

@section('title', 'Pricing - Bridal Makeup & Beauty Services | Ludhiana')

@section('meta_description', 'Transparent pricing for bridal makeup, nail art, and beauty treatments at Glamour by Lovepreet, Ludhiana. All prices in INR.')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="text-3d">Our Pricing</h1>
                    <p class="breadcrumb">
                        <a href="{{ route('home') }}">Home</a> / <span>Pricing</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="section pricing-section">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-tag">Transparent Pricing</span>
                <h2 class="section-title">Choose Your Perfect Package</h2>
                <p class="section-subtitle">All prices are inclusive of premium products and expert service. Contact us for custom packages.</p>
            </div>

            <!-- Bridal Makeup Pricing -->
            <div class="pricing-category mb-5">
                <div class="category-header">
                    <i class="bi bi-heart-fill"></i>
                    <h3>Bridal Makeup Packages</h3>
                </div>
                <div class="row g-4">
                    @foreach($services['bridal'] as $index => $service)
                    <div class="col-md-6 col-lg-4">
                        <div id="service-bridal-{{ $index }}" class="price-card card-3d {{ $service['popular'] ? 'featured' : '' }} {{ isset($selectedService) && $selectedService === 'bridal-' . $index ? 'selected-service' : '' }}">
                            @if($service['popular'])
                            <div class="popular-badge">Most Popular</div>
                            @endif
                            <div class="price-header">
                                <h4>{{ $service['name'] }}</h4>
                                <div class="price-amount">{{ format_price($service['price']) }}</div>
                            </div>
                            <ul class="price-features">
                                @foreach($service['features'] as $feature)
                                <li><i class="bi bi-check"></i> {{ $feature }}</li>
                                @endforeach
                            </ul>
                            <div class="service-duration mb-3"><i class="bi bi-clock"></i> {{ $service['duration'] }}</div>
                            <a href="{{ route('booking') }}" class="btn {{ $service['popular'] ? 'btn-primary' : 'btn-outline-primary' }} w-100">Book Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Nail Services Pricing -->
            <div class="pricing-category mb-5">
                <div class="category-header">
                    <i class="bi bi-hand-index-fill"></i>
                    <h3>Nail Services</h3>
                </div>
                <div class="row g-4">
                    @foreach($services['nails'] as $index => $service)
                    <div class="col-md-6 col-lg-4">
                        <div id="service-nails-{{ $index }}" class="price-card card-3d {{ $service['popular'] ? 'featured' : '' }} {{ isset($selectedService) && $selectedService === 'nails-' . $index ? 'selected-service' : '' }}">
                            @if($service['popular'])
                            <div class="popular-badge">Most Popular</div>
                            @endif
                            <div class="price-header">
                                <h4>{{ $service['name'] }}</h4>
                                <div class="price-amount">{{ format_price($service['price']) }}{{ str_contains($service['name'], 'Nail Art') ? '+' : '' }}</div>
                            </div>
                            <ul class="price-features">
                                @foreach($service['features'] as $feature)
                                <li><i class="bi bi-check"></i> {{ $feature }}</li>
                                @endforeach
                            </ul>
                            <div class="service-duration mb-3"><i class="bi bi-clock"></i> {{ $service['duration'] }}</div>
                            <a href="{{ route('booking') }}" class="btn {{ $service['popular'] ? 'btn-primary' : 'btn-outline-primary' }} w-100">Book Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Beauty Treatments Pricing -->
            <div class="pricing-category">
                <div class="category-header">
                    <i class="bi bi-star-fill"></i>
                    <h3>Beauty Treatments</h3>
                </div>
                <div class="row g-4">
                    @foreach($services['beauty'] as $index => $service)
                    <div class="col-md-6 col-lg-4">
                        <div id="service-beauty-{{ $index }}" class="price-card card-3d {{ $service['popular'] ? 'featured' : '' }} {{ isset($selectedService) && $selectedService === 'beauty-' . $index ? 'selected-service' : '' }}">
                            @if($service['popular'])
                            <div class="popular-badge">Most Popular</div>
                            @endif
                            <div class="price-header">
                                <h4>{{ $service['name'] }}</h4>
                                <div class="price-amount">{{ format_price($service['price']) }}</div>
                            </div>
                            <ul class="price-features">
                                @foreach($service['features'] as $feature)
                                <li><i class="bi bi-check"></i> {{ $feature }}</li>
                                @endforeach
                            </ul>
                            <div class="service-duration mb-3"><i class="bi bi-clock"></i> {{ $service['duration'] }}</div>
                            <a href="{{ route('booking') }}" class="btn {{ $service['popular'] ? 'btn-primary' : 'btn-outline-primary' }} w-100">Book Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section cta-section">
        <div class="container">
            <div class="cta-box card-3d">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2>Have Questions About Pricing?</h2>
                        <p>Contact us for custom packages and special event pricing. We're here to help you look your best!</p>
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


