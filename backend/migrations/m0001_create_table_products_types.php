<?php

use app\core\Application;

class m0001_create_table_products_types {

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE products_types (
            id SERIAL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            name VARCHAR(256) NOT NULL,
            tax FLOAT NOT NULL,
            PRIMARY KEY(id) 
        );";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE products_types;";
        $db->pdo->exec($SQL);
    }
}