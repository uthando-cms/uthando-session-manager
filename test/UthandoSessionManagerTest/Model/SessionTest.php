<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManagerTest\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManagerTest\Model;

use UthandoSessionManager\Model\Session as SessionModel;
use UthandoSessionManagerTest\Framework\TestCase;

class SessionTest extends TestCase
{
    /**
     * @var SessionModel
     */
    protected $model;

    public function setUp()
    {
        parent::setUp();
        $this->model = new SessionModel();
    }

    public function testSetGetId()
    {
        $this->model->setId('2b73fftuqqa84lha6jt4pcl097');
        $this->assertSame('2b73fftuqqa84lha6jt4pcl097', $this->model->getId());
    }

    public function testSetGetName()
    {
        $this->model->setName('uthando-cms');
        $this->assertSame('uthando-cms', $this->model->getName());
    }

    public function testSetGetModified()
    {
        $this->model->setModified('1398807915');
        $this->assertSame(1398807915, $this->model->getModified());
    }

    public function testSetGetLifetime()
    {
        $this->model->setLifetime('1440');
        $this->assertSame(1440, $this->model->getLifetime());
    }

    public function testSetGetData()
    {
        $this->model->setData('some data');
        $this->assertSame('some data', $this->model->getData());
    }
}
