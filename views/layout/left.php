<h2>Các hãng điện thoại</h2>
<?php
$query="select*from brands where status";
$result=$connect->query($query);
?>
<?php foreach ($result as $item):?>
	<section style="text-align: center;">
		<a href="?option=showproducts&brandid=<?=$item['id']?>"><!-- &emsp;&emsp; --><?=$item['name']?></a>
	</section>
<?php endforeach;?>

<style type="text/css">
	section>a{
		color: black;
	}h2{
		font-size: 20px;
		text-align: center;
		line-height: 50px;
	}a:hover{color: #0077b3;;}
</style>