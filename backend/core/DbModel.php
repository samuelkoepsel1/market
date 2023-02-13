<?php

namespace app\core;

use PDO;

/**
 * @package app\core
 */
abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function get()
    {
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT * FROM $tableName");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        if ($this->id) {
            $statement = self::prepare("UPDATE $tableName SET " . implode(", ", array_map(fn($attr) => "$attr = :$attr", $attributes)) . " 
            WHERE id = {$this->id}");

            foreach ($attributes as $attribute) {
                $statement->bindValue(":$attribute", $this->{$attribute});
            }

            $statement->execute();
            return true;
        }

        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") 
            VALUES(".implode(',', $params).")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public function delete(int $id)
    {
        $tableName = $this->tableName();
        $statement = self::prepare("DELETE FROM $tableName WHERE id = $id");
        $statement->execute();

        return true;
    }

    public function findOne($where)
    {
        $tableName = self::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);
    }
    
    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}