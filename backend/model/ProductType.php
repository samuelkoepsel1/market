<?php

namespace app\model;

use app\core\DbModel;

/**
 * @package app\model
 */
class ProductType extends DbModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?float $tax = null;

    public function tableName(): string
    {
        return 'products_types';
    }

    public function rules():array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'tax' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return [
            'name',
            'tax'
        ];
    }
}