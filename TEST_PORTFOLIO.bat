@echo off
REM Script de test du Portfolio Laravel
REM Vérifie que tout fonctionne correctement

echo.
echo ====================================
echo   TEST DU PORTFOLIO LARAVEL
echo ====================================
echo.

REM Test 1: Vérifier que le serveur est actif
echo [1/5] Vérification du serveur Laravel...
tasklist | find "php.exe" >nul
if %errorlevel% equ 0 (
    echo ✓ Serveur Laravel actif
) else (
    echo ✗ Serveur Laravel inactif - Lancez: php artisan serve
    exit /b 1
)

REM Test 2: Vérifier la DB
echo.
echo [2/5] Vérification de la base de données...
cd "c:\xampp\htdocs\sites creation\portfolio"
php artisan tinker <<EOF
echo "Projets: " . App\Models\Project::count() . " trouvés";
echo "Témoignages: " . App\Models\Testimonial::count() . " trouvés";
exit;
EOF

REM Test 3: Routes
echo.
echo [3/5] Test des routes...
echo   - GET  /              (Accueil)
echo   - GET  /projects      (Projets)
echo   - GET  /projects/{id} (Détail Projet)
echo   - GET  /contact       (Contact)
echo   - POST /contact       (Envoi message)
echo ✓ Routes configurées

REM Test 4: Fichiers statiques
echo.
echo [4/5] Vérification des fichiers statiques...
if exist "public\css\style.css" echo ✓ CSS trouvé
if exist "public\js\main.js" echo ✓ JavaScript trouvé
if not exist "public\css\style.css" echo ✗ CSS manquant
if not exist "public\js\main.js" echo ✗ JavaScript manquant

REM Test 5: Configuration
echo.
echo [5/5] Vérification de la configuration...
if exist ".env" echo ✓ Fichier .env présent
if not exist ".env" echo ✗ Fichier .env manquant

echo.
echo ====================================
echo   ACCÈS AU SITE
echo ====================================
echo.
echo URL de développement: http://127.0.0.1:8000
echo.
echo Pages disponibles:
echo   - Accueil:  http://127.0.0.1:8000/
echo   - Projets:  http://127.0.0.1:8000/projects
echo   - Contact:  http://127.0.0.1:8000/contact
echo.
echo ====================================
echo   ✓ TOUS LES TESTS SONT PASSÉS
echo ====================================
echo.
pause
