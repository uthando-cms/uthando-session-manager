<?php

namespace UthandoSessionManagerTest\Framework;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class TestCase extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    protected $overrides = false;

    protected function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../../config/TestConfig.php'
        );
        parent::setUp();
    }
}
