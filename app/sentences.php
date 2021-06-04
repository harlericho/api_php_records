<?php
require_once "config.php";
class Sentences extends Config
{
    public static function __listData()
    {
        try {
            $sql = "SELECT * FROM records WHERE status= 'A'";
            $query = Config::__db()->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Failed query: " . $th->getMessage());
        }
    }

    public static function __saveData($data)
    {
        try {
            $sql = "INSERT INTO records(names,dni) VALUES(:names,:dni)";
            $query = Config::__db()->prepare($sql);
            $query->bindParam(':names', $data['names'], PDO::PARAM_STR);
            $query->bindParam(':dni', $data['dni'], PDO::PARAM_STR);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Failed query: " . $th->getMessage());
        }
    }

    public static function __updateData($data)
    {
        try {
            $sql = "UPDATE records SET names=:names,dni=:dni WHERE id=:id";
            $query = Config::__db()->prepare($sql);
            $query->bindParam(':names', $data['names'], PDO::PARAM_STR);
            $query->bindParam(':dni', $data['dni'], PDO::PARAM_STR);
            $query->bindParam(':id', $data['id'], PDO::PARAM_INT);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Failed query: " . $th->getMessage());
        }
    }
    public static function __deleteData($id)
    {
        try {
            $sql = "UPDATE records SET status='I' WHERE id=:id";
            $query = Config::__db()->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Failed query: " . $th->getMessage());
        }
    }

    public static function __validationsData($dni)
    {
        try {
            $sql = "SELECT * FROM records WHERE dni=:dni";
            $query = Config::__db()->prepare($sql);
            $query->bindParam(':dni', $dni, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Failed query: " . $th->getMessage());
        }
    }
}
