<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $menutitle="网站首页";?><?php $this->assign("menutitle","网站首页"); ?><?php $this->output("head","file"); ?>
<div class="home_banner">
	<?php $list = phpok('picplayer');?>
	<ul class="pro_ul">
		<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
		<li><a href="<?php echo $value['link'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['pic']['filename'];?>" width="980" alt="<?php echo $value['title'];?>" /></a></li>
		<?php } ?>
	</ul>
	<ul class="page_ul">
		<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
		<li></li>
		<?php } ?>
	</ul>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".home_banner").slide({
		'titCell':'.page_ul li',
		'mainCell':'.pro_ul',
		'autoPlay':true
	});
});
</script>
<div class="wrap">
	<div class="home_left">
		<?php $list = phpok('news');?>
		<div class="m_box">
			<div class="m_t">
				<p class="name"><?php echo $list['project']['title'];?></p>
				<span class="name_en"><?php echo $list['project']['entitle'];?></span>
				<a href="<?php echo $list['project']['url'];?>" class="more" title="阅读更多<?php echo $list['project']['title'];?>">更多</a>
				<div class="cl"></div>
			</div>
			<ul class="home_news">
				<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
				<li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></li>
				<?php } ?>
			</ul>
		</div>

		<?php $list = phpok('products_cate');?>
		<div class="m_box">
			<div class="m_t">
				<p class="name">产品分类</p>
				<span class="name_en">Categories</span>
				<a href="<?php echo $list['project']['url'];?>" class="more">more</a>
				<div class="cl"></div>
			</div>
			<?php $list_tree_id["num"] = 0;$list['tree']=is_array($list['tree']) ? $list['tree'] : array();$list_tree_id["total"] = count($list['tree']);$list_tree_id["index"] = -1;foreach($list['tree'] AS $key=>$value){ $list_tree_id["num"]++;$list_tree_id["index"]++; ?>
			<dl class="sort">
				<dt><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></dt>
				<dd>
					<?php $value_sublist_id["num"] = 0;$value['sublist']=is_array($value['sublist']) ? $value['sublist'] : array();$value_sublist_id["total"] = count($value['sublist']);$value_sublist_id["index"] = -1;foreach($value['sublist'] AS $k=>$v){ $value_sublist_id["num"]++;$value_sublist_id["index"]++; ?>
					<a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a>
					<?php } ?>
				</dd>
			</dl>
			<?php } ?>
		 </div>
		
		<div class="m_box">
			<div class="m_t">
				<p class="name">最新下载</p>
				<span class="name_en">Downloads</span>
				<a href="<?php echo phpok_url(array('id'=>'download-center'));?>" class="more">more</a>
				<div class="cl"></div>
			</div>
			<ul class="home_news">
				<?php $list = phpok('xiazaizhongxin');?>
				<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
				<li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="m_box">
			<div class="m_t">
				<p class="name">联系我们</p>
				<span class="name_en">Contact</span>
				<div class="cl"></div>
			</div>
			<div class="home_contact">
				<?php if($config['contactus']['company']){ ?><h3><?php echo $config['contactus']['company'];?></h3><?php } ?>
				<?php if($config['contactus']['address']){ ?><div>地址：<?php echo $config['contactus']['address'];?></div><?php } ?>
				<?php if($config['contactus']['email']){ ?><div>Email：<?php echo $config['contactus']['email'];?></div><?php } ?>
				<?php if($config['contactus']['zipcode']){ ?><div>邮编：<?php echo $config['contactus']['zipcode'];?></div><?php } ?>
				<?php if($config['contactus']['tel']){ ?><div>电话：<?php echo $config['contactus']['tel'];?></div><?php } ?>
				<?php if($config['contactus']['fullname']){ ?><div>联系人：<?php echo $config['contactus']['fullname'];?></div><?php } ?>
			</div>
		</div>
	</div>
	
	
	<div class="home_right">
		<?php if($page_rs){ ?>
		<div class="m_box">
			<div class="m_t">
				<p class="name"><?php echo $page_rs['subtitle'];?></p>
				<span class="name_en"><?php echo $page_rs['entitle'];?></span>
				<?php if($page_rs['url'] && $page_rs['link']){ ?>
				<a href="<?php echo $page_rs['url'];?>" class="more">更多</a>
				<?php } ?>
				<div class="cl"></div>
			</div>
			<div class="home_about">
				<img src="<?php echo $page_rs['pic'];?>" width="129" height="133" />
				<p><?php echo $page_rs['note'];?></p>
			</div>
		</div>
		<?php } ?>
	  
		<div class="atlas" id="photoslist">
			<?php $list = phpok('tujixiangce');?>
			<div class="atlas_t">
				<p class="name"><?php echo $list['project']['title'];?></p> <span class="name_en"><?php echo $list['project']['entitle'];?></span>
				<div class="tabs">
					<a href="javascript:void(0);" class="next"></a>
					<a href="javascript:void(0);" class="prev"></a>
				</div>
			</div>
			<div class="events">
				<ul>
				<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
				<li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['gd']['thumb'];?>" width="133" height="151" alt="<?php echo $value['title'];?>" /></a></li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#photoslist").slide({
				'mainCell':'.events ul',
				'effect':"leftLoop",
				'autoPlay':true,
				'vis':5
			});
		});
		</script>

		<div class="atlas">
			<div class="atlas_t">
				<p class="name">最新产品</p><span class="name_en">New products</span>
				<div class="tabs"><a href="<?php echo phpok_url(array('id'=>'product'));?>" class="more">MORE</a></div>
			</div>
			<ul class="home_list">
				<?php $list = phpok('new_products');?>
				<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
				<li>
			 		<p class="img159px"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['gd']['thumb'];?>" width="159" height="183" alt="<?php echo $value['title'];?>" /></a></p>
					<p class="l_name"><?php echo $value['title'];?></p>
					<p class="l_price">价格：<span><?php echo price_format($value['price'],$value['currency_id']);?></span></p>
					<p><a href="javascript:$.cart.add('<?php echo $value['id'];?>',1);void(0);"><img src="tpl/www/images/buy-btn.jpg" width="157" height="33" /></a></p>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="cl"></div>
</div>

<div class="cooper">
	<?php $list = phpok('link');?>
	<div class="cooper_t">
		<p class="name"><?php echo $list['project']['title'];?></p><span class="name_en"><?php echo $list['project']['entitle'];?></span>
		<a href="<?php echo phpok_url(array('ctrl'=>'post','id'=>$list['project']['identifier']));?>" class="more">+ 申请友情链接</a>
		<div class="cl"></div>
	</div>
	<div class="home_link">
		<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
		<a href="<?php echo $value['link'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a>
		<?php } ?>
	</div>
</div>
<?php $this->output("foot","file"); ?>