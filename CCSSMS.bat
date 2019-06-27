@ECHO OFF
TITLE APPLICATION INITIALIZATOR
ECHO Application Process Initiated
ECHO Starting Server...
php artisan serve
START "" http://localhost:8000
@PAUSE