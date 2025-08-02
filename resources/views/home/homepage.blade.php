@include('home.header')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-image"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-content">
                        <h4 class="hero-title">The most trusted software escrow company protecting against legal and financial disasters</h4>
<p class="hero-subtitle">AssureHold International provides secure software escrow services to safeguard your intellectual property and ensure business continuity through industry-leading protection.</p>
                        <a href="{{ url('register') }}" class="btn-hero">
                            Get Started Today <i class="fas fa-arrow-right"></i>
                        </a>
                        
                        <div class="hero-badge-container">
                            <div class="hero-badge">
                                <i class="fas fa-shield-alt"></i> ISO 27001 Certified
                            </div>
                            <div class="hero-badge">
                                <i class="fas fa-lock"></i> Bank-Level Security
                            </div>
                            <div class="hero-badge">
                                <i class="fas fa-globe"></i> Global Coverage
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Badges Section -->
    {{-- <div class="partners-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                    <img src="https://via.placeholder.com/150x60?text=Microsoft" alt="Microsoft" class="partner-logo">
                </div>
                <div class="col-auto">
                    <img src="https://via.placeholder.com/150x60?text=IBM" alt="IBM" class="partner-logo">
                </div>
                <div class="col-auto">
                    <img src="https://via.placeholder.com/150x60?text=Oracle" alt="Oracle" class="partner-logo">
                </div>
                <div class="col-auto">
                    <img src="https://via.placeholder.com/150x60?text=Amazon" alt="Amazon" class="partner-logo">
                </div>
                <div class="col-auto">
                    <img src="https://via.placeholder.com/150x60?text=Google" alt="Google" class="partner-logo">
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <h2 class="section-title">Our Escrow Services</h2>
            <p class="section-subtitle">Comprehensive protection for all your software and digital asset needs with industry-leading security and compliance</p>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h4 class="service-title">Software Escrow</h4>
                        <p class="service-description">Secure source code deposits with comprehensive verification and release conditions for software licensing agreements and critical business applications.</p>
                        <a href="#" class="service-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="service-title">IP Protection</h4>
                        <p class="service-description">Intellectual property safeguarding with legal compliance and risk mitigation for technology transfers and licensing agreements.</p>
                        <a href="#" class="service-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <h4 class="service-title">Data Escrow</h4>
                        <p class="service-description">Critical business data protection with secure storage and controlled access for business continuity and disaster recovery planning.</p>
                        <a href="#" class="service-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h4 class="service-title">License Verification</h4>
                        <p class="service-description">Complete software license validation and compliance monitoring for enterprise deployments and regulatory requirements.</p>
                        <a href="#" class="service-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4 class="service-title">International Compliance</h4>
                        <p class="service-description">Global regulatory compliance and cross-border technology transfer protection services for multinational organizations.</p>
                        <a href="#" class="service-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4 class="service-title">Dispute Resolution</h4>
                        <p class="service-description">Expert mediation and arbitration services for software licensing and technology disputes with legal support.</p>
                        <a href="#" class="service-link">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section" id="process">
        <div class="container">
            <h2 class="section-title">How It Works</h2>
            <p class="section-subtitle">Simple, secure, and legally compliant process designed to protect all parties involved</p>
            
            <div class="process-connector"></div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h4 class="step-title">Agreement Setup</h4>
                        <p class="step-description">Establish comprehensive escrow terms and conditions with all parties, defining clear release triggers and verification requirements.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h4 class="step-title">Secure Deposit</h4>
                        <p class="step-description">Safe deposit of source code, documentation, and related materials in our certified, climate-controlled facilities.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h4 class="step-title">Technical Verification</h4>
                        <p class="step-description">Comprehensive technical verification and testing to ensure deposited materials meet all specified requirements and standards.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h4 class="step-title">Ongoing Management</h4>
                        <p class="step-description">Continuous monitoring, regular updates, and professional maintenance of escrowed materials throughout the agreement term.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section id="why-us" class="stats-section">
        <div class="container">
            <h2 class="section-title" style="color: white;">Why Choose AssureHold?</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.8); margin-bottom: 60px;">Industry-leading expertise and unmatched reliability for your most critical technology assets</p>
            
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number">25+</span>
                        <div class="stat-label">Years Experience</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number">15K+</span>
                        <div class="stat-label">Agreements Managed</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number">99.9%</span>
                        <div class="stat-label">Uptime Guarantee</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <div class="stat-label">Expert Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials-section">
        <div class="container">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle">Trusted by leading technology companies worldwide</p>
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-quote">
                            AssureHold's solution gave us the confidence to enter into a major licensing agreement with a critical vendor. Their verification process is thorough and their team is extremely professional.
                        </div>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Sarah Johnson" class="author-avatar">
                            <div class="author-info">
                                <h5>Sarah Johnson</h5>
                                <p>CTO, TechSolutions Inc.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-quote">
                            When our software vendor went out of business, AssureHold's release process was seamless. We had access to our source code within 24 hours, preventing major business disruption.
                        </div>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen" class="author-avatar">
                            <div class="author-info">
                                <h5>Michael Chen</h5>
                                <p>Director of IT, GlobalBank</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-quote">
                            Their international compliance expertise helped us navigate complex cross-border licensing agreements with confidence. Truly a partner, not just a vendor.
                        </div>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Elena Rodriguez" class="author-avatar">
                            <div class="author-info">
                                <h5>Elena Rodriguez</h5>
                                <p>General Counsel, DataSystems</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Protect Your Software Assets?</h2>
                <p class="cta-subtitle">Join thousands of companies worldwide who trust AssureHold with their most critical technology assets and intellectual property</p>
                <div>
                    <a href="{{ route('register') }}" class="btn-cta" >Get Started Today</a>
                    <a href="{{ route('login') }}" class="btn-cta btn-cta-outline" >Login</a>
                </div>
            </div>
        </div>
    </section>

   @include('home.footer')