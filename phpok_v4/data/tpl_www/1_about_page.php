<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title=$page_rs['title'];?><?php $this->assign("title",$page_rs['title']); ?><?php $menutitle=$parent_rs['title'];?><?php $this->assign("menutitle",$parent_rs['title']); ?><?php $this->output("head","file"); ?>
<?php if($parent_rs['banner']){ ?>
<div class="page_banner"><img src="<?php echo $parent_rs['banner']['filename'];?>" width="980" alt="<?php echo $page_rs['title'];?>" /></div>
<?php } ?>

<div class="wrap mb10">
	<div class="page_left">
		<dl class="sub_nav">
			<dt><?php echo $parent_rs['title'];?></dt>
			<?php $list=phpok('_sublist',array('pid'=>$parent_rs['id']));?>
			<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
			<dd<?php if($page_rs['id'] == $value['id']){ ?> class="on"<?php } ?>><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></dd>
			<?php } ?>
		</dl>
		<?php $this->output("block_contactus","file"); ?>
	</div>
	<div class="page_right">
		<div class="page_right_title">
			<span class="breadcrumbs">
				您现在的位置：
				<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>">首页</a>
				<span class="arrow">&nbsp;</span> <?php echo $parent_rs['title'];?>
				<span class="arrow">&nbsp;</span> <a href="<?php echo $page_rs['url'];?>" title="<?php echo $page_rs['title'];?>"><?php echo $page_rs['title'];?></a>
			</span>
			<?php echo $page_rs['title'];?>				
		</div>
		<div class="paragraph"><?php echo $page_rs['content'];?></div>
	</div>
	<div class="cl"></div>
</div>
<?php $this->output("foot","file"); ?>