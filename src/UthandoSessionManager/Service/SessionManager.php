<?php

namespace UthandoSessionManager\Service;

use UthandoCommon\Service\AbstractService;

class SessionManager extends AbstractService
{	
    protected $mapperClass = 'UthandoSessionManager\Mapper\Session';
    
    public function getById($id)
    {
        $id = (string) $id;
        return $this->getMapper()->getById($id);
    }
}
