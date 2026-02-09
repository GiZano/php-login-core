# MVC Architecture Implementation

This directory contains the **Model-View-Controller (MVC)** version of the login system. This approach adheres to the "Separation of Concerns" principle, making the code more modular, maintainable, and scalable.

## 📂 File Structure

```text
mvc/
├── controller/          # Handles business logic (The "Brain")
│   ├── login.php
│   ├── logout.php
│   └── register.php
├── model/                # Handles data storage and retrieval
│   └── data.php
├── view/                # Handles HTML output (The "Face")
│   └── login_view.php
└── index.php            # The Router / Entry Point
```

## 🏗️ Architecture Breakdown

### 1. The Router (`index.php`)
This is the single entry point. It loads the necessary data functions and decides which **Controller** to load based on the `action` sent via POST.

```php
switch($_POST['action']):
    case 'login':
        require_once __DIR__ . '/controller/login.php';
        break;
    case 'register':
        require_once __DIR__ . '/controller/register.php';
        break;
    default:
        require_once __DIR__ . '/view/login_view.php';
endswitch;
```

### 2. The Model (`model/data.php`)
Contains pure PHP functions to interact with the data source (in this case, the Session). It does not know about HTML.
* `createSession()`
* `registerUser($new_user)`
* `logUser($email, $password)`

### 3. The Controller (`controller/`)
Intermediaries that handle inputs.
* **register.php:** Sanitizes POST data, creates a user array, calls `registerUser()`, and decides what view to show next.
* **login.php:** Takes credentials, calls `logUser()`, and handles success/failure messages.

### 4. The View (`view/login_view.php`)
Contains pure HTML with minimal PHP for displaying the forms. It does not process data.

## 🌟 Key Improvements over Monolithic

1.  **Reusability:** The `logUser` function can be used anywhere in the app, not just in one specific if-statement.
2.  **Readability:** You know exactly where to look for HTML (View) vs Logic (Controller).
3.  **Exception Handling:** The MVC version utilizes `try/catch` blocks in controllers to handle errors thrown by the Model (e.g., `InvalidArgumentException` for existing users).