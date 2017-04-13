<?php
/**
 * 文章
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Home\Controller;
use Home\Controller\BaseController;
use Common\Lib\Cart\Cart;
class ArticleController extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->model = M('SystemArticle');
		$ac_type_list = $this->model->where(array('article_show'=>1))->field('ac_type')->select();
		$ac_type_array = array();
		foreach ($ac_type_list as $key => $item)
		{
			$ac_type_array[] = $item['ac_type'];
		}
		if (in_array(strtolower(ACTION_NAME),$ac_type_array))
		{
			$info_where['ac_type'] = strtolower(ACTION_NAME);
			$info_where['article_show'] = 1;
			$info = $this->model->where($info_where)->find();
			if (empty($info))
			{
				$this->error('404,Page not found');
			}
			$this->info = $info;
			$this->display('document');
			die;
		}
	}
	public function detail(){
		$id = intval($_GET['id']);
		$this->info = $this->model->where(array('article_id'=>$id,'article_show'=>1))->find();
		$this->display();
	}
	public function document(){
		$id = intval($_GET['id']);
		$info = M('Document')->where(array('doc_id'=>$id))->find();
		$this->info = $info;
		$this->display('detail');
	}
}