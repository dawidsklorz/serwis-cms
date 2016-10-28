 <?php foreach ($article as $key => $value): ?>

	<p><b><a href="?controller=Article&action=show&id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></b></p>
	<p><?php echo $value['introduction']; ?></p>
	<p style="height: 50px"></p>

<?php endforeach; ?>
