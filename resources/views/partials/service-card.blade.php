<div class="service-card-3d w-100">
    <div class="service-image">
        @if($service['popular'])
        <span class="popular-badge popular-badge-image">Popular</span>
        @endif
        <img src="{{ service_image($service, $category) }}"
             alt="{{ $service['name'] }} — Glamour by Lovepreet"
             loading="lazy"
             decoding="async"
             width="800"
             height="560" />
    </div>
    <div class="service-card-header">
        <h4>{{ $service['name'] }}</h4>
        <div class="service-card-price">{{ format_price($service['price']) }}</div>
    </div>
    <div class="service-card-body">
        <p class="service-desc">{{ $service['description'] }}</p>
        <ul class="service-features-list">
            @foreach($service['features'] as $feature)
            <li><i class="bi bi-check-circle-fill"></i> {{ $feature }}</li>
            @endforeach
        </ul>
        <div class="service-duration"><i class="bi bi-clock"></i> {{ $service['duration'] }}</div>
    </div>
    <div class="service-card-footer">
        <div class="d-flex gap-2">
            <a href="{{ route('pricing', ['service' => $category . '-' . $index]) }}" class="btn btn-outline flex-fill">
                <i class="bi bi-tag"></i> See Price
            </a>
            <a href="{{ route('booking') }}" class="btn btn-primary flex-fill">
                <i class="bi bi-calendar-check"></i> Book Now
            </a>
        </div>
    </div>
</div>
