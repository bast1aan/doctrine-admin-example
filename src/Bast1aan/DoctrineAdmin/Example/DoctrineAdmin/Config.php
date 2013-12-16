<?php

namespace Bast1aan\DoctrineAdmin\Example\DoctrineAdmin {
	
	use Bast1aan\DoctrineAdmin\Config as DoctrineAdminConfig;
	use Bast1aan\DoctrineAdmin\Example\Entities;
	use Bast1aan\DoctrineAdmin\Example\DoctrineAdmin;
	
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
				return new DoctrineAdmin\BugEntity($entity);
			} elseif ($entity instanceof Entities\User) {
				return new DoctrineAdmin\UserEntity($entity);			
			} elseif ($entity instanceof Entities\Product) {
				return new DoctrineAdmin\ProductEntity($entity);
			}
		}
	}
}