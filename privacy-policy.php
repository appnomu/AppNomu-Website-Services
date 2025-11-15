<?php
// Include session helper first to avoid headers already sent warning
include_once 'includes/session_helper.php';
// Include header after session has been initialized
include_once 'includes/header.php';
?>

<!-- Enhanced Privacy Policy Hero Section -->
<section class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-light text-primary mb-0 px-3 py-2 fw-bold me-3">LEGAL DOCUMENT</span>
                    <span class="badge bg-success mb-0 px-3 py-2 fw-bold text-white">GDPR COMPLIANT</span>
                </div>
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2;">
                    <span style="background: linear-gradient(45deg, #60a5fa, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Privacy</span> Policy
                </h1>
                <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">
                    Your privacy is our priority. Learn how AppNomu Business Services protects, collects, and uses your personal information in compliance with Uganda's Data Protection Act and international standards.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="#information-collection" class="btn btn-light btn-lg fw-bold px-4 py-3 text-primary">View Details</a>
                    <a href="contact.php" class="btn btn-outline-light btn-lg px-4 py-3">Contact Privacy Officer</a>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <!-- Privacy Stats -->
                <div class="row g-3">
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">2019</h3>
                            <p class="mb-0 text-white-50">Uganda Data Act</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">72H</h3>
                            <p class="mb-0 text-white-50">Breach Notification</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">30D</h3>
                            <p class="mb-0 text-white-50">Response Time</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">100%</h3>
                            <p class="mb-0 text-white-50">Compliance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Privacy Policy Quick Navigation -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="#information-collection" class="btn btn-outline-primary btn-sm">Information Collection</a>
                    <a href="#data-usage" class="btn btn-outline-primary btn-sm">Data Usage</a>
                    <a href="#your-rights" class="btn btn-outline-primary btn-sm">Your Rights</a>
                    <a href="#security" class="btn btn-outline-primary btn-sm">Security</a>
                    <a href="#contact-us" class="btn btn-outline-primary btn-sm">Contact Us</a>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="bi bi-calendar-check me-1"></i>
                        Last Updated: January 7, 2025 | 
                        <i class="bi bi-shield-check me-1"></i>
                        Compliant with Uganda Data Protection Act 2019
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4 mb-lg-0">
                <!-- Table of Contents -->
                <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Table of Contents</h5>
                    </div>
                    <div class="card-body p-3">
                        <nav class="nav flex-column">
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#introduction">Introduction</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#information-collection">Information Collection</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#data-usage">Data Usage</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#information-disclosure">Information Disclosure</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#service-specific">Service-Specific Privacy</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#website-audit">Website Audit Tool</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#quotation-system">Quotation Requests</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#security">Security</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#your-rights">Your Rights</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#data-retention">Data Retention</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#contact-us">Contact Us</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <div id="introduction">
                            <h2 class="h3 mb-4 text-primary">
                                <i class="bi bi-info-circle me-2"></i>Introduction
                            </h2>
                        <p>AppNomu Business Services ("AppNomu," "we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services.</p>
                        <p>This Privacy Policy has been developed in accordance with applicable laws, including the Uganda Data Protection and Privacy Act, 2019 and the Computer Misuse Act, 2011 (as amended). We respect your right to privacy and are committed to protecting and responsibly handling the personal information you share with us.</p>
                        <p>Please read this Privacy Policy carefully. By accessing or using our website or services, you acknowledge that you have read, understood, and agree to be bound by all the terms outlined in this Privacy Policy.</p>
                        </div>
                        
                        <div id="data-overview" class="mt-5">
                            <h2 class="h3 mb-4 text-primary">
                                <i class="bi bi-database me-2"></i>Data Collection & Usage Overview
                            </h2>
                            <p>This section provides a clear, concise overview of how we handle your data. For detailed information, please refer to the relevant sections below.</p>
                            
                            <div class="row g-4 mt-4">
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h4 class="h5 text-primary"><i class="bi bi-collection me-2"></i>What We Collect</h4>
                                            <ul class="mb-0">
                                                <li>Account & contact details</li>
                                                <li>Billing & payment information</li>
                                                <li>Website usage data & analytics</li>
                                                <li>Device and browser information</li>
                                                <li>Customer support communications</li>
                                                <li>Website audit data (when using our tools)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h4 class="h5 text-primary"><i class="bi bi-shield-lock me-2"></i>How We Protect Data</h4>
                                            <ul class="mb-0">
                                                <li>Encryption in transit and at rest</li>
                                                <li>Regular security audits</li>
                                                <li>Access controls & monitoring</li>
                                                <li>Secure data centers</li>
                                                <li>Staff training on data protection</li>
                                                <li>Incident response planning</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h4 class="h5 text-primary"><i class="bi bi-graph-up me-2"></i>How We Use Data</h4>
                                            <ul class="mb-0">
                                                <li>Provide and improve our services</li>
                                                <li>Process transactions</li>
                                                <li>Customer support</li>
                                                <li>Security & fraud prevention</li>
                                                <li>Service communications</li>
                                                <li>Legal compliance</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h4 class="h5 text-primary"><i class="bi bi-people me-2"></i>Your Rights</h4>
                                            <ul class="mb-0">
                                                <li>Access your personal data</li>
                                                <li>Request corrections</li>
                                                <li>Request deletion</li>
                                                <li>Object to processing</li>
                                                <li>Data portability</li>
                                                <li>Withdraw consent</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                <strong>Need more details?</strong> Continue reading for comprehensive information about our data practices, or contact our Data Protection Officer at <a href="mailto:privacy@appnomu.com" class="alert-link">privacy@appnomu.com</a> with any specific questions.
                            </div>
                        </div>
                        
                        <div id="information-collection" class="mt-5">
                            <h2 class="h3 mb-4 text-primary">
                                <i class="bi bi-collection me-2"></i>Information We Collect
                            </h2>
                        <p>We may collect information about you in a variety of ways. The information we may collect includes:</p>
                        
                        <h3 class="h5 mt-4 mb-3">Personal Data</h3>
                        <p>Personally identifiable information, such as your name, email address, telephone number, and mailing address, that you voluntarily provide to us when you register with us, express an interest in obtaining information about us or our products and services, or otherwise contact us. We may also collect personal information from you if you apply for a job with us.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Derivative Data</h3>
                        <p>Information our servers automatically collect when you access our website, such as your IP address, browser type, operating system, access times, and the pages you have viewed directly before and after accessing the website.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Financial Data</h3>
                        <p>Financial information, such as data related to your payment method (e.g., valid credit card number, card brand, expiration date) that we may collect when you purchase, order, return, exchange, or request information about our services. We store only very limited, if any, financial information that we collect. Otherwise, all financial information is stored by our payment processor.</p>
                        
                        <h4 class="h6 mt-3 mb-2">Cryptocurrency Payment Data</h4>
                        <p>When you choose to pay with cryptocurrency, we collect and process the following information:</p>
                        <ul>
                            <li><strong>Wallet Addresses:</strong> The cryptocurrency wallet address you use to send payment (publicly visible on blockchain)</li>
                            <li><strong>Transaction Hashes:</strong> Blockchain transaction identifiers for payment verification and record-keeping</li>
                            <li><strong>Transaction Amounts:</strong> The amount of cryptocurrency sent and its USD equivalent at the time of transaction</li>
                            <li><strong>Blockchain Confirmations:</strong> Number of confirmations received for transaction validation</li>
                            <li><strong>Payment Timestamps:</strong> Date and time of transaction initiation and confirmation</li>
                            <li><strong>Cryptocurrency Type:</strong> Which cryptocurrency was used for payment (BTC, ETH, USDT, USDC, etc.)</li>
                        </ul>
                        <p><strong>Important Privacy Note:</strong> Cryptocurrency transactions are recorded on public blockchains. While we do not publicly associate your wallet address with your personal identity, blockchain transactions are permanently visible to anyone. We recommend using privacy-focused practices when transacting with cryptocurrency if anonymity is a concern.</p>
                        
                        <h4 class="h6 mt-3 mb-2">Why Cryptocurrency Payments Are Non-Refundable</h4>
                        <p>We have a strict no-refund policy for cryptocurrency payments due to the following technical and operational reasons:</p>
                        <ul>
                            <li><strong>Irreversible Nature:</strong> Blockchain transactions are cryptographically secured and cannot be reversed once confirmed. Unlike credit card payments that can be charged back, cryptocurrency transactions are final and permanent.</li>
                            <li><strong>Immediate Conversion:</strong> To protect our business from cryptocurrency price volatility, we immediately convert received cryptocurrencies to fiat currency through automated systems. Once converted, the original cryptocurrency no longer exists in our possession.</li>
                            <li><strong>No Central Authority:</strong> Cryptocurrencies operate on decentralized networks without banks or payment processors who can reverse transactions. There is no "undo" button for blockchain transactions.</li>
                            <li><strong>Transaction Costs:</strong> Blockchain networks charge transaction fees (gas fees) that are paid to network validators. These fees cannot be recovered and would make partial refunds economically unfeasible.</li>
                            <li><strong>Price Volatility:</strong> Cryptocurrency values fluctuate constantly. If we were to issue refunds, determining whether to refund in cryptocurrency (at what exchange rate?) or fiat currency (at what value?) would create disputes and unfairness.</li>
                            <li><strong>Regulatory Complexity:</strong> Cryptocurrency refunds would require complex tax reporting and regulatory compliance across multiple jurisdictions, which is not operationally feasible for our business.</li>
                            <li><strong>Security Concerns:</strong> Sending cryptocurrency refunds would require us to maintain hot wallets with significant cryptocurrency balances, creating security risks and potential targets for hackers.</li>
                            <li><strong>Identity Verification:</strong> Verifying that a refund request comes from the legitimate wallet owner is extremely difficult without compromising privacy, as cryptocurrency transactions are pseudonymous.</li>
                        </ul>
                        <p><strong>Alternative Payment Methods:</strong> If you require the possibility of refunds, we strongly recommend using traditional payment methods (credit/debit cards or bank transfers) instead of cryptocurrency. Our standard refund policies apply to traditional payment methods as outlined in our Terms of Service.</p>
                        <p><strong>Dispute Resolution:</strong> In the rare case of service non-delivery or technical errors with cryptocurrency payments, we will work with you to resolve the issue through service credits or alternative compensation, but not through cryptocurrency or cash refunds.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Data From Social Networks</h3>
                        <p>User information from social networking sites, such as Facebook, Google+, Instagram, LinkedIn, including your name, your social network username, location, gender, birth date, email address, profile picture, and public data for contacts, if you connect your account to such social networks.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Mobile Device Data</h3>
                        <p>Device information, such as your mobile device ID, model, and manufacturer, and information about the location of your device, if you access our website from a mobile device.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Website Audit Data</h3>
                        <p>When you use our free website audit tool, we collect and analyze the following information:</p>
                        <ul>
                            <li><strong>Website URL:</strong> The website address you submit for analysis</li>
                            <li><strong>Business Information:</strong> Business name, email address, phone number, and industry (voluntarily provided)</li>
                            <li><strong>Technical Analysis Data:</strong> Website performance metrics, SEO elements, security headers, mobile compatibility, and accessibility features</li>
                            <li><strong>Audit Results:</strong> Comprehensive analysis reports including scores, identified issues, and improvement recommendations</li>
                            <li><strong>Usage Analytics:</strong> IP address, user agent, timestamp, and interaction data for spam protection and service improvement</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">Security and Verification Data</h3>
                        <p>To protect our services from abuse and ensure security, we collect:</p>
                        <ul>
                            <li><strong>Cloudflare Turnstile Data:</strong> Bot detection and verification tokens to prevent spam and automated abuse</li>
                            <li><strong>Rate Limiting Data:</strong> IP addresses and email addresses for enforcing usage limits (3 audits per IP per hour, 2 audits per email per day)</li>
                            <li><strong>Admin System Data:</strong> Login attempts, session data, password reset tokens, and administrative activity logs for authorized personnel</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">Communication Data</h3>
                        <p>We collect information related to our communications with you, including:</p>
                        <ul>
                            <li><strong>Email Communications:</strong> Audit reports, admin notifications, password reset emails, and service-related communications</li>
                            <li><strong>Lead Management:</strong> Sales pipeline status, notes, and follow-up communications for business prospects</li>
                            <li><strong>Support Interactions:</strong> Customer service inquiries, technical support requests, and resolution records</li>
                        </ul>
                        </div>
                        
                        <div id="data-usage" class="mt-5">
                            <h2 class="h3 mb-4 text-primary">
                                <i class="bi bi-gear me-2"></i>Use of Your Information
                            </h2>
                        <p>Having accurate information about you permits us to provide you with a smooth, efficient, and customized experience. Specifically, we may use information collected about you via our website to:</p>
                        <ul>
                            <li>Create and manage your account</li>
                            <li>Process your orders and manage your transactions</li>
                            <li>Send you a newsletter or marketing communications</li>
                            <li>Email you regarding your account or order</li>
                            <li>Fulfill and manage purchases, orders, payments, and other transactions related to our website</li>
                            <li>Monitor and analyze usage and trends to improve your experience with our website</li>
                            <li>Notify you of updates to our website</li>
                            <li>Offer new products, services, and/or recommendations to you</li>
                            <li>Process job applications</li>
                            <li>Prevent fraudulent transactions, monitor against theft, and protect against criminal activity</li>
                            <li>Resolve disputes and troubleshoot problems</li>
                            <li>Respond to product and customer service requests</li>
                            <li><strong>Conduct website audits and performance analysis</strong> for websites you submit to our audit tool</li>
                            <li><strong>Generate personalized recommendations</strong> based on website analysis results</li>
                            <li><strong>Manage sales leads and business prospects</strong> generated through our audit tool and other services</li>
                            <li><strong>Send audit reports and follow-up communications</strong> related to website analysis</li>
                            <li><strong>Protect against spam and abuse</strong> using Cloudflare Turnstile and rate limiting systems</li>
                            <li><strong>Maintain admin system security</strong> through login monitoring, password reset functionality, and access controls</li>
                            <li><strong>Provide customer support</strong> and technical assistance for our audit tool and other services</li>
                            <li><strong>Improve our audit algorithms</strong> and recommendation systems based on aggregated usage data</li>
                        </ul>
                        </div>
                        
                        <div id="information-disclosure" class="mt-5">
                            <h2 class="h3 mb-4 text-primary">
                                <i class="bi bi-share me-2"></i>Disclosure of Your Information
                            </h2>
                        <p>We may share information we have collected about you in certain situations. Your information may be disclosed as follows:</p>
                        
                        <h3 class="h5 mt-4 mb-3">By Law or to Protect Rights</h3>
                        <p>If we believe the release of information about you is necessary to respond to legal process, to investigate or remedy potential violations of our policies, or to protect the rights, property, and safety of others, we may share your information as permitted or required by any applicable law, rule, or regulation.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Third-Party Service Providers</h3>
                        <p>We may share your information with third parties that perform services for us or on our behalf, including payment processing, data analysis, email delivery, hosting services, customer service, and marketing assistance. This includes:</p>
                        <ul>
                            <li><strong>Cloudflare:</strong> For bot protection, security, and content delivery services</li>
                            <li><strong>Email Service Providers:</strong> For sending audit reports, notifications, and marketing communications</li>
                            <li><strong>Analytics Providers:</strong> For website usage analysis and service improvement</li>
                            <li><strong>Hosting Providers:</strong> For secure data storage and website hosting</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">Marketing Communications</h3>
                        <p>With your consent, or with an opportunity for you to withdraw consent, we may share your information with third parties for marketing purposes.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Interactions with Other Users</h3>
                        <p>If you interact with other users of our website, those users may see your name, profile photo, and descriptions of your activity.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Online Postings</h3>
                        <p>When you post comments, contributions, or other content to our website, your posts may be viewed by all users and may be publicly distributed outside the website in perpetuity.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Business Transfers</h3>
                        <p>We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.</p>
                        
                        <h2 class="h3 mt-5 mb-4">Service-Specific Privacy Information</h2>
                        <p>Different services we offer may involve the collection and processing of different types of personal information. Here is additional information about how we handle your data for specific services:</p>
                        
                        <h3 class="h5 mt-4 mb-3">Web Hosting Services</h3>
                        <p>When you use our hosting services, we may collect and process:</p>
                        <ul>
                            <li>Server logs and usage data</li>
                            <li>Website content and databases you store on our servers</li>
                            <li>Technical information about your hosted websites</li>
                            <li>IP addresses accessing your hosted content</li>
                        </ul>
                        <p>We implement appropriate safeguards to protect your hosted data, but you remain responsible for the security measures of your own website and the data you collect from your users.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Domain Registration Services</h3>
                        <p>When you register a domain through us, we are required to collect and share certain information with domain registries and registrars, which may include:</p>
                        <ul>
                            <li>Domain registrant contact information</li>
                            <li>Administrative and technical contact details</li>
                            <li>Domain registration and expiration dates</li>
                        </ul>
                        <p>Please note that this information may be publicly available through WHOIS directory services unless you have purchased privacy protection services.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Digital Marketing Services</h3>
                        <p>When providing digital marketing services, including Google Ads, WhatsApp API, and SMS marketing, we may:</p>
                        <ul>
                            <li>Access your marketing accounts on third-party platforms (with your permission)</li>
                            <li>Collect analytics and performance data related to your marketing campaigns</li>
                            <li>Process customer lists and contact information you provide for marketing purposes</li>
                            <li>Track conversion and engagement metrics</li>
                        </ul>
                        <p>You are responsible for ensuring that any customer data you provide to us for marketing purposes has been collected with appropriate consent and in compliance with applicable privacy laws.</p>
                        
                        <h3 class="h5 mt-4 mb-3" id="website-audit">Website Audit Tool</h3>
                        <p>Our free website audit tool analyzes websites to provide performance, SEO, security, mobile, and accessibility insights. When you use this service:</p>
                        <ul>
                            <li><strong>Data Collection:</strong> We collect the website URL, your business information (name, email, phone, industry), and technical analysis results</li>
                            <li><strong>Analysis Process:</strong> Our system performs real-time analysis of the submitted website, including performance testing, SEO evaluation, security scanning, mobile compatibility checks, and accessibility assessment</li>
                            <li><strong>Report Generation:</strong> We generate personalized recommendations based on the specific issues and strengths identified during the analysis</li>
                            <li><strong>Lead Management:</strong> Audit submissions are treated as sales leads and may be followed up by our sales team</li>
                            <li><strong>Spam Protection:</strong> We use Cloudflare Turnstile verification and implement rate limiting (3 audits per IP per hour, 2 audits per email per day) to prevent abuse</li>
                            <li><strong>Data Retention:</strong> Audit results are stored for business development purposes and to improve our analysis algorithms</li>
                            <li><strong>Email Communications:</strong> We send audit reports via email and may follow up with additional service offerings</li>
                        </ul>
                        <p><strong>Important:</strong> By submitting a website for audit, you confirm that you have the authority to analyze that website and agree to receive follow-up communications from our sales team.</p>
                        
                        <h3 class="h5 mt-4 mb-3" id="quotation-system">Quotation Request System</h3>
                        <p>Our quotation request system allows potential clients to submit project inquiries and receive detailed proposals. When you submit a quote request, we collect and process the following information:</p>
                        
                        <h4 class="h6 mt-3 mb-2">Information Collected</h4>
                        <ul>
                            <li><strong>Personal Information:</strong> Full name, email address, phone number, and country of residence</li>
                            <li><strong>Project Information:</strong> Services required, budget range, timeline preferences, problem description, and business information</li>
                            <li><strong>Supporting Documents:</strong> Optional file uploads including specifications, designs, requirements documents, or other project-related materials (maximum 5MB per file)</li>
                            <li><strong>Security and Verification Data:</strong> Cloudflare Turnstile verification tokens, IP address, browser information, and submission timestamp</li>
                            <li><strong>Communication Records:</strong> All email correspondence, follow-up communications, and quote proposals</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">How We Use Quote Request Data</h4>
                        <ul>
                            <li><strong>Quote Preparation:</strong> To analyze your requirements and prepare accurate, detailed proposals</li>
                            <li><strong>Communication:</strong> To send confirmation emails, quote proposals, and follow-up inquiries</li>
                            <li><strong>Clarification:</strong> To contact you for additional information or clarification about project requirements</li>
                            <li><strong>Lead Management:</strong> To track and manage sales opportunities through our CRM system</li>
                            <li><strong>Business Development:</strong> To understand market needs and improve our service offerings</li>
                            <li><strong>Spam Prevention:</strong> To protect our system from abuse, fraud, and automated submissions</li>
                            <li><strong>Legal Compliance:</strong> To maintain records for accounting, tax, and legal purposes</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">Data Retention for Quote Requests</h4>
                        <ul>
                            <li><strong>Active Quotes:</strong> Retained during the quote process and for 90 days after quote expiration</li>
                            <li><strong>Accepted Projects:</strong> Retained for the project duration plus 7 years for legal, accounting, and warranty purposes</li>
                            <li><strong>Declined Quotes:</strong> Retained for 1 year for business analytics and service improvement</li>
                            <li><strong>Uploaded Files:</strong> Deleted after 90 days if quote is not accepted; retained with project files if accepted</li>
                            <li><strong>Communication History:</strong> Retained according to our general email retention policy (3 years)</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">Your Rights Regarding Quote Requests</h4>
                        <p>You have the right to:</p>
                        <ul>
                            <li>Request a copy of all information we hold about your quote request</li>
                            <li>Update or correct information in your quote request</li>
                            <li>Withdraw your quote request at any time before acceptance</li>
                            <li>Request deletion of your quote data (subject to legal retention requirements)</li>
                            <li>Opt out of follow-up communications while maintaining your quote request</li>
                            <li>Request an NDA for sensitive project information</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">Confidentiality and Security</h4>
                        <p>We treat all quote requests with strict confidentiality:</p>
                        <ul>
                            <li>Project details are accessible only to authorized sales and technical personnel</li>
                            <li>Uploaded files are stored on secure servers with encryption</li>
                            <li>Information is not shared with third parties without your explicit consent</li>
                            <li>All communications are conducted through secure channels</li>
                            <li>Cloudflare Turnstile protection prevents unauthorized access and spam</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">Consent and Communications</h4>
                        <p>By submitting a quote request, you explicitly consent to:</p>
                        <ul>
                            <li>Receive immediate confirmation emails acknowledging your submission</li>
                            <li>Be contacted by our sales team regarding your quote request</li>
                            <li>Receive the prepared quote proposal via email</li>
                            <li>Receive follow-up communications about your project inquiry</li>
                            <li>Receive periodic check-ins if you haven't responded to our quote</li>
                            <li>Receive information about relevant services or special offers</li>
                        </ul>
                        <p>You may withdraw consent for marketing communications at any time while maintaining your quote request active.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Admin System and Security</h3>
                        <p>Our administrative system includes enhanced security features:</p>
                        <ul>
                            <li><strong>User Authentication:</strong> Secure login system with password hashing and session management</li>
                            <li><strong>Password Reset:</strong> Secure password reset functionality with time-limited tokens and email verification</li>
                            <li><strong>Activity Logging:</strong> Comprehensive logging of admin activities, login attempts, and system access for security monitoring</li>
                            <li><strong>Access Controls:</strong> Role-based permissions and account status management</li>
                            <li><strong>Data Protection:</strong> All admin communications and password reset processes are secured and monitored</li>
                        </ul>
                        
                        <h2 class="h3 mt-5 mb-4" id="security">Security of Your Information</h2>
                        <p>We use administrative, technical, and physical security measures to help protect your personal information. We implement appropriate measures as required by Uganda's Data Protection and Privacy Act, 2019 and follow globally accepted security standards to ensure your data is protected. These include:</p>
                        <ul>
                            <li>Encryption of sensitive personal data</li>
                            <li>Secure user authentication processes</li>
                            <li>Regular security assessments and audits</li>
                            <li>Staff training on data protection practices</li>
                            <li>Access controls and monitoring of data access</li>
                        </ul>
                        <p>While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse.</p>
                        <p>In accordance with the Computer Misuse Act, 2011 (as amended), we maintain logs of system access and have implemented safeguards against unauthorized access to our computer systems. We strictly prohibit any unauthorized attempts to access, alter, or compromise our systems and will report such attempts to the appropriate authorities as required by Ugandan law.</p>
                        
                        <h2 class="h3 mt-5 mb-4">Cookies and Web Beacons</h2>
                        <p>We may use cookies, web beacons, tracking pixels, and other tracking technologies on our website to help customize the website and improve your experience. By using the website, you agree to be bound by our Cookie Policy.</p>
                        
                        <h2 class="h3 mt-5 mb-4">Your Rights Regarding Your Information</h2>
                        <p>In accordance with Uganda's Data Protection and Privacy Act, 2019, you have the following rights regarding your personal data:</p>
                        
                        <h3 class="h5 mt-4 mb-3">Right to Access</h3>
                        <p>You have the right to request access to your personal data that we hold. We will provide this information within 30 days of your request.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Right to Correction</h3>
                        <p>You have the right to request that we correct any inaccurate or incomplete personal information we hold about you.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Right to Erasure</h3>
                        <p>You have the right to request the deletion of your personal data when:</p>
                        <ul>
                            <li>The personal data is no longer necessary for the purpose it was collected</li>
                            <li>You withdraw consent and there is no other legal ground for processing</li>
                            <li>You object to the processing and there are no overriding legitimate grounds</li>
                            <li>The personal data has been unlawfully processed</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">Right to Restrict Processing</h3>
                        <p>You have the right to request restriction of processing of your personal data under certain circumstances, such as when you contest the accuracy of your data.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Right to Data Portability</h3>
                        <p>You have the right to receive your personal data in a structured, commonly used format and to transmit that data to another controller.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Right to Object</h3>
                        <p>You have the right to object to the processing of your personal data for direct marketing purposes or based on legitimate interests.</p>
                        
                        <h3 class="h5 mt-4 mb-3">How to Exercise Your Rights</h3>
                        <p>You may exercise these rights by:</p>
                        <ul>
                            <li>Logging into your account settings and updating your account information</li>
                            <li>Contacting our Data Protection Officer using the contact information provided below</li>
                            <li>Submitting a written request to our Uganda or USA office address</li>
                        </ul>
                        <p>We will respond to your request within 30 days. We may require specific information from you to help us confirm your identity and ensure your right to access your personal data.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Account Information</h3>
                        <p>Upon your request to terminate your account, we will deactivate or delete your account and information from our active databases. However, some information may be retained in our files to prevent fraud, troubleshoot problems, assist with any investigations, enforce our Terms of Use and/or comply with legal requirements.</p>
                        
                        <h3 class="h5 mt-4 mb-3">Emails and Communications</h3>
                        <p>If you no longer wish to receive correspondence, emails, or other communications from us, you may opt-out by:</p>
                        <ul>
                            <li>Noting your preferences at the time you register your account with us</li>
                            <li>Logging into your account settings and updating your preferences</li>
                            <li>Contacting us using the contact information provided below</li>
                            <li>Using the unsubscribe link in emails</li>
                        </ul>
                        
                        <h2 class="h3 mt-5 mb-4">Data Breach Notification</h2>
                        <p>In the event of a data breach that may compromise the security of your personal information, we will notify you and the relevant authorities in Uganda, including the National Information Technology Authority-Uganda (NITA-U), within 72 hours of becoming aware of the breach, as required by Uganda's Data Protection and Privacy Act, 2019. This notification will include:</p>
                        <ul>
                            <li>The nature of the personal data breach</li>
                            <li>The likely consequences of the breach</li>
                            <li>The measures we have taken or will take to address the breach</li>
                            <li>Recommendations for how you can protect yourself</li>
                        </ul>

                        <h2 class="h3 mt-5 mb-4">Data Retention Periods</h2>
                        <p>We retain your personal data only for as long as necessary to fulfill the purposes for which it was collected, including legal, accounting, or reporting requirements. Specific retention periods include:</p>
                        <ul>
                            <li><strong>Account information:</strong> For the duration of your relationship with us plus 2 years after account closure</li>
                            <li><strong>Transaction data:</strong> 7 years for tax and accounting purposes</li>
                            <li><strong>Marketing preferences:</strong> Until you opt-out or 3 years of inactivity</li>
                            <li><strong>Website usage data:</strong> 13 months</li>
                            <li><strong>Customer service communications:</strong> 3 years from resolution</li>
                        </ul>
                        <p>When personal data is no longer needed, we will securely delete or anonymize it.</p>

                        <h2 class="h3 mt-5 mb-4">Cookie Policy</h2>
                        <p>Our website uses cookies and similar technologies to enhance your browsing experience. Types of cookies we use include:</p>
                        <ul>
                            <li><strong>Essential cookies:</strong> Required for the website to function properly</li>
                            <li><strong>Preference cookies:</strong> Remember your settings and preferences</li>
                            <li><strong>Analytics cookies:</strong> Help us understand how visitors interact with our website</li>
                            <li><strong>Marketing cookies:</strong> Track your activity across websites to deliver targeted advertising</li>
                        </ul>
                        <p>You can control cookies through your browser settings. Most browsers allow you to block or delete cookies, but this may impact website functionality.</p>
                        <p>Our cookie notice banner provides you with the option to accept or decline non-essential cookies.</p>

                        <h2 class="h3 mt-5 mb-4">Computer Misuse Act Compliance</h2>
                        <p>In accordance with Uganda's Computer Misuse Act, 2011 (as amended), we prohibit any unauthorized access to our systems. Our users must comply with the following:</p>
                        <ul>
                            <li>Do not attempt to gain unauthorized access to our computer systems or data</li>
                            <li>Do not share your account credentials with others</li>
                            <li>Do not engage in activities that could compromise our systems' security</li>
                            <li>Do not use our services to distribute malicious code or engage in cyber attacks</li>
                            <li>Do not use our platforms to publish or share unauthorized or illegal content</li>
                        </ul>
                        <p>Violations of these provisions may be reported to the appropriate authorities in Uganda.</p>

                        <h2 class="h3 mt-5 mb-4">Cross-Border Data Transfers</h2>
                        <p>As a company with operations in Uganda and the USA, we may transfer your data between these jurisdictions. When transferring data from Uganda to other countries, we ensure that appropriate safeguards are in place to protect your information in accordance with Uganda's Data Protection and Privacy Act, 2019. These safeguards include:</p>
                        <ul>
                            <li>Standard contractual clauses</li>
                            <li>Data processing agreements with third-party service providers</li>
                            <li>Ensuring recipient countries have adequate data protection laws</li>
                        </ul>

                        <h2 class="h3 mt-5 mb-4">Changes to this Privacy Policy</h2>
                        <p>We may update this Privacy Policy from time to time. The updated version will be indicated by an updated "Last Updated" date at the top of this Privacy Policy. We encourage you to review this Privacy Policy regularly to stay informed about how we are protecting your information.</p>

                        <h2 class="h3 mt-5 mb-4">Contact Us</h2>
                        <p>If you have questions or comments about this Privacy Policy or wish to exercise your rights under Uganda's Data Protection and Privacy Act, please contact our Data Protection Officer at:</p>
                        <address>
                            AppNomu Business Services<br>
                            77 Market Street, Bugiri Municipality, Uganda<br>
                            631 Ridgel St, Dover, Delaware 19904-2772, USA<br>
                            Email: privacy@appnomu.com<br>
                            Phone: Uganda: +256 200 948420 / USA: +1 888 652 2233
                        </address>
                        <p>For complaints regarding data protection, you may also contact the National Information Technology Authority-Uganda (NITA-U) at <a href="mailto:info@nita.go.ug">info@nita.go.ug</a> or +256 417 801000.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary bg-opacity-10 rounded-4 p-5 mx-auto" style="max-width: 900px;">
                <h2 class="h2 fw-bold mb-3">Questions About Your Privacy?</h2>
                <p class="lead mb-4" style="max-width: 700px; margin: 0 auto;">Our Data Protection Officer is here to help. Contact us for any privacy-related questions or to exercise your rights under Uganda's Data Protection Act.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                    <a href="contact.php" class="btn btn-primary btn-lg px-5 py-3 fw-bold">
                        <i class="bi bi-shield-check me-2"></i>Contact Privacy Officer
                    </a>
                    <a href="terms-of-service.php" class="btn btn-outline-primary btn-lg px-5 py-3">
                        <i class="bi bi-file-text me-2"></i>View Terms of Service
                    </a>
                </div>
                <div class="mt-3">
                    <small class="text-muted fw-bold">✓ GDPR Compliant ✓ Uganda Data Protection Act 2019 ✓ 30-day response guarantee ✓ Your privacy is our priority</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Smooth Scroll with Offset for Table of Contents -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all anchor links in the table of contents
    const tocLinks = document.querySelectorAll('.nav-link[href^="#"]');
    
    tocLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                // Calculate offset (header height + some padding)
                const headerOffset = 120; // Adjust this value based on your header height
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                // Smooth scroll to target
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Also handle quick navigation buttons
    const quickNavLinks = document.querySelectorAll('a[href^="#"]');
    quickNavLinks.forEach(link => {
        if (!link.classList.contains('nav-link')) { // Avoid duplicate handling
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const headerOffset = 120;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        }
    });
});
</script>

<?php
// Include footer
include_once 'includes/footer.php';
?>
