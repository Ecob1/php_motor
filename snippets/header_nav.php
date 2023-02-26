<header class="header">
<img class="logo" src="/phpmotors/images/site/logo.png" alt="logos"> 
<div id="nav-name">
  <?php if($_SESSION['loggedin'] ){
      echo "<a href='/phpmotors/accounts/index.php'>";
      echo $_SESSION['clientData']['clientFirstname'];
      echo "        |";
      echo "</a>";
  } ?>
</div>
<?php if($_SESSION['loggedin']):?>
  <a class="p-count" href="/phpmotors/accounts/index.php?action=Logout">Logout</a>
<?php else: ?>
  <a class="p-count" href="/phpmotors/accounts/index.php?action=login-view">My Account</a>
<?php endif ?>
</header>
<nav class="nav">
  <?php
    // include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
     echo $navList; 
  ?> 
</nav> 