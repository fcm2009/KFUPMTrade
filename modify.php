<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/11/15
 * Time: 9:03 PM
 */

$host = "localhost";
$port = "3306";
$dbname = "KFUPMTrade";
$username = "root";
$password = "root";

$id = $_POST["id"];
$sql = "DELETE FROM Item
        WHERE Item.id = :id";

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    $deleteFlag = $query->execute(array(":id" => $id));
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}

$object = new Electronic("title", "awad", 5000);
$keys = array_keys($object->toArray());
$values = $object->toArray();
array_walk($keys, function(&$key) {$key = ":$key";});
$sql = "INSERT INTO Item VALUES(DEFAULT, ". implode($keys, " ,") .")";

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    $addFlag = $query->execute($values);
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}

echo $deleteFlag && $addFlag;