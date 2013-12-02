<?php

namespace Bast1aan\DoctrineAdmin\Example\DoctrineAdminEntities {
	use Bast1aan\DoctrineAdmin\Entity;
	
	class Bug extends Entity {
		
		/**
		 * 
		 * @return \Bast1aan\DoctrineAdmin\Example\Entities\Bug
		 */
		public function getOriginalEntity() {
			return parent::getOriginalEntity();
		}
		
		public function __toString() {
			$e = $this->getOriginalEntity();
			return $e->getDescription() . ' (' . $e->getId() . ')';
		}
	}
}