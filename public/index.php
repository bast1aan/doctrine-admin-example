<?php

use Bast1aan\DoctrineAdmin\Example\DoctrineAdmin\MyDoctrineAdmin;

require '../bootstrap.php';

$da = new MyDoctrineAdmin(entityManager());

$entities = $da->getCollection('Bast1aan\DoctrineAdmin\Example\Entities\Bug');
?>
<html>
<head><script type="text/javascript" src="js/doctrine_admin.js"></script></head>
<body>
<?php
print $entities->getEntityList()->render();
?>
</body>
</html>