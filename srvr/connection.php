<?php
class connection
{
    static private $pdo;
    static private $pdostat;

    static function connect()
    {
        try {
            self::$pdo = new PDO("mysql:host=localhost;dbname=mytodos", 'root', 'root'); //set your db's name and credentials here 
            self::$pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (Exception $e) {
            echo "ERREUR : " . $e->getMessage();
        }
    }
    static function Maj($sql)
    {
        self::$pdostat = self::$pdo->query($sql);
    }
    static function Select($sql)
    {
        self::$pdostat = self::$pdo->query($sql);
        self::$pdostat->setFetchMode(PDO::FETCH_ASSOC);
        return self::$pdostat;
    }
}
