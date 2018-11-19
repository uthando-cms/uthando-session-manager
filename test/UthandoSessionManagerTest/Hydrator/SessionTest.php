<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManagerTest\Hydrator
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManagerTest\Hydrator;

use UthandoSessionManager\Hydrator\SessionHydrator as SessionHydrator;
use UthandoSessionManager\Model\SessionModel as SessionModel;

class SessionTest extends \PHPUnit_Framework_TestCase
{
    public function testExtract()
    {
        $array = [
            'id'		=> '2b73fftuqqa84lha6jt4pcl097',
            'name'		=> 'uthando-cms',
            'modified'	=> 1398807915,
            'lifetime'	=> 1440,
            'data'		=> ''
        ];
        $hydrator = new SessionHydrator();

        $model = $hydrator->hydrate($array, new SessionModel());
        $this->assertSame($array, $hydrator->extract($model));
    }
}
