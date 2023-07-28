<?php
//insert data for student
if (isset($_POST['btn-save'])) {
	$roll = $_POST['roll'];
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$dept = $_POST['dept'];
	$year = $_POST['year'];
	$sql = "INSERT INTO `student`( `roll`, `name`, `mobile`, `year`, `dept`)
			VALUES ('$roll', '$name','$mobile','$year','$dept')";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		$msg = "Data Inserted";

	}else {
		$error = "Data Not Inserted";
	}
}

//update student
if (isset($_POST['btn-update'])) {
	$roll = $_POST['roll'];
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$dept = $_POST['dept'];
	$year = $_POST['year'];
	$sql = "UPDATE student SET `roll` = '$roll', `name` = '$name' , `mobile` = '$mobile', `year` = '$year' , `dept` = '$dept' where id = ".$_POST["id"];
	$result = mysqli_query($conn,$sql);
	if ($result) {
		header("location:index.php");
	} else{
		$error = "Not able to update record";
	}
}


//Delete record for student
if (isset($_REQUEST['delete_id'])) {
	$sql = "DELETE FROM student WHERE `id` = ".$_REQUEST['delete_id'];
	$res = mysqli_query($conn,$sql);
	
	if ($res){
		$msg = "Record Deleted Successfully!" ;
		} else{
			echo"<p style='color:#f00;'>Error! Record Not deleted.</p>".
			mysqli_error();
		}
}

//insert faculty data
if (isset($_POST['btn-save-faculty'])) {
    $facultyName = $_POST['facultyName'];
    $designation = $_POST['designation'];
    $mobile = $_POST['mobile'];
    $dept = $_POST['dept'];
    $sql = "INSERT INTO faculty(`facultyName`, `mobile`, `dept`, `designation`) VALUE('$facultyName' , '$mobile', '$dept', '$designation')";
    $result = mysqli_query($conn , $sql);
    if ($result) {
        $msg = "Data Inserted";
    } else{
        $error = "Failed to insert";
    }
}

//update faculty
if( isset ($_POST ['btn-update-faculty']) ) {
	$id = $_POST['id'];
	$facultyName = $_POST['facultyName'];
    $designation = $_POST['designation'];
    $mobile = $_POST['mobile'];
    $dept = $_POST['dept'];
	// sql query to execute the updation of records in database table
	$sql="UPDATE  faculty SET facultyName = '$facultyName', designation = '$designation', mobile = '$mobile',  dept = '$dept' where id = ".$id;
	$result = mysqli_query($conn , $sql);
    if ($result) {
		header("location:index.php?menu=faculty");
    } else{
        $error = "Failed to insert";
    }

}



?>