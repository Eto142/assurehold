<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assure Hold Dashboard - Secure Transaction Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href ="{{ asset('user/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app-container">
        <!-- Header -->
        <header class="dashboard-header">
            <div class="header-container">
                <div class="d-flex align-items-center">
                    <button class="mobile-menu-btn me-2" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="logo-container">
                        <div class="logo-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                            <div class="brand-text">ASSURE<span class="tech">HOLD</span></div>
                            <div class="brand-subtitle">SECURE ESCROW PLATFORM</div>
                        </div>
                    </div>
                </div>
                
                <div class="user-info">
                    <div class="user-details">
                        <h6>{{ Auth::user()->first_name }}</h6>
                        {{-- <small>Premium Account</small> --}}
                    </div>
                    <div class="user-avatar">{{ Auth::user()->first_name }}</div>
                    <div class="dropdown">
                        <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            {{-- <li><a class="dropdown-item" href="#"><i class="fas fa-bell me-2"></i>Notifications</a></li> --}}
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">
                                
                                
                                <i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="main-wrapper">
            <!-- Sidebar Overlay -->
            <div class="sidebar-overlay" id="sidebarOverlay"></div>
            
            <!-- Sidebar Navigation -->
            <nav class="sidebar" id="sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.home') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.connectescrow') }}">
                            <i class="fas fa-balance-scale"></i>
                            <span>Connect Escrow Attorney</span>
                            {{-- <span class="notification-badge">1</span> --}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.escrow.wallet.verification') }}">
                            <i class="fas fa-wallet"></i>
                            <span>Escrow Wallet Account Verification</span>
                        </a>
                    </li>
                    

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.transaction.agreement') }}">
                            <i class="fas fa-file-contract"></i>
                            <span>Transaction Agreement</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.bank.information') }}">
                            <i class="fas fa-university"></i>
                            <span>Bank Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.approve.payment') }}">
                            <i class="fas fa-check-circle"></i>
                            <span>Approve Payment</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.pay.option') }}">
                            <i class="fas fa-credit-card"></i>
                            <span>Pay Option</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.cashout') }}">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Complete Verification to cashout</span>
            
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile') }}">
                            <i class="fas fa-user-check"></i>
                            <span>Profile</span>
                         
                        </a>
                    </li>  --}}

                    <li class="nav-item mt-3">
                        <a class="nav-link" href="{{ route('user.support') }}">
                            <i class="fas fa-headset"></i>
                            <span>Support Center</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
    <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="nav-link" style="background: none; border: none; color: inherit; text-decoration: none;">
            <i class="fas fa-sign-out-alt"></i>
            <span style="margin-right: 9px;">Logout</span>
        </button>
    </form>
</li>

                </ul>
            </nav>

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