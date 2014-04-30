<?php
namespace UthandoSessionManager\Hydrator;

use UthandoCommon\Hydrator\AbstractHydrator;

class Session extends AbstractHydrator
{
	/**
	 * @param \UthandoSessionManager\Model\Session
	 * @return array
	 */
	public function extract($object)
	{
		return [
			'id'		=> $object->getId(),
			'modified'	=> $object->getModified(),
			'lifetime'	=> $object->getLifetime(),
			'name'		=> $object->getName(),
			'data'		=> $object->getData()
		];
	}
}
