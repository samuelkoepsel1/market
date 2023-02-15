<?php

namespace app\model;

use app\core\DbModel;

/**
 * @package app\model
 */
class Cart extends DbModel
{
    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 2;

    public ?int $id = null;
    public ?int $product_id = null;
    public ?int $amount = 1;
    public ?int $status = self::STATUS_OPEN;

    public function tableName(): string
    {
        return 'carts';
    }

    public function rules():array
    {
        return [
            'product_id' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return [
            'product_id',
            'amount',
            'status'
        ];
    }

    public function get()
    {
        $statement = self::prepare("
            SELECT c.id AS id,
                   c.amount AS amount,
                   p.value AS value,
                   p.name AS product,
                   SUM(t.value)/100 * p.value/100 AS tax
            FROM carts c
            LEFT JOIN products p
            ON p.id = c.product_id
            LEFT JOIN taxes t
            ON t.product_type_id = p.product_type_id
            WHERE status = " . self::STATUS_OPEN . "
            GROUP BY c.id, c.amount, p.value, p.name");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function closeCart(int $sale_id)
    {
        $statement = self::prepare("UPDATE carts SET status = " . self::STATUS_CLOSED . ", sale_id = $sale_id WHERE status = " . self::STATUS_OPEN );

        return $statement->execute();
    }
}