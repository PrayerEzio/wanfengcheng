<?php 
/**
 * 导航挂件
 * @copyright  Copyright (c) 2014-2015 muxiangdao-com Inc.(http://www.muxiangdao.com)
 * @license    http://www.muxiangdao.com
 * @link       http://www.muxiangdao.com
 * @author     muxiangdao-com Team Prayer (283386295@qq.com)
 */
namespace Home\Widget;
use Home\Controller\BaseController;
use Common\Lib\Cart\Cart;
class NavWidget extends BaseController{
	public function top()
	{
		$this->gc_id = intval($_GET['cate']);
		$this->goods_class = M('GoodsClass')->where(array('level'=>1))->order('gc_sort')->select();
		$this->display('Widget:Nav:top');
	}
	public function index(){
		$Cart = new Cart();
		$this->cart_price = $Cart->getPrice();
		$this->gc_list = M('GoodsClass')->where(array('gc_parent_id'=>0))->order('gc_sort desc')->select();
		$this->display('Widget:Nav:index');
	}

	public function credit()
	{
		$this->display('Widget:Nav:credit');
	}
}