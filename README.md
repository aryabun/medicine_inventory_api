# Medicine Inventory API

<p>Hello! Medicine Inventory was my final project in my senior year back when i was in university for my undergraduate.</p>
<p>This repository is the api development for the project. To see the full system UI, follow this link for a play-around.</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Project Features

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Docker (Recommended)

### 1. Build the backend image

```bash
docker build -t med-inventory-core:latest .
```

### 2. Configure environment

```bash
cp .env.example .env
# Edit .env with your API keys and secrets
```

### 3. Start all services

```bash
docker compose up -d
```
[Optional]
```bash
# migrate
docker compose exec app php artisan migrate --seed
#seed data
docker compose exec app php artisan db:seed
```


### 4. Tear down

```bash
docker compose down          # stop containers, keep volumes
docker compose down -v       # stop containers and delete all data volumes
```

### Rebuild after code changes

```bash
docker build -t med-inventory-core:latest . && docker compose up -d app worker 
#Or:
docker compose up -d --build
```

---

## Local Development

If you want to run locally

### 1. Install all the necessary packages
```bash
composer install
```
### 2. Migrate database tables and seed sample data
```bash
php artisan migrate --seed
```
### 3. Running project
```bash
php artisan serve
```


