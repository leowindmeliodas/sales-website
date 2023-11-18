<?php
	$query="select*from member where username='".$_SESSION['member']."'";
	$member=mysqli_fetch_array($connect->query($query));
?>
<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$note=$_POST['note'];
		$ordermethodid=$_POST['ordermethodid'];
		$memberid=$member['id'];
		$query="insert orders(ordermethodid,memberid,name,address,mobile,email,note) values($ordermethodid,$memberid,'$name','$address','$mobile','$email','$note')";
		$connect->query($query);
		$query="select id from orders order by id desc limit 1";
		$orderid=mysqli_fetch_array($connect->query($query))['id'];
		foreach($_SESSION['cart'] as $key=>$value){
			$productid=$key;
			$number=$value;
			$query="select price from products where id=$key";
			$price=mysqli_fetch_array($connect->query($query))['price'];
			$query="insert orderdetail values($productid,$orderid,$number,$price)";
			$connect->query($query);
		}
		unset($_SESSION['cart']);
		// header("location: ?option=ordersuccess");
		echo"<script>location='?option=ordersuccess'</script>";
		
	}
?>

<h1 style="font-size: 2.5em;margin-top: 20px;margin-left: 20px;">ĐẶT HÀNG:</h1>
<form method="post">
<h2 style="font-size:30px">THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
	<section style="display: flex;
		    flex-direction: column;
		    justify-content: center;
		    align-items: center;">
	
		<div class="form-group">
			<label><font style="vertical-align: inherit;">Họ tên</font></label>
			<input placeholder="Họ tên" class="form-control" name="name" value="<?=$member['fullname']?>">
		</div>
		<div class="form-group">
			<label><font style="vertical-align: inherit;">Số điện thoại</font></label>
			<input placeholder="Số điện thoại" class="form-control" type="tel" name="mobile" value="<?=$member['mobile']?>">
		</div>
		<div class="form-group">
			<label><font style="vertical-align: inherit;">Địa chỉ</font></label>
			<textarea placeholder="Địa chỉ" class="form-control" name="address" rows="3"><?=$member['address']?></textarea>
		</div>
		<div class="form-group">
			<label><font style="vertical-align: inherit;">Email</font></label>
			<input placeholder="Email" class="form-control" type="emial" name="email" value="<?=$member['email']?>">
		</div>
		<div class="form-group">
			<label><font style="vertical-align: inherit;">Ghi chú</font></label>
			<textarea placeholder="Ghi chú" class="form-control" name="note" rows="3"></textarea>
		</div>
	</section>
		<h2>Chọn phương thức thanh toán</h2>
		<?php
			$query="select*from ordermethod where status";
			$result=$connect->query($query);
		?>
		<section style="text-align:center;">
		<select name="ordermethodid">
			<?php foreach($result as $item):?>
				<option value="<?=$item['id']?>"><?=$item['name']?></option>
			<?php endforeach;?>
		</select>
		</section>
		<section style="text-align:center;margin-bottom: 30px;">
			<input type="submit" value="Đặt hàng" class="btn btn-danger" style="margin-top: 20px;">
		</section>
</form>

<style type="text/css">
	.form-group input {
		width: 400px;
	}.form-control {
    display: block;
    width: 100%;
    padding: 0.375 rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
	.form-group textarea {
		width: 400px;
	}.form-control {
    display: block;
    width: 100%;
    padding: 0.375 rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

	section>.form-group{
		line-height: 1;
	}
</style>
