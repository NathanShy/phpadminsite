#install dependencies
navigate to your package folder and run "php artisan install" and "npm install" to install dependencies.

#Set up SQL server
in the root folder you will find a file called ".env.example." copy all of its contents to a new .env file in the root folder and update the DB settings to match yours.

#To initialize database
navigate to your package folder and run "php artisan migrate" on bash to migrate tables to server.

#To populate Database
navigate to your package folder and run "php artisan db:seed" on bash to populate tables.
