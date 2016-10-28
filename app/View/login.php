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
	<div class="container">
		<div class="logoLogin"><span style="font-size:100px; color: green">C</span><span style="font-size:100px; color: yellow">M</span><span style="font-size:100px; color: blue">S</span></h1></div>
		<form id="signin" action="?controller=User&action=loginProcess" method="post">
			<table class="table3">
				<tr>
					<td><input class="tdLogin" id="email" type="text"  placeholder="twój e-mail" name="email"></td>
				</tr>
				<tr>
					<td><input class="tdLogin" id="pass" type="password" placeholder="twóje hasło" name="pass"></td>
				</tr>
				<tr>
					<td><input class="btn btn-primary btn-lg btn-block" style="width: 400px; padding: 15px; border: 0px; border-radius: 3px;" type="submit" name="signin" value="Zaloguj"></td>
				</tr>
			</table>
			
		</form>
	</div>
</body>
</html>