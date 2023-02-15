<?php

use app\core\Application;

class m0005_create_table_taxes {

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE taxes (
            id SERIAL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            product_type_id INT NOT NULL,
            name VARCHAR(256) NOT NULL,
            value INT NOT NULL,
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
        $SQL = "DROP TABLE taxes;";
        $db->pdo->exec($SQL);
    }
}