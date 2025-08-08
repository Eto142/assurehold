
@include('user.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Payment | AssureHold International</title>
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
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gray-light);
            color: var(--black-primary);
        }

        .payment-container {
            max-width: 800px;
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

        .upload-section {
            margin: 2rem 0;
            padding: 1.5rem;
            border: 2px dashed var(--gray-medium);
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s ease;
            background: var(--gray-light);
        }

        .upload-section:hover {
            border-color: var(--gold-primary);
            background: rgba(184, 134, 11, 0.05);
        }

        .upload-icon {
            font-size: 2.5rem;
            color: var(--gold-primary);
            margin-bottom: 1rem;
        }

        .upload-text {
            margin-bottom: 1.5rem;
        }

        .upload-text h4 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .upload-text p {
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .file-input {
            display: none;
        }

        .file-label {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: white;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .file-label:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(184, 134, 11, 0.3);
        }

        .file-name {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: var(--gray-dark);
            display: none;
        }

        .preview-container {
            margin-top: 1.5rem;
            display: none;
        }

        .preview-image {
            max-width: 100%;
            max-height: 200px;
            border-radius: 6px;
            border: 1px solid var(--gray-medium);
            margin-bottom: 1rem;
        }

        .remove-file {
            color: var(--gold-primary);
            cursor: pointer;
            font-size: 0.9rem;
            display: inline-block;
            margin-top: 0.5rem;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(184, 134, 11, 0.3);
        }

        .submit-btn:disabled {
            background: var(--gray-medium);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
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

        .error-message {
            background-color: rgba(239, 68, 68, 0.1);
            color: #EF4444;
            border: 1px solid #EF4444;
        }

        @media (max-width: 768px) {
            .payment-container {
                margin: 1rem;
                padding: 1.5rem;
            }

            .payment-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="payment-container">
            <div class="payment-header">
                <h1 class="payment-title">Approve Payment</h1>
                <p class="payment-subtitle">Upload your payment proof to complete the transaction</p>
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

            <form action="{{ route('user.payment-proof.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="upload-section" id="uploadSection"> 
        <div class="upload-icon">
            <i class="fas fa-file-invoice-dollar"></i>
        </div>
        <div class="upload-text">
            <h4>Upload Payment Proof</h4>
            <p>Supported formats: JPG, PNG, PDF (Max file size: 5MB)</p>
        </div>

        <input type="file" id="fileInput" name="payment_proof" class="file-input" accept=".jpg,.jpeg,.png,.pdf" required>
        <label for="fileInput" class="file-label">Choose File</label>
        <div class="file-name" id="fileName"></div>

        <div class="preview-container" id="previewContainer" style="display:none;">
            <img src="" alt="Preview" class="preview-image" id="previewImage">
            <span class="remove-file" id="removeFile"><i class="fas fa-times"></i> Remove File</span>
        </div>
    </div>

    <button type="submit" class="submit-btn">Submit Payment Proof</button>
</form>




            <div class="status-message" id="successMessage">
                <i class="fas fa-check-circle"></i> Payment proof submitted successfully! Our team will verify your payment shortly.
            </div>

            <div class="status-message error-message" id="errorMessage">
                <i class="fas fa-exclamation-circle"></i> Error submitting payment proof. Please try again.
            </div>
        </div>
    </div>



    <script>

        document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');
    const fileName = document.getElementById('fileName');

    if (file) {
        fileName.textContent = file.name;
        if (file.type.startsWith('image/')) {
            previewImage.src = URL.createObjectURL(file);
            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
        }
    }
});

document.getElementById('removeFile').addEventListener('click', function() {
    document.getElementById('fileInput').value = '';
    document.getElementById('fileName').textContent = '';
    document.getElementById('previewContainer').style.display = 'none';
});

    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('fileInput');
            const fileName = document.getElementById('fileName');
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('previewImage');
            const removeFile = document.getElementById('removeFile');
            const submitBtn = document.getElementById('submitBtn');
            const uploadSection = document.getElementById('uploadSection');
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');

            // Handle file selection
            fileInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const validTypes = ['image/jpeg', 'image/png', 'application/pdf'];
                    const maxSize = 5 * 1024 * 1024; // 5MB

                    if (!validTypes.includes(file.type)) {
                        alert('Please select a valid file type (JPG, PNG, or PDF)');
                        return;
                    }

                    if (file.size > maxSize) {
                        alert('File size exceeds 5MB limit');
                        return;
                    }

                    // Display file name
                    fileName.textContent = `Selected: ${file.name}`;
                    fileName.style.display = 'block';

                    // Show preview for images
                    if (file.type.includes('image')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                            previewContainer.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    } else {
                        previewContainer.style.display = 'none';
                    }

                    // Enable submit button
                    submitBtn.disabled = false;
                    uploadSection.style.borderColor = 'var(--gold-primary)';
                }
            });

            // Remove file
            removeFile.addEventListener('click', function() {
                fileInput.value = '';
                fileName.style.display = 'none';
                previewContainer.style.display = 'none';
                submitBtn.disabled = true;
                uploadSection.style.borderColor = 'var(--gray-medium)';
            });

            // Submit payment proof
            submitBtn.addEventListener('click', function() {
                // Simulate form submission
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

                // This would be replaced with actual form submission
                setTimeout(function() {
                    // Simulate successful submission
                    successMessage.style.display = 'block';
                    errorMessage.style.display = 'none';
                    submitBtn.style.display = 'none';
                    
                    // Reset form after success
                    fileInput.value = '';
                    fileName.style.display = 'none';
                    previewContainer.style.display = 'none';
                    uploadSection.style.borderColor = 'var(--gray-medium)';
                    
                    // In a real implementation, you would redirect or show success message
                }, 2000);
            });
        });
    </script>
</body>
</html>

@include('user.footer')