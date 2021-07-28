<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>American College</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back" style="height:1220px">
		<?php include"navbar.php";?>
		<img src="img/b1.jpg" width="800" height="300">
		
		<div class="login">
			<h1 class="heading">Contact Us</h1>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15720.362879498374!2d78.1349072100695!3d9.92640246253643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c596164005b5%3A0x2c5811ddf116b4ef!2sThe%20American%20College!5e0!3m2!1sen!2sin!4v1607907963580!5m2!1sen!2sin" width="800" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			<div class="cont">
			
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
				The American College,<BR>
				Tallakkulam,<BR>
				Madurai – 625002,<BR>
				Mail - <a href="acmdu1881@gmail.com">acmdu1881@gmail.com</a><br>Phone - <a href="tel:+0452-2530070">0452-2530070	</a>
				</form>
			</div>
		</div>
		<div class="footer">
			<footer><p>Copyright &copy; American College </p></footer>
		</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
		
	
		
	</body>
</html>