<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManagerTest\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManagerTest\Service;

use UthandoSessionManager\Model\Session;
use UthandoSessionManagerTest\Bootstrap;
use UthandoSessionManagerTest\Framework\TestCase;

class SessionManagerTest extends TestCase
{
    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    protected $traceError = true;

    public function setUp()
    {
        $this->serviceManager = Bootstrap::getServiceManager();
    }

    public function testGetById()
    {
        $model = new Session();
        $model->setId('2b73fftuqqa84lha6jt4pcl097')
            ->setName('uthando-cms')
            ->setModified('1398807915')
            ->setLifetime(1440)
            ->setData('');

        $mapperMock = $this->getMockBuilder('UthandoSessionManager\Mapper\Session')
            ->disableOriginalConstructor()
            ->getMock();
        $mapperManagerMock = $this->getMockBuilder('UthandoCommon\Mapper\MapperManager')
            ->disableOriginalConstructor()
            ->getMock();

        $mapperMock->expects($this->once())
            ->method('getById')
            ->with('2b73fftuqqa84lha6jt4pcl097')
            ->will($this->returnValue($model));

        $mapperManagerMock->expects($this->once())
            ->method('get')
            ->with('UthandoSessionManager')
            ->will($this->returnValue($mapperMock));

        $this->serviceManager->setAllowOverride(true);
        $this->serviceManager->setService('UthandoMapperManager', $mapperManagerMock);

        $service = $this->serviceManager->get('UthandoServiceManager')
            ->get('UthandoSessionManager');

        $this->assertSame($model, $service->getById('2b73fftuqqa84lha6jt4pcl097'));
    }
}