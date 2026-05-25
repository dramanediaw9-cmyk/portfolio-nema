#!/bin/bash

# Script de déploiement Laravel en production
# À exécuter sur le serveur après upload

echo "🚀 Déploiement Nema Technologies Portfolio"
echo "==========================================="
echo ""

# Vérifications préalables
echo "📋 Vérifications préalables..."

if ! command -v php &> /dev/null; then
    echo "❌ PHP n'est pas installé"
    exit 1
fi

if ! command -v mysql &> /dev/null; then
    echo "⚠️  MySQL n'est pas dans le PATH (ce n'est pas critique)"
fi

echo "✅ PHP vérifié: $(php -v | head -1)"
echo ""

# Installer les dépendances
echo "📦 Installation des dépendances..."
if command -v composer &> /dev/null; then
    composer install --no-dev --optimize-autoloader
else
    echo "⚠️  Composer pas trouvé. Téléchargement..."
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php
    php composer.phar install --no-dev --optimize-autoloader
    rm composer-setup.php
fi

echo ""
echo "🔐 Définition des permissions..."
chmod -R 755 public/
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
find . -type f -exec chmod 644 {} \;
chmod +x artisan

echo ""
echo "🔑 Génération de la clé (si nécessaire)..."
if ! grep -q "APP_KEY=base64:" .env; then
    php artisan key:generate
    echo "✅ Clé générée"
else
    echo "✅ Clé déjà présente"
fi

echo ""
echo "🗄️  Migration de la base de données..."
php artisan migrate --force

echo ""
echo "⚡ Optimisation..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo "✅ Déploiement terminé!"
echo "📍 Accédez à: $(grep APP_URL .env | cut -d '=' -f 2)"
echo ""
echo "📝 Prochaines étapes:"
echo "   1. Vérifier les logs: tail -f storage/logs/laravel.log"
echo "   2. Ajouter les données initiales si nécessaire"
echo "   3. Configurer l'email"
echo "   4. Mettre en place les sauvegardes"
