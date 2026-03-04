# Gestion d'Absence (GAbs)

GAbs is a PHP web application for absence management.

## Stack
- [CodeIgniter](https://codeigniter.com/) (MVC architecture)
- [Bootstrap](https://getbootstrap.com/)
- [PHP](https://www.php.net/)
- [PHPExcel](https://github.com/PHPOffice/PHPExcel) (deprecated, replaced by PhpSpreadsheet)

## Local Setup

### 1. Prerequisites
- PHP
- MySQL/MariaDB

### 2. Create and import the database
From the repository root:

```bash
# 1. Create the database
mysql -e "CREATE DATABASE gabs CHARACTER SET utf8 COLLATE utf8_general_ci;"

# 2. Import the SQL file
mysql gabs < gabs.sql
```

### 3. Configure database connection
Edit `GAbs/application/config/database.php` and set:
- `hostname` (usually `localhost`)
- `username`
- `password`
- `database` to `gabs`

Note: the SQL dump creates `gabs` (lowercase), so the config should match.

### 4. Configure base URL
Edit `GAbs/application/config/config.php`:

```php
$config['base_url'] = 'http://localhost:8000/';
```

## Run Locally
Start the PHP built-in server from the `GAbs` directory:

```bash
cd GAbs
php -S localhost:8000
```

Open:
- `http://localhost:8000/`
- `http://localhost:8000/index.php/login`

## Default Login (seed data)
- Username: `bilal`
- Password: `123`
