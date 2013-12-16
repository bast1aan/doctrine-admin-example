<?php

namespace Bast1aan\DoctrineAdmin\Example\DoctrineAdmin {
	
	use Bast1aan\DoctrineAdmin\Entity as DoctrineAdminEntity;
	
	class Entity extends DoctrineAdminEntity {
		
		public function getView() {
			return new View($this);
		}
	}
}