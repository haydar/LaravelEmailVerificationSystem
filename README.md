# Laravel User Email Verification
The application to send a verification email when a user is registered.

**Installation**
1. Open terminal or commandline of your os.  
2. Clone this repo with `git clone https://github.com/haydarsahin34/LaravelEmailVerificationSystem.git`
3. After cloning operation, run this code `composer install`
4. Rename or copy `.env.example` file to `.env`, write your information mailtrap, app section and database.
5. Run `php artisan key:generate` command. 
6. Run `php artisan migrate` command, create the tables.


**Custom E-mail**

Edit `resources\views\emails\user\newuserverification.blade.php` for basic customization.
