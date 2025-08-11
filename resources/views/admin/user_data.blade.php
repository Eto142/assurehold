@include('admin.header')

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <div class="mb-3 mb-md-0">
            <h1 class="h3 mb-1">User Profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Name</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateTaxCodeModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Tax Code
            </button>
        </div>
    </div>

    <!-- Alert Container -->
    <div class="alert-container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="alert-content">
                <div class="alert-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <div class="alert-text">
                    Tax code updated successfully
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="alert-progress"></div>
        </div>
    </div>

    <div class="row">
        <!-- Left Column - Profile Card -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="position-relative mb-3 mx-auto" style="width: 150px; height: 150px;">
                        <img src="https://ui-avatars.com/api/?name=User+Name&background=random" 
                             class="rounded-circle shadow w-100 h-100 object-cover" alt="Profile Photo">
                        <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-3 border-white">
                            <i class="fas fa-check text-white"></i>
                        </span>
                    </div>
                    <h3 class="mb-1">User Name</h3>
                    <p class="text-muted mb-3">user@example.com</p>
                    
                    <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                        <a href="mailto:user@example.com" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-envelope me-1"></i> Email
                        </a>
                        <a href="tel:+1234567890" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-phone me-1"></i> Call
                        </a>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#updateTaxCodeModal">
                            <i class="fas fa-file-invoice-dollar me-1"></i> Tax Code
                        </button>
                    </div>
                    
                    <hr>
                    
                    <!-- Verification Status Cards -->
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="card bg-success bg-opacity-10 border-success">
                                <div class="card-body p-2 text-center">
                                    <h6 class="card-title text-success mb-1">ID Verified</h6>
                                    <p class="card-text fw-bold fs-5 mb-0">
                                        <i class="fas fa-check-circle"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-primary bg-opacity-10 border-primary">
                                <div class="card-body p-2 text-center">
                                    <h6 class="card-title text-primary mb-1">Tax Code</h6>
                                    <p class="card-text fw-bold fs-5 mb-0">US-123456789</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Column - User Details and Activity -->
        <div class="col-lg-8">
            <!-- Personal Information Card -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Personal Information</h5>
                    <span class="badge bg-success">Verified</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">First Name</label>
                            <div class="fw-semibold">John</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Last Name</label>
                            <div class="fw-semibold">Doe</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Email Address</label>
                            <div class="fw-semibold d-flex align-items-center">
                                user@example.com
                                <span class="badge bg-success ms-2">Verified</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Phone Number</label>
                            <div class="fw-semibold">+1 (234) 567-8900</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Company</label>
                            <div class="fw-semibold">Acme Inc.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Role</label>
                            <div class="fw-semibold">Business Owner</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Country</label>
                            <div class="fw-semibold">United States</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Tax Code</label>
                            <div class="fw-semibold">US-123456789</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Account Activity Section -->
            <div class="card">
                <div class="card-header bg-white p-0">
                    <ul class="nav nav-tabs card-header-tabs flex-nowrap overflow-auto" id="activityTabs" role="tablist" style="border-bottom: none;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active px-4 py-3 fw-bold text-primary border-primary" id="proofs-tab" data-bs-toggle="tab" data-bs-target="#proofs" type="button" role="tab" style="border-bottom: 3px solid !important;">
                                <i class="fas fa-receipt me-2"></i> Payment Proofs
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-3 fw-bold text-success hover-border-success" id="verification-tab" data-bs-toggle="tab" data-bs-target="#verification" type="button" role="tab">
                                <i class="fas fa-shield-alt me-2"></i> Verification Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-3 fw-bold text-info hover-border-info" id="withdrawals-tab" data-bs-toggle="tab" data-bs-target="#withdrawals" type="button" role="tab">
                                <i class="fas fa-money-bill-wave me-2"></i> Withdrawals
                            </button>
                        </li>
                    </ul>
                </div>
                
                <div class="card-body p-0">
                    <div class="tab-content p-3" id="activityTabsContent">
                        <!-- Payment Proofs Tab -->
                        <div class="tab-pane fade show active" id="proofs" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Escrow ID</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>May 15, 2023</td>
                                            <td>ESC-789456</td>
                                            <td>Bank Transfer</td>
                                            <td><span class="badge bg-success">Verified</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Proof">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Verification Details Tab -->
                        <div class="tab-pane fade" id="verification" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Document Type</th>
                                            <th>Status</th>
                                            <th>Verified By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>May 10, 2023</td>
                                            <td>Government ID</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td>Admin User</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Withdrawals Tab -->
                        <div class="tab-pane fade" id="withdrawals" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Method</th>
                                            <th>Reference</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>May 5, 2023</td>
                                            <td>Bank Transfer</td>
                                            <td>WT-789456</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Update Tax Code Modal -->
<div class="modal fade" id="updateTaxCodeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Tax Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tax Identification Number</label>
                        <input type="text" class="form-control" placeholder="Enter tax code" value="US-123456789">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <select class="form-control">
                            <option value="US" selected>United States</option>
                            <option value="UK">United Kingdom</option>
                            <option value="CA">Canada</option>
                            <option value="AU">Australia</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Document Proof (Optional)</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Tax Code</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Initialize tooltips -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>

<style>
    /* Alert System */
    .alert-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        width: 100%;
        max-width: 400px;
        padding: 0 15px;
    }

    .alert {
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .alert-content {
        display: flex;
        align-items: center;
        padding: 15px;
        position: relative;
    }

    .alert-icon {
        margin-right: 12px;
        display: flex;
        align-items: center;
    }

    .alert-icon svg {
        width: 20px;
        height: 20px;
    }

    .alert-text {
        flex: 1;
        font-size: 14px;
        line-height: 1.4;
    }

    .btn-close {
        background: none;
        border: none;
        padding: 0;
        margin-left: 12px;
        opacity: 0.7;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .btn-close:hover {
        opacity: 1;
    }

    .btn-close svg {
        width: 16px;
        height: 16px;
    }

    .alert-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.3);
        animation: progressBar 5s linear forwards;
    }

    @keyframes progressBar {
        0% { width: 100%; }
        100% { width: 0%; }
    }

    /* Hover Border for Tabs */
    .hover-border-success:hover {
        color: #198754 !important;
        border-bottom: 3px solid #198754 !important;
    }
    .hover-border-info:hover {
        color: #0dcaf0 !important;
        border-bottom: 3px solid #0dcaf0 !important;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .alert-container {
            top: 10px;
            right: 10px;
            left: 10px;
            max-width: none;
        }
        
        .alert-content {
            padding: 12px;
        }
        
        .alert-text {
            font-size: 13px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-dismiss alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
                alert.style.transform = 'translateX(100%)';
                alert.style.opacity = '0';
                
                setTimeout(() => {
                    alert.remove();
                }, 500);
            }, 5000);
            
            // Pause animation on hover
            alert.addEventListener('mouseenter', () => {
                alert.querySelector('.alert-progress').style.animationPlayState = 'paused';
            });
            
            alert.addEventListener('mouseleave', () => {
                alert.querySelector('.alert-progress').style.animationPlayState = 'running';
            });
        });
    });
</script>

@include('admin.footer')