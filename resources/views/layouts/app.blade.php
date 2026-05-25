<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nema Technologies - Portfolio & Services')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <h1>Nema Technologies</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="#about">À propos</a></li>
                <li><a href="#skills">Compétences</a></li>
                <li><a href="{{ route('projects.index') }}">Projets</a></li>
                <li><a href="#pricing">Tarifs</a></li>
                <li><a href="#testimonials">Témoignages</a></li>
                <li><a href="{{ route('contact.show') }}" class="btn-contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Nous contacter</h3>
                    <div class="social-links">
                        <a href="https://wa.me/22398408172" target="_blank">💬 WhatsApp</a>
                        <a href="mailto:dramanediaw9@gmail.com" target="_blank">📧 Email</a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Contact Direct</h3>
                    <p>📧 dramanediaw9@gmail.com</p>
                    <p>📱 +223 98 40 81 72</p>
                </div>
                <div class="footer-section">
                    <h3>Disponibilité</h3>
                    <p>Réponse en moins de 24h</p>
                    <p>Support permanent</p>
                </div>
            </div>
            <hr>
            <p class="footer-credit">&copy; 2026 Nema Technologies. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
