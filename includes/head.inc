<?php
// Shared <head> content. Set these on the page BEFORE including this file:
//   $base       '' for pages in the project root, '../' for pages one folder deep
//   $pageTitle  the page title
//   $pageStyles array of page-specific stylesheets, relative to the project root
$base       = $base       ?? '';
$pageTitle  = $pageTitle  ?? 'Vinggroup';
$pageStyles = $pageStyles ?? [];
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link rel="stylesheet" href="<?= $base ?>styles/shared.css">
<?php foreach ($pageStyles as $css): ?>
<link rel="stylesheet" href="<?= $base . htmlspecialchars($css, ENT_QUOTES, 'UTF-8') ?>">
<?php endforeach; ?>
