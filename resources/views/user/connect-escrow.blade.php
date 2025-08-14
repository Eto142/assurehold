@include('user.header')
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

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session("error") }}',
        confirmButtonColor: '#d33'
    });
</script>
@endif


  <!-- Main Content -->
            <main class="main-content">
                <div class="connect-container">
                    <h1 class="connect-title">Connect with Escrow Attorney</h1>
                    <p class="connect-subtitle">Get professional legal guidance for your escrow transaction. Our certified attorney will contact you within 24 hours.</p>
                    

                   <form method="POST" action="{{ route('user.connect.attorney') }}">
                       @csrf
                       <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                       <button type="submit" class="connect-btn">
                           <i class="fas fa-paper-plane connect-icon"></i>
                           Connect Attorney Now
                       </button>
                   </form>

                </div>
            </main>
        </div>
    </div>

    <!-- Connect Modal -->
    <div class="modal fade" id="connectModal" tabindex="-1" aria-labelledby="connectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="connectModalLabel">Contact Escrow Attorney</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="attorneyContactForm">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Regarding my escrow transaction" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Describe your legal questions or concerns..." required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary)); border: none; padding: 0.75rem;">
                                <i class="fas fa-paper-plane me-2"></i> Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="success-message">
                        <div class="success-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3>Message Sent Successfully!</h3>
                        <p>Your message has been sent to our escrow attorney. You will receive a response at your registered email address within 24 hours.</p>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


















   <style>
        /* Your existing CSS variables and styles */
        :root {
            --gold-primary: #B8860B;
            --gold-secondary: #DAA520;
            --gold-light: #F4E4BC;
            --black-primary: #121826;
            --black-secondary: #1E293B;
            --white-primary: #FFFFFF;
            --gray-light: #f8f9fa;
            --gray-medium: #E2E8F0;
            --gray-dark: #64748B;
            --gray-text: #64748B;
            --success-color: #10B981;
            --warning-color: #F59E0B;
            --danger-color: #EF4444;
            --info-color: #3B82F6;
            --sidebar-width: 280px;
            --header-height: 80px;
            --transition-speed: 0.3s;
            --border-radius: 12px;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --elevation-1: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            --elevation-2: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.08);
            --elevation-3: 0 10px 25px rgba(0,0,0,0.1), 0 5px 10px rgba(0,0,0,0.05);
        }

        /* Your existing header and sidebar styles */
        
        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem;
            min-height: calc(100vh - var(--header-height));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .connect-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
        }

        .connect-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--black-primary);
            background: linear-gradient(135deg, var(--black-primary), var(--gold-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .connect-subtitle {
            color: var(--gray-text);
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 500px;
        }

        /* Fancy Connect Button */
        .connect-btn {
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
        }

        .connect-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(184, 134, 11, 0.4);
        }

        .connect-btn:active {
            transform: translateY(-2px);
        }

        .connect-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.5s;
        }

        .connect-btn:hover::before {
            left: 100%;
        }

        .connect-icon {
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .connect-btn:hover .connect-icon {
            transform: rotate(360deg);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--elevation-3);
        }

        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        .modal-title {
            font-weight: 600;
            color: var(--black-primary);
        }

        .modal-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--black-primary);
        }

        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid var(--gray-medium);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
        }

        .success-message {
            text-align: center;
            padding: 2rem;
        }

        .success-icon {
            font-size: 4rem;
            color: var(--success-color);
            margin-bottom: 1.5rem;
            animation: bounce 1s ease infinite alternate;
        }

        @keyframes bounce {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }
    </style>

    

    @include('user.footer')