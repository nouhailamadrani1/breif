<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database ="youcodescrumborad";

    global $conn;
    // Create connection
    $conn = new mysqli($servername, $username, $password,$database);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // CONNECT TO MYSQL DATABASE USING MYSQLI
    $sql = "SELECT tasks.id, tasks.title , statues.name as status, priorities.name as
    priority, types.name as type , tasks.task_datetime, tasks.description FROM tasks join
     statues on tasks.status_id = statues.id join types on
    types.id = tasks.type_id join priorities on priorities.id =tasks.priority_id;";
    $result = $conn->query($sql);
    // $GLOBALS['tasks']= array();
    // if ($result->num_rows > 0) {
    //   // output data of each row
    //    while($row = $result->fetch_assoc()) {
    //     $GLOBALS['tasks'][] = $row;
    //   // echo " id: "  . $row["id"] ."<br>".  $row["title"] ."<br>". $row["type"] ."<br>" . $row["status"] ."<br>". $row["priority"]
    //   // ."<br>" . $row["task_datetime"]  ."<br>". $row["description"].
    //   //  "<br> ";
       
    //   }

      
    // } else {
    //   echo "0 results";
    // }
    // $conn->close();
    // 
    
   
       
?>