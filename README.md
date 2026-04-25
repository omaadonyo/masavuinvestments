# 🟠 Masavu Investments — Annual Returns System

![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel)
![Livewire](https://img.shields.io/badge/Livewire-3-4E56A6)
![Filament](https://img.shields.io/badge/FilamentPHP-Admin%20Panel-f59e0b)
![License](https://img.shields.io/badge/license-MIT-green)
![Build](https://img.shields.io/badge/build-passing-brightgreen)

> Smart Investments. Real Impact. Build Wealth Faster Through Trusted Collective Investment
> A modern financial platform for managing annual returns, reporting, and investor data.

---

## 🌐 Live Platform

🔗 https://masavuinvestments.com/

---

## ✨ Features

* 📊 Annual Returns Management
* 👤 User Profiles with Avatars
* 📄 Bulk PDF Export (Professional Reports)
* ⚡ FilamentPHP Admin Dashboard
* 🔄 Reactive UI with Livewire
* 🔍 Advanced Search, Filters & Sorting
* 🔐 Role-Based Access Control
* 🎨 Amber-Themed UI (Filament Design System)

---

## 🧱 Tech Stack

| Layer       | Technology                        |
| ----------- | --------------------------------- |
| Backend     | Laravel 13                        |
| Admin Panel | FilamentPHP                       |
| Frontend    | Livewire 3                        |
| Styling     | Tailwind CSS (via Filament)       |
| Database    | MySQL                             |
| PDF Engine  | DomPDF                            |
| Auth        | Laravel Auth / Sanctum (optional) |

---

## ⚙️ Run Locally

```bash
# Clone repository
git clone https://github.com/your-username/masavu-investments.git

cd masavu-investments

# Install dependencies
composer install
npm install && npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure DB in .env
# DB_DATABASE=...
# DB_USERNAME=...
# DB_PASSWORD=...

# Run migrations
php artisan migrate

# Seed (optional)
php artisan db:seed

# Storage link (for avatars & uploads)
php artisan storage:link

# Start app
php artisan serve
```

---

## 🔐 Admin Panel

```text
http://localhost:8000/admin
```

---

## 📸 Screenshots

| Dashboard                      | Table                      | PDF                      |
| ------------------------------ | -------------------------- | ------------------------ |
| ![](docs/images/dashboard.png) | ![](docs/images/table.png) | ![](docs/images/pdf.png) |

---

## 🎥 Demo

![Demo](docs/gifs/demo.gif)

---

## 📄 API (Optional)

Base URL:

```text
/api
```

Example:

```http
GET /api/annual-returns
POST /api/annual-returns
```

---

## 📂 Structure

```
app/
 ├── Filament/
 │    ├── Resources/
 │    ├── Pages/
 │    └── Tables/
 ├── Models/

resources/
 ├── views/
 │    └── filament/pdfs/
```

---

## 🚀 Deployment

* PHP 8.3+
* MySQL 8+
* Nginx / Apache
* Queue Worker (Supervisor recommended)

---

## 🛡️ License

MIT License

---

## 👨‍💻 Maintained By

Masavu Investments
🌍 https://masavuinvestments.com/
📍 Kampala, Uganda

---

## ⭐ Support

If this project helps you, consider giving it a ⭐
