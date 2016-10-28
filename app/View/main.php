<?php
	$tab = array(':UserId' => $this->session->get('user_id'));
	$UserEmail = $this->db->query("SELECT * FROM user WHERE id = :UserId", $tab);

	$controller = isset($_GET['controller']) ? $_GET['controller'] : null;
	$action     = isset($_GET['action']) ? $_GET['action'] : null;
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf8"/>
	<title>Moja strona</title>
	<link rel="Shortcut icon" href="img/icon3.png" style="color: red"/>
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- include libraries(jQuery, bootstrap) -->
	<!-- include summernote css/js-->
	
	<script
			  src="https://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			  crossorigin="anonymous"></script>
			  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/visibility.js"></script>
	<script src="js/signin-validator.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" style="position: fixed; top: 0; width: 100%; z-index: 10">
  	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			 </button>
			 <a class="navbar-brand" href="?controller=Homepage&action=index"><h1 style="margin: -8px"><span style="color: green">C</span><span style="color: yellow">M</span><span style="color: blue">S</span></h1></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li<?php echo ($controller == 'Homepage' && $action == 'index' ? ' class="active"' : ''); ?>><a href="?controller=Homepage&action=index">STRONA GŁÓWNA <span class="sr-only"></span></a></li>
				<li<?php echo ($controller == 'Article' && $action == 'addForm' ? ' class="active"' : ''); ?>><a href="?controller=Article&action=addForm">DODAJ ARTYKUŁ</a></li>
		  	</ul>
		  	
		  	<ul class="nav navbar-nav navbar-right">
				<li role="presentation"><span class="username">WITAJ <?php echo $UserEmail[0]['email']; ?></span></li>
				<li><a href="?controller=User&action=logoutProcess">WYLOGUJ</a></li>
		  	</ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php echo $content; ?>

</body>
</html>