<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            *{
                box-sizing:border-box;
                /* border: 1px solid red; */
            }
            #table_container{
                width:70%;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
                tr:nth-child(odd) {
                background-color: #fff;
                }
            
        </style>
    </head>
    <body>
        
    <?php
    include("DbMo.php");
    $obj = new mySqlDb();
    $qry = "SHOW TABLES";
    $result = $obj-> run_mysql_query($qry);
    $num_of_element = count($result);

    
    $obj_select = new mySqlDb();
    $qry_select = "SHOW DATABASES";
    $result_select = $obj_select-> run_mysql_query($qry_select);
    

          
    // echo "<pre>";
    // print_r(gettype($result));
    // echo "</br>";
    // print_r($result);
    // echo "</pre>";


    ?>
    <div id="form_element">
        <label for="select_1">Select Database:</label>
        
        <select id="select_1">
            <option value="">Select Databse: </option>
            <?php
            foreach($result_select as $row){
                $output = "<option value='{$row['Database']}'>";
                $output .= "{$row['Database']}";
                $output .= "</option>";
                echo $output;

            }
            
            ?>
        </select>
    </div>
    <div id="table_container">
        <?php
        $db_name = DB_NAME;
        echo "<h2>List of Tabels in the Database: '{$db_name}'</h2>";
        ?>
    <table id="table_1">
        <thead>
        <tr><th>Sr. No.</th><th>Tables Name</th><th>Action</th></tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($result as $row){
            $output = "<tr>";
            $output .= "<td>{$i}</td>";
            $output .= "<td>{$row['Tables_in_'.$db_name]}</td>";
            $output .= "<td><button id='btn_{$i}'>Show Records</button></td>";
            $output .= "</tr>";
            echo $output;
            $i++;
        }
        
        ?>
        </tbody>
        <tfoot>
            <tr><td colspan="3">Total Tables: <?php echo $num_of_element; ?></td> </tr>
        </tfoot>
    </table>
    </div>
    <script>
        $(document).ready(function(){
            $("select_1").change(function(){


            });

        });
    </script>
    </body>
</html>