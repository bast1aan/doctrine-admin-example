<?php

namespace Bast1aan\DoctrineAdmin\Example\DoctrineAdmin {
	use Bast1aan\DoctrineAdmin\Entity;
	
	class UserEntity extends Entity {
		
		/**
		 * 
		 * @return \Bast1aan\DoctrineAdmin\Example\Entities\User
		 */
		public function getOriginalEntity() {
			return parent::getOriginalEntity();
		}
		
		public function __toString() {
			$e = $this->getOriginalEntity();
			return $e->getName() . ' (' . $e->getId() . ')';
		}
	}
}