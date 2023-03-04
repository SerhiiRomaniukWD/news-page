<div class="news-board">
  <form class="post" action="/news/editpost/<?= $data["postId"] ?>" method="post">
    <div class="post-container">
      <span class="post_text">Edit post...</span>

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
    ><?= $data["content"] ?></textarea>
  </form>
</div>