<?php

namespace Bast1aan\DoctrineAdmin\Example\DoctrineAdmin {
	use Bast1aan\DoctrineAdmin\Example\Entities\User;
	use Bast1aan\DoctrineAdmin\Example\Entities\Product;
	use Bast1aan\DoctrineAdmin\Example\Entities\Bug;
	use Bast1aan\DoctrineAdmin\Entity as DoctrineAdminEntity;
	use Bast1aan\DoctrineAdmin\View\View as DoctrineAdminView;

	class View extends DoctrineAdminView {
		public function renderEntity(DoctrineAdminEntity $entity = null) {
			if ($entity == null) {
				$entity = $this->getEntity();
			}
			
			$entityObj = $entity->getOriginalEntity();
			if ($entityObj instanceof Bug) {
				return $entityObj->getDescription() . ' (' . $entityObj->getId() . ')';
			} elseif ($entityObj instanceof Product ||
				$entityObj instanceof User ) {
				return $entityObj->getName() . ' (' . $entityObj->getId() . ')';
			}
		}
	}
}