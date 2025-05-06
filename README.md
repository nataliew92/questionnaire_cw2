## About
This is a Laravel based web application that allows participants to complete questionnaires and authenticated users (admins or creators) to manage them via a secure admin panel

## Features
- Public facing questionnaire answering that sends responses to a database (no login required)
- Admin panel for managing questionnaires with the ability to create, update, delete and toggle between "live" and "development" states
- Secure login and registration
- Role based access control for admin or standard users. This app will automatically create an admin account when the database is seeded, details below

## Requirements
- PHP 8.2 or higher
- Laravel 12+
- MySQL or MariaDB for database management
- Composer
- Node.js and npm to compile assets

## Installation 
1. Clone the repository
2. Deploy the development container and MariaDB container
3. Install dependancies by running "composer install" and "npm install" in the bash terminal. 
4. Edit the .env file and enter the correct information relevant to your database on MySQL Workbench (connection, host, port, database, username, password)
- DB_CONNECTION=mariadb
- DB_HOST=your_database_ip
- DB_PORT=your_database_port
- DB_DATABASE=your_database_name
- DB_USERNAME=your_database_user
- DB_PASSWORD=your_database_password
5. Run the migrations and seeders using "php artisan migrate --seed", this will provide an example questionnaire and admin user for you to use
6. Run "npm run dev" to compile assets
7. To start the application, run "composer run dev" in the terminal and visit http://127.0.0.1:8000 in your browser.

## Admin Account
- Once you have seeded the database, an admin account is provided for you to use on the login page.
- email: admin@example.com
- password: password123

You can also create your own login and test the website functionalities as a user. In this app, users and admins have the same permissions.