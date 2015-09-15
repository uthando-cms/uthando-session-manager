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

        $eventManager->attachAggregate(new RouteListener());

        $listenerSet = false;

        foreach ($eventManager->getListeners('route') as $key => $listener) {
            if ($listener->getCallBack()[0] instanceof RouteListener) {
                $listenerSet = true;
            }
        }

        $this->assertTrue($listenerSet);
    }

    public function testCanStartSession()
    {
        $event = new MvcEvent();
        $event->setApplication($this->getApplication());

        $sessionListener = new RouteListener();
        $sessionListener->startSession($event);

        $this->assertArrayHasKey('__ZF', $_SESSION);
    }

    public function testSessionStartsOnRoute()
    {
        session_destroy();
        $this->dispatch('/');
        $this->assertArrayHasKey('__ZF', $_SESSION);
        $this->assertMatchedRouteName('home');
    }
}