<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
	include "sql.php";
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Change Password</title>
		<link rel="stylesheet" type="text/css" href="assets/css/scustom.css">
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

	</head>
	<style>
		* {
			margin: 0px;
			padding: 0px;
		}


		form {
			width: 500px;
			border: 2px solid #ccc;
			padding: 30px;
			background: #fff;
			border-radius: 15px;
		}

		h2 {
			text-align: center;
		}

		input {
			display: block;
			border: 2px solid #ccc;
			width: 95%;
			padding: 10px;
			border-radius: 5px;
		}

		label {
			color: #888;
			font-size: 18px;
		}

		form,
		.content {
			width: 30%;
			margin: 0px auto;
			padding: 20px;
			border: 1px solid #B0C4DE;
			background: white;
			border-radius: 10px 10px 10px 10px;
		}

		body {
			background: #1690A7;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			flex-direction: column;
		}

		* {
			font-family: sans-serif;
			box-sizing: border-box;
		}
	</style>

	<body>
		<form action="change-p.php" method="post">
			<h2>Change Password</h2>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error" role="alert"><?php echo $_GET['error']; ?></p>
			<?php } ?>


			<label class="change-pass-label">New Password</label>
			<input type="password" name="np" placeholder="New Password" class="change-pass-input">
			<br>

			<label class="change-pass-label">Confirm New Password</label>
			<input type="password" name="c_np" placeholder="Confirm New Password" class="change-pass-label">
			<br>

			<button class="btn btn-primary" type="submit">CHANGE</button>

			<a href="index.php" class="ca">HOME</a>
		</form>




	</body>

	</html>

<?php
} else {
	header("Location: index.php");
	exit();
}
?>
<script>
	$(document).ready(function() {
		$('.alert').fadeOut(1000)
	});
</script>