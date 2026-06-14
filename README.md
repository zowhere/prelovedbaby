# PreLoved Baby

PHP e-commerce site for preloved baby products.

## Prerequisites

- PHP 8+
- MySQL

## Setup & run

1. Copy `config/config.example.php` to `config/config.php` and set your MySQL credentials (skip if `config/config.php` already exists).

2. Start MySQL.

3. Start the dev server:

   ```bash
   ./start-server.sh
   ```

   Opens at [http://127.0.0.1:8081](http://127.0.0.1:8081). Use a different port with `PORT=3000 ./start-server.sh`.

4. **First time only:** open [http://127.0.0.1:8081/setup-database.php](http://127.0.0.1:8081/setup-database.php) to create the database and seed sample data.

## Customer registration

1. Click the **profile icon** (person circle) in the top-right navigation bar.
2. Click **Register**.
3. Enter your full name, email address, and password.
4. Click **Create Account**.

New accounts are saved to the `users` table in MySQL automatically.

## Seller registration

1. Open **Become Seller** in the main navigation, or use the profile icon menu.
2. Click **Register as a seller**.
3. Complete the form and click **Create Seller Account**.

Seller accounts are stored in the same `users` table with the `seller` role.

Do not use Live Server — PHP pages need the PHP built-in server above.
