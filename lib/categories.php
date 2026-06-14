<?php

require_once __DIR__ . '/db.php';

function categorySlugFromName($name)
{
    $slug = strtolower(trim((string) $name));
    $slug = str_replace('&', 'and', $slug);
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');

    return $slug !== '' ? $slug : 'category';
}

function categoryShopUrl($slug, $siteBase = '')
{
    return htmlspecialchars($siteBase) . 'pages/shop.php?category=' . urlencode((string) $slug);
}

function getCategoryImagePath($slug)
{
    $images = [
        'breast-pumps' => 'images/gallery/categories/baby/breast-pumps.jpg',
        'prams-strollers' => 'images/gallery/categories/baby/prams.jpg',
        'car-seats' => 'images/gallery/categories/baby/car-seats.jpg',
        'nursery-furniture' => 'images/gallery/categories/baby/nursery-furniture.jpg',
        'bassinet' => 'images/gallery/categories/baby/bassinets.jpg',
        'bassinets' => 'images/gallery/categories/baby/bassinets.jpg',
    ];

    return $images[$slug] ?? null;
}

function getCategoriesWithCounts()
{
    return getPdo()->query(
        'SELECT c.id, c.name, c.slug, COUNT(pc.product_id) AS listing_count
         FROM categories c
         LEFT JOIN product_categories pc ON pc.category_id = c.id
         GROUP BY c.id
         ORDER BY c.name'
    )->fetchAll();
}

function getCategoryById($id)
{
    $stmt = getPdo()->prepare('SELECT id, name, slug FROM categories WHERE id = ? LIMIT 1');
    $stmt->execute([(int) $id]);

    return $stmt->fetch() ?: null;
}

function getCategoryBySlug($slug)
{
    $stmt = getPdo()->prepare('SELECT id, name, slug FROM categories WHERE slug = ? LIMIT 1');
    $stmt->execute([(string) $slug]);

    return $stmt->fetch() ?: null;
}

function categorySlugExists($slug, $excludeId = null)
{
    $sql = 'SELECT id FROM categories WHERE slug = ?';
    $params = [(string) $slug];

    if ($excludeId !== null) {
        $sql .= ' AND id != ?';
        $params[] = (int) $excludeId;
    }

    $stmt = getPdo()->prepare($sql . ' LIMIT 1');
    $stmt->execute($params);

    return (bool) $stmt->fetch();
}

function createCategory($name, $slug = null)
{
    $name = trim((string) $name);
    if ($name === '') {
        throw new InvalidArgumentException('Category name is required.');
    }

    $slug = $slug !== null && trim((string) $slug) !== ''
        ? trim((string) $slug)
        : categorySlugFromName($name);

    if (categorySlugExists($slug)) {
        throw new InvalidArgumentException('A category with that slug already exists.');
    }

    $stmt = getPdo()->prepare('INSERT INTO categories (name, slug) VALUES (?, ?)');
    $stmt->execute([$name, $slug]);

    return (int) getPdo()->lastInsertId();
}

function updateCategory($id, $name, $slug = null)
{
    $id = (int) $id;
    $name = trim((string) $name);
    if ($name === '') {
        throw new InvalidArgumentException('Category name is required.');
    }

    $existing = getCategoryById($id);
    if (!$existing) {
        throw new InvalidArgumentException('Category not found.');
    }

    $slug = $slug !== null && trim((string) $slug) !== ''
        ? trim((string) $slug)
        : categorySlugFromName($name);

    if (categorySlugExists($slug, $id)) {
        throw new InvalidArgumentException('A category with that slug already exists.');
    }

    $stmt = getPdo()->prepare('UPDATE categories SET name = ?, slug = ? WHERE id = ?');
    $stmt->execute([$name, $slug, $id]);

    return true;
}

function deleteCategory($id)
{
    $id = (int) $id;
    $category = getCategoryById($id);
    if (!$category) {
        return ['ok' => false, 'message' => 'Category not found.'];
    }

    $stmt = getPdo()->prepare(
        'SELECT COUNT(*) FROM product_categories WHERE category_id = ?'
    );
    $stmt->execute([$id]);
    $listingCount = (int) $stmt->fetchColumn();

    if ($listingCount > 0) {
        return [
            'ok' => false,
            'message' => 'Cannot delete this category while ' . $listingCount . ' listing(s) are still linked. Reassign those products to another category first.',
        ];
    }

    $delete = getPdo()->prepare('DELETE FROM categories WHERE id = ?');
    $delete->execute([$id]);

    return ['ok' => true, 'message' => 'Category deleted.'];
}

function filterProductsByCategorySlug(array $products, $slug)
{
    $slug = trim((string) $slug);
    if ($slug === '') {
        return $products;
    }

    $category = getCategoryBySlug($slug);
    if (!$category) {
        return [];
    }

    $categoryName = $category['name'];

    return array_values(array_filter(
        $products,
        static function ($product) use ($categoryName) {
            $categories = $product['categories'] ?? [];

            return in_array($categoryName, $categories, true);
        }
    ));
}

function loadNavCategories()
{
    try {
        return getCategoriesWithCounts();
    } catch (Throwable $e) {
        return [];
    }
}
