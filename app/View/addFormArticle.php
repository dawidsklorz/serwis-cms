<div class="container">
	<p class="title">NOWY ARTYKUŁ</p>
	<form action="?controller=Article&action=add" method="post">
		<table class="table2">	
			<tr>
				<td><input type="text" name="title" style="width: 800px; padding: 15px; border: 0px; border-radius: 3px;" placeholder="Tytuł artykułu"></input></td>
			</tr>
			<tr>
				<td><textarea type="text" name="introduction" style="width: 800px; height: 52px; padding: 15px; border: 0px; border-radius: 3px;" rows="1" placeholder="Wstęp do artykułu"></textarea></td>
			</tr>
			<tr>
				<td style="padding-top: 2px; padding-bottom: 0; width: 800px;"><textarea class="summernote" name="content"></textarea></td>
			</tr>
			<tr>
				<td><input class="btn btn-primary btn-lg btn-block" style="margin-top: -15px;" type="submit" name="addFormArticle" value="Dodaj"></td>
			</tr>
		</table>
	</form>
</div>

<script>
$(document).ready(function() {
  $('.summernote').summernote({
	  height: 300,                 
	  minHeight: null,             
	  maxHeight: null,             
	  width: 100,
	  focus: true,
	  placeholder: 'Treść artykułu',
  });
});
</script>