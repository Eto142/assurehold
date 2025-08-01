<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssureHold International - Trusted Software Escrow Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('home/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <div class="header-section" id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/">
                    <div class="logo-container">
                        <div class="logo-icon"></div>
                        <div>
                            <div class="brand-text">ASSURE<span class="tech">HOLD</span></div>
                            <div class="brand-subtitle">INTERNATIONAL, INC.</div>
                        </div>
                    </div>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link dropdown" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown" href="#fees">Fees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#why-us">Why Choose Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown" href="#resources">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonials">Testimonials</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('show.register') }}" class="btn-contact" >Register</a>
                        <a href="{{ url('login') }}" class="login-link" ><i class="fas fa-sign-in-alt"></i> Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
