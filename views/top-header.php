<?php
$siteBase = $siteBase ?? '';
$inAdmin = $inAdmin ?? false;
?>
<header class="top-header py-2">
  <div class="top-strip d-flex align-items-center gap-4 container px-3">
    <div class="strip-menu-left d-none d-lg-flex">
      <ul class="nav align-items-center gap-2">
        <li class="nav-item">
          <a class="nav-link py-1" href="<?= htmlspecialchars($siteBase) ?>about-us.php">How It Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link py-1" href="<?= htmlspecialchars($siteBase) ?>about-us.php">Seller Guide</a>
        </li>
        <li class="nav-item">
          <a class="nav-link py-1" href="<?= htmlspecialchars($siteBase) ?>about-us.php">Buyer Protection</a>
        </li>
        <?php if (!$inAdmin) : ?>
        <li class="nav-item ms-lg-2">
          <a class="btn btn-sm btn-outline-light rounded-3 px-3 py-1" href="<?= htmlspecialchars($siteBase) ?>admin/index.php">Admin</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="d-flex align-items-center gap-2 ms-lg-auto">
      <div class="dropdown language">
        <a class="btn btn-sm btn-language btn-outline-light border-0 d-flex align-items-center gap-2 px-2 dropdown-toggle dropdown-toggle-nocaret"
          href="javascript:;" data-bs-toggle="dropdown">
          <span>English</span><span><i class="bi bi-chevron-down"></i></span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:;">English</a></li>
          <li><a class="dropdown-item" href="javascript:;">Zulu</a></li>
          <li><a class="dropdown-item" href="javascript:;">Afrikaans</a></li>
          <li><a class="dropdown-item" href="javascript:;">Sotho</a></li>
        </ul>
      </div>
      <div class="dropdown language">
        <a class="btn btn-sm btn-language btn-outline-light border-0 d-flex align-items-center gap-2 px-2 dropdown-toggle dropdown-toggle-nocaret"
          href="javascript:;" data-bs-toggle="dropdown">
          <span>ZAR</span><span><i class="bi bi-chevron-down"></i></span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:;">ZAR</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
