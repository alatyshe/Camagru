<?php

$path = $_SERVER['DOCUMENT_ROOT'] . "/camagru/classes/connect_db.php";
require_once $path;

//echo $_SERVER['DOCUMENT_ROOT'] . "/camagru/params/params_db.php";


  try {
    $settings = require_once  "./params/params_db.php";

    $pdo_db = new \DevStart\Database($settings);

    //  Создаем необходимые таблицы
    //  https://www.youtube.com/watch?v=KBnBEop_zEs
    echo "<h4>Create DataBases</h4>";
    $query = "CREATE TABLE IF NOT EXISTS `users`
      (
        `user_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `image_id` INT(11) DEFAULT NULL,
        `login` VARCHAR(255) NOT NULL UNIQUE,
        `password` VARCHAR(255) NOT NULL,
        `last_name` VARCHAR(255) NOT NULL,
        `first_name` VARCHAR(255) NOT NULL,
        `gender` VARCHAR(255) NOT NULL,
        `signup_token` VARCHAR(255) NULL,
        `password_token` VARCHAR(255) NULL,
        `active` TINYINT(1) NOT NULL,
        `bio` text NOT NULL
  
      )";
    $result = $pdo_db->query($query);
    echo "Table <b>users</b> created<br>";


    $query = "CREATE TABLE IF NOT EXISTS `followers`
      (
        `follow_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `user_id_followed` INT(11) NOT NULL,
        `user_id_follower` INT(11) NOT NULL 
      )";
    $result = $pdo_db->query($query);
    echo "Table <b>followers</b> created<br>";


    $query = "CREATE TABLE IF NOT EXISTS `images`
      (
        `image_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `user_id` INT(11) NOT NULL,
        `path` VARCHAR(255) NOT NULL,
        `desc` VARCHAR(255) NOT NULL,
        `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
    $result = $pdo_db->query($query);
    echo "Table <b>images</b> created<br>";


    $query = "CREATE TABLE IF NOT EXISTS `comments`
      (
        `comment_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `user_id` INT(11) NOT NULL,
        `image_id` INT(11) NOT NULL,
        `comment` VARCHAR(255) NOT NULL,
        `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
      )";
    $result = $pdo_db->query($query);
    echo "Table <b>comments</b> created<br>";


    $query = "CREATE TABLE IF NOT EXISTS `likes`
      (
        `like_id` INT(64) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `user_id` INT(11) NOT NULL,
        `image_id` INT(11) NOT NULL
      )";
    $result = $pdo_db->query($query);
    echo "Table <b>likes</b> created<br>";




    //  Создаем ссылку для id в другую таблицу
    //  http://www.mysql.ru/docs/man/ALTER_TABLE.html
    //  https://support.office.com/ru-ru/article/%D0%9F%D1%80%D0%B5%D0%B4%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5-constraint-e5241593-139a-4eb7-ad30-61026873191e
    //  https://metanit.com/sql/mysql/2.5.php
    echo "<h4>Сreating links between tables</h4>";
    echo "<h5>Users :</h5>";
    $query = "ALTER TABLE `users` 
                ADD CONSTRAINT `Link_1` 
                FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`)";
    $result = $pdo_db->query($query);
    echo "The key <b>image_id</b> from table <b>users</b> was successfully bound to key <b>image_id</b> from table <b>images</b>.<br>";
    echo "<br>";


    echo "<h5>Followers :</h5>";
    $query = "ALTER TABLE `followers` 
                ADD CONSTRAINT `Link_2` 
                FOREIGN KEY (`user_id_followed`) REFERENCES `users` (`user_id`)";
    $result = $pdo_db->query($query);
    echo "The key <b>user_id_followed</b> from table <b>followers</b> was successfully bound to key <b>user_id</b> from table <b>users</b>.<br>";

    $query = "ALTER TABLE `followers` 
                ADD CONSTRAINT `Link_3` 
                FOREIGN KEY (`user_id_follower`) REFERENCES `users` (`user_id`)";
    $result = $pdo_db->query($query);
    echo "The key <b>user_id_follower</b> from table <b>followers</b> was successfully bound to key <b>user_id</b> from table <b>users</b>.<br>";
    echo "<br>";


    echo "<h5>Images :</h5>";
    $query = "ALTER TABLE `images` 
                ADD CONSTRAINT `Link_4` 
                FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)";
    $result = $pdo_db->query($query);
    echo "The key <b>user_id</b> from table <b>images</b> was successfully bound to key <b>user_id</b> from table <b>users</b>.<br>";
    echo "<br>";


    echo "<h5>Comments :</h5>";
    $query = "ALTER TABLE `comments` 
                ADD CONSTRAINT `Link_5` 
                FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)";
    $result = $pdo_db->query($query);
    echo "The key <b>user_id</b> from table <b>comments</b> was successfully bound to key <b>user_id</b> from table <b>users</b>.<br>";

    $query = "ALTER TABLE `comments` 
                ADD CONSTRAINT `Link_6` 
                FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`)";
    $result = $pdo_db->query($query);
    echo "The key <b>image_id</b> from table <b>comments</b> was successfully bound to key <b>image_id</b> from table <b>images</b>.<br>";
    echo "<br>";


    echo "<h5>Likes :</h5>";
    $query = "ALTER TABLE `likes` 
                ADD CONSTRAINT `Link_8` 
                FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)";
    $result = $pdo_db->query($query);
    echo "The key <b>user_id</b> from table <b>likes</b> was successfully bound to key <b>user_id</b> from table <b>users</b>.<br>";

    $query = "ALTER TABLE `likes` 
                ADD CONSTRAINT `Link_9` 
                FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`)";
    $result = $pdo_db->query($query);
    echo "The key <b>image_id</b> from table <b>likes</b> was successfully bound to key <b>image_id</b> from table <b>images</b>.<br>";
    echo "<br>";


  } catch (Exception $e) {
    echo "ERROR : " . $e->getMessage();
  }
?>
