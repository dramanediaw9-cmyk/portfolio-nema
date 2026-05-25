@extends('layouts.app')

@section('title', 'Nema Technologies - Portfolio & Services')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content">
            <div class="hero-text">
                <h2>Bienvenue chez Nema Technologies</h2>
                <p class="tagline">Solutions numériques professionnelles pour transformer votre entreprise</p>
                <div class="hero-buttons">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">Voir nos projets</a>
                    <a href="{{ route('contact.show') }}" class="btn btn-secondary">Nous contacter</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=400&fit=crop" alt="Nema Technologies" class="hero-photo">
            </div>
        </div>
    </section>

    <!-- À Propos Section -->
    <section id="about" class="section about">
        <div class="container">
            <h2>À propos de Nema Technologies</h2>
            <div class="about-content">
                <div class="about-text">
                    <h3>Qui sommes-nous ?</h3>
                    <p>Nema Technologies est une agence digitale basée à Bamako, Mali. Nous créons des solutions web innovantes et adaptées aux besoins spécifiques des entreprises locales et africaines.</p>
                    
                    <h3>Ce que nous faisons</h3>
                    <p>Nous spécialisons dans <strong>le développement web, les applications web, et le e-commerce</strong> avec les technologies les plus modernes: PHP, Laravel, MySQL, HTML/CSS, JavaScript. Nous créons des sites vitrines, des applications métier et des e-commerce performants.</p>
                    
                    <h3>Nos forces</h3>
                    <ul>
                        <li>✓ Équipe réactive et disponible</li>
                        <li>✓ Prix compétitifs adaptés au marché local</li>
                        <li>✓ Expertise profonde du marché malien</li>
                        <li>✓ Support technique après livraison</li>
                        <li>✓ Solutions évolutives et maintenables</li>
                    </ul>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=400&fit=crop" alt="Nema Technologies Team" class="about-photo">
                </div>
            </div>
        </div>
    </section>

    <!-- Compétences Section -->
    <section id="skills" class="section skills">
        <div class="container">
            <h2>Nos compétences</h2>
            
            <div class="skills-grid">
                <div class="skill-category">
                    <h3>Langages & Frameworks</h3>
                    <div class="badge-group">
                        <span class="badge">PHP</span>
                        <span class="badge">Laravel</span>
                        <span class="badge">JavaScript</span>
                        <span class="badge">HTML/CSS</span>
                        <span class="badge">React</span>
                    </div>
                </div>

                <div class="skill-category">
                    <h3>Bases de données & Outils</h3>
                    <div class="badge-group">
                        <span class="badge">MySQL</span>
                        <span class="badge">PostgreSQL</span>
                        <span class="badge">Git</span>
                        <span class="badge">Docker</span>
                        <span class="badge">AWS</span>
                    </div>
                </div>

                <div class="skill-category">
                    <h3>Services</h3>
                    <div class="badge-group">
                        <span class="badge">Sites Vitrines</span>
                        <span class="badge">E-Commerce</span>
                        <span class="badge">Applications Web</span>
                        <span class="badge">Maintenance</span>
                        <span class="badge">Consulting</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projets Section -->
    <section class="section projects-preview">
        <div class="container">
            <h2>Nos derniers projets</h2>
            <div class="projects-grid">
                @forelse($projects as $project)
                    <div class="project-card">
                        <div class="project-image">
                            @if(str_starts_with($project->image_url, 'http'))
                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="project-img">
                            @else
                                <div class="placeholder-image">{{ $project->image_url }}</div>
                            @endif
                        </div>
                        <div class="project-info">
                            <h3>{{ $project->title }}</h3>
                            <p class="client-type">{{ $project->client_type }}</p>
                            <p>{{ Str::limit($project->description, 80) }}</p>
                            <div class="technologies">
                                @foreach($project->technologies ?? [] as $tech)
                                    <span class="tech-badge">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('projects.show', $project->id) }}" class="link-more">Voir plus →</a>
                        </div>
                    </div>
                @empty
                    <p>Aucun projet pour le moment.</p>
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{ route('projects.index') }}" class="btn btn-primary">Voir tous nos projets</a>
            </div>
        </div>
    </section>

    <!-- Tarifs Section -->
    <section id="pricing" class="section pricing">
        <div class="container">
            <h2>Nos tarifs</h2>
            <p class="pricing-intro">Choisissez la formule qui correspond à vos besoins</p>
            
            <div class="pricing-grid">
                <!-- Forfait Basique -->
                <div class="pricing-card">
                    <h3>Site Vitrine</h3>
                    <p class="price">À partir de 150 000 FCFA</p>
                    <ul>
                        <li>✓ Site vitrine professionnel (5-10 pages)</li>
                        <li>✓ Responsive design</li>
                        <li>✓ Formulaire de contact</li>
                        <li>✓ SEO optimisé</li>
                        <li>✓ Hosting 1 an</li>
                    </ul>
                    <p class="delivery">⏱️ Livraison: 2 semaines</p>
                    <a href="{{ route('contact.show') }}" class="btn btn-secondary">Demander un devis</a>
                </div>

                <!-- Forfait Standard -->
                <div class="pricing-card featured">
                    <div class="badge-featured">Populaire</div>
                    <h3>Site + Blog/Portfolio</h3>
                    <p class="price">À partir de 300 000 FCFA</p>
                    <ul>
                        <li>✓ Site professionnel + Blog</li>
                        <li>✓ Galerie & Portfolio</li>
                        <li>✓ Formulaires avancés</li>
                        <li>✓ SEO avancé + Analytics</li>
                        <li>✓ Support 3 mois</li>
                    </ul>
                    <p class="delivery">⏱️ Livraison: 3 semaines</p>
                    <a href="{{ route('contact.show') }}" class="btn btn-primary">Demander un devis</a>
                </div>

                <!-- Forfait Premium -->
                <div class="pricing-card">
                    <h3>E-Commerce Complet</h3>
                    <p class="price">À partir de 500 000 FCFA</p>
                    <ul>
                        <li>✓ E-commerce avec panier</li>
                        <li>✓ Paiement en ligne sécurisé</li>
                        <li>✓ Gestion stock automatisée</li>
                        <li>✓ Analytics & Rapports</li>
                        <li>✓ Support 6 mois</li>
                    </ul>
                    <p class="delivery">⏱️ Livraison: 4-5 semaines</p>
                    <a href="{{ route('contact.show') }}" class="btn btn-secondary">Demander un devis</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages Section -->
    <section id="testimonials" class="section testimonials">
        <div class="container">
            <h2>Ce que nos clients disent de nous</h2>
            <div class="testimonials-grid">
                @forelse($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <div class="stars">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                ⭐
                            @endfor
                        </div>
                        <p class="testimonial-text">"{{ $testimonial->testimonial_text }}"</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">{{ $testimonial->client_photo ?? '👤' }}</div>
                            <div>
                                <p class="author-name">{{ $testimonial->client_name }}</p>
                                <p class="author-company">{{ $testimonial->company_name }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Les témoignages apparaîtront bientôt.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="section cta-final">
        <div class="container text-center">
            <h2>Prêt à transformer votre entreprise numériquement ?</h2>
            <p>Contactez Nema Technologies aujourd'hui pour discuter de votre projet</p>
            <a href="{{ route('contact.show') }}" class="btn btn-primary btn-large">Envoyer un message</a>
            <p class="whatsapp-link">
                <a href="https://wa.me/22398408172" target="_blank">💬 Écrivez-nous sur WhatsApp</a>
            </p>
        </div>
    </section>
@endsection
