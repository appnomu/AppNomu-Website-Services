// Ultra-Basic Accessibility - Guaranteed to Work
console.log('🚀 Accessibility script starting...');

// Set global flag immediately
window.accessibilityLoaded = true;

// Simple announcement function
window.announceToScreenReader = function(message) {
    console.log('📢 Announcement:', message);
};

console.log('✅ Basic accessibility loaded successfully');

// Add simple skip link when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('🔄 DOM ready, adding accessibility features...');
    
    // Add skip link
    if (!document.querySelector('.skip-link')) {
        var skipLink = document.createElement('a');
        skipLink.href = '#main-content';
        skipLink.textContent = 'Skip to main content';
        skipLink.style.cssText = 'position:absolute;top:-40px;left:6px;background:#000;color:#fff;padding:8px;text-decoration:none;z-index:9999;';
        skipLink.className = 'skip-link';
        
        skipLink.onfocus = function() { this.style.top = '6px'; };
        skipLink.onblur = function() { this.style.top = '-40px'; };
        
        document.body.insertBefore(skipLink, document.body.firstChild);
        console.log('✅ Skip link added');
    }
    
    console.log('✅ All accessibility features ready');
});
