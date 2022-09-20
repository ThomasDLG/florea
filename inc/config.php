<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$bdd = 'florea';

try {
    $log = new PDO("mysql:host=" . $serverName . ";dbname=" . $bdd, $userName, $password);
    $log->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $log->exec('set names utf8');
}

catch(PDOException $evt) {
    echo 'Erreur :' .$evt->getMessage();
}
