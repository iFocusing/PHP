<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $cate_rs['id']  != $page_rs['cate'] ? $cate_rs['title'].' - '.$page_rs['title'] : $page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<?php if($page_rs['banner']){ ?>
<div class="page_banner"><img src="<?php echo $page_rs['banner']['filename'];?>" width="980" alt="<?php echo $title;?>" /></div>
<?php } ?>

<div class="wrap mb10">
	<div class="page_left">
		<?php $this->output("block_catelist","file"); ?>
		<?php $this->output("block_contactus","file"); ?>
	</div>
	<div class="page_right">
		<div class="page_right_title">
			<span class="breadcrumbs">
				您现在的位置：
				<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>">首页</a>
				<span class="arrow">&nbsp;</span> <a href="<?php echo $page_rs['url'];?>" title="<?php echo $page_rs['title'];?>"><?php echo $page_rs['title'];?></a>
				<?php if($cate_rs['id'] != $page_rs['cate']){ ?>
				<span class="arrow">&nbsp;</span> <a href="<?php echo $cate_rs['url'];?>" title="<?php echo $cate_rs['title'];?>"><?php echo $cate_rs['title'];?></a>
				<?php } ?>
			</span>
			<?php echo $page_rs['cate'] == $cate_rs['id'] ? $page_rs['title'] : $cate_rs['title'];?>
		</div>
		<ul class="photo_list">
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<li>
				<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['thumb']['title'];?>" /></a>
				<p><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></p>
			</li>
			<?php } ?>
		</ul>
		<?php $this->output("block_pagelist","file"); ?>
	</div>
	<div class="cl"></div>
</div>
<?php $this->output("foot","file"); ?>
