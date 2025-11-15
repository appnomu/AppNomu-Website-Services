<?php
// Ensure default navigation is used
unset($menuItems);
// Include header
include_once 'includes/header.php';
?>

<!-- ROI Calculator Hero Section -->
<section class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="mb-3">
                    <span class="badge bg-light text-primary mb-0 px-3 py-2 fw-bold">ROI CALCULATOR</span>
                </div>
                <h1 class="display-4 fw-bold mb-4">Calculate Your Website Investment Return</h1>
                <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">
                    Discover how much revenue a professional website can generate for your business. See real projections based on your industry and goals.
                </p>
                <div class="row g-3 mt-4">
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <i class="bi bi-graph-up-arrow fs-2 text-white mb-2"></i>
                            <h3 class="h5 fw-bold text-white mb-0">Revenue Growth</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <i class="bi bi-people fs-2 text-white mb-2"></i>
                            <h3 class="h5 fw-bold text-white mb-0">More Customers</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <i class="bi bi-currency-dollar fs-2 text-white mb-2"></i>
                            <h3 class="h5 fw-bold text-white mb-0">Higher Profits</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ROI Calculator Form -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <h2 class="h3 fw-bold mb-4">Business Information</h2>
                        
                        <form id="roiForm">
                            <div class="mb-3">
                                <label for="businessType" class="form-label fw-bold">Business Type</label>
                                <select class="form-select" id="businessType" required>
                                    <option value="">Select your business type</option>
                                    <option value="ecommerce">E-commerce Store</option>
                                    <option value="service">Service Business</option>
                                    <option value="restaurant">Restaurant/Food</option>
                                    <option value="healthcare">Healthcare</option>
                                    <option value="education">Education</option>
                                    <option value="realestate">Real Estate</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="monthlyRevenue" class="form-label fw-bold">Current Monthly Revenue (USD)</label>
                                <input type="number" class="form-control" id="monthlyRevenue" placeholder="5000" min="0" required>
                            </div>

                            <div class="mb-3">
                                <label for="avgOrderValue" class="form-label fw-bold">Average Order/Service Value (USD)</label>
                                <input type="number" class="form-control" id="avgOrderValue" placeholder="100" min="0" required>
                            </div>

                            <div class="mb-3">
                                <label for="monthlyVisitors" class="form-label fw-bold">Current Website Visitors/Month</label>
                                <input type="number" class="form-control" id="monthlyVisitors" placeholder="1000" min="0">
                                <small class="text-muted">Enter 0 if you don't have a website</small>
                            </div>

                            <div class="mb-3">
                                <label for="conversionRate" class="form-label fw-bold">Current Conversion Rate (%)</label>
                                <input type="number" class="form-control" id="conversionRate" placeholder="2" min="0" max="100" step="0.1">
                                <small class="text-muted">Percentage of visitors who become customers</small>
                            </div>

                            <div class="mb-4">
                                <label for="websiteGoal" class="form-label fw-bold">Primary Website Goal</label>
                                <select class="form-select" id="websiteGoal" required>
                                    <option value="">Select primary goal</option>
                                    <option value="sales">Increase online sales</option>
                                    <option value="leads">Generate more leads</option>
                                    <option value="bookings">Get more bookings</option>
                                    <option value="awareness">Build brand awareness</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">
                                <i class="bi bi-calculator me-2"></i>Calculate My ROI
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">
                <!-- Results Panel -->
                <div id="resultsPanel" class="d-none">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4">
                            <h2 class="h3 fw-bold mb-4 text-success">Your ROI Projection</h2>
                            
                            <!-- Key Metrics -->
                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <div class="bg-success bg-opacity-10 rounded-3 p-3 text-center">
                                        <h3 class="h2 fw-bold text-success mb-0" id="roiPercentage">--</h3>
                                        <p class="mb-0 text-success">ROI in Year 1</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-3 text-center">
                                        <h3 class="h2 fw-bold text-primary mb-0" id="additionalRevenue">--</h3>
                                        <p class="mb-0 text-primary">Additional Revenue</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Breakdown -->
                            <div class="mb-4">
                                <h4 class="h5 fw-bold mb-3">Revenue Breakdown</h4>
                                <div class="bg-light rounded-3 p-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Current Annual Revenue:</span>
                                        <strong id="currentRevenue">--</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Projected Annual Revenue:</span>
                                        <strong id="projectedRevenue">--</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Website Investment:</span>
                                        <strong id="websiteInvestment">$799</strong>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">Net Profit Increase:</span>
                                        <strong class="text-success" id="netProfit">--</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Timeline -->
                            <div class="mb-4">
                                <h4 class="h5 fw-bold mb-3">ROI Timeline</h4>
                                <div class="progress mb-2" style="height: 20px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" id="paybackBar">
                                        <span class="fw-bold" id="paybackText">Payback in 3 months</span>
                                    </div>
                                </div>
                                <small class="text-muted">Time to recover your website investment</small>
                            </div>

                            <!-- CTA -->
                            <div class="text-center">
                                <a href="request-quote.php" class="btn btn-success btn-lg w-100 fw-bold mb-2">
                                    Start My Website Project
                                </a>
                                <small class="text-muted">✓ 3-Day Delivery ✓ 100% Satisfaction Guarantee</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Default Info Panel -->
                <div id="infoPanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="h4 fw-bold mb-3">Why Calculate ROI?</h3>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <strong>Make informed decisions</strong> about your website investment
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <strong>See realistic projections</strong> based on industry data
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <strong>Understand the timeline</strong> for return on investment
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <strong>Compare different strategies</strong> and their potential impact
                                </li>
                            </ul>

                            <div class="bg-primary bg-opacity-10 rounded-3 p-3 mt-4">
                                <h4 class="h6 fw-bold text-primary mb-2">Average Results</h4>
                                <p class="small mb-0">Our clients typically see 300-500% ROI within the first year, with payback periods of 2-4 months.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recommendations Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Maximize Your Website ROI</h2>
            <p class="lead">Proven strategies to boost your website's return on investment</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-speedometer2 text-primary fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold text-center mb-3">Optimize Performance</h3>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Page load speed under 3 seconds</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Mobile-first responsive design</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Image optimization and compression</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Browser caching implementation</li>
                        </ul>
                        <div class="text-center mt-3">
                            <span class="badge bg-primary-subtle text-primary">+40% Conversion Rate</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-bullseye text-success fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold text-center mb-3">Clear Call-to-Actions</h3>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Prominent contact buttons</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Strategic placement of CTAs</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Action-oriented button text</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Multiple conversion paths</li>
                        </ul>
                        <div class="text-center mt-3">
                            <span class="badge bg-success-subtle text-success">+60% Lead Generation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-search text-warning fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold text-center mb-3">SEO Optimization</h3>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Local SEO for African markets</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Keyword-optimized content</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Google My Business setup</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Schema markup implementation</li>
                        </ul>
                        <div class="text-center mt-3">
                            <span class="badge bg-warning-subtle text-warning">+150% Organic Traffic</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Implementation CTA -->
        <div class="text-center mt-5">
            <div class="bg-light rounded-4 p-4">
                <h3 class="h4 fw-bold mb-3">Ready to Implement These Strategies?</h3>
                <p class="mb-4">Our team handles all technical optimizations while you focus on growing your business</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="request-quote.php" class="btn btn-primary btn-lg px-4">Get Implementation Quote</a>
                    <a href="website-audit.php" class="btn btn-outline-primary btn-lg px-4">Free Website Audit</a>
                </div>
                <div class="mt-3">
                    <small class="text-muted">✓ 3-Day Implementation ✓ Performance Guarantee ✓ 30-Day Support</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Real Client Results</h2>
            <p class="lead">See how our websites have transformed businesses</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <div class="bg-success rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-cart3 text-white fs-4"></i>
                            </div>
                            <h3 class="h5 fw-bold">E-commerce Store</h3>
                        </div>
                        <div class="row g-2 text-center mb-3">
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-2">
                                    <h4 class="h6 fw-bold text-success mb-0">450%</h4>
                                    <small class="text-muted">ROI</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-2">
                                    <h4 class="h6 fw-bold text-primary mb-0">2.5 months</h4>
                                    <small class="text-muted">Payback</small>
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted">"Our online sales increased by 300% within 6 months of launching the new website."</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <div class="bg-primary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-briefcase text-white fs-4"></i>
                            </div>
                            <h3 class="h5 fw-bold">Service Business</h3>
                        </div>
                        <div class="row g-2 text-center mb-3">
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-2">
                                    <h4 class="h6 fw-bold text-success mb-0">380%</h4>
                                    <small class="text-muted">ROI</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-2">
                                    <h4 class="h6 fw-bold text-primary mb-0">3 months</h4>
                                    <small class="text-muted">Payback</small>
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted">"Lead generation improved by 250% and we're booking 40% more consultations."</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <div class="bg-warning rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-building text-white fs-4"></i>
                            </div>
                            <h3 class="h5 fw-bold">Real Estate</h3>
                        </div>
                        <div class="row g-2 text-center mb-3">
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-2">
                                    <h4 class="h6 fw-bold text-success mb-0">520%</h4>
                                    <small class="text-muted">ROI</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-2">
                                    <h4 class="h6 fw-bold text-primary mb-0">2 months</h4>
                                    <small class="text-muted">Payback</small>
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted">"Property inquiries doubled and we closed 60% more deals in the first quarter."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('roiForm').addEventListener('submit', function(e) {
    e.preventDefault();
    calculateROI();
});

function calculateROI() {
    // Get form values
    const businessType = document.getElementById('businessType').value;
    const monthlyRevenue = parseFloat(document.getElementById('monthlyRevenue').value) || 0;
    const avgOrderValue = parseFloat(document.getElementById('avgOrderValue').value) || 0;
    const monthlyVisitors = parseFloat(document.getElementById('monthlyVisitors').value) || 0;
    const conversionRate = parseFloat(document.getElementById('conversionRate').value) || 0;
    const websiteGoal = document.getElementById('websiteGoal').value;

    // Industry multipliers for improvement
    const industryMultipliers = {
        'ecommerce': { traffic: 2.5, conversion: 1.8, avgOrder: 1.2 },
        'service': { traffic: 2.0, conversion: 2.2, avgOrder: 1.3 },
        'restaurant': { traffic: 1.8, conversion: 1.9, avgOrder: 1.1 },
        'healthcare': { traffic: 1.6, conversion: 2.0, avgOrder: 1.2 },
        'education': { traffic: 1.7, conversion: 1.8, avgOrder: 1.1 },
        'realestate': { traffic: 2.2, conversion: 2.5, avgOrder: 1.4 },
        'other': { traffic: 2.0, conversion: 2.0, avgOrder: 1.2 }
    };

    const multiplier = industryMultipliers[businessType] || industryMultipliers['other'];
    
    // Calculate current metrics
    const currentAnnualRevenue = monthlyRevenue * 12;
    const currentMonthlyCustomers = monthlyVisitors * (conversionRate / 100);
    
    // Calculate improved metrics
    const newMonthlyVisitors = Math.max(monthlyVisitors * multiplier.traffic, 1000);
    const newConversionRate = Math.min((conversionRate || 1) * multiplier.conversion, 15);
    const newAvgOrderValue = avgOrderValue * multiplier.avgOrder;
    
    const newMonthlyCustomers = newMonthlyVisitors * (newConversionRate / 100);
    const newMonthlyRevenue = newMonthlyCustomers * newAvgOrderValue;
    const projectedAnnualRevenue = newMonthlyRevenue * 12;
    
    // Calculate ROI
    const websiteInvestment = 799; // Base website cost
    const additionalAnnualRevenue = projectedAnnualRevenue - currentAnnualRevenue;
    const roi = ((additionalAnnualRevenue - websiteInvestment) / websiteInvestment) * 100;
    const paybackMonths = Math.ceil(websiteInvestment / (additionalAnnualRevenue / 12));
    
    // Update UI
    document.getElementById('roiPercentage').textContent = Math.round(roi) + '%';
    document.getElementById('additionalRevenue').textContent = '$' + Math.round(additionalAnnualRevenue).toLocaleString();
    document.getElementById('currentRevenue').textContent = '$' + Math.round(currentAnnualRevenue).toLocaleString();
    document.getElementById('projectedRevenue').textContent = '$' + Math.round(projectedAnnualRevenue).toLocaleString();
    document.getElementById('netProfit').textContent = '$' + Math.round(additionalAnnualRevenue - websiteInvestment).toLocaleString();
    document.getElementById('paybackText').textContent = `Payback in ${paybackMonths} months`;
    
    // Show results
    document.getElementById('infoPanel').classList.add('d-none');
    document.getElementById('resultsPanel').classList.remove('d-none');
    
    // Scroll to results
    document.getElementById('resultsPanel').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
}
</script>

<?php
// Include footer
include_once 'includes/footer.php';
?>
