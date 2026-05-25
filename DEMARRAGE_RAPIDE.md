# 🎯 DÉMARRAGE RAPIDE - Portfolio Laravel Bamako

## ⚡ En 3 étapes

### 1️⃣ Lancer le serveur
```bash
cd "c:\xampp\htdocs\sites creation\portfolio"
php artisan serve --host=127.0.0.1 --port=8000
```

Ou double-cliquez: `DEMARRER_SERVEUR.bat`

### 2️⃣ Ouvrir le site
Allez à: **http://127.0.0.1:8000**

### 3️⃣ Parcourir le site
- 🏠 **Accueil**: http://127.0.0.1:8000/
- 💼 **Projets**: http://127.0.0.1:8000/projects
- 📞 **Contact**: http://127.0.0.1:8000/contact

---

## 📁 Structure du Dossier

```
portfolio/
├── 📄 DEMARRER_SERVEUR.bat      ← Double-cliquez pour lancer!
├── 📄 TEST_PORTFOLIO.bat        ← Vérifier que tout fonctionne
├── 📄 COMMANDES_UTILES.md       ← Commandes PHP/Artisan
├── 📄 GUIDE.md                  ← Guide complet
│
├── app/                         ← Code PHP
│   ├── Http/Controllers/        ← Logique des pages
│   └── Models/                  ← Structure des données
│
├── resources/views/             ← Pages HTML (Blade)
│   ├── welcome.blade.php        ← Accueil
│   ├── contact.blade.php        ← Contact
│   └── projects/                ← Projets
│
├── public/                      ← Fichiers visibles publiquement
│   ├── css/style.css            ← Tous les styles
│   └── js/main.js               ← Interactions
│
├── database/
│   └── migrations/              ← Création des tables
│
├── .env                         ← Configuration (base de données, etc)
├── artisan                      ← CLI Laravel
└── composer.json                ← Dépendances
```

---

## 🛠️ Tâches Courantes

### ❓ "Je veux voir mes projets"
```bash
php artisan tinker
App\Models\Project::all()
```

### ➕ "Je veux ajouter un projet"
```bash
php artisan tinker

App\Models\Project::create([
    'title' => 'Mon Projet',
    'description' => 'Description courte',
    'client_type' => 'Restaurant',
    'technologies' => ['Laravel', 'MySQL'],
    'what_i_did' => 'Ce que j\'ai fait'
]);
```

### 🎨 "Je veux changer les couleurs"
Éditer: `public/css/style.css` (chercher `:root`)
```css
--primary-color: #667eea;      /* Bleu */
--secondary-color: #764ba2;    /* Violet */
```

### 📝 "Je veux modifier le texte de l'accueil"
Éditer: `resources/views/welcome.blade.php`

### 📞 "Je veux ajouter mon WhatsApp"
Éditer: `resources/views/layouts/app.blade.php`
Chercher: `wa.me/your_number` et remplacer par votre numéro

---

## ✅ Vérifier que tout fonctionne

```bash
php artisan tinker

# Voir les projets
App\Models\Project::count()      # Devrait afficher: 3

# Voir les témoignages
App\Models\Testimonial::count()  # Devrait afficher: 3

# Voir les tables
echo DB::select('SHOW TABLES;')
```

---

## 🚨 Si ça ne fonctionne pas

**Erreur: "php.exe" non trouvé**
- Vérifiez que XAMPP est installé
- Ajoutez PHP au PATH: `C:\xampp\php`

**Erreur: "Base de données non trouvée"**
```bash
# Créer la DB
php artisan migrate

# Ajouter les données de démo
php artisan tinker
App\Models\Project::create([...])
```

**Page blanche ou erreur 500**
```bash
# Voir les erreurs
tail -f storage/logs/laravel.log
```

---

## 📊 Points Clés du Portfolio

✅ **7 Sections**: Accueil, À propos, Compétences, Projets, Tarifs, Témoignages, Contact

✅ **Responsive**: Fonctionne sur mobile, tablette, desktop

✅ **Données dynamiques**: Projets et témoignages stockés en BD

✅ **Formulaire contact**: Messages sauvegardés automatiquement

✅ **Prêt pour production**: Optimisable et déployable

---

## 🚀 Prochaines étapes

1. ✅ Tester en local (actuellement en cours)
2. ⏭️ Personnaliser avec vos infos
3. ⏭️ Ajouter vos projets réels
4. ⏭️ Demander des avis clients
5. ⏭️ Déployer sur un serveur (voir DEPLOYMENT_GUIDE.md)

---

## 📞 Besoin d'aide ?

- 📖 Consultez: `GUIDE.md`
- 📋 Commandes: `COMMANDES_UTILES.md`
- 🚀 Déploiement: `DEPLOYMENT_GUIDE.md`

**Bon travail ! 🎉**
