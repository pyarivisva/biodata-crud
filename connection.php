<?php
    $host = "localhost";
    $username = "root";
    $pass = "";
    $db = "db_data_mahasiswa";
    
    $conn = mysqli_connect($host, $username, $pass, $db);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>