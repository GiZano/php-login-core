# PHP Login Core

A comparative study of PHP application architectures. This repository contains a core authentication system (Login/Register) implemented in two distinct architectural styles: **Monolithic** and **MVC (Model-View-Controller)**.

The goal of this project is to demonstrate how code structure evolves from a single-file procedural script to a structured, modular application, while maintaining the exact same functionality.

## 📂 Project Structure

```text
php-login-core/
├── monolithic/           # Version 1: Logic and View mixed in single files
│   ├── index.php
│   └── logout.php
├── mvc/                  # Version 2: Separation of Concerns
│   ├── controller/
│   ├── model/
│   ├── view/
│   └── index.php
└── README.md
```

## 🚀 Features

Both versions share the same core features:
* **User Registration:** Captures Email, Password, Username, and Tax Code.
* **User Login:** Authenticates against stored session data.
* **Session Persistence:** Data is stored in `$_SESSION['users']` (No database required for this demo).
* **Duplicate Check:** Prevents registering users with the same email.

## 🛠️ Requirements

* PHP 7.4 or higher.
* A local server (XAMPP, MAMP, WAMP, or PHP built-in server).

## ⚡ Quick Start

1.  Clone the repository.
2.  Navigate to the specific version folder (e.g., `cd monolithic`).
3.  Start the PHP built-in server:
    ```bash
    php -S localhost:8000
    ```
4.  Open your browser to `http://localhost:8000`.

## ⚠️ Educational Note

**Data Persistence:** This project uses PHP Sessions to store user data in an array (`$_SESSION['users']`). If you restart the browser or the session expires, the registered users will be lost. This is intended for logic demonstration, not production storage.