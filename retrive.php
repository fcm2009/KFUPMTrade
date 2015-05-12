<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/11/15
 * Time: 9:33 PM
 */

$start = $_POST["start"];
$category = $_POST["category"];
$host = "localhost";
$port = "3306";
$dbname = "KFUPMTrade";
$username = "root";
$password = "root";
$limit = 10;

if($category == "All") {
    $sql = "SELECT Item.id, Item.title, Item.seller, Item.price, Item.type, Item.description, Item.image,
            Item.date, Item.isbn, Item.gameId, Item.movieId, Item.tvId
            FROM Item
            ORDER BY Item.date ASC
            LIMIT :start, :limit";
}
else {
    $sql = "SELECT Item.id, Item.title, Item.seller, Item.price, Item.type, Item.description, Item.image,
            Item.date, Item.isbn, Item.gameId, Item.movieId, Item.tvId
            FROM Item
            WHERE Item.type = $category
            ORDER BY Item.date ASC
            LIMIT :start, :limitlimit";
}

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    $query->execute(array(":start" => $start,":limit" => $limit));
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
    echo json_encode(null);;
}