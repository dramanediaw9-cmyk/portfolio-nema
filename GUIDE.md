# 📖 Guide du Portfolio Laravel - Bamako

Votre portfolio est prêt ! Voici comment l'utiliser et le personnaliser.

## 🚀 Démarrage

### Lancer le serveur
```bash
cd C:\xampp\htdocs\sites creation\portfolio
php artisan serve --host=127.0.0.1 --port=8000
```

Accédez à: **http://127.0.0.1:8000**

### Base de données
- **Base**: `portfolio_db`
- **Utilisateur**: `root` (sans mot de passe)
- **Tables**: projects, testimonials, contact_messages

## 📝 Sections du Site

### 1. **Accueil** `/`
- Hero section avec tagline
- Aperçu des derniers projets
- Tarifs rapides
- Section appel à l'action

### 2. **Projets** `/projects`
- Liste complète des projets
- Page détail pour chaque projet
- Technos utilisées

### 3. **Contact** `/contact`
- Formulaire de contact
- Intégration WhatsApp
- Coordonnées + réseaux sociaux
- FAQ

## 🛠️ Personnalisation

### Modifier les données

#### Ajouter un projet
```bash
php artisan tinker
```

```php
App\Models\Project::create([
    'title' => 'Mon Projet',
    'description' => 'Description',
    'client_type' => 'Type de client',
    'technologies' => ['Laravel', 'MySQL'],
    'image_url' => 'URL de l\'image',
    'project_url' => 'https://example.com',
    'what_i_did' => 'Ce que j\'ai réalisé'
]);
```

#### Ajouter un témoignage
```php
App\Models\Testimonial::create([
    'client_name' => 'Nom Client',
    'company_name' => 'Nom Entreprise',
    'testimonial_text' => 'Le avis du client',
    'rating' => 5
]);
```

### Modifier le texte

- **Navbar**: `resources/views/layouts/app.blade.php`
- **Accueil**: `resources/views/welcome.blade.php`
- **Contact**: `resources/views/contact.blade.php`
- **CSS**: `public/css/style.css`

### Ajouter votre WhatsApp

Dans `resources/views/layouts/app.blade.php`, cherchez `wa.me/your_number` et remplacez par votre numéro.

## 📊 Gérer les messages de contact

```bash
php artisan tinker
App\Models\ContactMessage::all()
```

## 🚀 Déploiement

Pointez le root du serveur vers `public/` et configurez votre domaine dans les variables d'environnement.

---

**Bon développement ! 🎉**
