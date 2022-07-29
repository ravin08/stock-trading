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
                display: none;
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
    // $obj = new mySqlDb();
    // $qry = "SELECT * FROM {$tabel_name}";
    // $result = $obj-> run_mysql_query($qry);
    // $num_of_element = count($result);

    
    $obj_select = new mySqlDb();
    $qry_select = "SHOW TABLES";
    $result_select = $obj_select-> run_mysql_query($qry_select);
    

          
    // echo "<pre>";
    // print_r(gettype($result));
    // echo "</br>";
    // print_r($result);
    // echo "</pre>";

    $db_name = DB_NAME;
    ?>
    <div id="form_element">
        <label for="select_1">Select Table:</label>
        
        <select id="select_1" name="select_1">
            <option value="">Select Table </option>
            <?php
            foreach($result_select as $row){
                $output = "<option value='{$row['Tables_in_'.$db_name]}'>";
                $output .= "{$row['Tables_in_'.$db_name]}";
                $output .= "</option>";
                echo $output;

            }
            
            ?>
        </select>
    </div>
    <div id="table_container">
        <?php
        
        echo "<h2>List of Records in the Tabel: '{table_name}'</h2>";
        ?>
    <table id="table_1">
        <thead>
        <tr><th>Sr. No.</th><th>Tables Name</th><th>Action</th></tr>
        </thead>
        <tbody>
        <?php
        // $i = 1;
        // foreach($result as $row){
        //     $output = "<tr>";
        //     $output .= "<td>{$i}</td>";
        //     $output .= "<td>{$row['Tables_in_demo']}</td>";
        //     $output .= "<td><button id='btn_{$i}'>Show Records</button></td>";
        //     $output .= "</tr>";
        //     echo $output;
        //     $i++;
        // }
        
        ?>
        </tbody>
        <tfoot>
            <tr><td colspan="3">Total Records: <?php //echo $num_of_element; ?></td> </tr>
        </tfoot>
    </table>
    </div>
    <script>
        $(document).ready(function(){
            $("#select_1").change(function(){
                var value = $("#select_1").val();
                
                if(value != ""){

                    $("#table_container").css("display", "initial");
                    $("#table_container>h2").text('List of Records in the Tabel: '+value);
                    
                }else{
                    $("#table_container").css("display", "none");
                   
                }
               

            });

        });
    </script>
    <?php
    if (isset($_POST['select_1'])) {
        # code...
        echo "post available";
    }
    ?>
    </body>
</html>