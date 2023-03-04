<div class="container--log">
  <main class="main main--log">
    <h1 class="title">
      Welcome to News portal ✧
    </h1>

    <form class="form" action="/login/signin" method="post">
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
        <a class="form_link" href="/register">register</a>
      </p>

      <?php if(isset($_SESSION['warning'])): ?>
        <p class="form_notice form_notice-warning"><?= $_SESSION['warning'] ?></p>
      <?php elseif(isset($_SESSION['success'])): ?>
        <p class="form_notice form_notice-success"><?= $_SESSION['success'] ?></p>
      <?php endif; ?>
    </form>
  </main>
</div>
