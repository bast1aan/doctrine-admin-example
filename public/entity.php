<?php

use Bast1aan\DoctrineAdmin\DoctrineAdmin;
use Bast1aan\DoctrineAdmin\Entity;
use Bast1aan\DoctrineAdmin\View\Form;
use Bast1aan\DoctrineAdmin\Example;

require_once('../bootstrap.php');

$em = entityManager();

$da = new DoctrineAdmin($em);

$da->setConfig(new Example\DoctrineAdmin\Config());

$entityName = $_REQUEST['entity_name'];
$entityId = $_REQUEST['entity_id'];

$entity = $da->find($entityName, $entityId);

?>
<html>
	<head><script type="text/javascript" src="js/doctrine_admin.js"></script></head>
	<body>
<?php
if ($entity instanceof Entity) {
	$form = $entity->getView()->getForm();
	if (!empty($_POST['submit'])) {
		try {
			$form->populate($_POST);
			$form->save();
			?><span class="success">Successfully saved entity</span><?php
		} catch(Exception $e) {
			print $e->getMessage(); print $e->getTraceAsString();exit;
			?><span class="error">Error: <?php print $e->getMessage(); ?></span><?php
		}
	}
	?><form action="entity.php" method="post">
	<input type="hidden" name="entity_name" value="<?php print htmlentities($entityName) ?>" />
	<input type="hidden" name="entity_id" value="<?php print htmlentities($entityId) ?>" />
	<?php print $form->render() ?>
	<input type="submit" name="submit" value="Submit" />
	</form>
	<?php
} else {
	header('HTTP/1.0 404 Not Found');
	print 'Entity not found';
}
?>
	</body>
</html>