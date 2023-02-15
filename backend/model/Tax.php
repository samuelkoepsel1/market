<?php

namespace app\model;

use app\core\DbModel;

/**
 * @package app\model
 */
class Tax extends DbModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?int $value = null;
    public ?int $product_type_id = null;

    public function tableName(): string
    {
        return 'taxes';
    }

    public function rules():array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'value' => [self::RULE_REQUIRED],
            'product_type_id' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return [
            'name',
            'value',
            'product_type_id'
        ];
    }

    public function get()
    {
        $statement = self::prepare("
            SELECT t.id AS id,
                   t.name AS name,
                   t.value AS value,
                   t.product_type_id AS product_type_id,
                   pt.name AS type
            FROM taxes t
            LEFT JOIN products_types pt
            ON pt.id = t.product_type_id ");
        $statement->execute();

        return $statement->fetchAll();
    }
}