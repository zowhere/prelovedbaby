-- Drop child tables before parents (FK-safe order)
DROP TABLE IF EXISTS page_views;
DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS product_categories;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS role_permissions;
DROP TABLE IF EXISTS permissions;
DROP TABLE IF EXISTS roles;

CREATE TABLE roles (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(60) NOT NULL,
  slug VARCHAR(60) NOT NULL UNIQUE,
  description VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO roles (id, name, slug, description) VALUES
  (1, 'Super Admin', 'super_admin', 'Full system access including role management'),
  (2, 'Admin', 'admin', 'Manage users, products and orders'),
  (3, 'Manager', 'manager', 'Manage products and view users'),
  (4, 'Support', 'support', 'View dashboard and listings only'),
  (5, 'Customer', 'customer', 'Marketplace customer — no admin access'),
  (6, 'Seller', 'seller', 'Marketplace seller — can list and sell items')
ON DUPLICATE KEY UPDATE name = VALUES(name), description = VALUES(description);

CREATE TABLE permissions (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  slug VARCHAR(80) NOT NULL UNIQUE,
  module VARCHAR(40) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE role_permissions (
  role_id INT NOT NULL,
  permission_id INT NOT NULL,
  PRIMARY KEY (role_id, permission_id),
  FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE CASCADE,
  FOREIGN KEY (permission_id) REFERENCES permissions (id) ON DELETE CASCADE
);

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  role_id INT NOT NULL DEFAULT 5,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  country VARCHAR(80) NOT NULL DEFAULT 'South Africa',
  password_hash VARCHAR(255) NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES roles (id)
);

ALTER TABLE users MODIFY id INT NOT NULL AUTO_INCREMENT;

CREATE TABLE categories (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  slug VARCHAR(100) NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  listing_id VARCHAR(20) NOT NULL UNIQUE,
  seller_id INT DEFAULT NULL,
  seller_name VARCHAR(120) NOT NULL,
  brand VARCHAR(80) NOT NULL,
  name VARCHAR(200) NOT NULL,
  slug VARCHAR(200) NOT NULL UNIQUE,
  price DECIMAL(10, 2) NOT NULL,
  item_condition VARCHAR(50) NOT NULL,
  location VARCHAR(120) DEFAULT NULL,
  description TEXT,
  image VARCHAR(255) DEFAULT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'live',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (seller_id) REFERENCES users (id) ON DELETE SET NULL
);

CREATE TABLE product_categories (
  product_id INT NOT NULL,
  category_id INT NOT NULL,
  PRIMARY KEY (product_id, category_id),
  FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE,
  FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE
);

CREATE TABLE orders (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  total_amount DECIMAL(10, 2) NOT NULL,
  courier_fee DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
  payment_method VARCHAR(30) NOT NULL DEFAULT 'credit-card',
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE order_items (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders (id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products (id)
);

CREATE TABLE page_views (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  session_id VARCHAR(64) NOT NULL,
  page_path VARCHAR(255) NOT NULL,
  referrer_source VARCHAR(80) NOT NULL DEFAULT 'direct',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_page_views_created (created_at),
  INDEX idx_page_views_session (session_id),
  INDEX idx_page_views_path (page_path)
);

INSERT INTO permissions (name, slug, module) VALUES
  ('View dashboard', 'dashboard.view', 'dashboard'),
  ('View users', 'users.view', 'users'),
  ('Create users', 'users.create', 'users'),
  ('Edit users', 'users.edit', 'users'),
  ('Delete users', 'users.delete', 'users'),
  ('View products', 'products.view', 'products'),
  ('Create products', 'products.create', 'products'),
  ('Edit products', 'products.edit', 'products'),
  ('Delete products', 'products.delete', 'products'),
  ('Create own listings', 'listings.create', 'listings'),
  ('View own listings', 'listings.view_own', 'listings'),
  ('Edit own listings', 'listings.edit_own', 'listings'),
  ('View orders', 'orders.view', 'orders'),
  ('Manage roles', 'roles.manage', 'roles')
ON DUPLICATE KEY UPDATE name = VALUES(name), module = VALUES(module);

INSERT IGNORE INTO role_permissions (role_id, permission_id)
SELECT r.id, p.id
FROM roles r
JOIN permissions p ON (
  (r.slug = 'super_admin')
  OR (r.slug = 'admin' AND p.slug != 'roles.manage')
  OR (r.slug = 'manager' AND p.slug IN ('dashboard.view', 'users.view', 'products.view', 'products.create', 'products.edit', 'orders.view'))
  OR (r.slug = 'support' AND p.slug IN ('dashboard.view', 'products.view', 'orders.view'))
  OR (r.slug = 'seller' AND p.slug IN ('listings.create', 'listings.view_own', 'listings.edit_own'))
);
