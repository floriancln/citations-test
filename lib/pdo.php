<?php

// Constantes de connexion à la BD 
define('DSN', 'mysql:host=mysql-floriancolin.alwaysdata.net;dbname=floriancolin_citations;charset=utf8');
define('DB_USER', '229210');
define('DB_PASS', 'AlwaysAccount1');


/**
 * Fonction de connexion à la BD
 *
 * @return PDO
 */
function getPDO(){
    // Définition des options de connexion
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    return new PDO(DSN, DB_USER, DB_PASS, $options);
};