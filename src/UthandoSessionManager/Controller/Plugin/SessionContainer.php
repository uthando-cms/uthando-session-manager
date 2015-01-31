<?php
namespace UthandoSessionManager\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use UthandoSessionManager\SessionContainerTrait;

class SessionContainer extends AbstractPlugin
{
    use SessionContainerTrait;
    
    /**
     * @param string $ns
     * @return \Zend\Session\Container
     */
    public function __invoke($ns = null)
    {
        if (is_string($ns)) {
            $this->setNs($ns);
        }
        
        return $this->getSessionContainer();
    }
}
