@extends('layouts.app')

@section('title', $project->title . ' - Mon Portfolio')

@section('content')
    <section class="section project-detail">
        <div class="container">
            <a href="{{ route('projects.index') }}" class="back-link">← Retour aux projets</a>
            
            <div class="project-header">
                <h1>{{ $project->title }}</h1>
                <p class="client-type">{{ $project->client_type }}</p>
            </div>

            <div class="project-showcase">
                <div class="project-image-large">{{ $project->image_url ?? '🖼️ Aperçu du projet' }}</div>
            </div>

            <div class="project-details">
                <div class="detail-column">
                    <h2>À propos du projet</h2>
                    <p>{{ $project->description }}</p>

                    <h3>Que j'ai réalisé</h3>
                    <p>{{ $project->what_i_did }}</p>

                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank" class="btn btn-primary">Visiter le site</a>
                    @endif
                </div>

                <div class="detail-column">
                    <h3>Technologies utilisées</h3>
                    <div class="technologies-list">
                        @foreach($project->technologies ?? [] as $tech)
                            <div class="tech-item">{{ $tech }}</div>
                        @endforeach
                    </div>

                    <h3>Caractéristiques</h3>
                    <ul>
                        <li>✓ Design responsive</li>
                        <li>✓ Optimisé pour SEO</li>
                        <li>✓ Rapide et sécurisé</li>
                        <li>✓ Support après livraison</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section cta-project">
        <div class="container text-center">
            <h2>Intéressé par un projet similaire ?</h2>
            <p>Je peux créer quelque chose d'unique pour votre entreprise</p>
            <a href="{{ route('contact.show') }}" class="btn btn-primary">Demander un devis</a>
        </div>
    </section>
@endsection
