# Chat App API

Real-time chat application built with Laravel 13, Laravel Reverb, Redis, Docker, and Clean Architecture principles.

## ✨ Features

- JWT/Sanctum Authentication
- Private chat rooms
- Real-time messaging with Laravel Reverb
- Redis-powered queues
- Laravel Horizon integration
- Dockerized development environment
- Repository Pattern
- Service Layer Pattern
- RESTful API design
- Clean Architecture
- Event-Driven Architecture
- Role-based channel authorization
- Cursor pagination for chat history
- API Resources
- Request Validation
- Exception Handling

---

## 🛠️ Tech Stack

### Backend

- PHP 8.4
- Laravel 13
- MySQL 8.4
- Redis 7
- Laravel Reverb
- Laravel Horizon
- Laravel Sanctum

### DevOps

- Docker
- Docker Compose
- Nginx

### Architecture

- Service Layer Pattern
- Repository Pattern
- SOLID Principles
- Event-Driven Design

---

Update environment variables.

### Start Docker containers

```bash
docker compose up -d --build
```

### Install dependencies

```bash
docker compose exec app composer install
```

### Generate application key

```bash
docker compose exec app php artisan key:generate
```

### Run migrations

```bash
docker compose exec app php artisan migrate
```

### Start Horizon

```bash
docker compose exec horizon php artisan horizon
```

### Start Reverb

```bash
docker compose exec reverb php artisan reverb:start
```
