@include('user.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | AssureHold</title>
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

        .profile-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .page-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--black-primary);
            margin-bottom: 0;
            background: linear-gradient(135deg, var(--black-primary), var(--gold-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .profile-card {
            background: var(--white-primary);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--gray-medium);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }

        .avatar-edit {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.5);
            color: white;
            text-align: center;
            padding: 0.5rem;
            font-size: 0.8rem;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .profile-avatar:hover .avatar-edit {
            opacity: 1;
        }

        .profile-info {
            flex: 1;
            min-width: 300px;
        }

        .profile-name {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--black-primary);
        }

        .profile-email {
            color: var(--gray-dark);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .profile-status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .profile-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-edit {
            background: var(--white-primary);
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background: rgba(184, 134, 11, 0.1);
        }

        .btn-verify {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-verify:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(184, 134, 11, 0.3);
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--black-primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 2px solid var(--gray-medium);
            padding-bottom: 0.5rem;
        }

        .section-title i {
            color: var(--gold-primary);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--gray-dark);
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-weight: 500;
            color: var(--black-primary);
            word-break: break-word;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-medium);
        }

        .password-section {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-medium);
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-actions {
                justify-content: center;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="page-header">
            <h1 class="page-title">My Profile</h1>
            <div class="profile-status">
                <i class="fas fa-check-circle"></i> Verified Account
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1) }}
                    <div class="avatar-edit">
                        <i class="fas fa-camera"></i> Update Photo
                    </div>
                </div>
                <div class="profile-info">
                    <h2 class="profile-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                    <div class="profile-email">
                        <i class="fas fa-envelope"></i> {{ Auth::user()->email }}
                    </div>
                    <div class="profile-actions">
                        <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-pencil-alt me-2"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>

            <!-- Personal Information Section -->
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="profile-section">
                    <h3 class="section-title">
                        <i class="fas fa-user"></i>
                        Personal Information
                    </h3>
                    
                    <div class="info-grid">
                        <div class="info-item form-group">
                            <label for="first_name" class="info-label">First Name</label>
                            <input type="text" class="form-control info-value" id="first_name" name="first_name" 
                                   value="{{ Auth::user()->first_name }}" required>
                        </div>
                        
                        <div class="info-item form-group">
                            <label for="last_name" class="info-label">Last Name</label>
                            <input type="text" class="form-control info-value" id="last_name" name="last_name" 
                                   value="{{ Auth::user()->last_name }}" required>
                        </div>
                        
                        <div class="info-item form-group">
                            <label for="email" class="info-label">Email Address</label>
                            <input type="email" class="form-control info-value" id="email" name="email" 
                                   value="{{ Auth::user()->email }}" required>
                        </div>
                        
                        <div class="info-item form-group">
                            <label for="phone" class="info-label">Phone Number</label>
                            <input type="tel" class="form-control info-value" id="phone" name="phone" 
                                   value="{{ Auth::user()->phone ?? '' }}">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn-verify">
                            <i class="fas fa-save me-2"></i> Save Changes
                        </button>
                    </div>
                </div>
            </form>

            <!-- Change Password Section -->
            <form action="{{ route('password.update') }}" method="POST" class="password-section">
                @csrf
                @method('PUT')
                
                <div class="profile-section">
                    <h3 class="section-title">
                        <i class="fas fa-lock"></i>
                        Change Password
                    </h3>
                    
                    <div class="info-grid">
                        <div class="info-item form-group">
                            <label for="current_password" class="info-label">Current Password</label>
                            <input type="password" class="form-control info-value" id="current_password" name="current_password" required>
                        </div>
                        
                        <div class="info-item form-group">
                            <label for="new_password" class="info-label">New Password</label>
                            <input type="password" class="form-control info-value" id="new_password" name="new_password" required>
                        </div>
                        
                        <div class="info-item form-group">
                            <label for="new_password_confirmation" class="info-label">Confirm New Password</label>
                            <input type="password" class="form-control info-value" id="new_password_confirmation" 
                                   name="new_password_confirmation" required>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn-verify">
                            <i class="fas fa-key me-2"></i> Change Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Avatar upload functionality
        document.querySelector('.avatar-edit').addEventListener('click', function() {
            // In a real app, this would trigger file upload
            alert('Profile photo upload functionality would appear here');
        });
    </script>
</body>
</html>

@include('user.footer')