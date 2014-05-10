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
        return [
            'invokables' => [
                'UthandoSessionManager\Mapper\Session'				=> 'UthandoSessionManager\Mapper\Session',
                'UthandoSessionManager\Service\SessionManager'		=> 'UthandoSessionManager\Service\SessionManager',
            ],
            'factories' => [
                'UthandoSessionManager\SessionManager'				=> 'UthandoSessionManager\Service\Factory\SessionManagerFactory',
                'UthandoSessionManager\SessionSaveHandler'			=> 'UthandoSessionManager\Service\Factory\SessionSaveHandlerFactory',
            ],
        ];
    }
    
    public function getViewHelperConfig()
    {
        return [
            'invokables' => [
                'DecodeSession' => 'UthandoSessionManager\View\DecodeSession',
            ],
        ];
    }
    
    public function getControllerConfig()
    {
        return [
            'invokables' => [
                'UthandoSessionManager\Controller\SessionManager' => 'UthandoSessionManager\Controller\SessionManagerController',
            ],
        ];
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
