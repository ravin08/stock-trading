<?php
require "config.php";


// Create connection PDO
// $server_name = SERVER_NAME;
// $user_name = USER_NAME;
// $password = PASSWORD;
// $db_name = DB_NAME;

// $dsn = "mysql:host=$server_name;dbname=$db_name";

// try {
// 	$pdo = new PDO($dsn, $user_name, $password);

// 	if ($pdo) {
// 		echo "Connected to the $db_name database successfully!";
// 	}
// } catch (PDOException $e) {
// 	echo $e->getMessage();
// }

/**
 * mysql- PDO Class
 */

class mySqlDb{
    
   public $conn; 

    public function connect_to_db_server(){
        // Create connection PDO
        $database = DATABASE;
        $server_name = SERVER_NAME;
        $user_name = USER_NAME;
        $password = PASSWORD;
        $db_name = DB_NAME;
        
        $dsn = "$database:host=$server_name;dbname=$db_name";


        $conn = new PDO($dsn, $user_name, $password);

        if ($conn) {
            echo "Connected to the $db_name database successfully!";
            return $conn;
        }
        
    }

    public function show_databases(){
        $obj_pod=$this->  connect_to_db_server(); // call method of same class
        $qry = "SHOW DATABASES";
        $dbs = $obj_pod->query($qry);
        while( ( $db = $dbs->fetchColumn( 0 ) ) !== false )
        {
        echo $db.'<br>';
        }
        // echo(count($dbs));
        var_dump($dbs);
        
    }

    public function  create_database($db_name){
        $this->db_name = $db_name;
        $obj_pod=$this->  connect_to_db_server(); // call method of same class
        $qry = "CREATE DATABASE IF NOT EXISTS $this->db_name";
        $dbs = $obj_pod->query($qry);
        
        if ($dbs){echo "database created";}

        // var_dump($obj_pod);
        
    }
    


}

$obj = new mySqlDb();
// $obj->connect_to_db_server();
$obj-> show_databases();
$obj-> create_database("xxx");
?>