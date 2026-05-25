# 📖 GUIDE DE DÉPLOIEMENT COMPLET - Nema Technologies

## 🎯 Vue d'ensemble

Ce guide vous aide à déployer votre portfolio Laravel en production sur un hébergement partagé.

---

## 📋 AVANT DE COMMENCER

### Vérifiez que vous avez:

- [ ] Hébergement acheté (uPHOST, Hostinger, etc.)
- [ ] Accès FTP/SFTP (identifiants)
- [ ] Accès cPanel ou similaire
- [ ] Domaine acheté et pointé vers l'hébergement
- [ ] PHP 8.2+ disponible sur le serveur
- [ ] MySQL/MariaDB disponible
- [ ] Composer installé sur le serveur

---

## 🚀 ÉTAPE 1: Préparation du Code

### 1.1 Créer la configuration de production

Créez un fichier `.env.production` basé sur `.env`:

```bash
# Fichier: .env.production

APP_NAME="Nema Technologies"
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://votre-domaine.ml

# Database
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nema_portfolio_prod
DB_USERNAME=nema_user
DB_PASSWORD=VotreMotDePasseSecurisé123!

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=mail.votre-domaine.ml
MAIL_PORT=587
MAIL_USERNAME=noreply@votre-domaine.ml
MAIL_PASSWORD=VotreMotDePasseEmail
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=dramanediaw9@gmail.com
MAIL_FROM_NAME="Nema Technologies"

# Cache & Session
CACHE_STORE=file
SESSION_DRIVER=database
SESSION_LIFETIME=120

# Other
QUEUE_CONNECTION=database
```

### 1.2 Générer l'APP_KEY

Localement, générez une clé de production:

```bash
php artisan key:generate --show
# Copier la clé et la mettre dans APP_KEY du .env.production
```

---

## 📤 ÉTAPE 2: Upload sur le Serveur

### 2.1 Via FTP (Méthode simple)

**Outils recommandés:**
- FileZilla (gratuit, user-friendly)
- WinSCP (Windows)
- Cyberduck (Mac)

**Étapes:**

1. **Connectez-vous au serveur FTP**
   ```
   Host: ftp.votre-domaine.ml
   Username: identifiant FTP
   Password: mot de passe FTP
   ```

2. **Naviguez jusqu'à public_html ou www**

3. **Téléchargez le dossier portfolio:**
   ```
   ├── public_html/
   │   ├── app/
   │   ├── resources/
   │   ├── routes/
   │   ├── public/    ← Les fichiers CSS/JS vont ici
   │   ├── index.php  ← Point d'entrée
   │   └── ...
   ```

⚠️ **Important:** Uploadez TOUT sauf:
- `node_modules/` (trop volumineux)
- `.git/` (sensible)
- `storage/logs/*` (créé automatiquement)
- `.env` (créer directement sur serveur)

### 2.2 Optionnel: Compression pour upload rapide

```bash
# Sur votre ordinateur local
zip -r portfolio.zip . -x "node_modules/*" ".git/*" "storage/logs/*"

# Upload portfolio.zip via FTP
# Sur le serveur, extrayez:
unzip portfolio.zip
```

---

## ⚙️ ÉTAPE 3: Configuration sur le Serveur

### 3.1 Accès au serveur via SSH/Terminal

```bash
ssh username@votre-domaine.ml
cd public_html/portfolio
```

### 3.2 Créer le fichier .env

```bash
# Sur le serveur, créer .env avec vos infos
nano .env
# ou
vi .env
```

Collez le contenu `.env.production` modifié.

### 3.3 Installer les dépendances

```bash
# Sur le serveur
cd public_html/portfolio

# Installer Composer (si pas encore installé)
curl -sS https://getcomposer.org/installer | php
php composer.phar install --no-dev --optimize-autoloader

# Ou si Composer est global
composer install --no-dev --optimize-autoloader
```

### 3.4 Définir les permissions

```bash
# Permissions pour les dossiers
chmod -R 755 public/
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# Permissions pour les fichiers
find . -type f -exec chmod 644 {} \;
```

### 3.5 Générer la clé APP

```bash
php artisan key:generate
# Ou copiez manuellement dans .env
```

---

## 🗄️ ÉTAPE 4: Configuration Base de Données

### 4.1 Créer la base de données via cPanel

1. Allez dans **cPanel** → **MySQL Databases**
2. Créez une nouvelle base: `nema_portfolio_prod`
3. Créez un utilisateur: `nema_user`
4. Assignez l'utilisateur à la base avec **ALL privileges**

### 4.2 Migrer les tables

```bash
# Sur le serveur
cd public_html/portfolio

# Exécuter les migrations
php artisan migrate --force
```

### 4.3 Ajouter les données initiales (optionnel)

```bash
# Sur le serveur
php artisan tinker

# Puis exécutez:
Project::create([
    'title' => 'ERP de Gestion d\'Entreprise',
    'description' => 'Système complet...',
    'client_type' => 'PME Bamako',
    'technologies' => ['Laravel', 'MySQL', 'JavaScript', 'Bootstrap'],
    'image_url' => 'https://images.unsplash.com/...',
    'what_i_did' => 'Développement complet...',
    'project_url' => '#',
]);

# Exit tinker
exit()
```

---

## 🌐 ÉTAPE 5: Configuration du Domaine

### 5.1 Pointer le domaine vers le serveur

Dans votre registraire de domaines (Namecheap, GoDaddy):

1. Allez à **DNS Settings**
2. Modifiez les enregistrements A:
   ```
   Type: A
   Host: @
   Value: IP_DU_SERVEUR
   ```

3. Modifiez pour www aussi:
   ```
   Type: A
   Host: www
   Value: IP_DU_SERVEUR
   ```

### 5.2 Attendre la propagation DNS

- Peut prendre 24h (généralement 1-2h)
- Vérifiez: https://www.whatsmydns.net/

---

## 🔒 ÉTAPE 6: Configurer HTTPS/SSL

### 6.1 Activez Let's Encrypt gratuitement

Via **cPanel**:

1. Allez à **AutoSSL**
2. Cliquez **Run AutoSSL** pour votre domaine
3. Attendez 5-10 minutes

### 6.2 Forcer HTTPS dans Laravel

Modifiez `config/app.php`:

```php
'url' => env('APP_URL', 'https://votre-domaine.ml'),
'asset_url' => env('ASSET_URL', 'https://votre-domaine.ml'),
```

Et dans `.env`:
```
APP_URL=https://votre-domaine.ml
```

---

## ⚡ ÉTAPE 7: Optimisations Performance

### 7.1 Cache de configuration

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7.2 Compression d'assets

```bash
php artisan asset:publish
php artisan optimize:clear
```

### 7.3 Activer Gzip sur le serveur

Créez/modifiez `.htaccess` dans `public/`:

```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE text/javascript
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/json
</IfModule>
```

---

## 🧪 ÉTAPE 8: Tests en Production

### 8.1 Testez l'accès

```
https://votre-domaine.ml
https://votre-domaine.ml/projects
https://votre-domaine.ml/contact
```

### 8.2 Vérifiez les logs d'erreur

```bash
# Sur le serveur
tail -f storage/logs/laravel.log
```

### 8.3 Test de formulaire de contact

1. Allez à `/contact`
2. Remplissez et soumettez
3. Vérifiez que le message est sauvegardé

---

## 📞 ÉTAPE 9: Configuration Email

### 9.1 Avec Gmail SMTP

Dans `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@gmail.com
MAIL_PASSWORD=votre-mot-de-passe-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=votre-email@gmail.com
```

⚠️ Générez un [mot de passe d'application Gmail](https://support.google.com/accounts/answer/185833)

### 9.2 Avec domaine personnalisé

Demandez au support de l'hébergement de configurer un compte mail.

---

## 🔄 ÉTAPE 10: Sauvegardes Automatiques

### 10.1 Configurer des sauvegardes

Via **cPanel**:
1. Allez à **Backups**
2. Configurez sauvegardes automatiques (quotidienne recommandée)

### 10.2 Sauvegarder localement la base de données

```bash
# Depuis votre ordinateur
mysqldump -h votre-serveur -u nema_user -p nema_portfolio_prod > backup.sql
```

---

## ✅ Checklist de Déploiement

```
Préparation:
- [ ] .env production configuré
- [ ] APP_KEY généré
- [ ] Code uploadé

Base de données:
- [ ] Base créée sur serveur
- [ ] Utilisateur créé
- [ ] Migrations exécutées
- [ ] Données initiales ajoutées

Configuration:
- [ ] Permissions correctes (755/644)
- [ ] .env sur le serveur
- [ ] Dépendances installées (composer)

Domaine & SSL:
- [ ] DNS pointé correctement
- [ ] DNS propagé (vérifiez)
- [ ] SSL activé
- [ ] HTTPS forcé

Performance:
- [ ] Cache configuré
- [ ] Gzip activé
- [ ] Assets optimisés

Tests:
- [ ] Homepage accessible
- [ ] Tous les routes testées
- [ ] Formulaire de contact fonctionne
- [ ] Images chargent correctement
- [ ] Mobile responsive
- [ ] Pas d'erreurs 404

Production:
- [ ] APP_DEBUG = false
- [ ] Logs configurés
- [ ] Sauvegardes automatiques
- [ ] Email configuré
```

---

## 🆘 Troubleshooting

### Erreur: "502 Bad Gateway"
- Vérifier APP_DEBUG = false
- Vérifier permissions storage/
- Redémarrer le serveur

### Erreur: "Database connection refused"
- Vérifier DB_HOST, DB_USERNAME, DB_PASSWORD
- Vérifier que la base existe
- Vérifier permissions utilisateur MySQL

### Images ne chargent pas
- Vérifier APP_URL en .env
- Vérifier permissions public/
- Vérifier URLs des images en .env

### Email ne fonctionne pas
- Vérifier MAIL_* variables
- Tester avec: `php artisan tinker` → `Mail::raw('test', fn($m) => $m->to('test@test.com'));`
- Vérifier les logs

---

## 📞 Support

Si vous avez besoin d'aide:
1. Vérifiez les logs: `storage/logs/laravel.log`
2. Contactez le support de votre hébergement
3. Consultez la [documentation Laravel](https://laravel.com/docs)

---

**Bon déploiement! 🚀**
