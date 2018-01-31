<?php
/***********************************************************
	Filename: phpok/admin/index_control.php
	Note	: 后台首页控制台
	Version : 4.0
	Web		: www.phpok.com
	Author  : qinggan <qinggan@188.com>
	Update  : 2012-10-19 13:03
***********************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class index_control extends phpok_control
{
	function __construct()
	{
		parent::control();
	}

	function index_f()
	{
		if(!$this->license_code) $this->license = "LGPL";
		$license = strtoupper($this->license);
		$code = '';
		if($license == "PBIZ" && $this->license_code && $this->license_name)
		{
			$code = '<span style="color:darkblue;">个人（'.$this->license_name.'）商业授权</span>';
		}
		elseif($license == "CBIZ" && $this->license_code && $this->license_name)
		{
			$code = '<span style="color:darkblue;">企业（'.$this->license_name.'）商业授权</span>';
		}
		else
		{
			$code = "<span class='red'>LGPL开源授权</span>";
		}
		$license_site = $this->license_site;
		if(substr($license_site,0,1) == '.')
		{
			$license_site = substr($license_site,1);
		}
		$this->assign('license_site',$license_site);
		$this->assign("license",$code);
		$this->assign("version",$this->version);
		//判断是否升级
		$uconfig = array('status'=>0);
		if(is_file($this->dir_root.'data/update.php'))
		{
			include($this->dir_root.'data/update.php');
		}
		$this->assgin('update',$uconfig);
		//获取站点列表
		$sitelist = $this->model('site')->get_all_site();
		$this->assign('sitelist',$sitelist);
		//读取全部应用及模块
		$plist = $this->model('popedom')->get_all('',false,false);
		$popedom_m = $popedom_p = array();
		foreach($plist AS $key=>$value)
		{
			if(!$value["pid"])
			{
				$popedom_m[$value["gid"]][] = $value["id"];
			}
			else
			{
				$popedom_p[] = $value["id"];
			}
		}
		$popedom = $_SESSION["admin_rs"]["if_system"] ? array("all") : $_SESSION["admin_popedom"];
		if(!$popedom)
		{
			$popedom = array();
		}
		$menulist = $this->model('sysmenu')->get_all($_SESSION["admin_site_id"],1);
		if(!$menulist)
		{
			$menulist = array();
		}
		$ftmp = array('list','index','res');
		foreach($menulist AS $key=>$value)
		{
			//如果不存在子类，则清空该级栏目
			if(!$value["sublist"] || !is_array($value["sublist"]) || count($value["sublist"]) < 1)
			{
				unset($menulist[$key]);
				continue;
			}
			//定义sublist信息
			foreach($value["sublist"] AS $k=>$v)
			{
				if(!in_array($v['appfile'],$ftmp) && !$_SESSION['admin_rs']['if_system'] && $popedom_m[$v['id']])
				{
					if(!$popedom_m || !$popedom_m[$v['id']] || !is_array($popedom_m[$v['id']]) || count($popedom_m[$v["id"]])<1)
					{
						unset($value["sublist"][$k]);
						continue;
					}
					$tmp = array_intersect($popedom,$popedom_m[$v["id"]]);
					if(!$tmp)
					{
						unset($value["sublist"][$k]);
						continue;
					}
				}
				if($v["appfile"] == "list" && !$_SESSION["admin_rs"]["if_system"])
				{
					if(!$popedom_p || count($popedom_p)<1)
					{
						unset($value["sublist"][$k]);
						continue;
					}
					else
					{
						$tmp = array_intersect($popedom,$popedom_p);
						if(!$tmp)
						{
							unset($value["sublist"][$k]);
							continue;
						}
					}
				}
				$ext = "menu_id=".$v["id"];
				if($v["identifier"]) $ext .= "&identifier=".$v["identifier"];
				if($v['ext']) $ext .= "&".$v['ext'];
				$v['url'] = $this->url($v['appfile'],$v['func'],$ext);
				$value['sublist'][$k] = $v;
			}
			if(!$value["sublist"] || !is_array($value["sublist"]) || count($value["sublist"]) < 1)
			{
				unset($menulist[$key]);
				continue;
			}
			$menulist[$key] = $value;
		}
		$this->assign('menulist',$menulist);
		//星期
		$array = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
		$this->assign('weekend',$array[date('w',$this->time)]);
		//判断是否有全局
		$all_info = $this->all_info();
		if($all_info)
		{
			$this->assign('all_info',$all_info);
		}
		$list_setting = $this->list_setting();
		if($list_setting)
		{
			$this->assign('list_setting',$list_setting);
		}
		$this->view("index");
	}

	function all_setting_f()
	{
		$info = $this->all_info();
		if(!$info)
		{
			$this->json(false);
		}
		$this->json($info,true);
	}

	function all_info()
	{
		$all_popedom = appfile_popedom("all");
		if(!$all_popedom || !$all_popedom['list'])
		{
			return false;
		}
		$this->assign('all_popedom',$all_popedom);
		$rslist = $this->model('site')->all_list($_SESSION["admin_site_id"]);
		$this->assign("all_rslist",$rslist);
		$rs = $this->model('site')->get_one($_SESSION['admin_site_id']);
		$this->assign("all_rs",$rs);
		return $this->fetch('index_block_allsetting');
	}

	function list_setting_f()
	{
		$info = $this->list_setting();
		if(!$info)
		{
			$this->json(false);
		}
		$this->json($info,true);
	}

	function list_setting()
	{
		$site_id = $_SESSION["admin_site_id"];
		$rslist = $this->model('project')->get_all($site_id,0,"p.status=1 AND p.hidden=0");
		if(!$rslist) $rslist = array();
		//读取全部模型
		if(!$_SESSION["admin_rs"]["if_system"])
		{
			$this->model("popedom");
			$this->model("sysmenu");
			if(!$_SESSION["admin_popedom"])
			{
				return false;
			}
			$condition = "parent_id>0 AND appfile='list' AND func=''";
			$p_rs = $this->model('sysmenu')->get_one_condition($condition);
			if(!$p_rs)
			{
				return false;
			}
			$gid = $p_rs["id"];
			//取得全部项目权限信息
			$popedom_list = $this->model('popedom')->get_all("gid='".$gid."' AND pid>0",false,false);
			if(!$popedom_list)
			{
				return false;
			}
			$popedom = array();
			foreach($popedom_list AS $key=>$value)
			{
				if(in_array($value["id"],$_SESSION["admin_popedom"]))
				{
					$popedom[$value["pid"]][$value["identifier"]] = true;
				}
			}
			foreach($rslist AS $key=>$value)
			{
				if(!$popedom[$value["id"]] || !$popedom[$value["id"]]["list"])
				{
					unset($rslist[$key]);
					continue;
				}
			}
		}
		if(!$rslist || count($rslist)< 1)
		{
			return false;
		}
		$this->assign('list_rslist',$rslist);
		return $this->fetch('index_block_listsetting');
	}

	function clear_f()
	{
		//$this->lib('file')->rm($this->dir_root."data/cache/");
		$this->lib('file')->rm($this->dir_root."data/tpl_www/");
		$this->lib('file')->rm($this->dir_root."data/tpl_admin/");
		$this->lib('file')->rm($this->dir_root."data/tpl_html/");
		$this->db->cache_clear();
		json_exit("缓存清空完成",true);
	}

	function site_f()
	{
		$siteid = $this->get("id","int");
		if(!$siteid)
		{
			error("请选择要维护的站点！",$this->ur('index'));
		}
		$rs = $this->model("site")->get_one($siteid);
		if(!$rs)
		{
			error("站点信息不存在",$this->url("index"));
		}
		$_SESSION['admin_site_id'] = $siteid;
		error("您正在切换到网站：<span style='color:red;font-weight:bold;'>".$rs['title']."</span>，请稍候…",$this->url("index"),"ok");
	}

	//获取待处理信息
	function pendding_f()
	{
		$rslist = show_pending_info();
		if(!$rslist)
		{
			$this->json('暂无消息');
		}
		$this->json($rslist,true);
	}

	function project_f()
	{
		//
	}
}
?>