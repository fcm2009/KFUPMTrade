<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/11/15
 * Time: 2:53 AM
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
    if($query->execute(array(":id" => $id)))
        echo $id + 56;
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}