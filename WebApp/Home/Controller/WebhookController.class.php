<?php
/**
 * webhook
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Home\Controller;
use Home\Controller\BaseController;
class WebhookController extends BaseController
{
	public function __construct(){
		parent::__construct();
	}

	public function github()
	{
		if (IS_POST) {
			system_log('Github webhook.', 'post请求已被接受,start git cmd.', 0, 'github');
			$cmd = 'cd '.BasePath.';sudo git checkout dev;sudo git pull origin dev:dev;';
			$output = shell_exec($cmd);
			system_log('Github webhook.', $output, 0, 'github');
		}
	}
}