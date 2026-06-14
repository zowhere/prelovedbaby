<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>
<?php
$productId = $_GET['id'] ?? 'bugaboo-fox';
if (!isset($products[$productId])) {
    $productId = 'bugaboo-fox';
}
$product = $products[$productId];
$inCart = in_array($productId, $_SESSION['cart'], true);
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreLoved Baby</title>
  
	<link rel="icon" href="images/favicon.png" type="image/png">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
  
  <link rel="stylesheet" href="plugins/swiper/css/swiper-bundle.min.css">

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-icons.min.css">
  
  <link href="css/sass/style.css" rel="stylesheet">
  
</head>

<body>

  
  <?php include APP_ROOT . '/views/top-header.php'; ?>

<nav class="navbar navbar-expand-xl border-bottom py-3">
      <div class="container px-3">
        <a class="navbar-brand d-none d-xl-flex" href="index.php">
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
                <a class="nav-link" href="index.php">
                  <span class="parent-menu-name">Home</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <span class="parent-menu-name">Browse Listings</span>
                  <span class="parent-menu-icon ms-2"><i class="bi bi-chevron-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.php">All Listings</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.php">Breast Pumps</a></li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.php">Prams &amp; Strollers</a></li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.php">Car Seats</a></li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.php">Nursery Furniture</a></li>
                  <li><a class="dropdown-item" href="shop-grid-left-sidebar.php">Bassinets</a></li>
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
                        <a href="shop-grid-left-sidebar.php" class="list-group-item mega-menu-link px-0">Breast Pumps</a>
                        <a href="shop-grid-left-sidebar.php" class="list-group-item mega-menu-link px-0">Prams &amp; Strollers</a>
                        <a href="shop-grid-left-sidebar.php" class="list-group-item mega-menu-link px-0">Car Seats</a>
                        <a href="shop-grid-left-sidebar.php" class="list-group-item mega-menu-link px-0">Nursery Furniture</a>
                        <a href="shop-grid-left-sidebar.php" class="list-group-item mega-menu-link px-0">Bassinets</a>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group">
                        <div class="card border">
                          <div class="card-body p-2">
                            <div class="position-relative">
                              <img src="images/gallery/categories/baby/breast-pumps.jpg" class="img-fluid rounded" alt="Branded breast pumps">
                              <div class="position-absolute bottom-0 end-0 start-0 m-3">
                                <a href="shop-grid-left-sidebar.php" class="btn border bg-white px-4 rounded-3 w-100">Breast Pumps</a>
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
                              <img src="images/gallery/categories/baby/prams.jpg" class="img-fluid rounded" alt="Prams and pushchairs">
                              <div class="position-absolute bottom-0 end-0 start-0 m-3">
                                <a href="shop-grid-left-sidebar.php" class="btn border bg-white px-4 rounded-3 w-100">Prams &amp; Pushchairs</a>
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
                      <li><a class="dropdown-item" href="account-orders.php">Orders</a></li>
                      <li><a class="dropdown-item" href="account-my-profile.php">Profile</a></li>
                      <li><a class="dropdown-item" href="account-addresses.php">Addresses</a></li>
                      <li><a class="dropdown-item" href="account-payment-methods.php">Payment Methods</a></li>
</ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex align-items-center justify-content-between" href="javascript:;"
                      data-bs-toggle="dropdown">
                       <span>Authentication</span>
                       <span><i class="bi bi-chevron-right"></i></span>
                      </a>
                    <ul class="dropdown-menu submenu">
                      <li><a class="dropdown-item" href="auth-login.php">Login</a></li>
                      <li><a class="dropdown-item" href="auth-register.php">Register</a></li>
                      <li><a class="dropdown-item" href="auth-forgot-password.php">Forgot Password</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about-us.php">
                  <span class="parent-menu-name">About</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact-us.php">
                  <span class="parent-menu-name">Contact</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="right-links nav gap-2 d-flex">
          <a class="nav-link" href="javascript:;" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-search"></i></a>
          <a class="nav-link" href="account-my-profile.php"><i class="bi bi-person-circle"></i></a>
<a class="nav-link position-relative" data-bs-toggle="offcanvas" href="#offcanvasCart"><?php include APP_ROOT . '/views/cart-nav-badge.php'; ?></a>
        </div>
      </div>
    </nav>
    

  
  <main class="main-content">

    
    <section class="py-4 section-breadcrumb">
      <div class="container px-3">
	  <h2 class="d-none">Product Details</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="javascript:;" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item"><a href="javascript:;" class="breadcrumb-link">Women</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Dark grey shirt</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5 product-details">
      <div class="container px-3">
        <div class="row g-5">
           <div class="col-12 col-lg-6">
            <div class="product-images-grid">
              <div class="product-zoom-images">
                <div class="row row-cols-2 g-4">
                  <div class="col">
                    <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="images/gallery/product-images/01.png">
                      <img src="images/gallery/product-images/01.png" class="img-fluid rounded-3" alt="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="images/gallery/product-images/02.png">
                      <img src="images/gallery/product-images/02.png" class="img-fluid rounded-3" alt="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="images/gallery/product-images/03.png">
                      <img src="images/gallery/product-images/03.png" class="img-fluid rounded-3" alt="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="images/gallery/product-images/04.png">
                      <img src="images/gallery/product-images/04.png" class="img-fluid rounded-3" alt="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="images/gallery/product-images/05.png">
                      <img src="images/gallery/product-images/05.png" class="img-fluid rounded-3" alt="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="images/gallery/product-images/02.png">
                      <img src="images/gallery/product-images/02.png" class="img-fluid rounded-3" alt="">
                    </div>
                  </div>
                </div>
              </div>
             </div>
           </div>
           <div class="col-12 col-lg-6">
              <div class="product-details">
                <p class="mb-1"><?= htmlspecialchars($product['brand']) ?> &middot; <?= htmlspecialchars($product['condition']) ?></p>
                <h2 class="mb-0"><?= htmlspecialchars($product['name']) ?></h2>
                <?php $sellerProfileUrl = ($product['seller'] === 'Sarah M.') ? 'seller-profile.php' : 'contact-us.php'; ?>
                <?php $sellerFirstName = explode(' ', $product['seller'])[0]; ?>
                <?php $collectionArea = trim(explode(',', $product['location'])[0]); ?>
                <div class="d-flex align-items-center gap-2 my-3 flex-wrap">
                  <a href="<?= $sellerProfileUrl ?>" class="listing-seller d-inline-flex align-items-center gap-2 text-decoration-none">
                    <img src="<?= htmlspecialchars($product['seller_avatar']) ?>" class="seller-avatar" alt="<?= htmlspecialchars($product['seller']) ?>" width="36" height="36" loading="lazy">
                    <span>
                      <span class="d-block font-14 fw-semibold text-body"><?= htmlspecialchars($product['seller']) ?></span>
                      <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> <?= number_format($product['seller_rating'], 1) ?> · <?= (int) $product['seller_reviews'] ?> reviews</span>
                    </span>
                  </a>
                </div>
                 <div class="product-price d-flex align-items-center gap-2 flex-wrap">
                    <span class="fs-3 fw-semibold"><?= formatPrice($product['price']) ?></span>
                    <span class="badge badge-pill bg-light text-dark border rounded-5">Preloved</span>
                 </div>
                 <p class="product-short-desc mt-3 mb-0"><?= htmlspecialchars($product['short_desc']) ?></p>

                  <div class="seller-profile-card mt-4">
                    <div class="d-flex align-items-start gap-3">
                      <img src="<?= htmlspecialchars($product['seller_avatar']) ?>" class="seller-avatar seller-avatar-lg" alt="<?= htmlspecialchars($product['seller']) ?>" width="72" height="72" loading="lazy">
                      <div class="flex-grow-1">
                        <div class="d-flex align-items-start justify-content-between gap-2 flex-wrap">
                          <div>
                            <h6 class="mb-1"><a href="<?= $sellerProfileUrl ?>" class="text-body text-decoration-none"><?= htmlspecialchars($product['seller']) ?></a></h6>
                            <p class="seller-meta mb-2"><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($product['location']) ?> &middot; Member since 2023</p>
                          </div>
                          <a href="<?= $sellerProfileUrl ?>" class="btn btn-sm btn-outline-dark">View profile</a>
                        </div>
                        <div class="seller-rating-breakdown mt-3">
                          <div class="rating-row">
                            <span class="rating-label">Communication</span>
                            <div class="progress"><div class="progress-bar bg-dark" style="width: 98%;"></div></div>
                            <span class="rating-score">4.9</span>
                          </div>
                          <div class="rating-row">
                            <span class="rating-label">Item as described</span>
                            <div class="progress"><div class="progress-bar bg-dark" style="width: 96%;"></div></div>
                            <span class="rating-score">4.8</span>
                          </div>
                          <div class="rating-row">
                            <span class="rating-label">Dispatch speed</span>
                            <div class="progress"><div class="progress-bar bg-dark" style="width: 94%;"></div></div>
                            <span class="rating-score">4.7</span>
                          </div>
                        </div>
                        <p class="seller-listings-count mb-0 mt-3">1 active listing &middot; Usually responds within 2 hours</p>
                      </div>
                    </div>
                  </div>

                  <div class="product-size mt-4">
                    <p class="mb-2">Condition</p>
                    <div class="product-size-list d-flex align-items-center gap-3 flex-wrap">
                       <div class="product-size-list-item">
                         <input type="radio" class="btn-check" name="options-condition" id="condition-like-new"<?= $product['condition'] === 'Like New' ? ' checked' : '' ?>>
                         <label class="btn btn-outline-dark btn-product-size" for="condition-like-new">Like New</label>
                       </div>
                       <div class="product-size-list-item">
                        <input type="radio" class="btn-check" name="options-condition" id="condition-good"<?= $product['condition'] === 'Good' ? ' checked' : '' ?>>
                        <label class="btn btn-outline-dark btn-product-size" for="condition-good">Good</label>
                      </div>
                      <div class="product-size-list-item">
                        <input type="radio" class="btn-check" name="options-condition" id="condition-fair"<?= $product['condition'] === 'Fair' ? ' checked' : '' ?>>
                        <label class="btn btn-outline-dark btn-product-size" for="condition-fair">Fair</label>
                      </div>
                    </div>
                  </div>

                  <div class="mt-4">
                    <p class="mb-2">Suitable Age</p>
                    <p class="mb-0 font-14 text-body-secondary"><?= htmlspecialchars($product['age']) ?></p>
                  </div>

                  <div class="mt-4">
                    <p class="mb-2">Availability</p>
                    <p class="mb-0 font-14 text-body-secondary"><span class="fw-semibold">1 item</span>, only one available</p>
                  </div>

                  <div class="product-cart-buttons d-grid d-md-flex align-items-center gap-3 mt-4">
                    <?php if ($inCart): ?>
                     <a href="shopping-cart.php" class="btn btn-outline-dark border border-2 rounded-5 py-2 px-5 d-flex align-items-center justify-content-center gap-2 w-100"><i class="bi bi-basket2"></i>View in cart</a>
                    <?php else: ?>
                     <form action="cart-actions.php" method="post" class="flex-fill m-0">
                       <input type="hidden" name="action" value="add">
                       <input type="hidden" name="id" value="<?= htmlspecialchars($productId) ?>">
                       <input type="hidden" name="redirect" value="product-detail-grid.php?id=<?= urlencode($productId) ?>">
                       <button type="submit" class="btn btn-dark border border-2 rounded-5 border-dark py-2 px-5 d-flex align-items-center justify-content-center gap-2 w-100"><i class="bi bi-cart-plus"></i>Add to cart</button>
                     </form>
                    <?php endif; ?>
                     <a href="contact-us.php" class="btn border border-2 py-2 px-5 rounded-5 d-flex align-items-center justify-content-center gap-2 text-decoration-none"><i class="bi bi-chat-dots"></i>Message <?= htmlspecialchars($sellerFirstName) ?></a>
                  </div>

                  <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center gap-2 font-14"><i class="bi bi-truck"></i>
                      <span><span class="fw-semibold">Courier delivery:</span> <?= $courierPartners ?> nationwide. Collection available in <?= htmlspecialchars($collectionArea) ?>.</span></p>
                    <p class="mb-2 d-flex align-items-center gap-2 font-14"><i class="bi bi-alarm"></i><span><span class="fw-semibold">Estimated Delivery:</span> <?= $courierPartnersShort ?>. Major cities 2-4 days, regional 4-7 days</span></p>
                  </div>
                  <hr class="my-4 border-dark border-opacity-50">
                  <div class="">
                    <p class="mb-2 font-14"><span class="fw-semibold">Listing ID:</span> <?= htmlspecialchars($product['listing_id']) ?></p>
                    <p class="mb-2 font-14"><span class="fw-semibold">Seller:</span> <a href="seller-profile.php" class="link-secondary"><?= htmlspecialchars($product['seller']) ?></a></p>
                    <p class="mb-2 font-14"><span class="fw-semibold">Listed:</span> 1 week ago</p>
                    <p class="mb-2 font-14"><span class="fw-semibold">Categories:</span>
                       <?php foreach ($product['categories'] as $i => $category) : ?>
                       <?php if ($i > 0) : ?>, <?php endif; ?>
                       <a href="shop-grid-left-sidebar.php" class="link-secondary"><?= htmlspecialchars($category) ?></a>
                       <?php endforeach; ?>
                      </p>
                  </div>
              </div>
           </div>
        </div>
 
        <div class="tabular-product-details mt-5">
          <div class="table-responsive">
            <ul class="nav nav-pills mb-4 overflow-x-auto justify-content-center gap-3">
              <li class="nav-item">
                <button class="nav-link rounded-5 px-5 fw-semibold" data-bs-toggle="pill" data-bs-target="#description"
                  type="button">Description</button>
              </li>
              <li class="nav-item">
                <button class="nav-link active rounded-5 px-5 fw-semibold" data-bs-toggle="pill" data-bs-target="#customer-reviews"
                  type="button">Reviews</button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-5 px-5 fw-semibold" data-bs-toggle="pill" data-bs-target="#shipping-returns"
                  type="button">Shipping</button>
              </li>
            </ul>
          </div>
          <div class="tab-content border p-4 rounded-3">
            <div class="tab-pane fade show" id="description">
              <h5><?= htmlspecialchars($product['name']) ?></h5>
              <?php include APP_ROOT . '/views/product-description.php'; ?>
              <p class="text-para mt-3 mb-0">Collection in <?= htmlspecialchars(explode(',', $product['location'])[0]) ?>, or courier via <?= $courierPartnersShort ?>.</p>
               </div>
               <div class="tab-pane fade show active" id="customer-reviews">
                <div>
                  <h5 class="mb-4">Reviews for <?= htmlspecialchars($product['seller']) ?></h5>
                  <div class="hstack gap-md-5 gap-4 flex-column flex-lg-row">
                    <div class="text-center flex-shrink-0">
                      <div id="rating-number">
                          <h2 class="mb-2">5.0</h2>
                          <div class="rating-star">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                          </div>
                          <p class="mb-0">(14 seller ratings)</p>
                      </div>
                    </div>
                    <div class="vr d-none d-lg-flex"></div>
                    <div class="w-100 seller-rating-breakdown">
                        <div class="rating-row">
                          <span class="rating-label">Communication</span>
                          <div class="progress"><div class="progress-bar bg-dark" style="width: 100%;"></div></div>
                          <span class="rating-score">5.0</span>
                        </div>
                        <div class="rating-row">
                          <span class="rating-label">Item as described</span>
                          <div class="progress"><div class="progress-bar bg-dark" style="width: 98%;"></div></div>
                          <span class="rating-score">4.9</span>
                        </div>
                        <div class="rating-row">
                          <span class="rating-label">Dispatch speed</span>
                          <div class="progress"><div class="progress-bar bg-dark" style="width: 96%;"></div></div>
                          <span class="rating-score">4.8</span>
                        </div>
                        <div class="rating-row">
                          <span class="rating-label">Overall experience</span>
                          <div class="progress"><div class="progress-bar bg-dark" style="width: 100%;"></div></div>
                          <span class="rating-score">5.0</span>
                        </div>
                    </div>
                    <div class="vr d-none d-lg-flex"></div>
                    <div class="leave-a-rating flex-shrink-0">
                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#reviewModal" class="btn btn-outline-dark px-4 py-2">Rate this seller</a>
                    </div>
                  </div>
                  
                  <div class="customer-reviews-list mt-5">
                    <div class="customer-reviews-list-item border-top py-4">
                       <div class="d-flex align-items-start gap-3">
                        <div class="customer-pic">
                          <span>N</span>
                        </div>
                        <div class="flex-grow-1">
                          <div class="rating-star font-14 mb-1">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                          </div>
                          <h6 class="mb-0 customer-name">Nomsa K.</h6>
                        </div>
                        <div class="review-date">
                          <span>3 february 2025</span>
                        </div>
                      </div>
                      <div class="review-description mt-2">
                         <div class="seller-review-tags mb-2">
                           <span class="seller-review-tag">Communication 5/5</span>
                           <span class="seller-review-tag">Item 5/5</span>
                           <span class="seller-review-tag">Dispatch 5/5</span>
                         </div>
                         <p class="mb-0">Collected the stroller on a Saturday morning. Fold mechanism works smoothly and the bassinet was spotless. Seller waited while we checked everything over.</p>
                           <div class="d-flex align-items-center justify-content-end gap-3">
                             <span>Helpful?</span>
                             <button type="button" class="btn btn-sm btn-light rounded-3 border d-flex align-items-center gap-1"><i class="bi bi-hand-thumbs-up"></i><span>6</span></button>
                           </div>
                      </div>
                    </div>
                    <div class="customer-reviews-list-item border-top py-4">
                      <div class="d-flex align-items-start gap-3">
                       <div class="customer-pic">
                         <span>J</span>
                       </div>
                       <div class="flex-grow-1">
                         <div class="rating-star font-14 mb-1">
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                           <i class="bi bi-star-fill text-warning"></i>
                         </div>
                         <h6 class="mb-0 customer-name">James P.</h6>
                       </div>
                       <div class="review-date">
                         <span>22 january 2025</span>
                       </div>
                     </div>
                     <div class="review-description mt-2">
                        <div class="seller-review-tags mb-2">
                          <span class="seller-review-tag">Communication 5/5</span>
                          <span class="seller-review-tag">Item 4/5</span>
                          <span class="seller-review-tag">Dispatch 5/5</span>
                        </div>
                        <p class="mb-0">Replied on WhatsApp within an hour when I asked about collection in Constantia. Listing photos matched what we picked up.</p>
                           <div class="d-flex align-items-center justify-content-end gap-3">
                            <span>Helpful?</span>
                            <button type="button" class="btn btn-sm btn-light rounded-3 border d-flex align-items-center gap-1"><i class="bi bi-hand-thumbs-up"></i><span>8</span></button>
                          </div>
                     </div>
                   </div>
                   <div class="customer-reviews-list-item border-top py-4 border-bottom">
                    <div class="d-flex align-items-start gap-3">
                     <div class="customer-pic">
                       <span>T</span>
                     </div>
                     <div class="flex-grow-1">
                       <div class="rating-star font-14 mb-1">
                         <i class="bi bi-star-fill text-warning"></i>
                         <i class="bi bi-star-fill text-warning"></i>
                         <i class="bi bi-star-fill text-warning"></i>
                         <i class="bi bi-star-fill text-warning"></i>
                         <i class="bi bi-star-fill text-warning"></i>
                       </div>
                       <h6 class="mb-0 customer-name">Thandi M.</h6>
                     </div>
                     <div class="review-date">
                       <span>8 january 2025</span>
                     </div>
                   </div>
                   <div class="review-description mt-2">
                      <div class="seller-review-tags mb-2">
                        <span class="seller-review-tag">Communication 5/5</span>
                        <span class="seller-review-tag">Item 5/5</span>
                        <span class="seller-review-tag">Dispatch 5/5</span>
                      </div>
                      <p class="mb-0">Bought a cot from her before this. Both times the listing matched what arrived. Courier booked the day I paid, tracking sent straight away.</p>
                         <div class="d-flex align-items-center justify-content-end gap-3">
                          <span>Helpful?</span>
                          <button type="button" class="btn btn-sm btn-light rounded-3 border d-flex align-items-center gap-1"><i class="bi bi-hand-thumbs-up"></i><span>9</span></button>
                        </div>
                   </div>
                 </div>
                  <div class="text-center mt-4">
                    <a href="<?= $sellerProfileUrl ?>" class="btn btn-outline-dark px-4 py-2">See all reviews</a>
                   </div>
                  </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="shipping-returns">
                <h5 class="mb-3">Shipping &amp; Collection</h5>
                <ul>
                  <li><b>Courier delivery:</b> Ship nationwide with <?= $courierPartners ?>. Rates calculated at checkout based on your location.</li>
                  <li><b>Collection:</b> Available in <?= htmlspecialchars($collectionArea ?? trim(explode(',', $product['location'])[0])) ?>. Arrange collection with the seller after purchase.</li>
                  <li><b>Processing:</b> Seller dispatches within 1-2 business days of confirmed payment.</li>
                  <li><b>Tracking:</b> You will receive a tracking number once the item is shipped.</li>
                </ul>
                <h5 class="mb-3">If something's wrong</h5>
                <ul class="mb-0">
                  <li><b>Not as described?</b> Message us within 48 hours with photos.</li>
                  <li><b>Refunds:</b> Sorted within 5-7 business days if the claim checks out.</li>
                </ul>
            </div></div>
        </div>
      </div>
    </section>
    

    
    <section class="py-5">
      <div class="container px-3">
        <div class="d-flex align-items-center justify-content-between mb-5">
          <h2 class="section-title">More from other sellers</h2>
          <div class="recommended-products-swiper-nav d-flex align-items-center gap-3">
            <div class="slide-icon recommended-products-slider-icon-left"><i class="bi bi-arrow-left"></i></div>
            <div class="slide-icon recommended-products-slider-icon-right"><i class="bi bi-arrow-right"></i></div>
          </div>
        </div>
        <div class="recommended-products">
          <div class="swiper recommended-products-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail-grid.php">
                        <img src="images/gallery/products/recommended/chicco-pram.png" class="product-img img-fluid rounded-3" alt="Compact Baby Pram">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Chicco</p>
                        <h3 class="product-name mb-1">Compact Baby Pram</h3>
                        <p class="mb-1 product-price">R 4,500</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/sarah-m.jpg" class="seller-avatar" alt="Sarah M." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Sarah M.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.9 · 4 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Sandton, Johannesburg</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/breast-pump.png" class="product-img img-fluid rounded-3" alt="Electric Breast Pump">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Medela</p>
                        <h3 class="product-name mb-1">Electric Breast Pump</h3>
                        <p class="mb-1 product-price">R 2,800</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/lerato-n.jpg" class="seller-avatar" alt="Lerato N." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Lerato N.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.8 · 8 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Sea Point, Cape Town</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/baby-cot.png" class="product-img img-fluid rounded-3" alt="Wooden Baby Cot">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Stokke</p>
                        <h3 class="product-name mb-1">Wooden Baby Cot</h3>
                        <p class="mb-1 product-price">R 3,200</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/priya-s.jpg" class="seller-avatar" alt="Priya K." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Priya K.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 5.0 · 6 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Umhlanga, Durban</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/car-seat.jpg" class="product-img img-fluid rounded-3" alt="Group 0+ Car Seat">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Nuna</p>
                        <h3 class="product-name mb-1">Group 0+ Car Seat</h3>
                        <p class="mb-1 product-price">R 3,500</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/thabo-m.jpg" class="seller-avatar" alt="Thabo M." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Thabo M.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.7 · 9 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Centurion, Pretoria</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/high-chair.png" class="product-img img-fluid rounded-3" alt="Convertible High Chair">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Chicco</p>
                        <h3 class="product-name mb-1">Convertible High Chair</h3>
                        <p class="mb-1 product-price">R 1,800</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/chris-w.jpg" class="seller-avatar" alt="Chris W." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Chris W.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.9 · 5 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Rosebank, Johannesburg</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="product-card product-card--listing border rounded-3 p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="position-relative product-img-wrap">
                      <a href="product-detail.php">
                        <img src="images/gallery/products/recommended/bassinet.png" class="product-img img-fluid rounded-3" alt="Co-Sleeper Bassinet">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">View Listing</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Bugaboo</p>
                        <h3 class="product-name mb-1">Co-Sleeper Bassinet</h3>
                        <p class="mb-1 product-price">R 2,400</p>
                        <a href="seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="images/gallery/sellers/nadia-p.jpg" class="seller-avatar" alt="Nadia P." width="36" height="36" loading="lazy">
                          <span class="flex-grow-1">
                            <span class="d-block font-14 fw-semibold text-body">Nadia P.</span>
                            <span class="seller-rating-mini"><i class="bi bi-star-fill text-warning"></i> 4.8 · 7 reviews</span>
                          </span>
                        </a>
                        <p class="listing-location mb-0 font-14 text-body-secondary mt-2"><i class="bi bi-geo-alt"></i> Ballito, Durban</p>
                      </div>
                  </div>
                </div>
              </div>
                </div>
          </div>
        </div>
      </div>
    </section>
    
  </main>
  

  
  <footer class="footer-strip py-4 border-top">
    <div class="container px-3">
      <div class="row g-4 align-items-center">
        <div class="col-12 col-lg-auto">
          <p class="mb-0 font-12">@All rights reserved. PreLoved Baby</p>
        </div>
        <div class="col-12 col-lg-auto ms-lg-auto">
          <a href="javascript:;"
            ><img
              src="images/gallery/payment/stripe.png"
              class="img-fluid"
              width="40"
              alt="Stripe"
          /></a>
        </div>
      </div>
      
    </div>
  </footer>
  

 
    <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
 

  
  <?php include APP_ROOT . '/views/cart-offcanvas.php'; ?>
</div>
  
   
  
  <div class="modal" id="reviewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content p-lg-2 p-0">
        <div class="modal-body p-4">
          <div class="d-flex align-items-center justify-content-between">
            <h1 class="modal-title fs-5 mb-0">Write a review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form class="write-review mt-4">
             <div class="row g-4">
                <div class="col-12">
                  <label for="yourname" class="form-label">Name</label>
                  <input type="text" class="form-control py-2 border-2" id="yourname" placeholder="Your name">
                </div>
                <div class="col-12">
                  <label for="youremail" class="form-label">Email</label>
                  <input type="text" class="form-control py-2 border-2" id="youremail" placeholder="Your email">
                </div>
                <div class="col-12">
                  <label for="chooserating" class="form-label">Choose Rating</label>
                  <select class="form-select py-2 border-2" id="chooserating">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="Review" class="form-label">Review</label>
                  <textarea class="form-control py-2 border-2" id="Review" rows="4" cols="5" placeholder="Tell other parents about your experience"></textarea>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button type="button" class="btn btn-dark py-2  border-2">Submit Review</button>
                  </div>
                </div>

             </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

    
  <?php include APP_ROOT . '/views/search-modal.php'; ?>
  

 
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
  
  <script src="plugins/swiper/js/swiper-bundle.min.js"></script>
  <script src="js/search-slider.js"></script>
  <script src="js/search-modal.js"></script>
  
  <script src="js/product-details.js"></script>

  <script src="js/main.js"></script>
</body>

</html>