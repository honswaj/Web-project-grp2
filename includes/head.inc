<?php

$base       = $base       ?? '';
$pageTitle  = $pageTitle  ?? 'Vinggroup';
$pageStyles = $pageStyles ?? [];
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<?php foreach ($pageStyles as $css): ?>
<link rel="stylesheet" href="<?= $base . htmlspecialchars($css, ENT_QUOTES, 'UTF-8') ?>">
<?php endforeach; ?>
