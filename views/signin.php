<!-- <?php
	echo md5("123456");
	$query = "select*from member";
	$result = $connect->query($query);
	foreach ($result as $key=>$item):
		echo"<br>".$item['fullname'];
	endforeach;	
?> -->

<?php
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$query = "select*from member where username='$username' and password='$password'";
	$result = $connect->query($query);
	if(mysqli_num_rows($result)==0){
		$alert="Sai tên đăng nhập hoặc mật khẩu";
	}else{
		$result=mysqli_fetch_array($result);
		if($result['status']==0){
			$alert="Tài khoản của bạn đang bị khóa hoặc đang trong quá trình xử lý";
		}else{
			$_SESSION['member']=$username;
			//echo"<script>location='?option=home';</script>";
			if(isset($_GET['order'])){
				// header("location: ?option=order");
				echo"<script>location='?option=order'</script>";
			}elseif($_GET['productid']){
				$memberid=$result['id'];
				$productid=$_GET['productid'];
				$content=$_SESSION['content'];
				$connect->query("insert comments(memberid,productid,date,content) values ($memberid,$productid,now(),'$content')");
				echo "<script>alert('Your comment is submitted and it will be showed soon!'); location='?option=productdetail&id=$productid';</script>";
			}else{
				// header("location: ?option=home");
				echo"<script>location='?option=home'</script>";
			}
			
		}
	}
}
?>

<section style="margin: 22px;">
	<h1 style="text-align:center;"><font style="vertical-align: inherit;">Đăng nhập tài khoản</font></h1>
	<section><?=isset($alert)?$alert:""?></section>
	<section>
		<form style="display: flex;
		    flex-direction: column;
		    justify-content: center;
		    align-items: center;" method="post">
			<div class="form-group">
				<label><font style="vertical-align: inherit;">Username: </font></label>
				<input placeholder="Username" class="form-control" type="text" name="username" required>
			</div>
			<div class="form-group">
				<label>Password: </label>
				<input placeholder="Password" class="form-control" type="text" name="password" required>
			</div>
			<section><input type="submit" value="Đăng nhập" class="btn btn-info"></section><br>
			<div class="form-group">
                    <p>Bạn chưa có tài khoản? <a href="?option=register">Đăng ký ngay bây giờ</a>.</p>
            </div>
		</form>
	</section>
</section>

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

	section>form>form-group{
		line-height: 1;
	}
</style>

