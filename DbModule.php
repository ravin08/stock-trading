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
        $this->qry = $qry; // FIXME: uncomplite method/ work is pending
        $conn=$this->  connect_to_db_server(); // call method from same class
        // $qry = "SHOW DATABASES";
        $prepare = $conn->prepare($this->qry);
        $prepare-> execute();
        $result =$prepare-> fetchAll(pdo::FETCH_ASSOC); // todo work pending
        return $result;
        
    }

   
    public function fetch_table_data($qry){
        $this->qry = $qry;
        $conn=$this->  connect_to_db_server(); // call method from same class
        // $qry = "SHOW DATABASES";
        $prepare = $conn->prepare($this->qry);
        $prepare-> execute();
        $result =$prepare-> fetchAll(pdo::FETCH_ASSOC);
        return $result;

    }

    public function insert_table_data($qry){
        $this->qry = $qry;
        $conn=$this->  connect_to_db_server(); // call method from same class
        // $qry = "SHOW DATABASES";
        $prepare = $conn->prepare($this->qry);
        $result= $prepare-> execute();
        if($result){
            echo "Data Sucessfuly inserted";
        }else{
            echo "Data not inserted.";
        }

        return $result;

    }

    public function update_table_data ($qry){
        $this->qry = $qry;
        $conn=$this->  connect_to_db_server(); // call method from same class
        // $qry = "SHOW DATABASES";
        $prepare = $conn->prepare($this->qry);
        $result= $prepare-> execute();
        if($result){
            echo "Data update Sucessfuly";
        }else{
            echo "Data not updated.";
        }

        return $result;

    }

    public function delete_table_data($qry){
        $this->qry = $qry;
        $conn=$this->  connect_to_db_server(); // call method from same class
        // $qry = "SHOW DATABASES";
        $prepare = $conn->prepare($this->qry);
        $result= $prepare-> execute();
        
        if($result){
            echo "Table data deleted";
        }else{
            echo "Table data not deleted.";
        }

        return $result;

    }

    public function alter_table($qry){
        $this->qry = $qry;
        $conn=$this->  connect_to_db_server(); // call method from same class
        // $qry = "SHOW DATABASES";
        $prepare = $conn->prepare($this->qry);
        $result= $prepare-> execute();
        
        if($result){
            echo "Table Alterd";
        }else{
            echo "Table not Alterd.";
        }

        return $result;

    }


}

$obj = new mySqlDb();
// $obj->connect_to_db_server();
$obj-> show_databases();
// $obj-> create_database("xxx");
// $qry = "SELECT * FROM user";
//$qry = " SELECT user_id,post from post WHERE user_id>'2'";
// $result=$obj->fetch_table_data($qry);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// $qry = "INSERT INTO user(name,email) VALUES ('','no2@gmail.com')";
// $obj->insert_table_data($qry);

// $qry = "UPDATE `user` SET `email` = 'kumkum_2@gmail.com' WHERE `user`.`id` = 6";
// $obj->update_table_data($qry);

// $qry="ALTER TABLE user MODIFY name varchar(50) NOT NULL";
// $obj->alter_table($qry);

// $qry="DELETE FROM `user` WHERE `user`.`name` = ''";
// $obj->delete_table_data($qry);





?>


