<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "hash-pass";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    echo "error";
}
//  else{
//     die("Error! :(". mysqli_connect_error());
// }

?>