<?php 
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$products=$connect->query("select*from orderdetail where productid=$id");
		if (mysqli_num_rows($products)!=0) {
			$connect->query("update products set status=0 where id=$id");
		}else{
			$connect->query("delete from products where id=$id");
			unlink("../images/".$_GET['image']);
		}
		header("Location: ?option=product");
	}
?>
<?php 
	$query = "select * from products";
	$result = $connect->query($query);
 ?>

<h1>DANH SÁCH SẢN PHẨM</h1>
<section style="text-align: center;padding-bottom: 20px;"><a href="?option=productadd" class="btn btn-success">Thêm sản phẩm</a></section>
<table class="table table-bordered">
	<thead>
		<tr>
			<thead>
				<th>STT</th>
				<th>ID</th>
				<th>Tên</th>
				<th>Giá</th>
				<th>Ảnh</th>
				<th>Trạng thái</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $count=1;?>
				<?php foreach($result as $item): ?>
					<tr>
						<td><?=$count++?></td>
						<td><?=$item['id']?></td>
						<td><?=$item['name']?></td>
						<td><?=number_format($item['price'],0,',','.')?></td>
						<td width="30%"><img src="../images/<?=$item['image']?>" width="20%"></td>
						<td><?=$item['status']==1?'Active':'Unactive'?></td>
						<td>
							<a class="btn btn-sm btn-info" href="?option=productupdate&id=<?=$item['id']?>">Update</a>
							<a href="?option=product&id=<?=$item['id']?>&image=<?=$item['image']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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