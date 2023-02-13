<?php

namespace app\model;

use app\core\DbModel;

/**
 * @package app\model
 */
class Product extends DbModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?float $value = null;
    public ?int $product_type_id = null;

    public function tableName(): string
    {
        return 'products';
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
}