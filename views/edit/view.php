
<?php if (isset($_SESSION['session_username'])): ?>
	<?php if ($resNews['author'] == $_SESSION['session_username']) { ?>
		<?php require_once(ROOT.'/views/layouts/header.php'); ?>    
		   
		  <?php require_once(ROOT.'/views/layouts/heading.php'); ?>

			<div class="container">
				<div class="col-md-12 col-sm-12">
					  <div class="contact-form bottom">
					      <h2>Изменить новость</h2>
					      <?php if (isset($res['active'])): ?>
						      <?php if (isset($res) && $res['active'] == 'false'): ?>
						      	<div class="alert alert-danger" role="alert"><?=$res['mes'] ?></div>
						      <?php endif; ?>

						      <?php if (isset($res) && $res['active'] == 'true'): ?>
						      	<div class="alert alert-success" role="alert"><?=$res['mes'] ?></div>
						      	<?php if (isset($res['mes_second']) && $res['active'] == 'true'): ?>
						      		<div class="alert alert-success" role="alert"><?=$res['mes_second'] ?></div>
						      	<?php endif; ?>
						      <?php endif; ?>
						    <?php endif; ?>
					      <form name="contact-form" method="post" action="<?=$_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
					      		<input class="newsId" type="text" name="id" id="newsId"value="<?=$resNews['id'] ?>" hidden>
					      		<input type="hidden" value="<?=$resNews['picture'] ?>" name="delete_file" />
					      		<input class="activity" type="hidden" name="activism" value="Y">
					      		<div class="form-group">
					      			<input type="file" name="picture">
					      		</div>
					      		<div class="form-group">
					      			<label>
					      				<select name="categories" style="font-weight: normal;">
												  <option value="">Выбрать категорию</option>
												  <?php foreach ($data as $categoryItem): ?>
												  	<option <?=$selected = ($resNews['category_id'] == $categoryItem['id']) ? 'selected' : ''; ?> value="<?php echo $categoryItem['id'];?>"><?php echo $categoryItem['name'];?></option>
												  <?php endforeach; ?>
												</select>
											</label>
					      		</div>
					          <div class="form-group">
					              <input type="text" name="caption" class="form-control" required="required" placeholder="Заголовок" value="<?=$resNews['caption'] ?>">
					          </div>
					          <div class="form-group">
					              <textarea name="description" id="message" required="required" class="form-control" rows="8" placeholder="Описание" ><?=$resNews['description'] ?></textarea>
					          </div> 
					          <div class="form-group">
					          	<input type="date" name="date" id="publicationDate" placeholder="YYYY-MM-DD" maxlength="10" value="<?=$resNews['date'] ?>">
					          </div>                      
					          <div class="form-group" style="max-width: 315px;">
					            <input type="submit" name="save" class="btn btn-submit" value="Сохранить">
					          </div>
					          <div class="form-group" style="max-width: 315px;">
					            <input type="submit" name="cancellation" class="btn btn-submit" value="Отменить">
					          </div>
					          <div class="form-group" style="max-width: 315px;">
					          	<input type="submit" name="delete" class="btn btn-submit" value="Удалить">
					          </div>
					      </form>
					  </div>
				</div>
			</div>

		<?php require_once(ROOT.'/views/layouts/footer.php'); ?>
	<?php } else { ?>
		<p style="font-family: Arial; margin: 0;">Вы не автор новости...</p>
	<?php } ?>
<?php else: ?>
	<p style="font-family: Arial; margin: 0;">Пожалуйста авторизуйтесь...</p>
<?php endif; ?>