<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @author      Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link        https://github.com/uthando-cms for the canonical source repository
 * @copyright   Copyright (c) 06/03/18 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license     see LICENSE
 */

namespace UthandoSessionManager\Controller;


use Zend\Console\Request;
use Zend\Mvc\Controller\AbstractActionController;

class SessionManagerConsole extends AbstractActionController
{
    public function gcAction()
    {
        $request = $this->getRequest();

        if (!$request instanceof Request) {
            throw new \RuntimeException('You can only use this action from a console!');
        }

        $sl = $this->getServiceLocator()->get('UthandoServiceManager');

        $sessionManagerService = $sl->get('UthandoSessionManagerSession');

        $result = $sessionManagerService->gc();

        return "No of rows deleted: " . $result . "\r\n";
    }
}
