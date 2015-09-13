<?php

namespace UthandoSessionManager\Service;

use UthandoCommon\Service\AbstractMapperService;

class SessionManager extends AbstractMapperService
{	
    protected $serviceAlias = 'UthandoSessionManager';
    
    public function getById($id, $col = null)
    {
        $id = (string) $id;
        return $this->getMapper()->getById($id);
    }
}
