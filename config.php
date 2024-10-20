<?php

try {
    $serverName = "UHERRRR\\SQLEXPRESS";
    $dbName = "Account";
    // $user = 'root';
    // $password = '';

    $conn = new PDO("sqlsrv:server=$serverName;Database= $dbName");

} catch (\Throwable $th) {
    die("Koneksi gagal");
}