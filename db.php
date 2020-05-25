<?php
  class DBInterface{
    public $db = null;
    function __construct(){
      
      if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/copycenter.sqlite')){
        $this->db = new PDO('sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/copycenter.sqlite');
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $sql = "CREATE TABLE orders(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            phone_number TEXT,
            client_name TEXT,
            comment TEXT,
            order_type_id INT,
            order_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            is_completed BOOLEAN DEFAULT 0
          )";
        $this->db->query($sql);
        $sql = "CREATE TABLE order_types(
            id INTEGER PRIMARY KEY,
            order_type TEXT,
            approx_price FLOAT,    
          )";
        $this->db->query($sql);
        $sql = "CREATE TABLE admins(
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          username TEXT,
          password TEXT,
          token TEXT   
        )";
      $this->db->query($sql);
      $username = "admin";
      $password = "copy1010df";
      $hash = password_hash($password, PASSWORD_BCRYPT);
      // debug([$username, $hash]);
      $sql = "INSERT INTO admins (username, password, token) VALUES ('$username', '$hash', 'token')";
      $this->db->query($sql);
      // die('test');
      } else {
        $this->db = new PDO('sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/copycenter.sqlite');
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
      }
    }

  }


