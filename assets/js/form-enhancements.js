/**
 * Simple Form Enhancements - Safe Implementation
 * Adds basic client-side validation without breaking existing functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    // Only enhance forms if they exist (safe approach)
    const forms = document.querySelectorAll('form');
    
    forms.forEach(function(form) {
        // Add basic real-time validation for email fields
        const emailInputs = form.querySelectorAll('input[type="email"]');
        emailInputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                validateEmail(this);
            });
        });
        
        // Add basic validation for required fields
        const requiredInputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        requiredInputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                validateRequired(this);
            });
        });
        
        // Add phone number formatting (if phone field exists)
        const phoneInputs = form.querySelectorAll('input[type="tel"], input[name*="phone"]');
        phoneInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                formatPhoneNumber(this);
            });
        });
    });
});

/**
 * Validate email format
 */
function validateEmail(input) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const isValid = emailRegex.test(input.value.trim());
    
    // Remove existing validation classes
    input.classList.remove('is-valid', 'is-invalid');
    
    if (input.value.trim() !== '') {
        if (isValid) {
            input.classList.add('is-valid');
        } else {
            input.classList.add('is-invalid');
        }
    }
}

/**
 * Validate required fields
 */
function validateRequired(input) {
    const isValid = input.value.trim() !== '';
    
    // Remove existing validation classes
    input.classList.remove('is-valid', 'is-invalid');
    
    if (isValid) {
        input.classList.add('is-valid');
    } else if (input.value.trim() === '' && input.hasAttribute('required')) {
        input.classList.add('is-invalid');
    }
}

/**
 * Format phone number (simple formatting)
 */
function formatPhoneNumber(input) {
    let value = input.value.replace(/\D/g, ''); // Remove non-digits
    
    // Simple formatting for common patterns
    if (value.length >= 10) {
        if (value.startsWith('256')) {
            // Uganda format: +256 XXX XXX XXX
            value = '+256 ' + value.substring(3, 6) + ' ' + value.substring(6, 9) + ' ' + value.substring(9, 12);
        } else if (value.length === 10) {
            // US format: (XXX) XXX-XXXX
            value = '(' + value.substring(0, 3) + ') ' + value.substring(3, 6) + '-' + value.substring(6, 10);
        }
    }
    
    input.value = value;
}

/**
 * Add loading state to form submission (safe enhancement)
 */
document.addEventListener('submit', function(e) {
    const form = e.target;
    const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
    
    if (submitBtn) {
        // Store original text
        const originalText = submitBtn.textContent || submitBtn.value;
        
        // Add loading state
        submitBtn.disabled = true;
        if (submitBtn.textContent !== undefined) {
            submitBtn.textContent = 'Submitting...';
        } else {
            submitBtn.value = 'Submitting...';
        }
        
        // Restore original state after 10 seconds (safety fallback)
        setTimeout(function() {
            submitBtn.disabled = false;
            if (submitBtn.textContent !== undefined) {
                submitBtn.textContent = originalText;
            } else {
                submitBtn.value = originalText;
            }
        }, 10000);
    }
});
