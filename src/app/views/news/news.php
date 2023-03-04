<div class="news-board">
  <form class="post" action="/news/addpost" method="post">
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
    <?php foreach($data["posts"] as $post): ?>
      <div class="news-info">
        <span class="news-info_item">post by <strong><?= $post["user_login"] ?></strong></span>

        <a class="news-info_item news-info_item--link" href="/comments/<?= $post["id"] ?>">
          <strong><?= $post["comments_counter"] ?>&nbsp;</strong>

          <img class="news-info_item--image" src="../../assets/icons/comments.svg" alt="comments">
        </a>
      </div>

      <li class="news-list_item">
        <span><?= $post["content"] ?></span>
        <div class="news-list_icons">
          <?php if($post["user_id"] === $data["id"] || $data["id"] === 1): ?>
            <a class="news-list_link" href="/news/post/<?= $post["id"] ?>">✎</a>

            <a class="news-list_link" href="/news/deletepost/<?= $post["id"] ?>">✖</a>
          <?php endif; ?>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
