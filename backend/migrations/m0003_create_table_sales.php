<?php

use app\core\Application;

class m0003_create_table_sales {

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE sales (
            id SERIAL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            total INT NOT NULL,
            PRIMARY KEY(id)
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