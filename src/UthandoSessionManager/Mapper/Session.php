<?php
namespace UthandoSessionManager\Mapper;

use UthandoCommon\Mapper\AbstractMapper;

class Session extends AbstractMapper
{
	protected $table = 'session';
	protected $primary = 'id';
	protected $model = 'UthandoSessionManager\Model\Session';
	protected $hydrator = 'UthandoSessionManager\Hydrator\Session';
	
}
