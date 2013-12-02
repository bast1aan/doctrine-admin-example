<?php
require_once(__DIR__ . '/../lib/src/Bast1aan/DoctrineAdmin/Config.php');
use Bast1aan\DoctrineAdmin\DoctrineAdmin;
use Bast1aan\DoctrineAdmin\Entity;
use Bast1aan\DoctrineAdmin\Config as DoctrineAdminConfig;
use Bast1aan\DoctrineAdmin\Example\DoctrineAdminEntities;

class Config implements DoctrineAdminConfig {
	public function getDoctrineAdminEntityByNativeEntity($entity) {
		if ($entity instanceof Bast1aan\DoctrineAdmin\Example\Entities\Bug) {
			return new DoctrineAdminEntities\Bug($entity);
		} elseif ($entity instanceof Bast1aan\DoctrineAdmin\Example\Entities\User) {
			return new DoctrineAdminEntities\User($entity);			
		}

	}
}

require '../bootstrap.php';

$da = new DoctrineAdmin(entityManager());
$da->setConfig(new Config());

$entities = $da->getCollection('Bast1aan\DoctrineAdmin\Example\Entities\Bug');

$fieldNames = $entities->getFieldNames();
$associationNames = $entities->getAssociationNames();
?> 
<table><tr>
	<?php
foreach(array_merge($fieldNames, $associationNames) as $header) {
	print "<th>$header</th>";
}
?>
	</tr>
<?php
foreach($entities as $entity) {
	
	$assocationColumns = array();
	$rowSpan = 1;
	
	print "<tr>";
	foreach($fieldNames as $name) {
		print "<td>"  . $entity->getColumn($name) . "</td>";
	}
	foreach($associationNames as $associationName) {
		$column = $entity->getColumn($associationName);
		//print $associationName . ' -' . get_class($column) . ' -';exit;
		print "<td>";
		if ($column instanceof Iterator) {
			print "<ul>";
			foreach($column as $item) {
				print "<li>$item</li>";
			}
			print "</ul>";
		} else {
			print (string) $column;
		}
		print "</td>";
	}
	print "</tr>";
}
?>	
</table>