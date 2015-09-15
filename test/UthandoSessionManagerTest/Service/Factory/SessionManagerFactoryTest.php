<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManagerTest\Service\Factory
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManagerTest\Service\Factory;

use UthandoSessionManagerTest\Framework\TestCase;

class SessionManagerFactoryTest extends TestCase
{
    public function testCanGetSessionManagerFromService()
    {
        $sessionManager = $this->serviceManager
            ->get('UthandoSessionManager\SessionManager');

        $this->assertInstanceOf('Zend\Session\SessionManager', $sessionManager);
    }
}