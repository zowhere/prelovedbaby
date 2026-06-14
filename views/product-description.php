<?php
?>
<p class="text-para mb-3"><?= htmlspecialchars($product['description']) ?></p>
<ul class="mb-0">
  <?php foreach ($product['details'] as $detail) : ?>
  <li class="text-para"><?= htmlspecialchars($detail) ?></li>
  <?php endforeach; ?>
</ul>
