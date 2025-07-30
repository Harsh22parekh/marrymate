# 💍 MarryMate - Wedding Services Booking Platform

MarryMate is a Laravel-based web application that helps users discover and book wedding services and packages with ease. It offers a seamless experience for couples to plan their big day through verified vendors, customizable packages, and transparent pricing.

---

## 🌟 Features

- ✨ Trusted & Verified Vendors across all categories
- 📦 Customizable Wedding Packages for every budget
- 💸 Transparent Pricing with no hidden charges
- 📲 Easy Online Booking and Management
- 📝 Verified Reviews from Real Couples
- 💍 Everything you need - all in one place!

---

## 🖥️ Admin Panel

- Dynamic service & package management (CRUD)
- Booking management with status updates (Pending, Done, Cancelled)
- Analytics Dashboard (with Chart.js)
- Blog manager for SEO and content updates
- Dynamic About & Contact pages

---

## 📦 Tech Stack

- **Backend**: Laravel 10+
- **Frontend**: Blade, Bootstrap, Chart.js
- **Database**: MySQL
- **Email**: Laravel Mail (Contact & Subscription)
- **Payment**: Razorpay (for bookings)

---

## 🚀 Installation

```bash
git clone https://github.com/Harsh22parekh/marrymate.git
cd marrymate
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
