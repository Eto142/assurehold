@include('user.header')

            <!-- Main Content Area -->
            <main class="main-content">
                <div class="content-header">
                    <h1 class="page-title">Welcome Back, {{ Auth::user()->first_name }}!</h1>
                    <p class="page-subtitle">Manage your escrow transactions securely and efficiently</p>
                </div>

                {{-- <!-- Progress Overview -->
                <div class="progress-container">
                    <h3 class="progress-title">
                        <i class="fas fa-chart-line"></i>
                        Transaction Progress
                    </h3>
                    <div class="custom-progress">
                        <div class="progress-bar-gold" style="width: 65%"></div>
                    </div>
                    <p class="progress-text">65% Complete - 3 of 8 steps remaining</p>
                </div> --}}

<!-- Transaction Summary -->
<div class="transaction-summary">
    <h3 class="summary-title">
        <i class="fas fa-file-invoice-dollar"></i>
        Current Transaction Summary
    </h3>

    <div class="summary-item">
        <span class="summary-label">Transaction ID:</span>
        <span class="summary-value">
            {{ !empty(Auth::user()->transaction_id) ? Auth::user()->transaction_id : '‎' }}
            @empty(Auth::user()->transaction_id)
                <span class="placeholder">Not available yet</span>
            @endempty
        </span>
    </div>

    <div class="summary-item">
        <span class="summary-label">Transaction Type:</span>
        <span class="summary-value">
            {{ !empty(Auth::user()->transaction_type) ? Auth::user()->transaction_type : '‎' }}
            @empty(Auth::user()->transaction_type)
                <span class="placeholder">Not available yet</span>
            @endempty
        </span>
    </div>

    <div class="summary-item">
        <span class="summary-label">Escrow Amount:</span>
        <span class="summary-value">
            {{ !empty(Auth::user()->escrow_amount) ? Auth::user()->escrow_amount : '‎' }}
            @empty(Auth::user()->escrow_amount)
                <span class="placeholder">Not available yet</span>
            @endempty
        </span>
    </div>

    <div class="summary-item">
        <span class="summary-label">Service Fee:</span>
        <span class="summary-value">
            {{ !empty(Auth::user()->service_fee) ? Auth::user()->service_fee : '‎' }}
            @empty(Auth::user()->service_fee)
                <span class="placeholder">Not available yet</span>
            @endempty
        </span>
    </div>

    <div class="summary-item">
        <span class="summary-label">Total Amount:</span>
        <span class="summary-total">
            {{ !empty(Auth::user()->total_amount) ? Auth::user()->total_amount : '‎' }}
            @empty(Auth::user()->total_amount)
                <span class="placeholder">Not available yet</span>
            @endempty
        </span>
    </div>
</div>

{{-- <style>
    .placeholder {
        color: #888; /* Faint gray */
        font-style: italic;
    }
</style> --}}

                <!-- Dashboard Cards -->
               <div class="row g-4 mb-4">
    <div class="col-xl-4 col-md-6">
        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-balance-scale"></i>
            </div>
            <h4 class="card-title">Escrow Attorney</h4>
            <p class="card-description">
                Connect with our certified escrow attorneys for legal guidance and support.
            </p>

            @if($escrow && $escrow->connect_escrow_status === 1)
                {{-- Approved --}}
                <div class="card-status status-approved">
                    <span class="status-indicator bg-success"></span>
                    Approved
                </div>
                <div class="mt-3">
                    <button class="btn btn-success" disabled>Already Connected</button>
                </div>
            @else
                {{-- Pending or No record --}}
                <div class="card-status status-required">
                    <span class="status-indicator bg-warning"></span>
                    Action Required
                </div>
                <div class="mt-3">
                    <a href="{{ route('user.connectescrow') }}" class="btn-gold">Connect Now</a>
                </div>
            @endif
        </div>
    </div>



                   <div class="col-xl-4 col-md-6">
    <div class="dashboard-card">
        <div class="card-icon">
            <i class="fas fa-user-check"></i>
        </div>
        <h4 class="card-title">Account Verification</h4>
        <p class="card-description">
            Complete your identity verification to unlock all platform features.
        </p>

        @if($escrow && $escrow->status === 1)
            {{-- Approved --}}
            <div class="card-status status-approved">
                <span class="status-indicator bg-success"></span>
                Verified
            </div>
            <div class="mt-3">
                <button class="btn btn-success" disabled>Verified</button>
            </div>
        @elseif($escrow && $escrow->status === 0)
            {{-- Pending --}}
            <div class="card-status status-pending">
                <span class="status-indicator bg-warning"></span>
                In Progress
            </div>
            <div class="mt-3">
                <a href="{{ route('user.escrow.wallet.verification') }}" class="btn-outline-gold">Continue</a>
            </div>
        @else
            {{-- No record --}}
            <div class="card-status status-required">
                <span class="status-indicator bg-danger"></span>
                Not Verified
            </div>
            <div class="mt-3">
                <a href="{{ route('user.escrow.wallet.verification') }}" class="btn-outline-gold">Start Now</a>
            </div>
        @endif
    </div>
</div>
<div class="col-xl-4 col-md-6">
    <div class="dashboard-card">
        <div class="card-icon">
            <i class="fas fa-file-contract"></i>
        </div>
        <h4 class="card-title">Transaction Agreement</h4>
        <p class="card-description">
            Review and sign your escrow transaction agreement documents.
        </p>

        @if($escrow && $escrow->transaction_agreement_status === 1)
            {{-- Completed --}}
            <div class="card-status status-completed">
                <span class="status-indicator bg-success"></span>
                Completed
            </div>
            <div class="mt-3">
                <a href="{{ route('user.transaction.agreement') }}" class="btn-outline-gold">View Agreement</a>
            </div>
        @elseif($escrow && $escrow->transaction_agreement_status === 0)
            {{-- Pending --}}
            <div class="card-status status-pending">
                <span class="status-indicator bg-warning"></span>
                Pending
            </div>
            <div class="mt-3">
                <a href="{{ route('user.transaction.agreement') }}" class="btn-outline-gold">Request Agreement</a>
            </div>
        @else
            {{-- No record --}}
            <div class="card-status status-required">
                <span class="status-indicator bg-danger"></span>
                Not Requested
            </div>
            <div class="mt-3">
                <a href="{{ route('user.transaction.agreement') }}" class="btn-outline-gold">Request Now</a>
            </div>
        @endif
    </div>
</div>

                    <div class="col-xl-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="card-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <h4 class="card-title">Bank Information</h4>
                            <p class="card-description">Confirm your banking details to receive funds securely.</p>
                            <div class="card-status status-completed">
                                <span class="status-indicator"></span>
                                Verified
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('user.bank.information') }}" class="btn-outline-gold">Manage</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="card-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <h4 class="card-title">Payment Options</h4>
                            <p class="card-description">Choose your preferred payment method for the transaction.</p>
                            <div class="card-status status-pending">
                                <span class="status-indicator"></span>
                                Pending Selection
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('user.pay.option') }}" class="btn-gold">Select Method</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="dashboard-card">
                            <div class="card-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <h4 class="card-title">Cashout Verification</h4>
                            <p class="card-description">Complete final verification steps to process your cashout.</p>
                            <div class="card-status status-required">
                                <span class="status-indicator"></span>
                                Verification Needed
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('user.cashout') }}" class="btn-gold">Start Verification</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                {{-- <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="quick-actions">
                            <h3 class="quick-actions-title">
                                <i class="fas fa-bolt"></i>
                                Quick Actions
                            </h3>
                            <a href="wallet.html" class="action-btn">
                                <i class="fas fa-wallet"></i>
                                <div class="action-text">
                                    <strong>View Escrow Wallet</strong>
                                    <small>Check your current balance and transaction history</small>
                                </div>
                            </a>
                            <a href="approve.html" class="action-btn">
                                <i class="fas fa-check-circle"></i>
                                <div class="action-text">
                                    <strong>Approve Pending Payment</strong>
                                    <small>Review and approve your pending transaction</small>
                                </div>
                            </a>
                            <a href="support.html" class="action-btn">
                                <i class="fas fa-headset"></i>
                                <div class="action-text">
                                    <strong>Contact Support</strong>
                                    <small>Get help from our 24/7 support team</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="quick-actions">
                            <h3 class="quick-actions-title">
                                <i class="fas fa-history"></i>
                                Recent Activity
                            </h3>
                            <div class="activity-item">
                                <div class="activity-content">
                                    <div class="activity-icon" style="background: var(--success-color);">
                                        <i class="fas fa-file-contract"></i>
                                    </div>
                                    <div class="activity-details">
                                        <strong>Agreement Signed</strong>
                                        <small>2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-content">
                                    <div class="activity-icon" style="background: var(--gold-primary);">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="activity-details">
                                        <strong>Bank Details Verified</strong>
                                        <small>1 day ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-content">
                                    <div class="activity-icon" style="background: var(--info-color);">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="activity-details">
                                        <strong>Account Created</strong>
                                        <small>3 days ago</small>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </main>
        </div>
    </div>

 @include('user.footer')