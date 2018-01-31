<?php
/***********************************************************
	Filename: {phpok}/phpok_call.php
	Note	: PHPOK����������
	Version : 4.0
	Web		: www.phpok.com
	Author  : qinggan <qinggan@188.com>
	Update  : 2013-04-20 17:42
***********************************************************/
if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");}
class phpok_call extends phpok_control
{
	private $mlist;
	public function __construct()
	{
		parent::control();
		$this->mlist = get_class_methods($this);
	}

	//ִ�����ݵ���
	public function phpok($id,$rs="")
	{
		if(!$id)
		{
			return false;
		}
		if($rs && is_string($rs))
		{
			parse_str($rs,$rs);
		}
		//�ж������ò������ǵ����������ĵ�����
		if(substr($id,0,1) != '_')
		{
			$call_rs = $GLOBALS['app']->model('call')->one($id,$this->site['id']);
			if(!$call_rs)
			{
				return false;
			}
			if($rs && is_array($rs))
			{
				$call_rs = array_merge($call_rs,$rs);
			}
		}
		else
		{
			if(!$rs || !is_array($rs)) return false;
			//δָ��վ��IDʱ��ֱ��վ��id
			if(!$rs['site_id'])
			{
				$rs['site_id'] = $this->site['id'];
			}
			$list = array('arclist','arc','cate','catelist','project','sublist','parent','plist');
			$list[] = 'fields';
			$list[] = 'user';
			$list[] = 'userlist';
			$list[] = 'total';
			$list[] = 'cate_id';
			$list[] = 'subcate';
			$id = substr($id,1);
			//�����arclist����δ����is_list���ԣ���Ĭ�����ô�����
			if($id == "arclist")
			{
				$rs["is_list"] = $rs["is_list"] == 'false' ? 0 : 1;
			}
			if(!$id || !in_array($id,$list))
			{
				return false;
			}
			$call_rs = array_merge($rs,array('type_id'=>$id));
		}
		$func = '_'.$call_rs['type_id'];
		if(!in_array($func,$this->mlist))
		{
			return false;
		}
		return $this->$func($call_rs);
	}

	//��ȡ�����б�
	function _arclist($rs)
	{
		return $GLOBALS['app']->model('data')->arclist($rs);
	}

	function _total($rs)
	{
		return $GLOBALS['app']->model('data')->total($rs);
	}

	//��ȡ��ƪ����
	function _arc($rs)
	{
		return $GLOBALS['app']->model('data')->arc($rs);
	}

	//ȡ����Ŀ��Ϣ
	function _project($rs)
	{
		return $GLOBALS['app']->model('data')->project($rs);
	}

	//��ȡ������
	function _catelist($rs)
	{
		return $GLOBALS['app']->model('data')->catelist($rs);
	}

	//��ȡ��ǰ������Ϣ
	function _cate($rs)
	{
		return $GLOBALS['app']->model('data')->cate($rs);
	}

	function _cate_id($rs)
	{
		return $GLOBALS['app']->model('data')->cate_id($rs);
	}

	//ȡ����Ŀ��չ�ֶ�
	function _fields($rs)
	{
		return $GLOBALS['app']->model('data')->fields($rs);
	}

	//ȡ����һ����Ŀ
	function _parent($rs)
	{
		return $GLOBALS['app']->model('data')->_project_parent($rs);
	}

	//��ȡ��ǰ��Ŀ�µ�����Ŀ��֧�ֶ༶
	function _sublist($rs)
	{
		return $GLOBALS['app']->model('data')->sublist($rs);
	}

	//��ȡ��ǰ�����µ��ӷ���
	function _subcate($rs)
	{
		return $GLOBALS['app']->model('data')->subcate($rs);
	}
}
?>