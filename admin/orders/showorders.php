<?php 
	if(isset($_GET['id'])){
		$id=$_GET['id'];
			$connect->query("delete from orderdetail where orderid=$id");
			$connect->query("delete from orders where id=$id");
			header("Location: ?option=order&status=4");
	}
?>
<?php
$status=$_GET['status'];
	$query = "select * from orders where status=$status";
	$result = $connect->query($query);
 ?>
<h1>ĐƠN HÀNG <?=$status==1?'CHƯA XỬ LÝ':($status==2?'ĐANG XỬ LÝ':($status==3?'ĐÃ XỬ LÝ':'HỦY'))?></h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<thead>
				<th>STT</th>
				<th>ID</th>
				<th>Ngày tạo</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $count=1;?>
				<?php foreach($result as $item): ?>
					<tr>
						<td><?=$count++?></td>
						<td><?=$item['id']?></td>
						<td><?=$item['orderdate']?></td>
						<td>
							<a class="btn btn-sm btn-info" href="?option=orderdetail&id=<?=$item['id']?>">Detail</a>
							<a style="display:<?=$status==4?'':'none'?>" href="?option=order&id=<?=$item['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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