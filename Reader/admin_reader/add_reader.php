<?php

require_once '../pdo.php';
require_once '../helper.php';

createReader(array('MaDG' => $_POST['id'], 
'TenDG' => $_POST['name'],
'NgaySinh' => $_POST['born_date'],
'DiaChi' => $_POST['add'],
'NgayLapThe' => $_POST['date_on'],
'NgayHetHan' => $_POST['date_out'],
'SoSachDangMuon' => $_POST['number_of_book']));
redirectCategoryHome();