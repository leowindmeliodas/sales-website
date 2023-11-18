<?php
	if (isset($_POST['content'])):
		$content=$_POST['content'];
		$productid=$_GET['id'];
		if (isset($_SESSION['member'])):
			$memberid=mysqli_fetch_array($connect->query("select*from member where username='".$_SESSION['member']."'"));
			$memberid=$memberid['id'];
			$connect->query("insert comments(memberid,productid,date,content) values ($memberid,$productid,now(),'$content')");
			echo "<script>alert('Bình luận của bạn đã được gửi và nó sẽ sớm được hiển thị!')</script>";
		else:
			$_SESSION['content']=$content;
			echo "<script>alert('Bạn phải đăng nhập để bình luận!'); location='?option=signin&productid=$productid';</script>";
		endif;
	endif;
?>

<?php 
	$id=$_GET['id'];
	$query="select*from products where id=$id";
	$result=$connect->query($query);
	$item=mysqli_fetch_array($result);
?>
<h1 style="padding:20px">Chi tiết sản phẩm</h1>
<section style="text-align: center;" class="productdetail">
	<section class="img"><img width="45%" src="images/<?=$item['image']?>"></a></section> <!-- Width="100%" co the xoa di -->
	<section style="padding-top:20px" class="name"><?=$item['name']?></section>
	<section class="price"><?=number_format($item['price'],0,',','.')?> đ</section>
	<section><input type="button" value="Đặt mua" class="btn btn-danger" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"></section>
</section>
<hr>
<section style="text-align:center;font-size: 20px;font-weight: bolder;margin-bottom: 10px;">Mô tả</section>
<section class="description"><?=$item['description']?></section>
<hr>
<section>
	<h2><i class="fa fa-comments" aria-hidden="true" style="font-size:27px">&nbsp;Comments:</i></h2>
	<?php 
		$comments=$connect->query("select*from member a join comments b on a.id=b.memberid join products c on b.productid=c.id where b.status and productid=".$_GET['id']);
		if (mysqli_num_rows($comments)==0):
			echo "<section style='color:green;padding-left:20px'>No comments!</section>";
		else:
			foreach($comments as $comment):
	?>
				<section style="font-weight: 600;"><i  style="margin-left: 20px;color: #8a8a5c;"class="fa fa-user-circle-o"></i>&nbsp;<?=$comment['username']?></section>
				<section style="padding-left: 5%;margin-left: 20px;"><?=$comment['content']?></section>

	<?php
			endforeach;
		endif;
	?>
	<form method="post">
		<section style="margin-top: 20px;">
			<textarea name="content" style="width: 90%;margin-left: 20px;" rows="5" class="form-control" placeholder="Write comment here..."></textarea>
		</section><br>
		<section style="text-align:center;padding-bottom: 20px;"><input type="submit" value="Submit" class="btn btn-primary"></section>
	</form>
</section>

<style type="text/css">
	.description{
		text-align: center;
	}
</style>