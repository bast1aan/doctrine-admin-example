<?php

namespace Bast1aan\DoctrineAdmin\Example\Entities {
	
	use Doctrine\Common\Collections\ArrayCollection;

	/**
	 * @Entity(repositoryClass="Bast1aan\DoctrineAdmin\Example\BugRepository") @Table(name="bugs")
	 */
	class Bug {
		
		/**
		 * @Id @Column(type="integer") @GeneratedValue
		 */
		protected $id;
		
		/**
		 * @Column(type="string", length=255)
		 */
		protected $description;
		
		/**
		 * @Column(type="datetime")
		 */
		protected $created;
		
		/**
		 * @Column(type="string", length=128)
		 */
		protected $status;

		/**
		 * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
		 */
		protected $engineer;

		/**
		 * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
		 */
		protected $reporter;

		/**
		 * @ManyToMany(targetEntity="Product")
		 */
		protected $products;

		public function __construct()
		{
			$this->products = new ArrayCollection();
		}

		public function getId()
		{
			return $this->id;
		}

		public function getDescription()
		{
			return $this->description;
		}

		public function setDescription($description)
		{
			$this->description = $description;
		}

		public function setCreated(DateTime $created)
		{
			$this->created = $created;
		}

		public function getCreated()
		{
			return $this->created;
		}

		public function setStatus($status)
		{
			$this->status = $status;
		}

		public function getStatus()
		{
			return $this->status;
		}

		public function setEngineer($engineer)
		{
			$engineer->assignedToBug($this);
			$this->engineer = $engineer;
		}

		public function setReporter($reporter)
		{
			$reporter->addReportedBug($this);
			$this->reporter = $reporter;
		}

		public function getEngineer()
		{
			return $this->engineer;
		}

		public function getReporter()
		{
			return $this->reporter;
		}

		public function assignToProduct($product)
		{
			$this->products[] = $product;
		}

		public function getProducts()
		{
			return $this->products;
		}

		public function close()
		{
			$this->status = "CLOSE";
		}
	}
}

