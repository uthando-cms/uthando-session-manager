<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManagerTest\Service\Factory
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManagerTest\Service\Factory;

use UthandoSessionManagerTest\Bootstrap;

class SessionManagerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    public function setUp()
    {
        $this->serviceManager = Bootstrap::getServiceManager();
    }

    public function testCanGetSessionManagerFromService()
    {
        /*$sessionManager = $this->serviceManager
            ->get('UthandoSessionManager\SessionManager');

        $this->assertInstanceOf('Zend\Session\SessionManager', $sessionManager);*/
    }
}
