 <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <h5>AssureHold International</h5>
                        <div class="footer-about">
                            <p>The most trusted software escrow company, protecting businesses against legal and financial disasters for over 25 years with unmatched expertise and reliability.</p>
                            {{-- <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <h5>Services</h5>
                        <div>
                            <a href="#"><i class="fas fa-chevron-right"></i> Software Escrow</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> IP Protection</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> Data Escrow</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> License Verification</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> Compliance</a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <h5>Company</h5>
                        <div>
                            <a href="#"><i class="fas fa-chevron-right"></i> About Us</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> Why AssureHold</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> Leadership</a><br>
                           
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <h5>Resources</h5>
                        <div>
                            <a href="#"><i class="fas fa-chevron-right"></i> Documentation</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> Case Studies</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> White Papers</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> FAQ</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> Legal Forms</a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <h5>Support</h5>
                        <div>
                            <a href="#"><i class="fas fa-chevron-right"></i> Contact Us</a><br>
                            <a href="#"><i class="fas fa-chevron-right"></i> Help Center</a><br>
                
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                      
                    </div>
                    <p>&copy; 2025 AssureHold International, Inc. All rights reserved. Licensed Escrow Agent</p>
                </div>
            </div>
        </div>
    </footer>

   

    <!-- Back to Top Button -->
    <div class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Our Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="contactName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="contactName" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="contactEmail" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="contactCompany" class="form-label">Company</label>
                            <input type="text" class="form-control" id="contactCompany" placeholder="Enter your company name">
                        </div>
                        <div class="mb-3">
                            <label for="contactMessage" class="form-label">How Can We Help?</label>
                            <textarea class="form-control" id="contactMessage" rows="3" placeholder="Tell us about your escrow needs"></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Consultation Modal -->
    <div class="modal fade" id="consultModal" tabindex="-1" aria-labelledby="consultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="consultModalLabel">Free Consultation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="consultName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="consultName" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="consultEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="consultEmail" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="consultPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="consultPhone" placeholder="Enter your phone number">
                        </div>
                        <div class="mb-3">
                            <label for="consultTime" class="form-label">Preferred Consultation Time</label>
                            <select class="form-select" id="consultTime">
                                <option selected>Select a time</option>
                                <option>Morning (9am-12pm)</option>
                                <option>Afternoon (1pm-5pm)</option>
                                <option>Evening (6pm-8pm)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-submit">Schedule Consultation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Client Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="loginEmail" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-submit">Login</button>
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none" style="color: var(--gold-primary);">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header-section');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    // Close mobile menu if open
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse.classList.contains('show')) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                        bsCollapse.hide();
                    }
                    
                    // Scroll to target
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Counter animation for stats
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            const speed = 200;
            
            counters.forEach(counter => {
                const target = counter.textContent;
                const numericValue = parseFloat(target.replace(/[^0-9.]/g, ''));
                const suffix = target.replace(/[0-9.]/g, '');
                
                let current = 0;
                const increment = numericValue / speed;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= numericValue) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current) + suffix;
                    }
                }, 10);
            });
        }

        // Trigger animations on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Back to top button
        const backToTopButton = document.querySelector('.back-to-top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Chat widget functionality
        document.querySelector('.chat-widget').addEventListener('click', function() {
            // In a real implementation, this would open a chat interface
            alert('Thank you for your interest! Our escrow specialists are available to assist you. Please contact us via the contact form for immediate assistance.');
        });

        // Add subtle parallax effect to hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroImage = document.querySelector('.hero-image');
            if (heroImage) {
                heroImage.style.transform = `translateY(${scrolled * 0.3}px)`;
            }
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Form validation example
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                // In a real implementation, you would validate and submit the form
                alert('Thank you for your submission! We will contact you shortly.');
                const modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                if (modal) modal.hide();
            });
        });
    </script>
</body>
</html>