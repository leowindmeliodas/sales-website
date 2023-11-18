<?php session_start();?>
<?php $connect = new MySQLi('localhost','root','','quangpro'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css.css">	
	<script src="../public/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- <link href="images3/SHOP-MOBILE-QQ-logo-black.ico" rel='icon' type='image/x-icon' /> -->

	<link href="//cdn.shopify.com/s/files/1/2778/4236/files/Transparent_Q_1cff7fbe-b40e-4ddb-a29b-2a8769e6e326_180x180.png?v=1548698011" rel='icon' type='image/x-icon' />
</head>
<body style="background-color: #f2f2f2;">
<?php 
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query = "select*from admin where username='$username' and password='$password'";
		$result = $connect->query($query);
		if(mysqli_num_rows($result)==0){
			$alert="Sai tên đăng nhập hoặc mật khẩu";
		}else{
			$result=mysqli_fetch_array($result);
			if ($result['status']==0) {
				$alert="Tài khoản đang bị hóa";
			}else{
				$_SESSION['admin']=$username;
				header("Refresh:0");
			}
			
		}
	}
?>

<section>
	<?php 
		if(isset($_SESSION['admin'])){
			include"admincontrolpanel.php";
		}else{
			include"loginadmin.php";
		}
	?>
</section>
</body>
</html>