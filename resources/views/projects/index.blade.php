@extends('layouts.app')

@section('title', 'Mes Projets - Portfolio')

@section('content')
    <section class="section projects-full">
        <div class="container">
            <h1>Mes Projets</h1>
            <p class="section-subtitle">Découvrez les sites que j'ai créés pour diverses entreprises</p>
            
            <div class="projects-grid">
                @forelse($projects as $project)
                    <div class="project-card">
                        <div class="project-image">{{ $project->image_url ?? '🖼️' }}</div>
                        <div class="project-info">
                            <h3>{{ $project->title }}</h3>
                            <p class="client-type">{{ $project->client_type }}</p>
                            <p>{{ $project->description }}</p>
                            <div class="technologies">
                                @foreach($project->technologies ?? [] as $tech)
                                    <span class="tech-badge">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">Voir le détail</a>
                        </div>
                    </div>
                @empty
                    <p>Aucun projet disponible pour le moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section cta-projects">
        <div class="container text-center">
            <h2>Vous avez un projet en tête ?</h2>
            <p>Contactez-moi pour en discuter</p>
            <a href="{{ route('contact.show') }}" class="btn btn-primary">Demander un devis</a>
        </div>
    </section>
@endsection
