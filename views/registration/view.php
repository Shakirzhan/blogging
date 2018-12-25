<?php require_once(ROOT.'/views/layouts/header.php'); ?>
		
		<?php require_once(ROOT.'/views/layouts/heading.php'); ?>

		<div class="container">
			<div class="col-md-4 col-sm-12">
				<?php if (!isset($_SESSION['session_username'])): ?>
				  <div class="contact-form bottom">
				      <h2>Регистрация</h2>
				      <?php if (isset($res)) { echo $res; } ?>
				      <form name="contact-form" method="post" action="<?=$_SERVER['REQUEST_URI'] ?>">
				          <div class="form-group">
				              <input type="text" name="username" class="form-control" required="required" placeholder="Login">
				          </div>
				          <div class="form-group">
				              <input type="password" name="password" class="form-control" required="required" placeholder="Password">
				          </div>                       
				          <div class="form-group">
				              <input type="submit" name="register" class="btn btn-submit" value="Зарегистрироваться">
				          </div>
				      </form>
				  </div>
				  <p style="color: #686868;">Уже зарегистрированы? <a href="?action=login">Введите имя пользователя</a>!</p>
				<?php endif; ?>
			</div>
		</div>
<?php require_once(ROOT.'/views/layouts/footer.php'); ?>