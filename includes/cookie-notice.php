<?php
// Cookie Notice Component for AppNomu Website
?>

<!-- Cookie Consent Notice -->
<div id="cookieNotice" class="cookie-notice bg-primary text-white">
    <div class="cookie-container">
        <div class="cookie-content">
            <h5 class="mb-2">Cookie Notice</h5>
            <p class="mb-3">This website uses cookies to enhance your browsing experience, analyze site traffic, and personalize content.</p>
            <div class="cookie-buttons d-flex flex-wrap gap-2 mb-2">
                <button id="cookieCustomize" class="btn btn-sm btn-outline-light">Customize</button>
                <button id="cookieReject" class="btn btn-sm btn-outline-light">Reject All</button>
                <button id="cookieAccept" class="btn btn-sm btn-light text-primary">Accept All</button>
            </div>
        </div>
        
        <!-- Cookie Preferences Panel -->
        <div id="cookiePreferences" class="cookie-preferences mt-3" style="display: none;">
            <h6 class="mb-2">Cookie Preferences</h6>
            <div class="cookie-prefs-list">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="necessaryCookies" checked disabled>
                    <label class="form-check-label" for="necessaryCookies">
                        <strong>Necessary</strong> <span class="text-white-50">(Required)</span>
                    </label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="analyticsCookies" checked>
                    <label class="form-check-label" for="analyticsCookies">
                        <strong>Analytics</strong>
                    </label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="marketingCookies">
                    <label class="form-check-label" for="marketingCookies">
                        <strong>Marketing</strong>
                    </label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="preferenceCookies" checked>
                    <label class="form-check-label" for="preferenceCookies">
                        <strong>Preferences</strong>
                    </label>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button id="cookieSavePreferences" class="btn btn-sm btn-light text-primary">Save Preferences</button>
            </div>
        </div>
    </div>
</div>

<!-- Cookie Notice CSS -->
<style>
.cookie-notice {
    position: fixed;
    bottom: 30px;
    left: 30px;
    width: 400px;
    max-width: calc(100% - 60px);
    padding: 1.5rem;
    z-index: 1000;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    border-radius: 8px;
}

.cookie-container {
    width: 100%;
}

.cookie-buttons .btn {
    font-weight: 600;
}

.cookie-preferences {
    border-top: 1px solid rgba(255,255,255,0.2);
    padding-top: 1.5rem;
}

.form-check-input:checked {
    background-color: #fff;
    border-color: #fff;
}

.form-switch .form-check-input:focus {
    border-color: rgba(255,255,255,0.5);
    box-shadow: 0 0 0 0.25rem rgba(255,255,255,0.25);
}

.form-check-label p.small {
    opacity: 0.8;
}

/* Animation */
#cookieNotice {
    transform: translateX(-120%);
    transition: transform 0.4s ease-out;
    opacity: 0;
}

#cookieNotice.show {
    transform: translateX(0);
    opacity: 1;
}
</style>

<!-- Cookie Notice JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Cookie functions
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }
    
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    
    // Show cookie notice if consent not given
    var cookieNotice = document.getElementById('cookieNotice');
    var cookiePrefs = document.getElementById('cookiePreferences');
    var hasConsent = getCookie('appNomuCookieConsent');
    
    if (!hasConsent) {
        // Show after a slight delay
        setTimeout(function() {
            cookieNotice.classList.add('show');
        }, 1000);
    }
    
    // Cookie customize button
    document.getElementById('cookieCustomize').addEventListener('click', function() {
        cookiePrefs.style.display = (cookiePrefs.style.display === 'none') ? 'block' : 'none';
    });
    
    // Cookie accept all button
    document.getElementById('cookieAccept').addEventListener('click', function() {
        setCookie('appNomuCookieConsent', 'all', 365);
        setCookie('appNomuCookieAnalytics', 'true', 365);
        setCookie('appNomuCookieMarketing', 'true', 365);
        setCookie('appNomuCookiePreference', 'true', 365);
        cookieNotice.classList.remove('show');
        setTimeout(function() {
            cookieNotice.style.display = 'none';
        }, 300);
    });
    
    // Cookie reject all button
    document.getElementById('cookieReject').addEventListener('click', function() {
        setCookie('appNomuCookieConsent', 'necessary', 365);
        setCookie('appNomuCookieAnalytics', 'false', 365);
        setCookie('appNomuCookieMarketing', 'false', 365);
        setCookie('appNomuCookiePreference', 'false', 365);
        cookieNotice.classList.remove('show');
        setTimeout(function() {
            cookieNotice.style.display = 'none';
        }, 300);
    });
    
    // Save preferences button
    document.getElementById('cookieSavePreferences').addEventListener('click', function() {
        setCookie('appNomuCookieConsent', 'custom', 365);
        setCookie('appNomuCookieAnalytics', document.getElementById('analyticsCookies').checked ? 'true' : 'false', 365);
        setCookie('appNomuCookieMarketing', document.getElementById('marketingCookies').checked ? 'true' : 'false', 365);
        setCookie('appNomuCookiePreference', document.getElementById('preferenceCookies').checked ? 'true' : 'false', 365);
        cookieNotice.classList.remove('show');
        setTimeout(function() {
            cookieNotice.style.display = 'none';
        }, 300);
    });
});
</script>
