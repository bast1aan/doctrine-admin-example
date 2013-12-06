<?php

namespace Bast1aan\DoctrineAdmin\Example {
	
	use Bast1aan\DoctrineAdmin\Config as DoctrineAdminConfig;
	use Bast1aan\DoctrineAdmin\Example\Entities;
	use Bast1aan\DoctrineAdmin\Example\DoctrineAdminEntities;
	
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
			if ($entity instanceof Entities\Bug) {
				return new DoctrineAdminEntities\Bug($entity);
			} elseif ($entity instanceof Entities\User) {
				return new DoctrineAdminEntities\User($entity);			
			} elseif ($entity instanceof Entities\Product) {
				return new DoctrineAdminEntities\Product($entity);
			}
		}
	}
}