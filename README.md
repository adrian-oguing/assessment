## How to install
Make sure to have composer installed in your PC

clone the project

git clone https://github.com/adrian-oguing/assessment.git

Update the .env file with your local database settings

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stock_management
DB_USERNAME=root
DB_PASSWORD=root

Make sure to create a database same value as the DB_DATABASE

if everything is set

go to your terminal, locate the project folder and run these commands:

1. composer install

2. npm install

3. npm run dev

4. php artisan migrate:fresh --seed

5. php artisan serve
