<?php 
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$products=$connect->query("select*from products where brandid=$id");
		$connect->query("delete from comments where id=$id");
		if (mysqli_num_rows($products)) {
			$connect->query("update comments set status=0 where id=$id");
		}
	}
?>
<?php 
	$query = "select * from comments";
	$result = $connect->query($query);
 ?>

<h1 style="padding:20px">COMMENTS CỦA THÀNH VIÊN</h1>
<!-- <section style="text-align: center;"><a href="?option=showcomments" class="btn btn-success">Comments</a></section> -->
<table class="table table-bordered">
	<thead>
		<tr>
			<thead>
				<th>STT</th>
				<th>Mã comments</th>
				<th>Mã thành viên</th>
				<th>Mã sản phẩm</th>
				<th>Ngày</th>
				<th>Comments</th>
				<th>Trạng thái</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $count=1;?>
				<?php foreach($result as $item): ?>
					<tr>
						<td><?=$count++?></td>
						<td><?=$item['id']?></td>
						<td><?=$item['memberid']?></td>
						<td><?=$item['productid']?></td>
						<td><?=$item['date']?></td>
						<td><?=$item['content']?></td>
						<td><?=$item['status']==1?'Active':'Unactive'?></td>
						<td>
							<a class="btn btn-sm btn-info" href="?option=commentsupdate&id=<?=$item['id']?>">Update</a>
							<a href="?option=comments&id=<?=$item['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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