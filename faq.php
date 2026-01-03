<?php
// Ensure default navigation is used
unset($menuItems);
// Include header
include_once 'includes/header.php';
?>

<!-- FAQ Hero Section -->
<section class="page-hero centered">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-label">FREQUENTLY ASKED QUESTIONS</span>
                <h1>Got Questions? <span style="color: #10b981;">We've Got Answers</span></h1>
                <p>Everything you need to know about our services, pricing, and processes. Can't find what you're looking for? Contact us directly.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                    <a href="#general-faq" class="btn btn-cta">Browse FAQs <i class="bi bi-arrow-down ms-2"></i></a>
                    <a href="contact" class="btn" style="background: #f3f4f6; color: #374151; padding: 0.625rem 1.5rem; border-radius: 8px; font-weight: 600;">Contact Support</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Categories Navigation -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav nav-pills justify-content-center flex-wrap gap-2">
                    <a class="nav-link active" href="#general-faq">General</a>
                    <a class="nav-link" href="#services-faq">Services</a>
                    <a class="nav-link" href="#pricing-faq">Pricing</a>
                    <a class="nav-link" href="#hosting-faq">Hosting</a>
                    <a class="nav-link" href="#support-faq">Support</a>
                    <a class="nav-link" href="#technical-faq">Technical</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                
                <!-- General FAQ -->
                <div id="general-faq" class="mb-5">
                    <h2 class="h3 fw-bold mb-4 text-primary">General Questions</h2>
                    
                    <div class="accordion" id="generalAccordion">
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#general1">
                                    What services does AppNomu offer?
                                </button>
                            </h3>
                            <div id="general1" class="accordion-collapse collapse show" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    <p>AppNomu offers comprehensive digital services including:</p>
                                    <ul>
                                        <li><strong>Website Design & Development</strong> - Custom responsive websites delivered in 3 days</li>
                                        <li><strong>Mobile App Development</strong> - iOS and Android apps for businesses</li>
                                        <li><strong>Web Hosting</strong> - Fast SSD hosting with 99.9% uptime guarantee</li>
                                        <li><strong>Domain Registration</strong> - .com, .co.ug, .co.ke domains</li>
                                        <li><strong>Custom Software Development</strong> - Enterprise solutions and CRM systems</li>
                                        <li><strong>Digital Marketing</strong> - SEO, Google Ads, and social media marketing</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#general2">
                                    Which countries do you serve?
                                </button>
                            </h3>
                            <div id="general2" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    <p>We serve clients across multiple countries with offices in:</p>
                                    <ul>
                                        <li><strong>Uganda</strong> - Our headquarters in Bugiri Municipality</li>
                                        <li><strong>USA</strong> - Office in Dover, Delaware</li>
                                        <li><strong>Kenya, South Africa, India</strong> - Remote teams and partnerships</li>
                                    </ul>
                                    <p>We work with clients globally but specialize in African markets with comprehensive payment integration for all major payment processors with APIs, including mobile money, banking, and digital wallet solutions.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#general3">
                                    How experienced is AppNomu?
                                </button>
                            </h3>
                            <div id="general3" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    <p>AppNomu has extensive experience with:</p>
                                    <ul>
                                        <li><strong>1,200+ websites</strong> developed and delivered</li>
                                        <li><strong>100+ mobile applications</strong> built for various industries</li>
                                        <li><strong>300+ domains</strong> registered and managed</li>
                                        <li><strong>20+ expert developers</strong> across Africa, India, and USA</li>
                                        <li><strong>5+ years</strong> serving African businesses</li>
                                    </ul>
                                    <p>We've worked across 8+ industries including healthcare, education, e-commerce, agriculture, and finance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services FAQ -->
                <div id="services-faq" class="mb-5">
                    <h2 class="h3 fw-bold mb-4 text-primary">Services & Delivery</h2>
                    
                    <div class="accordion" id="servicesAccordion">
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#services1">
                                    Can you really deliver a website in 3 days?
                                </button>
                            </h3>
                            <div id="services1" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                                <div class="accordion-body">
                                    <p><strong>Yes!</strong> Our 3-day delivery process works like this:</p>
                                    <ul>
                                        <li><strong>Day 1:</strong> Design and content planning</li>
                                        <li><strong>Day 2:</strong> Development and functionality</li>
                                        <li><strong>Day 3:</strong> Testing, optimization, and launch</li>
                                    </ul>
                                    <p>This applies to standard business websites. Complex e-commerce sites or custom applications may take 5-10 days depending on requirements.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#services2">
                                    What's included in a standard website?
                                </button>
                            </h3>
                            <div id="services2" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                                <div class="accordion-body">
                                    <p>Every website includes:</p>
                                    <ul>
                                        <li>Responsive design (mobile, tablet, desktop)</li>
                                        <li>SEO optimization</li>
                                        <li>Free SSL certificate</li>
                                        <li>Contact forms</li>
                                        <li>Social media integration</li>
                                        <li>Google Analytics setup</li>
                                        <li>1 year free hosting</li>
                                        <li>30-day support after launch</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#services3">
                                    Do you provide content for websites?
                                </button>
                            </h3>
                            <div id="services3" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                                <div class="accordion-body">
                                    <p>We offer flexible content options:</p>
                                    <ul>
                                        <li><strong>You provide content:</strong> We'll format and optimize it</li>
                                        <li><strong>Content creation service:</strong> Additional $200-500 depending on pages</li>
                                        <li><strong>Content templates:</strong> We provide industry-specific templates you can customize</li>
                                    </ul>
                                    <p>We always optimize all content for SEO and user experience.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing FAQ -->
                <div id="pricing-faq" class="mb-5">
                    <h2 class="h3 fw-bold mb-4 text-primary">Pricing & Payments</h2>
                    
                    <div class="accordion" id="pricingAccordion">
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#pricing1">
                                    How much does a website cost?
                                </button>
                            </h3>
                            <div id="pricing1" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    <p>Website pricing starts at <strong>$299</strong> and varies by complexity:</p>
                                    <ul>
                                        <li><strong>Basic Business Website:</strong> $299 - $599</li>
                                        <li><strong>E-commerce Store:</strong> $799 - $1,499</li>
                                        <li><strong>Custom Web Application:</strong> $1,500 - $5,000+</li>
                                        <li><strong>Enterprise Solution:</strong> Custom quote</li>
                                    </ul>
                                    <p>All prices include 1 year free hosting and 30-day support.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#pricing2">
                                    What payment methods do you accept?
                                </button>
                            </h3>
                            <div id="pricing2" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    <p>We accept multiple payment methods for your convenience:</p>
                                    <ul>
                                        <li><strong>Mobile Money:</strong> All major providers (M-Pesa, MTN, Airtel, Orange, Tigo, etc.)</li>
                                        <li><strong>Credit/Debit Cards:</strong> Visa, Mastercard, American Express</li>
                                        <li><strong>Digital Wallets:</strong> PayPal, Skrill, Payoneer</li>
                                        <li><strong>Bank Transfer:</strong> Direct bank deposits and wire transfers</li>
                                        <li><strong>Cryptocurrency:</strong> Bitcoin, Ethereum (for international clients)</li>
                                        <li><strong>Regional Processors:</strong> Flutterwave, Paystack, DPO Group, and more</li>
                                    </ul>
                                    <p>We also provide <strong>comprehensive payment integration services</strong> for your website, supporting any payment processor with a public API - from local mobile money to international gateways.</p>
                                </div>
                            </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#pricing3">
                                    Do you offer payment plans?
                                </button>
                            </h3>
                            <div id="pricing3" class="accordion-collapse collapse" data-bs-parent="#pricing3">
                                <div class="accordion-body">
                                    <p>Yes! We offer flexible payment options:</p>
                                    <ul>
                                        <li><strong>50% upfront, 50% on completion</strong> (standard)</li>
                                        <li><strong>3-month payment plan</strong> for projects over $1,000</li>
                                        <li><strong>Monthly subscriptions</strong> for ongoing services</li>
                                    </ul>
                                    <p>Payment plans are subject to approval and may include a small processing fee.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact CTA -->
                <div class="text-center mt-5 p-4 bg-light rounded-4">
                    <h3 class="fw-bold mb-3">Still Have Questions?</h3>
                    <p class="mb-4">Can't find the answer you're looking for? Our team is here to help you 24/7.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="contact" class="btn btn-primary btn-lg px-4">Contact Support</a>
                        <a href="tel:+256200948420" class="btn btn-outline-primary btn-lg px-4">Call: +256 200 948 420</a>
                        <a href="request-quote" class="btn btn-success btn-lg px-4">Get Free Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Smooth scrolling for FAQ navigation
document.querySelectorAll('.nav-pills .nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Update active state
        document.querySelectorAll('.nav-pills .nav-link').forEach(l => l.classList.remove('active'));
        this.classList.add('active');
        
        // Smooth scroll to section
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>

<?php
// Include footer
include_once 'includes/footer.php';
?>
