<?php
// Include path helper
include_once 'path-helper.php';

// Set page title
$pageTitle = 'Essential Website Security Measures';

// Include header
include_once '../includes/header.php';
?>

<!-- Blog Post Header -->
<div class="container-fluid py-5" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://services.appnomu.com/assets/images/website_measure.png'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <div class="badge bg-danger mb-3 px-3 py-2">Security</div>
                <h1 class="fw-bold mb-3 display-4">Essential Website Security Measures</h1>
                <p class="lead mb-3">Protect your website, your data, and your customers from online threats</p>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="https://services.appnomu.com/assets/images/Bahati%20Asher.jpg" alt="Bahati Asher" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                    <span>By AppNomu Team | May 10, 2025</span>
                </div>
                <div class="mt-4">
                    <a href="../contact.php?utm_source=blog&utm_medium=header&utm_campaign=security_guide" class="btn btn-danger me-2">Get Security Audit</a>
                    <a href="#table-of-contents" class="btn btn-outline-light">Read Article</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            
            <!-- Introduction -->
            <div class="mb-5">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-danger text-white p-2 rounded me-3">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h3>Introduction</h3>
                </div>
                
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <p class="lead">Website security is no longer optional in today's digital landscape. With cyber threats becoming more sophisticated, protecting your online presence is essential.</p>
                        <p>At AppNomu, we've helped businesses across Uganda, Kenya, South Africa, the United States, and India implement robust security measures to protect their websites, customer data, and business reputation. This guide covers the essential security practices every website owner should implement.</p>
                        
                        <div class="row mt-4">
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger text-white rounded-circle p-2 me-2">
                                        <i class="bi bi-shield-check"></i>
                                    </div>
                                    <div>
                                        <div class="small text-muted">Secure Websites</div>
                                        <div class="fw-bold">1,000+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger text-white rounded-circle p-2 me-2">
                                        <i class="bi bi-bug"></i>
                                    </div>
                                    <div>
                                        <div class="small text-muted">Threats Blocked</div>
                                        <div class="fw-bold">10M+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger text-white rounded-circle p-2 me-2">
                                        <i class="bi bi-patch-check"></i>
                                    </div>
                                    <div>
                                        <div class="small text-muted">Security Experts</div>
                                        <div class="fw-bold">15+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="position-relative">
                            <!-- Image placeholder removed -->
                            <div class="position-absolute top-0 start-0 bg-danger text-white px-3 py-2 rounded-end" style="transform: translateY(-50%)">
                                <i class="bi bi-shield-fill-exclamation me-1"></i> Security Guide
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Table of Contents -->
            <div class="card mb-5 border-0 shadow-sm" id="table-of-contents">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-danger text-white p-2 rounded me-3">
                            <i class="bi bi-list-ul"></i>
                        </div>
                        <h4 class="mb-0">Table of Contents</h4>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="#ssl-certificates" class="text-decoration-none">
                                        <i class="bi bi-1-circle-fill me-2 text-danger"></i>SSL Certificates & HTTPS
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#strong-passwords" class="text-decoration-none">
                                        <i class="bi bi-2-circle-fill me-2 text-danger"></i>Strong Password Policies
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#regular-updates" class="text-decoration-none">
                                        <i class="bi bi-3-circle-fill me-2 text-danger"></i>Regular Software Updates
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="#data-backups" class="text-decoration-none">
                                        <i class="bi bi-4-circle-fill me-2 text-danger"></i>Regular Data Backups
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#firewall-protection" class="text-decoration-none">
                                        <i class="bi bi-5-circle-fill me-2 text-danger"></i>Firewall Protection
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#conclusion" class="text-decoration-none">
                                        <i class="bi bi-6-circle-fill me-2 text-danger"></i>Conclusion & Next Steps
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-center">
                        <a href="../contact.php?utm_source=blog&utm_medium=toc&utm_campaign=security_guide" class="btn btn-danger">
                            <i class="bi bi-shield-check me-2"></i>Get a Free Security Assessment
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- First Content Section: SSL Certificates -->
            <div class="mb-5" id="ssl-certificates">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-danger text-white p-2 rounded me-3">
                        <i class="bi bi-lock"></i>
                    </div>
                    <h3>SSL Certificates & HTTPS</h3>
                </div>
                
                <p>Securing your website with an SSL certificate is no longer optional—it's essential. SSL certificates encrypt data transmitted between your website and visitors, protecting sensitive information from interception.</p>
                
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-danger text-white p-2 rounded-circle me-3">
                                        <i class="bi bi-check-circle"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Benefits of SSL/HTTPS</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0"><i class="bi bi-shield-fill-check me-2 text-success"></i>Encrypts data transmission</li>
                                    <li class="list-group-item border-0"><i class="bi bi-shield-fill-check me-2 text-success"></i>Builds customer trust with visible security indicators</li>
                                    <li class="list-group-item border-0"><i class="bi bi-shield-fill-check me-2 text-success"></i>Improves SEO rankings (Google favors secure sites)</li>
                                    <li class="list-group-item border-0"><i class="bi bi-shield-fill-check me-2 text-success"></i>Protects sensitive customer information</li>
                                    <li class="list-group-item border-0"><i class="bi bi-shield-fill-check me-2 text-success"></i>Required for PCI compliance if accepting payments</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 bg-light">
                            <div class="card-body p-4">
                                <h5 class="mb-3">SSL Adoption Statistics</h5>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Top 100 Websites</span>
                                        <span class="text-danger">100%</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>E-commerce Sites</span>
                                        <span class="text-danger">98%</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Small Business Websites</span>
                                        <span class="text-danger">76%</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 76%" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="../contact.php?utm_source=blog&utm_medium=content&utm_campaign=security_guide&service=ssl" class="btn btn-sm btn-danger">Get SSL Certificate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="alert alert-danger border-0 shadow-sm p-4">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bi bi-exclamation-triangle-fill fs-3"></i>
                        </div>
                        <div>
                            <h5 class="alert-heading">Warning: Browser Security Indicators</h5>
                            <p class="mb-0">Modern browsers now prominently mark websites without SSL as "Not Secure," which can significantly impact visitor trust and conversion rates. If your website still uses HTTP instead of HTTPS, visitors will see warning indicators that may drive them away from your site.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Strong Password Policies Section -->
            <div class="mb-5" id="strong-passwords">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-danger text-white p-2 rounded me-3">
                        <i class="bi bi-key"></i>
                    </div>
                    <h3>Strong Password Policies</h3>
                </div>
                
                <p>Weak passwords remain one of the most common vulnerabilities in website security. Implementing strong password policies is a simple yet effective way to significantly enhance your website's protection against unauthorized access.</p>
                
                <div class="row mb-4">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-danger text-white p-2 rounded-circle me-3">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Password Best Practices</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Minimum 12 characters in length</li>
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Combination of uppercase and lowercase letters</li>
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Include numbers and special characters</li>
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Avoid common words or predictable patterns</li>
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Use unique passwords for different accounts</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-danger text-white p-2 rounded-circle me-3">
                                        <i class="bi bi-gear"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Implementation Strategies</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Enforce password complexity requirements</li>
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Implement multi-factor authentication (MFA)</li>
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Set up account lockout after failed attempts</li>
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Require regular password changes (every 90 days)</li>
                                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2 text-danger"></i>Use a secure password manager</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-light p-4 rounded mb-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8 mb-3 mb-lg-0">
                            <h5>Password Breach Statistics</h5>
                            <p>According to recent cybersecurity reports:</p>
                            <ul class="mb-0">
                                <li>80% of data breaches involve compromised passwords</li>
                                <li>51% of people use the same passwords for both work and personal accounts</li>
                                <li>The average person reuses each password 14 times across different accounts</li>
                                <li>It takes hackers just 2 seconds to crack an 8-character password with only letters</li>
                            </ul>
                        </div>
                        <div class="col-lg-4 text-center">
                            <div class="p-3 bg-white rounded shadow-sm d-inline-block">
                                <div class="text-danger display-4 fw-bold">81%</div>
                                <p class="mb-0">of breaches due to<br>weak passwords</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-danger text-white py-3">
                        <h5 class="mb-0">Multi-Factor Authentication (MFA)</h5>
                    </div>
                    <div class="card-body">
                        <p>Multi-factor authentication adds an extra layer of security by requiring users to provide two or more verification factors to gain access to an account or system.</p>
                        <div class="row">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <div class="bg-danger text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="bi bi-person-fill fs-4"></i>
                                        </div>
                                        <h6>Something You Know</h6>
                                        <p class="small mb-0">Passwords, PINs, security questions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <div class="bg-danger text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="bi bi-phone-fill fs-4"></i>
                                        </div>
                                        <h6>Something You Have</h6>
                                        <p class="small mb-0">Mobile phone, security token, smart card</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <div class="bg-danger text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="bi bi-fingerprint fs-4"></i>
                                        </div>
                                        <h6>Something You Are</h6>
                                        <p class="small mb-0">Fingerprint, face recognition, voice recognition</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="../contact.php?utm_source=blog&utm_medium=content&utm_campaign=security_guide&service=mfa" class="btn btn-danger">
                                <i class="bi bi-shield-check me-2"></i>Implement MFA on Your Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Regular Software Updates Section -->
            <div class="mb-5" id="regular-updates">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-danger text-white p-2 rounded me-3">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <h3>Regular Software Updates</h3>
                </div>
                
                <p>Outdated software is a prime target for cyberattacks. Regular updates to your website's content management system (CMS), plugins, themes, and server software are crucial for maintaining security and preventing vulnerabilities from being exploited.</p>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="p-4">
                                    <h5 class="mb-3">Why Updates Matter</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-3">
                                            <div class="d-flex">
                                                <div class="bg-danger text-white rounded-circle p-2 me-3" style="height: 40px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="bi bi-shield"></i>
                                                </div>
                                                <div>
                                                    <h6>Security Patches</h6>
                                                    <p class="small text-muted mb-0">Updates often contain fixes for security vulnerabilities that have been discovered since the previous version.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-3">
                                            <div class="d-flex">
                                                <div class="bg-danger text-white rounded-circle p-2 me-3" style="height: 40px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="bi bi-bug"></i>
                                                </div>
                                                <div>
                                                    <h6>Bug Fixes</h6>
                                                    <p class="small text-muted mb-0">Software bugs can sometimes create security holes. Regular updates fix these issues before they can be exploited.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="bg-danger text-white rounded-circle p-2 me-3" style="height: 40px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="bi bi-speedometer2"></i>
                                                </div>
                                                <div>
                                                    <h6>Performance Improvements</h6>
                                                    <p class="small text-muted mb-0">Updates often include performance enhancements that can make your website faster and more secure.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 bg-light">
                                <div class="p-4">
                                    <h5 class="mb-3">Update Frequency Recommendations</h5>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Core CMS (WordPress, Joomla, etc.)</span>
                                            <span class="badge bg-danger">Immediately</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted">Apply security updates as soon as they're released</small>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Plugins & Themes</span>
                                            <span class="badge bg-danger">Weekly</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted">Check for updates at least once a week</small>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Server Software</span>
                                            <span class="badge bg-danger">Monthly</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted">Coordinate with your hosting provider</small>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Content & Assets</span>
                                            <span class="badge bg-danger">As Needed</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted">Update as business needs change</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="alert alert-danger border-0 shadow-sm p-4 mb-4">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bi bi-exclamation-triangle-fill fs-3"></i>
                        </div>
                        <div>
                            <h5 class="alert-heading">The Cost of Neglecting Updates</h5>
                            <p>According to IBM's Cost of a Data Breach Report, organizations with unpatched vulnerabilities experienced 57% more security breaches than those with regular update protocols. The average cost of these breaches was $4.24 million in 2021.</p>
                            <p class="mb-0">At AppNomu, we offer managed website maintenance services that include regular updates, security monitoring, and vulnerability assessments to keep your website secure and up-to-date.</p>
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-danger text-white py-3">
                        <h5 class="mb-0">Update Best Practices</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="bg-danger text-white rounded-circle p-2 me-3" style="height: 40px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                        <span>1</span>
                                    </div>
                                    <div>
                                        <h6>Backup Before Updating</h6>
                                        <p class="small text-muted">Always create a complete backup of your website before applying any updates, in case something goes wrong.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="bg-danger text-white rounded-circle p-2 me-3" style="height: 40px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                        <span>2</span>
                                    </div>
                                    <div>
                                        <h6>Test Updates in Staging</h6>
                                        <p class="small text-muted">When possible, test updates in a staging environment before applying them to your live website.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="d-flex">
                                    <div class="bg-danger text-white rounded-circle p-2 me-3" style="height: 40px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                        <span>3</span>
                                    </div>
                                    <div>
                                        <h6>Update During Low-Traffic Periods</h6>
                                        <p class="small text-muted">Schedule updates during times when your website has fewer visitors to minimize potential disruption.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="bg-danger text-white rounded-circle p-2 me-3" style="height: 40px; width: 40px; display: flex; align-items: center; justify-content: center;">
                                        <span>4</span>
                                    </div>
                                    <div>
                                        <h6>Verify After Updating</h6>
                                        <p class="small text-muted">After updates, check your website thoroughly to ensure everything is functioning correctly.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="../contact.php?utm_source=blog&utm_medium=content&utm_campaign=security_guide&service=maintenance" class="btn btn-danger">
                                <i class="bi bi-tools me-2"></i>Get Managed Website Maintenance
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Regular Data Backups Section -->
            <div class="mb-5" id="data-backups">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-danger text-white p-2 rounded me-3">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </div>
                    <h3>Regular Data Backups</h3>
                </div>
                
                <p>Even with the best security measures in place, no website is completely immune to threats. Regular data backups are your safety net, ensuring that you can quickly restore your website in case of data loss, corruption, or a successful cyberattack.</p>
                
                <div class="row mb-4">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-danger text-white py-3">
                                <h5 class="mb-0">The 3-2-1 Backup Strategy</h5>
                            </div>
                            <div class="card-body">
                                <p>The 3-2-1 backup strategy is a best practice recommended by cybersecurity experts to ensure your data remains safe and recoverable under virtually any circumstances.</p>
                                
                                <div class="row mt-4">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="text-center p-3 bg-light rounded">
                                            <div class="display-4 text-danger mb-2">3</div>
                                            <h6>Copies of Data</h6>
                                            <p class="small mb-0">Maintain at least three copies of your data: the original and two backups.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="text-center p-3 bg-light rounded">
                                            <div class="display-4 text-danger mb-2">2</div>
                                            <h6>Different Media Types</h6>
                                            <p class="small mb-0">Store backups on at least two different types of storage media.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center p-3 bg-light rounded">
                                            <div class="display-4 text-danger mb-2">1</div>
                                            <h6>Off-site Storage</h6>
                                            <p class="small mb-0">Keep at least one backup in a different physical location.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="mb-3">What to Back Up</h5>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item border-0 px-0">
                                        <div class="d-flex">
                                            <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-file-earmark-code"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Website Files</h6>
                                                <p class="small text-muted mb-0">All HTML, CSS, JavaScript, images, and other assets</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <div class="d-flex">
                                            <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-database"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Database</h6>
                                                <p class="small text-muted mb-0">All content, user data, and settings stored in your database</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <div class="d-flex">
                                            <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-gear"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Configuration Files</h6>
                                                <p class="small text-muted mb-0">Server configurations, .htaccess, and other settings</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 px-0">
                                        <div class="d-flex">
                                            <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Email Templates</h6>
                                                <p class="small text-muted mb-0">Custom email templates and configurations</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h5 class="mb-3">Backup Frequency</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Website Type</th>
                                                <th>Recommended Frequency</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>E-commerce</td>
                                                <td><span class="badge bg-danger">Daily</span></td>
                                            </tr>
                                            <tr>
                                                <td>Business Websites</td>
                                                <td><span class="badge bg-danger">Weekly</span></td>
                                            </tr>
                                            <tr>
                                                <td>Blogs</td>
                                                <td><span class="badge bg-danger">After Each Update</span></td>
                                            </tr>
                                            <tr>
                                                <td>Portfolio Sites</td>
                                                <td><span class="badge bg-danger">Monthly</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-3">Backup Storage Options</h5>
                                <div class="d-flex mb-3">
                                    <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-cloud"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Cloud Storage</h6>
                                        <p class="small text-muted mb-0">Services like Google Drive, Dropbox, or specialized backup services</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-hdd"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">External Hard Drives</h6>
                                        <p class="small text-muted mb-0">Physical storage devices kept in a secure location</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-server"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Hosting Provider Backups</h6>
                                        <p class="small text-muted mb-0">Many hosting providers offer automated backup solutions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="alert alert-success border-0 shadow-sm p-4">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bi bi-lightbulb-fill fs-3 text-danger"></i>
                        </div>
                        <div>
                            <h5 class="alert-heading text-danger">AppNomu Backup Services</h5>
                            <p>At AppNomu, we offer comprehensive backup solutions for websites of all sizes. Our managed backup service includes:</p>
                            <ul class="mb-0">
                                <li>Automated daily, weekly, or monthly backups</li>
                                <li>Secure off-site storage with encryption</li>
                                <li>One-click restore functionality</li>
                                <li>Backup verification and testing</li>
                                <li>24/7 monitoring and support</li>
                            </ul>
                            <div class="mt-3">
                                <a href="../contact.php?utm_source=blog&utm_medium=content&utm_campaign=security_guide&service=backup" class="btn btn-sm btn-danger">
                                    <i class="bi bi-cloud-arrow-up me-2"></i>Learn About Our Backup Solutions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Firewall Protection Section -->
            <div class="mb-5" id="firewall-protection">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-danger text-white p-2 rounded me-3">
                        <i class="bi bi-bricks"></i>
                    </div>
                    <h3>Firewall Protection</h3>
                </div>
                
                <p>A web application firewall (WAF) acts as a shield between your website and potential attackers, filtering out malicious traffic before it can reach your site. Implementing a firewall is one of the most effective ways to protect your website from a wide range of threats.</p>
                
                <div class="row align-items-center mb-4">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="mb-3">How Web Firewalls Work</h5>
                                <p>Web application firewalls analyze HTTP traffic between your website and the internet, blocking suspicious requests that could indicate an attack attempt.</p>
                                
                                <div class="bg-light p-3 rounded mb-3">
                                    <h6 class="mb-2"><i class="bi bi-shield-check text-danger me-2"></i>Types of Attacks Firewalls Prevent</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="mb-0">
                                                <li>SQL Injection</li>
                                                <li>Cross-Site Scripting (XSS)</li>
                                                <li>Cross-Site Request Forgery</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="mb-0">
                                                <li>DDoS Attacks</li>
                                                <li>File Inclusion Exploits</li>
                                                <li>Malicious Bots</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-danger text-white rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-graph-up"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Performance Impact</h6>
                                        <p class="small text-muted mb-0">Modern cloud-based WAFs have minimal impact on website loading times while providing robust protection.</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger text-white rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-gear"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Configuration Flexibility</h6>
                                        <p class="small text-muted mb-0">Firewalls can be configured to match your specific security needs and website functionality.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-danger text-white py-3">
                                <h5 class="mb-0">Firewall Implementation Options</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="d-flex mb-3">
                                        <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-cloud"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Cloud-Based WAF</h6>
                                            <p class="small text-muted mb-0">Services like Cloudflare, Sucuri, or AWS WAF that filter traffic before it reaches your server</p>
                                        </div>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between small text-muted mt-1">
                                        <span>Ease of Setup</span>
                                        <span>Very Easy</span>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <div class="d-flex mb-3">
                                        <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-plugin"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Plugin-Based WAF</h6>
                                            <p class="small text-muted mb-0">Security plugins for CMS platforms like WordPress (Wordfence, Sucuri, etc.)</p>
                                        </div>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between small text-muted mt-1">
                                        <span>Ease of Setup</span>
                                        <span>Easy</span>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="d-flex mb-3">
                                        <div class="bg-danger text-white rounded p-2 me-3" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-server"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Server-Level WAF</h6>
                                            <p class="small text-muted mb-0">ModSecurity for Apache/Nginx or hardware firewalls for enterprise-level protection</p>
                                        </div>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between small text-muted mt-1">
                                        <span>Ease of Setup</span>
                                        <span>Complex</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-md-6 p-4">
                                <h5 class="mb-3">Firewall Statistics</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-danger text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi bi-shield-x"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">31.4 million</h6>
                                                <p class="small text-muted mb-0">Average number of attacks blocked per day by Cloudflare WAF</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-danger text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi bi-graph-up-arrow"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">68%</h6>
                                                <p class="small text-muted mb-0">Reduction in successful attacks after implementing a WAF</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-danger text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi bi-clock-history"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">3.5 hours</h6>
                                                <p class="small text-muted mb-0">Average time saved per month on security incident response</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 bg-light p-4">
                                <h5 class="mb-3">AppNomu Firewall Solutions</h5>
                                <p>We offer comprehensive firewall protection for websites of all sizes:</p>
                                <ul class="mb-4">
                                    <li>Cloud-based WAF implementation</li>
                                    <li>Custom firewall rule configuration</li>
                                    <li>24/7 monitoring and threat detection</li>
                                    <li>Regular security reports and analytics</li>
                                    <li>Integration with other security measures</li>
                                </ul>
                                <div class="text-center">
                                    <a href="../contact.php?utm_source=blog&utm_medium=content&utm_campaign=security_guide&service=firewall" class="btn btn-danger">
                                        <i class="bi bi-shield-check me-2"></i>Get Firewall Protection
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Conclusion Section -->
            <div class="mb-5" id="conclusion">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-danger text-white p-2 rounded me-3">
                        <i class="bi bi-check2-circle"></i>
                    </div>
                    <h3>Conclusion & Next Steps</h3>
                </div>
                
                <p>Website security is not a one-time setup but an ongoing process that requires vigilance and regular maintenance. By implementing the five essential security measures outlined in this guide—SSL certificates, strong password policies, regular software updates, data backups, and firewall protection—you can significantly reduce the risk of security breaches and protect your business and customers.</p>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-danger text-white py-3">
                        <h5 class="mb-0">Security Implementation Checklist</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6 class="mb-3"><i class="bi bi-1-circle-fill me-2 text-danger"></i>Immediate Actions</h6>
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check1">
                                            <label class="form-check-label" for="check1"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Install SSL certificate on your website</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check2">
                                            <label class="form-check-label" for="check2"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Update all software to the latest versions</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check3">
                                            <label class="form-check-label" for="check3"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Create a complete backup of your website</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6 class="mb-3"><i class="bi bi-2-circle-fill me-2 text-danger"></i>Short-Term Actions (1-2 Weeks)</h6>
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check4">
                                            <label class="form-check-label" for="check4"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Implement strong password policies</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check5">
                                            <label class="form-check-label" for="check5"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Set up a web application firewall</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check6">
                                            <label class="form-check-label" for="check6"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Establish a regular backup schedule</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h6 class="mb-3"><i class="bi bi-3-circle-fill me-2 text-danger"></i>Long-Term Actions (1-3 Months)</h6>
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check7">
                                            <label class="form-check-label" for="check7"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Implement multi-factor authentication</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check8">
                                            <label class="form-check-label" for="check8"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Conduct a security audit of your website</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check9">
                                            <label class="form-check-label" for="check9"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Create a security incident response plan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3"><i class="bi bi-4-circle-fill me-2 text-danger"></i>Ongoing Maintenance</h6>
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check10">
                                            <label class="form-check-label" for="check10"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Regularly update all software and plugins</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check11">
                                            <label class="form-check-label" for="check11"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Monitor website security logs</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="check12">
                                            <label class="form-check-label" for="check12"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">Perform quarterly security reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-light p-4 rounded mb-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8 mb-3 mb-lg-0">
                            <h5>Need Help Securing Your Website?</h5>
                            <p>AppNomu offers comprehensive website security services tailored to businesses of all sizes. Our security experts can help you implement all the measures discussed in this guide and provide ongoing monitoring and support to keep your website secure.</p>
                            <ul class="mb-0">
                                <li>Complete security audit and vulnerability assessment</li>
                                <li>Implementation of all essential security measures</li>
                                <li>24/7 security monitoring and threat detection</li>
                                <li>Regular security updates and maintenance</li>
                                <li>Emergency response for security incidents</li>
                            </ul>
                        </div>
                        <div class="col-lg-4 text-center">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="mb-3">Get a Free Security Assessment</h5>
                                    <p class="small mb-4">Contact us today to schedule a free website security assessment and consultation.</p>
                                    <a href="../contact.php?utm_source=blog&utm_medium=conclusion&utm_campaign=security_guide&service=security_assessment" class="btn btn-danger">
                                        <i class="bi bi-shield-check me-2"></i>Contact Us Today
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="alert alert-danger border-0 shadow-sm p-4">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bi bi-lightbulb-fill fs-3"></i>
                        </div>
                        <div>
                            <h5 class="alert-heading">Final Thoughts</h5>
                            <p>Remember that website security is an investment, not an expense. The cost of implementing proper security measures is minimal compared to the potential financial and reputational damage of a security breach.</p>
                            <p class="mb-0">At AppNomu, we're committed to helping businesses protect their online presence. If you have any questions about website security or need assistance implementing any of the measures discussed in this guide, don't hesitate to <a href="../contact.php?utm_source=blog&utm_medium=final_thoughts&utm_campaign=security_guide" class="alert-link">contact us</a>.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Content -->
            <div class="mt-5 pt-5 border-top">
                <!-- Author Bio -->
                <div class="card mb-5 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-3 text-center mb-4 mb-lg-0">
                                <img src="https://services.appnomu.com/assets/images/Bahati%20Asher.jpg" alt="Bahati Asher" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                <h5 class="mb-1">Bahati Asher Faith</h5>
                                <p class="text-muted mb-3">Founder & Lead Developer</p>
                                <div class="social-icons">
                                    <a href="https://x.com/bahatiasher256?utm_source=blog&utm_medium=author_bio&utm_campaign=security_guide" class="me-2 btn btn-sm btn-outline-danger rounded-circle"><i class="bi bi-twitter"></i></a>
                                    <a href="https://www.linkedin.com/in/bahati-asher/?utm_source=blog&utm_medium=author_bio&utm_campaign=security_guide" class="me-2 btn btn-sm btn-outline-danger rounded-circle"><i class="bi bi-linkedin"></i></a>
                                    <a href="https://wa.me/256774039937?utm_source=blog&utm_medium=author_bio&utm_campaign=security_guide" class="btn btn-sm btn-outline-danger rounded-circle"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-danger text-white p-2 rounded me-3">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <h4 class="mb-0">About the Author</h4>
                                </div>
                                <p>Bahati Asher Faith is the founder of AppNomu and has over 7 years of experience in web development and digital marketing. He has personally overseen the development of more than 500 websites and mobile applications for clients across Africa, the United States, and India.</p>
                                <p class="mb-0">With a background in computer science and business administration, Bahati specializes in creating websites that not only look great but also drive business results through strategic planning and implementation.</p>
                                
                                <div class="row mt-4">
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-danger text-white rounded-circle p-2 me-2">
                                                <i class="bi bi-laptop"></i>
                                            </div>
                                            <div>
                                                <div class="small text-muted">Projects</div>
                                                <div class="fw-bold">500+</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-danger text-white rounded-circle p-2 me-2">
                                                <i class="bi bi-globe"></i>
                                            </div>
                                            <div>
                                                <div class="small text-muted">Countries</div>
                                                <div class="fw-bold">5+</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-danger text-white rounded-circle p-2 me-2">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                            <div>
                                                <div class="small text-muted">Experience</div>
                                                <div class="fw-bold">7+ Years</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
<!-- Related Posts -->
                <div class="mb-5">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-danger text-white p-2 rounded me-3">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <h4 class="mb-0">Related Posts</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm hover-shadow">
                                <div class="card-body pt-4">
                                    <div class="badge bg-success mb-2">Best Practices</div>
                                    <h5 class="card-title">Best Practices That Make AppNomu Leading</h5>
                                    <p class="card-text text-muted">Discover the strategies and techniques that have established AppNomu as the premier web design agency.</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> June 10, 2025</small>
                                        <a href="appnomu-best-practices.php?utm_source=blog&utm_medium=related&utm_campaign=security_guide" class="btn btn-sm btn-danger">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm hover-shadow">
                                <div class="card-body pt-4">
                                    <div class="badge bg-primary mb-2">Planning</div>
                                    <h5 class="card-title">Things to Consider While Planning a Website</h5>
                                    <p class="card-text text-muted">A comprehensive guide to creating successful websites with proper planning and strategy.</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> June 2, 2025</small>
                                        <a href="things-to-consider-while-planning-website.php?utm_source=blog&utm_medium=related&utm_campaign=security_guide" class="btn btn-sm btn-danger">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm hover-shadow">
                                <div class="card-body pt-4">
                                    <div class="badge bg-warning mb-2">Services</div>
                                    <h5 class="card-title">Why Choose AppNomu For Your Digital Needs</h5>
                                    <p class="card-text text-muted">Discover why AppNomu is the best choice for website hosting, design, and development.</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> June 2, 2024</small>
                                        <a href="why-choose-appnomu.php?utm_source=blog&utm_medium=related&utm_campaign=security_guide" class="btn btn-sm btn-danger">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Share This Post -->
                <div class="card mb-5 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-danger text-white p-2 rounded me-3">
                                <i class="bi bi-share"></i>
                            </div>
                            <h4 class="mb-0">Share This Post</h4>
                        </div>
                        <div class="d-flex flex-wrap justify-content-center">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(site_url('blog/website-security-measures.php')); ?>&text=<?php echo urlencode('Learn about essential website security measures!'); ?>&utm_source=blog&utm_medium=social_share&utm_campaign=security_guide" class="btn btn-outline-dark m-2" target="_blank">
                                <i class="bi bi-twitter me-2"></i>Share on Twitter
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(site_url('blog/website-security-measures.php')); ?>?utm_source=blog&utm_medium=social_share&utm_campaign=security_guide" class="btn btn-outline-primary m-2" target="_blank">
                                <i class="bi bi-facebook me-2"></i>Share on Facebook
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(site_url('blog/website-security-measures.php')); ?>?utm_source=blog&utm_medium=social_share&utm_campaign=security_guide" class="btn btn-outline-linkedin m-2" target="_blank">
                                <i class="bi bi-linkedin me-2"></i>Share on LinkedIn
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode('Learn about essential website security measures! ' . site_url('blog/website-security-measures.php')); ?>?utm_source=blog&utm_medium=social_share&utm_campaign=security_guide" class="btn btn-outline-success m-2" target="_blank">
                                <i class="bi bi-whatsapp me-2"></i>Share on WhatsApp
                            </a>
                            <a href="mailto:?subject=<?php echo urlencode('Essential Website Security Measures'); ?>&body=<?php echo urlencode('I thought you might find this article interesting: ' . site_url('blog/website-security-measures.php')); ?>?utm_source=blog&utm_medium=social_share&utm_campaign=security_guide" class="btn btn-outline-secondary m-2">
                                <i class="bi bi-envelope me-2"></i>Share via Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
include_once '../includes/footer.php';
?>

