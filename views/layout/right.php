<section style="text-align:center;">
	<form>
		<h2>Tìm kiếm theo giá sản phẩm</h2>
		<input type="hidden" name="option" value="showproducts">
		<input type="range" name="range" min="100000" max="60000000" step="500000" oninput="document.getElementById('max').innerHTML=this.value;" value="<?=isset($_GET['range'])?$_GET['range']:""?>"><span id="max"><?=isset($_GET['range'])?$_GET['range']:""?></span><br>
		<input type="submit" value="search" class="btn btn-dark">
	</form>
</section><br>

<style type="text/css">
	section>form>h2{
		line-height: 30px;
		font-size: 20px;

	}
</style>

<style type="text/css">
	.prices>a{
		float: left;
		width: 100%;
		margin-top: 5px;

	}a:hover{color: #0077b3;}
</style>
<!-- <h2>Mức giá</h2> -->
<?php 
  $query = "select*from prices where status=1";
  $result = $connect->query($query);
?>
<section class="prices" style="text-align: center;">
	<?php foreach($result as $item):?>
		<a href="?option=home&lowprice=<?=$item['lowprice']?>&highprice=<?=$item['highprice']?>"><?=number_format($item['lowprice'],0,',','.').' - '.number_format($item['highprice'],0,',','.')?> (vnđ)</a>
	<?php endforeach;?>
</section>

 </section>

