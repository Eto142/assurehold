@include('user.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Information | AssureHold</title>
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

        .bank-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .bank-card {
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

        .btn-link {
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

        .btn-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(184, 134, 11, 0.3);
        }

        .history-section {
            margin-top: 3rem;
        }

        .history-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--black-primary);
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--gold-primary);
            padding-bottom: 0.5rem;
        }

        .history-item {
            background: var(--white-primary);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border-left: 4px solid var(--gold-primary);
        }

        .history-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .bank-name {
            font-weight: 600;
            color: var(--black-primary);
        }

        .history-date {
            color: var(--gray-dark);
            font-size: 0.85rem;
        }

        .history-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .detail-item strong {
            display: block;
            font-size: 0.8rem;
            color: var(--gray-dark);
        }

        .detail-item span {
            font-size: 0.95rem;
        }

        .verification-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.5rem;
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .history-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="bank-container">
        <div class="page-header">
            <h1 class="page-title">Bank Information</h1>
            <p class="page-subtitle">Confirm your bank details to receive funds securely</p>
        </div>

        <div class="bank-card">
            <form id="bankForm">
                <h3 class="mb-4">Personal Information</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullName" class="form-label">Full Legal Name</label>
                        <input type="text" id="fullName" class="form-control" placeholder="As it appears on your bank account" required>
                    </div>
                    <div class="form-group">
                        <label for="idNumber" class="form-label">Government ID Number</label>
                        <input type="text" id="idNumber" class="form-control" placeholder="SSN, Tax ID, or other official ID" required>
                    </div>
                </div>

                <h3 class="mb-4 mt-4">Address Information</h3>
                
                <div class="form-group">
                    <label for="streetAddress" class="form-label">Street Address</label>
                    <input type="text" id="streetAddress" class="form-control" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="city" class="form-label">City</label>
                        <input type="text" id="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="state" class="form-label">State/Province</label>
                        <input type="text" id="state" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="zipCode" class="form-label">ZIP/Postal Code</label>
                        <input type="text" id="zipCode" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="country" class="form-label">Country</label>
                    <select id="country" class="form-control" required>
                        <option value="">Select Country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="UK">United Kingdom</option>
                        <!-- Add more countries as needed -->
                    </select>
                </div>

                <h3 class="mb-4 mt-4">Bank Account Details</h3>
                
                <div class="form-group">
                    <label for="bankName" class="form-label">Bank Name</label>
                    <input type="text" id="bankName" class="form-control" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="accountNumber" class="form-label">Account Number</label>
                        <input type="text" id="accountNumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="routingNumber" class="form-label">Routing Number</label>
                        <input type="text" id="routingNumber" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="swiftCode" class="form-label">SWIFT/BIC Code</label>
                    <input type="text" id="swiftCode" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="bankAddress" class="form-label">Bank Address</label>
                    <textarea id="bankAddress" class="form-control" rows="2" required></textarea>
                </div>
                
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="confirmAccuracy" required>
                    <label class="form-check-label" for="confirmAccuracy">
                        I confirm that all information provided is accurate
                    </label>
                </div>

                <button type="submit" class="btn-link">
                    <i class="fas fa-link me-2"></i> Link Bank Account
                </button>
            </form>
        </div>

        <!-- Submission History -->
        <div class="history-section">
            <h3 class="history-title">
                <i class="fas fa-history me-2"></i> Bank Information History
            </h3>
            
            <div class="history-item">
                <div class="history-header">
                    <span class="bank-name">Chase Bank <span class="verification-badge">Verified</span></span>
                    <span class="history-date">Linked on May 15, 2023</span>
                </div>
                <div class="history-details">
                    <div class="detail-item">
                        <strong>Account Holder</strong>
                        <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Account Number</strong>
                        <span>•••••••3456</span>
                    </div>
                    <div class="detail-item">
                        <strong>Routing Number</strong>
                        <span>•••••••789</span>
                    </div>
                    <div class="detail-item">
                        <strong>SWIFT Code</strong>
                        <span>CHASUS33</span>
                    </div>
                </div>
            </div>
            
            <div class="history-item">
                <div class="history-header">
                    <span class="bank-name">Bank of America</span>
                    <span class="history-date">Linked on January 10, 2023</span>
                </div>
                <div class="history-details">
                    <div class="detail-item">
                        <strong>Account Holder</strong>
                        <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Account Number</strong>
                        <span>•••••••8910</span>
                    </div>
                    <div class="detail-item">
                        <strong>Routing Number</strong>
                        <span>•••••••123</span>
                    </div>
                    <div class="detail-item">
                        <strong>SWIFT Code</strong>
                        <span>BOFAUS3N</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('bankForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const formData = {
                fullName: document.getElementById('fullName').value,
                idNumber: document.getElementById('idNumber').value,
                streetAddress: document.getElementById('streetAddress').value,
                city: document.getElementById('city').value,
                state: document.getElementById('state').value,
                zipCode: document.getElementById('zipCode').value,
                country: document.getElementById('country').value,
                bankName: document.getElementById('bankName').value,
                accountNumber: document.getElementById('accountNumber').value,
                routingNumber: document.getElementById('routingNumber').value,
                swiftCode: document.getElementById('swiftCode').value,
                bankAddress: document.getElementById('bankAddress').value
            };
            
            // In a real application, you would send this data to your backend
            console.log('Bank information submitted:', formData);
            
            // Here you would typically:
            // 1. Save the bank information to your database
            // 2. Initiate verification process
            // 3. Show success message
            
            alert('Your bank information has been submitted for verification. You will receive a confirmation email shortly.');
            
            // Reset form
            this.reset();
            
            // In a real app, you would refresh the history section or add the new entry
        });
    </script>
</body>
</html>
@include('user.footer')