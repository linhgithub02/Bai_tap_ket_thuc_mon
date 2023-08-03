<?php

require_once '../pdo.php';
require_once '../helper.php';

createTypeOfBook(array('typesofbooks_id' => $_POST['id'], 
'namesofbooks' => $_POST['name']));
redirectCategoryHome();