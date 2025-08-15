@include('user.header')

@php
    $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | AssureHold</title>
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
            --success-color: #10B981;
            --danger-color: #EF4444;
            --border-radius: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--gray-light);
        }

        .profile-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .profile-card {
            background: var(--white-primary);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            height: 100%;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            background: var(--white-primary);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .summary-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--gray-medium);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--white-primary);
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
        }

        .summary-details h4 {
            margin: 0;
            font-weight: 600;
        }

        .summary-details p {
            margin: 0;
            color: var(--gray-dark);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 600;
            background: linear-gradient(135deg, var(--black-primary), var(--gold-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
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

        .btn-gold {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
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

<div class="profile-container">

    {{-- Summary Section --}}
    <div class="summary-card">
        <div class="summary-avatar">
            <i class="fas fa-user"></i>
        </div>
        <div class="summary-details">
            <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
            <p><i class="fas fa-envelope me-1"></i> {{ $user->email }}</p>
            <p><i class="fas fa-phone me-1"></i> {{ $user->phone ?? 'No phone number' }}</p>
        </div>
    </div>

    <div class="page-header text-center">
        <h1 class="page-title">My Profile</h1>
        <p>Manage your personal details and security settings</p>
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

    <div class="row g-4">
        {{-- Personal Information --}}
        <div class="col-lg-6 col-md-12">
            <div class="profile-card">
                <h3 class="mb-4"><i class="fas fa-user me-2"></i> Personal Information</h3>
                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>

                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>

                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>

                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">

                    <button type="submit" class="btn-gold">
                        <i class="fas fa-save me-2"></i> Update Information
                    </button>
                </form>
            </div>
        </div>

        {{-- Change Password --}}
        <div class="col-lg-6 col-md-12">
            <div class="profile-card">
                <h3 class="mb-4"><i class="fas fa-lock me-2"></i> Change Password</h3>
                <form action="{{ route('user.password.update') }}" method="POST">
                    @csrf
                    <label class="form-label">Current Password</label>
                    <input type="password" name="current_password" class="form-control" required>

                    <label class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control" required>

                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>

                    <button type="submit" class="btn-gold">
                        <i class="fas fa-key me-2"></i> Change Password
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@include('user.footer')
