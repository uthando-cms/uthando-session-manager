<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManagerTest\Event
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManagerTest\Event;

use UthandoSessionManager\Event\RouteListener;
use UthandoSessionManagerTest\Framework\ApplicationTestCase;
use Zend\Http\Request;
use Zend\Mvc\MvcEvent;

class RouteListenerTest extends ApplicationTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->setApplicationConfig(
            include __DIR__ . '/../../config/TestRouteListenerConfig.php'
        );
    }

    public function testCanAttachListeners()
    {
        $app = $this->getApplication();
        $eventManager = $app->getEventManager();

        $eventManager->attach(new RouteListener());

        $listenerSet = false;

        foreach ($eventManager->getListeners('route') as $key => $listener) {
            if ($listener->getCallBack()[0] instanceof RouteListener) {
                $listenerSet = true;
            }
        }

        $this->assertTrue($listenerSet);
    }

    public function testSessionNotStartedIfNotHttpRequest()
    {
        $event = new MvcEvent();
        $event->setApplication($this->getApplication());

        $sessionListener = new RouteListener();
        $sessionListener->startSession($event);

        $this->assertFalse(isset($_SESSION));
    }

    public function testCanStartSession()
    {
        $event = new MvcEvent();
        $event->setApplication($this->getApplication());
        $event->setRequest(new Request());

        $sessionListener = new RouteListener();
        $sessionListener->startSession($event);

        $this->assertArrayHasKey('__ZF', $_SESSION);
    }
}