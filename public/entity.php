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

?>
<html>
	<body>
<?php
if ($entity instanceof Entity) {
	$form = $entity->getView()->getForm();
	if (!empty($_POST['submit'])) {
		try {
			$form->populate($_POST);
			$em->flush();
			?><span class="success">Successfully saved entity</span><?php
		} catch(Exception $e) {
			?><span class="error">Error: <?php print $e->getMessage(); ?></span><?php
		}
	}
	?><form action="entity.php" method="post">
	<input type="hidden" name="entity_name" value="<?php print htmlentities($entityName) ?>" />
	<input type="hidden" name="entity_id" value="<?php print htmlentities($entityId) ?>" />
	<?php print $form ?>
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