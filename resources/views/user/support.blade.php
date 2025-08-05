@include('user.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support | AssureHold</title>
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
            --border-radius: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--gray-light);
        }

        .agreement-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .agreement-card {
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

        .agreement-btn {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: white;
            border: none;
            padding: 1.25rem 2.5rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(184, 134, 11, 0.3);
            transition: all 0.4s ease;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin: 1rem auto;
        }

        .agreement-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(184, 134, 11, 0.4);
        }

        .agreement-btn:active {
            transform: translateY(-2px);
        }

        .agreement-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.5s;
        }

        .agreement-btn:hover::before {
            left: 100%;
        }

        .agreement-icon {
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .agreement-btn:hover .agreement-icon {
            transform: rotate(360deg);
        }

        .agreement-content {
            background: var(--white-primary);
            border: 1px solid var(--gray-medium);
            border-radius: var(--border-radius);
            padding: 2rem;
            margin: 2rem 0;
            max-height: 400px;
            overflow-y: auto;
        }

        .agreement-footer {
            text-align: center;
            margin-top: 2rem;
        }

        .form-check-input:checked {
            background-color: var(--gold-primary);
            border-color: var(--gold-primary);
        }

        @media (max-width: 768px) {
            .agreement-btn {
                padding: 1rem 1.5rem;
                font-size: 1rem;
            }
            
            .agreement-content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="agreement-container">
        <div class="page-header">
            <h1 class="page-title">Transaction Agreement</h1>
            <p class="page-subtitle">Review and sign your escrow agreement to proceed with the transaction</p>
        </div>

        <div class="agreement-card">
            <div class="text-center">
                <button type="button" class="agreement-btn">
                    <i class="fas fa-file-signature agreement-icon"></i>
                    Review Agreement
                </button>
            </div>

            <!-- Agreement Content (initially hidden) -->
            <div class="agreement-content" id="agreementContent" style="display: none;">
                <h4>ESCROW AGREEMENT</h4>
                <p><strong>Agreement Date:</strong> <span id="agreementDate"></span></p>
                <p><strong>Transaction ID:</strong> <span id="transactionId">ESC-{{ date('Y') }}-{{ str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT) }}</span></p>
                
                <h5 class="mt-4">1. PARTIES</h5>
                <p>This Escrow Agreement ("Agreement") is made between:</p>
                <p><strong>Buyer:</strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                <p><strong>Seller:</strong> [Seller's Name]</p>
                <p><strong>Escrow Agent:</strong> AssureHold Escrow Services</p>
                
                <h5 class="mt-4">2. ESCROW DETAILS</h5>
                <p>The parties agree to deposit the sum of <strong>$[Amount]</strong> with the Escrow Agent to be held in escrow pursuant to the terms of this Agreement.</p>
                
                <h5 class="mt-4">3. TERMS & CONDITIONS</h5>
                <p>1. The Escrow Agent shall hold the funds until all conditions of the underlying transaction are satisfied.</p>
                <p>2. Funds will be released to the Seller upon Buyer's written approval or upon fulfillment of all contractual obligations.</p>
                <p>3. In case of dispute, funds will be held until resolution is reached or as directed by a court of competent jurisdiction.</p>
                
                <h5 class="mt-4">4. FEES</h5>
                <p>The Escrow Agent's fee of <strong>$[Fee Amount]</strong> will be deducted from the escrow funds upon successful completion of the transaction.</p>
                
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                    <label class="form-check-label" for="agreeTerms">
                        I have read and agree to the terms of this Escrow Agreement
                    </label>
                </div>
                
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary" id="signAgreementBtn" style="background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary)); border: none; padding: 0.75rem 2rem; display: none;">
                        <i class="fas fa-signature me-2"></i> Sign Agreement
                    </button>
                </div>
            </div>
            
            <div class="agreement-footer">
                <p><small>By signing, you acknowledge this agreement is legally binding.</small></p>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="success-icon mb-3" style="font-size: 4rem; color: var(--success-color);">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Agreement Signed Successfully!</h3>
                    <p class="mb-4">Your transaction agreement has been executed. A copy has been sent to your email.</p>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set current date
        document.getElementById('agreementDate').textContent = new Date().toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });

        // Show agreement when button is clicked
        document.getElementById('reviewAgreementBtn').addEventListener('click', function() {
            const content = document.getElementById('agreementContent');
            const btn = document.getElementById('reviewAgreementBtn');
            
            if (content.style.display === 'none') {
                content.style.display = 'block';
                btn.innerHTML = '<i class="fas fa-eye-slash agreement-icon"></i> Hide Agreement';
            } else {
                content.style.display = 'none';
                btn.innerHTML = '<i class="fas fa-file-signature agreement-icon"></i> Review Agreement';
            }
        });

        // Enable sign button when terms are agreed
        document.getElementById('agreeTerms').addEventListener('change', function() {
            document.getElementById('signAgreementBtn').style.display = this.checked ? 'inline-block' : 'none';
        });

        // Sign agreement handler
        document.getElementById('signAgreementBtn').addEventListener('click', function() {
            // In a real application, you would:
            // 1. Save the signed agreement to your database
            // 2. Send email notification to admin@assurehold.com
            // 3. Send confirmation to user
            
            // Sample data to be sent
            const agreementData = {
                transactionId: document.getElementById('transactionId').textContent,
                userId: "{{ Auth::user()->id }}",
                userName: "{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}",
                userEmail: "{{ Auth::user()->email }}",
                agreementDate: document.getElementById('agreementDate').textContent,
                ipAddress: "<?php echo $_SERVER['REMOTE_ADDR']; ?>"
            };
            
            console.log('Agreement signed:', agreementData);
            
            // Here you would typically make an AJAX call to your backend
            // Example:
            /*
            fetch('/api/agreement/sign', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(agreementData)
            })
            .then(response => response.json())
            .then(data => {
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
            */
            
            // For demo purposes, we'll just show the success modal
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
            
            // Send email notification (this would be server-side in real app)
            const emailData = {
                to: 'admin@assurehold.com',
                subject: `New Agreement Signed - ${agreementData.transactionId}`,
                message: `User ${agreementData.userName} (${agreementData.userEmail}) has signed the escrow agreement for transaction ${agreementData.transactionId}.`
            };
            
            console.log('Email to admin:', emailData);
        });
    </script>
</body>
</html>

@include('user.footer')