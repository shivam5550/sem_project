<?php
	include ('layout_manager.php');
	include ('content_function.php');
?>
<html>
<head><title>PUCHO-ask anything</title></head>
<link href="/pucho/styles/main.css" type="text/css" rel="stylesheet" />
<body>
	<div class="pane">
		<div class="header"><h1><a href="/pucho">PUCHO-ask anything</a></h1></div>
		<div class="loginpane">
			<?php
				session_start();
				if (isset($_SESSION['username'])) {
					logout();
				} else {
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg-success') {
							echo "<h1 style='color: green;'>new user registered successfully!</h1>";
						} else if ($_GET['status'] == 'login-fail') {
							echo "<h1 style='color: red;'>invalid username and/or password!</h1>";
						}
					}
					loginform();
				}
			?>
		</div>
		<div class="forumdesc">
			<p>Welcome to the world's coolest forum made for solving all your queries!!</p>
		</div>
		<div class="content">
			<?php 
				if (isset($_SESSION['username'])) {
					echo "<form action='/pucho/addnewtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'
						  method='POST'>
						  <p>Title: </p>
						  <input type='text' id='topic' name='topic' size='100' />
						  <p>Content: </p>
						  <textarea id='content' name='content'></textarea><br />
						  <input type='submit' value='add new post' /></form>";
				} else {
					echo "<p>please login first or <a href='/pucho/register.html'>click here</a> to register.</p>";
				}
			?>
		</div>
	</div>
</body>
</html>