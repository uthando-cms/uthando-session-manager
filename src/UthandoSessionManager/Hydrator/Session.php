<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Hydrator
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoSessionManager\Hydrator;

use UthandoCommon\Hydrator\AbstractHydrator;

/**
 * Class Session
 *
 * @package UthandoSessionManager\Hydrator
 */
class Session extends AbstractHydrator
{
    /**
     * @param \UthandoSessionManager\Model\Session $object
     * @return array
     */
	public function extract($object)
	{
		return [
			'id'		=> $object->getId(),
            'name'		=> $object->getName(),
			'modified'	=> $object->getModified(),
			'lifetime'	=> $object->getLifetime(),
			'data'		=> $object->getData()
		];
	}
}
