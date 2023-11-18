<?php $comments = mysqli_fetch_array($connect->query("select * from comments where id =".$_GET['id']));?>	
<?php 
	if (isset($_POST['status'])) {
		$connect->query("update comments set status=".$_POST['status']." where id=".$_GET['id']);
		// header("Refresh:0");
		header("location: ?option=comments");
	}
 ?>
<h1>Update comments</h1>
<section style="color: red;font-weight: bold; text-align: center;"><?=isset($alert)?$alert:''?></section>
<section class="container col-md-6">
	<form method="post">

		<table class="table">
			<tbody>
				<tr>
					<td>Mã thành viên: </td>
					<td><?=$comments['memberid']?></td>
				</tr>
				<tr>
					<td>Mã sản phẩm: </td>
					<td><?=$comments['productid']?></td>
				</tr>
				<tr>
					<td>Ngày: </td>
					<td><?=$comments['date']?></td>
				</tr>
				<tr>
					<td>Comments: </td>
					<td><?=$comments['content']?></td>
				</tr>
				<tr class="form-group">
					<td>Trạng thái:</td><td><input type="radio" name="status" value="1" <?=$comments['status']==1?'checked':''?>> Active <input type="radio" name="status" value="0" <?=$comments['status']==0?'checked':''?>> Unactive</td>
				</tr>
			</tbody>
		</table>
		<section style="margin-left: 150px"><input type="submit" value="Update" class="btn btn-primary"> <a href="?option=comments" class="btn btn-outline-secondary">&lt;&lt; Back</a></section>
	</form>
</section>