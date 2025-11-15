/**
 * Exit Intent Popup with Discount Offer
 * Triggers when the user's mouse leaves the window (indicating they might close the tab/window)
 */

(function() {
    // Cookie to track if user has already seen the popup (more persistent than sessionStorage)
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }
    
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    
    // Check if user has already seen the popup
    const hasSeenPopup = getCookie('exitPopupShown');
    
    // Flag to ensure we only show the popup once per visit
    let popupShownThisVisit = false;
    
    // Only show if they haven't seen it before or it's been more than 7 days
    if (!hasSeenPopup && !popupShownThisVisit) {
        // Detect when the mouse leaves the window
        document.addEventListener('mouseout', function(e) {
            // If the mouse leaves the top of the page, show the popup
            if (!popupShownThisVisit && e.clientY < 5 && !e.relatedTarget) {
                showExitPopup();
                // Mark that the popup has been shown
                popupShownThisVisit = true;
                setCookie('exitPopupShown', 'true', 7); // Show again after 7 days
            }
        });
    }
    
    // Function to show the exit popup
    function showExitPopup() {
        const popup = document.getElementById('exit-intent-popup');
        if (popup) {
            popup.classList.add('show');
            
            // Add analytics tracking for popup display
            if (typeof gtag === 'function') {
                gtag('event', 'view_promotion', {
                    'promotion_name': 'exit_intent_45_discount',
                    'promotion_id': 'exit_45_off'
                });
            }
            
            // Handle close button click
            const closeBtn = document.getElementById('exit-popup-close');
            if (closeBtn) {
                // Remove any existing event listeners
                const newCloseBtn = closeBtn.cloneNode(true);
                closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);
                
                // Add event listener to the new button
                newCloseBtn.addEventListener('click', function() {
                    popup.classList.remove('show');
                    
                    // Add analytics tracking for popup close
                    if (typeof gtag === 'function') {
                        gtag('event', 'close_promotion', {
                            'promotion_name': 'exit_intent_45_discount',
                            'promotion_id': 'exit_45_off'
                        });
                    }
                });
            }
            
            // Handle clicking outside the popup to close it
            popup.addEventListener('click', function(e) {
                // If the click is directly on the background (not on popup content)
                if (e.target === popup) {
                    popup.classList.remove('show');
                }
            });
            
            // Handle escape key to close popup
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && popup.classList.contains('show')) {
                    popup.classList.remove('show');
                }
            });
            
            // Handle CTA button click
            const ctaBtn = document.getElementById('exit-popup-cta');
            if (ctaBtn) {
                ctaBtn.addEventListener('click', function() {
                    // Add analytics tracking for CTA click
                    if (typeof gtag === 'function') {
                        gtag('event', 'select_promotion', {
                            'promotion_name': 'exit_intent_45_discount',
                            'promotion_id': 'exit_45_off'
                        });
                    }
                });
            }
        }
    }
})();
