@extends('layouts.app')

@section('title', 'Contact - Mon Portfolio')

@section('content')
    <section class="section contact">
        <div class="container">
            <h1>Me contacter</h1>
            <p class="section-subtitle">Je suis disponible pour discuter de votre projet. Je réponds en moins de 24h.</p>
            
            <div class="contact-content">
                <!-- Formulaire -->
                <div class="contact-form-section">
                    <h2>Formulaire de contact</h2>

                    @if($errors->any())
                        <div class="alert alert-error">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="form">
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">Votre nom *</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                placeholder="Jean Dupont"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="email_or_phone">Email ou WhatsApp *</label>
                            <input 
                                type="text" 
                                id="email_or_phone" 
                                name="email_or_phone" 
                                value="{{ old('email_or_phone') }}"
                                placeholder="email@example.com ou +223 XX XX XX XX"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="message">Votre message *</label>
                            <textarea 
                                id="message" 
                                name="message" 
                                rows="6"
                                placeholder="Décrivez votre projet..."
                                required
                            >{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-large">Envoyer le message</button>
                    </form>
                </div>

                <!-- Infos Contact -->
                <div class="contact-info-section">
                    <h2>Coordonnées</h2>

                    <div class="contact-method">
                        <h3>📞 Téléphone / WhatsApp</h3>
                        <p><a href="https://wa.me/22376123456" target="_blank">+223 76 12 34 56</a></p>
                        <p class="small">Clic pour envoyer un message WhatsApp</p>
                    </div>

                    <div class="contact-method">
                        <h3>📧 Email</h3>
                        <p><a href="mailto:email@example.com">email@example.com</a></p>
                    </div>

                    <div class="contact-method">
                        <h3>📍 Localisation</h3>
                        <p>Bamako, Mali</p>
                    </div>

                    <div class="contact-method">
                        <h3>⏰ Disponibilité</h3>
                        <p>Lundi - Vendredi: 9h - 18h</p>
                        <p>Samedi: 10h - 16h</p>
                        <p>Réponse garantie en moins de 24h</p>
                    </div>

                    <div class="contact-method">
                        <h3>🔗 Réseaux sociaux</h3>
                        <div class="social-links">
                            <a href="https://linkedin.com" target="_blank">LinkedIn</a>
                            <a href="https://facebook.com" target="_blank">Facebook</a>
                            <a href="https://wa.me/22376123456" target="_blank">WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ rapide -->
    <section class="section faq">
        <div class="container">
            <h2>Questions fréquentes</h2>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <h3>Combien ça coûte ?</h3>
                    <p>Ça dépend de votre projet. Les forfaits vont de 150 000 FCFA à 500 000 FCFA. <a href="#pricing">Voir les tarifs</a></p>
                </div>

                <div class="faq-item">
                    <h3>Combien de temps ?</h3>
                    <p>Entre 2 et 5 semaines selon la complexité. Plus rapide si c'est urgent !</p>
                </div>

                <div class="faq-item">
                    <h3>Vous faites du support ?</h3>
                    <p>Oui ! Un mois de support inclus dans tous les forfaits, plus si besoin.</p>
                </div>

                <div class="faq-item">
                    <h3>Et après la livraison ?</h3>
                    <p>Je suis disponible pour les modifications et améliorations. Tarif d'entretien sur demande.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Confirmation avant envoi
        document.querySelector('form')?.addEventListener('submit', function(e) {
            if (!confirm('Êtes-vous sûr de votre message ?')) {
                e.preventDefault();
            }
        });
    </script>
@endsection
