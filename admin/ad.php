<?php
                include 'dbconnection.php';
                $assign_type_res= mysqli_query($conn,"SELECT * from tbl_zookeeperreg where status=1");
                if(isset($_GET['reg_id'])){
                $ss=$_GET['reg_id'];
                      echo "$ss";
                }
                ?>


<html>
    <head>
        <title></title>
    </head>
    <body>
        <p>hiiiii</p> 
    </body>
</html>
                