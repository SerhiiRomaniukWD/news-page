<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>News portal - <?php echo $title; ?></title>
  <link rel="stylesheet" href="../../assets/styles/style.css?v=<?php echo time(); ?>">
  <link rel="icon" type="image/x-icon" href="../../assets/icons/favicon.svg">
</head>
<body>
<div class="container">
  <header class="header">
    <a class="header_link" href="/">News portal ✧</a>

    <div class="user">
      <a class="user_link" href="/login">LOG OUT</a>
    </div>
  </header>

  <main class="main">
    <div class="news-board">
      <form class="post" action="/" method="post">
        <div class="post-container">
          <span class="post_text">Create new post...</span>

          <div class="post-controller">
            <button class="post-controller_button">✔</button>
          </div>
        </div>

        <textarea
          class="post_textarea"
          name="post"
          cols="1"
          rows="4"
          required
        ></textarea>
      </form>

      <div class="news-board_header">
        <span class="news-board_title">ᐁ</span>
        <h2 class="news-board_title">What about news?</h2>
      </div>

      <ul class="news-list">
        <div class="news-info">
          <span class="news-info_item">post by <strong>Admin</strong></span>

          <a class="news-info_item news-info_item--link" href="/">
            <strong>0</strong>

            <img class="news-info_item--image" src="assets/icons/comments.svg" alt="comments">
          </a>
        </div>

        <li class="news-list_item">
          <span>some</span>
          <div class="news-list_icons">
            <a class="news-list_link" href="/">✎</a>

            <a class="news-list_link" href="/">✖</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="profile">
      <ul class="profile-list">
        <li class="profile-list_item">
          <h2 class="profile-list_title">Login</h2>
        </li>

        <li class="profile-list_item">
          <img class="profile-list_image" src="../../assets/icons/siluet.png" alt="user_avatar">
        </li>

        <li class="profile-list_item">
          <img class="profile-list_icon" src="../../assets/icons/mail.svg" alt="email">

          <p>Emain</p>
        </li>
      </ul>

      <ul class="profile-list">
        <li class="profile-list_item">
          <img class="profile-list_icon" src="../../assets/icons/news.svg" alt="news">

          <p class="profile-list_text">0</p>
        </li>

        <li class="profile-list_item">
          <img class="profile-list_icon" src="../../assets/icons/comments.svg" alt="news">

          <p class="profile-list_text">0</p>
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
