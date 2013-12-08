<?php

namespace Bast1aan\DoctrineAdmin\Example\DoctrineAdminEntities {
	use Bast1aan\DoctrineAdmin\Entity;
	
	class Product extends Entity {
		
		/**
		 * 
		 * @return \Bast1aan\DoctrineAdmin\Example\Entities\Product
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