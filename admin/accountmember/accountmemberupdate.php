<?php $member = mysqli_fetch_array($connect->query("select * from member where id =".$_GET['id']));?>	
<?php 

	if (isset($_POST['status'])) {
		$connect->query("update member set status=".$_POST['status']." where id=".$_GET['id']);
		// header("Refresh:0");
		header("location: ?option=member");
	}
 ?>
<h1>Update member</h1>
<section style="color: red;font-weight: bold; text-align: center;"><?=isset($alert)?$alert:''?></section>
<section class="container col-md-6">
	<form method="post">

		<table class="table">
			<tbody>
				<tr>
					<td>Tài khoản: </td>
					<td><?=$member['username']?></td>
				</tr>
				<tr>
					<td>Mật khẩu: </td>
					<td><?=$member['password']?></td>
				</tr>
				<tr>
					<td>Họ tên: </td>
					<td><?=$member['fullname']?></td>
				</tr>
				<tr>
					<td>Số điện thoại: </td>
					<td><?=$member['mobile']?></td>
				</tr>
				<tr>
					<td>Địa chỉ: </td>
					<td><?=$member['address']?></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><?=$member['email']?></td>
				</tr>
				<tr class="form-group">
					<td>Trạng thái:</td><td><input type="radio" name="status" value="1" <?=$member['status']==1?'checked':''?>> Active <input type="radio" name="status" value="0" <?=$member['status']==0?'checked':''?>> Unactive</td>
				</tr>
			</tbody>
		</table>
		<section style="margin-left: 150px"><input type="submit" value="Update" class="btn btn-primary"> <a href="?option=member" class="btn btn-outline-secondary">&lt;&lt; Back</a></section>
	</form>
</section>