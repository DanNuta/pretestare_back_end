<?php


$conn = mysqli_connect("localhost", "root", "", "pretestare");


if (!$conn) {
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}
echo "Conectat cu succes la baza de date!";


if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $location = $_POST["location"];
    $image = $_FILES['image']["name"];



    $ext = explode('.', $image);
    $extension = end($ext);
    $filename = md5($image . time()) . '.' . $extension;
    $image_path = "uploads/" . $filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
        echo "Fișierul a fost încărcat cu succes!";
    } else {
        echo "Eroare la încărcarea fișierului: " . $_FILES['image']['error'];
    }
    $sql = "INSERT INTO book (title, location, img) VALUES ('$title', '$location', '$image_path')";
    $res = mysqli_query($conn, $sql);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<a href="./getDataInBd.php">Get data</a>


    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="title" placeholder="Title">
        <input type="file" name="image" placeholder="file">
        <input type="text" name="location" placeholder="location">
        <input type="submit" name="submit" value="submit">





    </form>

</body>

</html>