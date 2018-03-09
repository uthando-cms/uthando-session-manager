<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Mapper
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoSessionManager\Mapper;

use UthandoCommon\Mapper\AbstractDbMapper;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Where;


/**
 * Class Session
 *
 * @package UthandoSessionManager\Mapper
 */
class Session extends AbstractDbMapper
{
    protected $table = 'session';
    protected $primary = 'id';

    public function gc()
    {
        $adapterPlatform = $this->getAdapter()->getPlatform();
        $expression = new Expression(
            time() . ' - ' . $adapterPlatform->quoteIdentifier('lifetime')
        );
        $where = new Where();
        $where->lessThan('modified', $expression);


        return $this->delete($where);
    }
}
