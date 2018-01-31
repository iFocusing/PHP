<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php echo tpl_head(array('title'=>$title,'css'=>"tpl/www/css/style.css,artdialog.css",'extjs'=>"jquery.artdialog.js",'js'=>"tpl/www/js/global.js",'close'=>"false"));?>
	<script type="text/javascript">
	$(document).ready(function(){
		$.cart.total();
	});
	</script>
</head>
<body>

<div class="head">
	<div class="logo"><a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>"><img src="<?php echo $config['logo'];?>" alt="<?php echo $config['title'];?>" /></a></div>
	<div class="head_right">
		<div class="top_nav">
			<a href="<?php echo phpok_url(array('ctrl'=>'cart','_nocache'=>'true'));?>" title="购物车">购物车 <span class="red">(<span id="head_cart_num">0</span>)</span></a> | 
			<?php if($session['user_id']){ ?>
			<a href="<?php echo phpok_url(array('ctrl'=>'usercp'));?>">个人中心</a> | 
			<a href="javascript:logout('<?php echo $session['user_name'];?>');void(0)">退出</a>
			<?php } else { ?>
			<a href="<?php echo phpok_url(array('ctrl'=>'login'));?>">登录</a> | 
			<a href="<?php echo phpok_url(array('ctrl'=>'register'));?>">注册</a>
			<?php } ?>
		</div>
		<div class="search">
			<form method="post" action="<?php echo phpok_url(array('ctrl'=>'search'));?>" onsubmit="return top_search();">
			<input name="keywords" value="<?php echo $keywords;?>" id="top-keywords" type="text" class="search_input" placeholder="请输入关键字" />
			<input name="" type="submit" class="search_btn" value="" />
			</form>
		</div>
	</div>
	<div class="cl"></div>
	<div class="nav">
	<ul>
		<?php $list = phpok('menu');?>
		<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
		<li<?php if($menutitle == $value['title']){ ?> class="current"<?php } ?>>
			<a<?php if($list_id['num'] == 1){ ?> class="first"<?php } ?><?php if($list_id['num'] == $list_id['total']){ ?> class="last"<?php } ?> href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" target="<?php echo $value['target'];?>"><?php echo $value['title'];?></a>
			<?php if($value['sonlist']){ ?>
			<ul>
				<?php $value_sonlist_id["num"] = 0;$value['sonlist']=is_array($value['sonlist']) ? $value['sonlist'] : array();$value_sonlist_id["total"] = count($value['sonlist']);$value_sonlist_id["index"] = -1;foreach($value['sonlist'] AS $k=>$v){ $value_sonlist_id["num"]++;$value_sonlist_id["index"]++; ?>
				<li><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="<?php echo $v['target'];?>"><?php echo $v['title'];?></a></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</li>
		<?php } ?>
	</ul>
	</div>
</div>