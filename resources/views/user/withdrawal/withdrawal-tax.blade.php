<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Payment Verification</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .card-header {
            border-radius: 0 !important;
        }
        .input-group-text {
            min-width: 45px;
            justify-content: center;
        }
        .form-control {
            height: 45px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-1px);
        }
        #helpModal ol {
            padding-left: 1.5rem;
        }
        #helpModal ol li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Warning Alert -->
            <div class="alert alert-warning border-0 shadow-sm mb-4">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <i class="fas fa-exclamation-triangle fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="alert-heading mb-2">Tax Payment Required</h5>
                        <p class="mb-1">A tax fine must be paid before your withdrawal can be processed.</p>
                        <p class="mb-0">
                            <small>
                                <i class="fas fa-info-circle me-1"></i>
                                Contact admin if you don't have a payment code
                            </small>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tax Payment Form -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0">
                        <i class="fas fa-receipt me-2"></i>
                        Tax Payment Verification
                    </h4>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: @json(session('success')),
    confirmButtonColor: '#3085d6'
});
</script>
@endif

@if ($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    html: `{!! implode('<br>', $errors->all()) !!}`,
    confirmButtonColor: '#d33'
});
</script>
@endif



                <div class="card-body p-4">
                    <form method="POST" action="{{ route('user.withdrawal.tax.submit', $withdrawal->id) }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold mb-2">Tax Payment Code</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="text" 
                                       name="withdrawal_tax_code" 
                                       class="form-control py-2" 
                                       placeholder="Enter tax payment code" 
                                       required
                                     
                                       title="16-character alphanumeric code">
                            </div>
                            <small class="text-muted mt-1 d-block">
                                <i class="fas fa-key me-1"></i>
                                This code was provided when you paid your tax fine
                            </small>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label small" for="termsCheck">
                                    I certify this tax payment is valid and belongs to me
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                            <i class="fas fa-paper-plane me-2"></i> Verify Tax Payment
                        </button>
                    </form>
                </div>
                <div class="card-footer bg-light py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt me-1"></i> Secure Verification
                        </small>
                        <small class="text-muted">
                            Withdrawal ID: #{{ $withdrawal->id }}
                        </small>
                    </div>
                </div>
            </div>
            
            <!-- Help Section -->
            <div class="text-center mt-4">
                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#helpModal">
                    <i class="fas fa-question-circle me-1"></i> Need help with tax payment?
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Help Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tax Payment Assistance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>To complete your withdrawal, you must first pay the required tax fine and obtain a payment verification code.</p>
                <ol class="mb-3">
                    <li>Contact admin through the support portal</li>
                    <li>Request a tax payment invoice</li>
                    <li>Complete the payment through approved channels</li>
                    <li>You'll receive a 16-digit verification code</li>
                    <li>Enter that code in the form above</li>
                </ol>
                <div class="alert alert-light border">
                    <i class="fas fa-clock me-1"></i> Processing may take 1-2 business days after verification
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary">Contact Support</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
