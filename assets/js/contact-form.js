document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    if (!contactForm) return;
    
    // Form elements
    const formElements = {
        name: document.getElementById('name'),
        email: document.getElementById('email'),
        phone: document.getElementById('phone'),
        subject: document.getElementById('subject'),
        message: document.getElementById('message'),
        privacyPolicy: document.getElementById('privacyPolicy')
    };
    
    // Validation patterns
    const patterns = {
        name: /^[a-zA-Z\s\-']{2,100}$/,
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        phone: /^[\d\s\-+().]{0,40}$/,  // Allow up to 40 characters including auto-generated brackets
        subject: /^.{5,200}$/,
        message: /^[\s\S]{10,2000}$/
    };
    
    // Error messages
    const errorMessages = {
        name: 'Please enter a valid name (2-100 characters, letters and spaces only)',
        email: 'Please enter a valid email address',
        phone: 'Please enter a valid phone number (up to 40 characters, digits, +, -, (), . or spaces)',
        subject: 'Subject must be between 5 and 200 characters',
        message: 'Message must be between 10 and 2000 characters',
        privacyPolicy: 'You must agree to the privacy policy and terms of service'
    };

    // Real-time validation on input
    Object.entries(formElements).forEach(([field, element]) => {
        if (!element) return;
        
        element.addEventListener('input', function() {
            // Skip validation for honeypot field
            if (field === 'website') return;
            
            validateField(field, element);
        });
        
        // For checkboxes, validate on change
        if (element.type === 'checkbox') {
            element.addEventListener('change', function() {
                validateField(field, element);
            });
        }
    });
    
    // Form submission
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Reset previous states
        resetValidation();
        
        // Validate all fields
        let isValid = true;
        let firstInvalidField = null;
        
        Object.entries(formElements).forEach(([field, element]) => {
            if (field === 'website') return; // Skip honeypot
            
            if (!validateField(field, element) && isValid) {
                isValid = false;
                firstInvalidField = element;
            }
        });
        
        if (!isValid) {
            e.stopPropagation();
            contactForm.classList.add('was-validated');
            
            // Scroll to first invalid field
            if (firstInvalidField) {
                firstInvalidField.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                firstInvalidField.focus();
            }
            
            showAlert('Please correct the errors below.', 'danger');
            return;
        }
        
        // If form is valid, submit via AJAX
        submitForm();
    });
    
    /**
     * Validate a single form field
     * @param {string} field - Field name
     * @param {HTMLElement} element - Form element
     * @returns {boolean} - Whether the field is valid
     */
    function validateField(field, element) {
        // Skip validation for optional fields that are empty
        if ((field === 'phone' || field === 'website') && !element.value.trim()) {
            setFieldValidity(element, true);
            return true;
        }
        
        // Special handling for checkbox
        if (field === 'privacyPolicy') {
            const isValid = element.checked;
            setFieldValidity(element, isValid, errorMessages[field]);
            return isValid;
        }
        
        // Validate based on pattern
        const pattern = patterns[field];
        const value = element.value.trim();
        let isValid = false;
        
        if (field === 'email') {
            // More comprehensive email validation
            isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
        } else if (pattern) {
            isValid = pattern.test(value);
        } else {
            // Default required field check
            isValid = value.length > 0;
        }
        
        setFieldValidity(element, isValid, errorMessages[field]);
        return isValid;
    }
    
    /**
     * Set field validity and display appropriate feedback
     * @param {HTMLElement} element - Form element
     * @param {boolean} isValid - Whether the field is valid
     * @param {string} message - Error message to display if invalid
     */
    function setFieldValidity(element, isValid, message = '') {
        const formControl = element.closest('.form-control, .form-check') || element;
        const feedback = formControl.querySelector('.invalid-feedback');
        
        if (isValid) {
            element.classList.remove('is-invalid');
            element.classList.add('is-valid');
            if (feedback) {
                feedback.textContent = '';
            }
        } else {
            element.classList.remove('is-valid');
            element.classList.add('is-invalid');
            if (feedback) {
                feedback.textContent = message || 'This field is required';
            }
        }
    }
    
    // Add real-time validation on input
    const formInputs = contactForm.querySelectorAll('input, textarea, select');
    formInputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
            }
        });
    });
    
    // Phone number formatting - removed to allow flexible international formats
    
    /**
     * Reset form validation state
     */
    function resetValidation() {
        // Remove all validation classes and reset feedback
        Object.values(formElements).forEach(element => {
            if (!element) return;
            
            element.classList.remove('is-valid', 'is-invalid');
            const formControl = element.closest('.form-control, .form-check');
            if (formControl) {
                const feedback = formControl.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = '';
                }
            }
        });
        
        // Hide any previous messages
        hideAlert();
    }
    
    function showValidationErrors() {
        // Add 'was-validated' to show validation messages
        contactForm.classList.add('was-validated');
    }
    
    /**
     * Handle form submission via AJAX
     */
    function submitForm() {
        const submitButton = contactForm.querySelector('button[type="submit"]');
        const buttonText = submitButton.querySelector('.button-text');
        const spinner = submitButton.querySelector('.spinner-border');
        
        // Show loading state
        submitButton.disabled = true;
        buttonText.textContent = 'Sending...';
        spinner.classList.remove('d-none');
        
        // Get form data
        const formData = new FormData(contactForm);
        
        // Show loading state to user
        showAlert('Sending your message...', 'info');
        
        // Submit form via AJAX
        fetch(contactForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            credentials: 'same-origin'
        })
        .then(handleResponse)
        .then(handleSuccess)
        .catch(handleError)
        .finally(() => {
            // Reset button state
            submitButton.disabled = false;
            buttonText.textContent = 'Send Message';
            spinner.classList.add('d-none');
        });
        
        /**
         * Handle the response from the server
         */
        function handleResponse(response) {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        }
        
        /**
         * Handle successful form submission
         */
        function handleSuccess(data) {
            if (data.success) {
                // Show success message
                showAlert(data.message || 'Your message has been sent successfully!', 'success');
                
                // Reset form
                contactForm.reset();
                contactForm.classList.remove('was-validated');
                
                // Redirect if needed
                if (data.redirect) {
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 2000);
                }
            } else {
                // Show validation errors
                if (data.errors) {
                    Object.entries(data.errors).forEach(([field, message]) => {
                        const input = contactForm.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('is-invalid');
                            const formControl = input.closest('.form-control, .form-check') || input;
                            const feedback = formControl.querySelector('.invalid-feedback');
                            if (feedback) {
                                feedback.textContent = message;
                            }
                        }
                    });
                    showAlert(data.message || 'Please correct the errors below.', 'danger');
                } else {
                    showAlert(data.message || 'An error occurred. Please try again.', 'danger');
                }
                
                // Scroll to first error
                const firstError = contactForm.querySelector('.is-invalid');
                if (firstError) {
                    firstError.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    firstError.focus();
                }
            }
        }
        
        /**
         * Handle form submission errors
         */
        function handleError(error) {
            console.error('Form submission error:', error);
            showAlert(
                'Sorry, something went wrong while sending your message. Please try again later or contact us directly at support@appnomu.com', 
                'danger'
            );
        }
    }
    
    /**
     * Show an alert message
     * @param {string} message - The message to display
     * @param {string} type - The type of alert (success, danger, warning, info)
     */
    function showAlert(message, type = 'info') {
        const formMessages = document.getElementById('formMessages');
        const alertMessage = document.getElementById('alertMessage');
        
        if (formMessages && alertMessage) {
            // Set alert content and style
            alertMessage.textContent = message;
            
            // Remove all alert classes and add the appropriate one
            formMessages.className = 'alert';
            formMessages.classList.add(`alert-${type}`, 'alert-dismissible', 'fade', 'show');
            
            // Make it visible
            formMessages.style.display = 'block';
            
            // Scroll to the alert
            setTimeout(() => {
                formMessages.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 100);
            
            // Auto-hide success messages after 5 seconds
            if (type === 'success') {
                setTimeout(() => {
                    hideAlert();
                }, 10000);
            }
        }
    }
    
    /**
     * Hide the alert message
     */
    function hideAlert() {
        const formMessages = document.getElementById('formMessages');
        if (formMessages) {
            formMessages.style.display = 'none';
        }
    }
});
