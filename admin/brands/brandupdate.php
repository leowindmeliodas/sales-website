<?php $brand = mysqli_fetch_array($connect->query("select * from brands where id =".$_GET['id']));?>	
<?php 
	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$query = "select * from brands where name='$name' and id !=".$brand['id'];
		if(mysqli_num_rows($connect->query($query))!=0){
			$alert = "Đã có hãng khác mang tên này!";
		}
		else{
			$status=$_POST['status'];
			$connect->query("update brands set name='$name',status='$status' where id=".$brand['id']);
			header("location: ?option=brand");
		}
	}
 ?>
<h1>Update hãng sản xuất</h1>
<section style="color: red;font-weight: bold; text-align: center;"><?=isset($alert)?$alert:''?></section>
<section class="container col-md-6">
	<form method="post">
		<section class="form-group">
			<label>Tên hãng:</label><input value="<?=$brand['name']?>" name="name" class="form-control">
		</section>
		<section class="form-group">
			<label>Trạng thái hãng:</label><br><input type="radio" name="status" value="1" <?=$brand['status']==1?'checked':''?>> Active <input type="radio" name="status" value="0" <?=$brand['status']==0?'checked':''?>> Unactive
		</section>
		<section><input type="submit" value="Update" class="btn btn-primary"> <a href="?option=brand" class="btn btn-outline-secondary">&lt;&lt; Back</a></section>
	</form>
</section>