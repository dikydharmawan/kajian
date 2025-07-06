<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Pendaftaran Volunter Pengajian Akbar Poliwangi 2025')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#16a34a">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-mosque me-2"></i>
                Volunter Kajian Akbar
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fas fa-home me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pendaftaran">
                            <i class="fas fa-user-plus me-1"></i>Pendaftaran
                        </a>
                    </li>
                </ul>
                @if(session('admin_verified'))
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-logout btn-sm">
                                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="mt-5 py-4" style="background: linear-gradient(90deg, #16a34a 0%, #38bdf8 100%); color: #fff;">
        <div class="container text-center">
            <div class="mb-2" style="font-size:1.1rem; font-weight:600; letter-spacing:0.5px;">
                Kontak Panitia (WhatsApp)
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3" style="font-size:1.05rem;">
                <span><i class="fab fa-whatsapp me-1"></i> Diky: <a href="https://wa.me/6283847105847" target="_blank" style="color:#fff;text-decoration:underline;">0838-4710-5847</a></span>
                <span><i class="fab fa-whatsapp me-1"></i> Hisom: <a href="https://wa.me/6285872672506" target="_blank" style="color:#fff;text-decoration:underline;">0858-7267-2506</a></span>
                <span><i class="fab fa-instagram me-1"></i> Instagram: <a href="https://instagram.com/imam_poliwangi" target="_blank" style="color: #fff;text-decoration:underline">imam_poliwangi</a></span>
            </div>
            <div class="mt-2" style="font-size:0.95rem; opacity:0.85;">&copy; 2025 Pengajian Akbar Poliwangi. All rights reserved.</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Popup Notification System -->
    <script>
        class PopupNotification {
            constructor() {
                this.container = this.createContainer();
                this.notifications = [];
            }

            createContainer() {
                const container = document.createElement('div');
                container.id = 'popup-container';
                container.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    z-index: 9999;
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                `;
                document.body.appendChild(container);
                return container;
            }

            show(message, type = 'info', duration = 5000) {
                const notification = this.createNotification(message, type);
                this.container.appendChild(notification);
                this.notifications.push(notification);

                // Auto remove after duration
                setTimeout(() => {
                    this.hide(notification);
                }, duration);

                return notification;
            }

            createNotification(message, type) {
                const notification = document.createElement('div');
                notification.className = `popup-notification popup-${type}`;
                
                const icon = this.getIcon(type);
                const title = this.getTitle(type);
                
                notification.innerHTML = `
                    <div class="popup-header">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <i class="${icon}" style="font-size: 1.1rem;"></i>
                            <strong style="font-size: 0.9rem;">${title}</strong>
                        </div>
                        <button class="popup-close" onclick="popupSystem.hide(this.parentElement.parentElement)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="popup-body">
                        ${message}
                    </div>
                `;

                return notification;
            }

            getIcon(type) {
                const icons = {
                    success: 'fas fa-check-circle',
                    info: 'fas fa-info-circle',
                    warning: 'fas fa-exclamation-triangle',
                    danger: 'fas fa-times-circle'
                };
                return icons[type] || icons.info;
            }

            getTitle(type) {
                const titles = {
                    success: 'Berhasil',
                    info: 'Informasi',
                    warning: 'Peringatan',
                    danger: 'Error'
                };
                return titles[type] || titles.info;
            }

            hide(notification) {
                if (notification) {
                    notification.classList.add('hide');
                    setTimeout(() => {
                        if (notification.parentElement) {
                            notification.parentElement.removeChild(notification);
                        }
                        this.notifications = this.notifications.filter(n => n !== notification);
                    }, 300);
                }
            }

            hideAll() {
                this.notifications.forEach(notification => {
                    this.hide(notification);
                });
            }
        }

        // Initialize popup system
        const popupSystem = new PopupNotification();

        // Convert existing alerts to popups
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const message = alert.textContent || alert.innerHTML;
                let type = 'info';
                
                if (alert.classList.contains('alert-success')) type = 'success';
                else if (alert.classList.contains('alert-danger')) type = 'danger';
                else if (alert.classList.contains('alert-warning')) type = 'warning';
                else if (alert.classList.contains('alert-info')) type = 'info';
                
                popupSystem.show(message, type);
                alert.remove();
            });
        });

        // Global function for showing popups
        function showPopup(message, type = 'info', duration = 5000) {
            return popupSystem.show(message, type, duration);
        }
    </script>
</body>
</html>