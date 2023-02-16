<header class="header">
  <a class="header_link" href="/">News portal ✧</a>
  
  <div class="user">
    <?php
      if ((int)$_SESSION['user']['id'] === 1) {
        echo '<p>God mode</p>';
      }
    ?>
    
    <a class="user_link" href="vendor/logout.php">LOG OUT</a>
  </div>
</header>
