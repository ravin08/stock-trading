<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <style>
            *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* border: 1px solid red;  */
}

            #page-wraper{
            display: flex;
            flex-flow: row wrap;
            /* justify-content: space-between; */
            width: 100%;
            height: 100vh;
	

}
            #left-col{
                width: 30%;
                border-right: 1px solid;

            }

            #right-col{
                width: 70%;
                /* height: 90vh; */
               

            }


            h2,p{
                cursor: pointer;
            }

            P:hover{
                background: lightblue;
            }
        
        </style>
    </head>
    <body>
        <div id="page-wraper">
            <div id="left-col">
                <h2>Menu</h2>
                <p id="p_1">Show Databases</p>
                <p id="p_2">Show Tabels</p>
            </div>
            <div id="right-col">
                <h2>Detail</h2>
            </div>
        </div>
    <script>
        $(document).ready(function () {

            $("h2").click(function () {
                $("h2").text("Menu");
                $("#right-col").css("background-color", "#fff");
                $("#p_1, #p_2").css("background-color", "");
                
            }),
            
            $("#p_1").click(function () {
                $(this).css("background-color", "lightblue");
                $("#right-col").css("background-color", "lightblue");
                $("#p_2").css("background-color", "");
                $("h2").text("< Back");
                
            }),

            $("#p_2").click(function () {
                $(this).css("background-color", "orange");
                $("#right-col").css("background-color", "orange");
                $("#p_1").css("background-color", "");
                $("h2").text("< Back");
                
            })
           

            
                
                
          


                
            
            
            
        })
    </script>
    </body>
</html>