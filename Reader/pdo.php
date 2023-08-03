<?php

$DB_TYPE = 'mysql';
$DB_HOST = 'localhost';
$DB_NAME = 'librarymanagement';
$DB_USER = 'root';
$DB_PASS = '';
try {
    $conn = new PDO("{$DB_TYPE}:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die('Connect error: ' . $e->getMessage());
}

function prepareSQL($sql)
{
    global $conn;
    return $conn->prepare($sql);
}

function getAllReader()
{
    $sql = "SELECT * FROM readers";
    $stmt = prepareSQL($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
function createReader($data)
{
    $sql = "INSERT INTO readers (reader_id,	readername,	dateofbirth,	addresss,	carddate,	outofdate,	numberofborrowedbook	
    )
    VALUES (:MaDG, :TenDG, :NgaySinh, :DiaChi, :NgayLapThe, :NgayHetHan, :SoSachDangMuon)";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
}
function getIDReader($data)
{
    $sql = "SELECT * FROM readers WHERE reader_id=:MaDG";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
    return $stmt-> fetch();
}
function editReader($data)
{
    $sql = "UPDATE readers SET readername=:TenDG, dateofbirth=:NgaySinh, addresss=:DiaChi,
    carddate=:NgayLapThe, outofdate=:NgayHetHan, numberofborrowedbook=:SoSachDangMuon WHERE reader_id=:MaDG";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
}
function deleteReader($data)
{
    $sql = "DELETE FROM readers WHERE reader_id=:MaDG";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
}