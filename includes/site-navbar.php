<?php
$siteBase = $siteBase ?? '';
if (!function_exists('getCartCount')) {
    require_once __DIR__ . '/cart.php';
}
?>
<nav class="navbar navbar-expand-xl border-bottom py-3">
      <div class="container px-3">
        <a class="navbar-brand d-none d-xl-flex" href="<?= htmlspecialchars($siteBase) ?>index.html">
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
                <a class="nav-link" href="<?= htmlspecialchars($siteBase) ?>index.html">
                  <span class="parent-menu-name">Home</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <span class="parent-menu-name">Browse Listings</span>
                  <span class="parent-menu-icon ms-2"><i class="bi bi-chevron-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html">All Listings</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html">Breast Pumps</a></li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html">Prams &amp; Strollers</a></li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html">Car Seats</a></li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html">Nursery Furniture</a></li>
                  <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html">Bassinets</a></li>
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
                        <a href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Breast Pumps</a>
                        <a href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Prams &amp; Strollers</a>
                        <a href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Car Seats</a>
                        <a href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Nursery Furniture</a>
                        <a href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html" class="list-group-item mega-menu-link px-0">Bassinets</a>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group">
                        <div class="card border">
                          <div class="card-body p-2">
                            <div class="position-relative">
                              <img src="<?= htmlspecialchars($siteBase) ?>assets/images/gallery/categories/baby/breast-pumps.jpg" class="img-fluid rounded" alt="Branded breast pumps">
                              <div class="position-absolute bottom-0 end-0 start-0 m-3">
                                <a href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html" class="btn border bg-white px-4 rounded-3 w-100">Breast Pumps</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group">
                        <div class="card border">
                          <div class="card-body p-2">
                            <div class="position-relative">
                              <img src="<?= htmlspecialchars($siteBase) ?>assets/images/gallery/categories/baby/prams.jpg" class="img-fluid rounded" alt="Prams and pushchairs">
                              <div class="position-absolute bottom-0 end-0 start-0 m-3">
                                <a href="<?= htmlspecialchars($siteBase) ?>shop-grid-left-sidebar.html" class="btn border bg-white px-4 rounded-3 w-100">Prams &amp; Pushchairs</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
                  <li class="nav-item dropdown">
                    <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between" href="javascript:;"
                      data-bs-toggle="dropdown">
                       <span>Account</span>
                       <span><i class="bi bi-chevron-right"></i></span>
                      </a>
                    <ul class="dropdown-menu submenu">
                      <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>account-orders.html">Orders</a></li>
                      <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>account-my-profile.html">Profile</a></li>
                      <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>account-addresses.html">Addresses</a></li>
                      <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>account-payment-methods.html">Payment Methods</a></li>
</ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between" href="javascript:;"
                      data-bs-toggle="dropdown">
                       <span>Authentication</span>
                       <span><i class="bi bi-chevron-right"></i></span>
                      </a>
                    <ul class="dropdown-menu submenu">
                      <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>auth-login.html">Login</a></li>
                      <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>auth-register.html">Register</a></li>
                      <li><a class="dropdown-item" href="<?= htmlspecialchars($siteBase) ?>auth-forgot-password.html">Forgot Password</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= htmlspecialchars($siteBase) ?>about-us.html">
                  <span class="parent-menu-name">About</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= htmlspecialchars($siteBase) ?>contact-us.html">
                  <span class="parent-menu-name">Contact</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="right-links nav gap-2 d-flex">
          <a class="nav-link" href="javascript:;" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-search"></i></a>
          <a class="nav-link" href="<?= htmlspecialchars($siteBase) ?>account-my-profile.html"><i class="bi bi-person-circle"></i></a>
<a class="nav-link position-relative" data-bs-toggle="offcanvas" href="#offcanvasCart"><?php include __DIR__ . '/cart-nav-badge.php'; ?></a>
        </div>
      </div>
    </nav>
