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

use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;

class SessionMangerCustomConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    public function setUp()
    {
        // use ModuleManager to load this module and it's dependencies
        $config = include __DIR__ . '/../../../config/TestOverridesConfig.php';

        /*$serviceManager = new ServiceManager(new ServiceManagerConfig());
        $serviceManager->setService('ApplicationConfig', $config);
        $serviceManager->get('ModuleManager')->loadModules();
        $this->serviceManager = $serviceManager;*/
    }

    public function testCanSetSessionFromLocalOverRides()
    {
        /*$sessionManager = $this->serviceManager
            ->get('UthandoSessionManager\SessionManager');

        $this->assertInstanceOf('Zend\Session\SessionManager', $sessionManager);*/

    }
}
