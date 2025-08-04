<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AssureHold International</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('auth/register.css') }}" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <!-- Form Section (Now on top for mobile) -->
        <div class="auth-right">
            <div class="auth-form-container">
                <div class="auth-form-header">
                    <h1>Create Account</h1>
                    <p>Already have an account? <a href="{{ url('login') }}">Sign in</a></p>
                </div>
                
               <!-- Include Toastr & jQuery (make sure these are above the script block below) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
              
             <form id="registerForm">
                  @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter First Name" required>
                         <div class="error-message">
                                @error('first_name') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name"  placeholder="Enter Last Name" required>
                         <div class="error-message">
                                @error('last_name') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email" required>
                         <div class="error-message">
                                @error('email') {{ $message }} @enderror
                            </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="company" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company" name="company"  placeholder="Enter Company Name" required>
                     <div class="error-message">
                                @error('company') {{ $message }} @enderror
                            </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone"  placeholder="Enter Phone Number">
                     <div class="error-message">
                                @error('phone') {{ $message }} @enderror
                            </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country"  placeholder="Enter Country">
                     <div class="error-message">
                                @error('country') {{ $message }} @enderror
                            </div>
                    </div>
                   
                    <div class="mb-3">
                        <label for="plaintiff" class="form-label">Plaintiff</label>
                        <input type="text" class="form-control" id="plaintiff" name="plaintiff"  placeholder="Enter Plaintiff">
                     <div class="error-message">
                                @error('plaintiff') {{ $message }} @enderror
                            </div>
                    </div>

                     <div class="mb-3">
                        <label for="defendant" class="form-label">Defendant</label>
                        <input type="text" class="form-control" id="defendant" name="defendant"  placeholder="Enter Defendant">
                     <div class="error-message">
                                @error('defendant') {{ $message }} @enderror
                            </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter Password" required>
                            
                             <div class="error-message">
                        @error('password') {{ $message }} @enderror
                    </div>
                            <span class="input-group-text password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="passwordStrength"></div>
                        </div>
                        <ul class="password-requirements" id="passwordRequirements">
                            <li id="lengthReq">Minimum 8 characters</li>
                            <li id="upperReq">At least one uppercase letter</li>
                            <li id="lowerReq">At least one lowercase letter</li>
                            <li id="numberReq">At least one number</li>
                            <li id="specialReq">At least one special character</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Enter Confirm Password" required>
                       <div class="error-message">
                        @error('password_confirmation') {{ $message }} @enderror
                    </div>
                        <div class="invalid-feedback" id="passwordMatchError">Passwords do not match</div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms of Service</a> and <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-register">Create Account</button>
                </form>
            </div>
        </div>
        
        <!-- Branding Section (Now below form on mobile) -->
        <div class="auth-left">
            <div class="auth-left-content">
                <div class="auth-logo">
                    <div class="auth-logo-icon"></div>
                    <div class="auth-logo-text">ASSURE<span>HOLD</span></div>
                </div>
                
                <h2>Secure Your Software Assets</h2>
                <p>Join thousands of businesses who trust AssureHold International to protect their critical technology assets and intellectual property with our industry-leading escrow solutions.</p>
                
                <div class="auth-features">
                    <div class="auth-feature">
                        <i class="fas fa-shield-alt"></i>
                        <div class="auth-feature-text">
                            <h4>Bank-Level Security</h4>
                            <p>Military-grade encryption and secure storage facilities</p>
                        </div>
                    </div>
                    
                    <div class="auth-feature">
                        <i class="fas fa-globe"></i>
                        <div class="auth-feature-text">
                            <h4>Global Compliance</h4>
                            <p>Meet international regulations and industry standards</p>
                        </div>
                    </div>
                    
                    <div class="auth-feature">
                        <i class="fas fa-headset"></i>
                        <div class="auth-feature-text">
                            <h4>Dedicated Support</h4>
                            <p>24/7 access to escrow specialists and legal experts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms of Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>AssureHold International Terms of Service</h4>
                    <p><strong>Last Updated: January 1, 2024</strong></p>
                    
                    <h5 class="mt-4">1. Agreement to Terms</h5>
                    <p>By accessing or using our services, you agree to be bound by these Terms. If you disagree with any part of the terms, you may not access the service.</p>
                    
                    <h5 class="mt-3">2. Escrow Services</h5>
                    <p>AssureHold International provides secure escrow services for software source code, intellectual property, and related materials. Our services include secure storage, verification, and conditional release of escrowed materials according to the terms of your escrow agreement.</p>
                    
                    <h5 class="mt-3">3. User Responsibilities</h5>
                    <p>You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. You must provide accurate and complete information when creating an account.</p>
                    
                    <h5 class="mt-3">4. Intellectual Property</h5>
                    <p>All materials deposited in escrow remain the property of the depositor. AssureHold claims no ownership rights to any materials held in escrow.</p>
                    
                    <h5 class="mt-3">5. Limitation of Liability</h5>
                    <p>AssureHold International shall not be liable for any indirect, incidental, special, consequential or punitive damages resulting from the use of or inability to use our services.</p>
                    
                    <h5 class="mt-3">6. Governing Law</h5>
                    <p>These Terms shall be governed by and construed in accordance with the laws of the State of Delaware, without regard to its conflict of law provisions.</p>
                    
                    <div class="mt-4">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>AssureHold International Privacy Policy</h4>
                    <p><strong>Last Updated: January 1, 2024</strong></p>
                    
                    <h5 class="mt-4">1. Information We Collect</h5>
                    <p>We collect personal information when you register for an account, use our services, or communicate with us. This may include name, email address, company information, and payment details.</p>
                    
                    <h5 class="mt-3">2. How We Use Information</h5>
                    <p>We use your information to provide and improve our services, communicate with you, process transactions, and ensure the security of our systems.</p>
                    
                    <h5 class="mt-3">3. Data Security</h5>
                    <p>We implement industry-standard security measures to protect your personal information, including encryption, access controls, and secure facilities.</p>
                    
                    <h5 class="mt-3">4. Data Retention</h5>
                    <p>We retain personal information only as long as necessary to provide our services and comply with legal obligations. Escrowed materials are retained according to the terms of each escrow agreement.</p>
                    
                    <h5 class="mt-3">5. Your Rights</h5>
                    <p>You may access, correct, or request deletion of your personal information, subject to certain exceptions. You may also opt out of marketing communications.</p>
                    
                    <h5 class="mt-3">6. Changes to This Policy</h5>
                    <p>We may update this Privacy Policy from time to time. We will notify you of significant changes through our website or by email.</p>
                    
                    <div class="mt-4">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
    $(document).ready(function () {
        $('#registerForm').on('submit', function (e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('register') }}",
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    toastr.success(response.message || 'Registration successful! Redirecting...');
                    setTimeout(function () {
                        window.location.href = response.redirect || "{{ route('login') }}";
                    }, 2000);
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error(xhr.responseJSON?.error || 'Something went wrong.');
                        console.error(xhr.responseJSON?.details);
                    }
                }
            });
        });
    });
</script>





    <script>
        // Password toggle visibility
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const confirmPassword = document.querySelector('#confirmPassword');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            confirmPassword.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        // Password strength checker
        password.addEventListener('input', function() {
            const value = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            
            // Reset all requirements
            document.querySelectorAll('.password-requirements li').forEach(li => {
                li.classList.remove('valid');
            });
            
            // Check requirements
            let strength = 0;
            
            // Length requirement
            if (value.length >= 8) {
                document.getElementById('lengthReq').classList.add('valid');
                strength += 20;
            }
            
            // Uppercase requirement
            if (/[A-Z]/.test(value)) {
                document.getElementById('upperReq').classList.add('valid');
                strength += 20;
            }
            
            // Lowercase requirement
            if (/[a-z]/.test(value)) {
                document.getElementById('lowerReq').classList.add('valid');
                strength += 20;
            }
            
            // Number requirement
            if (/[0-9]/.test(value)) {
                document.getElementById('numberReq').classList.add('valid');
                strength += 20;
            }
            
            // Special character requirement
            if (/[^A-Za-z0-9]/.test(value)) {
                document.getElementById('specialReq').classList.add('valid');
                strength += 20;
            }
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Change color based on strength
            if (strength < 40) {
                strengthBar.style.backgroundColor = '#dc3545'; // Red
            } else if (strength < 80) {
                strengthBar.style.backgroundColor = '#fd7e14'; // Orange
            } else {
                strengthBar.style.backgroundColor = '#28a745'; // Green
            }
        });

        // Password match validation
        confirmPassword.addEventListener('input', function() {
            const passwordMatchError = document.getElementById('passwordMatchError');
            
            if (this.value !== password.value) {
                this.classList.add('is-invalid');
                passwordMatchError.style.display = 'block';
            } else {
                this.classList.remove('is-invalid');
                passwordMatchError.style.display = 'none';
            }
        });

        // Form submission
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            let isValid = true;
            
            // Check if passwords match
            if (password.value !== confirmPassword.value) {
                confirmPassword.classList.add('is-invalid');
                document.getElementById('passwordMatchError').style.display = 'block';
                isValid = false;
            }
            
            // Check if terms are accepted
            if (!document.getElementById('terms').checked) {
                alert('You must accept the Terms of Service and Privacy Policy to register.');
                isValid = false;
            }
            
            // Check password strength (at least 80%)
            const strength = parseInt(document.getElementById('passwordStrength').style.width) || 0;
            if (strength < 80) {
                alert('Your password does not meet the minimum strength requirements.');
                isValid = false;
            }
            
            if (isValid) {
                // In a real application, you would submit the form to your server here
                alert('Registration successful! Redirecting to your dashboard...');
                // window.location.href = 'dashboard.html';
            }
        });
    </script>
</body>
</html>