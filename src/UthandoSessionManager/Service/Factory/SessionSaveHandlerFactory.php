<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Service\Factory
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoSessionManager\Service\Factory;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Session\SaveHandler\DbTableGatewayOptions;
use Zend\Session\SaveHandler\DbTableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SessionSaveHandlerFactory
 *
 * @package UthandoSessionManager\Service\Factory
 */
class SessionSaveHandlerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        // grab the config array
        $config = $sm->get('config');

        $dbAdapter = new Adapter($config['db']);

        // get the session options (column names)
        $sessionOptions = new DbTableGatewayOptions();

        // crate the TableGateway object specifying the table name
        $sessionTableGateway = new TableGateway('session', $dbAdapter);
        // create your saveHandler object
        $saveHandler = new DbTableGateway($sessionTableGateway, $sessionOptions);

        return $saveHandler;
    }
}
