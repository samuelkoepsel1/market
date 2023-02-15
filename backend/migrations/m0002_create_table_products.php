<?php

use app\core\Application;

class m0002_create_table_products {

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE products (
            id SERIAL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            name VARCHAR(256) NOT NULL,
            value INT NOT NULL,
            product_type_id INT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT fk_product_type
                FOREIGN KEY(product_type_id)
                    REFERENCES products_types(id)
        );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE products;";
        $db->pdo->exec($SQL);
    }
}