<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/11/15
 * Time: 9:33 PM
 */

$start = $_POST["id"];
$host = "localhost";
$port = "3306";
$dbname = "KFUPMTrade";
$username = "root";
$password = "root";



try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    $query->execute(array(":id" => $id));
    $result = $query->fetchall(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}

if(count($result) != 0) {
    $objects[] = ItemFactory::createItem($object);
    echo json_encode($objects);
}
else {
    echo json_encode(null);;
}