<?php require_once '../views/admin/layouts/header.php'; ?>

<div class="container">
	<div class="col-md-12 col-sm-12">
		<table class="table--col">
			<tr>
				<td class="row-1">Дата публикации</td>
				<td class="row-2">Новость</td>
				<td class="row-2">Активность</td>
			</tr>	
			<?php foreach ($res as $item): ?>
				<?php 
	        $dateS = $item->date;
	        $dateS = explode('-', $dateS);
	        list($year, $month, $day) = $dateS;
	      ?>
	      <tr onclick="location = './?action=edit&itemID=<?=$item->id; ?>'">
	        <td class="row-1"><?=date("d.m.Y", mktime(0, 0, 0, $month, $day, $year)); ?></td>
	        <td class="row-2"><?=$item->caption; ?></td>
	        <td class="row-2"><?=($item->activism == 'Y') ? 'Активна' : 'Не активна'; ?></td>
	      </tr>
	    <?php endforeach; ?>
	    <!--
	    <tr onclick="location = './?action=append'">
      	<td class="table__news" colspan="2">Добавить новость</td>
      </tr>
    	-->
		</table>
	</div>
</div>

<?php require_once '../views/admin/layouts/footer.php'; ?>