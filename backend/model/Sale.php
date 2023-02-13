<?php

namespace app\model;

use app\core\DbModel;

/**
 * @package app\model
 */
class Sale extends DbModel
{
    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 2;

    public ?int $id = null;
    public ?int $cart_id = null;
    public ?int $status = self::STATUS_OPEN;
    public ?float $total = null;

    public function tableName(): string
    {
        return 'sales';
    }

    public function rules():array
    {
        return [
            'cart_id' => [self::RULE_REQUIRED],
            'total' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return [
            'cart_id',
            'status',
            'total'
        ];
    }
}