<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Event
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoSessionManager\Event;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Http\Request;
use Zend\Mvc\MvcEvent;

/**
 * Class RouteListener
 *
 * @package UthandoSessionManager\Event
 */
class RouteListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    /**
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_ROUTE,
            [$this, 'startSession'],
            100000
        );
    }

    /**
     * @param MvcEvent $mvcEvent
     */
    public function startSession(MvcEvent $mvcEvent)
    {
        if (!$mvcEvent->getRequest() instanceof Request) {
            return;
        }

        /* @var \Zend\Session\SessionManager $session */
        $session = $mvcEvent->getApplication()
            ->getServiceManager()
            ->get('UthandoSessionManager\SessionManager');

        if (!$session->sessionExists()) {
            $session->start();
        }
    }
}