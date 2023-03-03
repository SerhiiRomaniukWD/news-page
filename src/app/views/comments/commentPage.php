<div class="container">
  <header class="header">
    <a class="header_link" href="/">News portal ✧</a>

    <div class="user">
      <a class="user_link" href="/news/logout">LOG OUT</a>
    </div>
  </header>

  <main class="main">
    <div class="news-board">
      <form class="post" action="/comments/editComment/<?= $data["commentId"] ?>" method="post">
        <div class="post-container">
          <span class="post_text">Edit comment...</span>

          <div class="post-controller">
            <button class="post-controller_button">✔</button>
          </div>
        </div>

        <textarea
          class="post_textarea"
          name="comment"
          cols="1"
          rows="4"
          required
        ><?= $data["content"] ?></textarea>
      </form>
    </div>

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