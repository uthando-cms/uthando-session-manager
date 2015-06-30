<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Controller\Plugin
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */
namespace UthandoSessionManager\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use UthandoSessionManager\SessionContainerTrait;

/**
 * Class SessionContainer
 *
 * @package UthandoSessionManager\Controller\Plugin
 */
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
