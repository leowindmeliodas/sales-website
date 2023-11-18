<?php 
$xulyhangsx=mysqli_num_rows($connect->query("select*from brands"));

$xulysanpham=mysqli_num_rows($connect->query("select*from products"));

$chuaXuLy=mysqli_num_rows($connect->query("select*from orders where status=1"));
$dangXuLy=mysqli_num_rows($connect->query("select*from orders where status=2"));
$daXuLy=mysqli_num_rows($connect->query("select*from orders where status=3"));
$huy=mysqli_num_rows($connect->query("select*from orders where status=4"));

$xulycomments=mysqli_num_rows($connect->query("select*from comments"));

$xulyaccountmember=mysqli_num_rows($connect->query("select*from member"));
?>

<table class="table table-bordered tbl-admin">
	<tbody>
		<tr>
			<td width="17%" height="100">Hello: <?=$_SESSION['admin']?><br>[<a href="?option=logout">Logout <i class="fa fa-sign-in" aria-hidden="true"></i></a>]</td>
			<td align="center" style="color:#006666">ADMIN CONTROL PANEL</td>
		</tr>
		<tr>
			<td>
				<section><a href="?option=brand" class="btn btn-warning">>>> Hãng sản xuất <sup><span style="color:red"><?=$xulyhangsx?></span></a></section>
				<section ><a href="?option=product" class="btn btn-warning">>>> Sản phẩm <sup><span style="color:red"><?=$xulysanpham?></span></a></section>
				<section><a href="#">
					>>> Đơn hàng
					<section><a href="?option=order&status=1">&nbsp;&nbsp;&nbsp;>> Đơn hàng chưa xử lý [<span style="color:red"><?=$chuaXuLy?></span>]</a></section>
					<section><a href="?option=order&status=2">&nbsp;&nbsp;&nbsp;>> Đơn hàng đang xử lý [<span style="color:red"><?=$dangXuLy?></span>]</a></section>
					<section><a href="?option=order&status=3">&nbsp;&nbsp;&nbsp;>> Đơn hàng đã xử lý [<span style="color:red"><?=$daXuLy?></span>]</a></section>
					<section><a href="?option=order&status=4">&nbsp;&nbsp;&nbsp;>> Đơn hàng hủy [<span style="color:red"><?=$huy?></span>]</a></section>
				</section>
				<section><a href="?option=comments" class="btn btn-warning">>>>Comments <sup><span style="color:red"><?=$xulycomments?></span></a></section>

				<section><a href="?option=member" class="btn btn-warning">>>>Tài khoản member <sup></sup><sup><span style="color:red"><?=$xulyaccountmember?></span></a></section>
			</td>
			<td>
				<?php
					if (isset($_GET['option'])){
						switch($_GET['option']){
							case'logout':
								unset($_SESSION['admin']);
								header("location: .");
								break;
							case 'brand':
								include"brands/showbrands.php";
								break;
							case 'brandadd':
								include"brands/brandadd.php";
								break;
							case 'brandupdate':
								include"brands/brandupdate.php";
								break;
							case 'product':
								include"products/showproducts.php";
								break;
							case 'productadd':
								include"products/productadd.php";
								break;
							case 'productupdate':
								include"products/productupdate.php";
								break;
							case 'order':
								include"orders/showorders.php";
								break;
							case 'orderdetail':
								include"orders/orderdetail.php";
								break;
							case 'comments':
								include"comments/showcomments.php";
								break;
							case 'commentsupdate':
								include"comments/commentsupdate.php";
								break;
							case 'member':
								include"accountmember/showaccountmember.php";
								break;
							case 'accountmemberupdate':
								include"accountmember/accountmemberupdate.php";
								break;
						}
					}
				?>
			</td>
		</tr>
	</tbody>
</table>