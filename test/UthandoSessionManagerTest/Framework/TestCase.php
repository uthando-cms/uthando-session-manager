<?php

namespace UthandoSessionManagerTest\Framework;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ControllerTestCase extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    protected function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../../TestConfig.php'
        );
        parent::setUp();
    }
}
