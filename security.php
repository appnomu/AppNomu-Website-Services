<?php
// Ensure default navigation is used
unset($menuItems);
// Include header
include_once 'includes/header.php';
?>

<!-- Security Hero Section -->
<section class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="mb-3">
                    <span class="badge bg-light text-primary mb-0 px-3 py-2 fw-bold">SECURITY & COMPLIANCE</span>
                </div>
                <h1 class="display-4 fw-bold mb-4">Enterprise-Grade Security You Can Trust</h1>
                <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">
                    Your data security is our top priority. We implement industry-leading security measures and compliance standards to protect your business and customer information.
                </p>
                <div class="row g-3 mt-4">
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <i class="bi bi-shield-check fs-2 text-white mb-2"></i>
                            <h3 class="h5 fw-bold text-white mb-0">SSL Encrypted</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <i class="bi bi-cloud-check fs-2 text-white mb-2"></i>
                            <h3 class="h5 fw-bold text-white mb-0">Daily Backups</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <i class="bi bi-eye-slash fs-2 text-white mb-2"></i>
                            <h3 class="h5 fw-bold text-white mb-0">Privacy Protected</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Security Measures -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Comprehensive Security Measures</h2>
            <p class="lead">Multi-layered protection for your digital assets</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-shield-lock fs-2 text-primary"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">SSL/TLS Encryption</h3>
                        <p class="text-muted">All data transmission is protected with 256-bit SSL encryption. Every website includes free SSL certificates for secure communication.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 text-center">
                        <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-database-lock fs-2 text-success"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Secure Data Storage</h3>
                        <p class="text-muted">Database encryption at rest, secure server configurations, and regular security audits ensure your data remains protected.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 text-center">
                        <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-cloud-arrow-up fs-2 text-warning"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Automated Backups</h3>
                        <p class="text-muted">Daily automated backups with 30-day retention. Multiple backup locations ensure your data can always be recovered.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 text-center">
                        <div class="bg-info bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-eye-slash fs-2 text-info"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Privacy Protection</h3>
                        <p class="text-muted">GDPR compliant data handling, privacy by design principles, and transparent data usage policies.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 text-center">
                        <div class="bg-danger bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-bug fs-2 text-danger"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Vulnerability Scanning</h3>
                        <p class="text-muted">Regular security scans, penetration testing, and immediate patching of any identified vulnerabilities.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 text-center">
                        <div class="bg-secondary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="bi bi-person-check fs-2 text-secondary"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Access Control</h3>
                        <p class="text-muted">Multi-factor authentication, role-based permissions, and secure password policies for all admin access.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Compliance Standards -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Compliance & Standards</h2>
            <p class="lead">Meeting international security and privacy requirements</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary rounded-3 p-2 me-3">
                                <i class="bi bi-shield-check text-white fs-4"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-0">GDPR Compliance</h3>
                        </div>
                        <p class="text-muted mb-3">Full compliance with European General Data Protection Regulation including:</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Data minimization principles</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Right to be forgotten</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Data portability</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Consent management</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success rounded-3 p-2 me-3">
                                <i class="bi bi-globe text-white fs-4"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-0">International Standards</h3>
                        </div>
                        <p class="text-muted mb-3">Adherence to globally recognized security frameworks:</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>ISO 27001 principles</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>OWASP security guidelines</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>PCI DSS for payments</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>SOC 2 Type II controls</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Security Guarantees -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Our Security Guarantees</h2>
            <p class="lead">Commitments we make to protect your business</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4 bg-light rounded-4 h-100">
                    <div class="bg-primary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-clock text-white fs-4"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">99.9% Uptime SLA</h3>
                    <p class="text-muted">Guaranteed service availability with automatic failover and redundant infrastructure.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="text-center p-4 bg-light rounded-4 h-100">
                    <div class="bg-success rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-shield-check text-white fs-4"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">Zero Data Loss</h3>
                    <p class="text-muted">Multiple backup systems and real-time replication ensure your data is never lost.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="text-center p-4 bg-light rounded-4 h-100">
                    <div class="bg-warning rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-headset text-white fs-4"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">24/7 Monitoring</h3>
                    <p class="text-muted">Round-the-clock security monitoring with immediate response to any threats.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Security Incident Response -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4">Incident Response Plan</h2>
                <p class="lead mb-4">Prepared for any security scenario with a comprehensive response protocol.</p>
                
                <div class="row g-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center p-3 bg-white rounded-3 shadow-sm">
                            <div class="bg-danger rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <span class="text-white fw-bold">1</span>
                            </div>
                            <div>
                                <h4 class="h6 fw-bold mb-1">Detection & Analysis</h4>
                                <small class="text-muted">Immediate threat identification and impact assessment</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-flex align-items-center p-3 bg-white rounded-3 shadow-sm">
                            <div class="bg-warning rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <span class="text-white fw-bold">2</span>
                            </div>
                            <div>
                                <h4 class="h6 fw-bold mb-1">Containment</h4>
                                <small class="text-muted">Isolate affected systems and prevent spread</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-flex align-items-center p-3 bg-white rounded-3 shadow-sm">
                            <div class="bg-info rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <span class="text-white fw-bold">3</span>
                            </div>
                            <div>
                                <h4 class="h6 fw-bold mb-1">Recovery</h4>
                                <small class="text-muted">Restore services and implement additional safeguards</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-flex align-items-center p-3 bg-white rounded-3 shadow-sm">
                            <div class="bg-success rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <span class="text-white fw-bold">4</span>
                            </div>
                            <div>
                                <h4 class="h6 fw-bold mb-1">Communication</h4>
                                <small class="text-muted">Transparent reporting to affected clients and stakeholders</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="bg-primary text-white p-4 rounded-4">
                    <h3 class="h4 fw-bold mb-3">Security Contact</h3>
                    <p class="mb-3">Report security vulnerabilities or incidents immediately:</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i><strong>security@appnomu.com</strong></li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i><strong>+256 200 948 420</strong></li>
                        <li class="mb-2"><i class="bi bi-clock me-2"></i><strong>24/7 Emergency Response</strong></li>
                    </ul>
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <small><i class="bi bi-info-circle me-2"></i>All security reports are handled confidentially and investigated within 24 hours.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust & Certifications -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Trusted by Enterprise Clients</h2>
            <p class="lead">Security credentials that enterprise clients rely on</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light rounded-4 p-4 text-center">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <i class="bi bi-shield-check fs-1 text-success"></i>
                            <h4 class="h6 fw-bold mt-2">SSL Certified</h4>
                        </div>
                        <div class="col-md-3">
                            <i class="bi bi-cloud-check fs-1 text-primary"></i>
                            <h4 class="h6 fw-bold mt-2">Cloud Secure</h4>
                        </div>
                        <div class="col-md-3">
                            <i class="bi bi-eye-slash fs-1 text-warning"></i>
                            <h4 class="h6 fw-bold mt-2">Privacy Protected</h4>
                        </div>
                        <div class="col-md-3">
                            <i class="bi bi-patch-check fs-1 text-info"></i>
                            <h4 class="h6 fw-bold mt-2">Compliance Ready</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <h4 class="fw-bold mb-3">Ready to Secure Your Business?</h4>
            <p class="mb-4">Get enterprise-grade security for your digital assets</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="request-quote.php" class="btn btn-primary btn-lg px-4">Get Security Assessment</a>
                <a href="contact.php" class="btn btn-outline-primary btn-lg px-4">Contact Security Team</a>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include_once 'includes/footer.php';
?>
