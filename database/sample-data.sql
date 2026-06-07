INSERT INTO categories (name, slug) VALUES
  ('Prams & Strollers', 'prams-strollers'),
  ('Travel & Sleep', 'travel-sleep'),
  ('Breast Pumps', 'breast-pumps'),
  ('Feeding', 'feeding'),
  ('Nursery Furniture', 'nursery-furniture'),
  ('Sleep', 'sleep'),
  ('Car Seats', 'car-seats'),
  ('Safety', 'safety'),
  ('High Chairs', 'high-chairs'),
  ('Bassinet', 'bassinet')
ON DUPLICATE KEY UPDATE name = VALUES(name);

INSERT INTO products (listing_id, seller_name, brand, name, slug, price, item_condition, location, description, image, status) VALUES
  (
    'PLB-584726',
    'Sarah M.',
    'Chicco',
    'Compact Baby Pram',
    'chicco-pram',
    4500.00,
    'Like New',
    'Sandton, Johannesburg',
    'Chicco compact pram, used for four months. Folds flat, canopy and harness in good nick.',
    'assets/images/gallery/products/recommended/chicco-pram.png',
    'live'
  ),
  (
    'PLB-591204',
    'Lerato N.',
    'Medela',
    'Electric Breast Pump',
    'breast-pump',
    2800.00,
    'Like New',
    'Sea Point, Cape Town',
    'Medela electric pump, used for three months. All parts included and cleaned.',
    'assets/images/gallery/products/recommended/breast-pump.png',
    'live'
  ),
  (
    'PLB-578901',
    'Priya K.',
    'Stokke',
    'Wooden Baby Cot',
    'baby-cot',
    3200.00,
    'Good',
    'Umhlanga, Durban',
    'Stokke wooden cot. Mattress included. One scuff on the side rail.',
    'assets/images/gallery/products/recommended/baby-cot.png',
    'live'
  ),
  (
    'PLB-602118',
    'Thabo M.',
    'Nuna',
    'Group 0+ Car Seat',
    'car-seat',
    3500.00,
    'Like New',
    'Centurion, Pretoria',
    'Nuna Group 0+ seat, never been in an accident. Isofix base included.',
    'assets/images/gallery/products/recommended/car-seat.jpg',
    'review'
  ),
  (
    'PLB-595447',
    'Chris W.',
    'Chicco',
    'Convertible High Chair',
    'high-chair',
    1800.00,
    'Good',
    'Rosebank, Johannesburg',
    'Chicco high chair that converts to a booster. Tray comes off for cleaning.',
    'assets/images/gallery/products/recommended/high-chair.png',
    'live'
  ),
  (
    'PLB-610882',
    'Kate W.',
    'Bugaboo',
    'Bugaboo Fox 5 Stroller',
    'bugaboo-fox',
    12500.00,
    'Good',
    'Gardens, Cape Town',
    'Bugaboo Fox 5 with bassinet. One child, kept indoors.',
    'assets/images/gallery/product-images/01.png',
    'live'
  )
ON DUPLICATE KEY UPDATE
  seller_name = VALUES(seller_name),
  brand = VALUES(brand),
  name = VALUES(name),
  price = VALUES(price),
  item_condition = VALUES(item_condition),
  location = VALUES(location),
  description = VALUES(description),
  image = VALUES(image),
  status = VALUES(status);

INSERT IGNORE INTO product_categories (product_id, category_id)
SELECT p.id, c.id
FROM products p
JOIN categories c ON (
  (p.slug = 'chicco-pram' AND c.slug IN ('prams-strollers', 'travel-sleep'))
  OR (p.slug = 'breast-pump' AND c.slug IN ('breast-pumps', 'feeding'))
  OR (p.slug = 'baby-cot' AND c.slug IN ('nursery-furniture', 'sleep'))
  OR (p.slug = 'car-seat' AND c.slug IN ('car-seats', 'safety'))
  OR (p.slug = 'high-chair' AND c.slug IN ('high-chairs', 'feeding'))
  OR (p.slug = 'bugaboo-fox' AND c.slug IN ('prams-strollers', 'travel-sleep'))
);
