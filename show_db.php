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
            
        </style>
    </head>
    <body>
        
    <?php
    include("DbMo.php");
    $obj = new mySqlDb();
    $qry = "SHOW DATABASES";
    $result = $obj-> run_mysql_query($qry);
    $num_of_element = count($result);

          
    echo "<pre>";
    print_r(gettype($result));
    echo "</br>";
    // print_r($result);
    echo "</pre>";


    ?>
    <div id="table_container">
        <h2>List of Database in the System.</h2>
    <table id="table_1">
        <thead>
        <tr><th>Sr. No.</th><th>Database Name</th><th>Action</th></tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($result as $row){
            $output = "<tr>";
            $output .= "<td>{$i}</td>";
            $output .= "<td>{$row['Database']}</td>";
            $output .= "<td><button id='btn_{$i}'>Delete</button></td>";
            $output .= "</tr>";
            echo $output;
            $i++;
        }
        ?>
        </tbody>
        <tfoot>
            <tr><td colspan="3">Total Databases: <?php echo $num_of_element; ?></td> </tr>
        </tfoot>
    </table>
    </div>
    </body>
</html>