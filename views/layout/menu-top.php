<nav class="menu-top">
	<a href="?option=home">
        <i class="fa fa-home"></i>
    Home
    </a>
	<a href="?option=news">
        <i class="fa fa-newspaper-o"></i>
    News</a>
	<a href="?option=cart">
        <i class="fa fa-shopping-cart"></i>
    Cart</a>
    <a href="?option=about">
        <i class="fa fa-info-circle"></i>
    About</a>
	<?php if(empty($_SESSION['member'])):?>
	<a href="?option=signin">
        <i class="fa fa-sign-in" aria-hidden="true"></i>
    Sign-in</a>
	<a href="?option=register">
        <i class="fa fa-registered" aria-hidden="true"></i>
    Register</a>
    
	<?php else:?>
	<section style="color:white;line-height: 30px;text-align: center;">Hello: <span style="color: red;"><?=$_SESSION['member']?></span> [<a href="?option=logout" style="color: wheat;">Log out <i class="fa fa-sign-out" aria-hidden="true"></i></a>]</section>
	<?php endif;?>
</nav>

<style type="text/css">
.menu-top {
    float: left;
    background-color: #252525;
    width: 100%;
    height: 35px;
    border: #1a1717 thin solid;
    box-sizing: border-box;
    margin-bottom: 10px;
}
nav {
    display: block;
}
</style>

<style type="text/css">
	.menu-top>a {
    float: left;
    /*width: 20%;*/
    height: 100%;
    border: #1a1717 thin solid;
    /*text-decoration: none;*/
    text-align: center;
    color: white;
    box-sizing: border-box;
    line-height: 30px;
}	a:hover{
	color: #66ccff;
    /*background: grey;*/
}
</style>