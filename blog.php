<?php
// Ensure default navigation is used
unset($menuItems);
// Include header
include_once 'includes/header.php';

// Blog articles data
$blogArticles = [
    [
        'title' => 'Why Choose AppNomu For Your Digital Needs',
        'slug' => 'why-choose-appnomu',
        'excerpt' => 'Website hosting, design, development, software solutions, and digital marketing from a trusted partner',
        'category' => 'Services',
        'category_color' => 'danger',
        'date' => 'June 2, 2025',
        'read_time' => '8 min read',
        'image' => 'https://services.appnomu.com/assets/images/Why_AppNomu.webp',
        'featured' => true
    ],
    [
        'title' => 'Top Web Design Trends for 2025',
        'slug' => 'web-design-trends-2025',
        'excerpt' => 'Stay ahead with the latest innovations in web design and user experience',
        'category' => 'Design Trends',
        'category_color' => 'success',
        'date' => 'April 15, 2025',
        'read_time' => '6 min read',
        'image' => 'https://services.appnomu.com/assets/images/top_website_trends.webp',
        'featured' => false
    ],
    [
        'title' => 'AppNomu Best Practices for African Businesses',
        'slug' => 'appnomu-best-practices',
        'excerpt' => 'Essential strategies and best practices for digital success in African markets',
        'category' => 'Business Strategy',
        'category_color' => 'primary',
        'date' => 'March 28, 2025',
        'read_time' => '10 min read',
        'image' => 'https://services.appnomu.com/assets/images/About.png',
        'featured' => true
    ],
    [
        'title' => 'Digital SMS Marketing Power for African Businesses',
        'slug' => 'digital-sms-marketing-power',
        'excerpt' => 'Harness the power of SMS marketing to reach customers across Africa effectively',
        'category' => 'Digital Marketing',
        'category_color' => 'warning',
        'date' => 'March 10, 2025',
        'read_time' => '7 min read',
        'image' => 'https://services.appnomu.com/assets/images/Smiling-Woman-Smartphone-1024x684.webp',
        'featured' => false
    ],
    [
        'title' => 'Website Security Measures Every Business Needs',
        'slug' => 'website-security-measures',
        'excerpt' => 'Comprehensive guide to protecting your website and customer data from cyber threats',
        'category' => 'Security',
        'category_color' => 'info',
        'date' => 'February 22, 2025',
        'read_time' => '9 min read',
        'image' => 'https://services.appnomu.com/assets/images/website_measure.png',
        'featured' => false
    ],
    [
        'title' => 'Things to Consider While Planning Your Website',
        'slug' => 'things-to-consider-while-planning-website',
        'excerpt' => 'Essential planning steps for creating a successful website that drives business growth',
        'category' => 'Web Development',
        'category_color' => 'secondary',
        'date' => 'February 8, 2025',
        'read_time' => '8 min read',
        'image' => 'https://services.appnomu.com/assets/images/Website_cons.jpeg',
        'featured' => false
    ]
];

// Get featured articles
$featuredArticles = array_filter($blogArticles, function($article) {
    return $article['featured'];
});

// Get regular articles
$regularArticles = array_filter($blogArticles, function($article) {
    return !$article['featured'];
});
?>

<!-- Blog Hero Section -->
<section class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="mb-3">
                    <span class="badge bg-light text-primary mb-0 px-3 py-2 fw-bold">APPNOMU BLOG</span>
                </div>
                <h1 class="display-3 fw-bold mb-4">Digital Insights & <span style="background: linear-gradient(45deg, #60a5fa, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Expert Advice</span></h1>
                <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">
                    Stay ahead with the latest trends, best practices, and insights for digital success in African markets. Expert advice from the AppNomu team.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="#featured-posts" class="btn btn-light btn-lg fw-bold px-4 py-3 text-primary">Read Latest Posts</a>
                    <a href="contact" class="btn btn-outline-light btn-lg px-4 py-3">Get Expert Consultation</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Categories -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <span class="badge bg-danger px-3 py-2">Services</span>
                    <span class="badge bg-success px-3 py-2">Design Trends</span>
                    <span class="badge bg-primary px-3 py-2">Business Strategy</span>
                    <span class="badge bg-warning px-3 py-2">Digital Marketing</span>
                    <span class="badge bg-info px-3 py-2">Security</span>
                    <span class="badge bg-secondary px-3 py-2">Web Development</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Posts -->
<section id="featured-posts" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Featured Articles</h2>
            <p class="lead">Our most popular and impactful content</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($featuredArticles as $article): ?>
            <div class="col-lg-6">
                <article class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="position-relative">
                        <img src="<?php echo $article['image']; ?>" class="card-img-top" alt="<?php echo $article['title']; ?>" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-<?php echo $article['category_color']; ?> px-3 py-2"><?php echo $article['category']; ?></span>
                        </div>
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-warning text-dark px-2 py-1">FEATURED</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="card-title h4 fw-bold mb-3">
                            <a href="blog/<?php echo $article['slug']; ?>" class="text-decoration-none text-dark"><?php echo $article['title']; ?></a>
                        </h3>
                        <p class="card-text text-muted mb-3"><?php echo $article['excerpt']; ?></p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i><?php echo $article['date']; ?>
                            </small>
                            <small class="text-muted">
                                <i class="bi bi-clock me-1"></i><?php echo $article['read_time']; ?>
                            </small>
                        </div>
                        <a href="blog/<?php echo $article['slug']; ?>" class="btn btn-<?php echo $article['category_color']; ?> btn-sm">
                            Read Full Article <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- All Articles -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Latest Articles</h2>
            <p class="lead">Explore our complete collection of insights and guides</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($regularArticles as $article): ?>
            <div class="col-lg-4 col-md-6">
                <article class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="position-relative">
                        <img src="<?php echo $article['image']; ?>" class="card-img-top" alt="<?php echo $article['title']; ?>" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-<?php echo $article['category_color']; ?> px-2 py-1"><?php echo $article['category']; ?></span>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <h3 class="card-title h5 fw-bold mb-2">
                            <a href="blog/<?php echo $article['slug']; ?>" class="text-decoration-none text-dark"><?php echo $article['title']; ?></a>
                        </h3>
                        <p class="card-text text-muted mb-3 small"><?php echo $article['excerpt']; ?></p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i><?php echo $article['date']; ?>
                            </small>
                            <small class="text-muted">
                                <i class="bi bi-clock me-1"></i><?php echo $article['read_time']; ?>
                            </small>
                        </div>
                        <a href="blog/<?php echo $article['slug']; ?>" class="btn btn-outline-<?php echo $article['category_color']; ?> btn-sm w-100">
                            Read More <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-4">Stay Updated</h2>
                <p class="lead mb-4">Get the latest insights, tips, and industry news delivered to your inbox</p>
                <form class="row g-3 justify-content-center">
                    <div class="col-md-6">
                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email address" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-light btn-lg w-100 fw-bold text-primary">Subscribe</button>
                    </div>
                </form>
                <small class="text-white-50 mt-3 d-block">No spam, unsubscribe anytime. Read our <a href="privacy-policy" class="text-white">Privacy Policy</a>.</small>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary bg-opacity-10 rounded-4 p-5 mx-auto" style="max-width: 900px;">
                <h2 class="h2 fw-bold mb-3">Ready to Transform Your Business?</h2>
                <p class="lead mb-4" style="max-width: 700px; margin: 0 auto;">Let our experts help you implement the strategies and solutions discussed in our blog</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                    <a href="request-quote.php" class="btn btn-primary btn-lg px-5 py-3 fw-bold">Get Free Quote</a>
                    <a href="contact.php" class="btn btn-outline-primary btn-lg px-5 py-3">Schedule Consultation</a>
                </div>
                <div class="mt-3">
                    <small class="text-muted fw-bold">✓ Free consultation ✓ Expert guidance ✓ Proven strategies ✓ Results-driven approach</small>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include_once 'includes/footer.php';
?>
