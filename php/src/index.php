<?php
  session_start();
  
  if (isset($_SESSION['user'])) {
    header('Location: main.php');
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>News-page</title>
  <link rel="stylesheet" href="assets/styles.css?v=<?php echo time(); ?>">
</head>
<body>
  <div class="container--log">
    <main class="main main--log">
      <h1 class="title">
        Welcome to News portal ✧
      </h1>


      <form class="form" action="vendor/signin.php" method="post">
        <input
          class="form_input"
          type="text"
          placeholder="Login"
          name="login"
          required
        >

        <input
          class="form_input"
          type="password"
          placeholder="Password"
          name="password"
          required
        >

        <button class="form_button">Log in</button>

        <p class="form_paragraph">
          Don't have an account? ᐅ
          <a class="form_link" href="./register.php">register</a>
        </p>
      
        <?php
          if (isset($_SESSION['register_done'])) {
            echo '<p class="form_notice form_notice-success">' . $_SESSION['register_done'] . '</p>';
            unset($_SESSION['register_done']);
          }
        
          if (isset($_SESSION['warning'])) {
            echo '<p class="form_notice form_notice-warning">' . $_SESSION['warning'] . '</p>';
            unset($_SESSION['warning']);
          }
        ?>
      </form>
    </main>
  </div>
</body>
</html>
