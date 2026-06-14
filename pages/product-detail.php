<?php
require_once dirname(__DIR__) . '/bootstrap.php';
?>
<!doctype html>
<html lang="en">
<?php require_once APP_ROOT . '/lib/cart.php'; ?>
<?php
$productId = $_GET['id'] ?? 'chicco-pram';
if (!isset($products[$productId])) {
    $productId = 'chicco-pram';
}
$product = $products[$productId];
$inCart = in_array($productId, $_SESSION['cart'], true);
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreLoved Baby</title>
  
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  
  <link rel="stylesheet" href="<?= htmlspecialchars($siteBase) ?>plugins/swiper/css/swiper-bundle.min.css">

  
  <link href="<?= htmlspecialchars($siteBase) ?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= htmlspecialchars($siteBase) ?>css/bootstrap-icons.min.css">
  
  <link href="<?= htmlspecialchars($siteBase) ?>css/sass/style.css" rel="stylesheet">
  
</head>

<body>

  
  <?php include APP_ROOT . '/views/header.php'; ?>

  <?php include APP_ROOT . '/views/navbar.php'; ?>

    

  
  <main class="main-content">

    
    <section class="py-4 section-breadcrumb">
      <div class="container px-3">
	  <h2 class="d-none">Product Details</h2>
        <nav>
          <ol class="breadcrumb mb-0 gap-2">
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>index.php" class="breadcrumb-link">Home</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="breadcrumb-link">Prams &amp; Strollers</a></li>
            <li><i class="bi bi-chevron-right"></i></li>
            <li class="breadcrumb-item breadcrumb-active">Compact Baby Pram</li>
          </ol>
        </nav>
      </div>
    </section>
    

    
    <section class="py-5 product-details">
      <div class="container px-3">
        <div class="row g-4 g-lg-5">
           <div class="col-12 col-lg-6">
              <div class="product-images">
                <div class="swiper product-images-swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="<?= htmlspecialchars($siteBase . $product['image']) ?>" class="rounded-3 product-detail-img" alt="<?= htmlspecialchars($product['name']) ?> front view">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= htmlspecialchars($siteBase . $product['image']) ?>" class="rounded-3 product-detail-img" alt="<?= htmlspecialchars($product['name']) ?> side view">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= htmlspecialchars($siteBase . $product['image']) ?>" class="rounded-3 product-detail-img" alt="<?= htmlspecialchars($product['name']) ?> detail">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= htmlspecialchars($siteBase . $product['image']) ?>" class="rounded-3 product-detail-img" alt="<?= htmlspecialchars($product['name']) ?> close-up">
                    </div>
                  </div>
                </div>
                <div class="swiper product-images-swiper-thumbnail mt-3">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="<?= htmlspecialchars($siteBase . $product['image']) ?>" class="rounded-3" alt="<?= htmlspecialchars($product['name']) ?> front view">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= htmlspecialchars($siteBase . $product['image']) ?>" class="rounded-3" alt="<?= htmlspecialchars($product['name']) ?> side view">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= htmlspecialchars($siteBase . $product['image']) ?>" class="rounded-3" alt="<?= htmlspecialchars($product['name']) ?> detail">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= htmlspecialchars($siteBase . $product['image']) ?>" class="rounded-3" alt="<?= htmlspecialchars($product['name']) ?> close-up">
                    </div>
                  </div>
                </div>
              </div>
           </div>
           <div class="col-12 col-lg-6">
              <div class="product-details">
                <?php $sellerProfileUrl = ($product['seller'] === 'Sarah M.') ? 'pages/seller-profile.php' : 'pages/contact.php'; ?>
                <?php $sellerFirstName = explode(' ', $product['seller'])[0]; ?>
                <?php $collectionArea = trim(explode(',', $product['location'])[0]); ?>
                <p class="mb-1"><?= htmlspecialchars($product['brand']) ?> &middot; <?= htmlspecialchars($product['condition']) ?></p>
                <h2 class="mb-0"><?= htmlspecialchars($product['name']) ?></h2>
                <div class="d-flex align-items-center gap-2 my-3 flex-wrap">
                  <a href="<?= $sellerProfileUrl ?>" class="listing-seller d-inline-flex align-items-center gap-2 text-decoration-none">
                    <img src="<?= htmlspecialchars($siteBase . $product['seller_avatar']) ?>" class="seller-avatar" alt="<?= htmlspecialchars($product['seller']) ?>" width="36" height="36" loading="lazy">
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
                      <img src="<?= htmlspecialchars($siteBase . $product['seller_avatar']) ?>" class="seller-avatar seller-avatar-lg" alt="<?= htmlspecialchars($product['seller']) ?>" width="72" height="72" loading="lazy">
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
                        <p class="seller-listings-count mb-0 mt-3">2 active listings &middot; Usually responds within 2 hours</p>
                      </div>
                    </div>
                  </div>

                  <div class="product-size mt-4">
                    <p class="mb-2">Condition</p>
                    <div class="product-size-list d-flex align-items-center gap-3 flex-wrap">
                       <div class="product-size-list-item">
                         <input type="radio" class="btn-check" name="options-condition" id="condition-like-new" checked>
                         <label class="btn btn-outline-dark btn-product-size" for="condition-like-new">Like New</label>
                       </div>
                       <div class="product-size-list-item">
                        <input type="radio" class="btn-check" name="options-condition" id="condition-good">
                        <label class="btn btn-outline-dark btn-product-size" for="condition-good">Good</label>
                      </div>
                      <div class="product-size-list-item">
                        <input type="radio" class="btn-check" name="options-condition" id="condition-fair">
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
                     <a href="<?= htmlspecialchars($siteBase) ?>pages/cart.php" class="btn btn-outline-dark border border-2 rounded-5 py-2 px-5 d-flex align-items-center justify-content-center gap-2 w-100"><i class="bi bi-basket2"></i>View in cart</a>
                    <?php else: ?>
                     <form action="<?= htmlspecialchars($siteBase) ?>cart-actions.php" method="post" class="flex-fill m-0">
                       <input type="hidden" name="action" value="add">
                       <input type="hidden" name="id" value="<?php echo htmlspecialchars($productId); ?>">
                       <input type="hidden" name="redirect" value="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php?id=<?php echo urlencode($productId); ?>">
                       <button type="submit" class="btn btn-dark border border-2 rounded-5 border-dark py-2 px-5 d-flex align-items-center justify-content-center gap-2 w-100"><i class="bi bi-cart-plus"></i>Add to cart</button>
                     </form>
                    <?php endif; ?>
                     <a href="<?= htmlspecialchars($siteBase) ?>pages/contact.php" class="btn border border-2 py-2 px-5 rounded-5 d-flex align-items-center justify-content-center gap-2 text-decoration-none"><i class="bi bi-chat-dots"></i>Message <?= htmlspecialchars($sellerFirstName) ?></a>
                  </div>

                  <div class="mt-4">
                    <p class="mb-2 d-flex align-items-center gap-2 font-14"><i class="bi bi-truck"></i>
                      <span><span class="fw-semibold">Courier delivery:</span> <?= $courierPartners ?> nationwide. Collection available in <?= htmlspecialchars($collectionArea) ?>.</span></p>
                    <p class="mb-2 d-flex align-items-center gap-2 font-14"><i class="bi bi-alarm"></i><span><span class="fw-semibold">Estimated Delivery:</span> <?= $courierPartnersShort ?>. Major cities 2-4 days, regional 4-7 days</span></p>
                  </div>
                  <hr class="my-4 border-dark border-opacity-50">
                  <div class="">
                    <p class="mb-2 font-14"><span class="fw-semibold">Listing ID:</span> <?= htmlspecialchars($product['listing_id']) ?></p>
                    <p class="mb-2 font-14"><span class="fw-semibold">Seller:</span> <a href="<?= $sellerProfileUrl ?>" class="link-secondary"><?= htmlspecialchars($product['seller']) ?></a></p>
                    <p class="mb-2 font-14"><span class="fw-semibold">Listed:</span> 3 days ago</p>
                    <p class="mb-2 font-14"><span class="fw-semibold">Categories:</span>
                       <?php foreach ($product['categories'] as $i => $category) : ?>
                       <?php if ($i > 0) : ?>, <?php endif; ?>
                       <a href="<?= htmlspecialchars($siteBase) ?>pages/shop.php" class="link-secondary"><?= htmlspecialchars($category) ?></a>
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
                <button class="nav-link active rounded-5 px-5 fw-semibold" data-bs-toggle="pill" data-bs-target="#description"
                  type="button">Description</button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-5 px-5 fw-semibold" data-bs-toggle="pill" data-bs-target="#customer-reviews"
                  type="button">Reviews</button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-5 px-5 fw-semibold" data-bs-toggle="pill" data-bs-target="#shipping-returns"
                  type="button">Shipping</button>
              </li>
            </ul>
          </div>
          <div class="tab-content border p-4 rounded-3">
            <div class="tab-pane fade show active" id="description">
              <h5><?= htmlspecialchars($product['name']) ?></h5>
              <?php include APP_ROOT . '/views/product-description.php'; ?>
               </div>
               <div class="tab-pane fade show" id="customer-reviews">
                <div>
                  <h5 class="mb-4">Reviews for <?= htmlspecialchars($product['seller']) ?></h5>
                  <div class="hstack gap-md-5 gap-4 flex-column flex-lg-row">
                    <div class="text-center flex-shrink-0">
                      <div id="rating-number">
                          <h2 class="mb-2">4.9</h2>
                          <div class="rating-star">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                          </div>
                          <p class="mb-0">(4 seller ratings)</p>
                      </div>
                    </div>
                    <div class="vr d-none d-lg-flex"></div>
                    <div class="w-100 seller-rating-breakdown">
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
                        <div class="rating-row">
                          <span class="rating-label">Overall experience</span>
                          <div class="progress"><div class="progress-bar bg-dark" style="width: 97%;"></div></div>
                          <span class="rating-score">4.9</span>
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
                           <span class="seller-review-tag">Item 4/5</span>
                           <span class="seller-review-tag">Dispatch 5/5</span>
                         </div>
                         <p class="mb-0">Got the Chicco pram last week. Basket has a few scuffs like she showed in the photos, totally fine. Replied on WhatsApp same afternoon when I asked about collection.</p>
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
                           <i class="bi bi-star text-warning"></i>
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
                          <span class="seller-review-tag">Item 5/5</span>
                          <span class="seller-review-tag">Dispatch 4/5</span>
                        </div>
                        <p class="mb-0">Collected the pump on a Saturday morning. Works great, no issues. She waited while we tested it.</p>
                           <div class="d-flex align-items-center justify-content-end gap-3">
                            <span>Helpful?</span>
                            <button type="button" class="btn btn-sm btn-light rounded-3 border d-flex align-items-center gap-1"><i class="bi bi-hand-thumbs-up"></i><span>8</span></button>
                          </div>
                     </div>
                   </div>
                   <div class="customer-reviews-list-item border-top py-4">
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
                   <div class="customer-reviews-list-item border-top py-4 border-bottom">
                    <div class="d-flex align-items-start gap-3">
                     <div class="customer-pic">
                       <span>L</span>
                     </div>
                     <div class="flex-grow-1">
                       <div class="rating-star font-14 mb-1">
                         <i class="bi bi-star-fill text-warning"></i>
                         <i class="bi bi-star-fill text-warning"></i>
                         <i class="bi bi-star-fill text-warning"></i>
                         <i class="bi bi-star-fill text-warning"></i>
                         <i class="bi bi-star text-warning"></i>
                       </div>
                       <h6 class="mb-0 customer-name">Lerato N.</h6>
                     </div>
                     <div class="review-date">
                       <span>2 january 2025</span>
                     </div>
                   </div>
                   <div class="review-description mt-2">
                      <div class="seller-review-tags mb-2">
                        <span class="seller-review-tag">Communication 4/5</span>
                        <span class="seller-review-tag">Item 5/5</span>
                        <span class="seller-review-tag">Dispatch 5/5</span>
                      </div>
                      <p class="mb-0">Quick handover at a petrol station on William Nicol. Pump was clean and had all the parts in the box.</p>
                         <div class="d-flex align-items-center justify-content-end gap-3">
                          <span>Helpful?</span>
                          <button type="button" class="btn btn-sm btn-light rounded-3 border d-flex align-items-center gap-1"><i class="bi bi-hand-thumbs-up"></i><span>4</span></button>
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
                  <li><b>Collection:</b> Available in <?= htmlspecialchars($collectionArea) ?>. Arrange collection with the seller after purchase.</li>
                  <li><b>Processing:</b> Seller dispatches within 1-2 business days of confirmed payment.</li>
                  <li><b>Tracking:</b> You will receive a tracking number once the item is shipped.</li>
                </ul>
                <h5 class="mb-3">If something's wrong</h5>
                <ul class="mb-0">
                  <li><b>Not as described?</b> Message us within 48 hours with photos.</li>
                  <li><b>Refunds:</b> Sorted within 5-7 business days if the claim checks out.</li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    
    <section class="py-5">
      <div class="container px-3">
        <div class="d-flex align-items-center justify-content-between mb-5">
          <h2 class="section-title">You May Also Like</h2>
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
                      <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php">
                        <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/breast-pump.png" class="product-img img-fluid rounded-3" alt="Electric Breast Pump">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">Add to cart</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Medela</p>
                        <h3 class="product-name mb-1">Electric Breast Pump</h3>
                        <p class="mb-1 product-price">R 2,800</p>
                        <a href="<?= htmlspecialchars($siteBase) ?>pages/seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/sellers/lerato-n.jpg" class="seller-avatar" alt="Lerato N." width="36" height="36" loading="lazy">
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
                      <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php">
                        <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/baby-cot.png" class="product-img img-fluid rounded-3" alt="Wooden Baby Cot">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">Add to cart</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Stokke</p>
                        <h3 class="product-name mb-1">Wooden Baby Cot</h3>
                        <p class="mb-1 product-price">R 3,200</p>
                        <a href="<?= htmlspecialchars($siteBase) ?>pages/seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/sellers/priya-s.jpg" class="seller-avatar" alt="Priya K." width="36" height="36" loading="lazy">
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
                      <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php">
                        <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/car-seat.jpg" class="product-img img-fluid rounded-3" alt="Group 0+ Car Seat">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">Add to cart</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Nuna</p>
                        <h3 class="product-name mb-1">Group 0+ Car Seat</h3>
                        <p class="mb-1 product-price">R 3,500</p>
                        <a href="<?= htmlspecialchars($siteBase) ?>pages/seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/sellers/thabo-m.jpg" class="seller-avatar" alt="Thabo M." width="36" height="36" loading="lazy">
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
                      <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php">
                        <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/high-chair.png" class="product-img img-fluid rounded-3" alt="Convertible High Chair">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">Add to cart</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Chicco</p>
                        <h3 class="product-name mb-1">Convertible High Chair</h3>
                        <p class="mb-1 product-price">R 1,800</p>
                        <a href="<?= htmlspecialchars($siteBase) ?>pages/seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/sellers/chris-w.jpg" class="seller-avatar" alt="Chris W." width="36" height="36" loading="lazy">
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
                      <a href="<?= htmlspecialchars($siteBase) ?>pages/product-detail.php">
                        <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/products/recommended/bassinet.png" class="product-img img-fluid rounded-3" alt="Co-Sleeper Bassinet">
                      </a>
                      <div class="position-absolute bottom-0 start-0 end-0 m-3 product-cart">
                        <a href="javascript:;" class="btn btn-dark rounded-5 w-100">Add to cart</a>
                      </div>
                    </div>
                      <div>
                        <p class="listing-brand mb-1">Bugaboo</p>
                        <h3 class="product-name mb-1">Co-Sleeper Bassinet</h3>
                        <p class="mb-1 product-price">R 2,400</p>
                        <a href="<?= htmlspecialchars($siteBase) ?>pages/seller-profile.php" class="listing-seller d-flex align-items-center gap-2 text-decoration-none">
                          <img src="<?= htmlspecialchars($siteBase) ?>images/gallery/sellers/nadia-p.jpg" class="seller-avatar" alt="Nadia P." width="36" height="36" loading="lazy">
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
              src="<?= htmlspecialchars($siteBase) ?>images/gallery/payment/stripe.png"
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
  

  
  <div class="modal" id="reviewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content p-lg-2 p-0">
        <div class="modal-body p-4">
          <div class="d-flex align-items-center justify-content-between">
            <h1 class="modal-title fs-5 mb-0">Rate this seller</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form class="write-review mt-4">
             <div class="row g-4">
                <div class="col-12">
                  <label for="yourname" class="form-label">Name</label>
                  <input type="text" class="form-control py-2 border-2" id="yourname" placeholder="Enter your name">
                </div>
                <div class="col-12 col-md-6">
                  <label for="communication-rating" class="form-label">Communication</label>
                  <select class="form-select py-2 border-2" id="communication-rating">
                    <option>5 - Excellent</option>
                    <option>4 - Good</option>
                    <option>3 - Average</option>
                    <option>2 - Poor</option>
                    <option>1 - Very poor</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label for="item-rating" class="form-label">Item as described</label>
                  <select class="form-select py-2 border-2" id="item-rating">
                    <option>5 - Exactly as described</option>
                    <option>4 - Mostly as described</option>
                    <option>3 - Some differences</option>
                    <option>2 - Not as described</option>
                    <option>1 - Very inaccurate</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label for="dispatch-rating" class="form-label">Dispatch speed</label>
                  <select class="form-select py-2 border-2" id="dispatch-rating">
                    <option>5 - Same or next day</option>
                    <option>4 - Within 2 days</option>
                    <option>3 - Within a week</option>
                    <option>2 - Slow</option>
                    <option>1 - Never dispatched</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label for="overall-rating" class="form-label">Overall experience</label>
                  <select class="form-select py-2 border-2" id="overall-rating">
                    <option>5 - Would buy again</option>
                    <option>4 - Good experience</option>
                    <option>3 - OK</option>
                    <option>2 - Disappointing</option>
                    <option>1 - Would not recommend</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="Review" class="form-label">Your review</label>
                  <textarea class="form-control py-2 border-2" rows="4" cols="5" id="Review" placeholder="Tell other parents about your experience with this seller"></textarea>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button type="button" class="btn btn-dark py-2 border-2">Submit seller review</button>
                  </div>
                </div>

             </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

    
  <?php include APP_ROOT . '/views/search-modal.php'; ?>
  

 
 <script src="<?= htmlspecialchars($siteBase) ?>js/jquery.min.js"></script>
 <script src="<?= htmlspecialchars($siteBase) ?>js/bootstrap.bundle.min.js"></script>
  
  <script src="plugins/swiper/js/swiper-bundle.min.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/search-slider.js"></script>
  <script src="<?= htmlspecialchars($siteBase) ?>js/search-modal.js"></script>
  
  <script src="<?= htmlspecialchars($siteBase) ?>js/product-details.js"></script>

  <script src="<?= htmlspecialchars($siteBase) ?>js/main.js"></script>
</body>

</html>