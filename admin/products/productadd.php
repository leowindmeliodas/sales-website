<?php 
	if (isset($_POST['name'])) {
		$name=$_POST['name'];
		$query="select*from products where name='$name'";
		if(mysqli_num_rows($connect->query($query))!=0){
			$alert="Đã tồn tại tên sản phẩm này!";
		}else{
			$brandid=$_POST['brandid'];
			$price=$_POST['price'];
			$description=$_POST['description'];
			$status=$_POST['status'];
			//Xử lý phần ảnh:
			$store="../images/";
			$imageName=$_FILES['image']['name'];
			$imageTemp=$_FILES['image']['tmp_name'];
			$exp3=substr($imageName, strlen($imageName)-3);#abcd.jpg
			$exp4=substr($imageName, strlen($imageName)-4);#jpeg,webp,...
			if ($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=='JPG'||$exp3=='png'||$exp3=='BMP'||$exp3=='GIF'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'||$exp4=='WEBP') {
				$imageName=time().'_'.$imageName;
				move_uploaded_file($imageTemp, $store.$imageName);
				$connect->query("insert products(brandid,name,price,image,description,status) values('$brandid','$name','$price','$imageName','$description','status')");
				header("Location: ?option=product");
				unset($_SESSION['alert']);
			}else{
				$alert="File đã chọn không phải file ảnh!";
			}
		}
	}
 ?>

<?php $brands=$connect->query("select*from brands");?>

<h1>Thêm sản phẩm</h1>
<section style="color: red;font-weight: bold; text-align: center;"><?=isset($alert)?$alert:''?></section>
<section class="container col-md-6">
	<form method="post" enctype="multipart/form-data">
		<section class="form-group">
			<label>Hãng:</label>
			<select name="brandid" class="form-control">
				<option>--Chọn hãng--</option>
				<?php foreach($brands as $item):?>
					<option value="<?=$item['id']?>"><?=$item['name']?></option>
				<?php endforeach;?>
			</select>
		</section>
		<section class="form-group">
			<label>Tên:</label><input name="name" class="form-control">
		</section>
		<section class="form-group">
			<label>Giá:</label><input type="number" min="100000" name="price" class="form-control">
		</section>
		<section class="form-group">
			<label>Ảnh:</label><input type="file" name="image" class="form-control">
		</section>
		<section class="form-group">
			<label>Mô tả:</label>
			<textarea name="description" id="description"></textarea>
			<script> CKEDITOR.replace("description")</script>
		</section>
		<section class="form-group">
			<label>Trạng thái:</label><br><input type="radio" name="status" value="1" checked> Active <input type="radio" name="status" value="0"> Unactive
		</section>
		<section><input type="submit" value="Thêm" class="btn btn-primary"> <a href="?option=product" class="btn btn-outline-secondary">&lt;&lt; Back</a></section>
	</form>
</section>