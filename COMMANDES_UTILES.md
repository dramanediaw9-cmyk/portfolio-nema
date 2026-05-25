# 📋 Commandes Utiles - Portfolio Laravel

## 🚀 Serveur & Développement

```bash
# Lancer le serveur de développement
php artisan serve --host=127.0.0.1 --port=8000

# Accéder au site
http://127.0.0.1:8000

# Ouvrir la console interactive
php artisan tinker
```

## 🗄️ Base de Données

```bash
# Voir la structure des tables
php artisan migrate:status

# Relancer les migrations (attention: données perdues!)
php artisan migrate:refresh

# Relancer avec données de démo
php artisan migrate:refresh --seed

# Voir les données
php artisan tinker
> App\Models\Project::all()
> App\Models\Testimonial::all()
> App\Models\ContactMessage::all()
```

## 📝 Gestion des Données

### Ajouter un projet

```bash
php artisan tinker

App\Models\Project::create([
    'title' => 'Mon Projet',
    'description' => 'Description du projet',
    'client_type' => 'Type de client',
    'technologies' => ['Laravel', 'MySQL', 'Vue.js'],
    'image_url' => 'https://example.com/image.jpg',
    'project_url' => 'https://example.com',
    'what_i_did' => 'Ce que j\'ai réalisé pour ce projet'
]);
```

### Ajouter un témoignage

```bash
App\Models\Testimonial::create([
    'client_name' => 'Nom du Client',
    'company_name' => 'Nom de l\'Entreprise',
    'testimonial_text' => 'Avis du client...',
    'rating' => 5,
    'client_photo' => '📸'
]);
```

### Voir les messages de contact

```bash
App\Models\ContactMessage::all()

# Marquer comme répondu
App\Models\ContactMessage::find(1)->update(['status' => 'responded']);

# Supprimer
App\Models\ContactMessage::find(1)->delete();
```

## 🔧 Configuration

### Modifier les variables d'environnement

Éditer `.env`:

```env
APP_NAME=Mon Portfolio
APP_URL=http://127.0.0.1:8000
DB_DATABASE=portfolio_db
```

Puis:
```bash
php artisan config:cache
```

## 🎨 Frontend

### Modifier les styles

Éditer `public/css/style.css`:
- Variables couleur: `:root { --primary-color: #667eea; }`
- Responsive breakpoints: `@media (max-width: 768px)`

### Modifier les templates

Éditer dans `resources/views/`:
- `welcome.blade.php` - Accueil
- `contact.blade.php` - Contact
- `projects/` - Pages projets
- `layouts/app.blade.php` - Layout global

### Recompiler les assets (si vous utilisez un bundler)

```bash
npm install
npm run dev      # Développement
npm run build    # Production
```

## 🧪 Tests

```bash
# Tests automatisés (si configurés)
php artisan test

# Vérifier la syntaxe
php ./vendor/bin/pint

# Linter statique
php ./vendor/bin/phpstan
```

## 🚀 Production

```bash
# Optimisation
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Nettoyage des caches
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Vérifier les erreurs en production
tail -f storage/logs/laravel.log
```

## 🐛 Déboguer

```bash
# Voir les logs
tail -f storage/logs/laravel.log

# Activer le debug (attention: ne pas en production!)
# Dans .env: APP_DEBUG=true

# Tinker shell pour tester
php artisan tinker

# Vérifier les routes
php artisan route:list

# Voir la configuration active
php artisan config:show
```

## 📦 Dépendances

```bash
# Installer les dépendances
composer install

# Mettre à jour les dépendances
composer update

# Vérifier la sécurité
composer audit

# Voir l'arborescence des dépendances
composer show
```

## 🔐 Sécurité

```bash
# Générer une nouvelle clé d'app (APP_KEY)
php artisan key:generate

# Vérifier les vulnérabilités
composer audit

# Nettoyer les sessions expirées
php artisan session:clean
```

## 🗑️ Maintenance

```bash
# Mettre en maintenance
php artisan down

# Sortir de maintenance
php artisan up

# Nettoyer les fichiers temporaires
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```

## 💾 Backup & Restore

```bash
# Backup de la base de données
mysqldump -u root portfolio_db > backup_$(date +%Y%m%d_%H%M%S).sql

# Restaurer une sauvegarde
mysql -u root portfolio_db < backup_20260525_120000.sql
```

---

**Besoin d'aide ? Consultez la documentation Laravel: https://laravel.com/docs**
