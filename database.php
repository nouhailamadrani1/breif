  <?php
      
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database ="youcodescrumborad";

      global $conn;
      // Create connection
      $conn = mysqli_connect($servername, $username, $password,$database);
      
      // Check connection
      if (!$conn) {
        echo("Connection failed "); 
      }
      // CONNECT TO MYSQL DATABASE USING MYSQLI
      $sql = "SELECT tasks.id, tasks.title , statues.name as status, priorities.name as
      priority, types.name as type , tasks.task_datetime, tasks.description FROM tasks join
      statues on tasks.status_id = statues.id join types on
      types.id = tasks.type_id join priorities on priorities.id =tasks.priority_id;";
      $result = mysqli_query($conn, $sql);
