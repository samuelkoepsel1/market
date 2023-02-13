<?php

use app\core\Application;

class m0004_create_table_sales {

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE sales (
            id SERIAL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            cart_id INT NOT NULL,
            status INT NOT NULL,
            total FLOAT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT fk_cart
                FOREIGN KEY(cart_id)
                    REFERENCES carts(id)
        );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE sales;";
        $db->pdo->exec($SQL);
    }
}