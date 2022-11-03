    <?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if (isset($_POST['save']))        saveTask();
    if (isset($_POST['update']))      updateTask();
    if (isset($_GET['id']))      deleteTask();


    function getTasks($task_status)
    {
      include('database.php');
      foreach ($result as $row) {
        $id = $row["id"];
        $title = $row["title"];
        $types = $row["type"];
        $status = $row["status"];
        $priority = $row["priority"];
        $description = $row["description"];
        $datetime = $row["task_datetime"];

        if ($task_status  == 'To_Do' &&  $status == 'To Do') {
          echo "<script> document.getElementById('to-do-tasks-count').innerHTML++; </script>";
          echo ' <button class="w-80 mb-1 rounded-3 no  border border-white mx-1  border-opacity-50 row p-2"    >
              
                    <div class="col-1">
                      <i class="fas fa-question-circle fa-1x text-green"></i> 
                  </div>
                  <div class="col-10">
                      <div class="text-start fs-6 fw-bold ">' . $title . '</div>
                      <div class="">
                          <div class="text-start  text-gray " >' . $id . ' created in ' . $datetime . '</div>
                          <div class="text-start" title="" >' . $description . '...</div>
                      </div>
                      <div class="d-flex">
                          <span class="btn btn-primary btn-sm me-1 " >' . $priority . '</span>
                          <span class="btn1 btn-primary btn-sm text-black bg-gray-100-800">' . $types . '</span>
                      </div>
                      <div class="d-flex">
                      <a  href="scripts.php?id=' . $id . '"><i class="fas fa-trash text-danger m-2"   name="delete"  ></i>delete</a>
                      <a  href="edit.php?id=' . $id . '"><i class="fas fa-pen text-green  m-2" ></i></i>Edit</a>
        
                  </div>
                  </div>.
              </button>';
        } else if ($task_status  == 'In_Progress' &&  $status == 'In Progress') {
          echo "<script> document.getElementById('in-progress-tasks-count').innerHTML++; </script>";

          echo ' <button class="w-80 mb-1 rounded-3 no  border border-white mx-1  border-opacity-50 row p-2"    >
              
                <div class="col-1">
                  <i class=" spinner-border spinner-border-sm text-green me-1 " role="status"></i> 
              </div>
              <div class="col-10">
                  <div class="text-start fs-6 fw-bold "  >' . $title . '</div>
                  <div class="">
                      <div class="text-start  text-gray ">' . $id . ' created in ' . $datetime . '</div>
                      <div class="text-start" title=""  >' . $description . '...</div>
                  </div>
                  <div class="d-flex">
                      <span class="btn btn-primary btn-sm me-1 " >' . $priority . '</span>
                      <span class="btn1 btn-primary btn-sm text-black bg-gray-100-800" >' . $types . '</span>
                  </div>
                  <div class="d-flex">
                  <a  href="scripts.php?id=' . $id . '"><i class="fas fa-trash text-danger m-2"   name="delete"  ></i>delete</a>
                  <a  href="edit.php?id=' . $id . '"><i class="fas fa-pen text-green  m-2"  ></i></i>Edit</a>

              </div>
              </div>.
          </button>';
        } else if ($task_status  == 'Done' &&  $status == 'Done') {
          echo "<script> document.getElementById('done-tasks-count').innerHTML++; </script>";

          echo ' <button class="w-80 mb-1 rounded-3 no  border border-white mx-1  border-opacity-50 row p-2"    >
              
        <div class="col-1">
          <i class="fas fa-chevron-circle-down fa-1x text-green p-2"></i> 
      </div>
      <div class="col-10">
          <div class="text-start fs-6 fw-bold "  >' . $title . '</div>
          <div class="">
              <div class="text-start  text-gray " >' . $id . ' created in ' . $datetime . '</div>
              <div class="text-start" title="" >' . $description . '...</div>
          </div>
          <div class="d-flex">
              <span class="btn btn-primary btn-sm me-1 " >' . $priority . '</span>
              <span class="btn1 btn-primary btn-sm text-black bg-gray-100-800">' . $types . '</span>
          </div>
          <div class="d-flex">
          <a  href="scripts.php?id=' . $id . '"><i class="fas fa-trash text-danger m-2"   name="delete"  ></i>delete</a>
          <a  href="edit.php?id=' . $id . '"><i class="fas fa-pen text-green  m-2"   ></i></i>Edit</a>

      </div>
      </div>.
    </button>';
        }
      }
    }
    function validate($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    function saveTask()
    {
      global $conn;


      $title = validate($_POST["title"]);
      $type = validate($_POST["task-type"]);
      $priority = validate($_POST["priority"]);
      $status = validate($_POST["status"]);
      $date = validate($_POST["date"]);
      $description = validate($_POST["description"]);

      $query = "INSERT INTO tasks(title, type_id, priority_id, status_id, task_datetime, description) 
      VALUES ('$title','$type',' $priority','$status','$date','$description')";
      $res = mysqli_query($conn, $query);
      if (!$res) {
        echo "error";
      }

      header('location: index.php');
      $_SESSION['message'] = "Task has been save successfully !";
    }

    function updateTask()
    {
      // CODE HERE
      global $conn;
      $id = $_POST["id"];
      $title = validate($_POST["title"]);
      $type = (int)validate($_POST["task-type"]);
      $priority = (int) validate($_POST["priority"]);
      $status = (int)validate($_POST["status"]);
      $date = validate($_POST["date"]);
      $description = validate($_POST["description"]);
      $req = "UPDATE `tasks` SET `title`='$title',`type_id`=$type,
                    `priority_id`=$priority,`status_id`=$status,`task_datetime`='$date',
                    `description`='$description' WHERE `id`=$id ";



      $res = mysqli_query($conn, $req);;
      if (!$res) {
        echo "error";
      }

      //SQL UPDATE
      $_SESSION['message'] = "Task has been updated successfully !";
      header('location: index.php');
    }

    function deleteTask()
    {
      //CODE HERE
      global $conn;
      $id = $_GET["id"];
      $sql = "DELETE FROM tasks WHERE id=$id";
      $query = mysqli_query($conn, $sql);
      if (!$query) {
        echo "error";
      }
      //SQL DELETE
      $_SESSION['message'] = "Task has been deleted successfully !";
      header('location: index.php');
    }
