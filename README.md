## How to install
Make sure to have composer and npm installed in your PC

clone the project

git clone https://github.com/adrian-oguing/assessment.git

locate the root directory of the project

Create .env file. Copy contents of the .env.example then save  
or rename the .env.example to .env

-- assessment  
 --- app  
 --- bootstrap  
 --- config  
 --- database  
 --- public  
 --- resources  
 --- routes  
 --- storage  
 --- tests  
 --- vendor  
 --- .env  


Update the .env file with your local database settings

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=stock_management  
DB_USERNAME=root  
DB_PASSWORD=root

Make sure to create a database same name as the DB_DATABASE value

if everything is set

go to your terminal, locate the project folder, make sure you are inside of the assessment directory
 
and run these commands:


1. composer install

2. npm install

3. npm run dev

4. php artisan migrate:fresh --seed

5. php artisan key:generate

6. php artisan serve
