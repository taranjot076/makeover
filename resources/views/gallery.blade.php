@extends('layouts.app')

@section('title', 'Gallery - Glamour by Lovepreet | Bridal & Beauty Portfolio Ludhiana')

@section('meta_description', 'Browse our portfolio of bridal makeup, nail art, and beauty transformations by Lovepreet Kaur in Ludhiana, Punjab.')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="col-12 text-center" data-aos="fade-up">
                <h1 class="text-3d">Our Gallery</h1>
                <p class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a> / <span>Gallery</span>
                </p>
            </div>
        </div>
    </section>

    <section class="section gallery-section">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-tag">Portfolio</span>
                <h2 class="section-title">Beauty Transformations</h2>
                <p class="section-subtitle">A glimpse into our bridal makeup, nail art, and personalized beauty work in {{ $site['city'] }}.</p>
            </div>

            <div class="gallery-filters text-center mb-4" data-aos="fade-up">
                <button class="gallery-filter-btn active" data-filter="all">All</button>
                <button class="gallery-filter-btn" data-filter="bridal">Bridal</button>
                <button class="gallery-filter-btn" data-filter="nails">Nail Art</button>
                <button class="gallery-filter-btn" data-filter="beauty">Beauty</button>
            </div>

            <div class="row g-4 gallery-grid">
                @foreach($gallery as $index => $item)
                <div class="col-md-6 col-lg-4 gallery-item" data-category="{{ $item['category'] }}" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    @if($item['type'] === 'image')
                    <article class="gallery-card" data-bs-toggle="modal" data-bs-target="#galleryModal" data-type="image" data-src="{{ gallery_image($item) }}" data-title="{{ $item['title'] }}">
                        <div class="gallery-card-image">
                            <img src="{{ gallery_image($item) }}" alt="{{ $item['alt'] ?? $item['title'] }}" loading="lazy">
                        </div>
                        <div class="gallery-card-footer">
                            <span class="portfolio-cat-badge">{{ ucfirst($item['category']) }}</span>
                            <h3>{{ $item['title'] }}</h3>
                        </div>
                    </article>
                    @elseif($item['type'] === 'video')
                    <article class="gallery-card gallery-card-video" data-bs-toggle="modal" data-bs-target="#galleryModal" data-type="video" data-src="{{ $item['src'] }}" data-title="{{ $item['title'] }}">
                        <div class="gallery-card-image">
                            <img src="{{ gallery_image($item) }}" alt="{{ $item['alt'] ?? $item['title'] }}" loading="lazy">
                            <span class="portfolio-play"><i class="bi bi-play-fill"></i></span>
                        </div>
                        <div class="gallery-card-footer">
                            <span class="portfolio-cat-badge">{{ ucfirst($item['category']) }}</span>
                            <h3>{{ $item['title'] }}</h3>
                        </div>
                    </article>
                    @elseif($item['type'] === 'audio')
                    <div class="gallery-card card-3d gallery-card-audio">
                        <div class="gallery-card-audio-inner">
                            <i class="bi bi-music-note-beamed"></i>
                            <h5>{{ $item['title'] }}</h5>
                            <audio controls preload="none">
                                <source src="{{ my_asset($item['src']) }}" type="audio/mpeg">
                                Your browser does not support audio playback.
                            </audio>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="modal fade gallery-modal" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="galleryModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0" id="galleryModalBody"></div>
            </div>
        </div>
    </div>

    <section class="section cta-section">
        <div class="container">
            <div class="cta-box card-3d cta-box-modern" data-aos="zoom-in">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2>Love What You See?</h2>
                        <p>Book your appointment with {{ $site['owner'] }} and create your own stunning transformation.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('booking') }}" class="btn btn-light btn-lg btn-3d">
                            <i class="bi bi-calendar-check"></i> Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gallery filter
    document.querySelectorAll('.gallery-filter-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.gallery-filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            var filter = this.dataset.filter;
            document.querySelectorAll('.gallery-item').forEach(function(item) {
                item.style.display = (filter === 'all' || item.dataset.category === filter) ? '' : 'none';
            });
        });
    });

    // Lightbox modal
    var modal = document.getElementById('galleryModal');
    if (modal) {
        modal.addEventListener('show.bs.modal', function(e) {
            var trigger = e.relatedTarget;
            var title = trigger.dataset.title;
            var type = trigger.dataset.type;
            var src = trigger.dataset.src;
            document.getElementById('galleryModalTitle').textContent = title;
            var body = document.getElementById('galleryModalBody');
            if (type === 'video') {
                body.innerHTML = '<div class="ratio ratio-16x9"><iframe src="' + src + '" allowfullscreen loading="lazy"></iframe></div>';
            } else {
                body.innerHTML = '<img src="' + src + '" alt="' + title + '" class="w-100">';
            }
        });
        modal.addEventListener('hidden.bs.modal', function() {
            document.getElementById('galleryModalBody').innerHTML = '';
        });
    }
});
</script>
@endpush
