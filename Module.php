<?php
namespace UthandoSessionManager;

use Exception;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;

class Module
{   
    public function onBootstrap(MvcEvent $event)
    {
        $app            = $event->getApplication();
        $eventManager   = $app->getEventManager();
        
        $eventManager->attach(MvcEvent::EVENT_ROUTE, [$this, 'startSession'],10000);
    }
    
    public function startSession(MvcEvent $event)
    {
        try {
            $session = $event->getApplication()
                ->getServiceManager()
                ->get('UthandoSessionManager\SessionManager');

            $session->start();
             
            $container = new Container();
    
            if (!isset($container->init)) {
                $session->regenerateId(true);
                $container->init = 1;
            }
        } catch (Exception $e) {
            echo '<pre>';
            echo $e->getMessage();
            echo '</pre';
            exit();
        }
    }
    
    public function getConfig()
    {
        defined('APPLICATION_PATH') or define('APPLICATION_PATH', realpath(dirname('./')));
        
        return include __DIR__ . '/config/config.php';
    }

    public function getControllerConfig()
    {
        return include __DIR__ . '/config/controller.config.php';
    }

    public function getHydratorConfig()
    {
        return include __DIR__ . '/config/hydrator.config.php';
    }
    
    public function getServiceConfig()
    {
        return include __DIR__ . '/config/service.config.php';
    }
    
    public function getViewHelperConfig()
    {
        return include __DIR__ . '/config/viewHelper.config.php';
    }

    public function getUthandoMapperConfig()
    {
        return include __DIR__ . '/config/mapper.config.php';
    }

    public function getUthandoModelConfig()
    {
        return include __DIR__ . '/config/model.config.php';
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
