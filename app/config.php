<?php
class Config
{
    public static function __db()
    {
        try {
            $con = new PDO("mysql:host=localhost;dbname=db_records", "charlie", "charlie");
            return $con;
        } catch (\Throwable $th) {
            die("Failed connection: " . $th->getMessage());
        }
    }
}
