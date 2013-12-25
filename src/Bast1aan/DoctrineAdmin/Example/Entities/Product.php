<?php

namespace Bast1aan\DoctrineAdmin\Example\Entities {
	use Doctrine\Common\Collections\ArrayCollection;

	/**
	 * @Entity @Table(name="products")
	 */
	class Product
	{
		/** @Id @Column(type="integer") @GeneratedValue */
		protected $id;

		/** @Column(type="string", length=255) */
		protected $name;

		/**
		 * @var Bug
		 * @ManyToMany(targetEntity="Bug", mappedBy="products")
		 */
		protected $bugs;

		public function __construct() {
			$this->bugs = new ArrayCollection();
		}

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