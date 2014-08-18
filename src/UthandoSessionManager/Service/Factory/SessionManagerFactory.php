<?php
namespace UthandoSessionManager\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\SessionManager;
use Zend\Session\Container;


class SessionManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $config = $sm->get('config');
        
        if (isset($config['uthando_session_manager'])) {
        	$session = $config['uthando_session_manager'];
        
        	$sessionConfig = null;
        	if (isset($session['config'])) {
        		$class = isset($session['config']['class'])  ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
        		$options = isset($session['config']['options']) ? $session['config']['options'] : [];
        		$sessionConfig = new $class();
        		$sessionConfig->setOptions($options);
        	}
        
        	$sessionStorage = null;
        	if (isset($session['storage'])) {
        		$class = $session['storage'];
        		$sessionStorage = new $class();
        	}
        
        	$sessionSaveHandler = null;
        	if (isset($session['save_handler'])) {
        		// class should be fetched from service manager since it will require constructor arguments
        		$sessionSaveHandler = $sm->get($session['save_handler']);
        	}
        
        	$sessionManager = new SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);
        
        	if (isset($session['validators'])) {
        		$chain = $sessionManager->getValidatorChain();
        		foreach ($session['validators'] as $validator) {
        			
        			$validator = new $validator();
        			$chain->attach('session.validate', [$validator, 'isValid']);
        		}
        	}
        } else {
        	$sessionManager = new SessionManager();
        }
        
        Container::setDefaultManager($sessionManager);
        
        return $sessionManager;
    }
}
