<h1>Student</h1>
	<form method="post">
			<table width="50%" align="center" >
				<tr>
					<td><input type="number" name="roll" placeholder="Roll No" class="form-control"></td>
				</tr>
				<tr>
					<td><input type="text" name="name" placeholder="Enter Name" class="form-control"></td>
				</tr>
				<tr>
					<td><input type="number" name="mobile" placeholder="Enter mobile" class="form-control"></td>
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
					<td><select name="year" class="form-control">
						<option value="">Select Year</option>
						<option value="FY"> First Year</option>
						<option value="SY"> Second year</option>
						<option value="TY"> Third year</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Save" name="btn-save" class="btn btn-primary">
					</td>
				</tr>
			</table>
		</form>
		<hr>
		<table width="50%" align="center" class="table-bordered table-striped">
			
			<tr>
				<th> Roll </th>
				<th> Name </th>
				<th> Mobile </th>
				<th>Year</th>
				<th> Department </th>
				<th> Action </th>
			</tr>
				
				
			<?php
				$sql = "select * from student";
				$result = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>". $row['roll'] . "</td>";
					echo "<td>". $row['name'] . "</td>";
					echo "<td>". $row['mobile'] . "</td>";
					echo "<td>". $row['year'] . "</td>";
					echo "<td>". $row['dept'] . "</td>";
					echo "<td>
							<a href=index.php?menu=student&&editID=$row[id] class='btn btn-info'>Edit</a> 
							<a href=index.php?menu=student&&delete_id=$row[id] class='btn btn-danger'>Delete</a>
					</td>";
					echo "</tr>";
				}

			?>
		</table>
		<hr>
			<?php
				if (isset($_REQUEST['editID'])) {
					$id = $_REQUEST['editID'];
					$sql = "select * from student where id = $id";
					$result = mysqli_query($conn, $sql);
					$data = mysqli_fetch_array( $result );
				?>
					<form method="post">
						<table width="50%" align="center" >
							<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
							<tr>
								<td><input type="number" name="roll" class="form-control" value="<?php echo $data['roll']; ?>"></td>
							</tr>
							<tr>
								<td><input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>"></td>
							</tr>
							<tr>
								<td><input type="number" name="mobile"  class="form-control" value="<?php echo $data['mobile'];  ?>"></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="dept" class="form-control" value="<?php echo $data['dept']; ?>">
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" name="year" class="form-control" value="<?php echo $data['year']; ?>">
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Edit" name="btn-update" class="btn btn-primary">
								</td>
							</tr>
						</table>
					</form>
				
			<?php
				}
			?>
