<?php
namespace UthandoSessionManager;

use UthandoSessionManager\Event\RouteListener;
use Zend\Mvc\MvcEvent;

class Module
{   
    public function onBootstrap(MvcEvent $event)
    {
        $app            = $event->getApplication();
        $eventManager   = $app->getEventManager();
        
        $eventManager->attachAggregate(new RouteListener());
    }
    
    public function getConfig()
    {
        defined('APPLICATION_PATH') or define('APPLICATION_PATH', realpath(dirname('./')));
        
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/autoload_classmap.php'
            ],
        ];
    }
}
