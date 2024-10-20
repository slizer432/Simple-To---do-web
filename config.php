<?php

try {
    $serverName = "UHERRRR\\SQLEXPRESS";
    $dbName = "Account";

    $conn = new PDO("sqlsrv:server=$serverName;Database= $dbName");

} catch (\Throwable $th) {
    die("Koneksi gagal");
}