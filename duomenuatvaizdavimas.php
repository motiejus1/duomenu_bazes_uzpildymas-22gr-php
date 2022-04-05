<?php

$database_server = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'uzduotis';

//Prisijungimo kintamasis
$conn = mysqli_connect($database_server, $database_username, $database_password, $database_name );

//jeigu prisijungimas sekmingas - true, jei nesekmingas -false

if(!$conn) {
    die("Failed to connect" . mysqli_connect_error());
}
echo "Prisijungimas sekmingas";

mysqli_set_charset($conn, "utf8");

//index.php jis mums iterpinejo duomenis i duomenu baze
//duomenuatvaizdavimas.php
// ivykdytu sql uzklausa kuri yra select
//atvaizduosim rezultatus lenteleje
$sql = "SELECT DISTINCT u.name, u.surname, r.name AS role_name FROM users u INNER JOIN users_roles_permissions urp ON u.id = urp.user_id INNER JOIN roles r ON r.id = urp.role_id";

$result = $conn->query($sql);


echo "<table>";
while($users = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$users['name']."</td>";
    echo "<td>".$users['surname']."</td>";
    echo "<td>".$users['role_name']."</td>";


    //ta lentele kuri yra vykdoma per SQL
    // $users = [
        // 'name' => reiksme,
        // 'surname' => reiksme
        // 'name' => reiksme
    // ]
    echo "</tr>";
    
}
echo "</table>";