@echo off
REM Script pour lancer le serveur Laravel du Portfolio
REM Double-cliquez ce fichier pour démarrer le serveur

cd /d "c:\xampp\htdocs\sites creation\portfolio"

echo.
echo ====================================
echo   LANCEMENT DU PORTFOLIO LARAVEL
echo ====================================
echo.
echo Serveur démarre sur: http://127.0.0.1:8000
echo.
echo Appuyez sur Ctrl+C pour arrêter le serveur
echo.
echo ====================================
echo.

php artisan serve --host=127.0.0.1 --port=8000

pause
