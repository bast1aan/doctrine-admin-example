<?php

namespace Bast1aan\DoctrineAdmin\Example\DoctrineAdmin;

use \Bast1aan\DoctrineAdmin\DoctrineAdmin;

class MyDoctrineAdmin extends DoctrineAdmin {

	/**
	 * @var View
	 */
	private $view;

	/**
	 * Provide our own customized view
	 *
	 * @return View
	 */
	public function getView() {
		if ($this->view == null) {
			$this->view = new View($this);
		}
		return $this->view;
	}
} 