
## LRS CSPC

This website will contain the literatures that are found inside the library of the Camarines Sur Polytechnic College, this is to help fellow researcher in their journey of searching related literatures for their own thesis or capstone.

#System Information

- This website uses mysql as the database
- It use 2 server which is npm and composer
- The search engine uses the cosine similarity algorithm

## How to host this website:

This website is created using laravel and will run by following these steps:

1. create a copy of env.example and then rename the copied file to ".env"

2. This command is to install composer:
```
composer install
```
3. This is for installing npm
```
npm install
```
4. Migrate the database of the website
```
php artisan migrate
```
5. Generate the data's that are in the laravel seeder
```
php artisan db:seed
```
6. Generate a key 
```
php artisan key:generate
```
7. Link the storage in the public and storage folder
```
php artisan storage:link
```
8. Now to run the server these following command should both run in 2 separate terminal:
```
php artisan serve
```
and
```
npm run dev
```
