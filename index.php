<?php
// prisijungtu prie duombazes
// 1000 kartu ivykdys INSERT INTO uzklausa

//primityvus env faila

$database_server = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'laravel_vuejs';

//Prisijungimo kintamasis
$conn = mysqli_connect($database_server, $database_username, $database_password, $database_name );

//jeigu prisijungimas sekmingas - true, jei nesekmingas -false

if(!$conn) {
    die("Failed to connect" . mysqli_connect_error());
}
echo "PRisijungimas sekmingas";

mysqli_set_charset($conn, "utf8");

for($i=0; $i<1000; $i++) {
    $name = 'vardas'.$i;
    $description = 'aprasymas'.$i;
    $price = (mt_rand()/ mt_getrandmax())*$i;
//    SELECT id, name, description, price FROM `products` WHERE 1
    $sql = "INSERT INTO `products`(`name`, `description`, `price`) VALUES ('$name','$description','$price')";

    if(mysqli_query($conn, $sql)) {
        echo "Produktas sukurtas sekmingai";
        echo "<br>";
    } else {
        echo "Kazkas ivyko negerai";
        echo "<br>";
    }

} 