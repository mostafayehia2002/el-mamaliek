# 🌟 ElMamalek

A Laravel-based marketplace and order management system for digital products, account videos, and recharge services with separate user and admin experiences.

**Author:** Mostafa Yehia

![Laravel 10](https://img.shields.io/badge/Laravel-10.x-red?style=for-the-badge&logo=laravel)
![PHP 8.1+](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql)
![Laravel Breeze](https://img.shields.io/badge/Breeze-Auth-blue?style=for-the-badge)
![Laravel Sanctum](https://img.shields.io/badge/Sanctum-API-2D3748?style=for-the-badge)
![Toastr](https://img.shields.io/badge/Toastr-UI_Alerts-orange?style=for-the-badge)

---

## 📌 Quick Links

| Section | Link |
|---|---|
| Overview | [What it is](#-overview) |
| Features | [Main Features](#-main-features) |
| Stack | [Tech Stack](#-tech-stack) |
| Setup | [Installation](#-installation) |
| Flow | [Quick Start Guide](#-quick-start-guide) |
| API | [API Documentation](#-api-documentation) |
| Structure | [Project Structure](#-project-structure) |
| Auth | [Authentication](#-authentication) |
| Delivery | [Testing & Deployment](#-testing--deployment) |
| Help | [Support & License](#-support--license) |

---

## ✨ Overview

**ElMamalek** is a Laravel 10 application for browsing products, purchasing digital accounts or recharge services, uploading payment proof, and letting administrators review and approve orders from a dedicated dashboard.

## 🚀 Main Features

### 👤 Customer / User Side
- Browse the homepage and explore **code-based products** and **charge-based products**.
- View **account videos** and account details.
- Select a product, choose a payment account, and submit an order with payment proof.
- Receive an instant confirmation while the order waits for admin approval.

### 🛡️ Admin Side
- Log in through a separate admin area.
- Manage admins, users, categories, products, charge products, payments, and payment accounts.
- Review, accept, or delete **orders** and **order charges**.
- View and clear notifications for incoming purchase requests.

### 🔔 System Highlights
- Separate authentication guards for users and admins.
- Email + database notifications for new order requests.
- File upload support for payment screenshots.
- Clean Laravel MVC structure with role-based routing.

## 🛠 Tech Stack

- **Framework:** Laravel 10
- **Language:** PHP 8.1+
- **Database:** MySQL
- **Authentication:** Laravel Breeze + custom admin guard
- **API Auth:** Laravel Sanctum
- **UI Notifications:** Toastr
- **Mailer:** SMTP / Mail providers supported by Laravel

## ⚙️ Installation

1. **Clone the repository** and open the project folder.
2. **Install PHP dependencies**:
   ```bash
   composer install
   ```
3. **Install frontend dependencies**:
   ```bash
   npm install
   ```
4. **Copy and configure environment variables** in `.env`.
5. **Generate an application key** if needed:
   ```bash
   php artisan key:generate
   ```
6. **Run migrations and seed the database**:
   ```bash
   php artisan migrate --seed
   ```
7. **Create the storage link** for uploaded files:
   ```bash
   php artisan storage:link
   ```
8. **Build frontend assets**:
   ```bash
   npm run build
   ```
9. **Start the local server**:
   ```bash
   php artisan serve
   ```

> Make sure your database and mail settings in `.env` are correct before running the app.

## 🧭 Quick Start Guide

1. Open the home page and browse available categories.
2. Choose either a **code product** or a **charge product**.
3. Log in or register using the user authentication flow.
4. Select a payment method and related payment account.
5. Upload the payment screenshot and submit the order.
6. Wait for admin review and approval from the dashboard.

## 📡 API Documentation

The project does **not** expose a public REST API yet. It currently includes the default authenticated Sanctum endpoint:

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| GET | `/api/user` | Sanctum | Returns the authenticated user profile |

## 🗂 Project Structure

| Path | Purpose |
|---|---|
| `app/Http/Controllers/User` | Public user flows, orders, and auth |
| `app/Http/Controllers/Admin` | Admin dashboard and management actions |
| `app/Models` | Eloquent models for users, products, orders, payments, and accounts |
| `app/Notifications` | Mail/database notifications for new orders |
| `routes/` | Web, auth, admin, and API routes |
| `resources/views` | Blade templates for user and admin pages |
| `database/migrations` | Schema definitions |
| `database/seeders` | Initial database seed data |

## 🔐 Authentication

- **Users** authenticate through the default `web` guard.
- **Admins** use a dedicated `admins` guard and must pass the `IsAdmin` middleware.
- User registration works by requesting a verification code via email.
- Admin login is isolated under the `/admin` area.
- The API layer uses **Laravel Sanctum** for authenticated requests.

## ✅ Testing & Deployment

### Testing
Run the test suite with:

```bash
php artisan test
```

### Deployment Checklist
- Set production values in `.env`.
- Run `php artisan config:cache`, `php artisan route:cache`, and `php artisan view:cache`.
- Build frontend assets with `npm run build`.
- Run migrations on the production database.
- Ensure the storage directory is writable and linked.

## 🤝 Support & License

- For support, review the relevant files in `routes/`, `app/Http/Controllers/`, and `app/Models/`, or contact the project maintainer.
- This project is licensed under the **MIT License**.

Mostafa Yehia

