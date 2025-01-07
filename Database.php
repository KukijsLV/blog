<?php

class Database {

    public $pdo;


    //konstruktors un destruktors
     public function __construct($config){
         
         $dsn =  "mysql:" . http_build_query($config, "", ";");

        //$dsn = "mysql:host=localhost;port=3306;user=root;password=;dbname=blog_ipa23;charset=utf8mb4";
        $this->pdo = new PDO($dsn);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function query($sql, $params){
       
        $statement =  $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement;

    }
}




?>