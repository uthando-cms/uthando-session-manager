<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManager;

use Zend\Session\Container;

/**
 * Class SessionContainerTrait
 *
 * @package UthandoSessionManager
 */
trait SessionContainerTrait
{
    /**
     * @var Container
     */
    protected $sessionContainer;
    
    /**
     * @var string
     */
    protected $ns = __CLASS__;
    
    /**
     * @param Container $ns
     */
    public function setSessionContainer(Container $ns)
    {
        $this->sessionContainer = $ns;
    }
    
    /**
     * @return Container
     */
    public function getSessionContainer()
    {
        if (!$this->sessionContainer instanceof Container) {
            $this->setSessionContainer(new Container($this->getNs()));
        }
    
        return $this->sessionContainer;
    }
    
    /**
     * @return the $ns
     */
    public function getNs()
    {
        return $this->ns;
    }

    /**
     * @param $ns
     * @return $this
     */
    public function setNs($ns)
    {
        $this->ns = $ns;
        return $this;
    }

}
