<?php
  session_start();
  
  if (isset($_SESSION['user'])) {
    header('Location: profile.php');
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
  <main class="main">
    <a class="header_link" href="/">News portal ✧</a>
  
    <form
      class="form"
      action="./vendor/signup.php"
      method="post"
      enctype="multipart/form-data"
    >
      <label for="login" class="form_label">
        Login*
      </label>
      <input
        class="form_input"
        type="text"
        id="login"
        name="login"
        required
      >
  
      <label for="name" class="form_label">Name*</label>
      <input
        class="form_input"
        type="text"
        id="name"
        name="name"
        required
      >
  
      <label for="email" class="form_label">Email*</label>
      <input
        class="form_input"
        type="email"
        id="email"
        name="email"
        required
      >
  
      <label for="new_password" class="form_label">Password*</label>
      <input
        class="form_input"
        type="password"
        id="new_password"
        name="new_password"
        required
      >
  
      <label for="confirm_password" class="form_label">Confirm password*</label>
      <input
        class="form_input"
        type="password"
        id="confirm_password"
        name="confirm_password"
        required
      >
  
      <label for="avatar" class="form_label">Avatar</label>
      <input
        class="form_input"
        type="file"
        id="avatar"
        name="avatar"
      >
  
      <button class="form_button">Done!</button>
  
      <p class="form_paragraph">
        Already registered? ᐅ
        <a class="form_link" href="./index.php">log in</a>
      </p>
    
      <?php
        if (isset($_SESSION['warning'])) {
          echo '<p class="form_notice form_notice-warning">' . $_SESSION['warning'] . '</p>';
          unset($_SESSION['warning']);
        }
      ?>
    </form>
  </main>
</body>
</html>
