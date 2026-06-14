-- Run once on an existing database created before seller listings support.

ALTER TABLE products ADD COLUMN seller_id INT DEFAULT NULL AFTER listing_id;
ALTER TABLE products ADD CONSTRAINT fk_products_seller FOREIGN KEY (seller_id) REFERENCES users (id) ON DELETE SET NULL;

INSERT INTO permissions (name, slug, module) VALUES
  ('Create own listings', 'listings.create', 'listings'),
  ('View own listings', 'listings.view_own', 'listings'),
  ('Edit own listings', 'listings.edit_own', 'listings')
ON DUPLICATE KEY UPDATE name = VALUES(name), module = VALUES(module);

INSERT IGNORE INTO role_permissions (role_id, permission_id)
SELECT r.id, p.id
FROM roles r
JOIN permissions p ON p.slug IN ('listings.create', 'listings.view_own', 'listings.edit_own')
WHERE r.slug = 'seller';
