@include('user.header')

<div class="container my-5">
    <div class="row">
        <!-- Left Column - Summary and Proof -->
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3" style="background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary))">
                    <h2 class="h5 mb-0"><i class="fas fa-receipt me-2"></i> Transaction Summary</h2>
                </div>
                <div class="card-body">
                    <!-- Summary Info -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 p-2 bg-light rounded">
                            <div>
                                <span class="text-muted small">Amount Paid</span>
                                <h3 class="mb-0 text-success">${{ number_format($paid_amount, 2) }}</h3>
                            </div>
                            <div class="bg-success bg-opacity-10 p-2 rounded">
                                <i class="fas fa-dollar-sign text-success"></i>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                            <div>
                                <span class="text-muted small">Payment Method</span>
                                <h4 class="mb-0">{{ ucfirst($payment_method) }}</h4>
                            </div>
                            <div class="bg-info bg-opacity-10 p-2 rounded">
                                <i class="fas fa-wallet text-info"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Proof -->
                    <div class="border-top pt-3">
                        <h4 class="h6 mb-3"><i class="fas fa-camera me-2"></i> Payment Proof</h4>
                        @if(file_exists(storage_path('app/public/'.$proof_path)))
                            <div class="text-center border p-3 rounded bg-light">
                                <img src="{{ asset('storage/'.$proof_path) }}" 
                                     alt="Payment Proof" 
                                     class="img-fluid rounded shadow-sm"
                                     style="max-height: 200px;">
                                <div class="mt-2">
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i> Verified
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning small mb-0">
                                <i class="fas fa-exclamation-triangle me-1"></i> Payment proof not available
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Withdrawal Form -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white py-3" style="background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));">
                    <h2 class="h5 mb-0">
                        <i class="fas fa-arrow-right me-2"></i>
                        @if($payment_method === 'bank')
                            Bank Transfer Details
                        @elseif($payment_method === 'crypto')
                            Crypto Transfer Details
                        @endif
                    </h2>
                </div>
                <div class="card-body">
                    @if($payment_method === 'bank')
                        <form method="POST" action="{{ route('user.withdrawal.bank.process') }}">
                            @csrf
                            <input type="hidden" name="amount" value="{{ number_format($paid_amount, 2) }}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Bank Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-landmark text-muted"></i></span>
                                        <input type="text" name="bank_name" class="form-control" placeholder="e.g. Chase Bank" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Account Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-user text-muted"></i></span>
                                        <input type="text" name="account_name" class="form-control" placeholder="Enter Account holder name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Account Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-credit-card text-muted"></i></span>
                                        <input type="text" name="account_number" class="form-control" placeholder="Enter Account Number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">SWIFT Code</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-code text-muted"></i></span>
                                        <input type="text" name="swift_code" class="form-control" placeholder="Optional">
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Bank Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-credit-card text-muted"></i></span>
                                        <input type="text" name="bank_address" class="form-control" placeholder="Enter Bank Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2 border-top">
                                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                                    <i class="fas fa-paper-plane me-2"></i> Complete Bank Transfer
                                </button>
                            </div>
                        </form>

                    @elseif($payment_method === 'crypto')
                        <form method="POST" action="{{ route('user.withdrawal.crypto.process') }}">
                            @csrf
                             <input type="hidden" name="amount" value="{{ number_format($paid_amount, 2) }}">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label small text-muted mb-1">Wallet Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-qrcode text-muted"></i></span>
                                        <input type="text" name="wallet_address" class="form-control" placeholder="Enter Wallet Address" required>
                                    </div>
                                    <small class="text-muted d-block mt-1">Double-check your wallet address</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted mb-1">Network</label>
                                    <select name="network" class="form-select" required>
                                        <option value="">Select Network</option>
                                         <option value="BTC">Bitcoin</option>
                                        <option value="ERC20">Ethereum (ERC-20)</option>
                                        <option value="USDT">USDT</option>
                                        <option value="BEP20">Binance Smart Chain (BEP-20)</option>
                                        <option value="TRC20">Tron (TRC-20)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-light p-3 rounded border h-100">
                                        <h6 class="small text-muted mb-2"><i class="fas fa-info-circle me-1"></i> Important Note</h6>
                                        <p class="small mb-0">Ensure network matches your wallet. Wrong network may result in permanent loss.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2 border-top">
                                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                                    <i class="fas fa-paper-plane me-2"></i> Complete Crypto Transfer
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="card-footer bg-light py-2">
                    <p class="small text-muted mb-0">
                        <i class="fas fa-lock me-1"></i> Secured connection • 
                        <i class="fas fa-clock me-1 ms-2"></i> Processing time: 1-3 business days
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.footer')

<style>
    .card {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .card-header {
        border-radius: 0 !important;
    }
    .form-control, .form-select, .input-group-text {
        height: 42px;
    }
    .input-group-text {
        min-width: 42px;
        justify-content: center;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    .bg-light {
        background-color: #f8f9fa!important;
    }
</style>