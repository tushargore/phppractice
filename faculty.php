<h1>Faculty</h1>
<form method="post">
    <table width="30%" align="center" class="table-bordered" >
        <tr>
            <td><input type="text" placeholder="Faculty Name" name="facultyName" class="form-control"></td>
        </tr>
        <tr>
            <td><input type="number" placeholder="Mobile number" name="mobile" class="form-control"></td>
        </tr>
        <tr>
            <td>
                <select name="dept" class="form-control">
                    <option value="" disabled selected hidden >Select department:</option>
                    <option value="CM">Computer Technology</option>
                    <option value="EC">Electronics and Communication Engineering</option>
                    <option value="MECH">Mechanical engineering</option>
                    <option value="CSE">Department of Computer Science & Engg.</option>
                </select>
			</td>
		</tr>
		<tr>
			<td><input type="text" placeholder="Designation" name="designation" class="form-control"></td>
		</tr>
		<!-- Button -->
		<tr>
			<td><input type="submit" name="btn-save-faculty" value="Save" class="btn btn-primary">
			<input type="reset" value="Reset" class="btn btn-danger">
			<?php
			if (isset($msg)){
				echo $msg;
			}
			if(isset($error)){
				echo $error;
			}
			?>
			</td>
		</tr>
	</table>
</form>
<hr>
<table width="60%" align="center" class="table-bordered table-hover">
	<tr>
		<th>#ID</th>
		<th>Faculty Name</th>
		<th>Mobile</th>
		<th>Dept</th>
		<th>Designation</th>
		<th>Action</th>
	</tr>
	<?php 
		$sql = "select * from faculty";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo '<td>'. $row['id']. '</td>';
			echo '<td>'. $row['facultyName']. '</td>';
			echo '<td>'. $row['mobile']. '</td>';
			echo '<td>'. $row['dept']. '</td>';
			echo '<td>'. $row['designation']. '</td>';
			echo '<td>
				<a href=index.php?menu=faculty&edit='.$row['id'].'>Edit</a>
			</td>';
			echo '</tr>';
		}
	?>
	</table>
	<hr>
	<?php
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$sql2 ="SELECT * FROM `faculty` WHERE id=$id";
		$res  =mysqli_query($conn,$sql2);
		$data = mysqli_fetch_assoc($res);
		?>
		<form method="post">
		<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <table width="30%" align="center" class="table-bordered" >
        <tr>
            <td><input type="text" name="facultyName" class="form-control" value="<?php echo $data['facultyName'];?>">
		</td>
        </tr>
        <tr>
            <td><input type="number" name="mobile" class="form-control" value="<?php echo $data['mobile'];?>"></td>
        </tr>
        <tr>
            <td>
				<input type="text"  name="dept" class="form-control" value="<?php echo $data['dept'];?>">
               
			</td>
		</tr>
		<tr>
			<td><input type="text" name="designation" class="form-control" value="<?php echo $data['designation'];?>"></td>
		</tr>
		<!-- Button -->
		<tr>
			<td><input type="submit" name="btn-update-faculty" value="Update" class="btn btn-primary">
			</td>
		</tr>
	</table>
</form>



<?php
	}
	?>
