<?php
  class DBInterface{
    public $db = null;
    function __construct(){
      if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/copycenter.sqlite')){
        $this->db = new SQLite3($_SERVER['DOCUMENT_ROOT'].'/copycenter.sqlite');
        $sql = "CREATE TABLE orders(
            id INTEGER PRIMARY KEY,
            phone_number TEXT,
            client_name TEXT,
            comment TEXT,
            order_type_id INT,
            order_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP        
          )";
        $this->db->query($sql);
        $sql = "CREATE TABLE order_types(
            id INTEGER PRIMARY KEY,
            order_type TEXT,
            approx_price float       
          )";
        $this->db->query($sql);
      }else{
        $this->db = new SQLite3($_SERVER['DOCUMENT_ROOT'].'/copycenter.sqlite');
      }
    }

  }


