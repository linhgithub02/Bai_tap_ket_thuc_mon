<?php

require_once '../pdo.php';
require_once '../helper.php';


deleteReader(['MaDG' => $_POST['id']]);

redirectCategoryHome();