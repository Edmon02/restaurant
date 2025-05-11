# Restaurant Management System  
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)  
[![PHP](https://img.shields.io/badge/PHP-7.x%2B-777BB4?logo=php)](https://php.net)  
[![Laravel](https://img.shields.io/badge/Laravel-5.x%2B-FF2D20?logo=laravel)](https://laravel.com)  

> A full-featured restaurant management system built with Laravel, supporting table reservations, menu management, and admin workflows.  

## 📖 Description  
This project is a **restaurant management platform** designed to streamline operations for small-to-medium restaurants. Key features include:  
- **Table reservations** with time/date selection and status tracking (e.g., "pending," "confirmed").  
- **Menu management** (categories, items, and pricing).  
- **Admin dashboard** for staff to manage reservations, tables, and menus.  
- **User authentication** (login, registration, password reset).  

Built 3 years ago, this project uses stable versions of Laravel and PHP 7.x. While not on the latest stack, it remains functional and can be modernized incrementally (see [Roadmap](#-roadmap)).  

## 🛠️ Tech Stack  
- **Backend**: PHP 7.x, Laravel 5.x  
- **Frontend**: Blade templates, Tailwind CSS (via `tailwind.config.js`), JavaScript  
- **Database**: MySQL (via Laravel migrations)  
- **Tools**: Composer, Artisan CLI  

## 🚀 Quick Start  
### Prerequisites  
- PHP 7.x, MySQL, Composer  

### Installation  
```bash  
git clone https://github.com/your/restaurant-system.git  
cd restaurant-system  
composer install  
cp .env.example .env  
php artisan key:generate  
```  
Configure `.env` with your database credentials, then run:  
```bash  
php artisan migrate --seed  
php artisan serve  
```  
Access the app at `http://localhost:8000`. Admin credentials are seeded by default (check `database/seeders/Admin.php`).  

## 📂 Project Structure  
```  
restaurant/  
├── app/                # Core Laravel app  
│   ├── Http/           # Controllers (Admin, Auth, Frontend)  
│   ├── Models/         # Eloquent models (Reservation, Menu, Table)  
│   └── ...  
├── database/           # Migrations and seeders  
├── resources/views/    # Blade templates  
│   ├── admin/          # Admin dashboard views  
│   ├── auth/           # Auth pages (login, register)  
│   └── ...  
├── routes/             # Web and API routes  
└── public/             # Compiled assets (CSS/JS)  
```  

## 🤝 Contributing  
Contributions are welcome! Given the project’s age, focus on:  
1. **Modernization**: Upgrading to Laravel 8+/PHP 8+.  
2. **Testing**: Adding PHPUnit tests in `tests/Feature`.  
3. **UI/UX**: Improving Blade templates with modern Tailwind.  

**Steps**:  
```bash  
git checkout -b feature/your-feature  
php artisan test  # Run tests before submitting PRs  
```  

## 📜 License  
MIT License. See [LICENSE](LICENSE). Permissive and ideal for community-driven improvements.  

## 🌟 Roadmap  
- [ ] Upgrade to Laravel 8+/PHP 8+.  
- [ ] Add API endpoints (e.g., for mobile apps).  
- [ ] Dockerize for easier setup.
