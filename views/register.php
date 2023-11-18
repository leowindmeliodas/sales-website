<?php
	if(isset($_POST['username'])){
		$username=$_POST['username'];
		$query="select*from member where username='$username'";
		$result=$connect->query($query);
		if(mysqli_num_rows($result)!=0){
			$alert="Tên đăng nhập không có sẵn, mời chọn 1 tên đăng nhập khác!";
		}else{
			$password=md5($_POST['password']);
			$fullname=$_POST['fullname'];
			$mobile=$_POST['mobile'];
			$address=$_POST['address'];
			$email=$_POST['email'];
			$query="insert member(username,password,mobile,address,email) values('$username','$password','$mobile','$address','$email')";
			$connect->query($query);
			echo"<script>alert('Bạn đã đăng ký thành công tài khoản, chúng tôi sẽ liên hệ sớm đến bạn!');location='?option=home';</script>";
		}
	}
?>
<section style="margin: 22px;">
	<h1 style="text-align:center;"><font style="vertical-align: inherit;">Đăng ký tài khoản</font></h1>
	<section style="color:red"><?=isset($alert)?$alert:"";?></section>
	<section>

		<form style="display: flex;
		    flex-direction: column;
		    justify-content: center;
		    align-items: center;" method="post" onsubmit="if(repassword.value!=password.value){alert('Xác nhận mật khẩu không chính xác!');return false;}">
		  <div class="form-group">
		  	<label><font style="vertical-align: inherit;">Tên tài khoản</font></label>
		    <input placeholder="Tên tài khoản" class="form-control" type="text" name="username" required>
		  </div>
		  <div class="form-group">
		  	<label><font style="vertical-align: inherit;">Mật khẩu</font></label>
		    <input placeholder="Mật khẩu" class="form-control" type="password" name="password" required>
		  </div>
		  <div class="form-group">
		  	<label><font style="vertical-align: inherit;">Xác nhận mật khẩu</font></label>
		    <input placeholder="Xác nhận mật khẩu" class="form-control" type="password" name="repassword" required>
		  </div>
		  <div class="form-group">
		  	<label><font style="vertical-align: inherit;">Họ tên</font></label>
		    <input placeholder="Họ tên" class="form-control" type="text" name="fullname" required>
		  </div>
		  <div class="form-group">
		  	<label><font style="vertical-align: inherit;"> Số điện thoại</font></label>
		    <input placeholder="Số điện thoại" class="form-control" type="tel" name="mobile" required pattern="(0|\+84)\d{9}">
		  </div>
		  <div class="form-group">
		  	<label><font style="vertical-align: inherit;"> Địa chỉ</font></label>
		    <input placeholder="Địa chỉ" class="form-control" name="address" required></textarea>
		  </div>
		  <div class="form-group">
		  	<label><font style="vertical-align: inherit;">Email</font></label>
		    <input placeholder="Email" class="form-control" type="email" name="email">
		  </div>
		  <section>
		  	<button type="submit" class="btn btn-primary">Đăng ký</button>
		  	<button type="reset" class="btn btn-primary">Nhập lại</button>
		  </section>
		  <br>
		  <div class="form-group">
            	<p>Bạn đã có tài khoản? <a href="?option=signin"> Đăng nhập</a></p>
        	</div>
		</form>
	</section>
</section>




<style type="text/css">
	.form-group input {
		width: 400px;
	}
	section>form>.form-group{
		line-height: 1;
	}section>button{
		margin-right: 0.5rem!important;
	}
</style>