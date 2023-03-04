<div class="news-board">
  <p class="post-box"><?= $data["content"] ?></p>

  <form class="post" action="/comments/addcomment/<?= $data["postId"] ?>" method="post">
    <div class="post-container">
      <span class="post_text">Add comment...</span>

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
    ></textarea>
  </form>

  <div class="news-board_header">
    <span class="news-board_title">ᐁ</span>
    <h2 class="news-board_title">Comments</h2>
  </div>

  <ul class="news-list">
    <?php foreach($data["comments"] as $comment): ?>
      <div class="news-info">
        <span class="news-info_item">comment by <strong><?= $comment["user_login"] ?></strong></span>

        <span class="news-info_item"><?= $comment["date"] ?></span>
      </div>

      <li class="news-list_item">
        <span><?= $comment["content"] ?></span>
        <div class="news-list_icons">
          <?php if($comment["user_id"] === $data["id"] || $data["id"] === 1): ?>
            <a class="news-list_link" href="/comments/commentPage/<?= $comment["id"] ?>">✎</a>

            <a class="news-list_link" href="/comments/deletecomment/<?= $comment["id"] ?>">✖</a>
          <?php endif; ?>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>