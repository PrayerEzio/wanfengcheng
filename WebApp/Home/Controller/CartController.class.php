<?php
/**
 * 购物车
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Home\Controller;
use Home\Controller\BaseController;
use Common\Lib\Cart\Cart;
class CartController extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->model = D('Goods');
		$this->Cart = new Cart();
	}
	/**
	 * 购物车
	 */
	public function index(){
		if (IS_POST) {
			;
		}elseif (IS_GET) {
			$list = $this->Cart->getList();
			$this->list = $list;
			$this->amount = $this->Cart->getPrice();
			$this->display();
		}
	}
	/**
	 * 加入购物车
	 */
	public function addCart(){
		if (IS_AJAX) {
			$goods_id = intval($_POST['goods_id']);
			$spec_id = intval($_POST['spec_id']);
			$goods_where['goods_id'] = $goods_id;
			$goods_where['goods_status'] = 1;
			$num = intval($_POST['num']);
			if ($num) {
				$goods = $this->model->where($goods_where)->find();
				$spec_where['spec_id'] = $spec_id;
				$spec_where['goods_id'] = $goods_id;
				$goods['GoodsSpec'] = M('GoodsSpec')->where($spec_where)->find();
				if ($goods['goods_storage'] >= $num) {
					$this->Cart = new Cart();
					$this->Cart->addItem($goods['goods_id'], $goods['goods_name'].' ['.$goods['GoodsSpec']['spec_name'].']', $goods['goods_price'], $num, $goods['goods_pic'],$spec_id);
				}
			}
		}
	}
	/**
	 * 删除购物车
	 */
	public function removeCart(){
		if (IS_AJAX) {
			$goods_id = intval($_POST['goods_id']);
			$spec_id = intval($_POST['spec_id']);
			$this->Cart->delItem($goods_id,$spec_id);
		}
	}
}