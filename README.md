# 🗳️ EcoBlos - Web-Based E-Voting System

EcoBlos is a web-based electronic voting (E-Voting) application developed using PHP and MySQL. The system provides a secure and user-friendly platform for conducting online elections, allowing users to vote digitally while enabling administrators to manage candidates, voters, and election results efficiently.

---

## 📌 Features

### User Features
- User Registration
- Secure Login & Logout
- Forgot Password
- View Candidate Vision & Mission
- Cast Vote
- View Voting Guide
- View Personal Profile
- View Election Results
- About Page

### Administrator Features
- Dashboard
- Manage Voter Data
- Manage Candidate Data
- Add New Candidates
- View Election Results
- Election Management

---

## 🚀 Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Bootstrap
- XAMPP / Apache

---

## 📁 Project Structure

```
ecoblos.com/
│
├── ADMIN/
│   ├── dashboard.php
│   ├── data_pemilih.php
│   ├── data_pencalon.php
│   ├── hasil_pemilihan.php
│   ├── tambah_kandidat.php
│   └── hasil_aksi.php
│
├── USER/
│   ├── login.php
│   ├── register.php
│   ├── profile.php
│   ├── tampilan_utama.php
│   ├── lihat_hasil.php
│   ├── hasil.php
│   ├── tentang.php
│   ├── panduan_pencoblosan.php
│   └── HalamanPemilih/
│
├── SERVICE/
│   └── koneksi.php
│
├── ecoblos/
│   ├── login.php
│   ├── register.php
│   ├── logout.php
│   └── service/
│
├── index.php
└── halaman_tentang.php
```

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Resync02/ecoblos.git
```

### 2. Move the Project

Copy the project folder into your web server directory.

Example (XAMPP):

```
C:\xampp\htdocs\
```

### 3. Create Database

Create a new MySQL database.

Example:

```
ecoblos
```

### 4. Import Database

Import the provided SQL file into MySQL using phpMyAdmin.

### 5. Configure Database Connection

Open:

```
SERVICE/koneksi.php
```

Adjust the database configuration.

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "ecoblos";
```

### 6. Run the Project

Start Apache and MySQL from XAMPP.

Open:

```
http://localhost/ecoblos.com
```

---

## 📖 System Workflow

1. User registers an account.
2. User logs into the system.
3. The system verifies user credentials.
4. User views candidate information.
5. User casts one vote.
6. The system stores the vote securely.
7. Election results are displayed after voting.

---

## 🔐 Security Features

- User Authentication
- Session Management
- Separate Admin & User Access
- Password Recovery
- One Vote Per User
- Database Validation

---

## 📸 Main Modules

- Home Page
- User Authentication
- Candidate Information
- Voting Page
- Election Result Page
- User Profile
- Admin Dashboard
- Candidate Management
- Voter Management

---

## 🎯 Project Objectives

The purpose of this project is to:

- Digitize conventional voting processes.
- Improve voting efficiency.
- Reduce paper usage.
- Increase transparency.
- Simplify election management.
- Provide a secure online voting platform.

---

## 💡 Future Improvements

- Email verification
- Two-Factor Authentication (2FA)
- Vote encryption
- Real-time election statistics
- Mobile responsive improvements
- Admin analytics dashboard
- Audit log system
- QR Code voter verification

---

## 👨‍💻 Author

**Iqbal Hafidz Ramadhan**

GitHub:
https://github.com/Resync02

---

## 📄 License

This project was developed for educational and academic purposes. Feel free to use, modify, and improve it for learning and research.
