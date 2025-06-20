# 💸 EMI Calculator System (Laravel 12)

This is a Laravel 12 application that allows an admin to manage EMI rules based on loan amount ranges and tenure, and provides a public EMI calculator for users — no login required for users.

---

## 📦 Features

### 👨‍💼 Admin
- Admin authentication (login/logout)
- Manage loan tenures (`Months`)
- Manage EMI rules (`EMI Combinations`) using:
  - Minimum Amount
  - Maximum Amount
  - Tenure (Months)
  - Interest Rate (%)

### 👥 Public User
- No login required
- Public EMI Calculator where users can:
  - Enter loan amount
  - Choose tenure
  - View EMI, total interest, and total payable amount

---

## 🚀 Setup Instructions

1. **Clone the repository**

```bash
git clone https://github.com/swapnil-mondkar/emi-calculator.git
cd emi-calculator
```

2. **Install dependencies**

```bash
composer install
npm install && npm run build
```

3. **Environment setup**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Database setup**

- Configure your database in `.env`:

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

- Run migrations and seed admin user:

```bash
php artisan migrate --seed
```

5. **Serve the app**

```bash
php artisan serve
```

Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🔑 Default Admin Credentials

```txt
Email: admin@example.com
Password: password123
```

---

## 🌐 Routes List

### 🔐 Admin Routes (Login Required)

| Method | URI                  | Name               | Description               |
|--------|----------------------|--------------------|---------------------------|
| GET    | /admin/login         | admin.login        | Show admin login form     |
| POST   | /admin/login         | —                  | Process admin login       |
| POST   | /admin/logout        | admin.logout       | Logout admin              |
| GET    | /admin/dashboard     | admin.dashboard    | Admin dashboard           |

#### 📅 Month (Tenure) Management

| Method | URI           | Name            | Description              |
|--------|---------------|-----------------|--------------------------|
| GET    | /months       | months.index    | List all months          |
| GET    | /months/create| months.create   | Show create form         |
| POST   | /months       | months.store    | Store new month          |
| GET    | /months/{id}/edit | months.edit  | Show edit form           |
| PUT    | /months/{id}  | months.update   | Update month             |
| DELETE | /months/{id}  | months.destroy  | Delete month             |

#### 📈 EMI Rule Management

| Method | URI         | Name          | Description              |
|--------|-------------|---------------|--------------------------|
| GET    | /emi        | emi.index     | List all EMI rules       |
| GET    | /emi/create | emi.create    | Show create form         |
| POST   | /emi        | emi.store     | Store new EMI rule       |
| GET    | /emi/{id}/edit | emi.edit    | Show edit form           |
| PUT    | /emi/{id}   | emi.update    | Update EMI rule          |
| DELETE | /emi/{id}   | emi.destroy   | Delete EMI rule          |

---

### 🧮 Public Calculator Routes

| Method | URI          | Name               | Description                  |
|--------|--------------|--------------------|------------------------------|
| GET    | /calculator  | calculator.form     | Show EMI calculator form     |
| POST   | /calculator  | calculator.calculate| Calculate EMI and show result|

---

## 🛠 Tech Stack

- Laravel 12
- Blade Templates
- MySQL

---

## ✅ License

This project is open-sourced for learning purposes. Feel free to use, modify, and contribute!
