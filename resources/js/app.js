import './bootstrap';

// ── Scroll-aware header shadow ────────────────────────────────
const siteHeader = document.getElementById('site-header');
if (siteHeader) {
    const onScroll = () => siteHeader.classList.toggle('scrolled', window.scrollY > 20);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

// ── Mobile hamburger ──────────────────────────────────────────
const hamburger = document.getElementById('hamburger');
const navLinks  = document.getElementById('nav-links');

if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
        const open = navLinks.classList.toggle('open');
        hamburger.classList.toggle('open', open);
        hamburger.setAttribute('aria-expanded', open);
    });
}

// ── Products mega dropdown (click + keyboard) ─────────────────
const productsTrigger  = document.getElementById('products-trigger');
const productsDropdown = document.getElementById('products-dropdown');

if (productsTrigger && productsDropdown) {
    productsTrigger.addEventListener('click', (e) => {
        e.stopPropagation();
        const open = productsDropdown.classList.toggle('open');
        productsTrigger.setAttribute('aria-expanded', open);
    });

    document.addEventListener('click', () => {
        productsDropdown.classList.remove('open');
        productsTrigger.setAttribute('aria-expanded', 'false');
    });

    productsDropdown.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            productsDropdown.classList.remove('open');
            productsTrigger.setAttribute('aria-expanded', 'false');
            productsTrigger.focus();
        }
    });
}

// ── Scroll-reveal ─────────────────────────────────────────────
const revealObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12 }
);

document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));

// ── Animated stat counters ────────────────────────────────────
function countUp(el, target, duration = 2000) {
    let start = null;
    const prefix = '';
    const suffix = target > 100 ? '+' : '';

    const step = (timestamp) => {
        if (!start) start = timestamp;
        const progress = Math.min((timestamp - start) / duration, 1);

        // easeOutExpo curve for smooth animation
        const eased = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
        const current = Math.floor(eased * target);

        el.textContent = prefix + current.toLocaleString() + suffix;

        if (progress < 1) {
            requestAnimationFrame(step);
        } else {
            el.textContent = prefix + target.toLocaleString() + suffix;
        }
    };

    requestAnimationFrame(step);
}

// Observe stat numbers and trigger animation when visible
const statObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const el     = entry.target;
                const target = parseInt(el.dataset.count, 10);
                countUp(el, target, 2200);
                statObserver.unobserve(el);
            }
        });
    },
    { threshold: 0.5 }
);

document.querySelectorAll('.stat-number[data-count]').forEach((el) => statObserver.observe(el));

// Also observe bus ticket stat numbers
document.querySelectorAll('.bt-stat-num[data-count]').forEach((el) => statObserver.observe(el));

// Also observe about page stat numbers
document.querySelectorAll('.about-stat-num[data-count]').forEach((el) => statObserver.observe(el));

// ── Software homepage slider ─────────────────────────────────
document.querySelectorAll('[data-software-slider]').forEach((slider) => {
    const slides = Array.from(slider.querySelectorAll('[data-slide]'));
    const dots = Array.from(slider.querySelectorAll('[data-slide-to]'));
    const prevButton = slider.querySelector('[data-slide-prev]');
    const nextButton = slider.querySelector('[data-slide-next]');

    if (slides.length === 0) {
        return;
    }

    let currentIndex = slides.findIndex((slide) => slide.classList.contains('is-active'));
    if (currentIndex < 0) {
        currentIndex = 0;
        slides[0].classList.add('is-active');
    }

    const renderSlide = (index) => {
        slides.forEach((slide, slideIndex) => {
            slide.classList.toggle('is-active', slideIndex === index);
        });

        dots.forEach((dot, dotIndex) => {
            dot.classList.toggle('is-active', dotIndex === index);
            dot.setAttribute('aria-selected', dotIndex === index ? 'true' : 'false');
        });

        currentIndex = index;
    };

    const nextSlide = () => {
        renderSlide((currentIndex + 1) % slides.length);
    };

    const prevSlide = () => {
        renderSlide((currentIndex - 1 + slides.length) % slides.length);
    };

    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            const index = Number(dot.getAttribute('data-slide-to'));
            if (!Number.isNaN(index)) {
                renderSlide(index);
                restartAutoPlay();
            }
        });
    });

    prevButton?.addEventListener('click', () => {
        prevSlide();
        restartAutoPlay();
    });

    nextButton?.addEventListener('click', () => {
        nextSlide();
        restartAutoPlay();
    });

    let autoPlay = setInterval(nextSlide, 5000);

    function restartAutoPlay() {
        clearInterval(autoPlay);
        autoPlay = setInterval(nextSlide, 5000);
    }

    slider.addEventListener('mouseenter', () => clearInterval(autoPlay));
    slider.addEventListener('mouseleave', restartAutoPlay);

    renderSlide(currentIndex);
});



// ── Lead popup ──────────────────────────────────────────────
const leadFab = document.getElementById('lead-fab');
const leadPopup = document.getElementById('lead-popup');

if (leadFab && leadPopup) {
    const openPopup = () => {
        leadPopup.classList.add('is-open');
        leadPopup.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    };
    const closePopup = () => {
        leadPopup.classList.remove('is-open');
        leadPopup.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    };

    leadFab.addEventListener('click', openPopup);

    leadPopup.querySelectorAll('[data-lead-close]').forEach((el) => {
        el.addEventListener('click', closePopup);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && leadPopup.classList.contains('is-open')) {
            closePopup();
        }
    });
}
