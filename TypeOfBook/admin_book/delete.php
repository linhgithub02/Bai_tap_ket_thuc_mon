<?php

require_once '../pdo.php';
require_once '../helper.php';


deleteTypeOfBook(['typesofbooks_id' => $_POST['id']]);

redirectCategoryHome();