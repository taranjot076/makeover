@extends('layouts.app')

@section('title', 'Contact Us - Glamour by Lovepreet | Ludhiana, Punjab')

@section('meta_description', 'Get in touch with Lovepreet Kaur for bridal makeup, nail art, and beauty treatments in Ludhiana, Punjab. Call, WhatsApp, or send us a message.')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="col-12 text-center" data-aos="fade-up">
                <h1 class="text-3d">Contact Us</h1>
                <p class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a> / <span>Contact</span>
                </p>
            </div>
        </div>
    </section>

    <section class="section contact-section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="section-tag">Get In Touch</span>
                    <h2 class="section-title text-start">We'd Love to Hear From You</h2>
                    <p class="lead">Have a question about our services or want to discuss your special day? Reach out to {{ $site['owner'] }} in {{ $site['city'] }}.</p>

                    <div class="contact-info-cards">
                        <div class="contact-info-card">
                            <div class="contact-info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <div>
                                <h5>Location</h5>
                                <p>{{ $site['address'] }}</p>
                            </div>
                        </div>
                        <div class="contact-info-card">
                            <div class="contact-info-icon"><i class="bi bi-telephone-fill"></i></div>
                            <div>
                                <h5>Phone</h5>
                                <p><a href="tel:{{ preg_replace('/\s+/', '', $site['phone']) }}">{{ $site['phone'] }}</a></p>
                            </div>
                        </div>
                        <div class="contact-info-card">
                            <div class="contact-info-icon"><i class="bi bi-whatsapp"></i></div>
                            <div>
                                <h5>WhatsApp</h5>
                                <p><a href="{{ $site['social']['whatsapp'] }}" target="_blank" rel="noopener">{{ $site['whatsapp'] }}</a></p>
                            </div>
                        </div>
                        <div class="contact-info-card">
                            <div class="contact-info-icon"><i class="bi bi-envelope-fill"></i></div>
                            <div>
                                <h5>Email</h5>
                                <p><a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-hours mt-4">
                        <h5><i class="bi bi-clock"></i> Business Hours</h5>
                        <ul class="info-list">
                            @foreach($site['hours'] as $hour)
                            <li><strong>{{ $hour['days'] }}:</strong> {{ $hour['time'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="booking-form-wrapper card-3d booking-form-modern">
                        <div class="form-header">
                            <div class="form-icon-wrapper"><i class="bi bi-chat-dots"></i></div>
                            <h2 class="form-title">Send a Message</h2>
                            <p class="form-subtitle">Fill out the form below and we'll respond within 24 hours.</p>
                        </div>

                        <form id="appointmentForm" action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="service" class="form-label"><i class="bi bi-list-check"></i> Service(s) of Interest *</label>
                                <select class="form-select" id="service" name="service[]" multiple required>
                                    <optgroup label="Bridal Makeup">
                                        @foreach($services['bridal'] as $service)
                                        <option value="{{ $service['name'] }} - {{ format_price($service['price']) }}">{{ $service['name'] }} - {{ format_price($service['price']) }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Nail Services">
                                        @foreach($services['nails'] as $service)
                                        <option value="{{ $service['name'] }} - {{ format_price($service['price']) }}{{ str_contains($service['name'], 'Nail Art') ? '+' : '' }}">{{ $service['name'] }} - {{ format_price($service['price']) }}{{ str_contains($service['name'], 'Nail Art') ? '+' : '' }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Beauty Treatments">
                                        @foreach($services['beauty'] as $service)
                                        <option value="{{ $service['name'] }} - {{ format_price($service['price']) }}">{{ $service['name'] }} - {{ format_price($service['price']) }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date" class="form-label">Preferred Date *</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="time" class="form-label">Preferred Time *</label>
                                    <select class="form-select" id="time" name="time" required>
                                        <option value="">Select time...</option>
                                        @foreach(['09:00 AM','10:00 AM','11:00 AM','12:00 PM','01:00 PM','02:00 PM','03:00 PM','04:00 PM','05:00 PM','06:00 PM'] as $t)
                                        <option value="{{ $t }}">{{ $t }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Tell us about your requirements..."></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" value="1" required>
                                <label class="form-check-label" for="terms">I agree to be contacted regarding my inquiry.</label>
                            </div>
                            <div id="formMessage" class="alert d-none"></div>
                            <button type="submit" class="btn btn-primary btn-lg btn-3d w-100">
                                <i class="bi bi-send"></i> Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
