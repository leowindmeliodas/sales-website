<?php 
	if(empty($_SESSION['cart'])){
		$_SESSION['cart']=array();
	}
	if(isset($_GET['action'])){
		$id=isset($_GET['id'])?$_GET['id']:'';
		switch($_GET['action']){
			case'add':
				if(array_key_exists($id, array_keys($_SESSION['cart']))){
					$_SESSION['cart'][$id]++;
				}else{
					$_SESSION['cart'][$id]=1;
				}
				// header("location: ?option=cart");
				echo"<script>location='?option=cart'</script>";
				break;
			case'delete':
				unset($_SESSION['cart'][$id]);
				break;
			case'deleteall':
				unset($_SESSION['cart']);
				break;
			case'update':
				if($_GET['type']=='asc')
					$_SESSION['cart'][$id]++;
				else
					if($_SESSION['cart'][$id]>1)
					$_SESSION['cart'][$id]--;
				// header("location: ?option=cart");
				echo"<script>location='?option=cart'</script>";
				break;
			case'order':
				if(isset($_SESSION['member'])){
					// header("location: ?option=order");
					echo"<script>location='?option=order'</script>";
				}else{
					// header("location: ?option=signin&order=1");
					echo"<script>location='?option=signin&order=1'</script>";
				}
				break;
		}
	}
?>
<section class="cart">
<?php
if(!empty($_SESSION['cart'])):
	// $ids="0";
	// foreach(array_keys($_SESSION['cart']) as $key)
	// $ids.=",".$key;
	$ids = implode(',', array_keys($_SESSION['cart']));
	$query="select*from products where id in($ids)";
	$result=$connect->query($query);
?>
	<table border="1" width="100%" cellpadding="0" cellspacing="0">
		<thead>
			<tr style="color: #660066; text-align: center;">
				<td>Image</td>
				<td>Name</td>
				<td>Price (vnd)</td>
				<td>Number</td>
				<td>subTotal</td>
			</tr>
		</thead>
		<tbody>
<?php
	$toTal=0;
	foreach($result as $item):
?>
			<tr style="text-align:center;">
				<td width="20%"><img class="img-product-cart" width="100%" src="images/<?=$item['image']?>"></td>
				<td><?=$item['name']?><br><input type="button" value="Delete" class="btn btn-danger" onclick="location='?option=cart&action=delete&id=<?=$item['id']?>';"></td>
				<td><?=number_format($item['price'],0,',','.')?></td>
				<td><?=$_SESSION['cart'][$item['id']]?> <input type="button" value="+" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['id']?>';"><input  type="button" value="-" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['id']?>';"></td>
				<td><?=number_format($subTotal=$item['price']*$_SESSION['cart'][$item['id']],0,',','.')?></td>
			</tr>
			<?php $toTal+=$subTotal;?>
<?php
	endforeach;
?>
		<tr>
			<td colspan="5" style="text-align:center;"> 
				<section class="total-price">Tổng tiền (vnđ): <?=number_format($toTal,0,',','.')?></section>
				<section class="mb-4"><input type="button" value="Delete Cart" class="btn btn-danger" onclick="if(confirm('Are you sure?')) location='?option=cart&action=deleteall';"> <input type="button" value="Đặt hàng" class="btn btn-danger ml-4" onclick="location='?option=cart&action=order';"></section>
			</td>
		</tr>
		</tbody>
	</table>
<?php
else:
?>
<section style="text-align: center; color: orange;font-weight: bold;font-size: 25px;margin-top: 30px;">Giỏ hàng trống</section>
<?php 
endif;
?>
</section>

<style type="text/css">
	.img-product-cart {
    	padding: 12px;
	}

	.total-price {
    	padding: 12px 0;
	}
</style>