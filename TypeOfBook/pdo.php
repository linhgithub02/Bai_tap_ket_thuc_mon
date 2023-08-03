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

function getAllTypesOfBooks()
{
    $sql = "SELECT * FROM typesofbooks";
    $stmt = prepareSQL($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
function createTypeOfBook($data)
{
    $sql = "INSERT INTO typesofbooks (typesofbooks_id,	namesofbooks)
    VALUES (:typesofbooks_id, :namesofbooks)";
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
function deleteTypeOfBook($data)
{
    $sql = "DELETE FROM typesofbooks WHERE typesofbooks_id=:typesofbooks_id";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
}