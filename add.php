<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/9/15
 * Time: 5:53 AM
 */

$object = json_decode($_GET["object"]);
$category = "All";//$_GET["category"];
$host = "localhost";
$port = "3306";
$dbname = "KFUPMTrade";
$username = "root";
$password = "root";

$sql = "INSERT INTO Item VALUES(
        :id, :title, :seller, :price, :type, :description, :image";


try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    $query->execute(array(":keyword" => "%$keyword%"));
    $result = $query->fetchall(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}