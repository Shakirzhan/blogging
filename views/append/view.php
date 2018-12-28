<?php if (isset($_SESSION['session_username'])): ?>
<?php require_once(ROOT.'/views/layouts/header.php'); ?>    
   
  <?php require_once(ROOT.'/views/layouts/heading.php'); ?>

	<div class="container">
		<div class="col-md-12 col-sm-12">
			  <div class="contact-form bottom">
			      <h2>Добавить новость</h2>

			      <?php if (isset($res) && $res['active'] == 'false'): ?>
			      	<div class="alert alert-danger" role="alert"><?=$res['mes'] ?></div>
			      <?php endif; ?>

			      <?php if (isset($res) && $res['active'] == 'true'): ?>
			      	<div class="alert alert-success" role="alert"><?=$res['mes'] ?></div>
			      <?php endif; ?>

			      <form name="contact-form" method="post" action="<?=$_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
			      		<div class="form-group">
			      			<input type="file" name="picture">
			      		</div>
			      		<div class="form-group">
			      			<label>
			      				<select name="categories" style="font-weight: normal;">
										  <option value="">Выбрать категорию</option>
										  <?php foreach ($data as $categoryItem): ?>
										  	<option value="<?php echo $categoryItem['id'];?>"><?php echo $categoryItem['name'];?></option>
										  <?php endforeach; ?>
										</select>
									</label>
			      		</div>
			          <div class="form-group">
			              <input type="text" name="caption" class="form-control" required="required" placeholder="Заголовок">
			          </div>
			          <div class="form-group">
			              <textarea name="description" id="message" required="required" class="form-control" rows="8" placeholder="Описание" ></textarea>
			          </div> 
			          <div class="form-group">
			          	<input type="date" name="date" id="publicationDate" placeholder="YYYY-MM-DD" maxlength="10">
			          </div>                      
			          <div class="form-group" style="max-width: 315px;">
			              <input type="submit" name="append" class="btn btn-submit" value="Добавить">
			          </div>
			          <div class="form-group" style="max-width: 315px;">
			              <input type="submit" name="cancellation" class="btn btn-submit" value="Отменить" onclick="location = '../'">
			          </div>
			      </form>
			  </div>
		</div>
	</div>

<?php require_once(ROOT.'/views/layouts/footer.php'); ?>
<?php else: ?>
	<p style="font-family: Arial; margin: 0;">Пожалуйста авторизуйтесь...</p>
<?php endif; ?>