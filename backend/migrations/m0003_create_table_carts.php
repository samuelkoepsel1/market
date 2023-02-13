<?php

use app\core\Application;

class m0003_create_table_carts {

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE carts (
            id SERIAL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            product_id INT NOT NULL,
            amount INT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT fk_product
                FOREIGN KEY(product_id)
                    REFERENCES products(id)
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