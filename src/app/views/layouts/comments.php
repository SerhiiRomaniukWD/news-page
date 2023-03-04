<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>News portal - <?= $title ?></title>
  <link rel="stylesheet" href="../../assets/styles/style.css?v=<?= time() ?>">
  <link rel="icon" type="image/x-icon" href="../../assets/icons/favicon.svg">
</head>
<body>
<div class="container">
  <header class="header">
    <a class="header_link" href="/">News portal ✧</a>

    <div class="user">
      <?php if($data["id"] === 1): ?>
        <p>God mode</p>
      <?php endif; ?>

      <a class="user_link" href="/news/logout">LOG OUT</a>
    </div>
  </header>

  <main class="main">
    <?= $content ?>

    <div class="profile">
      <ul class="profile-list">
        <li class="profile-list_item">
          <h2 class="profile-list_title"><?= $data["login"] ?></h2>
        </li>

        <li class="profile-list_item">
          <img class="profile-list_image" src="<?= '../../' . $data["avatar"] ?>" alt="user_avatar">
        </li>

        <li class="profile-list_item">
          <img class="profile-list_icon" src="../../assets/icons/mail.svg" alt="email">

          <p><?= $data["email"] ?></p>
        </li>
      </ul>

      <ul class="profile-list">
        <li class="profile-list_item">
          <img class="profile-list_icon" src="../../assets/icons/news.svg" alt="news">

          <p class="profile-list_text"><?= $data["postsCounter"] ?></p>
        </li>

        <li class="profile-list_item">
          <img class="profile-list_icon" src="../../assets/icons/comments.svg" alt="news">

          <p class="profile-list_text"><?= $data["commentsCounter"] ?></p>
        </li>
      </ul>
    </div>
  </main>

  <footer class="footer">
    <h3>News portal ©</h3>
  </footer>
</div>
</body>
</html>