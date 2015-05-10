<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/9/15
 * Time: 5:53 AM
 */

$host = "localhost";
$port = "3306";
$dbname = "KFUPMTrade";
$username = "root";
$password = "root";

$object = new Electronic("title", "awad", 5000);
$keys = array_keys($object->toArray());
$values = $object->toArray();
array_walk($keys, function(&$key) {$key = ":$key";});
$sql = "INSERT INTO Item VALUES(DEFAULT, ". implode($keys, " ,") .")";

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    echo $query->execute($values);
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}