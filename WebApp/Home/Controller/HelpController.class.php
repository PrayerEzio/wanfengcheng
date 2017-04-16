<?php
/**
 * 帮助
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Home\Controller;
use Home\Controller\BaseController;
use Common\Lib\Cart\Cart;
class HelpController extends BaseController{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->display();
	}
}