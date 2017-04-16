<?php
/**
 * 消息中心
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Home\Controller;
use Home\Controller\BaseController;
use Think\Page;
use Muxiangdao\DesUtils;
use Common\Lib\Jdpay\Jdpay;
class MessageController extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->check_login();
		$this->model = M('Notice');
	}

	public function index(){
		$this->display();
	}

	public function detail()
	{
		$id = I('id',0,'int');
		$info_where['id'] = $id;
		$info_where['member_id'] = array('in',array(0,$this->mid));
		$info = $this->model->where($info_where)->find();
		$this->info = $info;
		$this->display();
	}
}