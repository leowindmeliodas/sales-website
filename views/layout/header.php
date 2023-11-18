<header class="hd">
	<section style="text-align:center;">
		<!-- <form autocomplete class="btn btn-light"> -->
		<form autocomplete class="btn btn-light" id="search-form">
		<input type="hidden" name="option" value="showproducts">
		<input autocomplete="on" type="search" name="keyword" class="form-control search-input" placeholder="Tìm kiếm sản phẩm" value="<?=isset($_GET['keyword'])?$_GET['keyword']:""?>">
		<!-- <input type="submit" value="search" class="btn btn-dark"> -->
		<span class="input-group-text" id="search-button">
		    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=   "bi bi-search" viewBox="0 0 16 16">
		       <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
		    </svg>
		</span>
		</form>
	</section>
	<h1 class="test">SHOP MOBILE QQ</h1>
	<section>
	 <div class="chudong"><marquee behavior="alternate" width="50%" direction="right">
	 ---------------------------------------------------------------</marquee>
	</div>
	</section>
</header>
<script type="text/javascript">
	document.getElementById("search-button").addEventListener("click", function(){
		document.getElementById("search-form").submit();
	});
</script>

<style type="text/css">
	.hd{
		text-align: center;
		line-height: 100px;
		box-sizing: border-box;
		font-size: 35px;
		font-weight : bold;
		color: #f2f2f2;
		background-color:  #ff5050;
		border: none;

	}
	header.hd {
	    display: flex;
	    align-items: center;

	}
	header.hd h1 {
		transform: translateX(85%);
	}
	form.btn.btn-light {
		background-color: inherit;
		display: flex;
		gap: 0 5px;
		border: none;
}

	@-webkit-keyframes my {
	 0% { color: #F8CD0A; } 
	 50% { color: #fff;  } 
	 100% { color: #F8CD0A;  } 
 }
 @-moz-keyframes my { 
	 0% { color: #F8CD0A;  } 
	 50% { color: #fff;  }
	 100% { color: #F8CD0A;  } 
 }
 @-o-keyframes my { 
	 0% { color: #F8CD0A; } 
	 50% { color: #fff; } 
	 100% { color: #F8CD0A;  } 
 }
 @keyframes my { 
	 0% { color: #F8CD0A;  } 
	 50% { color: #fff;  }
	 100% { color: #FF66CC;  } 
 } 
 .test {
         /*background:#3d3d3d;*/
         font-size:45px;
         font-weight:bold;
	 -webkit-animation: my 700ms infinite;
	 -moz-animation: my 700ms infinite; 
	 -o-animation: my 700ms infinite; 
	 animation: my 700ms infinite;
}
	.chudong{
		margin-bottom: -90px;
		float: left;
		text-align: left;
		font-size: 20px;
	}
	 
	 .chudong {
	         /*background:#3d3d3d;*/
	         font-size:20px;
	         font-weight:bold;
		 -webkit-animation: my 700ms infinite;
		 -moz-animation: my 700ms infinite; 
		 -o-animation: my 700ms infinite; 
		 animation: my 700ms infinite;
}
</style>