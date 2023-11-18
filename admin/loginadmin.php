<!-- <br><h1>ĐĂNG NHẬP TRANG QUẢN TRỊ</h1><br>
<section style="text-align: center;">
	<section style="color: red;font-weight: bold;"><?=isset($alert)?$alert:''?></section>
<form method="post">
	<section>
		<label>Username: </label><input name="username">
	</section><br>
	<section>
		<label>Password: </label><input type="password" name="password">
	</section><br>
	<section><input type="submit" value="Đăng nhập" class="btn btn-info"></section>
</form>
</section> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6 col-lg-5">
	            <h3 class="text-center text-secondary mt-5 mb-3">ĐĂNG NHẬP QUẢN TRỊ</h3>
	            <form method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
	                <div class="form-group">
	                    <label for="username">Username</label>
	                    <input name="username" id="user" type="text" class="form-control" placeholder="Username">
	                </div>
	                <div class="form-group">
	                    <label for="password">Password</label>
	                    <input name="password" id="password" type="password" class="form-control" placeholder="Password">
	                </div>
	                <div class="form-group" style="text-align: center;">
	                    
	                    <button class="btn btn-success px-5">Login</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</body>
</html>
