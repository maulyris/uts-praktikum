<?php 
 
$server = "localhost";
$user = "root";
$pass = "";
$database = "uplant";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    echo("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>