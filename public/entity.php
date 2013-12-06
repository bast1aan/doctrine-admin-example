<?php

use Bast1aan\DoctrineAdmin\DoctrineAdmin;
use Bast1aan\DoctrineAdmin\Entity;
use Bast1aan\DoctrineAdmin\View\Form;
use Bast1aan\DoctrineAdmin\Example;

require_once('../bootstrap.php');

$em = entityManager();

$da = new DoctrineAdmin($em);

$da->setConfig(new Example\Config());

$entityName = $_REQUEST['entity_name'];
$entityId = $_REQUEST['entity_id'];

$entity = $da->find($entityName, $entityId);

if ($entity instanceof Entity) {
	print $entity->getView()->getForm();
} else {
	header('HTTP/1.0 404 Not Found');
	print 'Entity not found';
}
