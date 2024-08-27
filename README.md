# todo-list
`todo-list` is a free, self-hosted, open source app, written using laravel 11.x, that may help You organise your tasks.

# Installation using sqlite
1. Install composer dependencies
```bash
composer install
```
2. Copy environment file
```bash
cp .env.example .env
```
3. Generate app key
```bash
php artisan key:generate
```
4. Migrate database
```bash
php artisan migrate
```
If you see the warn:
```
 WARN  The SQLite database configured for this application does not exist: C:\path_to_app\todo-list\database\database.sqlite.
```
Type `yes` in command line.
5. Start development server:
```bash
php artisan serve
```
