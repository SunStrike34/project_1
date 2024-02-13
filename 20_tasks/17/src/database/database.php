<?php
/**
 * @return PDO
 */
function connectToBD() : PDO
{
    static $connect = null;

    if (null !== $connect) {
        return $connect;
    }

    $config = loadConfig('database');

    $connect = new PDO(
        "mysql:host={$config['hostname']};dbname={$config['database']}",
        $config['username'],
        $config['password']
    );

    return $connect;
}
