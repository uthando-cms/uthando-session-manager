<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManagerTest\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManagerTest\Controller;

use UthandoSessionManagerTest\Framework\ApplicationTestCase;

class SessionManagerControllerTest extends ApplicationTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->setApplicationConfig(
            include __DIR__ . '/../../config/TestRouteListenerConfig.php'
        );
    }

    public function testIndexAction()
    {

    }
}