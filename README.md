# 🧺 Laundry Management App

This is a Laravel-based web application for managing laundry services. It includes features for students and teachers to create laundry requests, receive pickup codes, view the dashboard, and for administrators to manage orders and pricing.

---

## 🚀 Features

- User Roles: `Admin`, `Student`, `Teacher`
- Create and manage laundry requests
- Automatic pickup code generation
- Status management: `Pending`, `Completed`
- Price calculation by unit
- Admin panel for managing requests and pricing
- Responsive UI with screenshots below

---

## 🧑‍💻 Technologies

- Laravel (PHP Framework)
- MySQL
- Bootstrap (UI)
- JavaScript
- Blade Templating Engine

---

## 📸 Screenshots

| Feature                | Screenshot                                                                                           |
| ---------------------- | ---------------------------------------------------------------------------------------------------- |
| Admin Dashboard        | ![Admin](https://github.com/rowa0504/laundry-app/blob/main/public/images/admin.png?raw=true)         |
| Create Laundry Request | ![Create](https://github.com/rowa0504/laundry-app/blob/main/public/images/create.png?raw=true)       |
| Change Price           | ![Price](https://github.com/rowa0504/laundry-app/blob/main/public/images/price-changes.png?raw=true) |
| Dashboard View         | ![Dashboard](https://github.com/rowa0504/laundry-app/blob/main/public/images/dashboard.png?raw=true) |
| Get Pickup Code        | ![Get Code](https://github.com/rowa0504/laundry-app/blob/main/public/images/get-code.png?raw=true)   |
| Code Match Success     | ![Match](https://github.com/rowa0504/laundry-app/blob/main/public/images/match-code.png?raw=true)    |
| Code Mismatch          | ![Mismatch](https://github.com/rowa0504/laundry-app/blob/main/public/images/mismatch-code.png?raw=true) |
| Pickup Confirmed       | ![Pickup](https://github.com/rowa0504/laundry-app/blob/main/public/images/pickup.png?raw=true)       |


---

## ⚙️ Setup Instructions

```bash
git clone https://github.com/your-username/laundry-app.git
cd laundry-app
composer install
cp .env.example .env
php artisan key:generate
# Set your DB credentials in the .env file
php artisan migrate --seed
php artisan serve
