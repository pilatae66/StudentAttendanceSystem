@ECHO OFF
TITLE APPLICATION INITIALIZATOR
ECHO Application Start Process Initiated
ECHO Installing composer dependencies
CALL composer install
ECHO Installing npm dependencies
CALL npm install
ECHO Copying .env file
CALL copy .env.example .env
ECHO generating application key...
CALL php artisan key:generate
ECHO Initialization done!
PAUSE