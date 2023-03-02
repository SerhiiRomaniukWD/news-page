<div class="container--log">
  <main class="main main--log">
    <a class="header_link" href="/">News portal ✧</a>

    <form
      class="form"
      action="/register/signup"
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
        id="password"
        name="password"
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
        <a class="form_link" href="/login">log in</a>
      </p>
    </form>
  </main>
</div>