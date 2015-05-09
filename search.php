<?php
/**
 * Created by IntelliJ IDEA.
 * User: fcm2009
 * Date: 5/8/15
 * Time: 3:12 PM
 */

include_once "ItemFactory.php";

$keyword = "";//$_GET["keyword"];
$category = "All";//$_GET["category"];
$host = "localhost";
$port = "3306";
$dbname = "KFUPMTrade";
$username = "root";
$password = "hg,i,l,vh";

if($category == "All") {
    $sql = "SELECT Item.id, Item.title, Item.seller, Item.price, Item.type, Book.isbn, Game.gameId, Movie.movieId, Tv.tvId
            FROM Item LEFT JOIN Book ON Item.id = Book.id
            LEFT JOIN Electronic ON Item.id = Electronic.id
            LEFT JOIN Game ON Item.id = Game.id
            LEFT JOIN Home ON Item.id = Home.id
            LEFT JOIN Movie ON Item.id = Movie.id
            LEFT JOIN Other ON Item.id = Other.id
            LEFT JOIN Tv ON Item.id = Tv.id
            WHERE title LIKE :keyword";
}
else {
    $sql = "SELECT id, title, seller, price, type FROM Item NATURAL JOIN $category
            WHERE title like :keyword";
}

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $query = $db->prepare($sql);
    $query->execute(array(":keyword" => "%$keyword%"));
    $result = $query->fetchall(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error:\n" . $e->getMessage());
}

foreach($result as $object) {
    $objects[] = ItemFactory::createItem($object);
}
return $objects;





