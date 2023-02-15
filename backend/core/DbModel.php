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
            $fields = implode("", array_map(function($attr) {
                return $this->$attr ? "$attr = :$attr," : "";
            }, $attributes));
            $fields = substr($fields, 0, -1);
            $statement = self::prepare("UPDATE $tableName SET " . $fields . " WHERE id = {$this->id}");

            foreach ($attributes as $attribute) {
                if ($this->$attribute) {
                    $statement->bindValue(":$attribute", $this->{$attribute});
                }
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

        return $statement->execute();
    }

    public function delete(int $id)
    {
        $tableName = $this->tableName();
        $statement = self::prepare("DELETE FROM $tableName WHERE id = $id");

        return $statement->execute();
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