<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title= $cate_rs['id']==$page_rs['cate'] ? $page_rs['title'] : $cate_rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<?php if($page_rs['banner']){ ?>
<div class="page_banner"><img src="<?php echo $page_rs['banner']['filename'];?>" width="980" alt="<?php echo $page_rs['title'];?>" /></div>
<?php } ?>
<div class="wrap mb10">
	<div class="page_left">
		<?php $list=phpok('_catelist',array('pid'=>$page_rs['id'],'cateid'=>$page_rs['cate']));?>
		<div class="categ"><?php echo $list['cate']['title'];?></div>
		<?php $list_tree_id["num"] = 0;$list['tree']=is_array($list['tree']) ? $list['tree'] : array();$list_tree_id["total"] = count($list['tree']);$list_tree_id["index"] = -1;foreach($list['tree'] AS $key=>$value){ $list_tree_id["num"]++;$list_tree_id["index"]++; ?>
		<dl class="sort">
			<dt><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></dt>
			<?php if($value['sublist']){ ?>
			<dd>
				<?php $value_sublist_id["num"] = 0;$value['sublist']=is_array($value['sublist']) ? $value['sublist'] : array();$value_sublist_id["total"] = count($value['sublist']);$value_sublist_id["index"] = -1;foreach($value['sublist'] AS $k=>$v){ $value_sublist_id["num"]++;$value_sublist_id["index"]++; ?>
				<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a>
				<?php } ?>
			</dd>
			<?php } ?>
		</dl>
		<?php } ?>
		<?php $this->output("block_contactus","file"); ?>
	</div>
	<div class="page_right">
		<div class="page_right_title">
			<span class="breadcrumbs">
				您现在的位置：
				<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>">首页</a>
				<span class="arrow">&nbsp;</span> <a href="<?php echo $page_rs['url'];?>" title="<?php echo $page_rs['title'];?>"><?php echo $page_rs['title'];?></a>
				<?php if($cate_parent_rs){ ?>
				<span class="arrow">&nbsp;</span> <a href="<?php echo $cate_parent_rs['url'];?>" title="<?php echo $cate_parent_rs['title'];?>"><?php echo $cate_parent_rs['title'];?></a>
				<?php } ?>
				<?php if($cate_rs['id'] != $page_rs['cate']){ ?>
				<span class="arrow">&nbsp;</span> <a href="<?php echo $cate_rs['url'];?>" title="<?php echo $cate_rs['title'];?>"><?php echo $cate_rs['title'];?></a>
				<?php } ?>
			</span>
			<?php echo $page_rs['cate'] == $cate_rs['id'] ? $page_rs['title'] : $cate_rs['title'];?>
		</div>
		<div class="mall">
			<ul>
				<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
				<li<?php if($rslist_id['num'] == $rslist_id['total'] || $rslist_id['num'] + 1 == $rslist_id['total']){ ?> class="laster"<?php } ?>>
					<span class="pro_img"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['gd']['thumb'];?>" width="150" height="200" alt="<?php echo $value['title'];?>" /></a></span>
					<dl class="p_prop">
						<dt><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></dt>
						<dd>添加时间：<?php echo date('Y-m-d',$value['dateline']);?></dd>
						<dd>查看次数：<?php echo $value['hits'];?></dd>
						<dd class="price">售卖价格：<span class="price"><?php echo price_format($value['price'],$value['currency_id']);?></span></dd>
						<dd><a href="javascript:$.cart.add('<?php echo $value['id'];?>',1);void(0);"><img src="tpl/www/images/buy-btn.jpg" width="157" height="33" /></a></dd>
					</dl>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php $this->output("block_pagelist","file"); ?>
	</div>
	<div class="cl"></div>
</div>
<?php $this->output("foot","file"); ?>