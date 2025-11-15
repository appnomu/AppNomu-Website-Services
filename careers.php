<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include header
include_once 'includes/header.php';

// Check for application submission messages
$applicationSuccess = false;
$applicationMessage = "";
$applicationErrors = [];

if (isset($_GET['application']) && $_GET['application'] === 'success') {
    $applicationSuccess = true;
    if (isset($_SESSION['application_message'])) {
        $applicationMessage = $_SESSION['application_message'];
        unset($_SESSION['application_message']);
    } else {
        $applicationMessage = "Your application has been submitted successfully. We will contact you shortly.";
    }
} elseif (isset($_GET['application']) && $_GET['application'] === 'error') {
    if (isset($_SESSION['application_errors'])) {
        $applicationErrors = $_SESSION['application_errors'];
        unset($_SESSION['application_errors']);
    } else {
        $applicationErrors[] = "There was an error processing your application. Please try again.";
    }
}
?>

<!-- Enhanced Careers Hero Section -->
<section class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-light text-primary mb-0 px-3 py-2 fw-bold me-3">NOW HIRING</span>
                    <span class="badge bg-success mb-0 px-3 py-2 fw-bold text-white">FAST GROWTH</span>
                </div>
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2;">
                    Build Your Career in <span style="background: linear-gradient(45deg, #60a5fa, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Africa's Leading</span> Tech Company
                </h1>
                <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">
                    Join 20+ talented professionals across 5 countries building the future of African technology. Competitive salaries, rapid career growth, and the opportunity to impact 1,200+ businesses across the continent.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="#current-openings" class="btn btn-light btn-lg fw-bold px-4 py-3 text-primary">View Open Positions</a>
                    <a href="#applyModal" class="btn btn-outline-light btn-lg px-4 py-3" data-bs-toggle="modal">Apply Now</a>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <!-- Career Stats -->
                <div class="row g-3">
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">20+</h3>
                            <p class="mb-0 text-white-50">Team Members</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">5</h3>
                            <p class="mb-0 text-white-50">Countries</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">85%</h3>
                            <p class="mb-0 text-white-50">Promotion Rate</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">$2K+</h3>
                            <p class="mb-0 text-white-50">Monthly Salary</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($applicationSuccess): ?>
<div class="container mt-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2 fs-4"></i>
            <div>
                <strong>Application Submitted!</strong> <?php echo $applicationMessage; ?>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php elseif (!empty($applicationErrors)): ?>
<div class="container mt-4">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
            <div>
                <strong>Oops!</strong> There were errors with your application:
                <ul class="mb-0 mt-2">
                    <?php foreach($applicationErrors as $error): ?>
                    <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php endif; ?>

<!-- Why Join Us -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://services.appnomu.com/assets/images/Career_path.jpg" alt="Career Path at AppNomu" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4">Why Join AppNomu?</h2>
                <p class="lead">At AppNomu, we're more than just a company – we're a community of innovators passionate about creating digital solutions that make a difference.</p>
                <p>With a presence across Uganda, Kenya, South Africa, the United States, and India, we offer a truly global work environment where diverse perspectives are valued and celebrated. Our team of 20+ talented professionals collaborates across borders to deliver exceptional results for our clients.</p>
                <p>If you're looking for a challenging and rewarding career in the tech industry, AppNomu provides the perfect platform to grow your skills, work on exciting projects, and make a meaningful impact.</p>
            </div>
        </div>
    </div>
</section>

<!-- Employee Testimonials -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">What Our Team Says</h2>
            <p class="lead">Hear from AppNomu employees about their growth and experiences</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <small class="text-muted">Senior Developer</small>
                        </div>
                        <p class="mb-3">"I joined AppNomu as a junior developer 2 years ago and I'm now leading my own team. The growth opportunities here are incredible - they invest in your skills and give you real responsibility to make an impact."</p>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <span class="text-white fw-bold">D</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0">David Mukasa</h6>
                                <small class="text-muted">Senior PHP Developer, Kampala</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <small class="text-muted">UI/UX Designer</small>
                        </div>
                        <p class="mb-3">"Working remotely from Nairobi while collaborating with teams across Africa has been amazing. AppNomu truly embraces diversity and gives everyone a voice. Plus, the salary is competitive with international standards."</p>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <span class="text-white fw-bold">A</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0">Amina Wanjiku</h6>
                                <small class="text-muted">Lead Designer, Nairobi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <small class="text-muted">Marketing Specialist</small>
                        </div>
                        <p class="mb-3">"The learning opportunities are endless here. AppNomu sponsored my digital marketing certification and I've worked on campaigns for major African brands. It's exciting to be part of building Africa's tech ecosystem."</p>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <span class="text-white fw-bold">T</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-0">Thabo Mthembu</h6>
                                <small class="text-muted">Digital Marketing Lead, Johannesburg</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Career Growth Stats -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-white rounded-4 p-4 shadow-sm">
                    <h4 class="text-center mb-4">Career Growth at AppNomu</h4>
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h3 class="fw-bold text-primary mb-1">85%</h3>
                            <small class="text-muted">Internal Promotion Rate</small>
                        </div>
                        <div class="col-md-3">
                            <h3 class="fw-bold text-primary mb-1">18</h3>
                            <small class="text-muted">Average Months to Promotion</small>
                        </div>
                        <div class="col-md-3">
                            <h3 class="fw-bold text-primary mb-1">$5K</h3>
                            <small class="text-muted">Annual Learning Budget</small>
                        </div>
                        <div class="col-md-3">
                            <h3 class="fw-bold text-primary mb-1">100%</h3>
                            <small class="text-muted">Remote Work Flexibility</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Our Values</h2>
            <p class="lead">The principles that guide our work and culture</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mx-auto mb-3">
                            <i class="bi bi-lightbulb fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h4">Innovation</h3>
                        <p class="card-text">We embrace creativity and forward-thinking, constantly exploring new technologies and approaches to solve complex problems.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mx-auto mb-3">
                            <i class="bi bi-stars fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h4">Excellence</h3>
                        <p class="card-text">We are committed to delivering the highest quality in everything we do, exceeding expectations and setting new standards in the industry.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mx-auto mb-3">
                            <i class="bi bi-people fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h4">Collaboration</h3>
                        <p class="card-text">We believe in the power of teamwork and partnership, working closely with our clients and each other to achieve shared goals.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mx-auto mb-3">
                            <i class="bi bi-globe fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h4">Diversity</h3>
                        <p class="card-text">We celebrate diversity in all its forms and believe that different perspectives lead to better solutions and a stronger team.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mx-auto mb-3">
                            <i class="bi bi-graph-up-arrow fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h4">Growth</h3>
                        <p class="card-text">We are committed to continuous learning and development, both for our team members and for the businesses we serve.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mx-auto mb-3">
                            <i class="bi bi-heart fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h4">Impact</h3>
                        <p class="card-text">We strive to make a positive difference in the world through our work, creating solutions that address real challenges.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Benefits & Perks</h2>
            <p class="lead">What you can expect when you join the AppNomu family</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="benefits-list">
                    <div class="d-flex mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-currency-dollar fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="h5 mb-2">Competitive Compensation</h4>
                            <p class="mb-0">We offer competitive salaries and performance-based bonuses to recognize and reward your contributions.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-laptop fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="h5 mb-2">Flexible Work Arrangements</h4>
                            <p class="mb-0">We offer flexible working hours and remote work options to help you maintain a healthy work-life balance.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-book fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="h5 mb-2">Learning & Development</h4>
                            <p class="mb-0">Access to training programs, workshops, and conferences to enhance your skills and advance your career.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="benefits-list">
                    <div class="d-flex mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-heart-pulse fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="h5 mb-2">Health & Wellness</h4>
                            <p class="mb-0">Comprehensive health insurance and wellness programs to support your physical and mental well-being.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-people-fill fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="h5 mb-2">Collaborative Environment</h4>
                            <p class="mb-0">Work with talented professionals from diverse backgrounds in a supportive and inclusive environment.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-arrow-up-right-circle fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="h5 mb-2">Career Growth</h4>
                            <p class="mb-0">Clear career paths and opportunities for advancement based on your performance and aspirations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Current Openings -->
<section id="current-openings" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Current Openings</h2>
            <p class="lead">Competitive salaries, fast hiring process, and immediate impact opportunities</p>
            
            <!-- Hiring Promise -->
            <div class="bg-primary bg-opacity-10 rounded-3 p-3 mb-4 d-inline-block">
                <div class="d-flex align-items-center">
                    <i class="bi bi-lightning-charge-fill text-primary me-2"></i>
                    <small class="fw-bold">Fast Track Hiring: Interview to Offer in 7 Days</small>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Job 1 -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-primary">Full-time</span>
                            <span class="badge bg-secondary">Kampala, Uganda</span>
                        </div>
                        <h3 class="card-title h4 mb-2">Senior PHP Developer</h3>
                        <div class="d-flex align-items-center mb-3">
                            <p class="text-muted mb-0 me-3">Web Development Team</p>
                            <span class="badge bg-success px-3 py-2 fw-bold">$2,500 - $3,500/month</span>
                        </div>
                        <p class="card-text">We're looking for an experienced PHP Developer to join our team in Kampala. In this role, you'll be responsible for developing and maintaining web applications using PHP, MySQL, and modern JavaScript frameworks.</p>
                        <h5 class="h6 mt-4 mb-2">Requirements:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> 3+ years of PHP development experience</li>
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Strong knowledge of MySQL and front-end technologies</li>
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Experience with PHP frameworks (Laravel, Symfony)</li>
                        </ul>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <small class="text-muted"><i class="bi bi-gift me-1"></i> Health insurance + $5K learning budget</small>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Job 2 -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-primary">Full-time</span>
                            <span class="badge bg-secondary">Nairobi, Kenya</span>
                        </div>
                        <h3 class="card-title h4 mb-2">Mobile App Developer</h3>
                        <div class="d-flex align-items-center mb-3">
                            <p class="text-muted mb-0 me-3">Mobile Development Team</p>
                            <span class="badge bg-success px-3 py-2 fw-bold">$2,200 - $3,200/month</span>
                        </div>
                        <p class="card-text">We're seeking a talented Mobile App Developer to create innovative applications for iOS and Android platforms. You'll work on exciting projects including our in-house products and client applications.</p>
                        <h5 class="h6 mt-4 mb-2">Requirements:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Experience with React Native or Flutter</li>
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Knowledge of iOS and Android development</li>
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Strong problem-solving skills</li>
                        </ul>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <small class="text-muted"><i class="bi bi-laptop me-1"></i> MacBook Pro + Remote flexibility</small>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Job 3 -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-primary">Full-time</span>
                            <span class="badge bg-secondary">Remote</span>
                        </div>
                        <h3 class="card-title h4 mb-2">UI/UX Designer</h3>
                        <div class="d-flex align-items-center mb-3">
                            <p class="text-muted mb-0 me-3">Design Team</p>
                            <span class="badge bg-success px-3 py-2 fw-bold">$1,800 - $2,800/month</span>
                        </div>
                        <p class="card-text">We're looking for a creative UI/UX Designer to join our team. You'll be responsible for creating beautiful, intuitive interfaces for websites and mobile applications that provide exceptional user experiences.</p>
                        <h5 class="h6 mt-4 mb-2">Requirements:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Portfolio demonstrating UI/UX design skills</li>
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Proficiency with design tools (Figma, Adobe XD)</li>
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Understanding of user-centered design principles</li>
                        </ul>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <small class="text-muted"><i class="bi bi-palette me-1"></i> Creative Suite + Design conferences</small>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Job 4 -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-primary">Full-time</span>
                            <span class="badge bg-secondary">Johannesburg, South Africa</span>
                        </div>
                        <h3 class="card-title h4 mb-2">Digital Marketing Specialist</h3>
                        <div class="d-flex align-items-center mb-3">
                            <p class="text-muted mb-0 me-3">Marketing Team</p>
                            <span class="badge bg-success px-3 py-2 fw-bold">$2,000 - $3,000/month</span>
                        </div>
                        <p class="card-text">We're seeking a Digital Marketing Specialist to help grow our online presence and support our clients' digital marketing efforts. You'll be responsible for implementing and optimizing marketing campaigns across various channels.</p>
                        <h5 class="h6 mt-4 mb-2">Requirements:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Experience with SEO, SEM, and social media marketing</li>
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Knowledge of analytics tools and reporting</li>
                            <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i> Strong communication and analytical skills</li>
                        </ul>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <small class="text-muted"><i class="bi bi-graph-up me-1"></i> Marketing tools + Certification budget</small>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <p class="mb-3">Don't see a position that matches your skills?</p>
            <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Submit Your Resume</a>
        </div>
    </div>
</section>

<!-- Application Process -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Our Hiring Process</h2>
            <p class="lead">What to expect when you apply to join AppNomu</p>
        </div>
        
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="process-timeline">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="process-step text-center">
                                <div class="process-icon mb-3">
                                    <div class="icon-box mx-auto">
                                        <span class="h4 m-0">1</span>
                                    </div>
                                </div>
                                <h4 class="h5 mb-2">Application</h4>
                                <p class="small">Submit your resume and cover letter through our online application system.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="process-step text-center">
                                <div class="process-icon mb-3">
                                    <div class="icon-box mx-auto">
                                        <span class="h4 m-0">2</span>
                                    </div>
                                </div>
                                <h4 class="h5 mb-2">Initial Screening</h4>
                                <p class="small">Our HR team reviews applications and conducts initial phone interviews.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="process-step text-center">
                                <div class="process-icon mb-3">
                                    <div class="icon-box mx-auto">
                                        <span class="h4 m-0">3</span>
                                    </div>
                                </div>
                                <h4 class="h5 mb-2">Technical Assessment</h4>
                                <p class="small">Complete a skills assessment or technical challenge relevant to the role.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="process-step text-center">
                                <div class="process-icon mb-3">
                                    <div class="icon-box mx-auto">
                                        <span class="h4 m-0">4</span>
                                    </div>
                                </div>
                                <h4 class="h5 mb-2">Final Interview</h4>
                                <p class="small">Meet with the team and discuss your experience, skills, and fit with AppNomu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Testimonials -->
<!-- Section removed as requested -->

<!-- Apply Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="applyModalLabel">
                    <i class="bi bi-briefcase me-2"></i>Join Our Team
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-box bg-primary text-white rounded-circle p-3 me-3">
                        <i class="bi bi-person-plus-fill fs-4"></i>
                    </div>
                    <div>
                        <h4 class="mb-1">Apply for a Position at AppNomu</h4>
                        <p class="text-muted mb-0">Please complete the form below to submit your application</p>
                    </div>
                </div>
                
                <form id="applicationForm" action="process-application.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="position" class="form-label fw-bold">Position You're Applying For <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg" id="position" name="position" required>
                            <option value="" selected disabled>Select a position</option>
                            <option value="Senior PHP Developer">Senior PHP Developer</option>
                            <option value="Mobile App Developer">Mobile App Developer</option>
                            <option value="UI/UX Designer">UI/UX Designer</option>
                            <option value="Digital Marketing Specialist">Digital Marketing Specialist</option>
                            <option value="Other">Other/General Application</option>
                        </select>
                    </div>
                    
                    <h5 class="text-primary border-bottom pb-2 mb-3">Personal Information</h5>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name" required>
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+1 (123) 456-7890">
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="text-primary border-bottom pb-2 mb-3 mt-4">Resume & Supporting Documents</h5>
                    
                    <div class="mb-4">
                        <label for="resume" class="form-label">Resume/CV <span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-lg" id="resume" name="resume" required>
                        <div class="form-text"><i class="bi bi-info-circle me-1"></i> Upload your resume in PDF or Word format (max 2MB)</div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="coverLetter" class="form-label">Cover Letter</label>
                        <textarea class="form-control" id="coverLetter" name="coverLetter" rows="4" placeholder="Tell us why you want to join AppNomu and what makes you a great fit for this role"></textarea>
                        <div class="form-text">Optional but recommended</div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="portfolio" class="form-label">Portfolio URL</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-globe"></i></span>
                            <input type="url" class="form-control" id="portfolio" name="portfolio" placeholder="https://yourportfolio.com">
                        </div>
                        <div class="form-text">If applicable for your role</div>
                    </div>
                    
                    <div class="alert alert-light border mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="privacy" name="privacy" required>
                            <label class="form-check-label" for="privacy">
                                I agree to the <a href="privacy-policy.php" class="text-decoration-underline">Privacy Policy</a> and consent to the processing of my personal data.
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary btn-lg px-4" form="applicationForm">
                    <i class="bi bi-send me-1"></i> Submit Application
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary bg-opacity-10 rounded-4 p-5 mx-auto" style="max-width: 900px;">
                <h2 class="h2 fw-bold mb-3">Ready to Join Africa's Leading Tech Team?</h2>
                <p class="lead mb-4" style="max-width: 700px; margin: 0 auto;">Take the next step in your career with competitive salaries, rapid growth opportunities, and the chance to build Africa's digital future. Join 20+ talented professionals across 5 countries.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                    <a href="#current-openings" class="btn btn-primary btn-lg px-5 py-3 fw-bold">
                        <i class="bi bi-briefcase-fill me-2"></i>View Open Positions
                    </a>
                    <a href="#applyModal" class="btn btn-outline-primary btn-lg px-5 py-3" data-bs-toggle="modal" data-bs-target="#applyModal">
                        <i class="bi bi-person-plus-fill me-2"></i>Apply Now
                    </a>
                </div>
                <div class="mt-3">
                    <small class="text-muted fw-bold">✓ $2K+ monthly salary ✓ 85% promotion rate ✓ Remote flexibility ✓ $5K learning budget</small>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include_once 'includes/footer.php';
?>
