# 📸 Guide d'Intégration des Images - Nema Technologies

## 🎯 Images actuelles

Le portfolio utilise actuellement des images de **Unsplash** (service gratuit de photos professionnelles).

### Où trouver les images dans le code:

1. **Hero Section (Accueil)** - `resources/views/welcome.blade.php` ligne 18
2. **À Propos** - `resources/views/welcome.blade.php` ligne 45
3. **Projets** - Base de données (voir ci-dessous)

---

## 🔄 Comment changer les images

### Option 1: Utiliser des URLs externes (Easiest)

**Sources recommandées (gratuit):**
- [Unsplash.com](https://unsplash.com) - Photos professionnelles
- [Pexels.com](https://www.pexels.com) - Photos gratuites
- [Pixabay.com](https://pixabay.com) - Photos libres de droits

**Exemple de URL Unsplash:**
```
https://images.unsplash.com/photo-1460925895917-adf4e565db18?w=500&h=300&fit=crop
```

### Option 2: Changer la photo HERO (Accueil)

Éditez `resources/views/welcome.blade.php` ligne 18:

```blade
<!-- Avant -->
<img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=400&fit=crop" alt="Nema Technologies">

<!-- Après (remplacez par votre URL) -->
<img src="https://votre-nouvelle-url-image.com/photo.jpg" alt="Nema Technologies">
```

### Option 3: Changer la photo À PROPOS

Éditez `resources/views/welcome.blade.php` ligne 45:

```blade
<!-- Avant -->
<img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=400&fit=crop" alt="Nema Technologies Team">

<!-- Après (remplacez par votre URL) -->
<img src="https://votre-nouvelle-url-image.com/team.jpg" alt="Nema Technologies Team">
```

### Option 4: Changer les images des PROJETS

**Via la base de données (Recommandé):**

1. Allez dans le projet > trouvez les URLs des images
2. Éditez `update_project_images.php`:

```php
<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Project;

$projects = Project::all();

// Changer le 1er projet
if (count($projects) >= 1) {
    $projects[0]->update([
        'image_url' => 'https://votre-nouvelle-url-image-1.com/erp.jpg'
    ]);
}

// Changer le 2e projet
if (count($projects) >= 2) {
    $projects[1]->update([
        'image_url' => 'https://votre-nouvelle-url-image-2.com/website.jpg'
    ]);
}

echo "✅ Images mises à jour!\n";
?>
```

3. Exécutez:
```bash
cd c:\xampp\htdocs\sites creation\portfolio
php update_project_images.php
```

---

## 🖼️ Sources d'images gratuites recommandées

### Pour le portfolio général:
- **ERP/Dashboard**: https://unsplash.com/nquery=erp
- **Website/Web Design**: https://unsplash.com/nquery=web design
- **Team/Business**: https://unsplash.com/nquery=team business

### URLs Unsplash prêtes à utiliser:

```
# ERP / Dashboard
https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=300&fit=crop

# Web Design / Websites  
https://images.unsplash.com/photo-1460925895917-adf4e565db18?w=500&h=300&fit=crop

# Team / Business
https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=400&fit=crop

# Code / Development
https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=500&h=300&fit=crop

# Office / Professional
https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=300&fit=crop
```

---

## 📱 Télécharger et héberger vos images locales

### Si vous préférez héberger les images localement:

1. **Créez un dossier:**
   ```
   public/images/
   ```

2. **Téléchargez vos images dans ce dossier**

3. **Référencez-les dans le code:**
   ```blade
   <img src="{{ asset('images/votre-image.jpg') }}" alt="Description">
   ```

4. **Exemple complet:**
   ```blade
   <!-- resources/views/welcome.blade.php ligne 18 -->
   <img src="{{ asset('images/hero-photo.jpg') }}" alt="Nema Technologies" class="hero-photo">
   ```

---

## ✅ Bonnes pratiques

| Conseil | Détails |
|--------|---------|
| **Format** | JPG ou PNG |
| **Taille** | 100-500 KB (compresser si nécessaire) |
| **Dimensions** | Images quadratiques pour les profils (400x400px) |
| **Responsive** | Utiliser URLs Unsplash avec paramètres `?w=400&fit=crop` |
| **Alt text** | Toujours ajouter `alt="Description"` pour l'accessibilité |
| **Compression** | Utiliser [TinyPNG.com](https://tinypng.com) pour compresser |

---

## 🔗 Ressources utiles

- **Unsplash API**: https://unsplash.com/developers
- **Pexels API**: https://www.pexels.com/api/
- **Optimisation images**: https://tinypng.com
- **Compressor**: https://compressjpeg.com

---

## 🆘 Aide supplémentaire

Si vous avez besoin de:
- **Créer un logo**: Utilisez [Canva.com](https://canva.com)
- **Retoucher une image**: Utilisez [Photopea.com](https://photopea.com) (gratuit)
- **Trouver des icônes**: [FontAwesome.com](https://fontawesome.com) ou [Bootstrap Icons](https://icons.getbootstrap.com/)

---

**✅ Portfolio prêt avec les bonnes images = Plus professionnel! 🎨**
