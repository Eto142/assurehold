<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal Processing</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9, #f1f8ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .processing-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0px 5px 30px rgba(0, 0, 0, 0.1);
            max-width: 550px;
            width: 100%;
            overflow: hidden;
        }
        .processing-header {
            background: linear-gradient(135deg, #1b5e20, #2e7d32);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        .processing-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: pulse 1.5s infinite ease-in-out;
        }
        .processing-body {
            padding: 2rem;
        }
        .progress {
            height: 30px;
            border-radius: 50px;
            background-color: #c8e6c9;
            margin-bottom: 1.5rem;
        }
        .progress-bar {
            background-color: #2e7d32;
            font-weight: bold;
            transition: width 0.3s ease;
        }
        .status-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #eee;
        }
        .status-item:last-child {
            border-bottom: none;
        }
        .btn-primary {
            background-color: #1b5e20;
            border-color: #1b5e20;
            padding: 0.75rem;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #2e7d32;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(30, 126, 52, 0.2);
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .tax-notice {
            border-left: 4px solid #ffc107;
            background-color: #fff8e1;
        }
    </style>
</head>
<body>

<div class="container processing-container">
    <!-- Header Section -->
    <div class="processing-header">
        <div class="processing-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3>Withdrawal Processing</h3>
        <p class="mb-0">Your request is being processed</p>
    </div>

    <!-- Body Section -->
    <div class="processing-body">
        <!-- Progress Bar -->
        <div class="progress">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 100%">Complete</div>
        </div>

        <!-- Summary Information -->
        <div class="mb-4">
            <div class="d-flex justify-content-between mb-3">
                <span><i class="fas fa-money-bill-wave me-2 text-success"></i> Amount:</span>
                <strong>${{ number_format($withdrawal->amount, 2) }}</strong>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span><i class="fas fa-wallet me-2 text-success"></i> Method:</span>
                <strong>{{ ucfirst($withdrawal->payment_method) }}</strong>
            </div>
            <div class="d-flex justify-content-between">
                <span><i class="fas fa-clock me-2 text-success"></i> Processed:</span>
                <strong>{{ now()->format('M j, Y h:i A') }}</strong>
            </div>
        </div>

        <!-- Tax Notice -->
        <div class="alert alert-warning tax-notice mb-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle me-3 fa-lg"></i>
                <div>
                    <h5 class="alert-heading mb-2">Tax Verification Required</h5>
                    <p class="mb-0">Please complete tax settlement to release your funds</p>
                </div>
            </div>
        </div>

        <!-- Status Timeline -->
        <div class="mb-4">
            <div class="status-item d-flex align-items-center">
                <i class="fas fa-check-circle text-success me-3"></i>
                <div>
                    <strong>Withdrawal Approved</strong>
                    <p class="small mb-0 text-muted">Your request has been processed</p>
                </div>
            </div>
            <div class="status-item d-flex align-items-center">
                <div class="spinner-border spinner-border-sm text-primary me-3"></div>
                <div>
                    <strong>Tax Verification</strong>
                    <p class="small mb-0 text-muted">Pending your confirmation</p>
                </div>
            </div>
            <div class="status-item d-flex align-items-center">
                <i class="far fa-clock text-muted me-3"></i>
                <div>
                    <strong>Funds Release</strong>
                    <p class="small mb-0 text-muted">Will complete after verification</p>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <button id="settleTaxBtn" class="btn btn-primary w-100">
            <i class="fas fa-file-invoice-dollar me-2"></i>
            Proceed to Tax Settlement
        </button>

        <!-- Help Link -->
        <div class="text-center mt-3">
            <a href="#" class="text-decoration-none small" data-bs-toggle="modal" data-bs-target="#helpModal">
                <i class="fas fa-question-circle me-1"></i> Need help with tax verification?
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div class="card-footer bg-light text-center py-3">
        <small class="text-muted">
            <i class="fas fa-shield-alt me-1"></i> Secure Transaction • 
            ID: W{{ $withdrawal->id }}{{ strtoupper(Str::random(4)) }}
        </small>
    </div>
</div>

<!-- Help Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tax Verification Help</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>To complete your withdrawal, you need to verify your tax payment:</p>
                <ol class="mb-3">
                    <li>Click "Proceed to Tax Settlement"</li>
                    <li>Enter your tax payment code</li>
                    <li>Submit for verification</li>
                </ol>
                <div class="alert alert-light border">
                    <i class="fas fa-info-circle me-1"></i> Verification typically completes within 24 hours
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary">Contact Support</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle tax settlement button click
    document.getElementById('settleTaxBtn').addEventListener('click', function() {
        // Show processing animation
        const btn = this;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Redirecting...';
        btn.disabled = true;
        
        // Redirect after 1 second
        setTimeout(function() {
            window.location.href = "{{ route('user.withdrawal.tax.fine', $withdrawal->id) }}";
        }, 1000);
    });
});
</script>

</body>
</html>