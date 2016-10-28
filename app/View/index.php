<div class="containerIndex">
	<table class="table1">
		<tr style="background-color: #4CAF50">
			<th class="td-small">ID</th>
			<th class="td-big">TYTUŁ</th>
			<th class="td-big">WSTĘP</th>
			<th class="td-big">TREŚĆ</th>
			<th class="td-small">WIDOCZNOŚĆ</th>
			<th class="td-small">EDYTUJ</th>
			<th class="td-small">USUŃ</th>
		</tr>
		<?php foreach($articles as $key => $value): ?>
			<tr>
				<td class="td-small"><?php echo $value["id"]; ?></td>													
				<td class="td-big"><?php echo $value["title"]; ?></td>	
				<td class="td-big"><?php echo mb_substr($value["introduction"],0,20)."..."; ?></td>					
				<td class="td-big"><?php echo mb_substr($value["content"],0,20)."..."; ?></td>
				<?php 
				if($value['visibility']==0)
					echo '<td class="td-small"><a href="#" class="visibility" data-value="'.$value["visibility"].'" data-id="'.$value["id"].'"><i class="ion-android-checkbox-outline-blank"></i></a></td>';
				else 
					echo '<td class="td-small"><a href="#" class="visibility" data-value="'.$value["visibility"].'" data-id="'.$value["id"].'"><i class="ion-android-checkbox-outline"></i></a></td>';
				?>
				<td class="td-small"><a href="?controller=Article&action=editForm&id=<?php echo $value["id"]; ?>"><i class="ion-edit"></i></a></td>
				<td class="td-small"><a href="#" data-value="<?php echo $value["id"]; ?>" data-toggle="modal" data-target="#myModal"><i class="ion-android-delete"></i></a></td>
			<tr>
		<?php endforeach; ?>
	</table>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Usunięcie artykułu</h4>
	      </div>
	      <div class="modal-body">
	        Czy na pewno chcesz usunąć ten artykuł?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Nie</button>
	        <a class="btn btn-primary remove-article-action" href="#">Tak</a>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<script>
	$('#myModal').on('show.bs.modal', function (event) 
	{
		var button = $(event.relatedTarget);

		$('.remove-article-action').attr('href', '?controller=Article&action=delete&id=' + button.attr('data-value'));
	});
</script>