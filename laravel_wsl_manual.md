# Manual: Instalación de Proyecto Laravel Todo-List en WSL (Windows 10/11)

## Requisitos Previos

Antes de comenzar, asegúrate de tener:
- Windows 10 versión 2004 o superior, o Windows 11
- Al menos 4GB de RAM disponible
- Conexión a internet estable

## Paso 1: Instalar WSL2

### 1.1 Habilitar WSL
1. Abre **PowerShell** como administrador
2. Ejecuta el siguiente comando:
```bash
wsl --install
```

3. Si ya tienes WSL instalado, actualiza a WSL2:
```bash
wsl --set-default-version 2
```

4. **Reinicia tu computadora** cuando se te solicite

### 1.2 Instalar Ubuntu
1. Abre **Microsoft Store**
2. Busca "Ubuntu 22.04 LTS" e instálalo
3. Una vez instalado, ábrelo desde el menú inicio
4. Configura tu usuario y contraseña cuando se te solicite

## Paso 2: Actualizar Ubuntu y Instalar Dependencias Básicas

### 2.1 Actualizar el sistema
```bash
sudo apt update && sudo apt upgrade -y
```

### 2.2 Instalar dependencias básicas
```bash
sudo apt install -y curl wget git unzip software-properties-common apt-transport-https ca-certificates gnupg lsb-release
```

## Paso 3: Instalar PHP 8.2

### 3.1 Agregar repositorio de PHP
```bash
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
```

### 3.2 Instalar PHP y extensiones necesarias
```bash
sudo apt install -y php8.2 php8.2-cli php8.2-fpm php8.2-mysql php8.2-xml php8.2-curl php8.2-zip php8.2-mbstring php8.2-intl php8.2-bcmath php8.2-gd php8.2-sqlite3
```

### 3.3 Verificar instalación
```bash
php --version
```

## Paso 4: Instalar Composer

### 4.1 Descargar e instalar Composer
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

### 4.2 Verificar instalación
```bash
composer --version
```

## Paso 5: Instalar MySQL

### 5.1 Instalar MySQL Server
```bash
sudo apt install -y mysql-server mysql-client
```

### 5.2 Iniciar MySQL
```bash
sudo service mysql start
```

### 5.3 Configurar MySQL (Opcional pero recomendado)
```bash
sudo mysql_secure_installation
```

Responde las preguntas:
- **Validate password plugin**: `n` (No)
- **Set root password**: `y` (Sí) - Ingresa una contraseña segura
- **Remove anonymous users**: `y` (Sí)
- **Disallow root login remotely**: `y` (Sí)
- **Remove test database**: `y` (Sí)
- **Reload privilege tables**: `y` (Sí)

### 5.4 Crear base de datos para el proyecto
```bash
sudo mysql -u root -p
```

Dentro del prompt de MySQL, ejecuta:
```sql
CREATE DATABASE todolist_db;
CREATE USER 'todolist_user'@'localhost' IDENTIFIED BY 'tu_password_aqui';
GRANT ALL PRIVILEGES ON todolist_db.* TO 'todolist_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

## Paso 6: Clonar y Configurar el Proyecto

### 6.1 Navegar al directorio home y clonar el proyecto
```bash
cd ~
git clone https://github.com/serjy23/todo-list.git
cd todo-list
```

### 6.2 Instalar dependencias de Composer
```bash
composer install
```

### 6.3 Configurar el archivo de entorno
```bash
cp .env.example .env
```

### 6.4 Editar el archivo .env
```bash
nano .env
```

Modifica las siguientes líneas en el archivo .env:
```env
APP_NAME="Todo List"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack

# Configuración de Base de Datos - Cambia de SQLite a MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todolist_db
DB_USERNAME=todolist_user
DB_PASSWORD=tu_password_aqui
```

**Para guardar en nano**: Presiona `Ctrl+X`, luego `Y`, luego `Enter`

### 6.5 Generar la clave de aplicación
```bash
php artisan key:generate
```

## Paso 7: Configurar la Base de Datos

### 7.1 Ejecutar migraciones
```bash
php artisan migrate
```

Si aparece algún error, verifica que MySQL esté corriendo:
```bash
sudo service mysql status
```

Si no está corriendo, inícialo:
```bash
sudo service mysql start
```

### 7.2 (Opcional) Ejecutar seeders si existen
```bash
php artisan db:seed
```

## Paso 8: Iniciar el Servidor de Desarrollo

### 8.1 Iniciar el servidor Laravel
```bash
php artisan serve
```

### 8.2 Acceder a la aplicación
Abre tu navegador web en Windows y ve a: `http://localhost:8000`

## Comandos Útiles para el Día a Día

### Iniciar servicios (ejecutar cada vez que abras WSL)
```bash
# Iniciar MySQL
sudo service mysql start

# Navegar al proyecto
cd ~/todo-list

# Iniciar servidor Laravel
php artisan serve
```

### Detener el servidor
Presiona `Ctrl+C` en la terminal donde está corriendo `php artisan serve`

### Ver logs de errores
```bash
tail -f storage/logs/laravel.log
```

## Solución de Problemas Comunes

### Problema: "Permission denied" en storage/
```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:www-data storage bootstrap/cache
```

### Problema: MySQL no inicia
```bash
sudo service mysql restart
sudo mysql -u root -p
```

### Problema: Error de conexión a base de datos
1. Verifica que MySQL esté corriendo: `sudo service mysql status`
2. Verifica las credenciales en el archivo `.env`
3. Prueba la conexión: `php artisan tinker` y luego `DB::connection()->getPdo();`

### Problema: Composer out of memory
```bash
php -d memory_limit=-1 /usr/local/bin/composer install
```

## Notas Importantes

1. **WSL y archivos**: Los archivos del proyecto están en `~/todo-list` dentro de WSL, que corresponde a `\\wsl$\Ubuntu-22.04\home\tu_usuario\todo-list` desde Windows
2. **Rendimiento**: Para mejor rendimiento, mantén los archivos del proyecto dentro del sistema de archivos de WSL, no en `/mnt/c/`
3. **Servicios**: MySQL no se inicia automáticamente, debes iniciarlo cada vez que abras WSL
4. **Backup**: Considera hacer backup regular de tu base de datos con `mysqldump`

## Comandos de Backup (Opcionales)

### Backup de la base de datos
```bash
mysqldump -u todolist_user -p todolist_db > backup_$(date +%Y%m%d_%H%M%S).sql
```

### Restaurar backup
```bash
mysql -u todolist_user -p todolist_db < backup_20240101_120000.sql
```

¡Listo! Tu proyecto Laravel Todo-List debería estar funcionando correctamente en WSL.