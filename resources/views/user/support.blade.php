@include('user.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support | AssureHold</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            --border-radius: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--gray-light);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 600;
            background: linear-gradient(135deg, var(--black-primary), var(--gold-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .info-box {
            background: var(--gray-light);
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            text-align: center;
            margin-bottom: 1rem;
        }

        .info-box i {
            font-size: 1.5rem;
            color: var(--gold-primary);
            margin-bottom: 0.5rem;
        }

        .support-card {
            background: var(--white-primary);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            height: 100%;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border: 1px solid var(--gray-medium);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(184, 134, 11, 0.3);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="page-title">Support</h1>
        <p class="text-muted">Get in touch with us for assistance</p>
    </div>

    <div class="row g-4">
        <!-- Left Column: Support Info -->
        <div class="col-lg-4">
            <div class="info-box">
                <i class="fas fa-envelope"></i>
                <p class="fw-bold">Email</p>
                <p>info@assurehold.com</p>
            </div>
            <div class="info-box">
                <i class="fas fa-clock"></i>
                <p class="fw-bold">Response Time</p>
                <p>Within 24 hours</p>
            </div>
        </div>

        <!-- Right Column: Form -->
        <div class="col-lg-8">
            <div class="support-card">
                <form action="{{ route('user.support.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter your subject" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Describe your issue..." required></textarea>
                    </div>
                    <button type="submit" class="btn-gold">
                        <i class="fas fa-paper-plane me-2"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@include('user.footer')
