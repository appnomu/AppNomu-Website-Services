    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <!-- Company Info Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="mb-3">
                        <img src="https://services.appnomu.com/assets/images/AppNomu%20SalesQ%20logo.png" alt="AppNomu Logo" height="45" class="footer-logo">
                    </div>
                    <p class="text-white-50 mb-4">Professional web design, mobile apps, and digital solutions for African businesses. Trusted by 1,200+ clients across Uganda, Kenya, and beyond.</p>
                    
                    <!-- Social Links -->
                    <div class="mb-4">
                        <h6 class="text-white mb-3">Follow Us</h6>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/appnomu" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://x.com/appnomuSalesQ" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/our-appnomu" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="https://www.instagram.com/appnomu" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/@AppNomusalesQ" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Payment Methods -->
                    <div>
                        <h6 class="text-white mb-3">Payment Methods</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <div class="bg-white rounded p-1" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <img src="https://services.appnomu.com/assets/images/Airtel_logo.png" alt="Airtel Money" class="img-fluid" style="max-height: 20px;">
                            </div>
                            <div class="bg-white rounded p-1" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <img src="https://services.appnomu.com/assets/images/MTN%20logo.png" alt="MTN Mobile Money" class="img-fluid" style="max-height: 20px;">
                            </div>
                            <div class="bg-white rounded p-1" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" alt="Visa" class="img-fluid" style="max-height: 10px;">
                            </div>
                            <div class="bg-white rounded p-1" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" alt="Mastercard" class="img-fluid" style="max-height: 18px;">
                            </div>
                            <div class="bg-white rounded p-1" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1200px-PayPal.svg.png" alt="PayPal" class="img-fluid" style="max-height: 18px;">
                            </div>
                            <div class="bg-white rounded p-1" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-cash-stack text-success" style="font-size: 16px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Services Column -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="text-white mb-3">Services</h5>
                    <ul class="list-unstyled">
                        <?php if (isset($footerServices) && is_array($footerServices)): ?>
                            <?php foreach ($footerServices as $item): ?>
                                <li class="mb-2"><a href="<?php echo $item['url']; ?>" class="text-white-50 text-decoration-none"><?php echo $item['label']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'website-design-uganda' : 'website-design-uganda'; ?>" class="text-warning text-decoration-none fw-bold">🇺🇬 Website Design Uganda</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'services' : 'services'; ?>" class="text-white-50 text-decoration-none">Website Design</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'services' : 'services'; ?>" class="text-white-50 text-decoration-none">Mobile Apps</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'services' : 'services'; ?>" class="text-white-50 text-decoration-none">Software Dev</a></li>
                            <li class="mb-2"><a href="https://clients.appnomu.com/" target="_blank" class="text-white-50 text-decoration-none">Web Hosting</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'services' : 'services'; ?>" class="text-white-50 text-decoration-none">Domains</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <!-- Company Column -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="text-white mb-3">Company</h5>
                    <ul class="list-unstyled">
                        <?php if (isset($footerCompany) && is_array($footerCompany)): ?>
                            <?php foreach ($footerCompany as $item): ?>
                                <li class="mb-2"><a href="<?php echo $item['url']; ?>" class="text-white-50 text-decoration-none"><?php echo $item['label']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'about' : 'about'; ?>" class="text-white-50 text-decoration-none">About Us</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'portfolio' : 'portfolio'; ?>" class="text-white-50 text-decoration-none">Portfolio</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'team' : 'team'; ?>" class="text-white-50 text-decoration-none">Our Team</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'careers' : 'careers'; ?>" class="text-white-50 text-decoration-none">Careers</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'our-impact' : 'our-impact'; ?>" class="text-white-50 text-decoration-none">Our Impact</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'security' : 'security'; ?>" class="text-white-50 text-decoration-none">Security</a></li>
                            <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'faq' : 'faq'; ?>" class="text-white-50 text-decoration-none">FAQ</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <!-- Resources Column -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="text-white mb-3">Resources</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'payment-plans' : 'payment-plans'; ?>" class="text-warning text-decoration-none fw-bold">💳 Payment Plans</a></li>
                        <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'website-audit' : 'website-audit'; ?>" class="text-white-50 text-decoration-none">Website Audit</a></li>
                        <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'roi-calculator' : 'roi-calculator'; ?>" class="text-white-50 text-decoration-none">ROI Calculator</a></li>
                        <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'security' : 'security'; ?>" class="text-white-50 text-decoration-none">Security</a></li>
                        <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'blog' : 'blog'; ?>" class="text-white-50 text-decoration-none">Blog</a></li>
                        <li class="mb-2"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'request-quote' : 'request-quote'; ?>" class="text-white-50 text-decoration-none">Get Quote</a></li>
                    </ul>
                </div>
                
                <!-- Contact Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="text-white mb-3">Contact Us</h5>
                    
                    <!-- Uganda Office -->
                    <div class="mb-3">
                        <h6 class="text-white-50 mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i>Uganda Office</h6>
                        <p class="text-white-50 mb-1 small">77 Market Street</p>
                        <p class="text-white-50 mb-2 small">Bugiri Municipality, Uganda</p>
                        <p class="text-white-50 mb-0 small"><i class="bi bi-telephone me-2"></i><a href="tel:+256200948420" class="text-white-50 text-decoration-none">+256 200 948 420</a></p>
                    </div>
                    
                    <!-- USA Office -->
                    <div class="mb-3">
                        <h6 class="text-white-50 mb-2"><i class="bi bi-geo-alt me-2 text-info"></i>USA Office</h6>
                        <p class="text-white-50 mb-1 small">631 Ridgel St</p>
                        <p class="text-white-50 mb-2 small">Dover, Delaware 19904-2772</p>
                        <p class="text-white-50 mb-0 small"><i class="bi bi-telephone me-2"></i><a href="tel:+18886522233" class="text-white-50 text-decoration-none">+1 888 652 2233</a></p>
                    </div>
                    
                    <!-- Email -->
                    <div class="mb-3">
                        <p class="text-white-50 mb-0"><i class="bi bi-envelope me-2 text-success"></i><a href="mailto:info@appnomu.com" class="text-white-50 text-decoration-none">info@appnomu.com</a></p>
                    </div>
                    
                </div>
            </div>
            
            <hr class="my-4">
            
            <!-- Trust Badges & Quick Stats -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex flex-wrap justify-content-center gap-4 text-center">
                        <div class="trust-badge">
                            <i class="bi bi-shield-check text-success fs-3 mb-2"></i>
                            <p class="mb-0 small text-white-50">Secure & Trusted</p>
                        </div>
                        <div class="trust-badge">
                            <i class="bi bi-clock-history text-info fs-3 mb-2"></i>
                            <p class="mb-0 small text-white-50">24/7 Support</p>
                        </div>
                        <a href="https://www.trustpilot.com/review/appnomu.com" target="_blank" class="text-decoration-none">
                            <div class="trust-badge">
                                <i class="bi bi-star-fill text-warning fs-3 mb-2"></i>
                                <p class="mb-0 small text-white-50">4.6★ Trustpilot</p>
                            </div>
                        </a>
                        <a href="https://www.capterra.com/p/268650/AppNomu/reviews/" target="_blank" class="text-decoration-none">
                            <div class="trust-badge">
                                <i class="bi bi-star-fill text-warning fs-3 mb-2"></i>
                                <p class="mb-0 small text-white-50">4.6★ Capterra</p>
                            </div>
                        </a>
                        <a href="https://www.softwaresuggest.com/appnomu" target="_blank" class="text-decoration-none">
                            <div class="trust-badge">
                                <i class="bi bi-star-fill text-warning fs-3 mb-2"></i>
                                <p class="mb-0 small text-white-50">4.7★ Software Suggest</p>
                            </div>
                        </a>
                        <div class="trust-badge">
                            <i class="bi bi-people text-primary fs-3 mb-2"></i>
                            <p class="mb-0 small text-white-50">1,200+ Clients</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> AppNomu SalesQ Ltd. All rights reserved.</p>
                    <p class="small text-white-50 mt-1">Proudly designed with <i class="bi bi-heart-fill text-danger"></i> by the CEO - Bahati Asher Faith himself</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <ul class="list-inline mb-0">
                        <?php if (isset($footerLegal) && is_array($footerLegal)): ?>
                            <?php foreach ($footerLegal as $item): ?>
                                <li class="list-inline-item"><a href="<?php echo $item['url']; ?>" class="text-white-50"><?php echo $item['label']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="list-inline-item"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'privacy-policy' : 'privacy-policy'; ?>" class="text-white-50">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'terms-of-service' : 'terms-of-service'; ?>" class="text-white-50">Terms of Service</a></li>
                            <li class="list-inline-item"><a href="<?php echo isset($baseUrl) ? $baseUrl . 'cookie-policy' : 'cookie-policy'; ?>" class="text-white-50">Cookie Policy</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
    
    <!-- Form Enhancements (safe - optional) -->
    <?php if (file_exists('assets/js/form-enhancements.js')): ?>
    <script src="assets/js/form-enhancements.js"></script>
    <?php endif; ?>
    
    <!-- Accessibility Enhancements (ultra-basic) -->
    <?php if (file_exists('assets/js/accessibility-basic.js')): ?>
    <script src="assets/js/accessibility-basic.js"></script>
    <?php else: ?>
    <!-- Fallback accessibility -->
    <script>
    console.log('⚠️ Accessibility file not found, using inline fallback');
    window.accessibilityLoaded = true;
    window.announceToScreenReader = function(msg) { console.log('📢', msg); };
    </script>
    <?php endif; ?>
    
    <!-- Image Optimization (safe - optional) -->
    <?php if (file_exists('assets/js/image-optimization.js')): ?>
    <script src="assets/js/image-optimization.js"></script>
    <?php endif; ?>
    
    <!-- Contact Form JS (only on contact page) -->
    <?php if (basename($_SERVER['PHP_SELF']) === 'contact.php'): ?>
    <script src="assets/js/contact-form.js"></script>
    <?php endif; ?>
    
    <!-- Cookie Notice -->
    <?php include_once 'includes/cookie-notice.php'; ?>
    
    <!-- Intercom Chat Widget -->
    <script>
    (function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/j2sfvra7';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(document.readyState==='complete'){l();}else if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
    
    // Configure Intercom
    window.Intercom('boot', {
        app_id: 'j2sfvra7'
    });
    </script>
    
    <!-- Exit Intent Popup removed as it's no longer being used -->

</body>
</html>
