<?php
// GDPR Notice Component
// This file provides the GDPR compliance notice for EU visitors
?>

<!-- GDPR Compliance Banner -->
<div id="gdpr-banner" class="position-fixed bottom-0 start-0 end-0 bg-dark text-white p-3 shadow" style="z-index: 1050; display: none;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h5 class="mb-2">GDPR Privacy Notice for EU Visitors</h5>
                <p class="mb-0">This website is operated by AppNomu Business Services and processes personal data in accordance with the EU General Data Protection Regulation (GDPR). We collect and process data for purposes including providing our services, fulfilling contractual obligations, legitimate business interests, and with your consent. You have rights to access, correct, delete, restrict processing, and port your personal data. For more information, please review our <a href="privacy-policy.php" class="text-primary">Privacy Policy</a> and <a href="cookie-policy.php" class="text-primary">Cookie Policy</a>.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <button id="gdpr-settings" class="btn btn-outline-light me-2">Privacy Settings</button>
                <button id="gdpr-accept" class="btn btn-primary">Accept All</button>
            </div>
        </div>
    </div>
</div>

<!-- GDPR Settings Modal -->
<div class="modal fade" id="gdprSettingsModal" tabindex="-1" aria-labelledby="gdprSettingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="gdprSettingsModalLabel">Privacy Settings</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <p>We use cookies and similar technologies to enhance your browsing experience, analyze site traffic, and personalize content. You can choose which categories of cookies you allow us to use. Essential cookies are always enabled as they are necessary for the website to function.</p>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="cookieEssential" checked disabled>
                        <label class="form-check-label" for="cookieEssential">
                            <strong>Essential Cookies</strong>
                        </label>
                    </div>
                    <p class="text-muted small ms-4">These cookies are necessary for the website to function and cannot be switched off. They are usually set in response to actions made by you such as setting your privacy preferences, logging in, or filling in forms.</p>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="cookiePreference">
                        <label class="form-check-label" for="cookiePreference">
                            <strong>Preference Cookies</strong>
                        </label>
                    </div>
                    <p class="text-muted small ms-4">These cookies enable us to remember your preferences and settings for a better experience, such as your language preference or region.</p>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="cookieAnalytics">
                        <label class="form-check-label" for="cookieAnalytics">
                            <strong>Analytics Cookies</strong>
                        </label>
                    </div>
                    <p class="text-muted small ms-4">These cookies help us understand how visitors interact with our website by collecting and reporting information anonymously. This helps us improve our website and services.</p>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="cookieMarketing">
                        <label class="form-check-label" for="cookieMarketing">
                            <strong>Marketing Cookies</strong>
                        </label>
                    </div>
                    <p class="text-muted small ms-4">These cookies track your browsing habits to enable us and third-party advertisers to show you relevant ads based on your interests.</p>
                </div>
                
                <div class="mt-4 pt-3 border-top">
                    <h6>Your GDPR Rights</h6>
                    <p>Under the General Data Protection Regulation (GDPR), if you are an EU resident, you have the following rights:</p>
                    <ul>
                        <li>Right to access your personal data</li>
                        <li>Right to rectify inaccurate personal data</li>
                        <li>Right to erasure ('right to be forgotten')</li>
                        <li>Right to restrict processing</li>
                        <li>Right to data portability</li>
                        <li>Right to object to processing</li>
                        <li>Right not to be subject to automated decision-making</li>
                    </ul>
                    <p>To exercise these rights, please contact our Data Protection Officer at <a href="mailto:privacy@appnomu.com">privacy@appnomu.com</a>.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="rejectAllCookies">Reject All</button>
                <button type="button" class="btn btn-success" id="saveCookiePreferences">Save Preferences</button>
                <button type="button" class="btn btn-primary" id="acceptAllCookies">Accept All</button>
            </div>
        </div>
    </div>
</div>

<!-- GDPR JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to check if user is from EU (simplified for demonstration)
        // In production, use a proper IP geolocation service to detect EU visitors
        function isEUVisitor() {
            // This is a simplified check - in production, use a proper geolocation service
            // For demonstration, we'll assume all users are from EU unless they've already responded to the notice
            return !localStorage.getItem('gdpr_preferences');
        }
        
        // Show GDPR banner for EU visitors
        if (isEUVisitor()) {
            document.getElementById('gdpr-banner').style.display = 'block';
        }
        
        // Load saved preferences
        function loadPreferences() {
            const preferences = JSON.parse(localStorage.getItem('gdpr_preferences') || '{}');
            
            if (preferences.preference) document.getElementById('cookiePreference').checked = true;
            if (preferences.analytics) document.getElementById('cookieAnalytics').checked = true;
            if (preferences.marketing) document.getElementById('cookieMarketing').checked = true;
        }
        
        // Save user preferences
        function savePreferences(allAccepted = false) {
            const preferences = allAccepted ? 
                { essential: true, preference: true, analytics: true, marketing: true } :
                {
                    essential: true, // Always required
                    preference: document.getElementById('cookiePreference').checked,
                    analytics: document.getElementById('cookieAnalytics').checked,
                    marketing: document.getElementById('cookieMarketing').checked
                };
                
            localStorage.setItem('gdpr_preferences', JSON.stringify(preferences));
            document.getElementById('gdpr-banner').style.display = 'none';
            
            // Apply cookie preferences
            applyCookiePreferences(preferences);
            
            // Close modal if open
            const modal = bootstrap.Modal.getInstance(document.getElementById('gdprSettingsModal'));
            if (modal) modal.hide();
        }
        
        // Apply cookie preferences by enabling/disabling scripts
        function applyCookiePreferences(preferences) {
            // This is where you would implement logic to enable/disable various tracking scripts
            // based on user preferences. For example:
            
            // Analytics (like Google Analytics)
            if (preferences.analytics) {
                // Enable analytics scripts
                console.log('Analytics cookies enabled');
            } else {
                // Disable analytics scripts
                console.log('Analytics cookies disabled');
            }
            
            // Marketing
            if (preferences.marketing) {
                // Enable marketing scripts
                console.log('Marketing cookies enabled');
            } else {
                // Disable marketing scripts
                console.log('Marketing cookies disabled');
            }
        }
        
        // Reject all non-essential cookies
        function rejectAllCookies() {
            document.getElementById('cookiePreference').checked = false;
            document.getElementById('cookieAnalytics').checked = false;
            document.getElementById('cookieMarketing').checked = false;
            
            savePreferences();
        }
        
        // Event listeners
        document.getElementById('gdpr-accept').addEventListener('click', function() {
            savePreferences(true);
        });
        
        document.getElementById('gdpr-settings').addEventListener('click', function() {
            loadPreferences();
            new bootstrap.Modal(document.getElementById('gdprSettingsModal')).show();
        });
        
        document.getElementById('acceptAllCookies').addEventListener('click', function() {
            savePreferences(true);
        });
        
        document.getElementById('saveCookiePreferences').addEventListener('click', function() {
            savePreferences();
        });
        
        document.getElementById('rejectAllCookies').addEventListener('click', function() {
            rejectAllCookies();
        });
        
        // Add a global function to open the settings modal from other places on the site
        window.openGDPRSettings = function() {
            loadPreferences();
            new bootstrap.Modal(document.getElementById('gdprSettingsModal')).show();
        };
        
        // Load preferences when the page loads
        if (localStorage.getItem('gdpr_preferences')) {
            applyCookiePreferences(JSON.parse(localStorage.getItem('gdpr_preferences')));
        }
    });
</script>
