<?php 
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$member=$connect->query("select*from member where id=$id");
		$connect->query("delete from member where id=$id");
		if (mysqli_num_rows($member)) {
			$connect->query("update member set status=0 where id=$id");
		}
	}
?>
<?php 
	$query = "select * from member";
	$result = $connect->query($query);
 ?>

<h1 style="padding:20px">TÀI KHOẢN THÀNH VIÊN</h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<thead>
				<th>STT</th>
				<th>Mã member</th>
				<th>Tài khoản</th>
				<th>Mật khẩu</th>
				<th>Họ tên</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<th>Email</th>
				<th>Trạng thái</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $count=1;?>
				<?php foreach($result as $item): ?>
					<tr>
						<td><?=$count++?></td>
						<td><?=$item['id']?></td>
						<td><?=$item['username']?></td>
						<td><?=$item['password']?></td>
						<td><?=$item['fullname']?></td>
						<td><?=$item['mobile']?></td>
						<td><?=$item['address']?></td>
						<td><?=$item['email']?></td>
						<td><?=$item['status']==1?'Active':'Unactive'?></td>
						<td>
							<a class="btn btn-sm btn-info" href="?option=accountmemberupdate&id=<?=$item['id']?>">Update</a>
							<a href="?option=member&id=<?=$item['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
						</td>
					</tr>
		 		<?php endforeach; ?>
			</tbody>
		</tr>
	</thead>
</table>

 <style type="text/css">
 	a{
 		text-decoration: none;
 		font-weight: bold ;
 		color: blue;
 	}
 	a:hover{
 		color: red;
 		font-size: 15px;
 		font-weight: initial;
 		box-sizing: border-box;
 	}
 </style>