{{-- <form method="POST" action="{{ route('verify.code') }}">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Verification Code:</label>
    <input type="text" name="code" required maxlength="6">

    <button type="submit">Verify</button>
</form> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code | AssureHold International</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold-primary: #B8860B;
            --gold-secondary: #DAA520;
            --gold-light: #F5D98E;
            --black-primary: #000000;
            --black-secondary: #1a1a2a;
            --black-tertiary: #2a2a2a;
            --white-primary: #FFFFFF;
            --gray-light: #f5f5f5;
            --gray-medium: #e0e0e0;
            --gray-text: #666666;
            --gray-dark: #333333;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gray-light);
            color: var(--black-primary);
            line-height: 1.6;
        }

        .auth-container {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        /* Mobile View (form on top) */
        .auth-right {
            order: -1; /* Forces form to appear first */
            background: white;
            padding: 2rem 1.5rem;
            flex: 1;
        }

        .auth-left {
            background: linear-gradient(135deg, rgba(184, 134, 11, 0.8), rgba(218, 165, 32, 0.9)), 
                        url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 3rem 1.5rem;
            position: relative;
            overflow: hidden;
            flex: 1;
        }

        .auth-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 80%, rgba(255,255,255,0.05) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.05) 0%, transparent 50%);
            z-index: 0;
        }

        .auth-left-content, .auth-form-container {
            position: relative;
            z-index: 1;
            max-width: 500px;
            margin: 0 auto;
        }

        /* Logo Styles */
        .auth-logo {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .auth-logo-icon {
            width: 50px;
            height: 50px;
            background: var(--gold-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        }

        .auth-logo-icon::before {
            content: 'A';
            color: white;
            font-weight: bold;
            font-size: 22px;
        }

        .auth-logo-text {
            font-size: 24px;
            font-weight: 700;
            color: white;
        }

        .auth-logo-text span {
            color: var(--gold-light);
        }

        /* Form Styles */
        .auth-form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-form-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--black-primary);
        }

        .auth-form-header p {
            color: var(--gray-text);
            font-size: 0.95rem;
        }

        .auth-form-header p a {
            color: var(--gold-primary);
            text-decoration: none;
            font-weight: 500;
        }

        .auth-form-header p a:hover {
            text-decoration: underline;
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 6px;
            border: 1px solid var(--gray-medium);
            transition: var(--transition);
            height: 48px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 0.25rem rgba(184, 134, 11, 0.15);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .input-group-text {
            background-color: var(--gray-light);
            border-color: var(--gray-medium);
        }

        .password-toggle {
            cursor: pointer;
            color: var(--gray-text);
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--gold-primary);
        }

        .btn-verify {
            background: var(--gold-primary);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 6px;
            font-weight: 600;
            transition: var(--transition);
            width: 100%;
            font-size: 1rem;
            margin-top: 10px;
        }

        .btn-verify:hover {
            background: var(--gold-secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(184, 134, 11, 0.3);
        }

        /* Code Input Styles */
        .code-input-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .code-input {
            width: 45px;
            height: 60px;
            text-align: center;
            font-size: 1.5rem;
            border: 2px solid var(--gray-medium);
            border-radius: 6px;
            transition: var(--transition);
        }

        .code-input:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 0.25rem rgba(184, 134, 11, 0.15);
        }

        /* Additional Form Elements */
        .form-check-input:checked {
            background-color: var(--gold-primary);
            border-color: var(--gold-primary);
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(184, 134, 11, 0.25);
        }

        .form-check-label {
            font-size: 0.85rem;
            color: var(--gray-text);
        }

        .resend-code {
            text-align: center;
            margin-top: 1.5rem;
        }

        .resend-code a {
            color: var(--gray-text);
            font-size: 0.85rem;
            text-decoration: none;
        }

        .resend-code a:hover {
            color: var(--gold-primary);
            text-decoration: underline;
        }

        /* Content Styles */
        .auth-left h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .auth-left p {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }

        .auth-features {
            margin-top: 2rem;
        }

        .auth-feature {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .auth-feature i {
            font-size: 1.3rem;
            color: var(--gold-light);
            margin-right: 15px;
            width: 30px;
            text-align: center;
        }

        .auth-feature-text h4 {
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }

        .auth-feature-text p {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 0;
        }

        /* Desktop View (image left, form right) */
        @media (min-width: 992px) {
            .auth-container {
                flex-direction: row;
            }
            
            .auth-left {
                order: 0; /* Reset order for desktop */
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 3rem;
            }
            
            .auth-right {
                order: 1; /* Reset order for desktop */
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 3rem;
            }
            
            .auth-left h2 {
                font-size: 2.2rem;
            }
            
            .auth-left p {
                font-size: 1.1rem;
            }
            
            .auth-feature i {
                font-size: 1.5rem;
                width: 40px;
            }
            
            .auth-feature-text h4 {
                font-size: 1.1rem;
            }
            
            .auth-feature-text p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Form Section (Top on mobile) -->
        <div class="auth-right">
            <div class="auth-form-container">
                <div class="auth-form-header">
                    <h1>Verify Your Identity</h1>
                    <p>We've sent a verification code to your email</p>
                </div>

                <!-- Include Toastr & jQuery (make sure these are above the script block below) -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                
                <form method="POST" action="{{ route('verify.code') }}" id="verifyForm">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="code" class="form-label">Verification Code</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="code" name="code" required maxlength="6">
                        </div>
                        {{-- <div class="resend-code">
                            <a href="{{ route('resend.code') }}">Resend verification code</a>
                        </div> --}}
                    </div>
                    
                    <button type="submit" class="btn btn-verify">Verify</button>
                </form>
            </div>
        </div>
        
        <!-- Branding Section (Bottom on mobile) -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-focus the first code input
        document.getElementById('code').focus();

        // Auto move between code inputs
        document.getElementById('verifyForm').addEventListener('input', function(e) {
            if (e.target.id === 'code' && e.target.value.length === e.target.maxLength) {
                document.getElementById('verifyForm').submit();
            }
        });

        // Form submission with AJAX
        document.getElementById('verifyForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const token = document.querySelector('input[name="_token"]').value;

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    toastr.success(data.message || 'Verification successful! Redirecting...');
                    setTimeout(() => {
                        window.location.href = data.redirect || "{{ route('user.home') }}";
                    }, 1500);
                } else {
                    let errorMsg = data.message || 'Verification failed.';
                    if (data.errors) {
                        for (const key in data.errors) {
                            if (data.errors.hasOwnProperty(key)) {
                                toastr.error(data.errors[key][0]);
                            }
                        }
                    } else {
                        toastr.error(errorMsg);
                    }
                }

            } catch (error) {
                toastr.error("Something went wrong. Please try again.");
                console.error("Verification error:", error);
            }
        });
    </script>
</body>
</html>