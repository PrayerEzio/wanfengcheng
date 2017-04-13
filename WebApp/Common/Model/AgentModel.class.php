<?php
/**
 * 代理商模型
 * @copyright  Copyright (c) 2014-2015 muxiangdao-cn Inc.(http://www.muxiangdao.cn)
 * @license    http://www.muxiangdao.cn
 * @link       http://www.muxiangdao.cn
 * @author     muxiangdao-cn Team Prayer (283386295@qq.com)
 */
namespace Common\Model;
use Think\Model\RelationModel;
class AgentModel extends RelationModel{
	protected $_link = array(
		'Member' => array(
				'mapping_type' => self::BELONGS_TO,
				'class_name' => 'Member',
				'mapping_name' => 'Member',
				'foreign_key' => 'member_id',
		),
		'AgentInfo' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name' => 'AgentInfo',
			'mapping_name' => 'AgentInfo',
			'foreign_key' => 'agent_id',
		),
	);
}