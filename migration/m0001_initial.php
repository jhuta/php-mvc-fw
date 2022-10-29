<?php

use jhuta\phpmvccore\Application;

class m001_initial {
  public function up() {
    $db = Application::$app->db;
    $sql = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY_KEY,
        email VARCHAR(255) NOT NULL,
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        status TINYINT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      ) ENGINE=INNODB;";
    $db->pdo->exec($sql);
  }
  public function down() {
    $db = Application::$app->db;
    $sql = "DROP TABLE users;";
    $db->pdo->exec($sql);
  }
}

// update table...
// $db->pdo->exec("ALTER TABLE users ADD COUUMN password VARCHAR(512) NOT NULL;");
// down update..
// $db->pdo->exec("ALTER TABLE users DROP COUUMN password;");