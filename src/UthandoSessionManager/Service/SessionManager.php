<?php

namespace UthandoSessionManager\Service;

use UthandoCommon\Service\AbstractMapperService;

class SessionManager extends AbstractMapperService
{	
    protected $mapperClass = 'UthandoSessionManager\Mapper\Session';
    
    public function getById($id)
    {
        $id = (string) $id;
        return $this->getMapper()->getById($id);
    }
}
