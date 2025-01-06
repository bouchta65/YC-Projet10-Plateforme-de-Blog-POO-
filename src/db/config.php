<?php

$username = 'Bouchta'; 
$password = '0000'; 

try {
    $conn = new PDO('mysql:host=localhost;dbname=blog_projet', $username, $password);
    $conn->setAttribute(PDO :: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed : '.$e->getMessage();
}
?>