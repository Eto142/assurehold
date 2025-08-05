 @include('user.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options | AssureHold International</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --gold-primary: #B8860B;
            --gold-secondary: #DAA520;
            --gold-light: #F4E4BC;
            --black-primary: #121826;
            --white-primary: #FFFFFF;
            --gray-light: #f8f9fa;
            --gray-medium: #E2E8F0;
            --gray-dark: #64748B;
            --success-color: #10B981;
            --info-color: #3B82F6;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gray-light);
            color: var(--black-primary);
        }

        .payment-container {
            max-width: 900px;
            margin: 2rem auto;
            background: var(--white-primary);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 2rem;
            border: 1px solid var(--gray-medium);
        }

        .payment-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-medium);
        }

        .payment-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--black-primary);
            margin-bottom: 0.5rem;
        }

        .payment-subtitle {
            color: var(--gray-dark);
            font-size: 1rem;
        }

        .payment-details {
            margin-bottom: 2rem;
            background: var(--gray-light);
            padding: 1.5rem;
            border-radius: 8px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--gray-medium);
        }

        .detail-row:last-child {
            border-bottom: none;
            font-weight: 600;
        }

        .detail-label {
            color: var(--gray-dark);
        }

        .detail-value {
            font-weight: 500;
        }

        .total-amount {
            color: var(--gold-primary);
            font-size: 1.25rem;
        }

        .payment-methods {
            margin: 2rem 0;
        }

        .method-tabs {
            display: flex;
            border-bottom: 1px solid var(--gray-medium);
            margin-bottom: 1.5rem;
        }

        .tab-btn {
            padding: 0.75rem 1.5rem;
            background: none;
            border: none;
            font-weight: 500;
            color: var(--gray-dark);
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            color: var(--gold-primary);
        }

        .tab-btn.active:after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--gold-primary);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .wallet-option {
            background: var(--white-primary);
            border: 1px solid var(--gray-medium);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .wallet-option:hover {
            border-color: var(--gold-primary);
            box-shadow: 0 4px 8px rgba(184, 134, 11, 0.1);
        }

        .wallet-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .wallet-icon {
            width: 40px;
            height: 40px;
            background: var(--gray-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--gold-primary);
            font-size: 1.25rem;
        }

        .wallet-name {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .wallet-address {
            background: var(--gray-light);
            padding: 1rem;
            border-radius: 6px;
            margin: 1rem 0;
            position: relative;
        }

        .address-text {
            font-family: monospace;
            word-break: break-all;
            font-size: 0.9rem;
        }

        .copy-btn {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: var(--gold-light);
            border: none;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            cursor: pointer;
            color: var(--gold-primary);
            transition: all 0.3s ease;
        }

        .copy-btn:hover {
            background: var(--gold-primary);
            color: white;
        }

        .wallet-info {
            font-size: 0.85rem;
            color: var(--gray-dark);
            margin-top: 0.5rem;
        }

        .qr-code {
            text-align: center;
            margin: 1rem 0;
        }

        .qr-code img {
            max-width: 200px;
            border: 1px solid var(--gray-medium);
            padding: 0.5rem;
            border-radius: 8px;
        }

        .payment-instructions {
            background: var(--gray-light);
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 2rem;
        }

        .instructions-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--black-primary);
        }

        .instructions-list {
            padding-left: 1.25rem;
        }

        .instructions-list li {
            margin-bottom: 0.5rem;
        }

        .status-message {
            margin-top: 1.5rem;
            padding: 1rem;
            border-radius: 6px;
            text-align: center;
            display: none;
        }

        .success-message {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
            border: 1px solid var(--success-color);
        }

        @media (max-width: 768px) {
            .payment-container {
                margin: 1rem;
                padding: 1.5rem;
            }

            .payment-title {
                font-size: 1.5rem;
            }

            .method-tabs {
                overflow-x: auto;
                white-space: nowrap;
                padding-bottom: 5px;
            }

            .tab-btn {
                padding: 0.75rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="payment-container">
            <div class="payment-header">
                <h1 class="payment-title">Payment Options</h1>
                <p class="payment-subtitle">Choose your preferred payment method to complete your transaction</p>
            </div>



            <div class="payment-methods">
                <div class="method-tabs">
                    <button class="tab-btn active" data-tab="crypto">Cryptocurrency</button>
                    {{-- <button class="tab-btn" data-tab="bank">Bank Transfer</button> --}}
                </div>

                <div class="tab-content active" id="crypto-tab">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Please send the exact amount in USD equivalent to avoid payment delays.
                    </div>

                    <div class="wallet-option">
                        <div class="wallet-header">
                            <div class="wallet-icon">
                                <i class="fab fa-bitcoin"></i>
                            </div>
                            <div class="wallet-name">Bitcoin (BTC)</div>
                        </div>
                        <div class="wallet-address">
                            <div class="address-text">bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdq</div>
                            <button class="copy-btn" data-address="bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdq">
                                <i class="far fa-copy"></i> Copy
                            </button>
                        </div>
                        <div class="qr-code">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=bitcoin:bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdq?amount=0.0425" alt="BTC QR Code">
                        </div>
                        <div class="wallet-info">
                            <p><strong>Amount:</strong> 0.0425 BTC ($1,250.00 USD equivalent)</p>
                            <p><i class="fas fa-exclamation-circle"></i> Network fee: Please include sufficient network fee for timely processing</p>
                        </div>
                    </div>

                    <div class="wallet-option">
                        <div class="wallet-header">
                            <div class="wallet-icon">
                                <i class="fab fa-ethereum"></i>
                            </div>
                            <div class="wallet-name">Ethereum (ETH)</div>
                        </div>
                        <div class="wallet-address">
                            <div class="address-text">0x71C7656EC7ab88b098defB751B7401B5f6d8976F</div>
                            <button class="copy-btn" data-address="0x71C7656EC7ab88b098defB751B7401B5f6d8976F">
                                <i class="far fa-copy"></i> Copy
                            </button>
                        </div>
                        <div class="qr-code">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=ethereum:0x71C7656EC7ab88b098defB751B7401B5f6d8976F?amount=0.78" alt="ETH QR Code">
                        </div>
                        <div class="wallet-info">
                            <p><strong>Amount:</strong> 0.78 ETH ($1,250.00 USD equivalent)</p>
                            <p><i class="fas fa-exclamation-circle"></i> ERC-20 tokens also accepted at this address</p>
                        </div>
                    </div>

                    <div class="wallet-option">
                        <div class="wallet-header">
                            <div class="wallet-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="wallet-name">USDT (Tether)</div>
                        </div>
                        <div class="wallet-address">
                            <div class="address-text">TNPeeaaQ7f6guowZ7ziFj3Kk5XmJSRMdkF</div>
                            <button class="copy-btn" data-address="TNPeeaaQ7f6guowZ7ziFj3Kk5XmJSRMdkF">
                                <i class="far fa-copy"></i> Copy
                            </button>
                        </div>
                        <div class="qr-code">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=TNPeeaaQ7f6guowZ7ziFj3Kk5XmJSRMdkF" alt="USDT QR Code">
                        </div>
                        <div class="wallet-info">
                            <p><strong>Amount:</strong> 1250.00 USDT (TRC20 or ERC20)</p>
                            <p><i class="fas fa-exclamation-circle"></i> Please ensure you send via the correct network</p>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="bank-tab">
                    <div class="wallet-option">
                        <div class="wallet-header">
                            <div class="wallet-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="wallet-name">Bank Transfer (SWIFT)</div>
                        </div>
                        <div class="wallet-info">
                            <p><strong>Bank Name:</strong> International Commerce Bank</p>
                            <p><strong>Account Name:</strong> AssureHold International, Inc.</p>
                            <p><strong>Account Number:</strong> 9876543210</p>
                            <p><strong>SWIFT/BIC:</strong> ICBKUS33</p>
                            <p><strong>Routing Number:</strong> 026009593</p>
                            <p><strong>Bank Address:</strong> 456 Financial District, New York, NY 10005, USA</p>
                            <p><strong>Reference:</strong> AH-2023-08-1567</p>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="card-tab">
                    <div class="wallet-option">
                        <div class="wallet-header">
                            <div class="wallet-icon">
                                <i class="far fa-credit-card"></i>
                            </div>
                            <div class="wallet-name">Credit/Debit Card</div>
                        </div>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> Credit card payments incur a 3.5% processing fee.
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" style="background: var(--gold-primary); border: none; padding: 0.75rem 2rem;">
                                <i class="fas fa-lock"></i> Secure Payment Portal
                            </button>
                            <p class="mt-2 text-muted">You will be redirected to our secure payment processor</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="payment-instructions">
                <h5 class="instructions-title"><i class="fas fa-list-ol"></i> Payment Instructions</h5>
                <ol class="instructions-list">
                    <li>Send the exact amount shown to the provided wallet address</li>
                    <li>Include the Transaction ID in the payment memo/reference when possible</li>
                    <li>After making payment, upload your payment proof on the next screen</li>
                    <li>Payments typically take 10-30 minutes to confirm (crypto) or 1-3 business days (bank transfer)</li>
                    <li>You will receive a payment confirmation email once processed</li>
                </ol>
            </div>

            <div class="status-message success-message" id="copySuccessMessage">
                <i class="fas fa-check-circle"></i> Wallet address copied to clipboard!
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab functionality
            const tabBtns = document.querySelectorAll('.tab-btn');
            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all tabs
                    tabBtns.forEach(b => b.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    const tabId = this.getAttribute('data-tab') + '-tab';
                    document.getElementById(tabId).classList.add('active');
                });
            });

            // Copy wallet address functionality
            const copyBtns = document.querySelectorAll('.copy-btn');
            const copySuccessMessage = document.getElementById('copySuccessMessage');
            
            copyBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const address = this.getAttribute('data-address');
                    navigator.clipboard.writeText(address).then(() => {
                        // Show success message
                        copySuccessMessage.style.display = 'block';
                        setTimeout(() => {
                            copySuccessMessage.style.display = 'none';
                        }, 3000);
                    });
                });
            });
        });
    </script>
</body>
</html>
 @include('user.footer')