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
        $this->model = M('Favorite');
    }

    public function index()
    {
        $this->display();
    }

    public function shop()
    {
        $this->display();
    }

}