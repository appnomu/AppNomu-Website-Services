/**
 * Image Optimization - Safe Implementation
 * Adds lazy loading and WebP support without breaking existing images
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🖼️ Initializing image optimization...');
    
    try {
        // Initialize lazy loading
        initLazyLoading();
        
        // Initialize WebP support detection
        initWebPSupport();
        
        console.log('✅ Image optimization loaded successfully');
    } catch (error) {
        console.error('❌ Error in image optimization:', error);
    }
});

/**
 * Initialize lazy loading for images
 */
function initLazyLoading() {
    // Check if Intersection Observer is supported
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    
                    // Load the image
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        img.classList.add('loaded');
                        
                        // Stop observing this image
                        observer.unobserve(img);
                    }
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.01
        });
        
        // Find all images that should be lazy loaded
        const lazyImages = document.querySelectorAll('img[data-src]');
        lazyImages.forEach(function(img) {
            imageObserver.observe(img);
        });
        
        console.log('✅ Lazy loading initialized for ' + lazyImages.length + ' images');
    } else {
        // Fallback for browsers without Intersection Observer
        const lazyImages = document.querySelectorAll('img[data-src]');
        lazyImages.forEach(function(img) {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
            img.classList.add('loaded');
        });
        
        console.log('⚠️ Using fallback loading for ' + lazyImages.length + ' images');
    }
}

/**
 * WebP support detection and optimization
 */
function initWebPSupport() {
    // Create a test WebP image
    const webP = new Image();
    webP.onload = webP.onerror = function() {
        const isWebPSupported = (webP.height === 2);
        
        if (isWebPSupported) {
            document.documentElement.classList.add('webp-support');
            console.log('✅ WebP support detected');
        } else {
            document.documentElement.classList.add('no-webp-support');
            console.log('ℹ️ WebP not supported, using fallback images');
        }
    };
    
    // Test WebP image (2x2 pixel WebP)
    webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
}

/**
 * Add responsive image loading
 */
function addResponsiveImageSupport() {
    const images = document.querySelectorAll('img[data-sizes]');
    
    images.forEach(function(img) {
        // Get the appropriate image size based on viewport
        const sizes = JSON.parse(img.dataset.sizes || '{}');
        const viewportWidth = window.innerWidth;
        
        let selectedSrc = img.src;
        
        // Find the best image size for current viewport
        Object.keys(sizes).forEach(function(breakpoint) {
            if (viewportWidth >= parseInt(breakpoint)) {
                selectedSrc = sizes[breakpoint];
            }
        });
        
        // Update image source if different
        if (selectedSrc !== img.src) {
            img.src = selectedSrc;
        }
    });
}

// Add CSS for lazy loading
const lazyLoadingCSS = `
    .lazy {
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .loaded {
        opacity: 1;
    }
    
    /* WebP support styles */
    .webp-support .hero-bg {
        background-image: url('assets/images/hero-bg.webp') !important;
    }
    
    .no-webp-support .hero-bg {
        background-image: url('assets/images/hero-bg.jpg') !important;
    }
`;

// Inject CSS
const style = document.createElement('style');
style.textContent = lazyLoadingCSS;
document.head.appendChild(style);

// Handle window resize for responsive images
window.addEventListener('resize', function() {
    clearTimeout(window.resizeTimeout);
    window.resizeTimeout = setTimeout(addResponsiveImageSupport, 250);
});

console.log('📄 Image optimization script loaded');
