<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Service\Factory
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoSessionManager\Service\Factory;

use UthandoSessionManager\Options\SessionOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container;
use Zend\Session\SessionManager;

/**
 * Class SessionManagerFactory
 *
 * @package UthandoSessionManager\Service\Factory
 */
class SessionManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        /** @var SessionOptions $sessionOptions */
        $sessionOptions         = $sm->get(SessionOptions::class);
        $sessionConfigOptions   = $sm->get(SessionConfigOptionsFactory::class);

        $class                  = $sessionOptions->getStorage();
        $sessionStorage         = new $class();

        $sessionSaveHandler = $sessionOptions->getSaveHandler();

        if (null !== $sessionSaveHandler) {
            // class should be fetched from service manager since it will require constructor arguments
            $sessionSaveHandler = $sm->get($sessionSaveHandler);
        }

        $sessionManager = new SessionManager(
            $sessionConfigOptions,
            $sessionStorage,
            $sessionSaveHandler
        );

        $chain = $sessionManager->getValidatorChain();

        foreach ($sessionOptions->getValidators() as $validator) {
            $validator = new $validator();
            $chain->attach('session.validate', [$validator, 'isValid']);
        }

        Container::setDefaultManager($sessionManager);

        return $sessionManager;
    }
}
