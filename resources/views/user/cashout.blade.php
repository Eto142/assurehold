@include('user.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Verification | AssureHold</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --gold-primary: #B8860B;
            --gold-secondary: #DAA520;
            --black-primary: #121826;
            --white-primary: #FFFFFF;
            --gray-light: #f8f9fa;
            --gray-medium: #E2E8F0;
            --gray-dark: #64748B;
            --success-color: #10B981;
            --danger-color: #EF4444;
            --border-radius: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--gray-light);
        }

        .verification-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .verification-card {
            background: var(--white-primary);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--black-primary);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--black-primary), var(--gold-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: var(--gray-dark);
            font-size: 1rem;
        }

        .verification-steps {
            display: flex;
            justify-content: space-between;
            margin: 2rem 0;
            position: relative;
        }

        .verification-steps::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--gray-medium);
            z-index: 1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .step-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--gray-medium);
            color: var(--gray-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .step.active .step-number {
            background: var(--gold-primary);
            color: white;
        }

        .step.completed .step-number {
            background: var(--success-color);
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: var(--gray-dark);
            text-align: center;
        }

        .step.active .step-label {
            color: var(--black-primary);
            font-weight: 500;
        }

        .fee-section {
            background: rgba(184, 134, 11, 0.1);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .fee-amount {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gold-primary);
            margin-bottom: 1rem;
        }

        .fee-details {
            font-size: 0.9rem;
            color: var(--gray-dark);
        }

        .upload-container {
            border: 2px dashed var(--gray-medium);
            border-radius: var(--border-radius);
            padding: 2rem;
            text-align: center;
            margin: 2rem 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-container:hover {
            border-color: var(--gold-primary);
            background: rgba(184, 134, 11, 0.05);
        }

        .upload-icon {
            font-size: 2.5rem;
            color: var(--gold-primary);
            margin-bottom: 1rem;
        }

        .preview-image {
            max-width: 100%;
            max-height: 200px;
            margin-top: 1rem;
            border-radius: 8px;
            display: none;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-medium);
            border-radius: 8px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.2);
            outline: none;
        }

        .btn-proceed {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-proceed:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(184, 134, 11, 0.3);
        }

        .required-field::after {
            content: '*';
            color: var(--danger-color);
            margin-left: 4px;
        }

        @media (max-width: 768px) {
            .verification-steps {
                flex-wrap: wrap;
                gap: 1rem;
            }
            
            .verification-steps::before {
                display: none;
            }
            
            .step {
                flex: 1 0 30%;
            }
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="page-header">
            <h1 class="page-title">Complete Verification</h1>
            <p class="page-subtitle">Finalize your account verification to access all features</p>
        </div>

        <div class="verification-card">
            <!-- Verification Steps -->
            <div class="verification-steps">
                <div class="step completed">
                    <div class="step-number"><i class="fas fa-check"></i></div>
                    <div class="step-label">Personal Info</div>
                </div>
                <div class="step completed">
                    <div class="step-number"><i class="fas fa-check"></i></div>
                    <div class="step-label">ID Verification</div>
                </div>
                <div class="step active">
                    <div class="step-number">3</div>
                    <div class="step-label">Payment</div>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-label">Completion</div>
                </div>
            </div>

            <!-- Fee Payment Section -->
            <div class="fee-section">
                <h3 class="mb-3"><i class="fas fa-money-bill-wave me-2"></i>Complete Verification to Cashout</h3>
               
            </div>

            <form id="verificationForm">
                <!-- Payment Proof Upload -->
                <div class="form-group">
                    <label class="form-label required-field">Upload Payment Proof</label>
                    <div class="upload-container" id="uploadContainer">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <h4>Drag & Drop Payment Proof Here</h4>
                        <p>or click to browse files (JPEG, PNG, PDF under 5MB)</p>
                        <input type="file" id="paymentProof" accept=".jpg,.jpeg,.png,.pdf" style="display: none;">
                        <img id="previewImage" class="preview-image" alt="Payment proof preview">
                    </div>
                </div>

                <!-- Personal Information Confirmation -->
                <h3 class="mt-4 mb-3"><i class="fas fa-user-check me-2"></i>Confirm Your Information</h3>
                
                <div class="form-row" style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label for="firstName" class="form-label required-field">First Name</label>
                        <input type="text" id="firstName" class="form-control" value="{{ Auth::user()->first_name }}" readonly>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="lastName" class="form-label required-field">Last Name</label>
                        <input type="text" id="lastName" class="form-control" value="{{ Auth::user()->last_name }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label required-field">Email Address</label>
                    <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="paymentMethod" class="form-label required-field">Payment Method</label>
                    <select id="paymentMethod" class="form-control" required>
                        <option value="">Select payment method</option>
                        <option value="crypto">Cryptocurrency</option>
                    </select>
                </div>

                <div class="form-group form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="confirmVerification" required>
                    <label class="form-check-label" for="confirmVerification">
                        I confirm that all information provided is accurate and the payment proof is genuine
                    </label>
                </div>

                <button type="submit" class="btn-proceed">
                    <i class="fas fa-check-circle me-2"></i> Complete Verification
                </button>
            </form>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="mb-3" style="font-size: 4rem; color: var(--success-color);">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Verification Submitted!</h3>
                    <p class="mb-4">Your verification documents and payment proof have been received. We'll review your submission and notify you via email within 24-48 hours.</p>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // File upload handling
        const uploadContainer = document.getElementById('uploadContainer');
        const paymentProof = document.getElementById('paymentProof');
        const previewImage = document.getElementById('previewImage');

        uploadContainer.addEventListener('click', () => {
            paymentProof.click();
        });

        paymentProof.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        previewImage.src = event.target.result;
                        previewImage.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewImage.style.display = 'none';
                }
                uploadContainer.style.borderColor = 'var(--success-color)';
            }
        });

        // Drag and drop functionality
        uploadContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadContainer.style.borderColor = 'var(--gold-primary)';
            uploadContainer.style.backgroundColor = 'rgba(184, 134, 11, 0.1)';
        });

        uploadContainer.addEventListener('dragleave', () => {
            uploadContainer.style.borderColor = 'var(--gray-medium)';
            uploadContainer.style.backgroundColor = 'transparent';
        });

        uploadContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadContainer.style.borderColor = 'var(--gray-medium)';
            uploadContainer.style.backgroundColor = 'transparent';
            
            if (e.dataTransfer.files.length) {
                paymentProof.files = e.dataTransfer.files;
                const event = new Event('change');
                paymentProof.dispatchEvent(event);
            }
        });

        // Form submission
        document.getElementById('verificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!this.checkValidity()) {
                this.classList.add('was-validated');
                return;
            }

            // Prepare form data
            const formData = {
                userId: "{{ Auth::user()->id }}",
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                transactionId: document.getElementById('transactionId').value,
                paymentMethod: document.getElementById('paymentMethod').value,
                paymentProof: paymentProof.files[0] ? paymentProof.files[0].name : null,
                verificationFee: 150.00
            };

            // In a real application, you would:
            // 1. Upload the payment proof file to your server
            // 2. Save the verification data to your database
            // 3. Send notification to admin
            console.log('Verification submitted:', formData);

            // Show success modal
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();

            // Reset form
            this.reset();
            previewImage.style.display = 'none';
        });
    </script>
</body>
</html>

@include('user.footer')