<?php

namespace Bast1aan\DoctrineAdmin\Example\DoctrineAdmin {
	
	use Bast1aan\DoctrineAdmin\Config as DoctrineAdminConfig;
	
	/**
	 * Config class that maps our native entities to DoctrineAdmin entities
	 */
	class Config implements DoctrineAdminConfig {
		/**
		 * 
		 * @param object $entity
		 * @return \Bast1aan\DoctrineAdmin\Entity
		 */
		public function getDoctrineAdminEntityByNativeEntity($entity) {
			return new Entity($entity);
		}
	}
}