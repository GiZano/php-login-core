# Monolithic Architecture Implementation

This directory contains the **Monolithic** version of the login system. In this approach, business logic, data handling, and HTML presentation are tightly coupled within a single entry point.

## 📂 File Structure

```text
monolithic/
├── index.php       # Handles POST requests, logic, and HTML rendering
└── logout.php      # Destroys the session and redirects
```

## 🧠 How it Works

The `index.php` file acts as the "God Object" for this application. It performs the following steps sequentially on every page load:

1.  **Session Initialization:** Starts the session and initializes the `users` array if it doesn't exist.
2.  **Request Handling:** Checks `$_SERVER['REQUEST_METHOD']`.
    * If **POST** (Register): It validates inputs, checks for duplicates, and pushes the new user to the `$_SESSION` array.
    * If **POST** (Login): It iterates through the session array to find a matching email/password combination.
3.  **View Rendering:** Finally, it outputs the HTML forms (Login and Register) or the "Welcome" message directly.

## 📝 Code Highlights

### Data Storage Strategy
Data is stored directly in the session as a multi-dimensional array:

```php
// Structure Example
[
    [
        "email"    => "user@example.com",
        "password" => "secret",
        "username" => "UserOne",
        "tax_code" => "CODE123"
    ],
    ...
]
```

### Pros & Cons of this Approach

* **Pros:** Easy to write initially; suitable for very small scripts; no complex file include chains.
* **Cons:** Hard to maintain; code is not reusable; logic is mixed with HTML (spaghetti code); difficult to test.