@include('admin.header')

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Enhanced Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <div class="mb-3 mb-md-0">
            <h1 class="h3 mb-1">User Profile</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">User Name</li> --}}
                </ol>
            </nav>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateTaxCodeModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Tax Code
            </button>

             <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateWithdrawalStatusModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Withdrawal Status
            </button>

            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateTransactionDetailsModal">
                <i class="fas fa-file-invoice-dollar me-1"></i> Update Transaction Details
            </button>
        </div>
    </div>

    <!-- Alert Container -->
    <div class="alert-container">
        <!-- Alert messages would appear here -->
    </div>

            <!-- Alert Placeholder -->
        <div class="alert-container" id="alertContainer">
            <!-- Alerts will appear here -->
         @if(session('success') || session('error'))
    <div class="alert alert-dismissible fade show custom-alert 
        {{ session('success') ? 'alert-success' : 'alert-danger' }}" 
        role="alert" id="flashAlert">

        @if(session('success'))
            <strong>✅ Success!</strong> {{ session('success') }}
        @else
            <strong>❌ Error!</strong> {{ session('error') }}
        @endif

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <style>
        .custom-alert {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-size: 0.95rem;
            font-weight: 500;
            padding: 12px 16px;
        }
        .custom-alert.fade-out {
            opacity: 0;
            transition: opacity 0.6s ease;
        }
    </style>

    <script>
        setTimeout(function () {
            let alertEl = document.getElementById('flashAlert');
            if (alertEl) {
                alertEl.classList.add('fade-out');
                setTimeout(() => {
                    let alert = new bootstrap.Alert(alertEl);
                    alert.close();
                }, 600); // Wait for fade-out animation
            }
        }, 3500); // Visible for 3.5 seconds
    </script>
@endif

        </div>

    <div class="row">
        <!-- Left Column - Enhanced Profile Card (All original info preserved) -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <!-- Profile Photo (unchanged) -->
                    <div class="position-relative mb-3 mx-auto" style="width: 150px; height: 150px;">
                       <div class="rounded-circle shadow w-100 h-100 d-flex align-items-center justify-content-center bg-primary text-white fw-bold fs-4">
    {{ strtoupper(substr($userProfile->first_name, 0, 1) . substr($userProfile->last_name, 0, 1)) }}
</div>

<span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-3 border-white">
    <i class="fas fa-check text-white"></i>
</span>

                    </div>
                    <h3 class="mb-1">{{ $userProfile->first_name }} {{ $userProfile->last_name }}</h3>
                    <p class="text-muted mb-3">{{ $userProfile->email }}</p>
                    
                    <!-- Contact Buttons (unchanged) -->
                    <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                        <a href="mailto:{{ $userProfile->email }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-envelope me-1"></i> Email
                        </a>
                        <a href="tel:+{{ $userProfile->phone }}" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-phone me-1"></i> Call
                        </a>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#updateTaxCodeModal">
                            <i class="fas fa-file-invoice-dollar me-1"></i> Tax Code
                        </button>
                    </div>
                    
                    <hr>
                    
                    <!-- Verification Status Cards (unchanged layout, enhanced visuals) -->
                    <div class="row g-2 mb-3">
                        {{-- <div class="col-6">
                            <div class="card bg-success bg-opacity-10 border-success h-100">
                                <div class="card-body p-2 text-center">
                                    <h6 class="card-title text-success mb-1">Wallet Verification</h6>
                                    <p class="card-text fw-bold fs-5 mb-0">
                                        <i class="fas fa-check-circle"></i>
                                    </p>
                                </div>
                            </div>
                        </div> --}}

                           {{-- <div class="col-6">
    <div class="card bg-success bg-opacity-10 border-success h-100">
        <div class="card-body p-2 text-center">
            <h6 class="card-title text-success mb-1">Withdrawal Status</h6>
            <p class="card-text fw-bold fs-5 mb-0">
                @if($userProfile->withdrawal_status == 1)
                    Activated <i class="fas fa-check-circle text-success"></i>
                @else
                    Deactivated <i class="fas fa-times-circle text-danger"></i>
                @endif
            </p>
        </div>
    </div>
</div> --}}

                           <div class="col-6">
                            <div class="card bg-success bg-opacity-10 border-success h-100">
                                <div class="card-body p-2 text-center">
                                    <h6 class="card-title text-success mb-1">Withdrawal Status</h6>
                                    <p class="card-text fw-bold fs-5 mb-0">
                                         @if($userProfile->withdrawal_status == 1)
                    Activated <i class="fas fa-check-circle text-success"></i>
                @else
                    Deactivated <i class="fas fa-times-circle text-danger"></i>
                @endif
                                        <i class="fas fa-check-circle"></i>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="card bg-primary bg-opacity-10 border-primary h-100">
                                <div class="card-body p-2 text-center">
                                    <h6 class="card-title text-primary mb-1">Withdrawal Tax Code</h6>
                                    <p class="card-text fw-bold fs-5 mb-0">{{ $userProfile->withdrawal_tax_code }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                 <!-- Transaction Details -->
<div class="card shadow-sm border-0 mt-3">
    <div class="card-header bg-primary text-white py-2">
        <h6 class="mb-0"><i class="fas fa-receipt me-2"></i>Transaction Details</h6>
    </div>
    <div class="card-body p-3">
        <div class="row mb-2">
            <div class="col-5 fw-bold">ID:</div>
            <div class="col-7">{{ $userProfile->transaction_id }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-5 fw-bold">Type:</div>
            <div class="col-7">{{ $userProfile->transaction_type }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-5 fw-bold">Escrow Amount:</div>
            <div class="col-7">{{ $userProfile->escrow_amount }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-5 fw-bold">Service Fee:</div>
            <div class="col-7">{{ $userProfile->service_fee }}</div>
        </div>
        <div class="row">
            <div class="col-5 fw-bold">Total Amount:</div>
            <div class="col-7">{{ $userProfile->total_amount }}</div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
        
        <!-- Right Column - Enhanced User Details (All original info preserved) -->
        <div class="col-lg-8">
            <!-- Personal Information Card (unchanged data, better header) -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <h5 class="mb-0"><i class="fas fa-user me-2"></i>Personal Information</h5>
                    <span class="badge bg-success">Verified</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">First Name</label>
                            <div class="fw-semibold">{{ $userProfile->first_name }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Last Name</label>
                            <div class="fw-semibold">{{ $userProfile->last_name }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Email Address</label>
                            <div class="fw-semibold d-flex align-items-center">
                                {{ $userProfile->email }}
                                <span class="badge bg-success ms-2">Verified</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Phone Number</label>
                            <div class="fw-semibold">{{ $userProfile->phone }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Company</label>
                            <div class="fw-semibold">{{ $userProfile->company }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Role</label>
                            <div class="fw-semibold">{{ $userProfile->role }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted small">Country</label>
                            <div class="fw-semibold">{{ $userProfile->country }}</div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        <!-- Account Activity Section (unchanged functionality, better tabs) -->
<div class="card">
    <div class="card-header bg-white p-0">
        <ul class="nav nav-tabs card-header-tabs flex-nowrap overflow-auto" id="activityTabs" role="tablist">
            <!-- Verification Tab First -->
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-4 py-3 fw-bold" id="verification-tab" data-bs-toggle="tab" data-bs-target="#verification" type="button" role="tab">
                    <i class="fas fa-shield-alt me-2"></i> Verification
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-3 fw-bold" id="proofs-tab" data-bs-toggle="tab" data-bs-target="#proofs" type="button" role="tab">
                    <i class="fas fa-receipt me-2"></i> Payment Proofs
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-3 fw-bold" id="withdrawals-tab" data-bs-toggle="tab" data-bs-target="#withdrawals" type="button" role="tab">
                    <i class="fas fa-money-bill-wave me-2"></i> Withdrawals
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body p-0">
        <div class="tab-content p-3" id="activityTabsContent">

            <!-- Verification Details Tab (now first and active) -->
            <div class="tab-pane fade show active" id="verification" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Purpose</th>
                                <th>Transaction Details</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($escrow_verification_details as $escrow)
                                <tr>
                                    <td>{{ $escrow->created_at->format('M d, Y') }}</td>
                                    <td>{{ $escrow->purpose ?? 'N/A' }}</td>
                                    <td>{{ $escrow->transaction_details ?? 'N/A' }}</td>
                                    <td>
                                        @if($escrow->status == 1)
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($escrow->status == 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.escrow.approve', $escrow->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            
                                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                        </form>

                                        <form action="{{ route('admin.escrow.decline', $escrow->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                          
                                            <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No verification records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Payment Proofs Tab -->
            <div class="tab-pane fade" id="proofs" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Payment Proof</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user_payment_proof as $proof)
                                <tr>
                                    <td>{{ $proof->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @php
                                            $extension = strtolower(pathinfo($proof->file_path, PATHINFO_EXTENSION));
                                        @endphp

                                        @if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
                                            <img src="{{ asset($proof->file_path) }}" alt="Payment Proof" style="max-width: 150px; height: auto; border:1px solid #ccc; border-radius:5px;">
                                        @elseif($extension === 'pdf')
                                            <embed src="{{ asset($proof->file_path) }}" type="application/pdf" width="200" height="200">
                                        @else
                                            <span>{{ basename($proof->file_path) }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">No payment proof uploaded</td>
                                </tr>
                            @endforelse
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
                                <th>Amount</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user_withdrawal as $withdrawal)
                                <tr>
                                    <td>{{ $withdrawal->created_at->format('M d, Y') }}</td>
                                    <td>{{ ucfirst($withdrawal->payment_method) }}</td>
                                    <td>${{ number_format($withdrawal->amount, 2) }}</td>
                                    <td>{{ $withdrawal->details ?? '—' }}</td>
                                    <td>
                                        @if($withdrawal->status == 1)
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($withdrawal->status == 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Failed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No withdrawals found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>








<!-- Original Modals (100% unchanged) -->
<div class="modal fade" id="updateTransactionDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Transaction Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.add.transaction',$userProfile->id)}}" method="POST">
											@csrf

    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label fw-bold">Transaction ID</label>
            <input type="text" class="form-control" name="transaction_id" value="Enter Transaction ID">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Transaction Type</label>
            <input type="text" class="form-control" name="transaction_type" value="Enter Transaction Type">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Escrow Amount</label>
            <input type="text" class="form-control" name="escrow_amount" value="Enter Escrow Amount">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Service Fee</label>
            <input type="text" class="form-control" name="service_fee" value="Enter Service Fee">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Total Amount</label>
            <input type="text" class="form-control" name="total_amount" value="Enter Total Amount">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Transaction</button>
    </div>
</form>

        </div>
    </div>
</div>




<div class="modal fade" id="updateWithdrawalStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Update Withdrawal Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.withdrawal.status', $userProfile->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Withdrawal Status</label>
                        <select class="form-select" name="withdrawal_status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>





<div class="modal fade" id="updateTaxCodeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Withdrawal Tax Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Withdrawal Tax Code</label>
                        <input type="text" class="form-control" placeholder="Enter tax code" value="{{ $userProfile->withdrawal_tax_code }}">
                    </div>
                   
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Tax Code</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Original Scripts (100% unchanged) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>

<style>
    /* Original Alert Styles (unchanged) */
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

    /* Enhanced Styles (added improvements without affecting original structure) */
    .nav-tabs .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #6c757d;
    }
    
    .nav-tabs .nav-link.active {
        color: #4e73df;
        border-bottom-color: #4e73df;
        background: transparent;
    }
    
    .card-header {
        padding: 1rem 1.25rem;
    }
    
    .table-sm td, .table-sm th {
        padding: 0.75rem;
    }
</style>

@include('admin.footer')