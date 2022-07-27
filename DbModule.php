<?php
require "config.php";

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

    public function  create_database($db_name){
        $this->db_name = $db_name;
        $obj_pod=$this->  connect_to_db_server(); // call method from same class
        $qry = "CREATE DATABASE IF NOT EXISTS $this->db_name";
        $dbs = $obj_pod->prepare($qry);
        
        if ($dbs){echo "database created";}

        // var_dump($obj_pod);
        
    }

    public function show_databases(){
        $conn=$this->  connect_to_db_server(); // call method from same class
        $qry = "SHOW DATABASES";
        $prepare = $conn->prepare($qry);
        $prepare-> execute();
        $result =$prepare-> fetchAll(pdo::FETCH_ASSOC);
        // print_r($result);
        echo("<table id='mytable'>");
        if(count($result)){
            $i=1;
            foreach($result as $row){
                
                echo("<tr><td>$i</td><td>".$row['Database']."</td></tr>");
                $i++;
            }
        echo("</table>");
        echo("Total Database:".count($result)."Nos.</br>");
        }else{echo("No Database Found.");}
        // var_dump($result);
        
    }

    public function create_table($qry){

        
    }

   


    


}

$obj = new mySqlDb();
// $obj->connect_to_db_server();
$obj-> show_databases();
// $obj-> create_database("xxx");
?>