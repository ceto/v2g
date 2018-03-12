<p><strong><?php _e('Kérdése van?.', 'vb') ?></strong></p>
<!-- Contact Form -->
<form class="form contact-form" id="contact_form" method="post" action="<?php echo get_stylesheet_directory_uri(); ?>/contact_me.php">


  <!-- Name -->
  <div class="form-group">
      <input type="text" name="name" id="name" placeholder="név" pattern=".{3,100}" required>
  </div>

  <!-- Email -->
  <div class="form-group">
      <input type="email" name="email" id="email" placeholder="e-mail cím" pattern=".{5,100}" required>
  </div>

  <div class="form-group">
    <input type="tel" name="tel" id="tel" placeholder="telefonszám" pattern=".{5,100}" required>
  </div>

  <div class="form-group">
    <textarea name="text" id="text" pattern=".{5,100}" rows="5" placeholder="üzenet szövege" maxlength="400"></textarea>
  </div>

  <button class="btn button" id="submit_btn">Elküld&nbsp;&nbsp;<i class="ion ion-ios-arrow-right"></i></button>


  <div id="result"></div>
</form>
<!-- End Contact Form -->