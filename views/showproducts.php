<?php
	$option='home';
	$query="select*from products where status=1";
	if(isset($_GET['brandid'])){
		$query.=" and brandid=".$_GET['brandid'];
		$option='showproducts&brandid='.$_GET['brandid'];
	}elseif(isset($_GET['keyword'])){
		$query.=" and name like'%".$_GET['keyword']."%'";
		$option='showproducts&keyword='.$_GET['keyword'];
	}elseif(isset($_GET['range'])){
		$query.=" and price<=".$_GET['range'];
		$option='showproducts&range='.$_GET['range'];
	}
	if(isset($_GET['lowprice'])){
    $lowprice = $_GET['lowprice'];
    $highprice = $_GET['highprice'];
    $query .= " and price>='$lowprice' and price<'$highprice'";
  	}

	//$page: xem các sản phẩm ở trang số bao nhiêu
	$page=1;
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	// số lượng sản phẩm ở mỗi trang
	$productsperpage=6;
	// lấy các sản phẩm bắt đầu từ chỉ số bao nhiêu trong bảng (0 tức là bắt đầu từ bản ghi đầu tiên)
	$from=($page-1)*$productsperpage;
	// lấy tổng số sản phẩm
	$totalProduct=$connect->query($query);
	// tính tổng số trang có được
	$totalPages=ceil(mysqli_num_rows($totalProduct)/$productsperpage);
	// lấy các sản phẩm ở trang hiện thời
	$query.=" limit $from,$productsperpage";
	$result=$connect->query($query);
?>

<section class="products">
	<?php if(mysqli_num_rows($result)==0): ?>
		<section style="text-align: center; color: orange;font-weight: bold;font-size: 25px;margin-top: 30px;line-height: 20px;">Không tìm thấy sản phẩm</section>
	<?php endif;?>
	<?php foreach($result as $item):?>
		<section class="product">
			<section class="img"><a href="?option=productdetail&id=<?=$item['id']?>"><img src="images/<?=$item['image']?>"></a></section><br>
			<section class="name"><?=$item['name']?></section>
			<section class="price"><?=number_format($item['price'],0,',','.')?> đ</section>
			<section><input type="button" value="Đặt mua" class="btn btn-danger" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"></section>
		</section>
	<?php endforeach;?>
</section>
<section class="pages">
	<?php for($i=1; $i<=$totalPages; $i++):?>
		<a class="<?=(empty($_GET['page'])&&$i==1)||(isset($_GET['page'])&&$_GET['page']==$i)?'highlight':''?>" href="?option=<?=$option?>&page=<?=$i?>"><?=$i?></a>
	<?php endfor;?>
</section>

<style type="text/css">
	.product:hover{
        box-shadow: 0px 0px 3px 1px #d1e0e0;
    }

	.product {
   padding: 5px;
   border-radius: 5px;

  /* HOVER OFF */
   -webkit-transition: padding 0s;
}

 .product:hover {
   padding: 10px;
   border-radius: 10px;

  /* HOVER ON */
   -webkit-transition: border-radius 0s;
}
</style>