<?php
// Include session helper first to avoid headers already sent warning
include_once 'includes/session_helper.php';
// Include header after session has been initialized
include_once 'includes/header.php';
?>

<!-- Enhanced Terms of Service Hero Section -->
<section class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-light text-primary mb-0 px-3 py-2 fw-bold me-3">LEGAL AGREEMENT</span>
                    <span class="badge bg-warning mb-0 px-3 py-2 fw-bold text-dark">BINDING CONTRACT</span>
                </div>
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2;">
                    <span style="background: linear-gradient(45deg, #60a5fa, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Terms</span> of Service
                </h1>
                <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">
                    Clear, fair terms governing your use of AppNomu Business Services. Developed in compliance with Uganda's Electronic Transactions Act and international standards for digital service agreements.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="#agreement-overview" class="btn btn-light btn-lg fw-bold px-4 py-3 text-primary">Read Agreement</a>
                    <a href="privacy-policy.php" class="btn btn-outline-light btn-lg px-4 py-3">Privacy Policy</a>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <!-- Terms Stats -->
                <div class="row g-3">
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">2011</h3>
                            <p class="mb-0 text-white-50">Electronic Transactions Act</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">24/7</h3>
                            <p class="mb-0 text-white-50">Service Availability</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">2</h3>
                            <p class="mb-0 text-white-50">Countries</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">100%</h3>
                            <p class="mb-0 text-white-50">Legal Compliance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Terms of Service Quick Navigation -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="#agreement-overview" class="btn btn-outline-primary btn-sm">Agreement Overview</a>
                    <a href="#user-responsibilities" class="btn btn-outline-primary btn-sm">User Responsibilities</a>
                    <a href="#service-terms" class="btn btn-outline-primary btn-sm">Service Terms</a>
                    <a href="#payment-terms" class="btn btn-outline-primary btn-sm">Payment Terms</a>
                    <a href="#contact-legal" class="btn btn-outline-primary btn-sm">Legal Contact</a>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="bi bi-calendar-check me-1"></i>
                        Last Updated: January 7, 2025 | 
                        <i class="bi bi-shield-check me-1"></i>
                        Compliant with Uganda Electronic Transactions Act 2011
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Terms of Service Content -->
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
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#agreement-overview">1. Introduction</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#definitions">2. Definitions</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#account-registration">3. Account Registration</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#user-responsibilities">4. User Responsibilities</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#service-terms">5. Service Terms</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#payment-terms">6. Payment Terms</a>
                            <a class="nav-link px-0 py-2 text-decoration-none text-warning fw-bold" href="#flexible-payment-plans">
                                <i class="bi bi-credit-card me-1"></i>8.3 Flexible Payment Plans
                            </a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#website-audit">11. Website Audit Tool</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#quotation-request">12. Quotation Requests</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#intellectual-property">7. Intellectual Property</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#termination">8. Termination</a>
                            <a class="nav-link px-0 py-2 text-decoration-none" href="#contact-legal">9. Contact Information</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <div id="agreement-overview">
                            <h2 class="h3 mb-4 text-primary">
                                <i class="bi bi-file-text me-2"></i>1. Introduction
                            </h2>
                        <p>Welcome to AppNomu Business Services ("AppNomu," "we," "our," or "us"). These Terms of Service ("Terms") govern your access to and use of our website, products, and services (collectively, the "Services").</p>
                        <p>These Terms have been developed in accordance with applicable laws, including but not limited to the Uganda Data Protection and Privacy Act, 2019, the Computer Misuse Act, 2011 (as amended), the Electronic Transactions Act, 2011, and other relevant Ugandan and international laws.</p>
                        <p>By accessing or using our Services, you agree to be bound by these Terms. If you do not agree to these Terms, you may not access or use our Services.</p>
                        <p>If you are accepting these Terms on behalf of a company or other legal entity, you represent that you have the authority to bind such entity to these Terms.</p>
                        
                        <h2 class="h3 mt-5 mb-4">2. Data Collection and Privacy</h2>
                        <p>At AppNomu, we are committed to protecting your privacy and being transparent about how we collect, use, and protect your information. This section outlines our data practices in compliance with Uganda's Data Protection and Privacy Act, 2019 and other applicable laws.</p>
                        
                        <h3 class="h5 mt-4 mb-3">2.1 Information We Collect</h3>
                        <p>We collect various types of information to provide and improve our services:</p>
                        <ul>
                            <li><strong>Account Information:</strong> Name, email, phone number, and other details you provide during registration or account setup.</li>
                            <li><strong>Service Usage Data:</strong> Information about how you interact with our services, including IP addresses, device information, browser type, and pages visited.</li>
                            <li><strong>Payment Information:</strong> Billing details and transaction history, processed through secure payment processors.</li>
                            <li><strong>Communications:</strong> Records of your communications with our support team and any feedback you provide.</li>
                            <li><strong>Cookies and Tracking:</strong> We use cookies and similar technologies to enhance your experience and analyze service usage.</li>
                        </ul>

                        <h3 class="h5 mt-4 mb-3">2.2 How We Use Your Information</h3>
                        <p>We use the information we collect to:</p>
                        <ul>
                            <li>Provide, maintain, and improve our services</li>
                            <li>Process transactions and send related information</li>
                            <li>Respond to your inquiries and provide customer support</li>
                            <li>Send service-related announcements and updates</li>
                            <li>Monitor and analyze usage and trends to improve user experience</li>
                            <li>Detect, prevent, and address technical or security issues</li>
                            <li>Comply with legal obligations and protect our rights</li>
                        </ul>

                        <h3 class="h5 mt-4 mb-3">2.3 Data Storage and Security</h3>
                        <p>We implement appropriate technical and organizational measures to protect your personal data:</p>
                        <ul>
                            <li>Data is stored on secure servers with restricted access</li>
                            <li>We use encryption for data in transit (SSL/TLS) and at rest</li>
                            <li>Regular security assessments and monitoring are conducted</li>
                            <li>Access to personal data is limited to authorized personnel only</li>
                            <li>Data is retained only as long as necessary for the purposes stated in this policy</li>
                        </ul>

                        <h3 class="h5 mt-4 mb-3">2.4 Data Sharing and Disclosure</h3>
                        <p>We may share your information with:</p>
                        <ul>
                            <li>Service providers who assist in delivering our services (e.g., hosting, payment processing)</li>
                            <li>Legal and regulatory authorities when required by law</li>
                            <li>Business partners with your explicit consent</li>
                            <li>In connection with a merger, acquisition, or sale of assets</li>
                        </ul>
                        <p>We never sell your personal information to third parties for marketing purposes.</p>

                        <h3 class="h5 mt-4 mb-3">2.5 Your Data Rights</h3>
                        <p>Under applicable data protection laws, you have the right to:</p>
                        <ul>
                            <li>Access the personal data we hold about you</li>
                            <li>Request correction of inaccurate or incomplete data</li>
                            <li>Request deletion of your personal data</li>
                            <li>Object to or restrict processing of your data</li>
                            <li>Request data portability</li>
                            <li>Withdraw consent where processing is based on consent</li>
                        </ul>
                        <p>To exercise these rights, please contact us at <a href="mailto:privacy@appnomu.com">privacy@appnomu.com</a>.</p>

                        <h3 class="h5 mt-4 mb-3">2.6 International Data Transfers</h3>
                        <p>Your information may be transferred to and processed in countries other than your own. We ensure appropriate safeguards are in place for such transfers in compliance with applicable data protection laws.</p>

                        <h3 class="h5 mt-4 mb-3">2.7 Children's Privacy</h3>
                        <p>Our services are not directed to individuals under 18. We do not knowingly collect personal information from children without parental consent. If we become aware of such collection, we will take steps to remove the information.</p>

                        <h3 class="h5 mt-4 mb-3">2.8 Changes to This Policy</h3>
                        <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last Updated" date at the top of these Terms.</p>

                        <h2 class="h3 mt-5 mb-4">3. Definitions</h2>
                        <ul>
                            <li><strong>"Account"</strong> means a unique account created by you to access our Services.</li>
                            <li><strong>"Content"</strong> refers to any text, images, videos, audio, or other materials available through our Services.</li>
                            <li><strong>"User"</strong> means any individual who accesses or uses our Services.</li>
                            <li><strong>"You"</strong> means the individual accessing or using our Services.</li>
                        </ul>
                        
                        <h2 class="h3 mt-5 mb-4">3. Account Registration</h2>
                        <p>To access certain features of our Services, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete.</p>
                        <p>You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account.</p>
                        
                        <h2 class="h3 mt-5 mb-4">4. User Responsibilities</h2>
                        <p>When using our Services, you agree to:</p>
                        <ul>
                            <li>Comply with all applicable laws and regulations, including Uganda's Computer Misuse Act and Data Protection and Privacy Act</li>
                            <li>Not engage in any fraudulent, abusive, or illegal activities</li>
                            <li>Not interfere with or disrupt the integrity or performance of our Services</li>
                            <li>Not attempt to gain unauthorized access to our Services or related systems</li>
                            <li>Not use our Services to transmit any viruses, malware, or other harmful code</li>
                            <li>Not use our Services to spread hate speech, cyber harassment, offensive communication, or other content prohibited under Ugandan law</li>
                            <li>Not engage in unsolicited electronic communications (spam) through our Services</li>
                            <li>Not use our Services for publishing or sharing unauthorized computer content</li>
                        </ul>
                        <p>You acknowledge that violating these responsibilities may constitute offenses under the Computer Misuse Act, 2011 (as amended) of Uganda, which may result in criminal penalties including fines and/or imprisonment.</p>
                        
                        <h2 class="h3 mt-5 mb-4">5. Intellectual Property</h2>
                        <p>All content, features, and functionality of our Services, including but not limited to text, graphics, logos, icons, images, and software, are the exclusive property of AppNomu or its licensors and are protected by copyright, trademark, and other intellectual property laws.</p>
                        <p>You may not reproduce, distribute, modify, create derivative works of, publicly display, publicly perform, republish, download, store, or transmit any of the material on our Services, except as expressly permitted by these Terms.</p>
                        
                        <h2 class="h3 mt-5 mb-4">6. User-Generated Content</h2>
                        <p>Our Services may allow you to post, submit, publish, display, or transmit content ("User-Generated Content"). You retain all rights in, and are solely responsible for, the User-Generated Content you post to our Services.</p>
                        <p>By posting User-Generated Content, you grant us a non-exclusive, royalty-free, perpetual, irrevocable, and fully sublicensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content throughout the world in any media.</p>
                        
                        <h2 class="h3 mt-5 mb-4">7. Prohibited Activities</h2>
                        <p>You agree not to use our Services to:</p>
                        <ul>
                            <li>Violate any applicable law or regulation, including Uganda's Computer Misuse Act and Data Protection and Privacy Act</li>
                            <li>Infringe the intellectual property or other rights of any third party</li>
                            <li>Engage in any fraudulent, abusive, or illegal activities</li>
                            <li>Transmit any viruses, malware, or other harmful code</li>
                            <li>Harass, threaten, or harm others</li>
                            <li>Collect or track the personal information of others without proper consent</li>
                            <li>Impersonate any person or entity</li>
                            <li>Interfere with or disrupt the integrity or performance of our Services</li>
                            <li>Access, alter, destroy or damage any information on our computer systems without authorization</li>
                            <li>Publish or transmit false, misleading, or defamatory information</li>
                            <li>Use our Services to disseminate unsolicited messages (spam)</li>
                            <li>Engage in cyber harassment, offensive communication, or cyber stalking</li>
                            <li>Attempt to compromise the security of our Services or systems</li>
                        </ul>
                        <p>Under Uganda's Computer Misuse Act, 2011 (as amended), unauthorized access to computer systems, unauthorized modification of computer material, unauthorized use of computer services, and electronic fraud are criminal offenses that may result in significant penalties, including fines and imprisonment. We reserve the right to report any such violations to the relevant authorities.</p>
                        
                        <h2 class="h3 mt-5 mb-4">8. Payment and Pricing Terms</h2>
                        <p>Certain features of our Services may require payment of fees. You agree to pay all applicable fees as described on our website. All payment terms are subject to the following conditions:</p>
                        
                        <h3 class="h5 mt-4 mb-3">8.1 General Payment Terms</h3>
                        <ul>
                            <li>All fees are due immediately upon purchase unless otherwise specified.</li>
                            <li>We accept payments via credit/debit cards, bank transfers, cryptocurrency, and other payment methods as specified on our website.</li>
                            <li>For subscription services, you authorize us to charge your payment method on a recurring basis.</li>
                            <li>All prices are subject to change with notice. Price changes will not affect already paid periods.</li>
                            <li>All amounts are in US Dollars (USD) unless otherwise specified.</li>
                            <li>You are responsible for any applicable taxes in addition to the fees.</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">8.2 Cryptocurrency Payment Terms</h3>
                        <p>We accept cryptocurrency payments for our services. By choosing to pay with cryptocurrency, you acknowledge and agree to the following specific terms:</p>
                        
                        <h4 class="h6 mt-3 mb-2">8.2.1 Accepted Cryptocurrencies</h4>
                        <p>We currently accept the following cryptocurrencies:</p>
                        <ul>
                            <li>Bitcoin (BTC)</li>
                            <li>Ethereum (ETH)</li>
                            <li>Tether (USDT)</li>
                            <li>USD Coin (USDC)</li>
                            <li>Other cryptocurrencies as specified at checkout</li>
                        </ul>
                        <p>The list of accepted cryptocurrencies may be updated from time to time at our discretion.</p>
                        
                        <h4 class="h6 mt-3 mb-2">8.2.2 Non-Refundable Policy for Cryptocurrency Payments</h4>
                        <p><strong>IMPORTANT: All cryptocurrency payments are final and non-refundable.</strong> This no-refund policy applies to all services paid for with cryptocurrency, including but not limited to hosting services, domain registrations, development projects, and digital marketing services.</p>
                        
                        <p><strong>Reasons for Non-Refundability:</strong></p>
                        <ul>
                            <li><strong>Irreversible Transactions:</strong> Cryptocurrency transactions are irreversible by design. Once a transaction is confirmed on the blockchain, it cannot be reversed or canceled by any party, including AppNomu.</li>
                            <li><strong>Decentralized Nature:</strong> Cryptocurrencies operate on decentralized networks without central authorities or intermediaries who can reverse transactions.</li>
                            <li><strong>Immediate Conversion:</strong> To protect against cryptocurrency price volatility, we immediately convert received cryptocurrencies to fiat currency, making refunds technically impossible.</li>
                            <li><strong>Transaction Costs:</strong> Blockchain transaction fees (gas fees) are paid to network validators and cannot be recovered.</li>
                            <li><strong>Regulatory Compliance:</strong> Cryptocurrency refunds would require complex regulatory compliance and tax reporting that is not feasible for our business operations.</li>
                            <li><strong>Price Volatility:</strong> The value of cryptocurrencies can fluctuate significantly. Determining the refund amount in cryptocurrency or fiat currency would be complicated and potentially unfair to either party.</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.2.3 Payment Process</h4>
                        <ul>
                            <li>Cryptocurrency payment amounts are calculated at the current exchange rate at the time of transaction initiation.</li>
                            <li>You must send the exact amount specified within the time window provided (typically 15-30 minutes).</li>
                            <li>Payments sent after the time window expires may not be credited to your account.</li>
                            <li>You are responsible for all blockchain transaction fees (gas fees).</li>
                            <li>Payments are considered complete after the required number of blockchain confirmations (varies by cryptocurrency).</li>
                            <li>Services will be activated only after payment confirmation on the blockchain.</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.2.4 Your Responsibilities</h4>
                        <p>When paying with cryptocurrency, you are responsible for:</p>
                        <ul>
                            <li>Ensuring you send the correct cryptocurrency to the correct wallet address</li>
                            <li>Sending the exact amount specified in the payment instructions</li>
                            <li>Paying sufficient gas fees to ensure timely transaction confirmation</li>
                            <li>Verifying all payment details before sending the transaction</li>
                            <li>Understanding that incorrect payments (wrong amount, wrong address, wrong cryptocurrency) cannot be refunded</li>
                            <li>Complying with all applicable laws regarding cryptocurrency transactions in your jurisdiction</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.2.5 Exceptions and Disputes</h4>
                        <p>The only exceptions to the non-refundable policy are:</p>
                        <ul>
                            <li><strong>Service Not Delivered:</strong> If we fail to deliver the service you paid for due to our fault, we will provide the service or offer equivalent credit toward future services (no cash or cryptocurrency refund).</li>
                            <li><strong>Duplicate Payment:</strong> If you accidentally make a duplicate payment for the same service, we will issue credit toward future services.</li>
                            <li><strong>Technical Error:</strong> If a technical error on our payment system causes an incorrect charge, we will work with you to resolve the issue through service credits.</li>
                        </ul>
                        <p>All dispute resolutions for cryptocurrency payments will be in the form of service credits, not refunds.</p>
                        
                        <h4 class="h6 mt-3 mb-2">8.2.6 Alternative Payment Methods</h4>
                        <p><strong>Important Notice:</strong> If you require the possibility of refunds, we strongly recommend using traditional payment methods (credit/debit cards, bank transfers) instead of cryptocurrency. Our standard refund policies apply to traditional payment methods as outlined in the relevant service sections of these Terms.</p>
                        
                        <h4 class="h6 mt-3 mb-2">8.2.7 Tax Implications</h4>
                        <p>You are solely responsible for determining and paying any taxes applicable to your cryptocurrency transactions. We recommend consulting with a tax professional regarding the tax implications of using cryptocurrency for payments in your jurisdiction.</p>
                        
                        <h3 class="h5 mt-4 mb-3" id="flexible-payment-plans">8.3 Flexible Payment Plans</h3>
                        <p>AppNomu offers flexible payment plans to make our services more accessible to businesses of all sizes. These payment plans allow you to pay for website development, web applications, and mobile applications through installment payments.</p>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.1 Payment Plan Structure</h4>
                        <p>Our flexible payment plans operate under the following structure:</p>
                        <ul>
                            <li><strong>Upfront Payment:</strong> A 20% down payment is required to initiate any project under a payment plan.</li>
                            <li><strong>Remaining Balance:</strong> The remaining 80% of the project cost can be paid through daily, weekly, or monthly installments.</li>
                            <li><strong>Payment Duration:</strong> Payment plans can extend up to 24 months (2 years) depending on the project size and agreed terms.</li>
                            <li><strong>No Interest or Hidden Fees:</strong> We do not charge interest or additional fees for payment plans. The total project cost remains the same whether paid upfront or through installments.</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.2 Payment Frequency Options</h4>
                        <p>You may choose from the following payment frequencies:</p>
                        <ul>
                            <li><strong>Daily Payments:</strong> Calculated as total project cost divided by 365 days. Ideal for businesses with daily revenue streams.</li>
                            <li><strong>Weekly Payments:</strong> Calculated as total project cost divided by 52 weeks. Suitable for most growing businesses.</li>
                            <li><strong>Monthly Payments:</strong> Remaining balance (80%) divided by selected number of months (1-24 months). Best for established businesses with predictable cash flow.</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.3 Eligibility and Approval</h4>
                        <p>Payment plans are available for projects meeting the following criteria:</p>
                        <ul>
                            <li>Minimum project value of $500 USD</li>
                            <li>Valid business registration or identification documentation</li>
                            <li>Completion of our quotation request process</li>
                            <li>Acceptance of payment plan terms and conditions</li>
                            <li>Agreement to automatic payment processing (where applicable)</li>
                        </ul>
                        <p>We reserve the right to approve or deny payment plan applications at our sole discretion based on project scope, client history, and business considerations.</p>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.4 Payment Methods for Installments</h4>
                        <p>Installment payments can be made through:</p>
                        <ul>
                            <li>Credit/debit card (automatic recurring payments recommended)</li>
                            <li>Bank transfers (manual or automatic)</li>
                            <li>Mobile money (MTN Mobile Money, Airtel Money)</li>
                            <li>Other payment methods as agreed upon in the payment plan contract</li>
                        </ul>
                        <p><strong>Note:</strong> Cryptocurrency payments are not eligible for payment plans due to their non-refundable nature and price volatility.</p>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.5 Project Delivery and Access</h4>
                        <ul>
                            <li><strong>Development Access:</strong> You will have access to a staging/development version of your project throughout the payment period to review progress.</li>
                            <li><strong>Milestone Deliveries:</strong> For larger projects, we may implement milestone-based deliveries where portions of the project are released as payments are made.</li>
                            <li><strong>Final Deployment:</strong> The final live deployment and full ownership transfer occurs after all payments are completed, unless otherwise agreed in writing.</li>
                            <li><strong>Source Code:</strong> Full source code and project files are transferred upon final payment completion.</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.6 Missed or Late Installment Payments</h4>
                        <p>If you miss or are late on an installment payment:</p>
                        <ul>
                            <li><strong>Grace Period:</strong> We provide a 7-day grace period for missed payments without penalty.</li>
                            <li><strong>Communication:</strong> We will attempt to contact you via email and phone to resolve the payment issue.</li>
                            <li><strong>Payment Plan Adjustment:</strong> If you anticipate difficulty making payments, contact us immediately. We may be able to adjust your payment schedule.</li>
                            <li><strong>Service Suspension:</strong> After the grace period, access to development/staging environments may be suspended until payment is current.</li>
                            <li><strong>Late Fees:</strong> A late fee of 5% of the missed payment amount or $25 USD (whichever is greater) may be applied after the grace period.</li>
                            <li><strong>Default:</strong> If payments are more than 30 days overdue, the payment plan may be considered in default, and we reserve the right to pursue collection remedies.</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.7 Early Payment and Completion</h4>
                        <ul>
                            <li><strong>No Penalties:</strong> You may pay off the remaining balance at any time without penalty or additional fees.</li>
                            <li><strong>Expedited Delivery:</strong> Early completion of payments may expedite final project deployment.</li>
                            <li><strong>Discount Opportunities:</strong> We may offer discounts for early payment completion at our discretion.</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.8 Payment Plan Cancellation</h4>
                        <p><strong>Client-Initiated Cancellation:</strong></p>
                        <ul>
                            <li>You may cancel the payment plan at any time by providing written notice.</li>
                            <li>Upon cancellation, all payments made to date are non-refundable.</li>
                            <li>You will receive deliverables completed up to the point of cancellation, proportional to payments made.</li>
                            <li>Any remaining balance becomes immediately due if you wish to receive the completed work.</li>
                        </ul>
                        
                        <p><strong>AppNomu-Initiated Cancellation:</strong></p>
                        <ul>
                            <li>We may cancel the payment plan if payments are consistently late or if the plan is in default.</li>
                            <li>We will provide written notice before cancellation.</li>
                            <li>Upon our cancellation, you will receive work completed proportional to payments made.</li>
                            <li>Any remaining balance may be pursued through collection remedies.</li>
                        </ul>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.9 Payment Plan Agreement</h4>
                        <p>All payment plans are formalized through a written Payment Plan Agreement that includes:</p>
                        <ul>
                            <li>Total project cost and scope of work</li>
                            <li>Upfront payment amount (20%)</li>
                            <li>Remaining balance and payment frequency</li>
                            <li>Payment schedule with specific due dates</li>
                            <li>Payment methods and automatic payment authorization</li>
                            <li>Milestone deliverables and timeline</li>
                            <li>Consequences of missed payments</li>
                            <li>Cancellation terms and conditions</li>
                        </ul>
                        <p>The Payment Plan Agreement is a binding contract and forms part of these Terms of Service.</p>
                        
                        <h4 class="h6 mt-3 mb-2">8.3.10 Modifications to Payment Plans</h4>
                        <p>Modifications to an existing payment plan require mutual written agreement. Requests for modifications should be submitted in writing and will be evaluated on a case-by-case basis. We reserve the right to approve or deny modification requests.</p>
                        
                        <h3 class="h5 mt-4 mb-3">8.4 Late Payments</h3>
                        <p>For late or failed payments not covered under payment plan terms, we reserve the right to:</p>
                        <ul>
                            <li>Charge late payment fees or interest at the rate of 1.5% per month or the maximum rate permitted by law.</li>
                            <li>Suspend or terminate your access to the Services.</li>
                            <li>Pursue any available legal remedies to collect unpaid amounts.</li>
                        </ul>
                        
                        <h2 class="h3 mt-5 mb-4">9. Hosting Services Terms</h2>
                        <p>The following terms apply specifically to our hosting services:</p>
                        
                        <h3 class="h5 mt-4 mb-3">9.1 Service Availability</h3>
                        <p>While we strive to maintain 99.9% uptime for our hosting services, we do not guarantee uninterrupted service. Scheduled maintenance, emergency maintenance, and factors beyond our control may cause service interruptions.</p>
                        
                        <h3 class="h5 mt-4 mb-3">9.2 Acceptable Use</h3>
                        <p>When using our hosting services, you agree not to:</p>
                        <ul>
                            <li>Exceed the allocated resources for your hosting plan.</li>
                            <li>Use the service for illegal activities or to store, distribute, or link to illegal content.</li>
                            <li>Host content that infringes on intellectual property rights.</li>
                            <li>Engage in activities that could harm our servers or other customers (e.g., running resource-intensive scripts).</li>
                            <li>Engage in spamming or other abusive behavior.</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">9.3 Data Backup</h3>
                        <p>While we provide backup services, you are responsible for maintaining your own backups of your data. We are not liable for data loss for any reason, including but not limited to server failure, service discontinuation, or account termination.</p>
                        
                        <h3 class="h5 mt-4 mb-3">9.4 Hosting Refund Policy</h3>
                        <p><strong>30-Day Money-Back Guarantee:</strong> AppNomu offers a 30-day money-back guarantee for our hosting services. If you are not satisfied with our hosting services within the first 30 days of your initial purchase, you may request a full refund of your hosting fees. This refund policy is subject to the following conditions:</p>
                        <ul>
                            <li>The refund applies only to hosting fees and not to other services or fees (such as domain registration, SSL certificates, or setup fees).</li>
                            <li>The 30-day period begins on the date of the initial purchase.</li>
                            <li>Refunds after the 30-day period are not available unless required by law.</li>
                            <li>For monthly billing cycles, the refund is available only during the first month of service.</li>
                            <li>For annual or longer-term billing cycles, a prorated refund may be issued after the 30-day period has elapsed, at our discretion.</li>
                            <li>Accounts that have violated our Terms of Service are not eligible for a refund.</li>
                            <li>Requests for refunds must be submitted in writing to our customer support team.</li>
                        </ul>
                        
                        <h2 class="h3 mt-5 mb-4">10. Domain Registration Services</h2>
                        <p>The following terms apply specifically to our domain registration services:</p>
                        
                        <h3 class="h5 mt-4 mb-3">10.1 Domain Registration Process</h3>
                        <p>By registering a domain through our services, you agree to the terms and conditions of the relevant domain name registrar and registry. You acknowledge that domain registration is subject to the acceptance of your application by the respective registry.</p>
                        
                        <h3 class="h5 mt-4 mb-3">10.2 Registration Information</h3>
                        <p>You agree to provide accurate, current, and complete information for domain registration. Providing false or inaccurate information may result in the cancellation of your domain registration.</p>
                        
                        <h3 class="h5 mt-4 mb-3">10.3 Domain Renewal</h3>
                        <p>Domain names must be renewed before their expiration date to prevent loss of ownership. While we may attempt to notify you of upcoming expirations, it is your responsibility to monitor and renew your domains before they expire.</p>
                        
                        <h3 class="h5 mt-4 mb-3">10.4 Domain Cancellation and Refunds</h3>
                        <p><strong>No Refunds for Domain Registrations:</strong> Domain name registrations are final and cannot be canceled or refunded once the registration or renewal process has been completed. This no-refund policy applies because:</p>
                        <ul>
                            <li>Domain names are unique internet identifiers that are reserved exclusively for you upon registration.</li>
                            <li>The domain registration process incurs immediate costs that cannot be recovered.</li>
                            <li>Domain registrations are processed immediately and submitted to the registry.</li>
                            <li>Once registered, a domain cannot be "returned" or "restocked."</li>
                            <li>Domain transfers to another registrar do not qualify for refunds.</li>
                        </ul>
                        <p>By registering a domain through our services, you explicitly acknowledge and agree that you waive any right to a refund for domain registration fees.</p>
                        
                        <h2 class="h3 mt-5 mb-4">11. Website Audit Tool</h2>
                        <p>Our free website audit tool is provided as a lead generation service and is subject to the following terms:</p>
                        
                        <h3 class="h5 mt-4 mb-3">11.1 Service Description</h3>
                        <p>The website audit tool analyzes websites for performance, SEO, security, mobile compatibility, and accessibility. The analysis is automated and provides general recommendations based on common web standards and best practices.</p>
                        
                        <h3 class="h5 mt-4 mb-3">11.2 Usage Limitations</h3>
                        <ul>
                            <li><strong>Rate Limits:</strong> Maximum 3 audits per IP address per hour and 2 audits per email address per day</li>
                            <li><strong>Website Authority:</strong> You must have authorization to audit the submitted website</li>
                            <li><strong>Legitimate Use:</strong> The tool is intended for legitimate business purposes only</li>
                            <li><strong>No Automated Access:</strong> Automated or scripted access to the audit tool is prohibited</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">11.3 Data Collection and Lead Generation</h3>
                        <p>By using the audit tool, you acknowledge and agree that:</p>
                        <ul>
                            <li>Your submission constitutes a business inquiry and sales lead</li>
                            <li>We may contact you regarding our services and the audit results</li>
                            <li>Audit data is stored for business development and service improvement purposes</li>
                            <li>You consent to receive follow-up communications from our sales team</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">11.4 Accuracy and Limitations</h3>
                        <p>The audit tool provides automated analysis and general recommendations. We make no warranties regarding:</p>
                        <ul>
                            <li>The accuracy or completeness of audit results</li>
                            <li>The effectiveness of recommended improvements</li>
                            <li>The impact of implementing suggested changes</li>
                            <li>Compatibility with specific business requirements or technical constraints</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">11.5 Spam Protection</h3>
                        <p>We use Cloudflare Turnstile and other security measures to prevent abuse. Attempts to circumvent these protections or use the service for spam, automated data collection, or other malicious purposes will result in immediate termination of access and may be reported to relevant authorities.</p>
                        
                        <h2 class="h3 mt-5 mb-4" id="quotation-request">12. Quotation Request Process</h2>
                        <p>Our quotation request system allows potential clients to submit project inquiries and receive detailed proposals. By submitting a quote request, you agree to the following terms:</p>
                        
                        <h3 class="h5 mt-4 mb-3">12.1 Quote Request Submission</h3>
                        <p>When you submit a quote request through our website, you agree that:</p>
                        <ul>
                            <li>All information provided is accurate, complete, and truthful</li>
                            <li>You have the authority to request services on behalf of your organization (if applicable)</li>
                            <li>Your submission constitutes a genuine business inquiry</li>
                            <li>You consent to being contacted by our sales and technical teams</li>
                            <li>You authorize us to store and process your information for quote preparation and follow-up</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.2 Information Collection</h3>
                        <p>Through the quote request form, we collect:</p>
                        <ul>
                            <li><strong>Personal Information:</strong> Full name, email address, phone number, and country</li>
                            <li><strong>Project Details:</strong> Services required, budget range, timeline, project description, and business information</li>
                            <li><strong>Supporting Documents:</strong> Optional file uploads (specifications, designs, requirements documents)</li>
                            <li><strong>Security Data:</strong> Cloudflare Turnstile verification tokens to prevent spam and abuse</li>
                            <li><strong>Technical Data:</strong> IP address, browser information, and submission timestamp for security purposes</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.3 Quote Preparation and Response</h3>
                        <p>Upon receiving your quote request:</p>
                        <ul>
                            <li>You will receive an immediate confirmation email acknowledging receipt</li>
                            <li>Our team will review your requirements within 24 hours (business days)</li>
                            <li>We may contact you for clarification or additional information</li>
                            <li>A detailed quote will be provided via email within 24-48 hours</li>
                            <li>Quotes are valid for 30 days unless otherwise specified</li>
                            <li>We reserve the right to decline quote requests that don't align with our services</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.4 No Obligation</h3>
                        <p>Submitting a quote request does not obligate you to:</p>
                        <ul>
                            <li>Accept our proposal or pricing</li>
                            <li>Enter into any contract or agreement</li>
                            <li>Make any payment or financial commitment</li>
                            <li>Continue communications beyond your initial inquiry</li>
                        </ul>
                        <p>Similarly, providing a quote does not obligate AppNomu to provide services at the quoted price if project requirements change significantly or if the quote expires.</p>
                        
                        <h3 class="h5 mt-4 mb-3">12.5 Confidentiality</h3>
                        <p>We treat all quote requests with confidentiality:</p>
                        <ul>
                            <li>Project details and business information are kept confidential</li>
                            <li>Uploaded files are stored securely and accessed only by authorized personnel</li>
                            <li>Information is not shared with third parties without your consent</li>
                            <li>For sensitive projects, we can provide a Non-Disclosure Agreement (NDA) upon request</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.6 File Upload Terms</h3>
                        <p>When uploading files with your quote request:</p>
                        <ul>
                            <li>Maximum file size: 5MB per file</li>
                            <li>You must own or have rights to all uploaded content</li>
                            <li>Files must not contain viruses, malware, or malicious code</li>
                            <li>Files must not contain illegal, offensive, or inappropriate content</li>
                            <li>We reserve the right to scan and reject files that violate these terms</li>
                            <li>Uploaded files are retained for the duration of the quote process and project execution</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.7 Follow-Up Communications</h3>
                        <p>By submitting a quote request, you consent to receive:</p>
                        <ul>
                            <li>Immediate confirmation emails</li>
                            <li>Quote proposals and pricing information</li>
                            <li>Follow-up inquiries from our sales team</li>
                            <li>Clarification questions from our technical team</li>
                            <li>Periodic check-ins if you haven't responded</li>
                            <li>Information about relevant services or promotions</li>
                        </ul>
                        <p>You may opt out of follow-up communications at any time by contacting us or using the unsubscribe link in our emails.</p>
                        
                        <h3 class="h5 mt-4 mb-3">12.8 Spam and Abuse Prevention</h3>
                        <p>To protect our quote request system:</p>
                        <ul>
                            <li>All submissions are protected by Cloudflare Turnstile verification</li>
                            <li>We monitor for duplicate, fraudulent, or spam submissions</li>
                            <li>Automated or bot-generated requests are blocked</li>
                            <li>Abusive use may result in IP blocking and legal action</li>
                            <li>False or misleading information may result in quote rejection</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.9 Data Retention</h3>
                        <p>Quote request data is retained as follows:</p>
                        <ul>
                            <li><strong>Active Quotes:</strong> Retained for the duration of the quote process and 90 days after expiration</li>
                            <li><strong>Accepted Projects:</strong> Retained for the project duration plus 7 years for legal and accounting purposes</li>
                            <li><strong>Declined Quotes:</strong> Retained for 1 year for business development and analytics</li>
                            <li><strong>Uploaded Files:</strong> Deleted after 90 days if quote is not accepted, or retained with project files if accepted</li>
                        </ul>
                        
                        <h2 class="h3 mt-5 mb-4">13. Digital Marketing Services</h2>
                        <p>The following terms apply specifically to our digital marketing services, including but not limited to SEO, PPC, social media marketing, content marketing, and email marketing:</p>
                        
                        <h3 class="h5 mt-4 mb-3">12.1 Service Delivery</h3>
                        <p>We will use commercially reasonable efforts to deliver digital marketing services according to the agreed-upon specifications and timelines. However, we cannot guarantee specific rankings, traffic increases, or conversion rates, as these depend on various factors outside our control, including search engine algorithms, market conditions, and competitor activities.</p>
                        
                        <h3 class="h5 mt-4 mb-3">12.2 Google Ads Marketing Terms</h3>
                        <p>When utilizing our Google Ads marketing services, you agree to the following:</p>
                        <ul>
                            <li>All Google Ads campaigns must comply with Google's advertising policies and terms of service.</li>
                            <li>You must provide accurate and compliant information for ad content, landing pages, and business information.</li>
                            <li>You are responsible for ensuring that your website and business comply with all relevant laws and regulations.</li>
                            <li>We reserve the right to refuse to create or manage campaigns that violate Google's policies or applicable laws.</li>
                            <li>Budget adjustments may be necessary based on market conditions and campaign performance.</li>
                            <li>Google may suspend or terminate your ads account for policy violations, which is beyond our control.</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.3 WhatsApp API Marketing Terms</h3>
                        <p>When utilizing our WhatsApp API marketing services, you agree to the following:</p>
                        <ul>
                            <li>All WhatsApp campaigns must comply with Meta's WhatsApp Business API policies and terms of service.</li>
                            <li>You must have explicit consent from recipients before sending marketing messages.</li>
                            <li>You must honor opt-out requests immediately and maintain up-to-date contact lists.</li>
                            <li>Message content must comply with all applicable laws regarding marketing communications, including truth in advertising, privacy laws, and anti-spam regulations.</li>
                            <li>You must provide accurate business information for verification purposes.</li>
                            <li>WhatsApp may suspend or terminate your access for policy violations, which is beyond our control.</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.4 SMS Marketing Terms</h3>
                        <p>When utilizing our SMS marketing services, you agree to the following:</p>
                        <ul>
                            <li>All SMS campaigns must comply with applicable laws and regulations, including but not limited to the Telephone Consumer Protection Act (TCPA) in the US and similar laws in other jurisdictions.</li>
                            <li>You must have explicit consent from recipients before sending marketing messages.</li>
                            <li>You must honor opt-out requests immediately and maintain up-to-date contact lists.</li>
                            <li>Message content must comply with carrier requirements and industry standards.</li>
                        </ul>
                        
                        <h3 class="h5 mt-4 mb-3">12.5 Marketing Policy Violations and Damages</h3>
                        <p><strong>Important:</strong> You acknowledge that violations of Google Ads, WhatsApp API, or SMS marketing policies may result in severe consequences for AppNomu, including but not limited to account suspension, termination, and permanent banning from these platforms. Such actions would cause substantial damage to our business operations and reputation.</p>
                        <p>Therefore, you agree to the following:</p>
                        <ul>
                            <li>To strictly adhere to all platform policies and our guidelines for marketing campaigns.</li>
                            <li>That if your actions, content, or instructions cause violations that result in the suspension, termination, or banning of our Google Ads, WhatsApp API, or SMS marketing accounts, you will be liable for damages in the amount of USD 10,000 (Ten Thousand United States Dollars) as liquidated damages. This amount represents a reasonable estimate of the direct and indirect damages we would suffer, including loss of business, reputation damage, costs of establishing new accounts, and rebuilding marketing infrastructure.</li>
                            <li>That this liability is in addition to the termination of services and any other remedies available to us under these Terms or applicable law.</li>
                        </ul>
                        <p>By using our digital marketing services, you explicitly acknowledge and accept these terms regarding policy violations and potential damages.</p>
                        
                        <h2 class="h3 mt-5 mb-4">17. Termination</h2>
                        <p>We may terminate or suspend your account and access to our Services immediately, without prior notice or liability, for any reason, including without limitation if you breach these Terms.</p>
                        <p>Upon termination, your right to use our Services will immediately cease. All provisions of these Terms which by their nature should survive termination shall survive termination, including ownership provisions, warranty disclaimers, indemnity, and limitations of liability.</p>
                        
                        <h2 class="h3 mt-5 mb-4">13. Disclaimer of Warranties</h2>
                        <p>YOUR USE OF OUR SERVICES IS AT YOUR SOLE RISK. OUR SERVICES ARE PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS. APPNOMU DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT.</p>
                        <p>To the extent permitted by applicable law in Uganda and other jurisdictions, we do not warrant that our Services will be uninterrupted, error-free, or completely secure. We make no warranty regarding the quality, accuracy, timeliness, truthfulness, completeness, or reliability of any content available through our Services.</p>
                        
                        <h2 class="h3 mt-5 mb-4">14. Electronic Transactions</h2>
                        <p>In accordance with Uganda's Electronic Transactions Act, 2011, we recognize the validity of electronic records, electronic signatures, and electronic contracts. By using our Services, you acknowledge that:</p>
                        <ul>
                            <li>Electronic communications sent by you constitute valid and enforceable agreements</li>
                            <li>Electronic records of transactions are admissible in legal proceedings</li>
                            <li>Electronic signatures (including clicking "I agree" buttons) may constitute binding acceptance of terms</li>
                            <li>Time and place of dispatch and receipt of electronic communications are governed by the Electronic Transactions Act</li>
                        </ul>
                        <p>All electronic records of transactions will be maintained for a period of seven (7) years as required by Ugandan law.</p>
                        
                        <h2 class="h3 mt-5 mb-4">15. Dispute Resolution</h2>
                        <p>In the event of any dispute arising from or relating to these Terms or our Services, the following dispute resolution process will apply:</p>
                        <ol>
                            <li><strong>Amicable Resolution:</strong> The parties will first attempt to resolve the dispute through good-faith negotiations.</li>
                            <li><strong>Mediation:</strong> If the dispute cannot be resolved through negotiation within 30 days, either party may refer the dispute to mediation under the rules of the Centre for Arbitration and Dispute Resolution (CADER) in Uganda.</li>
                            <li><strong>Arbitration:</strong> If the dispute remains unresolved 60 days after the commencement of mediation, the dispute shall be referred to and finally resolved by arbitration under the rules of CADER, by one or more arbitrators appointed in accordance with the said rules.</li>
                            <li><strong>Governing Law:</strong> The arbitration shall be governed by the laws of Uganda.</li>
                            <li><strong>Venue:</strong> The place of arbitration shall be Kampala, Uganda.</li>
                            <li><strong>Language:</strong> The language of the arbitration shall be English.</li>
                        </ol>
                        <p>Nothing in this section shall prevent either party from seeking injunctive or other equitable relief from the courts for matters related to data security, intellectual property, or unauthorized access to the Services.</p>

                        <h2 class="h3 mt-5 mb-4">16. Limitation of Liability</h2>
                        <p>IN NO EVENT SHALL APPNOMU, ITS OFFICERS, DIRECTORS, EMPLOYEES, OR AGENTS BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, INCLUDING BUT NOT LIMITED TO LOSS OF PROFITS, DATA, USE, GOODWILL, OR OTHER INTANGIBLE LOSSES, RESULTING FROM (I) YOUR ACCESS TO OR USE OF OR INABILITY TO ACCESS OR USE OUR SERVICES; (II) ANY CONDUCT OR CONTENT OF ANY THIRD PARTY ON OUR SERVICES; OR (III) UNAUTHORIZED ACCESS, USE, OR ALTERATION OF YOUR TRANSMISSIONS OR CONTENT.</p>
                        
                        <h2 class="h3 mt-5 mb-4">16.1 Indemnification</h2>
                        <p>You agree to defend, indemnify, and hold harmless AppNomu and its officers, directors, employees, and agents from and against any claims, liabilities, damages, losses, and expenses, including without limitation reasonable attorney's fees, arising out of or in any way connected with (i) your access to or use of our Services; (ii) your violation of these Terms; or (iii) your violation of any third-party right, including without limitation any intellectual property right.</p>
                        
                        <h2 class="h3 mt-5 mb-4">16.2 Governing Law</h2>
                        <p>These Terms shall be governed by and construed in accordance with the laws of Uganda, without regard to its conflict of law provisions. You agree to submit to the personal jurisdiction of the courts located in Kampala, Uganda for the purpose of litigating all such claims or disputes.</p>
                        
                        <h2 class="h3 mt-5 mb-4">17. Changes to These Terms</h2>
                        <p>We reserve the right to modify these Terms at any time. We will provide notice of any material changes by:</p>
                        <ul>
                            <li>Posting the updated Terms on our website</li>
                            <li>Updating the "Last Updated" date at the top of these Terms</li>
                            <li>Sending an email notification to registered users (for significant changes)</li>
                        </ul>
                        <p>Your continued use of our Services after the posting of changes constitutes your acceptance of such changes. We encourage you to review these Terms regularly.</p>
                        
                        <h2 class="h3 mt-5 mb-4">18. Contact Us</h2>
                        <p>If you have any questions about these Terms, please contact us at:</p>
                        <address>
                            AppNomu Business Services<br>
                            77 Market Street, Bugiri Municipality, Uganda<br>
                            631 Ridgel St, Dover, Delaware 19904-2772, USA<br>
                            Email: legal@appnomu.com<br>
                            Phone: Uganda: +256 200 948420 / USA: +1 888 652 2233
                        </address>

                        <h2 class="h3 mt-5 mb-4">19. Severability</h2>
                        <p>If any provision of these Terms is held to be invalid or unenforceable under applicable law, such provision shall be struck out and the remaining provisions shall remain in full force and effect.</p>

                        <h2 class="h3 mt-5 mb-4">20. Compliance with Laws</h2>
                        <p>Our operations are primarily based in Uganda and are subject to Ugandan laws, including but not limited to:</p>
                        <ul>
                            <li>The Computer Misuse Act, 2011 (as amended)</li>
                            <li>The Data Protection and Privacy Act, 2019</li>
                            <li>The Electronic Transactions Act, 2011</li>
                            <li>The Electronic Signatures Act, 2011</li>
                            <li>The Uganda Communications Act, 2013</li>
                        </ul>
                        <p>Users from other jurisdictions accessing or using our Services agree to comply with all applicable local, state, national, and international laws and regulations.</p>

                        <h2 class="h3 mt-5 mb-4">21. Entire Agreement</h2>
                        <p>These Terms, together with our Privacy Policy and any other agreements expressly incorporated by reference herein, constitute the entire agreement between you and AppNomu Business Services concerning your use of the Services.</p>

                        <h2 class="h3 mt-5 mb-4">22. Contact Information</h2>
                        <p>If you have any questions about these Terms, please contact us at:</p>
                        <address>
                            AppNomu Business Services<br>
                            77 Market Street, Bugiri Municipality, Uganda<br>
                            631 Ridgel St, Dover, Delaware 19904-2772, USA<br>
                            Email: legal@appnomu.com<br>
                            Phone: Uganda: +256 200 948420 / USA: +1 888 652 2233
                        </address>
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
                <h2 class="h2 fw-bold mb-3">Ready to Get Started?</h2>
                <p class="lead mb-4" style="max-width: 700px; margin: 0 auto;">By using our services, you agree to these terms. Have questions about our legal agreements? Our legal team is here to help clarify any concerns.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                    <a href="contact.php" class="btn btn-primary btn-lg px-5 py-3 fw-bold">
                        <i class="bi bi-chat-dots me-2"></i>Contact Legal Team
                    </a>
                    <a href="privacy-policy.php" class="btn btn-outline-primary btn-lg px-5 py-3">
                        <i class="bi bi-shield-check me-2"></i>View Privacy Policy
                    </a>
                </div>
                <div class="mt-3">
                    <small class="text-muted fw-bold">✓ Uganda Electronic Transactions Act Compliant ✓ Fair & Transparent Terms ✓ Legal Support Available ✓ Clear Agreement</small>
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
