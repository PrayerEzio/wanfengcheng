<?php
/**
 * 首页
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Home\Controller;
use Home\Controller\BaseController;
class IndexController extends BaseController{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$banner_where['ap_code'] = 'banner';
		$banner_where['is_use'] = 1;
		$this->banner = M('AdvPosition')->where($banner_where)->order('ap_sort')->select();
		$this->links = M('Links')->where(array('status'=>1))->order('sort')->select();
		$this->display();
	}
}