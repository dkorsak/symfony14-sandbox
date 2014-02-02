<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" id="login_form">
<p class="naglowek">Logowanie</p>
<?php echo $form['username']->renderError() ?>
<p>
  <?php echo $form['username']->renderlabel() ?>
  <?php echo $form['username'] ?>
</p>
<?php echo $form['password']->renderError() ?>
<p style="padding-bottom: 6px;">
  <?php echo $form['password']->renderlabel() ?>
  <?php echo $form['password'] ?>
</p>
<div style="width: 290px; margin-bottom: 6px;">
  <div style="float: left; margin-left: 70px !important;margin-left: 38px; width: 25px;">
  <?php echo $form['remember'] ?>
  </div>
  <div style="float: left; width: 186px; padding-top: 3px;" id="label_remember">
  <?php echo $form['remember']->renderlabel() ?>
  </div>
  <div style="clear: both"></div>
</div>
<input type="submit" class="button" value="Login" style="display: none;" />
<div class="button_ok"><a href="#" id="login_button_click">OK</a></div>
</form>
<script type="text/javascript">
jQuery(document).ready(function(){
  <?php if ($sf_user->isTimedOut()): ?>
  alert("Twoja sesja wygasła. Zaloguj się ponownie")
  <?php endif; ?>
  jQuery('#login_button_click').click(function(){jQuery('#login_form').submit();return false;})
})
</script>
