<?php

namespace MainClasses;

use mysql_xdevapi\Exception;
use PDO;
use PDOException;

class Database
{
    public $conn;



    public function __construct($config){
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->conn =   new PDO($dsn, $config['username'], $config['password'], $options);

        } catch (PDOException $e) {
            throw new  Exception("Connection failed: " . $e->getMessage() );
        }
    }


    public function query($query, $params = []){
        try {
           $stmt = $this->conn->prepare($query);
            //bind params
            foreach($params as $param => $value){
                $stmt->bindValue(':' . $param , $value);
            }

            $stmt->execute();
                return $stmt;
        }catch (PDOException $e) {
            throw new  Exception("Connection failed: " . $e->getMessage() );

        }

    }

}



