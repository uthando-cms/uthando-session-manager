<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoSessionManager\Service;

use UthandoCommon\Service\AbstractMapperService;

/**
 * Class SessionManager
 *
 * @package UthandoSessionManager\Service
 */
class SessionManager extends AbstractMapperService
{
    protected $serviceAlias = 'UthandoSessionManagerSession';

    /**
     * @var bool
     */
    protected $useCache = false;

    public function getById($id, $col = null)
    {
        $id = (string) $id;
        return $this->getMapper()->getById($id);
    }
}
