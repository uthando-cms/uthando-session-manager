<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Session\SaveHandler
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2016 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoSessionManager\Session\SaveHandler;


use Zend\Session\SaveHandler\DbTableGateway as ZendDbTableGateway;

/**
 * Class DbTableGateway
 *
 * @package UthandoSessionManager\Session\SaveHandler
 */
class DbTableGateway extends ZendDbTableGateway
{
    /**
     * Garbage Collection
     * Only delete sessions that have expired.
     *
     * @param int $maxlifetime
     * @return true
     */
    public function gc($maxlifetime)
    {
        $platform = $this->tableGateway->getAdapter()->getPlatform();
        return (bool) $this->tableGateway->delete(
            sprintf(
                '%s < %d',
                $platform->quoteIdentifier($this->options->getModifiedColumn()),
                (time() - $platform->quoteIdentifier($this->options->getLifetimeColumn()))
            )
        );
    }
}
