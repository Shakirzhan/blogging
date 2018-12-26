<?php if ($folder == 'blogging') { ?>	
	<?php foreach ($categories as $categoryItem): ?>
		<li  class="<?=$active = (isset($_GET['categoryID'])) ? (($_GET['categoryID'] == $categoryItem['id']) ? 'active' : '') : '';  ?>">
			<a href="?action=category&amp;categoryID=<?php echo $categoryItem['id'];?>">
				<?php echo $categoryItem['name'];?>
				<span class="pull-right">(10)</span>
			</a>
		</li>
	<?php endforeach; ?>
<?php } ?>
<?php if ($folder == 'item') { ?>	
	<?php foreach ($data as $categoryItem): ?>
		<li class="<?=$active = (isset($_GET['categoryID'])) ? (($_GET['categoryID'] == $categoryItem['id']) ? 'active' : '') : '';  ?>">
			<a href="?action=category&amp;categoryID=<?php echo $categoryItem['id'];?>">
				<?php echo $categoryItem['name'];?>
				<span class="pull-right">(10)</span>
			</a>
		</li>
	<?php endforeach; ?>
<?php } ?>