<?php
require "config.php";

/**
 * mysql- PDO Class
 * @version 0.0.1
 * TODO: test
 */

class mySqlDb{
    
   private $conn; 

    private function connect_to_db_server(){
        // Create connection PDO
        $database = DATABASE;
        $server_name = SERVER_NAME;
        $user_name = USER_NAME;
        $password = PASSWORD;
        $db_name = DB_NAME;
        
        $dsn = "$database:host=$server_name;dbname=$db_name";


        $conn = new PDO($dsn, $user_name, $password);

        if ($conn) {
            echo "Connected to the Databse: $db_name </br>";
            return $conn;
        }
        
    }
    
    
    // $qry = "CREATE DATABASE IF NOT EXISTS db_name";
    // $qry = "SHOW DATABASES";
    // $qry = "SELECT * FROM tabel_name";
    // $qry = "SELECT * FROM user";
    // $qry = " SELECT user_id,post from post WHERE user_id>'2'";
    // $qry = "INSERT INTO user(name,email) VALUES ('kavita','kavita@gmail.com')";
    // $qry = "UPDATE `user` SET `email` = 'kumkum_2@gmail.com' WHERE `user`.`id` = 6";
    // $qry="ALTER TABLE user MODIFY name varchar(50) NOT NULL";
    // $qry="DELETE FROM `user` WHERE `user`.`name` = 'kavita'";
    

    public function run_mysql_query($qry){
       
        $conn=$this->  connect_to_db_server(); // call method from same class

        $this->qry = trim($qry);
        $check = strstr($this->qry, ' ',true);

        if($check=="show" || $check=="SHOW" || $check=="select" || $check=="SELECT" ){
            
            $prepare = $conn->prepare($qry);
            $prepare-> execute();
            $result =$prepare-> fetchAll(pdo::FETCH_ASSOC);
            if($result){
                echo "Congartulation: MySql Operation Sucessfuly.</br>";
                echo "'{$this->qry}' </br>";
            }else{
                echo "Sorry: MySql Operation Not Sucessfuly.</br>";
            }

            return $result;
        }else {
            $prepare = $conn->prepare($this->qry);
            $result = $prepare-> execute();
            if($result){
                echo "Congartulation: MySql Operation Sucessfuly.</br>";
                echo "$this->qry </br>";
            }else{
                echo "Sorry: MySql Operation Not Sucessfuly.</br>";
            }
            return $result;
        }
    $conn = null;

    }
   

}

/* $obj = new mySqlDb();
$qry = "   show DATABASES";
$result = $obj-> run_mysql_query($qry);

echo "<pre>";
print_r(gettype($obj)."</br>");
print_r($obj);
echo "</pre>";

echo "<pre>";
print_r(gettype($qry)."</br>");
print_r($qry);
echo "</pre>";

$qry = trim($qry);
echo (strstr($qry,' ',true));

echo "<pre>";
print_r(gettype($result)."</br>");
print_r($result);
echo "</pre>";
*/













?>


