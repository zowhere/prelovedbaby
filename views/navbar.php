<?php
$siteBase = $siteBase ?? '';
if (!function_exists('getCartCount')) {
    require_once APP_ROOT . '/lib/cart.php';
}
if (!function_exists('isLoggedIn')) {
    require_once APP_ROOT . '/lib/auth.php';
}
if (!function_exists('loadNavCategories')) {
    require_once APP_ROOT . '/lib/categories.php';
}
$currentUser = getCurrentUser();
$navCategories = loadNavCategories();
$featuredNavCategories = array_values(array_filter(
    $navCategories,
    static function ($category) {
        return getCategoryImagePath($category['slug']) !== null;
    }
));
$featuredNavCategories = array_slice($featuredNavCategories, 0, 2);
?>
<nav class="navbar navbar-expand-xl border-bottom py-3">
      <div class="container px-3">
        <a class="navbar-brand d-none d-xl-flex" href="<?= htmlspecialchars($siteBase) ?>index.php">
          <span class="logo-text">PreLoved Baby</span>
        </a>
        <button type="button" class="d-xl-none btn-menu-close" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar">
          <i class="bi bi-list"></i>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
          <div class="offcanvas-header">
            <span class="logo-text">PreLoved Baby</span>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="nav-search p-3 pt-0 border-bottom d-flex d-xl-none">
            <form class="position-relative w-100">
              <input type="text" class="form-control nav-search-control ps-5 border-0" placeholder="Search prams, bassinets, breast pumps & more">
              <span class="position-absolute top-50 start-0 translate-middle-y"><i class="bi bi-search fs-6 ms-3"></i></span>
           </form>
          </div>
          <div class="offcanvas-body p-0">
            <ul class="navbar-nav mx-auto gap-0 gap-xl-2">
              <li class="nav-item">
                <a class="nav-link" href="<?= htmlspecialchars($siteBase) ?>index.php">
                  <span class="parent-menu-name">Home</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <span class="parent-menu-name">Browse Listings</span>
                  <span class="parent-menu-icon ms-2"><i class="bi bi-chevron-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/shop.php">All Listings</a></li>
                  <?php if (!empty($navCategories)) : ?>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <?php foreach ($navCategories as $category) : ?>
                  <li><a class="dropdown-item" href="<?= categoryShopUrl($category['slug'], $siteBase) ?>"><?= htmlspecialchars($category['name']) ?></a></li>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
                  </li>
              <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <span class="parent-menu-name">Baby Essentials</span>
                  <span class="parent-menu-icon ms-2"><i class="bi bi-chevron-down"></i></span>
                </a>
                <div class="dropdown-menu mega-menu p-lg-3 start-0 end-0 rounded-0">
                  <div class="container px-3">
                   <div class="row row-cols-1 row-cols-lg-3 g-3">
                    <div class="col">
                      <div class="list-group list-group-flush">
                        <h5 class="list-group-item mega-menu-title px-0 mb-0">Essential Baby Gear</h5>
                        <?php foreach ($navCategories as $category) : ?>
                        <a href="<?= categoryShopUrl($category['slug'], $siteBase) ?>" class="list-group-item mega-menu-link px-0"><?= htmlspecialchars($category['name']) ?></a>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <?php foreach ($featuredNavCategories as $category) :
                        $imagePath = getCategoryImagePath($category['slug']);
                        if ($imagePath === null) {
                            continue;
                        }
                    ?>
                    <div class="col">
                      <div class="list-group">
                        <div class="card border">
                          <div class="card-body p-2">
                            <div class="position-relative">
                              <img src="<?= htmlspecialchars($siteBase) ?><?= htmlspecialchars($imagePath) ?>" class="img-fluid rounded" alt="<?= htmlspecialchars($category['name']) ?>">
                              <div class="position-absolute bottom-0 end-0 start-0 m-3">
                                <a href="<?= categoryShopUrl($category['slug'], $siteBase) ?>" class="btn border bg-white px-4 rounded-3 w-100"><?= htmlspecialchars($category['name']) ?></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                 </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <span class="parent-menu-name">Become Seller</span>
                  <span class="parent-menu-icon ms-2"><i class="bi bi-chevron-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/auth/register-seller.php">Register as a seller</a></li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/how-it-works.php">How It Works</a></li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/seller-guide.php">Seller Guide</a></li>
                  <?php if (isLoggedIn()): ?>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/account/profile.php">My Profile</a></li>
                  <?php else: ?>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/auth/login.php">Login</a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= htmlspecialchars($siteBase) ?>pages/about.php">
                  <span class="parent-menu-name">About</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= htmlspecialchars($siteBase) ?>pages/contact.php">
                  <span class="parent-menu-name">Contact</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="right-links nav gap-2 d-flex">
          <a class="nav-link" href="javascript:;" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-search"></i></a>
          <div class="dropdown">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown" aria-label="Account">
              <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <?php if (isLoggedIn()): ?>
              <li class="px-3 py-2 text-body-secondary small">Signed in as <?= htmlspecialchars($currentUser['name']) ?></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/account/profile.php">My Profile</a></li>
              <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/account/orders.php">My Orders</a></li>
              <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/account/addresses.php">Addresses</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/auth/logout.php">Logout</a></li>
              <?php else: ?>
              <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/auth/login.php">Login</a></li>
              <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/auth/register.php">Register</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>pages/auth/register-seller.php">Register as a seller</a></li>
              <?php endif; ?>
            </ul>
          </div>
<a class="nav-link position-relative" data-bs-toggle="offcanvas" href="#offcanvasCart"><?php include __DIR__ . '/cart-nav-badge.php'; ?></a>
        </div>
      </div>
    </nav>
