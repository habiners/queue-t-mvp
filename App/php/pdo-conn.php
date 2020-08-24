<?php
    try{
        $servername = "localhost";
        $DBusername = "server";
        $DBpassword = "123";
        $dbname = "queue_t";
    
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $DBusername, $DBpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    }
    catch (PDOException $e){
        echo "Could not connect! " . $e->getMessage();
    }

?>