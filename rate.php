<?php
require_once 'asset.php';

if(!isLevel(10)){
    header("Location: index.php");
}

if(!isset($_GET['rating']) || !isset($_GET['drinkID']) || !isset($_SESSION['id'])){
    header("Location: index.php");
}

$rating = intval($_GET['rating']);
$drinkID = intval($_GET['drinkID']);
$userID = intval($_SESSION['id']);

if($rating < 1 || $rating > 5 || $drinkID < 1 || $userID < 1){
    header("Location: index.php");
}

$sql = "SELECT id FROM tbl_rating WHERE drink_id=$drinkID AND user_id=$userID";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $id = intval($row['id']);
    $sql = "UPDATE tbl_rating SET rating=$rating WHERE id=$id";
    mysqli_query($conn, $sql);
} else {
    $sql = "INSERT INTO tbl_rating (drink_id, user_id, rating) VALUES ($drinkID, $userID, $rating)";
    mysqli_query($conn, $sql);
}

header("Location: index.php");
?>