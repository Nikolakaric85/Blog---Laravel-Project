* A blog consists of an image, a title, text
* Menus containing Home, Login, and Register pages
* The home page lists all blogs. When a Blog is clicked then it is displayed whole. In the Blog list, display the image, title and name of the user who created it.
* Login is used to log in users and admins
* Register is used for user registration.
* When the user logs in, the main menu has options related to creating a Blog.
* CRUD operations with a blog for the user.
* When the admin logs in he has information about the list of all users and the list of all blogs.
* A blog when created by a user to make that Blog visible. The admin can delete the blog.
* An admin cannot create or edit a blog


To setup a Laravel Project You Cloned from Github.com you need to do following steps. 

1. Install Composer Dependencies<br>  composer install

2. Install NPM Dependencies<br>  npm install

3. Create a copy of your .env file<br>  cp .env.example .env

4. Generate an app encryption key<br>  php artisan key:generate

5. In the .env file, add database information to allow Laravel to connect to the database
We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.<br>

This is my example:<br>
DB_CONNECTION=pgsql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=5432<br>
DB_DATABASE=blog<br>
DB_USERNAME=postgres<br>
DB_PASSWORD=1nikolas<br>


6. Migrate the database<br>  php artisan migrate

7. Seed the database<br>  php artisan db:seed<br>
This final step is creating ADMIN user in database. ADMIN email address is admin@gmail.com and password is admin.<br>

8.Create links for images folder  
php artisan storage:link


