<?php
require 'database.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM tasks WHERE id='$id'";
    $req=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($req);
   
    $id = $row["id"];
    $title = $row["title"];
     $types = $row["type_id"];
    $status = $row["status_id"];
    $priority = $row["priority_id"];
    $description = $row["description"];
    $datetime = $row["task_datetime"];
}
?>

<html>
<head>
		<meta charset="utf-8" />
		<title>YouCode | Scrum Board</title>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />

		<!-- ================== BEGIN core-css ================== -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
		<link href="assets/css/vendor.min.css" rel="stylesheet" />
		<link href="assets/css/default/app.min.css" rel="stylesheet" />
		<!-- ================== END core-css ================== -->
	</head>
<body>
<form action="scripts.php" method="POST" id="form-task">
						<div class="modal-header">
							<h5 class="modal-title">Add Task</h5>
							
						</div>
						<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input type="hidden" id="task-id" name="id" value="<?php echo"$id";?>">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" value="<?php echo" $title";?>" name="title" class="form-control" id="task-title"  />
							</div>
							<div class="mb-3">
								<label class="form-label">Type</label>
								<div class="ms-3" name="type" id="type">
									<div class="form-check mb-1">
										<input class="form-check-input" name="task-type" type="radio" value="1" id="task-type-feature" />
										<label class="form-check-label" for="task-type-feature">Feature</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="task-type" type="radio" value="2" id="task-type-bug" />
										<label class="form-check-label" for="task-type-bug">Bug</label>
									</div>
								</div>

							</div>
							<div class="mb-3">
								<label class="form-label">Priority</label>
								<select name="priority" class="form-select" id="task-priority" >
									<option value="">Please select</option>
									<option value="1">Low</option>
									<option value="2">Medium</option>
									<option value="3">High</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select name="status" class="form-select" id="task-status">
									<option value="">Please select</option>
									<option value="1">To Do</option>
									<option value="2">In Progress</option>
									<option value="3">Done</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="date" name="date"  value="<?php echo"$datetime";?>" class="form-control" id="task-date" />
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<input type="text" value="<?php echo" $description";?>" name="description" class="form-control" id="task-title"  />
							</div>

						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
							<button type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
								<button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
						</div>
					</form>
				</div>
			</div>
		</div>

        <script src="scripts.js"></script>
		<script src="assets/js/main.js"></script>
		<!-- ================== BEGIN core-js ================== -->
		<script src="assets/js/vendor.min.js"></script>
		<script src="assets/js/app.min.js"></script>
</body>


<script>
    if(<?=$types?> == 2){
    document.getElementById('task-type-bug').checked=true;
}else{
    document.getElementById('task-type-feature').checked=true;
}

document.getElementById("task-priority").value='<?= $priority?>';
document.getElementById("task-status").value='<?= $status?>';
</script>













</html>