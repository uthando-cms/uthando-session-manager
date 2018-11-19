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

use UthandoSessionManager\Model\SessionModel;
use UthandoSessionManagerTest\Framework\TestCase;

class SessionManagerTest extends TestCase
{
    public function testGetById()
    {

        $model = new SessionModel();
        $model->setId('2b73fftuqqa84lha6jt4pcl097')
            ->setName('uthando-cms')
            ->setModified('1398807915')
            ->setLifetime(1440)
            ->setData('');

        $mapperMock = $this->getMockBuilder('UthandoSessionManager\Mapper\SessionMapper')
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
            ->with('UthandoSessionManagerSession')
            ->will($this->returnValue($mapperMock));

        $this->serviceManager->setAllowOverride(true);
        $this->serviceManager->setService('UthandoMapperManager', $mapperManagerMock);

        $service = $this->serviceManager->get('UthandoServiceManager')
            ->get('UthandoSessionManagerSession');

        $this->assertSame($model, $service->getById('2b73fftuqqa84lha6jt4pcl097'));
    }
}
