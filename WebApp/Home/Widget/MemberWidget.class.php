<?php 
/**
 * 菜单挂件
 * @copyright  Copyright (c) 2014-2015 muxiangdao-com Inc.(http://www.muxiangdao.com)
 * @license    http://www.muxiangdao.com
 * @link       http://www.muxiangdao.com
 * @author     muxiangdao-com Team Prayer (283386295@qq.com)
 */
namespace Home\Widget;
use Home\Controller\BaseController;
class MemberWidget extends BaseController{
	public function menu(){
		$this->display('Widget:Member:menu');
	}
}