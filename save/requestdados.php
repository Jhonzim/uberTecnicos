<?php
    include("mysql_conection.php");

    $query = "SELECT * FROM Tecnico order by rand() LIMIT 1" or die ($con->error);
    $request = $con->query($query) or die ($con->error);

    $a = $request->num_rows;
    $resp = $request->fetch_assoc();
    $total = $resp["Nome"];
    //foreach($request as 
    $key => $r;
        //array_push($total,$r);
    //}
    //echo json_encode($total);?>