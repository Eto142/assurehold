
@include('user.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification | AssureHold</title>
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
        }

        .page-subtitle {
            color: var(--gray-dark);
            font-size: 1rem;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }

        .progress-steps::before {
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

        .form-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--black-primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: var(--gold-primary);
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

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .form-group {
            flex: 1;
        }

        .btn-verify {
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

        .btn-verify:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(184, 134, 11, 0.3);
        }

        .verification-note {
            background: rgba(16, 185, 129, 0.1);
            border-left: 4px solid var(--success-color);
            padding: 1rem;
            border-radius: 4px;
            margin-top: 2rem;
            font-size: 0.9rem;
        }

        .required-field::after {
            content: '*';
            color: var(--danger-color);
            margin-left: 4px;
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .progress-steps {
                flex-wrap: wrap;
                gap: 1rem;
            }
            
            .progress-steps::before {
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
            <h1 class="page-title">Escrow Wallet Verification</h1>
            <p class="page-subtitle">Complete your account verification to unlock all wallet features</p>
        </div>

        <div class="verification-card">
            <!-- Progress Steps -->
            <div class="progress-steps">
                {{-- <div class="step completed">
                    <div class="step-number"><i class="fas fa-check"></i></div>
                    <div class="step-label">Basic Info</div>
                </div> --}}
                <div class="step active">
                    <div class="step-number">1</div>
                    <div class="step-label">Escrow Wallet Verification</div>
                </div>
                {{-- <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-label">Document Upload</div>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-label">Review & Submit</div>
                </div> --}}
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session("success") }}',
        confirmButtonColor: '#3085d6'
    });
</script>
@endif

            <!-- Personal Information Form -->
            <form method="POST" action="{{ route('user.verification.store') }}">
                       @csrf
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-user"></i>
                        Personal Information
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName" class="form-label required-field">First Name</label>
                            <input type="text" id="firstName" class="form-control" name="first_name" placeholder="{{ Auth::user()->last_name }}"" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="form-label required-field">Last Name</label>
                            <input type="text" id="lastName" class="form-control" name="last_name" placeholder="{{ Auth::user()->last_name }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dob" class="form-label required-field">Date of Birth</label>
                        <input type="date" id="dob"  name="dob" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label required-field">Phone Number</label>
                        <input type="tel" id="phone" class="form-control"  name="phone" placeholder="Enter Phone Number" required>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-home"></i>
                        Address Information
                    </h3>

                    <div class="form-group">
                        <label for="street" class="form-label required-field">Street Address</label>
                        <input type="text" id="street"   name="address" class="form-control" placeholder="123 Main St" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="city" class="form-label required-field">City</label>
                            <input type="text" id="city"  name="city" class="form-control" placeholder="New York" required>
                        </div>
                        <div class="form-group">
                            <label for="state" class="form-label required-field">State/Province</label>
                            <input type="text" id="state"  name="state" class="form-control" placeholder="NY" required>
                        </div>
                        <div class="form-group">
                            <label for="zip" class="form-label required-field">ZIP/Postal Code</label>
                            <input type="text" id="zip"  name="zip_code" class="form-control" placeholder="10001" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="street" class="form-label required-field">Country</label>
                        <input type="text" id="street"   name="country" class="form-control" placeholder="Enter Country" required>
                    </div>
                <!-- Escrow Purpose -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-file-contract"></i>
                        Escrow Purpose
                    </h3>

                    <div class="form-group">
                        <label for="purpose" class="form-label required-field">Reason for Setting Up Escrow Wallet</label>
                        <select id="purpose" name="purpose" class="form-control" required>
                            <option value="">Select Purpose</option>
                            <option value="real_estate">Real Estate Transaction</option>
                            <option value="business_sale">Business Sale/Purchase</option>
                            <option value="online_transaction">Online Marketplace Transaction</option>
                            <option value="service_agreement">Service Agreement</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group" id="otherPurposeGroup" style="display: none;">
                        <label for="otherPurpose" class="form-label required-field">Please Specify</label>
                        <input type="text" id="otherPurpose"  name="other_purpose" class="form-control" placeholder="Describe your specific purpose">
                    </div>

                    <div class="form-group">
                        <label for="transactionDetails" class="form-label required-field">Transaction Details</label>
                        <textarea id="transactionDetails" name="transaction_details" class="form-control" rows="4" placeholder="Describe the transaction you'll be using escrow for, including parties involved and amount (if known)" required></textarea>
                    </div>
                </div>

                <!-- Agreement -->
                {{-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="termsAgreement" required>
                    <label class="form-check-label" for="termsAgreement">I certify that all information provided is accurate and complete</label>
                </div> --}}

                <button type="submit" class="btn-verify">
                    <i class="fas fa-check-circle me-2"></i> Continue Verification
                </button>

                <div class="verification-note">
                    <i class="fas fa-info-circle me-2"></i> Your information is securely encrypted and will only be used for verification purposes.
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
        // Show/hide other purpose field
        document.getElementById('purpose').addEventListener('change', function() {
            const otherGroup = document.getElementById('otherPurposeGroup');
            otherGroup.style.display = this.value === 'other' ? 'block' : 'none';
        });

        // Form submission
        document.getElementById('verificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            const formValid = this.checkValidity();
            this.classList.add('was-validated');
            
            if (formValid) {
                // In a real application, you would send the data to your backend
                const formData = {
                    firstName: document.getElementById('firstName').value,
                    lastName: document.getElementById('lastName').value,
                    dob: document.getElementById('dob').value,
                    phone: document.getElementById('phone').value,
                    street: document.getElementById('street').value,
                    city: document.getElementById('city').value,
                    state: document.getElementById('state').value,
                    zip: document.getElementById('zip').value,
                    country: document.getElementById('country').value,
                    purpose: document.getElementById('purpose').value,
                    otherPurpose: document.getElementById('purpose').value === 'other' 
                        ? document.getElementById('otherPurpose').value 
                        : '',
                    transactionDetails: document.getElementById('transactionDetails').value
                };
                
                console.log('Form data:', formData);
                
                // Redirect to next step (document upload)
                alert('Verification information submitted successfully! Redirecting to document upload...');
                // window.location.href = 'verification-documents.html';
            }
        });
    </script> --}}


   

</body>
</html>

@include('user.footer')