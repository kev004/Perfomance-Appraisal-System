INSTALLATION

It is preferred to have git setup installed on your local system.

Once downloaded/cloned go to the project directory on terminal/command line and run composer install or composer.phar install

Once composer is installed, run migration:

php artisan migrate
After migration, run the database seeder:

php artisan db:seed
Once done migrating and seeding you will have default user:

login as:      kelvinadmin@gmail.com
               kelvinmanager@gmail.com
               kelvinemployee@gmail.com
pass- password
