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

Do not use Live Server — PHP pages need the PHP built-in server above.
