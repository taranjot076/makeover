@extends('layouts.app')

@section('title', 'Our Services - Bridal Makeup, Nail Art & Beauty | Ludhiana')

@section('meta_description', 'Explore bridal makeup, nail art, and personalized beauty treatments by Lovepreet Kaur in Ludhiana, Punjab. View services and book online.')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="text-3d">Our Services</h1>
                    <p class="breadcrumb">
                        <a href="{{ route('home') }}">Home</a> / <span>Services</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bridal Makeup Section -->
    <section id="bridal" class="section service-detail-section">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-tag">Premium Service</span>
                <h2 class="section-title">Bridal Makeup Services</h2>
                <p class="section-subtitle">Transform into the most beautiful version of yourself on your special day.</p>
            </div>
            <div class="row g-4 mb-5">
                @foreach($services['bridal'] as $index => $service)
                <div class="col-md-6 col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}">
                    @include('partials.service-card', ['service' => $service, 'category' => 'bridal', 'index' => $index])
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Nail Services Section -->
    <section id="nails" class="section service-detail-section bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-tag">Popular Choice</span>
                <h2 class="section-title">Nail Art & Care Services</h2>
                <p class="section-subtitle">From classic elegance to trendy designs, our nail specialists provide premium manicures and pedicures.</p>
            </div>
            <div class="row g-4 mb-5">
                @foreach($services['nails'] as $index => $service)
                <div class="col-md-6 col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}">
                    @include('partials.service-card', ['service' => $service, 'category' => 'nails', 'index' => $index])
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Beauty Treatments Section -->
    <section id="beauty" class="section service-detail-section">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-tag">Customized</span>
                <h2 class="section-title">Beauty Treatments & Services</h2>
                <p class="section-subtitle">Customized beauty treatments tailored to your unique features and preferences.</p>
            </div>
            <div class="row g-4 mb-5">
                @foreach($services['beauty'] as $index => $service)
                <div class="col-md-6 col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}">
                    @include('partials.service-card', ['service' => $service, 'category' => 'beauty', 'index' => $index])
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Additional Services Grid -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-tag">More Services</span>
                <h2 class="section-title">Complete Beauty Solutions</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-mini-card card-3d">
                        <i class="bi bi-palette-fill"></i>
                        <h5>Hair Styling</h5>
                        <p>Professional hair styling for all occasions</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-mini-card card-3d">
                        <i class="bi bi-eye-fill"></i>
                        <h5>Eyebrow Services</h5>
                        <p>Threading, shaping, and tinting</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-mini-card card-3d">
                        <i class="bi bi-droplet-fill"></i>
                        <h5>Facial Treatments</h5>
                        <p>Rejuvenating facial therapies</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-mini-card card-3d">
                        <i class="bi bi-gift-fill"></i>
                        <h5>Gift Packages</h5>
                        <p>Special packages for loved ones</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-mini-card card-3d">
                        <i class="bi bi-scissors"></i>
                        <h5>Hair Color</h5>
                        <p>Professional hair coloring services</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-mini-card card-3d">
                        <i class="bi bi-sparkles"></i>
                        <h5>Eyelash Extension</h5>
                        <p>Beautiful lash extensions</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-mini-card card-3d">
                        <i class="bi bi-heart-pulse-fill"></i>
                        <h5>Hair Spa</h5>
                        <p>Deep conditioning treatments</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-mini-card card-3d">
                        <i class="bi bi-chat-dots-fill"></i>
                        <h5>Consultation</h5>
                        <p>Personalized beauty consultations</p>
                    </div>
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
                        <h2>Ready to Experience Our Services?</h2>
                        <p>Book your appointment today and let us bring out your most radiant self.</p>
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
