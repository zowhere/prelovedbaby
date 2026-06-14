<?php
/**
 * Searchable combobox select.
 *
 * Expected variables:
 * - $selectId (string)
 * - $selectName (string)
 * - $selectLabel (string)
 * - $selectOptions (string[])
 * - $selectValue (string, optional)
 * - $selectPlaceholder (string, optional)
 * - $selectInputClass (string, optional)
 */

$selectId = $selectId ?? 'SearchableSelect';
$selectName = $selectName ?? $selectId;
$selectLabel = $selectLabel ?? 'Select option';
$selectOptions = $selectOptions ?? [];
$selectValue = $selectValue ?? ($selectOptions[0] ?? '');
$selectPlaceholder = $selectPlaceholder ?? 'Type to search...';
$selectInputClass = trim('form-control border-2 ' . ($selectInputClass ?? ''));
$listId = $selectId . 'List';
?>

<div class="searchable-select" data-searchable-select data-options="<?= htmlspecialchars(json_encode(array_values($selectOptions), JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8') ?>">
  <label for="<?= htmlspecialchars($selectId) ?>Input" class="form-label"><?= htmlspecialchars($selectLabel) ?></label>
  <input type="hidden" name="<?= htmlspecialchars($selectName) ?>" id="<?= htmlspecialchars($selectId) ?>" value="<?= htmlspecialchars($selectValue) ?>">
  <div class="searchable-select-control position-relative">
    <input
      type="text"
      class="<?= htmlspecialchars($selectInputClass) ?>"
      id="<?= htmlspecialchars($selectId) ?>Input"
      role="combobox"
      aria-expanded="false"
      aria-autocomplete="list"
      aria-controls="<?= htmlspecialchars($listId) ?>"
      autocomplete="off"
      placeholder="<?= htmlspecialchars($selectPlaceholder) ?>"
      value="<?= htmlspecialchars($selectValue) ?>"
    >
    <ul class="searchable-select-menu list-unstyled mb-0" id="<?= htmlspecialchars($listId) ?>" role="listbox" hidden></ul>
  </div>
</div>
