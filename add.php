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

$title = $_POST["title"];
$seller = $_POST["seller"];
$price = $_POST["price"];
$type = $_POST["category"];
$description = $_POST["description"];
$image = $_POST["image"];

$sql = "INSERT INTO Item(id, title, seller, price, type, description, image, date)
        VALUES(DEFAULT, :title, :seller, :price, :type, :description, :image, DEFAULT)";

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    if($query->execute(array(":title" => $title, ":seller" => $seller, ":price" => $price, ":type" => $type,
    ":description" => $description, ":image" => $image)));
        header('Location: index.html');
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}

