<?php

use Doctrine\ORM\Tools\Setup;

require_once "vendor/autoload.php";

/**
 * 
 * @return \Doctrine\ORM\EntityManager
 */
function entityManager() {
	static $entityManager;
	if($entityManager == null) {
		// Create a simple "default" Doctrine ORM configuration for XML Mapping
		$isDevMode = true;
		$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Bast1aan/DoctrineAdmin/Example/Entities"), $isDevMode);
		// database configuration parameters
		$conn = array(
			'driver' => 'pdo_sqlite',
			'path' => __DIR__ . '/db/db.sqlite',
		);

		// obtaining the entity manager

		$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);
	}
	
	return $entityManager;
	
}

date_default_timezone_set('Europe/Amsterdam');
