<?php
$dsn = "mysql:host=localhost;port=3306;dbname=foot";
$username = "root";
$password = "";
$options = [];

$connection = new PDO($dsn, $username, $password, $options);

try {

    print "connexion reussie";
} catch (PDOExeption $e) {

    print "error :" . $e->getMessage();
    die();
};
