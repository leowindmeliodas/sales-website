<?php session_start();?>
<?php $connect = new MySQLi('localhost','root','','quangpro'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Website</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="images3/SHOP-MOBILE-QQ-logo-black.ico" rel='icon' type='image/x-icon' />
	
</head>
<body style="background-color: #c2c2a3">
<section class="wrapper">
	<header><?php include"views/layout/header.php"?></header>
	<nav><?php include"views/layout/menu-top.php";?></nav>
	<section class="body">
		<aside><?php include"views/layout/left.php";?></aside>
		<article>
			<?php include"views/layout/article.php";?>
		</article>
		<aside><?php include"views/layout/right.php";?></aside>
	</section>
	<footer><?php include"views/layout/footer.php";?></footer>
</section>
	
	<!-- Optional JavaScript; choose one of the two! -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>