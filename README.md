# todo-list
`todo-list` is a free, self-hosted, open source app, written using laravel 11.x, that may help You organise your tasks.

# Installation using sqlite
1. Clone the git repository
```git
git clone https://github.com/Fafikk/todo-list.git
```
2. Install composer dependencies
```bash
composer install
```
3. Copy environment file
```bash
cp .env.example .env
```
4. Generate app key
```bash
php artisan key:generate
```
5. Migrate database
```bash
php artisan migrate
```
If you see the warn:
```
 WARN  The SQLite database configured for this application does not exist: C:\path_to_app\todo-list\database\database.sqlite.
```
Type `yes` in command line.
<br>
6. Start development server:
```bash
php artisan serve
```
