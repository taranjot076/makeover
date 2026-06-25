// Initialize AOS
if (typeof AOS !== 'undefined') {
    AOS.init({ duration: 700, once: true, offset: 60, easing: 'ease-out-cubic' });
}

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;
    navbar.classList.toggle('scrolled', window.scrollY > 40);
});

document.addEventListener('DOMContentLoaded', function() {
    // Minimum date for booking
    const today = new Date().toISOString().split('T')[0];
    document.querySelectorAll('input[type="date"]').forEach(function(input) {
        input.setAttribute('min', today);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#' || href.length <= 1) return;
            const target = document.querySelector(href);
            if (!target) return;
            e.preventDefault();
            const offset = target.offsetTop - 80;
            window.scrollTo({ top: offset, behavior: 'smooth' });
        });
    });

    // Select2 for service multi-select
    const serviceSelect = $('#service');
    if (serviceSelect.length && typeof serviceSelect.select2 === 'function') {
        serviceSelect.select2({
            theme: 'bootstrap-5',
            placeholder: 'Search and select services...',
            allowClear: true,
            width: '100%',
            closeOnSelect: false
        });

        function updateSelectedServices(values) {
            const container = document.getElementById('selectedServices');
            if (!container) return;
            container.innerHTML = '';
            (values || []).forEach(function(val) {
                const tag = document.createElement('span');
                tag.className = 'selected-service-tag';
                tag.textContent = val;
                container.appendChild(tag);
            });
        }

        serviceSelect.on('change', function() {
            updateSelectedServices($(this).val() || []);
        });
    }

    // Subtle hero entrance (if GSAP available)
    if (typeof gsap !== 'undefined') {
        gsap.from('.hero-title', { duration: 1, y: 40, opacity: 0, ease: 'power3.out', delay: 0.1 });
        gsap.from('.hero-lead', { duration: 0.9, y: 30, opacity: 0, ease: 'power3.out', delay: 0.25 });
        gsap.from('.hero-actions', { duration: 0.8, y: 20, opacity: 0, ease: 'power3.out', delay: 0.4 });
        gsap.from('.hero-visual', { duration: 1.1, x: 40, opacity: 0, ease: 'power3.out', delay: 0.3 });
    }
});

// Booking / contact form submission
const appointmentForm = document.getElementById('appointmentForm');
if (appointmentForm) {
    appointmentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const serviceSelect = $('#service');
        let selectedServices = [];
        if (serviceSelect.length) {
            selectedServices = serviceSelect.val() || [];
        }

        if (selectedServices.length === 0) {
            const formMessage = document.getElementById('formMessage');
            formMessage.className = 'alert alert-danger';
            formMessage.innerHTML = '<i class="bi bi-exclamation-triangle-fill"></i> Please select at least one service.';
            formMessage.classList.remove('d-none');
            return;
        }

        const formMessage = document.getElementById('formMessage');
        const submitButton = this.querySelector('button[type="submit"]');
        const originalButtonText = submitButton.innerHTML;

        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="bi bi-hourglass-split"></i> Sending...';

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(function(response) { return response.json(); })
        .then(function(data) {
            if (data.success) {
                formMessage.className = 'alert alert-success';
                formMessage.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + (data.message || 'Thank you! We will contact you soon.');
                formMessage.classList.remove('d-none');
                appointmentForm.reset();
                if (serviceSelect.length) serviceSelect.val(null).trigger('change');
            } else {
                formMessage.className = 'alert alert-danger';
                formMessage.textContent = data.message || 'Something went wrong. Please try again.';
                formMessage.classList.remove('d-none');
            }
        })
        .catch(function() {
            formMessage.className = 'alert alert-danger';
            formMessage.textContent = 'Sorry, there was an error. Please try again or contact us directly.';
            formMessage.classList.remove('d-none');
        })
        .finally(function() {
            submitButton.disabled = false;
            submitButton.innerHTML = originalButtonText;
        });
    });
}

// Counter animation for stats
const statObserver = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
        if (!entry.isIntersecting || entry.target.dataset.animated) return;
        entry.target.dataset.animated = '1';
        const el = entry.target;
        const raw = el.textContent.trim();
        const suffix = raw.replace(/[\d]/g, '');
        const target = parseInt(raw.replace(/\D/g, ''), 10);
        if (isNaN(target)) return;
        let current = 0;
        const step = Math.max(1, Math.floor(target / 40));
        const timer = setInterval(function() {
            current += step;
            if (current >= target) {
                el.textContent = target + suffix;
                clearInterval(timer);
            } else {
                el.textContent = current + suffix;
            }
        }, 30);
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-number, .hero-stat-value').forEach(function(stat) {
    statObserver.observe(stat);
});
