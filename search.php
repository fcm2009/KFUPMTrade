<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 3:12 PM
 */

include_once "ItemFactory.php";

$keyword = $_POST["keyword"];
$category = $_POST["category"];
$id = $_POST["id"];
$start = $_POST["start"];
$host = "localhost";
$port = "3306";
$dbname = "KFUPMTrade";
$username = "root";
$password = "root";
$limit = 1000;

if($category == "All") {
    $sql = "SELECT Item.id, Item.title, Item.seller, Item.price, Item.type, Item.description, Item.image,
            Item.date, Item.isbn, Item.gameId, Item.movieId, Item.tvId
            FROM Item
            WHERE title LIKE '%$keyword%'
            ORDER BY Item.date ASC
            LIMIT $start, $limit";
}

elseif($id != "") {
    $sql = "SELECT Item.id, Item.title, Item.seller, Item.price, Item.type, Item.description, Item.image,
            Item.date, Item.isbn, Item.gameId, Item.movieId, Item.tvId
            FROM Item
            WHERE Item.id = $id";
}

else {
    $sql = "SELECT Item.id, Item.title, Item.seller, Item.price, Item.type, Item.description, Item.image,
            Item.date, Item.isbn, Item.gameId, Item.movieId, Item.tvId
            FROM Item
            WHERE Item.type = '$category' AND Item.title LIKE '%$keyword%'
            ORDER BY Item.date ASC
            LIMIT $start, $limit";
}

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchall(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}

if(count($result) != 0) {
    foreach ($result as $object) {
        $objects[] = ItemFactory::createItem($object);
    }
    echo json_encode($objects);
}
else {
    echo json_encode("null");;
}