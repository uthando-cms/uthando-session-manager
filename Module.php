<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoSessionManager;

use UthandoCommon\Config\ConfigInterface;
use UthandoCommon\Config\ConfigTrait;
use UthandoSessionManager\Event\RouteListener;
use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 *
 * @package UthandoSessionManager
 */
class Module implements ConfigInterface
{
    use ConfigTrait;

    /**
     * @param MvcEvent $event
     */
    public function onBootstrap(MvcEvent $event): void
    {
        $app            = $event->getApplication();
        $eventManager   = $app->getEventManager();
        $session        = new RouteListener();
        $session->attach($eventManager);
    }

    public function getConfig(): array
    {
        defined('APPLICATION_PATH') or define('APPLICATION_PATH', realpath(dirname('./')));

        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @param Console $console
     * @return array
     */
    public function getConsoleUsage(Console $console)
    {
        return [
            'session gc' => 'initiate garbage collection on sessions in database.',
        ];
    }

    public function getAutoloaderConfig(): array
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/autoload_classmap.php'
            ],
        ];
    }
}
