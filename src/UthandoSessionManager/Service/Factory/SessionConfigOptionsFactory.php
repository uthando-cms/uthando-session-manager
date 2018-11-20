<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Service\Factory
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2018 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

declare(strict_types=1);


namespace UthandoSessionManager\Service\Factory;


use UthandoSessionManager\Options\SessionOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SessionConfigOptionsFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config             = $serviceLocator->get('config');
        $sessionOptions     = $serviceLocator->get(SessionOptions::class);
        $sessionConfig      = $config['uthando_session_manager']['config_options'] ?? [];
        /** @var SessionConfig $sessionConfigClass */
        $sessionConfigClass = $sessionOptions->getSessionConfigClass();
        $sessionConfigClass = new $sessionConfigClass() ;

        $sessionConfigClass->setOptions($sessionConfig);

        return $sessionConfigClass;
    }
}
