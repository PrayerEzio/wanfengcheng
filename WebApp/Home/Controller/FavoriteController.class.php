<?php
/**
 * 收藏中心
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

class FavoriteController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->model = M('Collect');
    }

    public function index()
    {
        $list_where['member_id'] = $this->mid;
        $list_where['type'] = 'goods';
        $list_count = $this->model->where($list_where)->count();
        $page = new Page($list_count,8);
        $list = $this->model->where($list_where)->order('create_time desc')->limit("{$page->firstRow},{$page->listRows}")->select();
        foreach ($list as $key => $item)
        {
            $goods = M('Goods')->where(array('goods_id'=>$item['cid']))->field('goods_price,goods_status')->find();
            $list[$key]['price'] = $goods['goods_price'];
            $list[$key]['status'] = $goods['goods_status'];
        }
        $this->list = $list;
        $this->page = $page->show();
        $this->display();
    }

    public function shop()
    {
        $this->display();
    }

}