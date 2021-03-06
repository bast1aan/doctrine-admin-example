<?php

namespace Bast1aan\DoctrineAdmin\Example\Entities {
	
	/**
	 * @Entity @Table(name="products")
	 */
	class Product
	{
		/** @Id @Column(type="integer") @GeneratedValue */
		protected $id;

		/** @Column(type="string", length=255) */
		protected $name;

		public function getId()
		{
			return $this->id;
		}

		public function getName()
		{
			return $this->name;
		}

		public function setName($name)
		{
			$this->name = $name;
		}
	}
}