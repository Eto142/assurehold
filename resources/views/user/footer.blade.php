   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile sidebar toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        mobileMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');
        });
        
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });
        
        // Close sidebar when clicking on a nav link (for mobile)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                }
            });
        });
        
        // Simulate progress bar animation
        window.addEventListener('load', function() {
            const progressBar = document.querySelector('.progress-bar-gold');
            if (progressBar) {
                setTimeout(() => {
                    progressBar.style.width = '65%';
                }, 300);
            }
        });
        
        // Add hover effect to dashboard cards
        document.querySelectorAll('.dashboard-card').forEach(card => {
            card.addEventListener('click', function(e) {
                // Check if the click was on a button inside the card
                if (e.target.closest('a.btn-gold, a.btn-outline-gold')) {
                    return; // Let the button handle the click
                }
                
                // Otherwise, find the primary button in the card and follow its link
                const primaryBtn = this.querySelector('.btn-gold') || this.querySelector('.btn-outline-gold');
                if (primaryBtn) {
                    window.location.href = primaryBtn.getAttribute('href');
                }
            });
        });
        
        // Notification badge click handler
        document.querySelectorAll('.notification-badge').forEach(badge => {
            badge.addEventListener('click', function(e) {
                e.stopPropagation();
                e.preventDefault();
                alert('You have pending notifications that require your attention!');
            });
        });
        
        // Responsive adjustments
        function handleResize() {
            if (window.innerWidth >= 992) {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            }
        }
        
        window.addEventListener('resize', handleResize);
        handleResize(); // Run on initial load
    </script>
</body>
</html>