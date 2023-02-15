<?php

namespace app\model;

use app\core\DbModel;

/**
 * @package app\model
 */
class Sale extends DbModel
{
    public ?int $id = null;
    public ?int $total = null;

    public function tableName(): string
    {
        return 'sales';
    }

    public function rules():array
    {
        return [
            'total' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return [
            'total'
        ];
    }

    public function getLastSale()
    {
        $statement = self::prepare("SELECT id FROM sales ORDER BY created_at DESC LIMIT 1");
        $statement->execute();

        return $statement->fetchColumn();
    }
}