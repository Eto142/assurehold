<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AssureHold International</title>
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

        .btn-login {
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

        .btn-login:hover {
            background: var(--gold-secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(184, 134, 11, 0.3);
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

        .forgot-password {
            text-align: right;
            margin-top: -0.5rem;
            margin-bottom: 1.5rem;
        }

        .forgot-password a {
            color: var(--gray-text);
            font-size: 0.85rem;
            text-decoration: none;
        }

        .forgot-password a:hover {
            color: var(--gold-primary);
            text-decoration: underline;
        }

        .social-login {
            margin-top: 2rem;
            text-align: center;
        }

        .social-login p {
            color: var(--gray-text);
            position: relative;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background-color: var(--gray-medium);
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border: 1px solid var(--gray-medium);
            color: var(--gray-dark);
            transition: var(--transition);
        }

        .social-icon:hover {
            background-color: var(--gray-light);
            border-color: var(--gold-primary);
            color: var(--gold-primary);
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
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'f6c720d1e544e2aa76d1532342d2c4f183801ee6';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
<body>
    <div class="auth-container">
        <!-- Form Section (Top on mobile) -->
        <div class="auth-right">
            <div class="auth-form-container">
                <div class="auth-form-header">
                    <h1>Welcome Back</h1>
                    <p>Don't have an account? <a href="{{ url('register') }}">Sign up</a></p>
                </div>

                      <!-- Include Toastr & jQuery (make sure these are above the script block below) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                
                   <form id="loginForm"> 
    @csrf
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                            <span class="input-group-text password-toggle" id="toggleLoginPassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div class="forgot-password">
                            <a href="{{ url('forgot-password') }}">Forgot password?</a>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-login">Sign In</button>
                    
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
        // Password toggle visibility
        const toggleLoginPassword = document.querySelector('#toggleLoginPassword');
        const loginPassword = document.querySelector('#loginPassword');
        
        toggleLoginPassword.addEventListener('click', function() {
            const type = loginPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            loginPassword.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

       
document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const token = document.querySelector('input[name="_token"]').value;

    try {
        const response = await fetch("{{ route('login') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
            },
            body: formData
        });

        const data = await response.json();

        if (response.ok && data.success) {
            toastr.success(data.message || 'Login successful! Redirecting...');
            setTimeout(() => {
                window.location.href = data.redirect || "{{ route('user.home') }}";
            }, 1500);
        } else {
            let errorMsg = data.message || 'Login failed.';
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
        console.error("Login error:", error);
    }
});
    </script>
</body>
</html>