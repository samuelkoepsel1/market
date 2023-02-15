<?php

use app\core\Application;

class m0004_create_table_carts {

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE carts (
            id SERIAL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            product_id INT NOT NULL,
            sale_id INT,
            amount INT NOT NULL,
            status INT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT fk_product
                FOREIGN KEY(product_id)
                    REFERENCES products(id),
            CONSTRAINT fk_sale
                FOREIGN KEY(sale_id)
                    REFERENCES sales(id)
        );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE carts;";
        $db->pdo->exec($SQL);
    }
}