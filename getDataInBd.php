<?php 

header("Access-Control-Allow-Origin: *");

$conn = mysqli_connect("localhost", "root", "", "pretestare");


if (!$conn) {
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}

$sql = "SELECT * FROM book";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result);

$result = json_encode($data, true);

print_r($result);
?>

