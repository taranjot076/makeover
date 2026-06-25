@extends('layouts.app')

@section('title', 'Book Appointment - Glamour by Lovepreet | Ludhiana')

@section('meta_description', 'Book your bridal makeup, nail art, or beauty appointment with Lovepreet Kaur in Ludhiana, Punjab.')

@section('content')
    <!-- Page Header -->
    <section class="page-header booking-page-header">
        <div class="page-header-background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-icon">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <h1 class="text-3d">Book Your Appointment</h1>
                    <p class="breadcrumb">
                        <a href="{{ route('home') }}">Home</a> / <span>Book Appointment</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Form Section -->
    <section class="section booking-section">
        <div class="booking-background"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-8 order-lg-1 order-2">
                            <div class="booking-form-wrapper card-3d booking-form-modern">
                                <div class="form-header">
                                    <div class="form-icon-wrapper">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                    <h2 class="form-title">Fill in Your Details</h2>
                                    <p class="form-subtitle">We'll get back to you within 24 hours to confirm your appointment.</p>
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
                                        <label for="service" class="form-label">
                                            <i class="bi bi-list-check"></i> Select Service(s) *
                                        </label>
                                        <div class="service-select-wrapper">
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
                                        <small class="form-text text-muted">
                                            <i class="bi bi-info-circle"></i> Search and select multiple services. Selected services will appear below.
                                        </small>
                                        <div id="selectedServices" class="selected-services-container mt-3"></div>
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
                                                <option value="09:00 AM">09:00 AM</option>
                                                <option value="10:00 AM">10:00 AM</option>
                                                <option value="11:00 AM">11:00 AM</option>
                                                <option value="12:00 PM">12:00 PM</option>
                                                <option value="01:00 PM">01:00 PM</option>
                                                <option value="02:00 PM">02:00 PM</option>
                                                <option value="03:00 PM">03:00 PM</option>
                                                <option value="04:00 PM">04:00 PM</option>
                                                <option value="05:00 PM">05:00 PM</option>
                                                <option value="06:00 PM">06:00 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Additional Notes or Special Requests</label>
                                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Tell us about any special requirements, allergies, or preferences..."></textarea>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" name="terms" value="1" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#">terms and conditions</a> and <a href="#">privacy policy</a>
                                        </label>
                                    </div>
                                    <div id="formMessage" class="alert d-none"></div>
                                    <div class="form-submit-wrapper">
                                        <button type="submit" class="btn btn-primary btn-lg btn-3d btn-submit-booking">
                                            <i class="bi bi-calendar-check"></i> 
                                            <span>Book Appointment</span>
                                            <div class="btn-shine"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-2 order-1">
                            <div class="booking-info">
                                <div class="info-card card-3d info-card-modern">
                                    <div class="info-card-icon">
                                        <i class="bi bi-clock-history"></i>
                                    </div>
                                    <h4>Business Hours</h4>
                                    <ul class="info-list">
                                        @foreach($site['hours'] as $hour)
                                        <li>
                                            <i class="bi bi-calendar-week"></i>
                                            <div>
                                                <strong>{{ $hour['days'] }}:</strong> {{ $hour['time'] }}
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="info-card card-3d info-card-modern">
                                    <div class="info-card-icon">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                    <h4>Contact Us</h4>
                                    <ul class="info-list">
                                        <li>
                                            <i class="bi bi-telephone"></i>
                                            <div>
                                                <strong>Call Us:</strong><br>
                                                <a href="tel:{{ preg_replace('/\s+/', '', $site['phone']) }}" class="contact-link">{{ $site['phone'] }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="bi bi-whatsapp"></i>
                                            <div>
                                                <strong>WhatsApp:</strong><br>
                                                <a href="{{ $site['social']['whatsapp'] }}" target="_blank" class="contact-link">{{ $site['whatsapp'] }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="bi bi-envelope"></i>
                                            <div>
                                                <strong>Email:</strong><br>
                                                <a href="mailto:{{ $site['email'] }}" class="contact-link">{{ $site['email'] }}</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="info-card card-3d info-card-modern">
                                    <div class="info-card-icon">
                                        <i class="bi bi-info-circle-fill"></i>
                                    </div>
                                    <h4>Important Notes</h4>
                                    <ul class="info-list">
                                        <li>
                                            <i class="bi bi-check-circle"></i>
                                            <div>Please arrive 10 minutes early</div>
                                        </li>
                                        <li>
                                            <i class="bi bi-check-circle"></i>
                                            <div>Cancellation 24 hours in advance</div>
                                        </li>
                                        <li>
                                            <i class="bi bi-check-circle"></i>
                                            <div>Consultation included for bridal services</div>
                                        </li>
                                        <li>
                                            <i class="bi bi-check-circle"></i>
                                            <div>Group bookings available</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

