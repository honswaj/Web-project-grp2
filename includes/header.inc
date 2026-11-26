<?php

$base        = $base        ?? '';
$headerClass = $headerClass ?? 'topbar';
$logoClass   = $logoClass   ?? 'cornerLogo';
$showSearch  = $showSearch  ?? true;
?>
<header class="<?= $headerClass ?>">
  <img src="<?= $base ?>images/logo.png" class="<?= $logoClass ?>" alt="Ving-Group logo">

  <nav class="nav">
    <p class="menu"><a href="../homePage/index.php">Home</a></p>
    <p class="menu"><a href="../jobsPage/jobs.php">Jobs</a></p>
    <p class="menu"><a href="../applPage/apply.php">Apply</a></p>
    <p class="menu"><a href="../abtPage/about.php">About</a></p>
  </nav>

  <?php if ($showSearch): ?>
  <form class="search" action="#">
    <input type="search" placeholder="Search..." aria-label="Search">
    <button type="submit">Search</button>
  </form>
  <?php endif; ?>
</header>
