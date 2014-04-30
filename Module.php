<?php
namespace UthandoSessionManager;

use Exception;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;

class Module
{
    public function onBootstrap(MvcEvent $event)
    {
        $this->startSession($event);
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
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return include __DIR__ . '/config/service.config.php';
    }
    
    public function getViewHelperConfig()
    {
        return include __DIR__ . '/config/viewHelper.config.php';
    }
    
    public function getControllerConfig()
    {
        return include __DIR__ . '/config/controller.config.php';
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
