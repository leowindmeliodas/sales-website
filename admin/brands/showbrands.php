<?php 
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$products=$connect->query("select*from products where brandid=$id");
		if (mysqli_num_rows($products)!=0) {
			$connect->query("update brands set status=0 where id=$id");
		}else{
			$connect->query("delete from brands where id=$id");
		}
	}
?>
<?php 
	$query = "select * from brands";
	$result = $connect->query($query);
 ?>

<h1>HÃNG SẢN XUẤT</h1>
<section style="text-align: center;padding-bottom: 20px;"><a href="?option=brandadd" class="btn btn-success">Thêm hãng</a></section>
<table class="table table-bordered">
	<thead>
		<tr>
			<thead>
				<th>STT</th>
				<th>Mã hãng</th>
				<th>Tên hãng</th>
				<th>Trạng thái hãng</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $count=1;?>
				<?php foreach($result as $item): ?>
					<tr>
						<td><?=$count++?></td>
						<td><?=$item['id']?></td>
						<td><?=$item['name']?></td>
						<td><?=$item['status']==1?'Active':'Unactive'?></td>
						<td>
							<a class="btn btn-sm btn-info" href="?option=brandupdate&id=<?=$item['id']?>">Update</a>
							<a href="?option=brand&id=<?=$item['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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