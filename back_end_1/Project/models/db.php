<?php
class Db
{
    public static $connection;
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli('localhost', 'root', '', 'be1','3306');
            self::$connection->set_charset('utf8');
        }
        return self::$connection;
    }
}