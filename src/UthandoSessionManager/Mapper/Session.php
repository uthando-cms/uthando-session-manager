<?php
namespace UthandoSessionManager\Mapper;

use UthandoCommon\Mapper\AbstractDbMapper;

class Session extends AbstractDbMapper
{
	protected $table = 'session';
	protected $primary = 'id';
}
