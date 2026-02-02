import './bootstrap';

// Import Swiper
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

// GSAP is loaded via CDN in app.blade.php
// Using global gsap and ScrollTrigger objects

// Mobile menu state
let mobileMenuOpen = false;
let mobileMenuTimeline = null;

// Global mobile menu toggle function
window.toggleMobileMenu = function() {
    const mobileMenu = document.getElementById("mobileMenu");
    const mobileMenuContent = document.getElementById("mobileMenuContent");
    const menuItems = document.querySelectorAll(".mobile-menu-item");
    const mobileMenuToggle = document.getElementById("mobileMenuToggle");
    const hamburgerIcon = mobileMenuToggle?.querySelector(".hamburger-icon");
    
    if (!mobileMenu || !mobileMenuContent) return;
    
    if (!mobileMenuOpen) {
        // Open mobile menu with enhanced GSAP slide-in animation
        mobileMenuOpen = true;
        mobileMenu.style.display = 'block';
        
        // Update aria-expanded
        if (mobileMenuToggle) {
            mobileMenuToggle.setAttribute('aria-expanded', 'true');
        }
        
        // Add active class for hamburger animation
        if (hamburgerIcon) {
            hamburgerIcon.classList.add('active');
        }
        
        // Kill any existing timeline
        if (mobileMenuTimeline) mobileMenuTimeline.kill();
        
        // Create enhanced opening animation timeline
        mobileMenuTimeline = gsap.timeline();
        
        // Initial state - modern slide-in from left
        gsap.set(mobileMenu, { 
            opacity: 0,
            visibility: "visible"
        });
        gsap.set(mobileMenuContent, { 
            x: "-100%", 
            opacity: 0,
            scale: 0.95,
            transformOrigin: "left center",
            filter: "blur(5px)"
        });
        gsap.set(menuItems, { 
            x: -60, 
            opacity: 0,
            rotationY: -30,
            scale: 0.8
        });
        
        // Enhanced backdrop animation with blur effect
        mobileMenuTimeline.to(mobileMenu, {
            opacity: 1,
            duration: 0.4,
            ease: "power3.out"
        })
        
        // Modern slide-in animation for menu container
        .to(mobileMenuContent, {
            x: "0%",
            opacity: 1,
            scale: 1,
            filter: "blur(0px)",
            duration: 0.7,
            ease: "power3.out"
        }, "-=0.2")
        
        // Staggered menu items animation with 3D effect
        .to(menuItems, {
            x: 0,
            opacity: 1,
            rotationY: 0,
            scale: 1,
            duration: 0.5,
            stagger: {
                amount: 0.3,
                ease: "power2.out"
            },
            ease: "back.out(1.4)"
        }, "-=0.4")
        
        // Add subtle scale animation to the entire menu
        .fromTo(mobileMenuContent, 
            { scale: 0.98 },
            { 
                scale: 1,
                duration: 0.3,
                ease: "power2.out"
            }, "-=0.2");
        
    } else {
        // Close mobile menu with enhanced GSAP animation
        mobileMenuOpen = false;
        
        // Update aria-expanded
        if (mobileMenuToggle) {
            mobileMenuToggle.setAttribute('aria-expanded', 'false');
        }
        
        // Remove active class for hamburger animation
        if (hamburgerIcon) {
            hamburgerIcon.classList.remove('active');
        }
        
        // Kill any existing timeline
        if (mobileMenuTimeline) mobileMenuTimeline.kill();
        
        // Create enhanced closing animation timeline
        mobileMenuTimeline = gsap.timeline({
            onComplete: () => {
                mobileMenu.style.display = 'none';
                mobileMenu.style.visibility = 'hidden';
            }
        });
        
        // Reverse staggered animation for menu items
        mobileMenuTimeline.to(menuItems, {
            x: -40,
            opacity: 0,
            rotationY: -20,
            scale: 0.9,
            duration: 0.3,
            stagger: {
                amount: 0.15,
                from: "end"
            },
            ease: "power2.in"
        })
        
        // Slide out menu container with blur effect
        .to(mobileMenuContent, {
            x: "-100%",
            opacity: 0,
            scale: 0.95,
            filter: "blur(3px)",
            duration: 0.5,
            ease: "power3.in"
        }, "-=0.2")
        
        // Fade out backdrop
        .to(mobileMenu, {
            opacity: 0,
            duration: 0.3,
            ease: "power2.in"
        }, "-=0.3");
    }
};

// Touch interaction state
let startX = 0;
let currentX = 0;
let isDragging = false;

// Mobile menu initialization
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuContent = document.getElementById("mobileMenuContent");
    
    // Enhanced click handling for mobile menu backdrop
    document.addEventListener("click", function (event) {
        const mobileMenu = document.getElementById("mobileMenu");
        const mobileMenuContent = document.getElementById("mobileMenuContent");
        const menuButton = event.target.closest("button");
        
        // Close if clicking on backdrop (not menu content) and not on menu button
        if (mobileMenuOpen && mobileMenu && !mobileMenuContent.contains(event.target) && !menuButton) {
            toggleMobileMenu();
        }
    });
    
    // Enhanced menu item click handling with animation feedback
    document.querySelectorAll('.mobile-menu-item').forEach((item, index) => {
        item.addEventListener('click', (e) => {
            // Add click animation feedback
            gsap.to(item, {
                scale: 0.95,
                duration: 0.1,
                ease: "power2.out",
                onComplete: () => {
                    gsap.to(item, {
                        scale: 1,
                        duration: 0.2,
                        ease: "back.out(1.7)"
                    });
                }
            });
            
            if (mobileMenuOpen) {
                setTimeout(() => toggleMobileMenu(), 150);
            }
        });
        
        // Add hover effects for better touch feedback
        item.addEventListener('mouseenter', () => {
            gsap.to(item, {
                x: 8,
                duration: 0.3,
                ease: "power2.out"
            });
        });
        
        item.addEventListener('mouseleave', () => {
            gsap.to(item, {
                x: 0,
                duration: 0.3,
                ease: "power2.out"
            });
        });
    });
    
    // Touch swipe gestures for mobile menu
    if (mobileMenuContent) {
        // Touch start
        mobileMenuContent.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            currentX = startX;
            isDragging = false;
        }, { passive: true });
        
        // Touch move
        mobileMenuContent.addEventListener('touchmove', (e) => {
            if (!mobileMenuOpen) return;
            
            currentX = e.touches[0].clientX;
            const deltaX = currentX - startX;
            isDragging = true;
            
            // Only allow swiping left (negative delta) to close
            if (deltaX < 0) {
                const progress = Math.min(Math.abs(deltaX) / 200, 1);
                const translateX = deltaX;
                const opacity = 1 - (progress * 0.3);
                
                gsap.set(mobileMenuContent, {
                    x: Math.max(translateX, -200),
                    opacity: opacity
                });
            }
        }, { passive: true });
        
        // Touch end
        mobileMenuContent.addEventListener('touchend', (e) => {
            if (!isDragging || !mobileMenuOpen) return;
            
            const deltaX = currentX - startX;
            const velocity = Math.abs(deltaX) / 200;
            
            // Close menu if swiped left significantly
            if (deltaX < -50 || velocity > 0.3) {
                toggleMobileMenu();
            } else {
                // Snap back to original position
                gsap.to(mobileMenuContent, {
                    x: 0,
                    opacity: 1,
                    duration: 0.3,
                    ease: "power2.out"
                });
            }
            
            isDragging = false;
        }, { passive: true });
    }
    
    // Keyboard navigation support
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileMenuOpen) {
            toggleMobileMenu();
        }
    });

    // Handle video playback
    const videos = document.querySelectorAll("video");
    videos.forEach((video) => {
        video.play().catch(function (error) {
            console.log("Video autoplay failed:", error);
        });
    });

    // Initialize Banner Swiper with delay to ensure DOM is fully loaded
    setTimeout(() => {
        const bannerSwiper = document.querySelector(".banner-swiper");
        if (bannerSwiper) {
            console.log('Initializing Swiper...');
            const swiper = new Swiper(".banner-swiper", {
                modules: [Navigation, Pagination, Autoplay, EffectFade],
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                effect: "fade",
                fadeEffect: {
                    crossFade: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    renderBullet: function (index, className) {
                        return (
                            '<span class="' +
                            className +
                            '"><span class="bullet-inner"></span></span>'
                        );
                    },
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                speed: 1000,
                on: {
                    init: function() {
                        console.log('Swiper initialized successfully');
                    },
                    slideChange: function () {
                        // Restart animations on slide change
                        const activeSlide = this.slides[this.activeIndex];
                        const animatedElements =
                            activeSlide.querySelectorAll("[data-animate]");
                        animatedElements.forEach((el) => {
                            el.style.animation = "none";
                            el.offsetHeight; // Trigger reflow
                            el.style.animation = null;
                        });
                    },
                },
            });
        } else {
            console.error('Banner swiper element not found');
        }
    }, 100);

    // Initialize Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                
                // Add staggered delay for multiple elements
                const delay = element.getAttribute('data-delay') || 0;
                
                setTimeout(() => {
                    element.style.animationPlayState = 'running';
                    element.classList.add('in-view');
                }, delay);
                
                // Unobserve after animation starts
                observer.unobserve(element);
            }
        });
    }, observerOptions);

    // Observe all animated elements
    const animatedElements = document.querySelectorAll('[data-animate]');
    animatedElements.forEach(element => {
        element.style.animationPlayState = 'paused';
        observer.observe(element);
    });

    // Initialize Portfolio Swiper with GSAP animations
    setTimeout(() => {
        const portfolioSwiper = document.querySelector(".portfolio-swiper");
        if (portfolioSwiper) {
            console.log('Initializing Portfolio Swiper...');
            
            const portfolioSwiperInstance = new Swiper(".portfolio-swiper", {
                modules: [Navigation, Pagination, Autoplay, EffectFade],
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                effect: "fade",
                fadeEffect: {
                    crossFade: true,
                },
                pagination: {
                    el: ".portfolio-pagination",
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + ' swiper-pagination-bullet"></span>';
                    },
                },
                navigation: {
                    nextEl: ".portfolio-nav-next",
                    prevEl: ".portfolio-nav-prev",
                },
                speed: 1200,
                on: {
                    init: function() {
                        console.log('Portfolio Swiper initialized');
                        // Animate first slide elements
                        animatePortfolioSlide(this.slides[this.activeIndex]);
                        
                        // Animate navigation elements
                        gsap.to(".portfolio-nav-prev, .portfolio-nav-next", {
                            opacity: 1,
                            duration: 1,
                            delay: 1.5,
                            ease: "power2.out"
                        });
                        
                        gsap.to(".scroll-indicator", {
                            opacity: 1,
                            duration: 1,
                            delay: 2,
                            ease: "power2.out"
                        });
                    },
                    slideChange: function () {
                        // Animate elements on slide change
                        const activeSlide = this.slides[this.activeIndex];
                        animatePortfolioSlide(activeSlide);
                    },
                },
            });
        }
    }, 150);
    
    // Portfolio slide animation function
    function animatePortfolioSlide(slide) {
        const title = slide.querySelector('.portfolio-title');
        const topTitle = slide.querySelector('.portfolio-top-title');
        const button = slide.querySelector('.portfolio-btn');
        
        if (title && button && topTitle) {
            // Reset elements
            gsap.set([title, button, topTitle], {
                opacity: 0,
                y: 50
            });
            
            // Create timeline for slide animations
            const tl = gsap.timeline();
            
            // Animate top title first
            tl.fromTo(topTitle, {
                opacity: 0,
                y: -30,
                scale: 0.9
            }, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.8,
                ease: "power3.out"
            })
            
            // Animate main title with simple effect
            tl.fromTo(title, {
                opacity: 0,
                y: 50,
                rotationX: -90
            }, {
                opacity: 1,
                y: 0,
                rotationX: 0,
                duration: 0.8,
                ease: "back.out(1.7)"
            }, "-=0.5")
            .fromTo(button, {
                opacity: 0,
                y: 30,
                scale: 0.9
            }, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.6,
                ease: "back.out(1.7)"
            }, "-=0.3");
        }
    }
    
    // GSAP ScrollTrigger for portfolio section entrance
    ScrollTrigger.create({
        trigger: ".portfolio-section",
        start: "top 80%",
        once: true,
        onEnter: () => {
            console.log('Portfolio section entered viewport');
            
            // Animate section entrance
            gsap.fromTo(".portfolio-swiper", {
                scale: 1.1,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                duration: 1.5,
                ease: "power2.out"
            });
        }
    });
    
    // Initialize Awards Swiper with GSAP animations
    setTimeout(() => {
        const awardsSwiper = document.querySelector(".awards-swiper");
        if (awardsSwiper) {
            console.log('Initializing Awards Swiper...');
            
            const awardsSwiperInstance = new Swiper(".awards-swiper", {
                modules: [Navigation, Autoplay],
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
                spaceBetween: 20,
                speed: 800,
                navigation: {
                    nextEl: ".awards-nav-next",
                    prevEl: ".awards-nav-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
                on: {
                    init: function() {
                        console.log('Awards Swiper initialized');
                        
                        // Animate navigation elements
                        gsap.to(".awards-nav-prev, .awards-nav-next", {
                            opacity: 1,
                            duration: 1,
                            delay: 0.5,
                            ease: "power2.out"
                        });
                        
                        // Animate progress bar
                        gsap.to(".awards-progress", {
                            opacity: 1,
                            duration: 1,
                            delay: 0.7,
                            ease: "power2.out"
                        });
                    },
                    slideChange: function () {
                        // Update progress bar
                        const progress = ((this.activeIndex + 1) / this.slides.length) * 100;
                        gsap.to(".awards-progress-bar", {
                            width: progress + '%',
                            duration: 0.3,
                            ease: "power2.out"
                        });
                    },
                },
            });
        }
    }, 200);
    
    // Initialize Mobile Portfolio Swiper with responsive configuration
    setTimeout(() => {
        const mobilePortfolioSwiper = document.querySelector(".mobile-portfolio-swiper");
        if (mobilePortfolioSwiper) {
            console.log('Initializing Mobile Portfolio Swiper...');
            
            const mobilePortfolioSwiperInstance = new Swiper(".mobile-portfolio-swiper", {
                modules: [Navigation, Pagination, Autoplay],
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                slidesPerView: 1.2,
                spaceBetween: 16,
                centeredSlides: false,
                speed: 800,
                navigation: {
                    nextEl: ".mobile-portfolio-nav-next",
                    prevEl: ".mobile-portfolio-nav-prev",
                },
                pagination: {
                    el: ".mobile-portfolio-pagination",
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + ' w-2 h-2 bg-white/50 rounded-full transition-all duration-300"></span>';
                    },
                },
                breakpoints: {
                    375: {
                        slidesPerView: 1.3,
                        spaceBetween: 20,
                    },
                    480: {
                        slidesPerView: 1.5,
                        spaceBetween: 24,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                    }
                },
                on: {
                    init: function() {
                        console.log('Mobile Portfolio Swiper initialized');
                        
                        // Animate navigation elements
                        gsap.to(".mobile-portfolio-nav-prev, .mobile-portfolio-nav-next", {
                            opacity: 1,
                            duration: 1,
                            delay: 0.3,
                            ease: "power2.out"
                        });
                    },
                },
            });
        }
    }, 250);
    
    // GSAP ScrollTrigger for awards section entrance
    ScrollTrigger.create({
        trigger: ".awards-section",
        start: "top 80%",
        once: true,
        onEnter: () => {
            console.log('Awards section entered viewport');
            
            // Create awards entrance timeline
            const tl = gsap.timeline();
            
            // Animate main title
            tl.fromTo(".awards-main-title", {
                opacity: 0,
                y: 50,
                rotationX: -90
            }, {
                opacity: 1,
                y: 0,
                rotationX: 0,
                duration: 0.8,
                ease: "back.out(1.7)"
            })
            
            // Animate subtitle and divider
            .fromTo(".awards-subtitle", {
                opacity: 0,
                y: 30
            }, {
                opacity: 1,
                y: 0,
                duration: 0.6,
                ease: "power2.out"
            }, "-=0.3")
            
            .fromTo(".awards-divider", {
                opacity: 0,
                scaleX: 0
            }, {
                opacity: 1,
                scaleX: 1,
                duration: 0.8,
                ease: "power2.out"
            }, "-=0.3")
            
            // Animate awards cards
            .fromTo(".awards-card", {
                opacity: 0,
                y: 50,
                scale: 0.9
            }, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.6,
                stagger: 0.1,
                ease: "back.out(1.7)"
            }, "-=0.2");
        }
    });
    
    // GSAP ScrollTrigger for awards statistics
    ScrollTrigger.create({
        trigger: ".awards-stats",
        start: "top 90%",
        once: true,
        onEnter: () => {
            // Animate statistics
            gsap.fromTo(".awards-stats", {
                opacity: 0,
                y: 30
            }, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out"
            });
            
            // Animate counters
            document.querySelectorAll('.counter').forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                gsap.to(counter, {
                    innerHTML: target,
                    duration: 2,
                    ease: "power2.out",
                    snap: { innerHTML: 1 },
                    delay: 0.3
                });
            });
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
