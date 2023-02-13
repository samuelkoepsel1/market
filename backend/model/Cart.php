<?php

namespace app\model;

use app\core\DbModel;

/**
 * @package app\model
 */
class Cart extends DbModel
{
    public ?int $id = null;
    public ?int $product_id = null;
    public ?int $amount = null;

    public function tableName(): string
    {
        return 'carts';
    }

    public function rules():array
    {
        return [
            'product_id' => [self::RULE_REQUIRED],
            'amount' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return [
            'product_id',
            'amount'
        ];
    }
}