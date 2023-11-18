<?php
if(isset($_GET['option'])){
	switch ($_GET['option']){
		case 'ordersuccess':
			include"views/ordersuccess.php";
			break;
		case'order':
		include"views/order.php";
		break;
		case'cart':
		include"views/cart.php";
		break;
		case'showproducts':
		include"views/showproducts.php";
		break;
		case'productdetail':
			include"views/productdetail.php";
			break;
		case'register':
			include"views/register.php";
			break;
		case 'home':
			include"views/home.php";
			break;
		case'signin':
			include"views/signin.php";
			break;
		case'logout':
		unset($_SESSION['member']);
		// header("location: ?option=home");
		echo"<script>location='?option=home'</script>";
		break;
		case'news':
			include"views/news.php";
			break;
		case'about':
			include"views/about.php";
			break;
	}
}else{
	include"views/home.php";
}

?>